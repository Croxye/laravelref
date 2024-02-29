@php use App\Models\Category; @endphp

<x-layout>
    <x-setting :heading="'Edit Post:' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="$post->title"/>
            <x-form.input name="slug" :value="$post->slug"/>

            <x-form.input name="thumbnail" type="file" :value="$post->thumbnail"/>

            @if($post->thumbnail)
                <img src="/storage/{{ $post->thumbnail }}" class="mt-2" width="150" alt="">
            @endif

            <x-form.textarea name="excert">{{old('excert', $post->excert)}}</x-form.textarea>
            <x-form.textarea name="body">{{old('body', $post->body)}}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category"/>
                <select class="p-2" name="category_id" id="category_id">
                    @foreach(Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }} >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <xformerr name="category"/>
            </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>