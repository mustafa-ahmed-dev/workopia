@php
    $pageTitle = 'All Jobs';
    $pageHeading = 'All Jobs';
@endphp

<x-layout>
    <x-slot name="title">{{ $pageTitle }}</x-slot>

    {{-- <h1 class="capitalize text-2xl">{{ $pageHeading }}</h1> --}}

    <h2 class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">{{ $pageHeading }}</h2>

    <x-jobs-container :jobs="$jobs" />
</x-layout>
