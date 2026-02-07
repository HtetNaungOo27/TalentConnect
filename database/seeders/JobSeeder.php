<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $jobListings = include database_path('seeders/data/job_listings.php');

    // Get all user IDs
    $allUserIds = User::pluck('id')->toArray();

    if (empty($allUserIds)) {
        $this->command->error('No users found. Seed users first.');
        return;
    }

    // Try to get test user
    $testUserId = User::where('email', 'test@test.com')->value('id');

    foreach ($jobListings as $index => &$listing) {

        if ($index < 2 && $testUserId) {
            // Assign first two jobs to test user IF exists
            $listing['user_id'] = $testUserId;
        } else {
            // Fallback: assign any existing user
            $listing['user_id'] = $allUserIds[array_rand($allUserIds)];
        }

        $listing['created_at'] = now();
        $listing['updated_at'] = now();
    }

    DB::table('job_listings')->insert($jobListings);

    $this->command->info('Jobs created successfully!');
}
}