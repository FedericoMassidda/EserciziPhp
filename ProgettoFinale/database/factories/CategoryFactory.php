<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public $categories = [
        'Azione',
        'Avventura',
        'Giochi di ruolo (RPG)',
        'Sparatutto',
        'Strategia',
        'Sportivo',
        'Simulazione',
        'Puzzle',
        'Platform',
        'Survival Horror',
        'Corsa',
        'MMORPG'
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->unique()->randomElement($this->categories)
        ];
    }
}
