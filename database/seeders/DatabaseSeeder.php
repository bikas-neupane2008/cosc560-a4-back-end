<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed specific users with roles
        $this->createUserIfNotExists('Admin User', 'admin@example.com', 'admin');
        $this->createUserIfNotExists('Author User', 'author@example.com', 'author');
        $this->createUserIfNotExists('Normal User', 'user@example.com', 'user');

        // Seed random authors with posts (if needed, use another seeder here)
        // User::factory(20)->state(['role' => 'author'])->hasPosts(50)->create();
    }

    /**
     * Create a user if they don't already exist in the database.
     */
    private function createUserIfNotExists(string $name, string $email, string $role)
    {
        // Check if the user exists based on their email
        $user = User::where('email', $email)->first();

        if (!$user) {
            // Create the user if they don't exist
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make('password'), // Set your desired password
                'role' => $role,
            ]);
        }
    }
}
