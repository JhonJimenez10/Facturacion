<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-red-600">
            {{ __('Eliminar Cuenta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Una vez que tu cuenta sea eliminada, todos sus datos y recursos serán eliminados de forma permanente. Antes de eliminar tu cuenta, asegúrate de descargar cualquier información que desees conservar.') }}
        </p>
    </header>

    <x-danger-button
        x-data="{}"
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 hover:bg-red-500 focus:ring-red-500"
    >
        {{ __('Eliminar Cuenta') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-red-600">
                {{ __('¿Estás seguro de que deseas eliminar tu cuenta?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Una vez que tu cuenta sea eliminada, todos sus datos y recursos serán eliminados de forma permanente. Por favor, introduce tu contraseña para confirmar que deseas eliminar tu cuenta de forma permanente.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Contraseña') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500"
                    placeholder="{{ __('Contraseña') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button 
                    x-on:click="$dispatch('close')"
                    class="bg-gray-200 text-gray-700 hover:bg-gray-300 focus:ring-gray-300"
                >
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3 bg-red-600 hover:bg-red-500 focus:ring-red-500">
                    {{ __('Eliminar Cuenta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>