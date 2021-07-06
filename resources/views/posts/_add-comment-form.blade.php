@auth
    <x-panel>
        <form method="POST" action="/post/{{$post->slug}}/comments">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" width="40" height="40" class="rounded-full">
                <h2 class="ml-3">Hai qualcosa da dire?</h2>
            </header>
            <div class="mt-4">
                <textarea name="body" 
                    class="w-full text-sm focus:outline-none focus:ring"
                    rows="5" placeholder="Scrivi un commento." required></textarea>

                @error("body")
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-4 pt-4 border-t border-gray-200">
                <x-submit-button>
                    Posta
                </x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline text-blue-500">Register</a> or
        <a href="/login" class="hover:underline text-blue-500">Log in</a> to leave a comment.
    </p>
@endauth