@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false" {{ $attributes->merge([ 'class' => '' ])}}>
    {{-- Trigger --}}
    <div @click="show = ! show" class="border bg-teal-300 rounded-lg px-2 hover:bg-teal-500">
        {{ $trigger }}
    </div>

    {{-- Links --}}
    <div x-show="show" class="py-2 absolute bg-teal-200 mt-1 rounded-md w-full z-50 overflow-auto max-h-52" style="display: none">
        {{ $slot }}
    </div>
</div>