<x-layout>
    <article>
        <h1>{{ $post->title }}</h1>

        <p>
            By <a href="#">{{ $post->author->username }}</a> <a
                href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>

        <div>
            <p>{!! $post->body !!}</p>
        </div>

        <a href="/">Go back</a>
    </article>
</x-layout>
