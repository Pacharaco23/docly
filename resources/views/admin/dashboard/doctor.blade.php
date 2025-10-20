<div>
    <div class="grid lg:grid-cols-4 gap-6 mb-8">
        
            <x-wire-card class="lg:col-span-2">
                <p class="text-2xl font-bold text-gray-800">
                    ¡Buen dia, Dr(a). {{ auth()->user()->name }} !
                </p>
                <p class="mt-1 text-gray-600">
                    Aquí esta el resumen de su jornada.
                </p>
            </x-wire-card>
        
            <x-wire-card>
                <p class="text-sm font-semibold text-gray-500">
                    Citas de Hoy
                </p>
                <p class="mt-2 text-3xl font-bold text-gray-800">
                    {{ $data['appointments_today_count'] }}
                </p>
            </x-wire-card>
            <x-wire-card>
                <p class="text-sm font-semibold text-gray-500">
                    Citas de la semana
                </p>
                <p class="mt-2 text-3xl font-bold text-gray-800">
                    {{ $data['appointments_week_count'] }}
                </p>
            </x-wire-card>
    </div>
    <div class="grid lg:grid-cols-3 gap-8">
        <div>
            <x-wire-card>
            <p class="text-lg font-semibold text-gray-900">
                Próxima cita:
            </p>
            @if ($data['next_appointment'])
                <p class="mt-4 font-semibold text-xl text-gray-800 ">
                    {{ $data['next_appointment']->patient->user->name }}
                </p>
                <p class="text-gray-600 mb-6">
                    {{ $data['next_appointment']->date->format('d/m/Y') }} a las {{ $data['next_appointment']->start_time->format('h:i A') }}
                </p>

                <x-wire-button href="{{ route('admin.appointments.consultation', $data['next_appointment']) }}" class="w-full">
                    Gestionar Cita
                </x-wire-button>
                @else
                <p class="mt-4 text-gray-500">
                    No tiene citas programadas para hoy.
                </p>
            @endif
            </x-wire-card>
        </div>
        <div class="lg:col-span-2">
            <x-wire-card>
                <p class="text-lg font-semibold text-gray-900">
                    Agenda para hoy
                </p>
                <ul class="mt-4 divide-y divide-gray-200 ">
                    @forelse ($data['appointments_today'] as $appointment)
                        <li class="py-3 flex-justify-between items-center">
                            <div>
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ $appointment->patient->user->name }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ $appointment->date->format('d/m/Y') }} a las {{ $appointment->start_time->format('h:i A') }}
                                </p>
                            </div>
                            <a href="{{ route('admin.appointments.consultation',$appointment) }}" class="text-sm text-indigo-600 hover:text-indigo-800">
                                Gestionar cita
                            </a>
                        </li>    
                        @empty
                        <li class="py-3">
                            <p class="text-gray-500">
                                No tiene citas programadas para hoy.
                            </p>
                        </li>
                    @endforelse
                </ul>
            </x-wire-card>
        </div>
    </div>
</div>
