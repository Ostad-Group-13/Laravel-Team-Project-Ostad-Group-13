<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    //

    public function favorites()
    {
        $recipes = Recipe::all();
        return view('favorite', compact('recipes'));
    }


    public function favorite(Request $request, Recipe $recipe)
    {
        $user = $request->user();

        if (!$user->favoriteRecipes->contains($recipe->id)) {
            $user->favoriteRecipes()->attach($recipe->id);
        }

        return back()->with('success', 'Recipe favorited successfully!');
        // return response()->json(['status' => 'success', 'message' => 'Recipe favorited successfully!']);

    }

    public function unfavorite(Request $request, Recipe $recipe)
    {
        $user = $request->user();

        if ($user->favoriteRecipes->contains($recipe->id)) {
            $user->favoriteRecipes()->detach($recipe->id);
        }

        return back()->with('success', 'Recipe unfavorited successfully!');
        // return response()->json(['status' => 'success', 'message' => 'Subscribed successfully.']);

    }
}
