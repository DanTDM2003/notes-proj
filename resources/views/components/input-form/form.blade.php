@props(['action', 'method'])

<form action="{{ $action }}" method="{{ $method }}" {{ $attributes->merge(['class' => "flex flex-col w-3/4"])}}>
    @csrf
    {{ $slot }}
</form>