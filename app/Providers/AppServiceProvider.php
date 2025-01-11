<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\RecipeSlider;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    
    /*
    *
    * Bootstrap any application services.
    */

    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
 
            return $user->hasRole('Super Admin') ? true : null;

        });
        

        if (!app()->runningInConsole() || app()->runningUnitTests()) {
            $user = User::with('favoriteRecipes')->first();
            $blog = Blog::all();
            $category = Category::get();
            $recipe = Recipe::get();
            $allSlider = RecipeSlider::with('recipe','user')->get();
            $allUsers = User::all();

            $comment = Comment::get();

            View::share(['allUsers' => $allUsers,'category' => $category, 'user' => $user, 'blog' => $blog, 'recipe' => $recipe, 'allSlider' => $allSlider,'comment' => $comment]);

            // view()->share('categorylist', $categorylist);
        }
    }
}
