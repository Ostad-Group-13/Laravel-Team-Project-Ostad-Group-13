<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $allCategories = Category::all();
    
        $categories = $request->input('categories', []);
        $recipeTypes = $request->input('recipe_types', []);
        $cookTimeMin = $request->input('cook_time_min');
        $cookTimeMax = $request->input('cook_time_max');
    
        $recipes = Recipe::query();
    
        if (!empty($categories)) {
            $recipes->whereHas('category', function ($query) use ($categories) {
                $query->whereIn('id', $categories);
            });
        }
    
        if (!empty($recipeTypes)) {
            $recipes->whereIn('recipe_type', $recipeTypes);
        }

        if (!empty($cookTimeMin)) {
            $recipes->where('cook_time', '>=', $cookTimeMin);
        }
    
        if (!empty($cookTimeMax)) {
            $recipes->where('cook_time', '<=', $cookTimeMax);
        }

    
        $recipes = $recipes->with('category')->paginate(9);
    
        if ($request->ajax()) {
            return view('pages.recipe.partials.recipes', compact('recipes'))->render();
        }
    
        return view('pages.recipe.index', compact('recipes', 'allCategories', 'categories', 'recipeTypes'));
    }
    
    

    function show(Recipe $recipe){
        $recipes = Recipe::take(3)->inRandomOrder()->with('user')->get();
        $recipe->load(['category', 'user', 'nutritions', 'ingredients']);
        //return $recipe;
        return view('pages.recipe.show', compact(['recipe', 'recipes']));
    }
}
