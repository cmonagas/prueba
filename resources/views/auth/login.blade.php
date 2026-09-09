<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ventas</title>
    
    {{-- 
        asset(): Helper de Laravel que genera la URL absoluta apuntando a la carpeta /public.
        Evita problemas de rutas relativas sin importar la profundidad de la URL actual.
    --}}
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}"/>
</head>
<body>

<main>
    <div class="formulario">
        <div class="logotipo">
            {{-- Apunta a /public/img/logo.png dinámicamente --}}
            <img src="{{ asset('img/logo.png') }}" alt="Logo Cesar Monagas"/>
        </div>
        
        <p>Iniciar Sesión</p>

        {{-- 
            DIRECTIVA @if: Condicional de Blade.
            session('status'): Verifica si hay un mensaje temporal guardado en la sesión flash 
            (por ejemplo, cuando se redirige tras restablecer la contraseña exitosamente).
        --}}
        @if (session('status'))
            <div style="color: #d4edda; margin-bottom: 10px; font-size: 14px;">
                {{-- {{ }}: Sintaxis de impresión de Blade con escape de HTML para prevenir XSS --}}
                {{ session('status') }}
            </div>
        @endif

        {{-- 
            $errors: Variable global inyectada automáticamente por Laravel en todas las vistas.
            ->any(): Método que devuelve true si la validación arrojó al menos un error.
        --}}
        @if ($errors->any())
            <div style="color: #ffcccc; margin-bottom: 10px; font-size: 13px; text-align: left;">
                <ul>
                    {{-- @foreach: Bucle de Blade para recorrer la colección de errores --}}
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- 
            route('login'): Helper que consulta el nombre asignado a la ruta POST en web.php 
            y genera la URL correspondiente de forma dinámica.
        --}}
        <form method="POST" action="{{ route('login') }}">
            
            {{-- 
                @csrf: Directiva obligatoria en formularios POST. 
                Genera un campo oculto <input type="hidden" name="_token" value="..."> 
                para prevenir ataques Cross-Site Request Forgery.
            --}}
            @csrf
            
            {{-- 
                old('email'): Mantiene el valor ingresado previamente en el input tras un error 
                de validación, evitando que el usuario tenga que escribirlo de nuevo.
            --}}
            <input type="email" name="email" placeholder="Usuario / Correo" value="{{ old('email') }}" required autofocus autocomplete="username"/>
            
            <input type="password" name="password" placeholder="Clave" required autocomplete="current-password"/>
            
            <input type="submit" name="btn" value="Ingresar"/>
            
            {{-- 
                Route::has('nombre.ruta'): Comprueba si la ruta existe en el sistema antes de renderizar 
                el enlace. Evita errores si una funcionalidad (como recuperar clave) no está registrada.
            --}}
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