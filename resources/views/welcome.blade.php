<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AURORA FINANCIERA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
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
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <header class="bg-blue-600 text-white">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <h1 class="text-2xl font-bold">
                <a href="{{ url('/') }}" class="title-link transition duration-300">AURORA FINANCIERA</a>
            </h1>
            <nav>
                <ul class="flex space-x-4">
                    @auth
                        <li>
                            <a href="{{ url('/dashboard') }}" class="hover:text-blue-200">Dashboard</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="hover:text-blue-200">Iniciar Sesión</a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="hover:text-blue-200">Registrarse</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto mt-16 px-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6 text-center">
                <img src="{{ asset('images/inicio.png') }}" alt="Aurora Financiera" class="mx-auto w-full max-w-[150px] rounded-md shadow-lg mb-6">
                <h2 class="text-3xl font-bold text-blue-600 mb-4">Bienvenido a AURORA FINANCIERA</h2>
                <p class="text-gray-700 text-lg mb-6">
                    Gestiona tus finanzas de manera eficiente y profesional con nuestro sistema de facturación electrónica. Aurora Financiera está diseñada para ayudarte a simplificar procesos, mejorar la organización y garantizar cumplimiento fiscal.
                </p>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-500">
                    ¡Regístrate Ahora!
                </a>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto text-center py-6">
            <p>&copy; {{ date('Y') }} AURORA FINANCIERA. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
