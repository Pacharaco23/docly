<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Soporte Técnico</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6f8; margin: 0; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <!-- Header -->
        <div style="background-color: #4f46e5; color: #fff; padding: 20px;">
            <h2 style="margin: 0; font-size: 20px;">Nuevo Ticket de Soporte</h2>
        </div>

        <!-- Body -->
        <div style="padding: 20px; color: #333;">
            <p><strong>Usuario:</strong> {{ $user->name }} ({{ $user->email }})</p>
            <p><strong>Asunto:</strong> {{ $subjectMessage }}</p>
            <p><strong>Mensaje:</strong></p>
            <div style="border-left: 4px solid #4f46e5; padding-left: 10px; white-space: pre-line; margin-top: 5px; background-color: #f0f4ff; padding: 10px; border-radius: 4px;">
                {{ $bodyMessage }}
            </div>
        </div>

        <!-- Footer -->
        <div style="background-color: #f4f6f8; padding: 15px; text-align: center; font-size: 12px; color: #777;">
            Este mensaje fue enviado desde el sistema de gestión de citas médicas.
        </div>
    </div>
</body>
</html>
