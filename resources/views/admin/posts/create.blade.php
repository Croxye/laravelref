@php use App\Models\Category; @endphp

<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title"/>
            <x-form.input name="slug"/>

            <x-form.input name="thumbnail" type="file"/>

            <x-form.textarea name="excert"/>
            <x-form.textarea name="body"/>

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

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>