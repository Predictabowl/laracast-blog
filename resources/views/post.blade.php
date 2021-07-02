
@extends("layout")

@section("content")
    <article>
        <h1>{{ $post->getTitle(); }}</h1>
        <div>
            {!! $post->getBody() !!}

        </div>
    </article>
    <a href="/">Go Back</a>
@endsection

