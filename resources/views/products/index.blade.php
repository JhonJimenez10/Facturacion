<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-blue-600 leading-tight">
            {{ __('Listado de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-blue-600 mb-4">¡Bienvenido al listado de productos!</h3>
                    <p class="text-gray-700 text-lg mb-6">
                        Aquí puedes gestionar todos los productos de tu inventario.
                    </p>

                    <!-- Tabla de productos -->
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Descripción</th>
                                <th class="px-4 py-2">Precio</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se irían los productos -->
                            @foreach ($products as $product)
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="px-4 py-2">{{ $product->name }}</td>
                                    <td class="px-4 py-2">{{ $product->description }}</td>
                                    <td class="px-4 py-2">{{ $product->price }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('products.edit', $product) }}" class="text-blue-600 hover:text-blue-800">Editar</a>
                                        |
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
