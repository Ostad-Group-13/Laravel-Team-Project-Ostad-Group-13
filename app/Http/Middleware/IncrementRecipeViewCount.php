<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class IncrementRecipeViewCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        // $recipe = $request->route("");

        if ($request->route('recipe')) {
            $recipeId = $request->route('recipe')->id;

            // Check if the recipe view has already been recorded in the session
            $viewedRecipes = Session::get('viewed_recipes', []);
            if (!in_array($recipeId, $viewedRecipes)) {
                
                // Increment the view count
                Recipe::where('id', $recipeId)->increment('view_count');

                // Add the recipe ID to the session to avoid duplicate increments
                $viewedRecipes[] = $recipeId;
                Session::put('viewed_recipes', $viewedRecipes);
            }
        }

        return $next($request);
    }
}
