@props(['active' => false])

@php
    $classes ='hover:bg-blue-200 block px-3 text-left text-sm leading-6'
@endphp

<a {{ $attributes->class([$classes, 'bg-blue-200' => $active])  }}>{{ $slot }}</a>
