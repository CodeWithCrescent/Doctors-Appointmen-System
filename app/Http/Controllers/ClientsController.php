<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function MyAppointments()
    {
        // Retrieve the current user ID
        $userId = auth()->user()->id;

        $data = DB::table('appointments')->join('sessions', 'sessions.session_id', '=', 'appointments.session_id')
                                        ->join('doctors', 'doctors.doctor_id', '=', 'sessions.doctor_id')
                                        ->join('users', 'doctors.user_id', '=', 'users.id')
                                        ->join('departments', 'doctors.department_id', '=', 'departments.department_id')
                                        ->join('offices', 'doctors.office_id', '=', 'offices.office_id')
                                        ->select('appointments.*','sessions.*','doctors.*', 'users.*','offices.*','departments.*')
                                        ->where('appointments.client_id', $userId) //IMPORTANT
                                        ->latest('appointments.created_at')
                                        ->get();
                  
            
            return view('pages.my-appointments', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // if (Auth::guest()) {
        //     return redirect()->route('login');
        // }

        // Retrieve the current user ID
        $userId = auth()->user()->id;

        // Generate a new reference number
        $timestamp = now()->format('ymdH');
        $randomNumber = mt_rand(100000000, 999999999);
        $referenceNum = $timestamp . $randomNumber;

        // Truncate the reference number to 14 digits
        $referenceNum = substr($referenceNum, 0, 12);
        
        // Store the session ID, and reference number in the appointments table
        $appointments = new Appointment;
        $appointments->session_id = $request->session_id;
        $appointments->reference_num = $referenceNum;
        $appointments->client_id = $userId;
        $appointments->save();

        // Retrieve the ID of the saved appointment
        $appointment_id = $appointments->appointment_id;

        // Redirect to the specified route with the ID of the saved appointment
            return redirect()->route('Dashboard | View Appointment', ['appointment_id' => $appointment_id]);
    }

    /**
     * Display the Ticket after Booking an Appointment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $appointment_id)
    {
        // if (Auth::guest()) {
        //     return redirect()->route('login');
        // }
        
        // Retrieve the appointment with the specified ID
        $appointmentId = Appointment::findOrFail($appointment_id);

        $datas = DB::table('appointments')->join('sessions', 'sessions.session_id', '=', 'appointments.session_id')
                                        ->join('doctors', 'doctors.doctor_id', '=', 'sessions.doctor_id')
                                        ->join('users', 'doctors.user_id', '=', 'users.id')
                                        ->join('departments', 'doctors.department_id', '=', 'departments.department_id')
                                        ->join('offices', 'doctors.office_id', '=', 'offices.office_id')
                                        ->select('appointments.*','sessions.*','doctors.*', 'users.*','offices.*','departments.*')
                                        ->where('appointments.appointment_id', $appointment_id) //IMPORTANT
                                        ->latest('appointments.created_at')
                                        ->first();
                  
            
            return view('pages.session-details', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($appointment_id)
    {
        // Find the appointment by ID
        $appointment = Appointment::findOrFail($appointment_id);
        
        // Delete the appointment
        $appointment->delete();

        // Redirect or perform any other actions
        return redirect()->route('Dashboard | My Appointments')->with('success', 'Appointment Cancelled.');
    }

}
