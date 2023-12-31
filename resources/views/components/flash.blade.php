@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bg-teal-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
    >
        <p>{{ session('success') }}</p>
    </div>

@elseif (session()->has('fail'))
    <div 
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="fixed bg-teal-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
    >
    <p>{{ session('fail') }}</p>
    </div>
@endif