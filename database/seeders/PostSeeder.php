<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the author exists, and if not, create the author
        $author = User::firstOrCreate(
            ['email' => 'author2@example.com'], // Find the author by email
            [
                'name' => 'Author User',
                'password' => Hash::make('password'), // Set your desired password
                'role' => 'author', // Ensure the role is 'author'
            ]
        );

        // Seed posts associated with the author
        Post::factory(20)->create([
            'user_id' => $author->id, // Associate all posts with the author
        ]);
    }
}
