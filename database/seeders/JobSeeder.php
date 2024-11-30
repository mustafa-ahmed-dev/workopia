<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load job listings from file
        $jobListings = include database_path('seeders/data/job_listings.php');

        // Get user ids from user model
        $userIds = User::pluck('id')->toArray();

        // We passed the $jobListing by reference so the array of $jobListings would be affected
        foreach ($jobListings as &$jobListing) {
            // Assign user id to job listing
            $jobListing['user_id'] = $userIds[array_rand($userIds)];

            // Add timestamps
            $jobListing['created_at'] = now();
            $jobListing['updated_at'] = now();
        }

        // Insert job listing
        // DB::table('job_listings')->insert($jobListings);
        Job::insert($jobListings);

        echo 'Job listings seeded';
    }
}
