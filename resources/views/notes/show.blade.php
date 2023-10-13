<x-layout class="bg-teal-100 flex-col justify-end items-center">
    <div class="w-full h-full flex">
        <div class="w-[70%] h-full bg-white flex justify-center items-center">
            <div class="h-[93%] w-[58%] ring-[14px] ring-offset-0 ring-[{{ $note->border_color }}] rounded-2xl bg-[{{ $note->background_color }}] flex flex-col justify-start py-10 px-16 shadow-2xl tracking-wide">
                <div class="text-center text-[{{ $note->title_color }}] font-extrabold text-3xl">{{ $note->title }}</div>
                <ul class="font-bold text-lg list-disc flex flex-col pl-6 gap-4 mt-28 h-4/5 overflow-auto">
                    @foreach ($note->content as $line)
                        <li class="relative border-b-2 border-black border-dashed">
                            <x-input-form.form action="/notes/content/{{ $line->id }}" method="post" class="w-full text-[{{ $note->content_color }}]">
                                @method('patch')
                                <input type="text" class="bg-transparent focus:outline-none w-4/5" name="content" value="{{ $line->content }}">
                                <button type="submit" class="hidden"></button>
                            </x-input-form.form >
                            <x-input-form.form class="absolute right-0 top-1" action="/notes/content/{{ $line->id }}" method="post">
                                @method('delete')
                                <button><ion-icon class="text-lg" name="trash-bin-outline"></ion-icon></button>
                            </x-input-form.form >
                        </li>
                    @endforeach
                </ul>
                
            </div>
        </div>
        <div x-data="{ show: false }" class="w-[30%] py-5 h-full flex flex-col justify-between items-center relative">
            <x-overlay.slide-over class="absolute top-0 right-0">
                <x-slot name="trigger">
                    <button @click="open = true" class="group bg-teal-400 rounded-bl-3xl pl-6 pr-5 py-2 text-3xl">
                        <ion-icon class="text-3xl group-hover:animate-[spin_3s_linear_infinite]" name="settings-sharp"></ion-icon>
                    </button>
                </x-slot>
                <div>
                    <div class="h-[210px] w-[200px] bg-gray-200 border-4 border-teal-600 rounded-xl overflow-hidden lg:aspect-none mb-5">
                        <img src="{{ asset('storage/'.$note->thumbnail) }}" alt="Thumbnail" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    
                    <ul>
                        <li><strong>Title: </strong>{{ $note->title }}</li>
                        <li><strong>Slug: </strong>{{ $note->slug }}</li>
                        <li><strong>Lines of note: </strong>{{ $note->content->count() }}</li>
                        <li><strong>Created at: </strong>{{ $note->created_at }}</li>
                        <li><strong>Updated at: </strong>{{ $note->updated_at }}</li>
                    </ul>
                </div>
            </x-overlay.slide-over>
            
            <div class="relative w-[70%] mt-56">
                <x-input-form.form class="flex flex-col bg-white border-4 border-teal-600 rounded-lg w-auto" method="post" action="/notes/{{ $note->slug }}">
                    <input type="hidden" name="note_id" value="{{ $note->id }}">
                    <textarea required class="bg-transparent resize-none px-4 py-10 h-full focus:outline-none font-bold" id="content" name="content" maxlength="60" minlength="1" cols="40" rows="1" placeholder="Enter your note here..."></textarea>
                    <div class="flex py-1 px-3">
                        <button type="submit"><ion-icon name="send"></ion-icon></button>
                        <div @click="show = !show"><ion-icon class="cursor-pointer" name="happy"></ion-icon></div>
                        <button type="reset"><ion-icon name="reload-circle"></ion-icon></button>
                    </div>
                </x-input-form.form>
                <span 
                    x-show="show"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-10 scale-y-10 -translate-y-3"
                    x-transition:enter-end="opacity-100 scale-y-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-y-100"
                    x-transition:leave-end="opacity-10 scale-y-10 -translate-y-3"
                    class="absolute h-[130px] p-2 overflow-x-hidden overflow-scroll bg-white pointer-event-none mt-2 rounded-xl">
                    @for ($i=128512; $i<129512; $i++)
                        <span id="{{ $i - 128511 }}" onclick="emojis(this.id)" class="cursor-pointer">&#{{ $i }};</span>
                    @endfor
                </span>
            </div>

            <form action="/notes/{{ $note->slug }}/color" method="post" class="flex flex-col items-center w-3/4 gap-5 mb-4">
                @csrf
                @method('patch')
                <div class="grid grid-cols-[150px,_150px] gap-4">
                    <div class="flex flex-col items-center">
                        <label for="background_color" class="font-semibold text-sm">Background Color</label>
                        <input class="appearance-none w-[100px] h-[50px] bg-transparent" type="color" name="background_color" id="background_color" value="{{ $note->background_color }}">
                    </div>
                    <div class="flex flex-col items-center">
                        <label for="background_color" class="font-semibold text-sm">Border Color</label>
                        <input class="appearance-none w-[100px] h-[50px] bg-transparent" type="color" name="border_color" id="border_color" value="{{ $note->border_color }}">
                    </div>
                    <div class="flex flex-col items-center">
                        <label for="background_color" class="font-semibold text-sm">Title Color</label>
                        <input class="appearance-none w-[100px] h-[50px] bg-transparent" type="color" name="title_color" id="title_color" value="{{ $note->title_color }}">
                    </div>
                    <div class="flex flex-col items-center">
                        <label for="background_color" class="font-semibold text-sm">Content Color</label>
                        <input class="appearance-none w-[100px] h-[50px] bg-transparent" type="color" name="content_color" id="content_color" value="{{ $note->content_color }}">
                    </div>
                </div>
                
                <button type="submit" class="px-6 py-2 font-semibold bg-teal-400 rounded-lg">Save</button>
            </form>
            
        </div>
    </div>
    <script>
        function emojis(emoji) {
            document.getElementById("content").value += document.getElementById(emoji).innerHTML;
        }
    </script>
</x-layout>