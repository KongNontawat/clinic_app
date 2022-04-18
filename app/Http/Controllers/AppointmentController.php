<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'alert']);
    }
    public function appointment()
    {
        $doctors = Doctor::where('doctor_status', '1')->get();
        $patients = Patient::where('patient_status', '1')->get();
        $appointments = Appointment::whereIn('appointment_status',[0,1,2])
            ->leftJoin('patients', 'patients.patient_id', '=', 'appointments.patient_id')
            ->leftJoin('doctors', 'doctors.doctor_id', '=', 'appointments.doctor_id')
            ->orderBy('appointments.appointment_date','asc')
            ->orderBy('appointments.appointment_time','asc')
            ->get(['appointments.*', 'appointments.reason_for_appointment AS title', 'doctors.title AS doctor_title', 'doctors.fname AS doctor_fname', 'doctors.lname AS doctor_lname', 'patients.title AS patient_title', 'patients.fname AS patient_fname', 'patients.lname AS patient_lname']);
        return view('admin.appointment.appointment_list', compact(['appointments', 'doctors', 'patients']));
    }

    public function calendar()
    {
        $now = Carbon::now();

        $doctors = Doctor::where('doctor_status', '1')->get();
        $patients = Patient::where('patient_status', '1')->get();

        //schedule : count appointment & date day == date_now
        $get_schedule = Appointment::whereDate('appointment_date','=',$now)->get();
        $schedule = count($get_schedule);

        //reserved : count booking & date day == date_now
        $reserved = 0;

        //checkout : appointment_status == 4 & date day == date_now
        $get_checkout = Appointment::whereDate('appointment_date','=',$now)->whereIn('appointment_status',[3,4])->get();
        $checkout = count($get_checkout);

        //today's : date == date_now
        $today = count($get_schedule);

        $remain = $today - $checkout;
        return view('admin.schedule.calendar',compact(['schedule','reserved','checkout','today','remain','doctors','patients']));
    }

    public function get_doctor_schedule($id)
    {
        $doctor_schedule = DB::table('doctor_schedule')->where('doctor_id',$id)->get();
        return response()->json($doctor_schedule);
    }

    public function get_schedule()
    {
        $schedules = Appointment::whereIn('appointment_status',[0,1])
            ->rightJoin('patients', 'patients.patient_id', '=', 'appointments.patient_id')
            ->rightJoin('doctors', 'doctors.doctor_id', '=', 'appointments.doctor_id')
            ->get();
        foreach ($schedules as $row) {
            $display = ($row->appointment_date == Carbon::now()->format('Y-m-d')) ? 'block' : 'list-item';
            $item = [
                'id' => $row->appointment_id,
                'title' => $row->reason_for_appointment,
                'start' => $row->appointment_date . ' ' . $row->appointment_time,
                'display' => $display,
                'backgroundColor' => '#4A6CF7'
            ];
            $data[] = $item;
        }
        return response()->json($data);
    }

    public function show(Request $req)
    {

        $appointment = Appointment::where('appointment_id',$req->id)
            ->leftJoin('patients', 'patients.patient_id', '=', 'appointments.patient_id')
            ->leftJoin('doctors', 'doctors.doctor_id', '=', 'appointments.doctor_id')
            ->leftJoin('patient_medical_info', 'patient_medical_info.patient_id', '=', 'patients.patient_id')
            ->get(['appointments.*', 'doctors.title AS doctor_title', 'doctors.fname AS doctor_fname', 'doctors.lname AS doctor_lname', 'patients.title AS patient_title', 'patients.fname AS patient_fname', 'patients.lname AS patient_lname','patients.birthdate AS patient_birthdate','patients.phone AS patient_phone','patients.opd_id','patient_medical_info.drug_allergies','patient_medical_info.congenital_disease']);
        return response()->json($appointment);
    }

    public function store(Request $req)
    {
        // Validation Main appointment
        $validator = Validator::make($req->all(), [
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'reason_for_appointment' => "required",
            'appointment_date' => 'required|date|max:50',
            'appointment_time' => 'required|max:20'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors()->getMessages())
                ->with('msg_error', $validator->errors()->all())
                ->withInput();
        }

        DB::beginTransaction();
        try {
            $appointment_number = IdGenerator::generate(['table' => 'appointments', 'field' => 'appointment_number', 'length' => 8, 'prefix' => 'AP']);
            $appointment = Appointment::insert([
                'doctor_id' => $req->doctor_id,
                'patient_id' => $req->patient_id,
                'appointment_number' => $appointment_number,
                'reason_for_appointment' => $req->reason_for_appointment,
                'doctor_comment' => $req->doctor_comment,
                'appointment_date' => $req->appointment_date,
                'appointment_time' => $req->appointment_time,
                'appointment_status' => 0
            ]);

            $logs_appointment = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Create Appointment Number:' . $appointment_number,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);

            DB::commit();
            return redirect()->back()->with('msg_success', 'Created Appointment successfully!');
        } catch (Exception  $e) {
            DB::rollback();
            $logs_appointment = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Create Appointment',
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Created Appointment Failed!');
        }
    }

    public function update(Request $req)
    {
        // Validation Main appointment
        $validator = Validator::make($req->all(), [
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'reason_for_appointment' => "required",
            'appointment_date' => 'required|date|max:50',
            'appointment_time' => 'required|max:20'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors()->getMessages())
                ->with('msg_error', $validator->errors()->all())
                ->withInput();
        }

        DB::beginTransaction();
        try {

            // Create Main appointment
            $appointment = Appointment::where('appointment_id', $req->appointment_id)
                ->update([
                    'doctor_id' => $req->doctor_id,
                    'patient_id' => $req->patient_id,
                    'reason_for_appointment' => $req->reason_for_appointment,
                    'doctor_comment' => $req->doctor_comment,
                    'appointment_date' => $req->appointment_date,
                    'appointment_time' => $req->appointment_time,
                    'appointment_status' => $req->appointment_status
                ]);

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Update Appointment ID:' . $req->appointment_id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);

            DB::commit();
            return redirect()->back()->with('msg_success', 'Updated Appointment successfully!');
        } catch (Exception  $e) {
            DB::rollback();

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Update Appointment ID:' . $req->appointment_id,
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Updated Appointment Failed!');
        }
    }

    public function cancel(Request $req)
    {
        DB::beginTransaction();
        try {
            // Create Main appointment
            $appointment = Appointment::where('appointment_id', $req->appointment_id)
                ->update(['appointment_status' => 4]);

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Cancel Appointment ID:' . $req->appointment_id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);

            DB::commit();
            return redirect()->back()->with('msg_success', 'Cancel Appointment successfully!');
        } catch (Exception  $e) {
            DB::rollback();

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Cancel Appointment ID:' . $req->appointment_id,
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Cancel Appointment Failed!');
        }
    }

    public function change_status($id)
    {
        DB::beginTransaction();
        try {
            // Create Main appointment
            $appointment = Appointment::where('appointment_id', $id)->first();
            $status = 0;
            switch($appointment->appointment_status) {
                case '0':
                    $status = 1;     
                    break;
                case '1':
                    $status = 2;
                    break;
                case '2':
                    $status = 3;
                    break;
                default:
                    $status = 0;
            }

            Appointment::where('appointment_id', $id)->update(['appointment_status' => $status]);

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Update Status Appointment ID:' . $id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);

            DB::commit();
            return redirect()->back()->with('msg_success', 'Update Status Appointment successfully!');
        } catch (Exception  $e) {
            DB::rollback();

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Update Status Appointment ID:' . $id,
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Update Status Appointment Failed!');
        }
    }
}
