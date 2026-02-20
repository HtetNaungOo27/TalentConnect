<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $jobListings = include database_path('seeders/data/job_listings.php');

        foreach ($jobListings as &$listing) {
            // Link job to the corresponding employer user
            $userId = User::where('email', $listing['contact_email'])->value('id');

            if (!$userId) {
                $this->command->error("No user found for {$listing['company_name']} ({$listing['contact_email']})");
                continue;
            }

            $listing['user_id'] = $userId;
            $listing['created_at'] = now();
            $listing['updated_at'] = now();
        }

        DB::table('job_listings')->insert($jobListings);

        $this->command->info('Jobs created successfully!');
    }
}