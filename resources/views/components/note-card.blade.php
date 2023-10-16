@props(['note'])

<div class="relative border-2 border-black rounded-2xl p-2 hover:shadow-2xl bg-white transition transform-gpu ease-in hover:-translate-y-1.5 hover:scale-[1.03] hover:opacity-80 duration-300">
    <div class="h-2/3 w-full bg-gray-200 border-2 border-black rounded-xl overflow-hidden lg:aspect-none">
        <img src="{{ asset('storage/'.$note->thumbnail) }}" alt="Thumbnail" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
    </div>
    <div class="flex flex-col pt-3 h-1/3 grid-rows-3">
        <h3 class="text-xs text-gray-700">
            <a href="/notes?category={{ $note->category->name }}&{{ http_build_query(request()->except('category', 'page')) }}" class="break-all border rounded-full px-2">
                #{{ $note->category->name }}
            </a>
        </h3>
        <span><a href="/notes/{{ $note->slug }}" class="ml-1 font-semibold text-lg text-gray-900 truncate">{{ $note->title }}</a></span>

        <span class="mt-2 ml-1 text-sm text-gray-500">{{ $note->created_at->diffForHumans() }}</span>

        <div class="flex flex-row-reverse gap-1 mr-2">
            @if (request()->fullUrlIs('*/notes'))
                <x-input-form.form method="post" action="/trash/{{ $note->slug }}">
                    @method('patch')
                    <button><ion-icon name="trash-bin-outline"></ion-icon></button>
                </x-input-form.form>
            @else
                <x-input-form.form method="post" action="/revive/{{ $note->slug }}">
                    @method('patch')
                    <button><ion-icon name="refresh-circle"></ion-icon></button>
                </x-input-form.form>

                <x-input-form.form action="/notes/{{ $note->slug }}" method="post">
                    @method('delete')
                    <button><ion-icon name="trash-bin-outline"></ion-icon></button>
                </x-input-form.form>
            @endif
            <a href="/notes/edit/{{ $note->slug }}"><ion-icon name="create-outline"></ion-icon></a>
        </div>
    </div>
</div>
