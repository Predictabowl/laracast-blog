<x-layout>

        @foreach ($posts as $post)
        <article class="{{$loop->even ? 'foobar' : ''}}">
                <h1>
                    <a href="/post/{{ $post -> id }}">
                        {{ $post -> title }}
                    </a>
                </h1>

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
        @endforeach

</x-layout>