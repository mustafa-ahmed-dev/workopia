@props([
    'id',
    'label',
    'name',
    'placeholder' => null,
    'pattern' => null,
    'inputmode' => 'numeric',
    'isRequired' => false,
    'value' => '',
])

<div class="mb-4">
    <label class="block text-gray-700 capitalize" for="{{ $id }}">{{ $label }}</label>

    <input id="{{ $id }}" type="number" name="{{ $name }}"
        class="w-full px-4 py-2 border rounded focus:outline-none @error($name) border-red-500 @enderror"
        @isset($placeholder)
            placeholder="{{ $placeholder }}"
        @endisset
        @isset($pattern)
            pattern="{{ $pattern }}"
        @endisset
        @isset($inputmode)
            inputmode="{{ $inputmode }}"
        @endisset
        value="{{ old($name, $value) }}" @if ($isRequired) required @endif />

    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
