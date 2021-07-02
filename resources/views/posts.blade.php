<!doctype html>

<html>
    <head>
        <title>My Blog</title>
        <link rel="stylesheet" href="/css/app.css"/>
    <body>

        
        @foreach ($posts as $post)
        <article class="{{$loop->even ? 'foobar' : ''}}">
                <!--@dd($loop)-->
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
        @endforeach;

    </body>
</html>
