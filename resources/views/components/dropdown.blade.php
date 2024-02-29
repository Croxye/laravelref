@props(['trigger'])

<div class="relative" x-data="{ show: false }" @click.outside="show = false">
    {{-- Trigger --}}
    <div @click="show = ! show">
        {{ $trigger }}
    </div>

    {{-- Links --}}
    <div x-show="show" class="absolute py-2 bg-gray-100 w-full mt-2 rounded-xl z-10 overflow-auto max-h-52"
         style="display: none"
         x-transition.duration.200ms>
        {{ $slot }}
    </div>

</div>
