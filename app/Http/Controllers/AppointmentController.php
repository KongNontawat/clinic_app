<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function appointment()
    {
        $appointments = Appointment::rightJoin('patients','patients.patient_id','=','appointments.patient_id')
        ->rightJoin('doctors','doctors.doctor_id','=','appointments.doctor_id')
        ->get(['appointments.*','appointments.reason_for_appointment AS title','doctors.title AS doctor_title','doctors.fname AS doctor_fname','doctors.lname AS doctor_lname','patients.title AS patient_title','patients.fname AS patient_fname','patients.lname AS patient_lname']);
        return view('admin.appointment.appointment_list',compact('appointments'));
    }

    public function index()
    {
        $schedules = Appointment::rightJoin('patients','patients.patient_id','=','appointments.patient_id')
        ->rightJoin('doctors','doctors.doctor_id','=','appointments.doctor_id')
        // ->get(['appointments.*','appointments.reason_for_appointment AS title','doctors.title AS doctor_title','doctors.fname AS doctor_fname','doctors.lname AS doctor_lname','patients.title AS patient_title','patients.fname AS patient_fname','patients.lname AS patient_lname']);
        ->get(['appointments.reason_for_appointment AS title','appointments.appointment_date AS start']);
        // return dd($schedule);
        return view('admin.schedule.calendar',compact('schedules'));
    }

    public function get_schedule()
    {
        $schedules = Appointment::rightJoin('patients','patients.patient_id','=','appointments.patient_id')
        ->rightJoin('doctors','doctors.doctor_id','=','appointments.doctor_id')
        ->get();
        foreach($schedules AS $row) {
            $display = ($row->appointment_date == Carbon::now()->format('Y-m-d'))?'block':'list-item';
            $item = [
                'title' => $row->reason_for_appointment,
                'start' => $row->appointment_date.' '.$row->appointment_time,
                'display'=>$display,
                'backgroundColor' =>'#4A6CF7'
            ];
            $data[] = $item;
        }
        return response()->json($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Appointment $appointment)
    {
        //
    }

    public function edit(Appointment $appointment)
    {
        //
    }

    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    public function destroy(Appointment $appointment)
    {
        //
    }
}
