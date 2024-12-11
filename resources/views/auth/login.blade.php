<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iniciar Sesión - AURORA FINANCIERA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <style>
        body {
            background: linear-gradient(to bottom, #ebf8ff, #ffffff);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        a.title-link:hover {
            color: #ebf8ff;
            background-color: #1e40af; /* Azul oscuro */
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Encabezado -->
    <header class="bg-blue-600 text-white py-4">
        <div class="container mx-auto text-center">
            <h1 class="text-2xl font-bold">
                <a href="{{ url('/') }}" class="title-link transition duration-300">
                    AURORA FINANCIERA
                </a>
            </h1>
        </div>
    </header>

    <main>
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
            <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Iniciar Sesión</h2>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Correo Electrónico</label>
                    <input id="email" type="email" name="email" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                    <input id="password" type="password" name="password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-700">Recuérdame</label>
                </div>

                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">¿Olvidaste tu contraseña?</a>
                    @endif
                </div>

                <button type="submit" class="w-full mt-6 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                    Iniciar Sesión
                </button>
            </form>

            <div class="mt-6 text-center">
                <span class="text-gray-600">¿No tienes cuenta?</span>
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Regístrate aquí</a>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white text-center py-4">
        <p>&copy; {{ date('Y') }} AURORA FINANCIERA. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
