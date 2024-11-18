<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
        @if (session('token'))
            <p>Token: {{ session('token') }}</p>
        @endif
        <x-link-flash></x-link-flash>
        <ul class="flex space-x-4">

            <li>

                <a class="px-4 py-2 rounded-lg {{ request()->exists('popular') ? 'text-blue-500 hover:text-blue-700' : 'text-gray-500 cursor-not-allowed' }}"
                    href="{{ request()->url() }}">

                    Most recent

                </a>

            </li>

            <li>

                <a class="px-4 py-2 rounded-lg {{ request()->exists('popular') ? 'text-gray-500 cursor-not-allowed' : 'text-blue-500 hover:text-blue-700' }}"
                    href="?popular">

                    Most popular

                </a>

            </li>

        </ul>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Usamos flex para alinear la lista a la izquierda y el formulario a la derecha -->
            <div class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6">
                <!-- Sección de los enlaces (ocupa el mayor espacio) -->

                <x-community-link :links="$links" />


                <!-- Sección del formulario de agregar link (ocupa menos espacio y está a la derecha) -->
                <div class="lg:w-1/4">

                    <x-community-add-link :channels="$channels" />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>