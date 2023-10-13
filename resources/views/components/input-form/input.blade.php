@props(["name"])

<div class="mb-3">
    <label for="{{ $name }}" class="block text-md font-bold ml-1">{{ ucwords($name) }}</label>
    <input name="{{ $name }}" id="{{ $name }}" placeholder="Enter something..." {{ $attributes(['value' => old($name)]) }} class="w-5/6 p-4 ml-5 border-b bg-transparent">
    @error($name)
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>