@props([
    'id',
    'label',
    'name',
    'cols' => 30,
    'rows' => 7,
    'placeholder' => null,
    'isRequired' => false,
    'value' => '',
])

<div class="mb-4">
    <label class="block text-gray-700 capitalize" for="{{ $id }}">{{ $label }}</label>

    <textarea cols="{{ $cols }}" rows="{{ $rows }}" id="{{ $id }}" name="{{ $name }}"
        class="w-full px-4 py-2 border rounded focus:outline-none @error($name)
            border-red-500
        @enderror"
        @isset($placeholder)
            placeholder="{{ $placeholder }}"
        @endisset
        @if ($isRequired) required @endif>{{ old($name, $value) }}</textarea>

    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
