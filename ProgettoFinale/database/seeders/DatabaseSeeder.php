<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use App\Models\User;
use Database\Factories\ImgFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Category::factory()->count(12)->create();
        Article::factory()->count(10)->create();
        // ImgFactory::factory()->count(20)->create();
    }
}