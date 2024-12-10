<?php

namespace Database\Seeders;


use App\Models\Recipe;
use App\Models\Nutrition;
use App\Models\Ingredient;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Recipe::insert($recipe);
        // $recipe['id'] = $recipeId;
        // Recipe::insert($recipe);

        # for loop

        // for($i = 1; $i <= 5; $i++){
        //     $id = rand(1, 100);
        //     $title = fake()->sentence(10);

        //     Recipe::create([
        //         'title' => $title,
        //         'slug' => Str::slug($title),
        //         'pre_time' => rand(1, 20),
        //         'cook_time' => rand(10, 45),

        //         // 'photo' => 'https://img.freepik.com/premium-photo/meat-stew-with-with-eggplant-carrots-onions-peppers-zucchini_209364-343.jpg',
        //         // https://images.pexels.com/photos/958545/pexels-photo-958545.jpeg

        //         'photo' => 'https://picsum.photos/id/' . $id . '/200/300/',

        //         'video_link' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",

        //         'short_description' => fake()->sentence(35),

        //         'directions' => fake()->paragraph(50),

        //         'nutrition_text' => fake()->sentence(20),

        //         'category_id' => rand(1,5),
        //         'user_id' => rand(1,4),

        //         'recipe_type' => fake()->randomElement(['asian', 'indian','thai','chines']),
        //         'recipe_status' => fake()->randomElement(['pending', 'approved'])
        //     ]);

        // }


        # Recipe 
        $recipe = [
            [
                'title' => fake()->sentence(10),
                'slug' => Str::slug(fake()->sentence(10)),

                'pre_time' => rand(1, 20),
                'cook_time' => rand(10, 45),

                'photo' => 'https://img.freepik.com/premium-photo/meat-stew-with-with-eggplant-carrots-onions-peppers-zucchini_209364-343.jpg',

                'video_link' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",

                'category_id' => rand(1, 5),
                'user_id' => rand(1, 4),

                'short_description' => fake()->sentence(25),
                'directions' => fake()->paragraph(10),
                'nutrition_text' => fake()->sentence(20),

                'recipe_type' => fake()->randomElement(['asian', 'indian', 'thai', 'chines']),

                'recipe_status' => fake()->randomElement(['pending', 'approved'])

            ],
            [
                'title' => fake()->sentence(10),
                'slug' => Str::slug(fake()->sentence(10)),

                'pre_time' => rand(1, 20),
                'cook_time' => rand(10, 45),

                'photo' => 'https://images.pexels.com/photos/1199957/pexels-photo-1199957.jpeg',

                'video_link' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",

                'category_id' => rand(1, 5),
                'user_id' => rand(1, 4),

                'short_description' => fake()->sentence(25),
                'directions' => fake()->paragraph(10),
                'nutrition_text' => fake()->sentence(20),

                'recipe_type' => fake()->randomElement(['asian', 'indian', 'thai', 'chines']),

                'recipe_status' => fake()->randomElement(['pending', 'approved'])

            ],
            [
                'title' => fake()->sentence(10),
                'slug' => Str::slug(fake()->sentence(10)),

                'pre_time' => rand(1, 20),
                'cook_time' => rand(10, 45),

                'photo' => 'https://images.pexels.com/photos/262959/pexels-photo-262959.jpeg',

                'video_link' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",

                'category_id' => rand(1, 5),
                'user_id' => rand(1, 4),

                'short_description' => fake()->sentence(25),
                'directions' => fake()->paragraph(10),
                'nutrition_text' => fake()->sentence(20),

                'recipe_type' => fake()->randomElement(['asian', 'indian', 'thai', 'chines']),

                'recipe_status' => fake()->randomElement(['pending', 'approved'])

            ],
            [
                'title' => fake()->sentence(10),
                'slug' => Str::slug(fake()->sentence(10)),

                'pre_time' => rand(1, 20),
                'cook_time' => rand(10, 45),

                'photo' => 'https://images.pexels.com/photos/1267320/pexels-photo-1267320.jpeg',

                'video_link' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",

                'category_id' => rand(1, 5),
                'user_id' => rand(1, 4),

                'short_description' => fake()->sentence(25),
                'directions' => fake()->paragraph(10),
                'nutrition_text' => fake()->sentence(20),

                'recipe_type' => fake()->randomElement(['asian', 'indian', 'thai', 'chines']),

                'recipe_status' => fake()->randomElement(['pending', 'approved'])

            ],
            [
                'title' => fake()->sentence(10),
                'slug' => Str::slug(fake()->sentence(10)),

                'pre_time' => rand(1, 20),
                'cook_time' => rand(10, 45),

                'photo' => 'https://images.pexels.com/photos/1640772/pexels-photo-1640772.jpeg',

                'video_link' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",

                'category_id' => rand(1, 5),
                'user_id' => rand(1, 4),

                'short_description' => fake()->sentence(25),
                'directions' => fake()->paragraph(10),
                'nutrition_text' => fake()->sentence(20),

                'recipe_type' => fake()->randomElement(['asian', 'indian', 'thai', 'chines']),

                'recipe_status' => fake()->randomElement(['pending', 'approved'])

            ],
            [
                'title' => fake()->sentence(10),
                'slug' => Str::slug(fake()->sentence(10)),

                'pre_time' => rand(1, 20),
                'cook_time' => rand(10, 45),

                'photo' => 'https://images.pexels.com/photos/958545/pexels-photo-958545.jpeg',

                'video_link' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",

                'category_id' => rand(1, 5),
                'user_id' => rand(1, 4),

                'short_description' => fake()->sentence(25),
                'directions' => fake()->paragraph(10),
                'nutrition_text' => fake()->sentence(20),

                'recipe_type' => fake()->randomElement(['asian', 'indian', 'thai', 'chines']),

                'recipe_status' => fake()->randomElement(['pending', 'approved'])

            ],
            [
                'title' => fake()->sentence(10),
                'slug' => Str::slug(fake()->sentence(10)),

                'pre_time' => rand(1, 20),
                'cook_time' => rand(10, 45),

                'photo' => 'https://images.pexels.com/photos/769289/pexels-photo-769289.jpeg',

                'video_link' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",

                'category_id' => rand(1, 5),
                'user_id' => rand(1, 4),

                'short_description' => fake()->sentence(25),
                'directions' => fake()->paragraph(10),
                'nutrition_text' => fake()->sentence(20),

                'recipe_type' => fake()->randomElement(['asian', 'indian', 'thai', 'chines']),

                'recipe_status' => fake()->randomElement(['pending', 'approved'])

            ],
            [
                'title' => fake()->sentence(10),
                'slug' => Str::slug(fake()->sentence(10)),

                'pre_time' => rand(1, 20),
                'cook_time' => rand(10, 45),

                'photo' => 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg',

                'video_link' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",

                'category_id' => rand(1, 5),
                'user_id' => rand(1, 4),

                'short_description' => fake()->sentence(25),
                'directions' => fake()->paragraph(10),
                'nutrition_text' => fake()->sentence(20),

                'recipe_type' => fake()->randomElement(['asian', 'indian', 'thai', 'chines']),
                'recipe_status' => fake()->randomElement(['pending', 'approved'])

            ]
        ];


        Recipe::insert($recipe);
        # Ingredient insert multiple data

        # Ingredient create

        $variable = [
            [
                'ingredients_title' => 'Main Desh',
                'ingredients_list' => json_encode(['Item 1', 'Item 2']),
                'recipe_id' => 1,
            ],
            [
                'ingredients_title' => 'Souchi Desh',
                'ingredients_list' => json_encode(['Item 1']),
                'recipe_id' => 2,
            ],
            [
                'ingredients_title' => 'Desh',
                'ingredients_list' => json_encode(['Item 1', 'Item 2', 'Item 3']),
                'recipe_id' => 1,
            ],
            [
                'ingredients_title' => 'Souch',
                'ingredients_list' => json_encode(['Item 1', 'Item 2']),
                'recipe_id' => 4,
            ],

        ];

        // Ingredient::insert($variable);

        foreach ($variable as $value) {
            Ingredient::create($value);
        }



        // $recipeId = $recipe['id'] = Recipe::insertGetId($recipe);

        # insert id
        // $recipe['id'] = DB::getPdo()->lastInsertId();

        // $recipeId = DB::getPdo()->lastInsertId();

        # Nutrition Insert

        $nutrition = [
            [
                'name' => 'Calories',
                'amount' => 219,
                'unit' => 'kcal',
                // 'recipe_id' => rand(1,5),
                'recipe_id' => 1,
            ],
            [
                'name' => 'Protein',
                'amount' => 219,
                'unit' => 'kcal',
                'recipe_id' => 1,
            ],
            [
                'name' => 'Fat',
                'amount' => 219,
                'unit' => 'kcal',
                'recipe_id' => 2,
            ],
            [
                'name' => 'Carbs',
                'amount' => 219,
                'unit' => 'kcal',
                'recipe_id' => 2,
            ],
            [
                'name' => 'Sodium',
                'amount' => 219,
                'unit' => 'kcal',
                'recipe_id' => 3,
            ],
            [
                'name' => 'Sugar',
                'amount' => 219,
                'unit' => 'kcal',
                'recipe_id' => 3,
            ],
            [
                'name' => 'Fiber',
                'amount' => 219,
                'unit' => 'kcal',
                'recipe_id' => 3,
            ],
            [
                'name' => 'Cholesterol',
                'amount' => 219,
                'unit' => 'kcal',
                'recipe_id' => 4,
            ]
        ];

        foreach ($nutrition as $value) {

            Nutrition::create($value);
        }
    }
}
