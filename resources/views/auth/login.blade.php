<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ventas</title>
    <!-- Carga tu CSS custom sin interferir con Tailwind -->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}"/>
</head>
<body>

<main>
    <div class="formulario">
        <div class="logotipo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Cesar Monagas"/>
        </div>
        
        <p>Iniciar Sesión</p>

        <!-- Mensaje de estado (ej. cuando se restablece la contraseña) -->
        @if (session('status'))
            <div style="color: #d4edda; margin-bottom: 10px; font-size: 14px;">
                {{ session('status') }}
            </div>
        @endif

        <!-- Errores de validación de credenciales -->
        @if ($errors->any())
            <div style="color: #ffcccc; margin-bottom: 10px; font-size: 13px; text-align: left;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

		<form method="POST" action="{{ route('login') }}">
			@csrf
			
			<!-- Input tipo email (ahora sí recibirá el CSS) -->
			<input type="email" name="email" placeholder="Usuario / Correo" value="{{ old('email') }}" required autofocus autocomplete="username"/>
			
			<input type="password" name="password" placeholder="Clave" required autocomplete="current-password"/>
			
			<input type="submit" name="btn" value="Ingresar"/>
			
			@if (Route::has('password.request'))
				<a href="{{ route('password.request') }}">¿Olvidaste Tu Clave?</a>
			@endif

			@if (Route::has('register'))
				<a href="{{ route('register') }}">
					<input type="button" value="Crear Cuenta Nueva"/>
				</a>
			@endif
		</form>
  
    </div>
</main>

</body>
</html>