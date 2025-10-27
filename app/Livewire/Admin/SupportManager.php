<?php

namespace App\Livewire\Admin;

use App\Mail\SupportMessageMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SupportManager extends Component
{
    public $subject;
    public $message;

    protected $rules = [
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        // Enviar correo a desarrolladores
       Mail::to('soportedocly@gmail.com') // Cambia al correo real
            ->send(new SupportMessageMail($this->subject, $this->message, auth()->user()));


        // Limpiar campos
        $this->reset(['subject', 'message']);

        // Notificación
       $this->dispatch('swal', [
            'icon' => 'success',
            'title' => 'Mensaje enviado',
            'text' => 'Tu mensaje de soporte fue enviado correctamente.'

        ]);
    }
    public function render()
    {
        return view('livewire.admin.support-manager');
    }
}
