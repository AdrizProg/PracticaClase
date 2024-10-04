<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Usamos flex para alinear la lista a la izquierda y el formulario a la derecha -->
            <div class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6">
                <!-- Sección de los enlaces (ocupa el mayor espacio) -->
                <div class="lg:w-3/4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Here you will see the community Links") }}
                        
                        <ul class="list-disc pl-5 space-y-4">
                            @foreach ($links as $link)
                                <li>
                                    <p class="font-semibold">{{$link->title}}</p>
                                    <small class="text-gray-500">Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>
                                </li>
                            @endforeach
                        </ul>
                        <!-- Paginación de los links -->
                        <div class="mt-6">
                            {{$links->links()}}
                        </div>
                    </div>
                </div>

                <!-- Sección del formulario de agregar link (ocupa menos espacio y está a la derecha) -->
                <div class="lg:w-1/4">
                    <x-community-add-link />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
