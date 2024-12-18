<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Inter:400,500,600&display=swap" rel="stylesheet" />

        <!-- TailwindCSS -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom Styles -->
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
            .bg-primary {
                background-color: #F3F4F6;
            }
            .card {
                background-color: white;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                padding: 2rem;
            }
            .card:hover {
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            }
            .logo {
                color: #4B89FF;
                font-size: 2rem;
                font-weight: 700;
            }
            .btn-primary {
                background-color: #4B89FF;
                color: white;
                padding: 0.75rem 1.5rem;
                border-radius: 25px;
                transition: all 0.3s;
            }
            .btn-primary:hover {
                background-color: #3578E5;
            }
            .form-input {
                border-radius: 8px;
                border: 1px solid #D1D5DB;
                padding: 0.75rem;
                width: 100%;
                font-size: 1rem;
                margin-bottom: 1rem;
                transition: all 0.3s;
            }
            .form-input:focus {
                border-color: #4B89FF;
                outline: none;
            }
            .form-label {
                font-weight: 500;
                margin-bottom: 0.5rem;
                color: #333;
            }
        </style>
    </head>
    <body class="bg-primary text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <!-- Logo -->
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <!-- Card with form -->
            <div class="card w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <!-- Form Content -->
                {{ $slot }}
            </div>

            <!-- Footer (Optional) -->
            <footer class="mt-8 text-center text-gray-500">
                <p>© {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.</p>
            </footer>
        </div>
    </body>
</html>
