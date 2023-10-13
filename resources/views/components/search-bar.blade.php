<form action="/notes" method="get" {{ $attributes(['class' => ''])}}>
    @if (request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
    @endif
    <input type="text" name="search" placeholder="Search..." value="{{ request('search') ?? null ? request('search') : '' }}" class="border px-3 py-2 text-sm">
    <button type="submit" class="hidden"></button>
</form>