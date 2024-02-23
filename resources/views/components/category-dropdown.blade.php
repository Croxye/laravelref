<x-dropdown>
    <x-slot name="trigger">
        <button class="flex w-full py-2 pl-3 pr-9 text-left text-sm font-semibold lg:inline-flex lg:w-32">
            {{ isset($currentCategory) ? $currentCategory->name : 'Categories' }}
            <x-icon name="down-arrow" class="pointer-events-none absolute"/>
        </button>
    </x-slot>

    <x-dropdown-item href="/" :active="request()->routeIs('home')">
        All Categories
    </x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}"
                         :active='request()->is("categories/{$category->slug}")'>
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
