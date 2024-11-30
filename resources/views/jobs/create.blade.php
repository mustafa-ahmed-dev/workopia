@php
    use App\Enums\JobType;
    use App\Enums\WorkSite;
    use App\Helpers\EnumHelper;

    $pageTitle = 'Create Job Listing';
    $pageHeading = 'Create Job Listing';
    $formHeading = 'Job Info';

    $jobTypeOptions = EnumHelper::mapValuesForSelectInput(JobType::class);
    $workSiteOptions = EnumHelper::mapValuesForSelectInput(WorkSite::class);
@endphp

<x-layout>
    <x-slot name="title">{{ $pageTitle }}</x-slot>

    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
        <h2 class="text-4xl text-center font-bold mb-4">{{ $pageHeading }}</h2>

        <form method="POST" action="{{ route('jobs.store') }}" enctype="multipart/form-data">
            @csrf
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">{{ $formHeading }}</h2>

            <x-inputs.text label="job title" type="text" id="title" name="title"
                placeholder="Software Engineer" />

            <x-inputs.text-area label="job description" name="description" id="description"
                placeholder="We are seeking a skilled and motivated Software Developer to join our growing development team..." />

            <x-inputs.number label="annual salary" id="salary" name="salary" placeholder="90000" />

            <x-inputs.text-area label="requirements" name="requirements" id="requirements"
                placeholder="Bachelor's degree in Computer Science" />

            <x-inputs.text-area label="benefits" id="benefits" name="benefits"
                placeholder="Health insurance, 401k, paid time off" />

            <x-inputs.text label="Tags (comma-separated)" id="tags" name="tags" type="text"
                placeholder="development,coding,java,python" />

            <x-inputs.select id="jobType" name="job_type" label="job type" :options="$jobTypeOptions" />

            <x-inputs.select id="workSite" name="work_site" label="work site" :options="$workSiteOptions" />

            <x-inputs.text label="address" id="address" name="address" type="text" placeholder="123 Main St" />

            <x-inputs.text label="city" id="city" name="city" type="text" placeholder="Albany" />

            <x-inputs.text label="state" id="state" name="state" type="text" placeholder="NY" />

            <x-inputs.text label="zip code" id="zipCode" name="zip_code" type="text" placeholder="12201" />

            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                Company Info
            </h2>

            <x-inputs.text label="company name" id="companyName" name="company_name" type="text"
                placeholder="Company name" />

            <x-inputs.text-area label="company description" id="companyDescription" name="company_description"
                placeholder="Company Description" />

            <x-inputs.text label="company website" id="companyWebsite" name="company_website" type="url"
                placeholder="Enter website" inputmode="url" />

            <x-inputs.text label="contact phone" id="contactPhone" name="contact_phone" type="tel"
                placeholder="Enter phone" inputmode="tel" />

            <x-inputs.text label="contact email" id="contactEmail" name="contact_email" type="email"
                placeholder="Email where you want to receive applications" inputmode="email" />

            <x-inputs.file label="company logo" id="companyLogo" name="company_logo" />

            <button type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
                Save
            </button>
        </form>
    </div>
</x-layout>
