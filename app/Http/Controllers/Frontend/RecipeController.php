<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    function index(){
        $recipes = Recipe::with('category')->paginate(10);
        return view('pages.recipe.index', compact('recipes'));
    }

    function show(Recipe $recipe){
        $recipes = Recipe::take(3)->inRandomOrder()->with('user')->get();
        $recipe->load(['category', 'user', 'nutritions']);
        //return $recipes;
        return view('pages.recipe.show', compact(['recipe', 'recipes']));
    }
}
