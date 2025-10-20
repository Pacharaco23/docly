@if($status)
    <x-wire-badge 
        flat 
        :color="$status->color()" 
        :label="$status->label()" 
    />
@else
    <span class="text-gray-500">Desconocido</span>
@endif
