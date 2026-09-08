<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Clave - Ventas</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}"/>
</head>
<body>

<main>
    <div class="formulario">
        <div class="logotipo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Cesar Monagas"/>
        </div>
        
        <p>Restablecer Contraseña</p>

        <!-- Mensaje cuando se envía el correo exitosamente -->
        @if (session('status'))
            <div style="color: #d4edda; margin-bottom: 10px; font-size: 14px;">
                {{ session('status') }}
            </div>
        @endif

        <!-- Errores de validación -->
        @if ($errors->any())
            <div style="color: #ffcccc; margin-bottom: 10px; font-size: 13px; text-align: left;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required autofocus autocomplete="username"/>
            
            <input type="submit" name="btn" value="Enviar Enlace"/>
            
            <a href="{{ route('login') }}">Volver al Iniciar Sesión</a>
        </form>
    </div>
</main>

</body>
</html>