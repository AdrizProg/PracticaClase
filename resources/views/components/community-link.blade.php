@props(['links'])
<div class="lg:w-3/4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        {{ __("Here you will see the community Links") }}

        <ul class="list-disc pl-5 space-y-4">
            @foreach ($links as $link)
                <li>
                    <p class="font-semibold">{{$link->title}}</p>
                    <small class="text-gray-500">Contributed by: {{$link->creator->name}}
                        {{$link->updated_at->diffForHumans()}}</small>
                </li>
            @endforeach
        </ul>
        <!-- Paginación de los links -->
        <div class="mt-6">
            {{$links->links()}}
            <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
style="background-color: {{ $link->channel->color }}">
{{ $link->channel->title }}
</span>
        </div>
    </div>
</div>

