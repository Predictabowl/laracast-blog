<x-dropdown>

    <x-slot name="trigger">
       <button class="py-2 pl-3 pr-9d text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : "Categories"}}
            {{-- Double colon before attribute to pass the value, otherwise it will pass literally --}}
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    {{-- The following won't work anymore because because the route will now always be the homePage --}}
    {{-- <x-dropdown-item href="/" :isActive="request()->routeIs('homePage')"> All </x-dropdown-item> --}}
    <x-dropdown-item href="/" :isActive="!isset($currentCategory)"> All </x-dropdown-item>
    @foreach($categories as $category)
        <x-dropdown-item :isActive="isset($currentCategory) && $currentCategory->is($category)"
            href="/?{{http_build_query(array_replace(request()->input(), ['category' => $category->slug]))}}">
            {{-- href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}"> --}}
            {{ucwords($category->name)}}
        </x-dropdown-item> 
    @endforeach
</x-dropdown>