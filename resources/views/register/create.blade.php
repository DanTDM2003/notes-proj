<x-layout :active="true">
    <x-panel class="h-2/3 w-1/3 mt-8 overflow-auto">
        <h2 class="font-bold text-4xl">Welcome To Notes</h3>
        <x-input-form.form class="mt-10" method="post" action="/register">
            <x-input-form.input name="name" type="text"></x-x-input-form.input>
            <x-input-form.input name="username" type="text"></x-input-form.input>
            <x-input-form.input name="password" type="password" autocomplete="new-password"></x-input-form.input>
            <x-input-form.input name="email" type="email"></x-input-form.input>
            <span class="self-center">
                <button type="submit" class="bg-teal-700 mt-5 border px-20 py-3 rounded-xl text-md font-bold hover:bg-teal-500 focus:shadow-inner focus:border-solid focus:border-2 focus:border-white">Create</button>
            </span>
        </x-input-form>
    </x-panel>
</x-layout>