<?php

namespace Database\Seeders;


use App\Models\Ingredient;
use App\Models\Nutritions;
use App\Models\Recipe;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

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

        for($i = 1; $i <= 5; $i++){

            $id = rand(1, 100);
            $title = fake()->sentence(10);

            Recipe::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'pre_time' => rand(1, 20),
                'cook_time' => rand(10, 45),

                // 'photo' => 'https://img.freepik.com/premium-photo/meat-stew-with-with-eggplant-carrots-onions-peppers-zucchini_209364-343.jpg',

                'photo' => 'https://picsum.photos/id/' . $id . '/200/300/',


                'video_link' => "https://www.pexels.com/video/delicious-fish-cooking-with-fresh-herbs-29643123/",

                'short_description' => fake()->sentence(35),

                'directions' => fake()->paragraph(50),

                'nutrition_text' => fake()->sentence(20),

                'category_id' => rand(1,5),
                'user_id' => rand(1,4),

                'recipe_type' => fake()->randomElement(['asian', 'indian','thai','chines']),
                'recipe_status' => fake()->randomElement(['pending', 'approved'])
            ]);

        }

        # Ingredient insert multiple data

        # Ingredient create

        $variable = [
            [
                'ingredients_title' => 'Main Desh',
                'ingredients_list' => json_encode(['Item 1','Item 2']),
                'recipe_id' => 1,
            ],
            [
                'ingredients_title' => 'Souchi Desh',
                'ingredients_list' => json_encode(['Item 1']),
                'recipe_id' => 2,
            ],
            [
                'ingredients_title' => 'Desh',
                'ingredients_list' => json_encode(['Item 1','Item 2','Item 3']),
                'recipe_id' => 1,
            ],
            [
                'ingredients_title' => 'Souch',
                'ingredients_list' => json_encode(['Item 1','Item 2']),
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
            ],[
                'name' => 'Protein',
                'amount' => 219,
                'unit' => 'kcal',
                'recipe_id' => 1,
            ],[
                'name' => 'Fat',
                'amount' => 219,
                'unit' => 'kcal',
                'recipe_id' => 2,
            ],[
                'name' => 'Carbs',
                'amount' => 219,
                'unit' => 'kcal',
                'recipe_id' => 2,
            ],[
                'name' => 'Sodium',
                'amount' => 219,
                'unit' => 'kcal',
                'recipe_id' => 3,
            ],[
                'name' => 'Sugar',
                'amount' => 219,
                'unit' => 'kcal',
                'recipe_id' => 3,
            ],[
                'name' => 'Fiber',
                'amount' => 219,
                'unit' => 'kcal',
                'recipe_id' => 3,
            ],[
                'name' => 'Cholesterol',
                'amount' => 219,
                'unit' => 'kcal',
                'recipe_id' => 4,
            ],[

                'name' => 'Protein',
                'amount' => 219,
                'unit' => 'kcal',
                'recipe_id' => 4,
            ]
        ];

        foreach ($nutrition as $value) {

            Nutritions::create($value);
        }

    }
}
