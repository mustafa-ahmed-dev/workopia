<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Job;
use Illuminate\Validation\Rule;
use App\Enums\JobType;
use App\Enums\WorkSite;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Log;
use App\Helpers\StorageHelper;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('jobs.index')->with('jobs', Job::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'tags' => 'nullable|string',
            'job_type' => ['required', Rule::enum(JobType::class)],
            'work_site' => ['required', Rule::enum(WorkSite::class)],
            "requirements" => 'nullable|string',
            "benefits" => 'nullable|string',
            "address" => 'nullable|string',
            "city" => 'required|string',
            "state" => 'required|string',
            'zip_code' => 'nullable|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'company_website' => 'nullable|url',
        ]);

        // Hard coded user ID
        $validatedData['user_id'] = 1;

        // Check for image
        if ($request->hasFile('company_logo')) {
            // Store the file and get the path
            $file = $request->file('company_logo');
            $path = $file->store('logos', 'public');

            // Add path to to validated data
            $validatedData['company_logo'] = $path;

            Log::info('Logo created successfully', [
                'path' => $path,
            ]);
        }

        // Submit to database
        $job = Job::create($validatedData);

        Log::info('Job created successfully', [
            'jobId' => $job->id,
            'job' => $job,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job Listing Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): View
    {
        $job = Job::find($id);

        return view('jobs.show')->with('job', $job);
    }

    public function bookmark(int $id)
    {
        return 'Job bookmarked';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        $job = Job::findOrFail($id);

        return view('jobs.edit')->with('job', $job);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $job = Job::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'tags' => 'nullable|string',
            'job_type' => ['required', Rule::enum(JobType::class)],
            'work_site' => ['required', Rule::enum(WorkSite::class)],
            "requirements" => 'nullable|string',
            "benefits" => 'nullable|string',
            "address" => 'nullable|string',
            "city" => 'required|string',
            "state" => 'required|string',
            'zip_code' => 'nullable|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'company_website' => 'nullable|url',
        ]);

        // Check for image
        if ($request->hasFile('company_logo')) {
            // Delete old logo if exists
            if ($job->company_logo) {
                $fileName = basename($job->company_logo);
                $path = StorageHelper::getPath($fileName, 'logos');

                StorageHelper::deleteFile($path);

                Log::info('Logo deleted successfully', [
                    'jobId' => $id,
                    'path' => $path
                ]);
            }

            // Store the file and get the path
            $file = $request->file('company_logo');
            $path = $file->store('logos', 'public');

            // Add path to to validated data
            $validatedData['company_logo'] = $path;

            Log::info('Logo updated successfully', [
                'jobId' => $id,
                'path' => $path
            ]);
        }

        // Submit to database
        $job->update($validatedData);

        Log::info('Logo updated successfully', [
            'jobId' => $id,
            'job' => $job
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job Listing Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $job = Job::findOrFail($id);

        // Check for logo and delete it if exists
        if ($job->company_logo) {
            $fileName = basename($job->company_logo);
            $path = StorageHelper::getPath($fileName, 'logos');

            StorageHelper::deleteFile($path);

            Log::info('File deleted successfully', [
                'jobId' => $id,
                'path' => $path,
            ]);
        }

        $job->delete();

        Log::info('Job deleted successfully', [
            'jobId' => $id,
            'job' => $job,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job Listing Deleted Successfully!');
    }
}
