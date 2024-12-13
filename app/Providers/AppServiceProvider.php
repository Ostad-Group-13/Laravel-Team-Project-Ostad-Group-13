<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\RecipeSlider;
use App\Models\User;
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

    /**
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

            $category = Category::get();

            View::share(['category' => $category, 'user' => $user, 'blog' => $blog, 'recipe' => $recipe, 'allSlider' => $allSlider]);

            // view()->share('categorylist', $categorylist);
        }
    }
}
