@props(['name'])

<label for="{{$name}}" class="block mb-2 uppercase font-bold text-xs text-gray-700">
    {{ucfirst($name)}}
</label>