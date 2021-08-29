@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-6 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Menu</h4>
            <ul>
                <li>
                    <a
                        href="/admin/posts"
                        class="{{request()->routeIs('manage_posts') ? 'text-blue-500' : ''}}"
                    >Manage Posts</a>
                </li>
                <li>
                    <a
                        href="/admin/posts/create"
                        class="{{request()->routeIs('create_new_post') ? 'text-blue-500' : ''}}"
                    >New Post</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>