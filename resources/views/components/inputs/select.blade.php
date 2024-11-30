@props([
    'id',
    'name',
    'label',
    /** @var \Illuminate\Support\Collection|array<array{value: string|int, text: string}> $options */
    'options' => [],
    'isRequired' => false,
    'value' => '',
])

<div class="mb-4">
    <label class="block text-gray-700 capitalize" for="{{ $id }}">{{ $label }}</label>

    <select id="{{ $id }}" name="{{ $name }}"
        class="w-full px-4 py-2 border rounded focus:outline-none capitalize"
        @if ($isRequired) required @endif>
        <option disabled class="capitalize">Select {{ $label }}</option>

        @foreach ($options as $index => $option)
            <option value="{{ $option['value'] }}" class="capitalize" @if (old($name, $value) == $option['value'] ?? $index === 0) selected @endif>
                {{ $option['text'] }}
            </option>
        @endforeach
    </select>

    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
