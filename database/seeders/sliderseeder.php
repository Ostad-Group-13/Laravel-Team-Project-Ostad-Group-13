<?php

namespace Database\Seeders;

use App\Models\RecipeSlider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slider = [

            [
                'title' => fake()->sentence(20),
                'description' => fake()->word(34),
                'img' => 'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg',
                'user_id' => rand(1, 4),
                'recipe_id' => rand(1, 5),
                'status' => 'active'

            ],

            [
                'title' => fake()->sentence(20),
                'description' => fake()->word(34),
                'img' => 'https://images.pexels.com/photos/769289/pexels-photo-769289.jpeg',
                'user_id' => rand(1, 4),
                'recipe_id' => rand(1, 5),
                'status' => 'inactive'
            ],

            [
                'title' => fake()->sentence(20),
                'description' => fake()->word(34),
                'img' => 'https://images.pexels.com/photos/958545/pexels-photo-958545.jpeg',
                'user_id' => rand(1, 4),
                'recipe_id' => rand(1, 5),
                'status' => 'inactive'

            ],
            [
                'title' => fake()->sentence(20),
                'description' => fake()->word(34),
                'img' => 'https://images.pexels.com/photos/1640772/pexels-photo-1640772.jpeg',
                'user_id' => rand(1, 4),
                'recipe_id' => rand(1, 5),
                'status' => 'inactive'

            ],
            [
                'title' => fake()->sentence(20),
                'description' => fake()->word(34),
                'img' => 'https://images.pexels.com/photos/1099680/pexels-photo-1099680.jpeg',
                'user_id' => rand(1, 4),
                'recipe_id' => rand(1, 5),
                'status' => 'inactive'

            ],
        ];

        RecipeSlider::insert($slider);
    }
}
