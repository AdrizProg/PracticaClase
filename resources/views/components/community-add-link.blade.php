<div class="md:col-span-1 bg-gray-800 p-6 rounded-lg shadow-md border border-gray-600 self-start">
    <h3 class="text-xl font-semibold mb-4 text-white">Contribute a link</h3>
    <form method="GET" action="/dashboard">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-white font-medium">Title:</label>
            <input type="text" id="title" name="title"
                class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="What is the title of your article?">
        </div>

        <div class="mb-4">
            <label for="link" class="block text-white font-medium">Link:</label>
            <input type="text" id="link" name="link"
                class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="What is the URL?">
        </div>

        <div class="pt-3">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Contribute!</button>
        </div>
    </form>
</div>

{{-- ¿Que hace la directiva @csrf? --}}
{{-- La directiva csrf se encarga de cifrar los paquetes de inicio de sesion para que no puedan capturarlos y suplantar nuestro inicio de sesion haciendose pasa por nosotros --}}

{{-- ¿Que metodo se llamara en el controlador CommunityController al enviar el formulario? --}}
{{-- Se llama al metodo comunity, pero lo cambiamos para llamar al dashboard --}}

{{-- Intenta enviar un enlace. ¿Que ocurrse y como puedes resolver el problema? --}}
{{-- The POST method is not supported for route dashboard. Supported methods: GET, HEAD. La forma de solucionarlo es cambiando el metodo del formulario, y en vez de mandarlo por post habra que pasarlo por get. --}}