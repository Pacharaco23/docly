<x-admin-layout title="Soporte Técnico" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('dashboard'),
    ],
    [
        'name' => 'Soporte',
    ],
]">
    @livewire('admin.support-manager')
</x-admin-layout>
