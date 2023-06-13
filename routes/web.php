<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\models\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () { return view('starter'); })->name('Doctors Appointment System');

Route::group(['middleware'=>'dbconnection'], function(){
    
    Route::get('appointment-schedule', function () {
        $datas = DB::table('sessions')->join('doctors', 'sessions.doctor_id', '=', 'doctors.doctor_id')
                                        ->join('users', 'doctors.user_id', '=', 'users.id')
                                        ->join('specialities', 'doctors.speciality_id', '=', 'specialities.speciality_id')
                                        ->join('departments', 'doctors.department_id', '=', 'departments.department_id')
                                        ->join('offices', 'doctors.office_id', '=', 'offices.office_id')
                                        ->select( 'sessions.*','doctors.*', 'users.*','offices.*','specialities.*','departments.*')
                                        ->latest('sessions.created_at')
                                        ->get();
        return view('upcoming-appointments', compact('datas')); })->name('Dashboard | Upcoming Appointments');
});

Route::group(['middleware'=>['dbconnection', 'IfNotLoggedIn']], function(){
    
    Route::get('my-appointments', [App\Http\Controllers\ClientsController::class, 'MyAppointments'])->name('Dashboard | My Appointments');

    Route::get('view-ticket/{appointment_id}', [App\Http\Controllers\ClientsController::class, 'show'])->name('Dashboard | View Appointment');
    
    Route::get('/delete/{appointment_id}', [App\Http\Controllers\ClientsController::class, 'destroy'])->name('Dashboard | Discard Appointment');

    Route::post('session-details/{session_id}', [App\Http\Controllers\ClientsController::class, 'store'])->name('Dashboard | Book Appointment');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function() {
    Auth::routes();
  });

  Route::get('home', function () {
    return redirect()->route('login');
});
Route::get('test01', function () {
    return view('welcome');
});


Route::group(['prefix'=>'admin','middleware'=>['auth','IsAdmin','PreventBackHistory']], function(){
    Route::get('/', [App\Http\Controllers\AdminsController::class, 'index'])->name('Dashboard | Admin');
    Route::get('dashboard', [App\Http\Controllers\AdminsController::class, 'index'])->name('Dashboard | Admin');
    Route::get('profile', [App\Http\Controllers\AdminsController::class, 'profile'])->name('Dashboard | Profile');
    Route::get('doctors', [App\Http\Controllers\AdminsController::class, 'ViewDoctors'])->name('Dashboard | Doctors');
    Route::get('add-doctor', [App\Http\Controllers\AdminsController::class, 'AddDoctor'])->name('Dashboard | Add Doctor');
    Route::post('add-doctor-action', [App\Http\Controllers\AdminsController::class, 'AddDoctorAction'])->name('Dashboard | Add Doctor Action');
    Route::get('settings', [App\Http\Controllers\AdminsController::class, 'DoctorSettings'])->name('Dashboard | Settings');
    Route::post('add-department', [App\Http\Controllers\AdminsController::class, 'AddDepartment'])->name('Dashboard | Add Department');
    Route::get('edit-department/{id}', [App\Http\Controllers\AdminsController::class, 'EditDepartment'])->name('Dashboard | Edit Department');
    Route::put('update-department/{id}', [App\Http\Controllers\AdminsController::class, 'UpdateDepartment'])->name('Dashboard | Update Department');
    Route::get('delete-department/{id}', [App\Http\Controllers\AdminsController::class, 'DeleteDepartment'])->name('Dashboard | Delete Department');
    Route::post('add-speciality', [App\Http\Controllers\AdminsController::class, 'AddSpeciality'])->name('Dashboard | Add Speciality');
    Route::post('add-office', [App\Http\Controllers\AdminsController::class, 'AddOffice'])->name('Dashboard | Add Office');
    Route::get('sessions', [App\Http\Controllers\AdminsController::class, 'SessionManager'])->name( 'Dashboard | Sessions Manager');
    Route::get('add-session', [App\Http\Controllers\AdminsController::class, 'AddSession'])->name('Dashboard | Add Session');
    Route::post('add-session-action', [App\Http\Controllers\AdminsController::class, 'AddSessionAction'])->name('Dashboard | Add Session Action');
    Route::get('patients', [App\Http\Controllers\AdminsController::class, 'ViewPatients'])->name('Dashboard | Patients');
    Route::get('appointment', [ App\Http\Controllers\AdminsController::class, 'AppointmentManager'])->name('Dashboard | Appointments Manager');
    Route::get('patients', [App\Http\Controllers\AdminsController::class, 'PatientManager'])->name('Dashboard | Patients Manager');
    Route::get('get-offices/{department_id}', [App\Http\Controllers\AdminsController::class, 'GetOffices'])->name('Get Offices');
    Route::get('get-speciality/{department_id}', [App\Http\Controllers\AdminsController::class, 'GetSpeciality'])->name('Get Speciality');
    Route::get('register-doctor', [App\Http\Controllers\Auth\DoctorLoginController::class, 'show_signup_form'])->name('Register Doctor');
    Route::post('register-doctor', [App\Http\Controllers\Auth\DoctorLoginController::class, 'process_signup'])->name('Register Doctor');
});

Route::group(['prefix'=>'doctor','middleware'=>['auth','IsDoctor','PreventBackHistory']], function(){
    Route::get('/', [App\Http\Controllers\DoctorsController::class, 'index'])->name('Dashboard | Doctor');
    Route::get('dashboard', [App\Http\Controllers\DoctorsController::class, 'index'])->name('Dashboard | Doctor');
    Route::get('profile', [App\Http\Controllers\DoctorsController::class, 'Profile'])->name('Dashboard | Profile');
    Route::get('sessions', [App\Http\Controllers\DoctorsController::class, 'ViewSession'])->name( 'Dashboard | My Sessions');
    Route::get('appointments', [ App\Http\Controllers\DoctorsController::class, 'ViewAppointment'])->name('Dashboard | My Appointments0');
    Route::get('patients', [ App\Http\Controllers\DoctorsController::class, 'ViewPatients'])->name('Dashboard | My Patients');
});

Route::group(['prefix'=>'client','middleware'=>['auth','IsPatient','PreventBackHistory']], function(){
    Route::get('/', [App\Http\Controllers\PatientsController::class, 'index'])->name('Dashboard | Home');
    Route::get('session-details/{id}', [App\Http\Controllers\PatientsController::class, 'index'])->name('Dashboard | Home');
    Route::get('profile', [App\Http\Controllers\PatientsController::class, 'Profile'])->name('Dashboard | Profile');
    Route::get('doctors', [App\Http\Controllers\PatientsController::class, 'ViewDoctors'])->name( 'Dashboard | All Doctors');
    Route::get('schedule', [App\Http\Controllers\PatientsController::class, 'ViewScheduledSession'])->name( 'Dashboard | Scheduled Session');
    Route::get('book-session/{id}', [App\Http\Controllers\PatientsController::class, 'BookSession'])->name('Dashboard | Book Session');
    Route::get('bookings', [ App\Http\Controllers\PatientsController::class, 'ViewBookings'])->name('Dashboard | My Bookings');
});
