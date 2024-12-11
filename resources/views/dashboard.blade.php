<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-blue-600 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-blue-600 mb-4">¡Bienvenido al Panel de Control!</h3>
                    <p class="text-gray-700 text-lg">
                        Aquí puedes gestionar y supervisar todas tus actividades de manera eficiente.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                        <div class="bg-blue-100 p-4 rounded-lg shadow hover:bg-blue-200 transition duration-300">
                            <h4 class="text-blue-600 font-bold text-lg">Finanzas</h4>
                            <p class="text-gray-600">Monitorea y controla tus ingresos y egresos fácilmente.</p>
                        </div>
                        <!-- Enlace para redirigir a la vista de facturación -->
                        <a href="{{ route('facturas.index') }}" class="bg-blue-100 p-4 rounded-lg shadow hover:bg-blue-200 transition duration-300">
                            <h4 class="text-blue-600 font-bold text-lg">Facturación</h4>
                            <p class="text-gray-600">Genera y administra tus facturas electrónicas.</p>
                        </a>
                        <div class="bg-blue-100 p-4 rounded-lg shadow hover:bg-blue-200 transition duration-300">
                            <h4 class="text-blue-600 font-bold text-lg">Reportes</h4>
                            <p class="text-gray-600">Obtén reportes detallados sobre tus operaciones.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
