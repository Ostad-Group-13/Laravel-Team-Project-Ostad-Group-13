<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //    

        $category = [
            [
                'name' => 'Breakfast',
                'slug' => Str::slug('Breakfast'),
                'color' => 'gray',
                'image' => 'https://t3.ftcdn.net/jpg/00/78/87/94/360_F_78879462_KyMC4iWhDHLlEEZDAOLiDWPuubnAaMMk.jpg'
            ],
            [
                'name' => 'vegan',
                'slug' => Str::slug('vegan'),
                'color' => 'white',
                'image' => 'https://media.istockphoto.com/id/1369489882/photo/variety-of-vegan-plant-based-protein-food.jpg?s=612x612&w=0&k=20&c=nKvZEd0raRryOpsGhwB9iOCEIizrDqB3XeFvRLdJOyI='
            ],
            [
                'name' => 'Meat',
                'slug' => Str::slug('Meat'),
                'color' => 'gray',
                'image' => 'https://t3.ftcdn.net/jpg/02/26/53/80/360_F_226538033_C42p96JDNwkSdQs86Agxd1TtaVJsyJ71.jpg'
            ],
            [
                'name' => 'Dessert',
                'slug' => Str::slug('Dessert'),
                'color' => 'gray',
                'image' => 'https://static.vecteezy.com/system/resources/thumbnails/035/985/777/small_2x/ai-generated-tcookie-plate-dessert-food-photo.jpg'
            ],
            [
                'name' => 'Lunch',
                'slug' => Str::slug('Lunch'),
                'color' => 'gray',
                'image' => 'https://foodtray2go.com/wp-content/themes/foodtray2go/assets/img/img-jpg-corporatelunches-op.jpg'
            ],
            [
                'name' => 'Chocolate',
                'slug' => Str::slug('Chocolate'),
                'color' => 'gray',
                'image' => 'https://img.freepik.com/free-photo/close-up-chocolate-arrangement_23-2148349283.jpg?semt=ais_hybrid'
            ]
        ];

        // DB
        DB::table('categories')->insert($category);
    }
}
