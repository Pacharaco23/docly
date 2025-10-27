<div class="p-4 bg-white rounded shadow-md max-w-lg mx-auto">
    <h2 class="text-lg font-semibold mb-4">Soporte Técnico</h2>

   <div class="mb-4 space-y-2">
    <p><i class="fa-solid fa-phone mr-2"></i><strong>Teléfono:</strong> +505 1234-5678</p>
    <p><i class="fa-brands fa-whatsapp mr-2"></i><strong>WhatsApp:</strong> <a href="https://wa.me/50512345678" target="_blank" class="text-blue-600">Enviar mensaje</a></p>
    <p><i class="fa-solid fa-envelope mr-2"></i><strong>Correo:</strong> <a href="mailto:pachpiece@gmail.com" class="text-blue-600">pachpiece@gmail.com</a></p>
    <p><i class="fa-solid fa-clock mr-2"></i><strong>Horario:</strong> Lunes a Viernes 08:00 - 17:00</p>
</div>


    <form wire:submit.prevent="submit" class="space-y-4">
        <x-wire-input label="Asunto" wire:model.defer="subject" placeholder="Describe el problema"/>
        <x-wire-textarea label="Mensaje" wire:model.defer="message" placeholder="Escribe tu mensaje"/>
        <x-wire-button type="submit" primary label="Enviar mensaje"/>
    </form>
</div>
