<x-layout class="bg-teal-50 flex-col justify-end items-center">
    @include("_header")
    
    <div class="flex justify-between w-[94%]">
        <span class="flex flex-row-reverse gap-1">
            <x-search-bar :link="request()->path()"></x-search-bar>
            <x-category-dropdown :link="request()->path()"></x-category-dropdown>
        </span>
        <x-overlay.modal>
            <x-slot name="trigger">
                <button @click="open = true" class="border bg-teal-300 rounded-lg px-6 hover:bg-teal-500 text-sm font-semibold flex items-center h-full"><ion-icon class="text-lg" name="add-circle-outline"></ion-icon>Add New Note</button>
            </x-slot>

            <x-input-form.form action="/notes" method="post" enctype="multipart/form-data">
                <x-input-form.input required name="slug"></x-input-form.input>
                <x-input-form.input required name="title"></x-input-form.input>
                <x-input-form.input required name="thumbnail" type="file"></x-input-form.input>
                <label
                    class="block text-md font-bold"
                    for="category_id">
                    Category
                </label>
                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <div class="px-4 py-2 flex flex-row-reverse w-full justify-center mt-3 sm:px-6">
                    <button class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Create</button>
                    <button @click="open = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                </div>
            </x-input-form.form>
        </x-overlay.modal>
        
    </div>
    <section class="h-[76%] w-[94%] mt-2 px-64 mb-[76px] grid grid-rows-2 gap-x-10 gap-y-6 border-t-4 border-black py-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-20">
        @if ($notes->count() == 0)
            <div class="text-lg font-bold w-full text-center lg:col-start-2 lg:col-end-4">No note has been created</div>
        @else
            @foreach ($notes as $note)
                <x-note-card :note="$note"></x-note-card>
            @endforeach
        @endif
    </section>
    
    <div class="absolute self-end mb-2 mr-4 w-[96%]">
        {{ $notes->links() }}
    </div>
</x-layout>