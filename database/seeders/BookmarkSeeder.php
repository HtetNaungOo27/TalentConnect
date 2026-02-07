<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Job;


class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $user = User::where('email', 'test@test.com')->first() ?? User::first();

    if (! $user) {
        $this->command->warn('No users found. Skipping bookmarks.');
        return;
    }

    $jobIds = Job::pluck('id')->toArray();

    if (count($jobIds) < 1) {
        $this->command->warn('No jobs found. Skipping bookmarks.');
        return;
    }

    
    $randomJobIds = collect($jobIds)->shuffle()->take(3);

    foreach ($randomJobIds as $jobId) {
        $user->bookmarkedJobs()->syncWithoutDetaching([$jobId]);
    }

    $this->command->info('Bookmarks created successfully!');
}
}
