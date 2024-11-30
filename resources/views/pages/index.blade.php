@php
    $pageTitle = 'Workopia | Find and list jobs';
    $pageHeading = 'Welcome to Workopia';
@endphp

<x-layout>
    <x-slot name="title">{{ $pageTitle }}</x-slot>

    <h2 class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">{{ $pageHeading }}</h2>

    <x-jobs-container :jobs="$jobs" />

    <a href="{{ route('jobs.index') }}" class="block text-xl text-center">
        <i class="fa fa-arrow-alt-circle-right"></i> Show All Jobs
    </a>
</x-layout>
