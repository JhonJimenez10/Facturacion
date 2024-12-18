<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div x-data="{ open: false, activeSubMenu: null, iframeSrc: '' }" class="min-h-screen bg-gray-100 flex flex-col">
            <!-- Barra de navegación -->
            <nav class="bg-blue-700 shadow-lg text-white">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-6">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center space-x-4">
                            <!-- Botón para mostrar/ocultar el sidebar -->
                            <div>
                                <button @click="open = !open" aria-label="Toggle sidebar" class="text-white hover:text-blue-300 focus:outline-none">
                                    <i class="fas fa-bars w-6 h-6"></i>
                                </button>
                            </div>
                            <!-- Logo -->
                            <div class="shrink-0">
                                <a href="{{ route('dashboard') }}">
                                    <x-application-logo class="block h-9 w-auto fill-current text-white" />
                                </a>
                            </div>
                        </div>

                        <!-- Menú de usuario -->
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md bg-blue-600 hover:bg-blue-800 focus:outline-none transition ease-in-out">
                                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="h-8 w-8 rounded-full object-cover">
                                        <div class="ms-2">{{ Auth::user()->name }}</div>
                                        <div class="ms-1">
                                            <i class="fas fa-chevron-down fill-current h-4 w-4"></i>
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')" class="hover:bg-blue-500">
                                        {{ __('Perfil') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="hover:bg-blue-500">
                                            {{ __('Cerrar Sesión') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Menú lateral -->
            <div
                x-show="open"
                @click.away="open = false"
                class="fixed inset-y-0 left-0 w-64 bg-blue-800 text-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out z-40"
                :class="{ '-translate-x-full': !open, 'translate-x-0': open }"
            >
                <!-- Sección de perfil -->
                <div class="p-4 border-b border-blue-600">
                    <div class="flex items-center space-x-4">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="h-10 w-10 rounded-full object-cover">
                        <div>
                            <div class="text-lg font-semibold">{{ Auth::user()->name }}</div>
                            <div class="text-sm text-blue-300">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </div>

                <!-- Enlaces de navegación -->
                <div class="p-4">
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 hover:bg-blue-600 rounded transition ease-in-out">
                                <i class="fas fa-home w-5 h-5 mr-2"></i>
                                Inicio
                            </a>
                        </li>
                        <li x-data="{ open: false }">
                            <button @click="activeSubMenu = activeSubMenu === 'producto' ? null : 'producto'" class="flex items-center w-full text-left px-4 py-2 hover:bg-blue-600 rounded focus:outline-none transition ease-in-out">
                                <i class="fas fa-box w-5 h-5 mr-2"></i>
                                Producto
                            </button>
                            <ul x-show="activeSubMenu === 'producto'" class="pl-4 mt-2 space-y-2 bg-blue-700 rounded shadow-lg transition ease-in-out">
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría 1</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría 2</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría 3</a></li>
                            </ul>
                        </li>
                        <li x-data="{ open: false }">
                            <button @click="activeSubMenu = activeSubMenu === 'facturacion' ? null : 'facturacion'" class="flex items-center w-full text-left px-4 py-2 hover:bg-blue-600 rounded focus:outline-none transition ease-in-out">
                                <i class="fas fa-file-invoice w-5 h-5 mr-2"></i>
                                Facturación
                            </button>
                            <ul x-show="activeSubMenu === 'facturacion'" class="pl-4 mt-2 space-y-2 bg-blue-700 rounded shadow-lg transition ease-in-out">
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría A</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría B</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría C</a></li>
                            </ul>
                        </li>
                        <li x-data="{ open: false }">
                            <button @click="activeSubMenu = activeSubMenu === 'clientes' ? null : 'clientes'" class="flex items-center w-full text-left px-4 py-2 hover:bg-blue-600 rounded focus:outline-none transition ease-in-out">
                                <i class="fas fa-users w-5 h-5 mr-2"></i>
                                Clientes
                            </button>
                            <ul x-show="activeSubMenu === 'clientes'" class="pl-4 mt-2 space-y-2 bg-blue-700 rounded shadow-lg transition ease-in-out">
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría X</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría Y</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría Z</a></li>
                            </ul>
                        </li>
                        <li x-data="{ open: false }">
                            <button @click="activeSubMenu = activeSubMenu === 'proveedores' ? null : 'proveedores'" class="flex items-center w-full text-left px-4 py-2 hover:bg-blue-600 rounded focus:outline-none transition ease-in-out">
                                <i class="fas fa-truck w-5 h-5 mr-2"></i>
                                Proveedores
                            </button>
                            <ul x-show="activeSubMenu === 'proveedores'" class="pl-4 mt-2 space-y-2 bg-blue-700 rounded shadow-lg transition ease-in-out">
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría 1</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría 2</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría 3</a></li>
                            </ul>
                        </li>
                        <li x-data="{ open: false }">
                            <button @click="activeSubMenu = activeSubMenu === 'reportes' ? null : 'reportes'" class="flex items-center w-full text-left px-4 py-2 hover:bg-blue-600 rounded focus:outline-none transition ease-in-out">
                                 <i class="fas fa-file-alt w-5 h-5 mr-2"></i>
                                 Reportes
                            </button>
                            <ul x-show="activeSubMenu === 'reportes'" class="pl-4 mt-2 space-y-2 bg-blue-700 rounded shadow-lg transition ease-in-out">
                                <li><a href="http://127.0.0.1:8000/dashboard#" class="block px-4 py-2 hover:bg-blue-600 rounded">Ventas</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Compras</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Facturas</a></li>
                            </ul>
                        </li>
                        <li x-data="{ open: false }">
                            <button @click="activeSubMenu = activeSubMenu === 'asociados' ? null : 'asociados'" class="flex items-center w-full text-left px-4 py-2 hover:bg-blue-600 rounded focus:outline-none transition ease-in-out">
                                <i class="fas fa-handshake w-5 h-5 mr-2"></i>
                                Asociados
                            </button>
                            <ul x-show="activeSubMenu === 'asociados'" class="pl-4 mt-2 space-y-2 bg-blue-700 rounded shadow-lg transition ease-in-out">
                                <li><a href="#" @click.prevent="iframeSrc = 'https://srienlinea.sri.gob.ec/sri-en-linea/inicio/NAT'" class="block px-4 py-2 hover:bg-blue-600 rounded">SRI</a></li>
                                <li><a href="#" @click.prevent="iframeSrc = 'https://www.iess.gob.ec/'" class="block px-4 py-2 hover:bg-blue-600 rounded">IESS</a></li>
                                <li><a href="#" @click.prevent="iframeSrc = 'https://sut.trabajo.gob.ec/'" class="block px-4 py-2 hover:bg-blue-600 rounded">MRL</a></li>
                            </ul>
                        </li>
                        <li x-data="{ open: false }">
                            <button @click="activeSubMenu = activeSubMenu === 'soporte' ? null : 'soporte'" class="flex items-center w-full text-left px-4 py-2 hover:bg-blue-600 rounded focus:outline-none transition ease-in-out">
                                <i class="fas fa-life-ring w-5 h-5 mr-2"></i>
                                Soporte
                            </button>
                            <ul x-show="activeSubMenu === 'soporte'" class="pl-4 mt-2 space-y-2 bg-blue-700 rounded shadow-lg transition ease-in-out">
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría 1</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría 2</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría 3</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- Cerrar sesión -->
                <div class="p-4 border-t border-blue-600">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full px-4 py-2 hover:bg-blue-600 rounded">Cerrar Sesión</button>
                    </form>
                </div>
            </div>

            <!-- Contenedor del iframe -->
            <div x-show="iframeSrc" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-4xl sm:w-full">
                    <div class="bg-blue-700 px-4 py-2 flex justify-between items-center">
                        <h3 class="text-lg leading-6 font-medium text-white">Contenido</h3>
                        <button @click="iframeSrc = ''" class="text-white hover:text-blue-300">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <iframe :src="iframeSrc" class="w-full h-96"></iframe>
                </div>
            </div>

            <!-- Contenido principal -->
            <div class="flex-1 transition-all duration-300" :class="{ 'pl-64': open }">
                <main class="py-6 px-4">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>