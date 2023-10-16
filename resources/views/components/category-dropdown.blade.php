@props(['link'])

<x-dropdown.dropdown class="relative">
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
        </button>
    </x-slot>

    <x-dropdown.dropdown-item
        href="/{{ $link }}?{{ http_build_query(request()->except('category', 'page')) }}"
        :active="request()->routeIs('home') && ((!empty(request()->except('category', 'page')) && empty(request('search')) ) || is_null(request()->getQueryString()))"
    >
        All
    </x-dropdown.dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown.dropdown-item
            href="/{{ $link }}?category={{ $category->name }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active="request()->fullUrlIs('*?category='.$category->name.'*')"
        >
            {{ ucwords($category->name) }}
        </x-dropdown.dropdown-item>
    @endforeach
</x-dropdown>