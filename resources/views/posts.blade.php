<x-layout>
    
        @foreach ($posts as $post)
        <article class="{{$loop->even ? 'foobar' : ''}}">
                <h1>
                    <a href="/post/{{ $post -> slug }}">
                        {{ $post -> title }}
                    </a>
                </h1>
                <p>
                    <a href="/categories/{{$post->category->slug}}">{{ $post->category->name; }} </a>
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
        @endforeach

</x-layout>