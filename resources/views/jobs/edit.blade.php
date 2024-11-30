@php
    use App\Enums\JobType;
    use App\Enums\WorkSite;
    use App\Helpers\EnumHelper;

    $pageTitle = 'Edit Job Listing';
    $pageHeading = 'Edit Job Listing';
    $formHeading = 'Job Info';

    $jobTypeOptions = EnumHelper::mapValuesForSelectInput(JobType::class);
    $workSiteOptions = EnumHelper::mapValuesForSelectInput(WorkSite::class);
@endphp

<x-layout>
    <x-slot name="title">{{ $pageTitle }}</x-slot>

    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
        <h2 class="text-4xl text-center font-bold mb-4">{{ $pageHeading }}</h2>

        <form method="POST" action="{{ route('jobs.update', $job->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">{{ $formHeading }}</h2>

            <x-inputs.text label="job title" type="text" id="title" name="title" placeholder="Software Engineer"
                :value="old('title', $job->title)" />

            <x-inputs.text-area label="job description" name="description" id="description"
                placeholder="We are seeking a skilled and motivated Software Developer to join our growing development team..."
                :value="old('description', $job->description)" />

            <x-inputs.number label="annual salary" id="salary" name="salary" placeholder="90000"
                :value="old('salary', $job->salary)" />

            <x-inputs.text-area label="requirements" name="requirements" id="requirements"
                placeholder="Bachelor's degree in Computer Science" :value="old('requirements', $job->requirements)" />

            <x-inputs.text-area label="benefits" id="benefits" name="benefits"
                placeholder="Health insurance, 401k, paid time off" :value="old('benefits', $job->benefits)" />

            <x-inputs.text label="Tags (comma-separated)" id="tags" name="tags" type="text"
                placeholder="development,coding,java,python" :value="old('tags', $job->tags)" />

            <x-inputs.select id="jobType" name="job_type" label="job type" :options="$jobTypeOptions" :value="old('job_type', $job->job_type)" />

            <x-inputs.select id="workSite" name="work_site" label="work site" :options="$workSiteOptions" :value="old('work_site', $job->work_site)" />

            <x-inputs.text label="address" id="address" name="address" type="text" placeholder="123 Main St"
                :value="old('address', $job->address)" />

            <x-inputs.text label="city" id="city" name="city" type="text" placeholder="Albany"
                :value="old('city', $job->city)" />

            <x-inputs.text label="state" id="state" name="state" type="text" placeholder="NY"
                :value="old('state', $job->state)" />

            <x-inputs.text label="zip code" id="zipCode" name="zip_code" type="text" placeholder="12201"
                :value="old('zip_code', $job->zip_code)" />

            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                Company Info
            </h2>

            <x-inputs.text label="company name" id="companyName" name="company_name" type="text"
                placeholder="Company name" :value="old('company_name', $job->company_name)" />

            <x-inputs.text-area label="company description" id="companyDescription" name="company_description"
                placeholder="Company Description" :value="old('company_description', $job->company_description)" />

            <x-inputs.text label="company website" id="companyWebsite" name="company_website" type="url"
                placeholder="Enter website" inputmode="url" :value="old('company_website', $job->company_website)" />

            <x-inputs.text label="contact phone" id="contactPhone" name="contact_phone" type="tel"
                placeholder="Enter phone" inputmode="tel" :value="old('contact_phone', $job->contact_phone)" />

            <x-inputs.text label="contact email" id="contactEmail" name="contact_email" type="email"
                placeholder="Email where you want to receive applications" inputmode="email" :value="old('contact_email', $job->contact_email)" />

            <x-inputs.file label="company logo" id="companyLogo" name="company_logo" />

            <button type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
                Save
            </button>
        </form>
    </div>
</x-layout>
