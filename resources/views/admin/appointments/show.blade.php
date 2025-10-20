<x-admin-layout title="Citas" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Citas',
        'href' => route('admin.appointments.index'),
    ],
    [
        'name' => 'Detalle',
    ],
]">
    <x-wire-card>
        <x-slot name="title">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Detalle de la cita
                </h1>

                <p class="text-sm text-gray-500">
                    Fecha: {{ $appointment->date->format('d/m/Y') }}
                </p>
            </div>
        </x-slot>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div>
                <h2 class="font-semibold text-gray-500 uppercase text-xs mb-2">
                    Paciente
                </h2>
                <p class="text-lg font-semibold text-gray-900">
                    {{ $appointment->patient->user->name }}
                </p>
                <p class="text-sm text-gray-600">
                    {{ $appointment->patient->user->email }}
                </p>
            </div>
            <div>
                <h2 class="font-semibold text-gray-500 uppercase text-xs mb-2">
                    Médico
                </h2>
                <p class="text-lg font-semibold text-gray-900">
                    {{ $appointment->doctor->user->name }}
                </p>
                <p class="text-sm text-gray-600">
                    {{ $appointment->doctor->speciality->name ?? 'Sin especialidad' }}
                </p>
            </div>
        </div>
        <hr class="my-4">
        <div>
            <h3 class="font-semibold text-gray-800 mb-2">
                Diagnóstico
            </h3>
            <p>
                {{ $appointment->consultation->diagnosis ?? 'No disponible' }}
            </p>
        </div>
        <hr class="my-4">
        <div>
            <h3 class="font-semibold text-gray-800 mb-2">
                Plan de tratamiento:
            </h3>
            <p>
                {{ $appointment->consultation->treatment ?? 'No disponible' }}
            </p>
        </div>
        
        @isset($appointment->consultation->prescriptions)
        <hr class="my-4">
        <div>
            <h3 class="font-semibold text-gray-800 mb-2">
                Receta médica:
            </h3>
            <ul class="space-y-3">
                @foreach ($appointment->consultation->prescriptions as $prescription)
                    <li>
                        <p>
                            <strong>Médicamento:</strong>{{$prescription['medicine']}} <br>
                            <strong>Dosis:</strong>{{$prescription['dosage']}} <br>
                            <strong>Instrucciones:</strong>{{$prescription['frequency']}}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>
        @endisset

        @role('Doctor')
            <hr class="my-4">
            <div>
                <h3 class="font-semibold text-gray-800 ">
                    Notas del médico:
                </h3>
                <p>
                    {{ $appointment->consultation->notes ?? 'No hay notas disponibles' }}
                </p>
            </div>
        @endrole
    </x-wire-card>
</x-admin-layout>
