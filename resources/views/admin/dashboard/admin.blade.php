<div class="grid lg:grid-cols-3 gap-6 mb-8">
        <x-wire-card>
            <p class="text-sm font-semibold text-gray-500">
                Total de pacientes
            </p>
            <p class="mt-2 text-3xl font-bold text-gray-900">
                {{ $data['total_patients'] }}
            </p>
        </x-wire-card>
        <x-wire-card>
            <p class="text-sm font-semibold text-gray-500">
                Total de doctores
            </p>
            <p class="mt-2 text-3xl font-bold text-gray-900">
                {{ $data['total_doctors'] }}
            </p>
        </x-wire-card>
        <x-wire-card>
            <p class="text-sm font-semibold text-gray-500">
                Citas para hoy
            </p>
            <p class="mt-2 text-3xl font-bold text-gray-900">
                {{ $data['appointments_today'] }}
            </p>
        </x-wire-card>
    </div>
    <div class="grid lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <x-wire-card>
                <p class="text-lg font-semibold text-gray-900 ">
                    Usuarios registrados recientemente
                </p>
                <ul class="divide-y divide-gray-200">
                    @foreach ($data['recent_users'] as $user)
                        <li class="py-3 flex justify-between items-center">
                            <div>
                                <p class="text-sm font-semibold text-gray-900">
                                    {{ $user->name }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ $user->email }}
                                </p>
                            </div>
                            <span class="text-xs text-gray-500">
                                {{ $user->created_at->diffForHumans() }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </x-wire-card>

        </div>

        <div>
            <x-wire-card>
                <p class="text-lg font-semibold text-gray-900">
                    Acciones rápidas
                </p>
                <div class="mt-4 space-y-2">
                    <x-wire-button class="w-full" href="{{ route('admin.patients.index') }}" indigo>
                        Gestionar Usuarios
                    </x-wire-button>
                    <x-wire-button class="w-full" href="{{ route('admin.doctors.index') }}" blue>
                        Gestionar Doctores
                    </x-wire-button>
                    <x-wire-button class="w-full" href="{{ route('admin.appointments.index') }}" gray>
                        Gestionar Citas
                    </x-wire-button>
                </div>
            </x-wire-card>
        </div>
    </div>