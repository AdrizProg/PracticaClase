<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
        <x-link-flash></x-link-flash>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Usamos flex para alinear la lista a la izquierda y el formulario a la derecha -->
            <div class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6">
                <!-- Sección de los enlaces (ocupa el mayor espacio) -->

                <x-community-link :links="$links" />
                <x-community-add-link :channels="$channels" />

                <!-- Sección del formulario de agregar link (ocupa menos espacio y está a la derecha) -->
                <div class="lg:w-1/4">



                </div>
            </div>
        </div>
    </div>
</x-app-layout>