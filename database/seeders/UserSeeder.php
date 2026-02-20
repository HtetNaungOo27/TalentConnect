<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $jobListings = include database_path('seeders/data/job_listings.php');

        foreach ($jobListings as $job) {
            User::firstOrCreate(
                ['email' => $job['contact_email']],
                [
                    'name' => $job['company_name'],
                    'password' => Hash::make('Password!123'), // default password
                    'role' => 'employer',
                ]
            );
        }

        $this->command->info('Employer users created successfully!');
    }
}