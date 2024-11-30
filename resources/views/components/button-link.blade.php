@props([
    'icon' => null,
    'bgClass' => 'bg-yellow-500',
    'hoverClass' => 'hover:bg-yellow-600 hover:shadow-md',
    'textClass' => 'text-black',
    'paddingClass' => 'px-4 py-2',
    'mobile' => false,
])

<a {{ $attributes }}
    class="{{ $mobile ? 'block' : '' }} {{ $bgClass }} {{ $hoverClass }} {{ $textClass }} {{ $paddingClass }} rounded transition duration-300">
    @if ($icon)
        <i class="fa fa-{{ $icon }}"></i>
    @endif

    {{ $slot }}
</a>
