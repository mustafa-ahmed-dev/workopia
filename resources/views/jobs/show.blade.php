<x-layout>
    <x-slot name="title">{{ $job->title }}</x-slot>

    <h2 class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">{{ $job->title }}</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Job Details Column -->
        <section class="md:col-span-3">
            <div class="rounded-lg shadow-md bg-white p-3">
                <div class="flex justify-between items-center">
                    <a class="block p-4 text-blue-700" href="{{ route('jobs.index') }}">
                        <i class="fa fa-arrow-alt-circle-left"></i>
                        Back To Listings
                    </a>

                    <div class="flex space-x-3 ml-4">
                        <a href="{{ route('jobs.edit', $job->id) }}"
                            class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</a>

                        <!-- Delete Form -->
                        <form method="POST" action="{{ route('jobs.destroy', $job->id) }}"
                            onsubmit="confirm('Are you sure to delete this job')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">
                                Delete
                            </button>
                        </form>
                        <!-- End Delete Form -->
                    </div>
                </div>

                <div class="p-4">
                    <h2 class="text-xl font-semibold">{{ $job->title }}</h2>

                    <p class="text-gray-700 text-lg mt-2">{{ $job->description }}</p>

                    <ul class="my-4 bg-gray-100 p-4">
                        <li class="mb-2">
                            <strong>Job Type:</strong> {{ $job->job_type }}
                        </li>

                        <li class="mb-2">
                            <strong>Work Site:</strong> {{ $job->work_site }}
                        </li>

                        <li class="mb-2">
                            <strong>Salary:</strong> ${{ number_format($job->salary) }}
                        </li>

                        <li class="mb-2">
                            <strong>Site Location:</strong> {{ $job->city }}, {{ $job->state }}
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
                </div>
            </div>

            <div class="container mx-auto p-4">
                <h2 class="text-xl font-semibold mb-4">Job Details</h2>

                @if ($job->requirements || $job->benefits)
                    <div class="rounded-lg shadow-md bg-white p-4">
                        {{-- Dynamic iteration --}}
                        @foreach (['requirements' => 'Job Requirements', 'benefits' => 'Benefits'] as $field => $title)
                            @if ($job->$field)
                                <h3 class="text-lg font-semibold mb-2 text-blue-500">
                                    {{ $title }}
                                </h3>
                                <p>{{ $job->$field }}</p>
                            @endif
                        @endforeach
                    </div>
                @endif

                <p class="my-5">
                    Put "Job Application" as the subject of your email
                    and attach your resume.
                </p>

                <a href="mailto:{{ $job->contact_email }}"
                    class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                    Apply Now
                </a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                <div id="map"></div>
            </div>
        </section>

        <!-- Sidebar -->
        <aside class="bg-white rounded-lg shadow-md p-3">
            @if ($job->company_name or $job->company_logo or $job->company_description or $job->company_website)
                <h3 class="text-xl text-center mb-4 font-bold">
                    Company Info
                </h3>

                @if ($job->company_logo)
                    <img src="{{ asset("storage/$job->company_logo") }}" alt="Ad"
                        class="w-full rounded-lg mb-4 m-auto" />
                @endif

                @if ($job->company_name)
                    <h4 class="text-lg font-bold">{{ $job->company_name }}</h4>
                @endif

                @if ($job->company_description)
                    <p class="text-gray-700 text-lg my-3">{{ $job->company_description }}</p>
                @endif

                @if ($job->company_website)
                    <a href="{{ $job->company_website }}" target="_blank" class="text-blue-500">Visit Website</a>
                @endif
            @endif

            <a href="{{ route('jobs.bookmark', $job->id) }}"
                class="mt-10 bg-blue-500 hover:bg-blue-600 text-white font-bold w-full py-2 px-4 rounded-full flex items-center justify-center">
                <i class="fas fa-bookmark mr-3"></i> Bookmark Listing
            </a>
        </aside>
    </div>
</x-layout>
