<?php

namespace App\Http\Controllers\frontend;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteRecipeController extends Controller
{

    # All Favorite Recipe List Method
    
    public function favoriteRecipe()
    {
        $recipes = Recipe::all();
        return view('favorite', compact('recipes'));
    }
    # End Method

    /*
     * Favorite Recipe ON User Process  
     * 
    */
    public function favorite(Recipe $recipe)
    {

        $user = Auth::user();

        if (!$user->favorites->contains($recipe)) {
            $user->favorites()->attach($recipe->id);
        }

        return response()->json(['success' => true,'message' => 'Recipe favorite successfully.']);

    }

    /*
     * Un Favorite Recipe ON User Process  
     * 
    */
    public function unfavorite(Recipe $recipe)
    {

        $user = Auth::user();
        if ($user->favorites->contains($recipe)) {
            $user->favorites()->detach($recipe->id);
        }

        return response()->json([
            'success' => true,
            'message' => 'Recipe unfavorited successfully.',
        ]);
    }
}
