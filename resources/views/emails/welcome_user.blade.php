{{-- resources/views/emails/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida a Seika Audit</title>
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
            background-color: #004aad;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
            color: #333333;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #004aad;
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
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
            <h1>¡Bienvenido a Seika Audit!</h1>
        </div>
        <div class="content">
            <p>Hola <strong>{{ $usuario->nombre }}</strong>,</p>
            <p>Gracias por registrarte en <strong>Seika Audit</strong>. Estamos encantados de tenerte con nosotros.</p>
            <p>Con nuestra plataforma podrás gestionar tus auditorías y concesionarios de forma más clara, profesional y eficiente.</p>
            <p>Haz clic en el siguiente botón para comenzar:</p>
            <a href="{{ url('/dashboard') }}" class="btn">Ir al Panel</a>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Seika Audit. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>