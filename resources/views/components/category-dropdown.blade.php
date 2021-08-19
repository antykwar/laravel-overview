<x-dropdown>
  <x-slot name="trigger">
    <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
      {{ isset($currentCategory) ? ucfirst($currentCategory->name) : 'Categories' }}
      <x-icon name="arrow-down" class="absolute pointer-events-none" style="right: 12px;"></x-icon>
    </button>
  </x-slot>

  @php
    $queryString = http_build_query(request()->except('category', 'page'));
  @endphp

  <x-dropdown-item href="/{{ $queryString ? '?'.$queryString : '' }}" :active="empty($currentCategory)">All</x-dropdown-item>

  @foreach ($categories as $category)
    <x-dropdown-item
      href="/?category={{ $category->slug }}{{ $queryString ? '&'.$queryString : ''}}"
      :active="isset($currentCategory) && ($currentCategory->slug == $category->slug)"
    >
      {{ ucfirst($category->name) }}
    </x-dropdown-item>
  @endforeach
</x-dropdown>