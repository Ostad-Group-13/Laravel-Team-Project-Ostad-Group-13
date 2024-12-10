<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Nutrition;
use App\Models\Ingredient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecipeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;



class RecipeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $recipes = Recipe::latest()->paginate(10);
        return view('backend.recipe.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        return view('backend.recipe.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecipeRequest $request)
{
    try {
        DB::beginTransaction();

        // Handle Photo Upload
        $url = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $url = $file->move('uploads/recipes/', $filename);
        }

        // Create Recipe
        $recipe = Recipe::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'pre_time' => $request->input('pre_time'),
            'cook_time' => $request->input('cook_time'),
            'video_link' => $request->input('video_link'),
            'photo' => $url,
            'category_id' => $request->input('cat_id'),
            'user_id' => Auth::id(),
            'nutrition_text' => $request->input('nutrition_text'),
            'short_description' => $request->input('short_description'),
            'directions' => $request->input('directions'),
            'recipe_type' => $request->input('recipe_type'),
        ]);

        // Add Ingredients
        $ingredients = $request->input('ingredients');
        if (!empty($ingredients)) {
            foreach ($ingredients as $ingredient) {
                Ingredient::create([
                    'ingredients_title' => $ingredient['title'],
                    'ingredients_list' => json_encode($ingredient['ingredients_list']),
                    'recipe_id' => $recipe->id,
                ]);
            }
        }

        // Add Nutritions
        $nutritions = $request->input('nutritions');
        if (!empty($nutritions)) {
            $nutritionData = [];
            foreach ($nutritions as $nutrition) {
                $nutritionData[] = [
                    'name' => $nutrition['name'],
                    'amount' => $nutrition['amount'],
                    'unit' => $nutrition['unit'],
                    'recipe_id' => $recipe->id,
                ];
            }
            Nutrition::insert($nutritionData);
        }

        DB::commit();

        // Success Message
        return redirect()->route('recipe.index')->with([
            'message' => 'Recipe Created Successfully...',
            'alert-type' => 'success',
        ]);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
        ]);
    }
}



    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {

        // $recipe = Recipe::Where('slug', $slug)->with('ingredients', 'nutritions')->first();
        return view('backend.recipe.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        $categories = Category::all();
        $ingredients = $recipe->ingredients;
        $nutritions = $recipe->nutritions;

        return view('backend.recipe.edit', compact('recipe', 'ingredients', 'nutritions', 'categories'));
    }

    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        try {
            DB::beginTransaction();

            // Handle photo upload and old photo deletion
            if ($request->hasFile('photo')) {
                if (File::exists($recipe->photo)) {
                    File::delete($recipe->photo);
                }

                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $url = $file->move('uploads/recipes/', $filename);
                $recipe->photo = $url;
            }

            // Update recipe details
            $recipe->update([
                'title' => $request->input('recipeTitle'),
                'slug' => Str::slug($request->input('recipeTitle')),
                'pre_time' => $request->input('pre_time'),
                'cook_time' => $request->input('cook_time'),
                'photo' => $recipe->photo ?? null,
                'video_link' => $request->input('video_link'),
                'category_id' => $request->input('cat_id'),
                'user_id' => Auth::id(),
                'short_description' => $request->input('short_description'),
                'directions' => $request->input('directions'),
                'nutrition_text' => $request->input('nutrition_text'),
                'recipe_type' => $request->input('recipe_type'),
            ]);

            // Update ingredients: delete old and create new
            $recipe->ingredients()->delete();
            $ingredients = $request->input('ingredients', []);
            foreach ($ingredients as $ingredient) {
                $recipe->ingredients()->create([
                    'ingredients_title' => $ingredient['title'],
                    'ingredients_list' => json_encode($ingredient['ingredients_list']),
                ]);
            }

            // Update nutritions: delete old and create new
            $recipe->nutritions()->delete();
            $nutritions = $request->input('nutritions', []);
            foreach ($nutritions as $nutrition) {
                $recipe->nutritions()->create([
                    'name' => $nutrition['name'],
                    'amount' => $nutrition['amount'],
                    'unit' => $nutrition['unit'],
                ]);
            }

            DB::commit();

            // Success response
            return redirect()->route('recipe.index')->with('success', 'Recipe updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Error response
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {

        $recipe->delete();
        $toasterMessage = [
            'message' => "Recipe Deleted Successfully",
            'alert-type' => "error"
        ];

        return redirect()->route('recipe.index')->with($toasterMessage);
    }



    function RecipeStatus(Recipe $recipe)
    {

        if ($recipe->recipe_status == 'pending') {
            $status = 'approved';
        } else {
            $status = 'pending';
        }

        $recipe->recipe_status = $status;
        $recipe->save();
        $toasterMessage = [
            'message' => "Recipe Status Changed Successfully",
            'alert-type' => "success"
        ];

        return redirect()->route('recipe.index')->with($toasterMessage);
    }

    /*
    * User Recipe List
    *
    */

    public function UserRecipe()
    {

        $user = Auth::user()->id;

        $recipes = Recipe::where('user_id', $user)->latest()->paginate(6);

        return view('backend.userRecipe.index', compact('recipes'));

        // if (Auth::check() == 1) {

        //     $recipes = Recipe::where('user_id', $user)->with('ingredients', 'nutritions')->paginate(6);
        // } else {
        //     echo 'no';
        // }


    }

    # Favorite Recipe

    //   function favorite(){

    //     $userid = Auth::user()->id;
    //     return $user;

    // $recipes = Recipe::where('user_id', $user)->latest()->paginate(6);
    // $recipes = Recipe::where('user_id', $userid)->with('favoritedBy')->get();

    // return $recipes;

    // $recipes = User::where('id',$userid)->with('favoriteRecipes')->get();
    // return $recipes;


    //     return view('backend.recipe.favorite', compact('recipes'));
    //   }


    public function favorite()
    {
        // $user = User::with('favoriteRecipes')->find(1); // Replace with authenticated user if necessary

        // return $user;
        $userid = Auth::user()->id;

        $user = User::where('id', $userid)->with('favoriteRecipes')->first();

        return view('backend.recipe.favorite', compact('user'));
    }
}
