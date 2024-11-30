@php
    $navLinks = [
        [
            'text' => 'home',
            'href' => url('/'),
            'isActive' => request()->is('/'),
        ],
        [
            'text' => 'all jobs',
            'href' => url('/jobs'),
            'isActive' => request()->is('jobs'),
        ],
        [
            'text' => 'saved jobs',
            'href' => url('/jobs/saved'),
            'isActive' => request()->is('jobs/saved'),
        ],
        [
            'text' => 'login',
            'href' => url('/login'),
            'isActive' => request()->is('login'),
        ],
        [
            'text' => 'register',
            'href' => url('/register'),
            'isActive' => request()->is('register'),
        ],
        [
            'text' => 'dashboard',
            'href' => url('/dashboard'),
            'isActive' => request()->is('dashboard'),
            'icon' => 'gauge mr-1',
        ],
    ];
@endphp

<header class="bg-blue-900 text-white p-4" x-data="{ open: false }">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="index.html">Workopia</a>
        </h1>

        <nav class="hidden md:flex items-center space-x-4">
            @foreach ($navLinks as $navLink)
                <x-nav-link href="{{ $navLink['href'] }}" :active="$navLink['isActive']" :icon="$navLink['icon'] ?? null">
                    {{ $navLink['text'] }}
                </x-nav-link>
            @endforeach

            <x-button-link href="{{ url('/jobs/create') }}" icon="edit">Create a Job</x-button-link>
        </nav>

        <button @click="open = !open" @click.away="open = false" id="hamburger"
            class="text-white md:hidden flex items-center">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <nav id="mobile-menu" x-show="open" class="bg-blue-900 text-white mt-5 pb-4 space-y-2">
        @foreach ($navLinks as $navLink)
            <x-nav-link href="{{ $navLink['href'] }}" :active="$navLink['isActive']" :mobile="true"
                hoverClass="hover:bg-blue-700">
                {{ $navLink['text'] }}
            </x-nav-link>
        @endforeach

        <x-button-link href="{{ url('/jobs/create') }}" icon="edit" :mobile="true">Create Job</x-button-link>
    </nav>
</header>
