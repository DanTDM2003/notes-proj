@props(['action', 'method'])

<form action="{{ $action }}" method="{{ $method }}" {{ $attributes->merge(['class' => "flex flex-col"])}}>
    @csrf
    {{ $slot }}
</form>