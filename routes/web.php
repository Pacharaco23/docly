<?php

use App\Models\Appointment;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::redirect('/','/admin');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->get('/appointments', function (Request $request) {
    try {
        $appointments = Appointment::with(['patient.user', 'doctor.user'])
            ->whereBetween('date', [$request->start, $request->end])
            ->get();

        return $appointments->map(function ($appointment) {
            return [
                'id' => $appointment->id,
                'title' => $appointment->patient->user->name,
                'start' => $appointment->start->toIso8601String(),
                'end' => $appointment->end->toIso8601String(),
                'color' => $appointment->status->colorHex(),
                'extendedProps' => [
                    'dateTime' => $appointment->start->format('d/m/Y H:i:s'),
                    'patient' => $appointment->patient->user->name,
                    'doctor' => $appointment->doctor->user->name,
                    'status' => $appointment->status->label(),
                    'color' => $appointment->status->color(),
                    'url' => route('admin.appointments.consultation', $appointment),
                ],
            ];
        });
    } catch (\Throwable $e) {
        Log::error('Error al cargar citas: '.$e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
})->name('api.appointments.index');


Route::get('/prueba',function(){
    $schedule = Schedule::find(1);

    return $schedule->start_time->format('H:i:s');
})->name('prueba');