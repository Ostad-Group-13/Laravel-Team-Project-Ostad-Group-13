<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // if (!$user->favoriteRecipes->contains($recipe->id)) {
        //     $user->favoriteRecipes()->attach($recipe->id);
        // }


        $user->favoriteRecipes()->attach($recipe->id);

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Recipe favorited successfully!',
        // ]);
        // Add the recipe to favorites
        // $recipe->favorites()->attach(auth()->id());

        // if ($request->ajax()) {
        //     return view('pages.recipe.partials.recipes', compact('recipes'))->render();
        // }

        return back()->with('success', 'Recipe favorited successfully!');

        // return response()->json(['status' => 'success', 'message' => 'Recipe favorited successfully!']);

    }

    public function unfavorite(Request $request, Recipe $recipe)
    {
        $user = $request->user();

        // if ($user->favoriteRecipes->contains($recipe->id)) {
        //     $user->favoriteRecipes()->detach($recipe->id);
        // }



        $user->favoriteRecipes()->detach($recipe->id);

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Recipe unfavorited successfully!',
        // ]);

        // $recipe->favorites()->detach(auth()->id());

        // if ($request->ajax()) {
        //     return view('pages.recipe.partials.recipes', compact('recipes'))->render();
        // }

        return back()->with('success', 'Recipe unfavorited successfully!');

        // return back()->with('success', 'Recipe unfavorited successfully!');
        // return response()->json(['status' => 'success', 'message' => 'Subscribed successfully.']);

    }

    function demo()
    {
        $recipes = Recipe::all();
        $data = [
            "userId" => 1,
            "id" => 1,
            "title" => "delectus aut autem",

        ];
        // return response()->json($data);
        return view('demo', compact('recipes', 'data'));

        // return $recipes;
        // return response()->json($recipes);
    }
}
