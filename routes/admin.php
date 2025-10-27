<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\UserController;

use App\Models\Schedule;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//Gestion
Route::resource('roles', RoleController::class);

//Usuarios
Route::resource('users', UserController::class);

//Pacientes
Route::resource('patients',PatientController::class)
    ->only(['index','edit', 'update']);

//Doctores
Route::resource('doctors',DoctorController::class)
    ->only(['index','edit', 'update']);
   /*  ->except('create','store','show') ; */
Route::get('doctors/{doctor}/schedules', [DoctorController::class,'schedules'])
    ->name('doctors.schedules');
//Consultas
Route::get('appointments/{appointment}/consultation', [AppointmentController::class, 'consultation'])
    ->name('appointments.consultation');
Route::resource('appointments', AppointmentController::class);

//Citas
Route::resource('appointments',AppointmentController::class);

//Calendario
Route::get('calendar', [CalendarController::class, 'index'])
    ->name('calendar.index');


Route::get('support', [SupportController::class, 'index'])
    ->name('support.index');
//Soporte
//Route::get('support',SupportIndex::class)->name('admin.support.index');
