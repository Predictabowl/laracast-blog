@extends ("layout")
        
@section("content")
        @foreach ($posts as $post)
        <article class="{{$loop->even ? 'foobar' : ''}}">
                {{-- @dd($loop) --}}
                <h1>
                    <a href="/post/{{ $post -> getSlug(); }}">
                        {{ $post -> getTitle() }}
                    </a>
                </h1>

                <div>
                    {{ $post->getExcerpt(); }}
                    <br>
                    @if($loop->even)
                        This is even
                    @else
                        This is odd
                    @endif
                </div>
            </article>
        @endforeach

@endsection