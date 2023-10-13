@include("_header")
<x-layout :active="true" class="justify-center items-center backdrop-blur-md grid grid-cols-[600px]">
    <x-panel class="mt-8 overflow-auto">
        <h2 class="font-bold text-4xl">Welcome To Notes</h3>
        <x-input-form.form class="mt-10 w-3/4" method="post" action="/register">
            <x-input-form.input required name="name" type="text"></x-x-input-form.input>
            <x-input-form.input required name="username" type="text"></x-input-form.input>
            <x-input-form.input required name="password" type="password" autocomplete="new-password"></x-input-form.input>
            <x-input-form.input required name="email" type="email"></x-input-form.input>
            <span class="self-center">
                <button type="submit" class="bg-teal-700 mt-5 border px-20 py-3 rounded-xl text-md font-bold hover:bg-teal-500 focus:shadow-inner focus:border-solid focus:border-2 focus:border-white">Create</button>
            </span>
        </x-input-form>
    </x-panel>
</x-layout>