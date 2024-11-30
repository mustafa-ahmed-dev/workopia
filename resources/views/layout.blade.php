<!DOCTYPE html>
<html lang="en">

@php
    $defaultHeading = 'Workopia | Find and list jobs';
    $isHomePage = request()->is('/');
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title ?? $defaultHeading }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CSS --}}
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    {{-- JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
</head>

<body class="bg-gray-100">
    <x-header />

    @if ($isHomePage)
        <x-hero title="find your dream job" />

        <x-top-banner />
    @endif

    <main class="container mx-auto p-4 mt-4">
        {{-- Display alert messages --}}
        @if (session('success'))
            <x-alert type="success" message="{{ session('success') }}" />
        @endif

        @if (session('error'))
            <x-alert type="error" message="{{ session('error') }}" />
        @endif

        {{ $slot }}
    </main>

    {{-- @if ($isHomePage)
        <x-bottom-banner />
    @endif --}}
    <x-bottom-banner />
</body>

</html>
