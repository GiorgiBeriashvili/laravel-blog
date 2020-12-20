<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition(): array
    {
        return [
            'user_id' => random_int(1, 3),
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'likes' => $this->faker->randomDigit,
            'is_approved' => $this->faker->boolean(10),
        ];
    }
}
