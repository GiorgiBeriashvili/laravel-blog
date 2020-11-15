<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::query()->insert([
            'user_id' => rand(0, 999999),
            'title' => Str::random(10),
            'content' => Str::random(50),
            'likes' => rand(0, 100 + 1),
        ]);
    }
}
