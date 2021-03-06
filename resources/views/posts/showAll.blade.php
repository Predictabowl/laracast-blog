<x-layout>

    @include("posts._header")

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-posts-grid :posts="$posts"/>
            {{-- links is a method for query results of Laravel.
                it automatically create the pages link given that
                the pagination query result was used.
                It also styles them automatically if Tailwind is used --}}
            {{ $posts->links() }}
        @else
            <p class="text-center">No posts yet.</p>
        @endif
    </main>

{{--         @foreach ($posts as $post)
        <article class="{{$loop->even ? 'foobar' : ''}}">
                <h1>
                    <a href="/post/{{ $post -> slug }}">
                        {{ $post -> title }}
                    </a>
                </h1>
                <p>
                    By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
                    in <a href="/categories/{{$post->category->slug}}">{{ $post->category->name; }} </a>
                </p>

                <div>
                    {{ $post->excerpt }}
                    <br>

                    @if($loop->even)
                        This is even
                    @else
                        This is odd
                    @endif
                </div>
            </article>
            @endforeach --}}

</x-layout>