<nav x-data="{ open: false, activeSubMenu: null }" class="bg-blue-700 shadow-lg text-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-6">
        <div class="flex justify-between h-16">
            <div class="flex items-center space-x-4">
                <!-- Menu Button for Sidebar -->
                <div>
                    <button @click="open = !open" aria-label="Toggle sidebar" class="text-white hover:text-blue-300 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <!-- Logo -->
                <div class="shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md bg-blue-600 hover:bg-blue-800 focus:outline-none transition ease-in-out">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a 1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-blue-500">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
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

    <!-- Sidebar -->
    <div
        x-show="open"
        @click.away="open = false"
        class="fixed inset-y-0 left-0 w-64 bg-blue-800 text-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out z-40"
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
                <li x-data="{ open: false }">
                    <button @click="activeSubMenu = activeSubMenu === 'producto' ? null : 'producto'" class="flex items-center w-full text-left px-4 py-2 hover:bg-blue-600 rounded focus:outline-none transition ease-in-out">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                        </svg>
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
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2m16 0v-2a4 4 0 00-4-4h-.5a4 4 0 00-4 4v2m6 0h6m-6 0H3" />
                        </svg>
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
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
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
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                        </svg>
                        Proveedores
                    </button>
                    <ul x-show="activeSubMenu === 'proveedores'" class="pl-4 mt-2 space-y-2 bg-blue-700 rounded shadow-lg transition ease-in-out">
                        <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría 1</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría 2</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">Subcategoría 3</a></li>
                    </ul>
                </li>
                <li x-data="{ open: false }">
                    <button @click="activeSubMenu = activeSubMenu === 'asociados' ? null : 'asociados'" class="flex items-center w-full text-left px-4 py-2 hover:bg-blue-600 rounded focus:outline-none transition ease-in-out">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                        </svg>
                        Asociados
                    </button>
                    <ul x-show="activeSubMenu === 'asociados'" class="pl-4 mt-2 space-y-2 bg-blue-700 rounded shadow-lg transition ease-in-out">
                        <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">SRI</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">IESS</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-blue-600 rounded">MRL</a></li>
                    </ul>
                </li>
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

    <!-- Content Adjustment -->
    <div :class="{ 'pl-64': open }" class="transition-all duration-300">
        <!-- Main Content Here -->
    </div>
</nav>