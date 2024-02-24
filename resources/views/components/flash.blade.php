<div class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
     x-data="{ show: true }"
     x-show="show"
     x-transition:enter.duration.500ms
     x-transition:leave.duration.400ms
     x-init="setTimeout(() => show = false, 4000)">
    <p>{{ session('success') }}</p>
</div>