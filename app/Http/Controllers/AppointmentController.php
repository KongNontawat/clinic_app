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
        $appointments = Appointment::leftJoin('patients', 'patients.patient_id', '=', 'appointments.patient_id')
            ->leftJoin('doctors', 'doctors.doctor_id', '=', 'appointments.doctor_id')
            ->get(['appointments.*', 'appointments.reason_for_appointment AS title', 'doctors.title AS doctor_title', 'doctors.fname AS doctor_fname', 'doctors.lname AS doctor_lname', 'patients.title AS patient_title', 'patients.fname AS patient_fname', 'patients.lname AS patient_lname']);
        return view('admin.appointment.appointment_list', compact(['appointments', 'doctors', 'patients']));
    }

    public function calendar()
    {
        $schedules = Appointment::rightJoin('patients', 'patients.patient_id', '=', 'appointments.patient_id')
            ->rightJoin('doctors', 'doctors.doctor_id', '=', 'appointments.doctor_id')
            // ->get(['appointments.*','appointments.reason_for_appointment AS title','doctors.title AS doctor_title','doctors.fname AS doctor_fname','doctors.lname AS doctor_lname','patients.title AS patient_title','patients.fname AS patient_fname','patients.lname AS patient_lname']);
            ->get(['appointments.reason_for_appointment AS title', 'appointments.appointment_date AS start']);
        // return dd($schedule);
        return view('admin.schedule.calendar', compact('schedules'));
    }

    public function get_schedule()
    {
        $schedules = Appointment::rightJoin('patients', 'patients.patient_id', '=', 'appointments.patient_id')
            ->rightJoin('doctors', 'doctors.doctor_id', '=', 'appointments.doctor_id')
            ->get();
        foreach ($schedules as $row) {
            $display = ($row->appointment_date == Carbon::now()->format('Y-m-d')) ? 'block' : 'list-item';
            $item = [
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
        //
    }

    public function store(Request $req)
    {
        // Validation Main appointment
        $validator = Validator::make($req->all(), [
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'reason_for_appointment' => "required",
            'appointment_date' => 'required',
            'appointment_time' => 'required'
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
            return redirect(route('admin.appointment'))->with('msg_success', 'Created Appointment successfully!');
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
            'appointment_date' => 'required',
            'appointment_time' => 'required'
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
            return redirect(route('admin.appointment'))->with('msg_success', 'Updated Appointment successfully!');
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
            return redirect(route('admin.appointment'))->with('msg_success', 'Cancel Appointment successfully!');
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
            return redirect(route('admin.appointment'))->with('msg_success', 'Update Status Appointment successfully!');
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
