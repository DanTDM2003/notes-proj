@props(["name"])

<div class="mb-3">
    <label for="{{ $name }}" class="block text-md font-bold ml-1">{{ ucwords($name) }}</label>
    <input name="{{ $name }}" id="{{ $name }}" placeholder="Enter your name..." {{ $attributes(['value' => old($name)]) }} required class="w-full p-4 border-b bg-transparent">
    @error($name)
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>