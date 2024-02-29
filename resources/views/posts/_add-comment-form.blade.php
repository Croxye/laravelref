@auth()
    <x-panel>
        <form method="POST" action="/posts/{{$post->slug}}/comments">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt=""
                     class="rounded-full" width="40"
                     height="40">
                <h2 class="font-semibold text-gray-700 ml-4">Leave a comment</h2>
            </header>

            <div class="mt-6">
                            <textarea name="body"
                                      class="w-full p-4 bg-gray-50 focus:outline-none focus:ring text-sm resize-none rounded-xl"
                                      rows="10"
                                      required
                                      placeholder="Your comment...">
                            </textarea>

                @error('body')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-6 flex justify-end border-t pt-6 border-gray-200">
                <x-form.button>Post</x-form.button>
            </div>

        </form>
    </x-panel>
@else
    <p class="text-center">
        Please <a href="/register" class="underline text-blue-500">register</a>
        or <a href="/login" class="underline text-blue-500">log in</a>
        to leave a comment.
    </p>
@endauth