@props(['note'])

<x-layout class="bg-teal-50 flex-col justify-center items-center">
    <x-panel class="relative overflow-hidden bg-white">
        <x-note-dropdown class="absolute top-[-1px] w-[102%]" :note="$note"></x-note-dropdown>
        <x-input-form.form action="/notes/{{ $note->slug }}" method="post" enctype="multipart/form-data" class="mt-5 w-[350px]">
            @method('patch')
            <x-input-form.input required name="slug" :value="old('slug', $note->slug)"></x-input-form.input>
            <x-input-form.input required name="title" :value="old('title', $note->title)"></x-input-form.input>
            <x-input-form.input name="thumbnail" type="file" :value="old('thumbnail', $note->thumbnail)"></x-input-form.input>
            <label
                class="block text-md font-bold"
                for="category_id">
                Category
            </label>
            <select class="bg-transparent mx-auto p-2 w-5/6" name="category_id" id="category_id" value="{{ $note->category->id }}">
                @foreach (\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $note->category_id) == $category->id ? 'selected' : ''}}>{{ ucwords($category->name) }}</option>
                @endforeach
            </select>
            <div class="px-4 py-3 flex flex-row-reverse w-full justify-center">
                <button class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Update</button>
                <a href="/notes" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</a>
            </div>
        </x-input-form.form>
    </x-panel>
</x-layout>