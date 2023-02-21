<?php

namespace Database\Factories;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Blog::class;

    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'body' => $this->faker->name(),
            'image' => 'testimage.jpg',
            'user_id' => rand(1,2),
            'category_id' => rand(1,4),
            'published_at' => Carbon::now(),
        ];
    }
}
