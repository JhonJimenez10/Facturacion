<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-blue-600 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    <div x-data="{ open: false }" class="flex">
        <!-- Sidebar -->
        <div
            x-show="open"
            @click.away="open = false"
            class="fixed inset-y-0 left-0 w-64 bg-blue-800 text-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out"
            :class="{ '-translate-x-full': !open, 'translate-x-0': open }"
        >
            <!-- Profile Section -->
            <div class="p-4 border-b border-blue-600">
                <div class="text-lg font-semibold">{{ Auth::user()->name }}</div>
                <div class="text-sm text-blue-300">{{ Auth::user()->email }}</div>
            </div>

            <!-- Navigation Links -->
            <div class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 hover:bg-blue-600 rounded transition ease-in-out">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 9v-6h4v6m-4 0h4" />
                            </svg>
                            Inicio
                        </a>
                    </li>
                    <!-- Add other menu items here -->
                </ul>
            </div>

            <!-- Logout Link -->
            <div class="p-4 border-t border-blue-600">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="w-full text-left px-4 py-2 hover:bg-blue-600 rounded focus:outline-none transition ease-in-out"
                    >
                        {{ __('Cerrar Sesión') }}
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content Area with Dynamic Padding -->
        <main 
            class="flex-1 transition-all duration-300 ease-in-out min-h-screen"
            :class="{
                'pl-64': open,
                'pl-0': !open
            }"
        >
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-700 text-white">
                            <h3 class="text-2xl font-bold mb-4">¡Bienvenido al Panel de Control!</h3>
                            <p class="text-lg">
                                Aquí puedes gestionar y supervisar todas tus actividades de manera eficiente.
                            </p>
                        </div>
                        <div class="p-6 bg-gray-100">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition duration-300">
                                    <h4 class="text-blue-600 font-bold text-lg">Finanzas</h4>
                                    <p class="text-gray-600">Monitorea y controla tus ingresos y egresos fácilmente.</p>
                                </div>
                                <!-- Enlace para redirigir a la vista de facturación -->
                                <a href="{{ route('facturas.index') }}" class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition duration-300">
                                    <h4 class="text-blue-600 font-bold text-lg">Facturación</h4>
                                    <p class="text-gray-600">Genera y administra tus facturas electrónicas.</p>
                                </a>
                                <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition duration-300">
                                    <h4 class="text-blue-600 font-bold text-lg">Reportes</h4>
                                    <p class="text-gray-600">Obtén reportes detallados sobre tus operaciones.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>