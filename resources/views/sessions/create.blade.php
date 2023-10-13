@include("_header")
<x-layout :active="true" class="justify-center items-center backdrop-blur-md grid grid-cols-[600px]">
    <x-panel>
        <h2 class="font-bold text-4xl">Welcome To Notes</h3>
        <x-input-form.form class="mt-14 w-3/4" action="/login" method="post">
            <x-input-form.input required name="email" type="email" label="Email"></x-input-form.input>
            <x-input-form.input required name="password" type="password" label="Password"></x-input-form.input>
            
            <span class="self-center">
                <button type="submit"
                    class="bg-teal-700 mt-8 border px-20 py-3 rounded-xl text-md font-bold hover:bg-teal-500 focus:shadow-inner focus:border-solid focus:border-2 focus:border-white"
                    >Log In
                </button>
            </span>
            <span class="text-sm text-gray-500 ml-1 mt-2">
                Don't have an account? <a href="/register" class="hover:underline">Create one</a>
            </span>
        </x-input-form>
    </x-panel>
</x-layout>