@props([
    'active' => false,
    'icon' => null,
    'mobile' => false,
    'hoverClass' => 'hover:underline',
    'textClass' => 'text-white',
])

<a {{ $attributes }}
    class="{{ $mobile ? 'block' : '' }} {{ $mobile ? 'px-4' : '' }} py-2 {{ $textClass }} capitalize {{ $hoverClass }} {{ $active ? 'text-yellow-500 font-bold' : '' }}">
    @if ($icon)
        <i class="fa fa-{{ $icon }}"></i>
    @endif

    {{ $slot }}
</a>
