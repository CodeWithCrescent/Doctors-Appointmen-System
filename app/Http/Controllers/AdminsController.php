<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\models\User;
use App\models\Doctor;
use App\models\Patient;
use App\models\Department;
use App\models\Speciality;
use App\models\Office;
use App\models\Session;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin-dashboard');
    }
    public function Profile()
    {
        return view('pages.admin-profile');
    }
    public function ViewDoctors()
    {
        $datas = DB::table('doctors')->join('users', 'doctors.user_id', '=', 'users.id')
                                    ->join('specialities', 'doctors.speciality_id', '=', 'specialities.speciality_id')
                                    ->join('departments', 'doctors.department_id', '=', 'departments.department_id')
                                    ->join('offices', 'doctors.office_id', '=', 'offices.office_id')
                                    ->select('doctors.*', 'users.*','offices.*','specialities.*','departments.*')
                                    ->latest('doctors.created_at')
                                    ->get();

        return view('pages.view-doctors', compact('datas'));
    }
    public function ViewPatients()
    {
        $datas = DB::table('patients')->join('users', 'patients.user_id', '=', 'users.id')
                                    ->select('patients.*', 'users.*')
                                    ->latest('patients.created_at')
                                    ->get();

        return view('pages.view-patients', compact('datas'));
    }
    public function AppointmentManager()
    {
        $datas = User::all();
        return view('pages.appointment-manager', compact('datas'));
    }
    public function PatientManager()
    {
        $datas = Patient::all();
        return view('pages.patient-manager', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddDoctor()
    {
        $departments = Department::latest('created_at')->get();
        $offices = Office::latest('created_at')->get();
        return view('pages.add-doctor',compact('departments','offices'));
    }
    public function GetOffices($departmentId)
    {
        $department_offices = Office::where('department_id', $departmentId)->get();
        return response()->json($department_offices);
    }
    public function GetSpeciality($departmentId)
    {
        $department_specialities = Speciality::where('department_id', $departmentId)->get();
        return response()->json($department_specialities);
    }

    public function SessionManager()
    {
        $datas = DB::table('sessions')->join('doctors', 'sessions.doctor_id', '=', 'doctors.doctor_id')
                                    ->join('users', 'users.id', '=', 'doctors.user_id')
                                    ->select('sessions.*', 'users.*')
                                    // ->latest('sessions.scheduled_date')
                                    ->get();
        return view('pages.sessions', compact('datas'));
    }
    public function AddSession()
    {
        $doctors = DB::table('doctors')->join('users', 'doctors.user_id', '=', 'users.id')    
                                        ->select('users.*', 'doctors.*')->latest('doctors.created_at')->get();

        return view('pages.add-session',compact('doctors'));
    }

    /**
     * Store a newly created Session in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddSessionAction(Request  $request)
    {
        $validate = $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'bookings' => 'required|numeric|min:1',
            'doctor' => 'required|exists:doctors,doctor_id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $session = new Session([
            'scheduled_date' => $request->input('date'),
            'doctor_id' => $request->input('doctor'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'maximum_bookings' => $request->input('bookings'),
            'description' => $request->input('description'),
            'added_by' => Auth()->user()->firstname.' '.Auth()->user()->lastname,
        ]);

        $session->save();

        return redirect()->route('Dashboard | Sessions Manager')->with('status', 'Session Successfully Created!');
    }

    /**
     * Store a newly created Doctor in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addDoctorAction(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        // Convert the request to an array
        $data = $request->input('name');

        $name = explode(' ', $request['name']);
        if (count($name) == 3) {
            $firstname = $name[0];
            $middlename = $name[1];
            $lastname = $name[2];
        } elseif (count($name) == 2) {
            $firstname = $name[0];
            $middlename = null;
            $lastname = $name[1];
        } elseif (count($name) == 1) {
            return redirect()->back()->withErrors(['name' => 'Please enter your two or three names']);
        } else {
            return redirect()->back()->withErrors(['name' => 'Invalid! Maximum three names required']);
        }

        $user = User::create([
            'role' => '1',
            'firstname' => $firstname,
            'middlename' => $middlename,
            'lastname' => $lastname,
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'initial' => $request->input('initial'),
            // 'gender' => $request->input('gender'),
            'password' => Hash::make('123456'),
        ]);

        $doctor = new Doctor([
            'employee_no' => $request->input('employee_number'),
            'speciality_id' => $request->input('speciality_name'),
            'department_id' => $request->input('department'),
            'office_id' => $request->input('office_name'),
            'registered_by' => Auth()->user()->firstname.' '.Auth()->user()->lastname,
        ]);

        $user->doctor()->save($doctor);

        return redirect()->route('Dashboard | Doctors')->with('status', 'Account Successfully Created!');
    }
    public function DoctorSettings()
    {
        $specialities = DB::table('specialities')->join('departments', 'specialities.department_id', '=', 'departments.department_id')
                                    ->select('departments.*', 'specialities.*')->latest('specialities.created_at')->get();

        $offices = DB::table('offices')->join('departments', 'offices.department_id', '=', 'departments.department_id')    
                                        ->select('departments.*', 'offices.*')->latest('offices.created_at')->get();

        $departments = Department::latest('created_at')->get();
        $departments = Department::paginate(3);

        return view('pages.doctor-settings', compact('specialities','departments','offices'));
    }

    public function AddDepartment(Request $request)
    {
        $request->validate([
            'department' => 'required',
        ]);

        $department = Department::create([
            'department_name' => $request->input('department'),
            'added_by' => Auth()->user()->firstname.' '.Auth()->user()->lastname,
        ]);
    
        return redirect()->route('Dashboard | Settings')->with('status', 'Department Added Successfully!');
    }
    public function AddSpeciality(Request $request)
    {
        $request->validate([
            'speciality_name' => 'required|unique:specialities|max:255',
            'department' => 'required|exists:departments,department_id',
        ]);

        $speciality = new Speciality([
            'speciality_name' => $request->input('speciality_name'),
            'department_id' => $request->input('department'),
            'added_by' => Auth()->user()->firstname.' '.Auth()->user()->lastname,
        ]);
        $speciality->save();
    
        return redirect()->back()->with('status', 'Speciality Added Successfully!');
    }
    public function AddOffice(Request $request)
    {
        $request->validate([
            'office_name' => 'required|unique:offices|max:255',
            'department' => 'required|exists:departments,department_id',
        ]);

        $office = Office::create([
            'office_name' => $request->input('office_name'),
            'department_id' => $request->input('department'),
            'added_by' => Auth()->user()->firstname.' '.Auth()->user()->lastname,
        ]);
    
        return redirect()->back()->with('status', 'Office Added Successfully!');
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
    public function EditDepartment($id)
    {
        $specialities = DB::table('specialities')->join('departments', 'specialities.department_id', '=', 'departments.department_id')
                                    ->select('departments.*', 'specialities.*')->latest('specialities.created_at')->get();

        $offices = DB::table('offices')->join('departments', 'offices.department_id', '=', 'departments.department_id')    
                                        ->select('departments.*', 'offices.*')->latest('offices.created_at')->get();

        $departments = Department::latest('created_at')->get();
        $departments = Department::paginate(3);

        $department = Department::find($id);
        return view('pages.edit-department', compact('department','departments','offices','specialities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateDepartment(Request $request, $id)
    {
        $department = Department::find($id);
        $department->department_name = $request->department;
        $department->save();
        return redirect()->route('Dashboard | Settings')->with('status','Department Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteDepartment($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->back()->with('status','Department Deleted Successfully');
    }
}
