@props(['id', 'label', 'name', 'accept' => null, 'isRequired' => false, 'hasMultipleFiles' => false])

<div class="mb-4">
    <label class="block text-gray-700 capitalize" for="{{ $id }}">{{ $label }}</label>

    <input id="{{ $id }}" type="file" @if ($hasMultipleFiles) multiple @endif
        name="{{ $name }}"
        class="w-full px-4 py-2 border rounded focus:outline-none @error($name) border-red-500 @enderror"
        @isset($accept)
            accept="{{ $accept }}"
        @endisset
        @if ($isRequired) required @endif />

    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
