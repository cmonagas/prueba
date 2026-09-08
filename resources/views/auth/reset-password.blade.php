<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Clave - Ventas</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}"/>
</head>
<body>

<main>
    <div class="formulario">
        <div class="logotipo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Cesar Monagas"/>
        </div>
        
        <p>Ingresa tu Nueva Clave</p>

        @if ($errors->any())
            <div style="color: #ffcccc; margin-bottom: 10px; font-size: 13px; text-align: left;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Token obligatorio enviado en la URL por el correo -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"/>
            
            <input type="password" name="password" placeholder="Nueva Clave" required autocomplete="new-password"/>
            
            <input type="password" name="password_confirmation" placeholder="Confirmar Nueva Clave" required autocomplete="new-password"/>
            
            <input type="submit" name="btn" value="Guardar Nueva Clave"/>
        </form>
    </div>
</main>

</body>
</html>