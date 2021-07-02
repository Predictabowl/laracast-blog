<x-layout>
    <article>
        <h1>{{ $post->title }}</h1>

        <p>
            By <a href="/authors/{{ $post->user->id }}">{{ $post->user->name }}</a> in <a href="/categories/{{$post->category->slug}}">{{ $post->category->name; }} </a>
        </p>
        <div>
            {!! $post->body !!}

        </div>
    </article>

    <a href="/">Go Back</a>

</x-layout>
