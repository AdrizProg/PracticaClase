<div class="md:col-span-1 bg-gray-800 p-6 rounded-lg shadow-md border border-gray-600 self-start">
    <h3 class="text-xl font-semibold mb-4 text-white">Contribute a link</h3>
    <form method="POST" action="/dashboard">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-white font-medium">Title:</label>
            <input type="text" id="title" name="title"
                class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('title') is-invalid @enderror"
                placeholder="What is the title of your article?" value="{{ old('title') }}">
            @error('title')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ $message }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
                        onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414 7.066 14.35a1 1 0 01-1.414-1.414L8.586 10 5.652 7.066a1 1 0 011.414-1.414L10 8.586l2.934-2.934a1 1 0 011.414 1.414L11.414 10l2.934 2.934a1 1 0 010 1.415z" />
                        </svg>
                    </span>
                </div>

            @enderror
        </div>

        <div class="mb-4">
            <label for="link" class="block text-white font-medium">Link:</label>
            <input type="text" id="link" name="link"
                class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('link') is-invalid @else is-valid @enderror"
                placeholder="What is the URL?" value="{{ old('link') }}">
            @error('link')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ $message }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
                        onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414 7.066 14.35a1 1 0 01-1.414-1.414L8.586 10 5.652 7.066a1 1 0 011.414-1.414L10 8.586l2.934-2.934a1 1 0 011.414 1.414L11.414 10l2.934 2.934a1 1 0 010 1.415z" />
                        </svg>
                    </span>
                </div>

            @enderror
        </div>

        <div class="mb-4">
            <label for="Channel" class="block text-white font-medium">Channel:</label>
            <select
                class="@error('channel_id') is-invalid @enderror mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                name="channel_id">
                <option selected disabled>Pick a Channel...</option>
                @foreach ($channels as $channel)
                    <option value="{{ $channel->id }}">
                        {{ $channel->title }}
                    </option>
                    <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                        {{ $channel->title }}
                    </option>
                @endforeach
            </select>
            @error('channel_id')
                <span class="text-red-500 mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="pt-3">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Contribute!</button>
        </div>
    </form>
</div>

{{-- ¿Que hace la directiva @csrf? --}}
{{-- La directiva csrf se encarga de cifrar los paquetes de inicio de sesion para que no puedan capturarlos y suplantar
nuestro inicio de sesion haciendose pasa por nosotros --}}

{{-- ¿Que metodo se llamara en el controlador CommunityController al enviar el formulario? --}}
{{-- Se llama al metodo comunity, pero lo cambiamos para llamar al dashboard --}}

{{-- Intenta enviar un enlace. ¿Que ocurrse y como puedes resolver el problema? --}}
{{-- The POST method is not supported for route dashboard. Supported methods: GET, HEAD. La forma de solucionarlo es
cambiando el metodo del formulario, y en vez de mandarlo por post habra que pasarlo por get.
Podria parecer que es asi, y es una solucion que realmente funciona, pero la forma correcta de resolverlo es añadiendo
una nueva ruta para que dashboard soporte el metodo post. --}}