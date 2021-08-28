@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" class="rounded-full" alt="" width="40"
                     height="40"/>
                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
                <textarea
                    name="body"
                    class="w-full text-sm focus:outline-none focus:ring"
                    rows="5"
                    placeholder="Add your important comment here!"
                    required
                ></textarea>
            </div>

            <x-form.error name="body"/>

            <div class="flex justify-end mt-6">
                <x-form.button>Post</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <a href="/login" class="font-semibold hover:underline">Log in</a> or
        <a href="/register" class="font-semibold hover:underline">Register</a>
        to leave a comment.
    </p>
@endauth