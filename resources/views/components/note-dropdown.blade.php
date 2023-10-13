@props(['note'])
<x-dropdown.dropdown {{ $attributes->merge([ 'class' => '' ])}}>
    <x-slot name="trigger">
        <button class="py-2 pl-6 pr-6 font-bold w-full flex justify-center lg:inline-flex">
            {{ $note->title }}
        </button>
    </x-slot>

    @foreach ($notes as $note)
        <x-dropdown.dropdown-item
            href="/notes/edit/{{ $note->slug }}"
            :active="request()->fullUrlIs('*/'.$note->slug)"
        >
            {{ $note->title }}
        </x-dropdown.dropdown-item>
    @endforeach
</x-dropdown.dropdown>