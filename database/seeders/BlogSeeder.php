<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $category = Category::all();
       

        $blog = [
           
            [
                'user_id' => 2,
                'cat_id' => 6,
                'title'  => 'Crochet Projects for Noodle Lovers',
                'slug' => Str::slug('Crochet Projects for Noodle Lovers'),
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit vel pulvinar.',
                'long_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit vel pulvinar.',
                'image' => 'https://media.istockphoto.com/id/1457433817/photo/group-of-healthy-food-for-flexitarian-diet.jpg',
            ],
            [
                'user_id' => 2,
                'cat_id' => 1,
                'title'  => '10 Vegetarian Recipes To Eat This Month',
                'slug' => Str::slug('10 Vegetarian Recipes To Eat This Month'),
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit vel pulvinar.',
                'long_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit vel pulvinar.',
                'image' => 'https://img.freepik.com/free-photo/top-view-table-full-delicious-food-composition_23-2149141353.jpg',
            ],
            [
                'user_id' => 2,
                'cat_id' => 2,
                'title'  => 'Full Guide to Becoming a Professional Chef',
                'slug' => Str::slug('Full Guide to Becoming a Professional Chef'),
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit vel pulvinar.',
                'long_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit vel pulvinar.',
                'image' => 'https://media.istockphoto.com/id/1457433817/photo/group-of-healthy-food-for-flexitarian-diet.jpg',
            ],
             [
                'user_id' => 2,
                'cat_id' => 3,
                'title'  => 'Simple & Delicious Vegetarian Lasagna',
                'slug' => Str::slug('Simple & Delicious Vegetarian Lasagna'),
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit vel pulvinar.',
                'long_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit vel pulvinar.',
                'image' => 'https://static.vecteezy.com/system/resources/thumbnails/021/939/720/small_2x/fast-food-set-hamburger-cheeseburger-cola-french-fries-burger-and-hamburger-ai-photo.jpg',
            ],
            [
                'user_id' => 2,
                'cat_id' => 4,
                'title'  => 'Plantain and Pinto Stew with Aji Verde',
                'slug' => Str::slug('Plantain and Pinto Stew with Aji Verde'),
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit vel pulvinar.',
                'long_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit vel pulvinar.',
                'image' => 'https://media.istockphoto.com/id/1409236261/photo/healthy-food-healthy-eating-background-fruit-vegetable-berry-vegetarian-eating-superfood.jpg',
            ],
            [
                'user_id' => 2,
                'cat_id' => 5,
                'title'  => "We’re Hiring a Communications Assistant!",
                'slug' => Str::slug("We’re Hiring a Communications Assistant!"),
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit vel pulvinar.',
                'long_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ultrices odio. Nulla at congue diam, at dignissim turpis. Ut vehicula sed velit a faucibus. In feugiat vestibulum velit vel pulvinar.',
                'image' => 'https://media.istockphoto.com/id/1316145932/photo/table-top-view-of-spicy-food.jpg=',
            ]

        ];

        
        Blog::insert($blog);
    }
}
