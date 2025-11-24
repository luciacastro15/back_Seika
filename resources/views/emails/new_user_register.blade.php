{{-- resources/views/emails/new_user_registered.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo registro en Seika Audit</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #d9534f;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
        }
        .content {
            padding: 30px;
            color: #333333;
            line-height: 1.6;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888888;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nuevo usuario registrado</h1>
        </div>
        <div class="content">
            <p>Se ha registrado un nuevo usuario en <strong>Seika Audit</strong>:</p>
            <ul>
                <li><strong>Nombre:</strong> {{ $usuario->nombre }}</li>
                <li><strong>Email:</strong> {{ $usuario->email }}</li>
                <li><strong>Fecha de registro:</strong> {{ $usuario->created_at->format('d/m/Y H:i') }}</li>
            </ul>
            <p>Ya puedes revisar sus datos en el panel de administración.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Seika Audit. Notificación interna.</p>
        </div>
    </div>
</body>
</html>