<?php

namespace Database\Seeders;

use App\Models\RecipeSlider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class sliderseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slider = [

            [
                'title' => 'Slider 1',
                'description' => 'Slide 1',
                'img' => 'https://images.unsplash.com/photo-1519681393784-d120267933ba?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                'user_id' => 1

            ],

            [
                'title' => 'Slider 2',
                'description' => 'Slide 2',
                'img' => 'https://images.unsplash.com/photo-1519681393784-d120267933ba?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                'user_id' => 1
            ],

            [
                'title' => 'Slider 3',
                'description' => 'Slide 3',
                'img' => 'https://images.unsplash.com/photo-1519681393784-d120267933ba?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                'user_id' => 1
            ],
        ];

        RecipeSlider::insert($slider);
    }
}
