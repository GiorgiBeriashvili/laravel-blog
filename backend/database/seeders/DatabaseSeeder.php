<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::query()->create(['role' => 'admin', 'name' => 'test', 'email' => 'test@example.com', 'email_verified_at' => now(), 'password' => bcrypt('testtest'), 'remember_token' => Str::random(10),]);
        User::factory(2)->create();
        Post::factory(30)->create();
    }
}
