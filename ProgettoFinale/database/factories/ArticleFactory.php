<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'price' => $this->faker->numberBetween(10, 999),  
            'description' => $this->faker->sentence(10),
            'category_id' => Category::inRandomOrder()->first()->id,  
            'user_id' => User::inRandomOrder()->first()->id,
            'is_accepted' => true
        ];
    }
}
