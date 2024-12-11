<nav x-data="{ open: false }" class="bg-blue-700 shadow-lg text-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-lg font-semibold hover:text-blue-300 transition ease-in-out">
                        {{ __('Inicio') }}
                    </x-nav-link>
                    <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')" class="text-lg font-semibold text-black hover:text-blue-900 transition ease-in-out">
                        {{ __('Producto') }}
                    </x-nav-link>
                    <x-nav-link :href="route('facturas.index')" :active="request()->routeIs('facturas.*')" class="text-lg font-semibold text-black hover:text-blue-900 transition ease-in-out">
                        {{ __('Facturación') }}
                    </x-nav-link>
                    <x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.*')" class="text-lg font-semibold text-black hover:text-blue-900 transition ease-in-out">
                        {{ __('Clientes') }}
                    </x-nav-link>
                    <x-nav-link :href="route('proveedores.index')" :active="request()->routeIs('proveedores.*')" class="text-lg font-semibold text-black hover:text-blue-900 transition ease-in-out">
                        {{ __('Proveedores') }}
                    </x-nav-link>
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
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
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

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-blue-200 hover:text-white hover:bg-blue-600 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-blue-700 text-white">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="hover:text-blue-300">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')" class="text-black hover:text-blue-900">
                {{ __('Producto') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('facturas.index')" :active="request()->routeIs('facturas.*')" class="text-black hover:text-blue-900">
                {{ __('Facturación') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.*')" class="text-black hover:text-blue-900">
                {{ __('Clientes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('proveedores.index')" :active="request()->routeIs('proveedores.*')" class="text-black hover:text-blue-900">
                {{ __('Proveedores') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-blue-500">
            <div class="px-4">
                <div class="font-medium text-base">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="hover:text-blue-300">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="hover:text-blue-300">
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
