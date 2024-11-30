@props(['job'])

@php
    use App\Enums\WorkSite;

    $description = Str::limit($job->description, 100);
    $formattedSalary = number_format($job->salary);

    $workSiteBgColorClass = match ($job->work_site) {
        WorkSite::OnSite->value => 'bg-red-500',
        WorkSite::Remote->value => 'bg-green-500',
        default => 'bg-blue-500',
    };

@endphp

<div class="rounded-lg shadow-md bg-white p-4 hover:scale-105 duration-100">
    <div class="flex items-center space-between gap-4">
        @if ($job->company_logo)
            <img src="{{ asset("storage/$job->company_logo") }}" alt="{{ "$job->company_name's logo" }}" class="w-14" />
        @endif

        <div>
            <h2 class="text-xl font-semibold">
                {{ $job->title }}
            </h2>

            <p class="text-sm text-gray-500">{{ $job->job_type }}</p>
        </div>
    </div>

    <p class="text-gray-700 text-lg mt-2">{{ $description }}</p>

    <ul class="my-4 bg-gray-100 p-4 rounded">
        <li class="mb-2"><strong>Salary:</strong> ${{ $formattedSalary }}</li>

        <li class="mb-2">
            <strong>Location:</strong> {{ $job->city }}, {{ $job->state }}

            <span
                class="text-xs {{ $workSiteBgColorClass }} text-white rounded-full px-2 py-1 ml-2">{{ $job->work_site }}
            </span>
        </li>

        @if ($job->tags)
            @php
                $tagsArray = explode(',', $job->tags);
            @endphp

            <li class="mb-2">
                <strong>Tags:</strong>

                @foreach ($tagsArray as $tag)
                    <span>{{ $tag }}</span>,
                @endforeach
            </li>
        @endif
    </ul>

    <a href="{{ route('jobs.show', $job->id) }}"
        class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
        Details
    </a>
</div>
