<x-layout>
    <article>
        <h1>{{ $post->getTitle(); }}</h1>
        <div>
            {!! $post->getBody() !!}

        </div>
    </article>
    <a href="/">Go Back</a>
</x-layout>
