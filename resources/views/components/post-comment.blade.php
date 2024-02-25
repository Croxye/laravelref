@props(['comment'])

<x-panel class="bg-gray-50 p-4">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/100?u={{ $comment->author->name }}" alt="" class="rounded-xl" width="60"
                 height="60">
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->name }}</h3>
                <p class="text-xs">Posted
                    <time>{{ $comment->created_at->diffForHumans() }}</time>
                </p>
            </header>
            <p class="text-sm">{{ $comment->body }}</p>
        </div>
    </article>
</x-panel>
