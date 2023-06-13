<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\User;
use App\models\doctor;
use App\models\Patient;
use App\models\Session;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $datas = DB::table('sessions')->join('doctors', 'sessions.doctor_id', '=', 'doctors.doctor_id')
                                    ->join('users', 'doctors.user_id', '=', 'users.id')
                                    ->join('specialities', 'doctors.speciality_id', '=', 'specialities.speciality_id')
                                    ->join('departments', 'doctors.department_id', '=', 'departments.department_id')
                                    ->join('offices', 'doctors.office_id', '=', 'offices.office_id')
                                    ->select( 'sessions.*','doctors.*', 'users.*','offices.*','specialities.*','departments.*')
                                    ->where('sessions.id', $id) //IMPORTANT
                                    ->latest('sessions.created_at')
                                    ->get();

        return view('pages.session-details', Compact('datas'));
    }
    public function Profile()
    {
        return view('pages.patient-profile');
    }
    public function ViewDoctors()
    {
        $user = user::all();
        $datas = DB::table('doctors')->join('users', 'doctors.user_id', '=', 'users.id')
                                    ->join('specialities', 'doctors.speciality_id', '=', 'specialities.speciality_id')
                                    ->join('departments', 'doctors.department_id', '=', 'departments.department_id')
                                    ->join('offices', 'doctors.office_id', '=', 'offices.office_id')
                                    ->select('doctors.*', 'users.*','offices.*','specialities.*','departments.*')
                                    ->latest('doctors.created_at')
                                    ->get();
                                    
        return view('pages.view-doctors', compact('datas'));
    }
    public function ViewScheduledSession()
    {
        $datas = DB::table('doctors')->join('users', 'doctors.user_id', '=', 'users.id')
                                    ->join('sessions', 'sessions.doctor_id', '=', 'doctors.doctor_id')
                                    ->select('doctors.*', 'users.*','sessions.*')
                                    ->get();
        return view('pages.view-schedule', compact('datas'));
    }

    public function BookSession()
    {
        $datas = DB::table('sessions')->join('doctors', 'sessions.doctor_id', '=', 'doctors.doctor_id')
                                    ->join('users', 'doctors.user_id', '=', 'users.id')
                                    ->join('specialities', 'doctors.speciality_id', '=', 'specializations.speciality_id')
                                    ->join('departments', 'doctors.department_id', '=', 'departments.department_id')
                                    ->join('offices', 'doctors.office_id', '=', 'offices.office_id')
                                    ->select('doctors.*', 'sessions.*', 'users.*','offices.*','specialities.*','departments.*')
                                    ->latest('sessions.created_at')
                                    ->get();
        return view('pages.book-session', compact('datas'));
    }
    public function ViewBookings()
    {
        $datas = User::all();
        return view('pages.appointment-manager', compact('datas'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
