<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Nutrition;
use App\Models\Ingredient;
use App\Models\RecipeView;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecipeRequest;
use App\Models\RecentlyViewedRecipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
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
        $totalViews = $recipes->sum('view_count');

        return view('backend.recipe.index', compact('recipes', 'totalViews'));
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

        $userID = Auth::user()->id;
        
        // $recipe->update(['user_id' => $userID]);

        // Fetch total views for the user's recipes
        $totalViews = Recipe::where('user_id', $recipe->user_id)->sum('view_count');
      

        //check user already recipe view
        $recipeView = RecipeView::where('user_id', $userID)
            ->where('recipe_id', $recipe->id)
            ->first();

        $res = RecipeView::where('recipe_id', $recipe->id)->where('user_id', $userID)->exists();
        
        //expire on date
        $expiresAt = Carbon::now()->addDay(); // Set expiry 1 day from now
        

        // or

        if(!$res) {

            RecipeView::create([
                'recipe_id' => $recipe->id,
                'user_id' => $userID,
                'expires_at' => $expiresAt,

            ]);

            $recipe->increment('view_count');
        } else {
            return 'Sorry ALready Added on view';
        }

        // ============================



        // $recipe->view_count = $recipe->view_count + 1;

        // Recipe watch on store recipe
        // $recipeWatch = RecipeView::where('recipe_id', $recipe->id)->first();
       

        // //expire on date
        // $expiresAt = Carbon::now()->addDay(); // Set expiry 1 day from now

        //  $recipeWatch = RecipeView::where('recipe_id', $recipe->id)->where('user_id', $userID)->first();

        // //check if user has watched the recipe

        // //if user has watched the recipe
        // if ($recipeWatch) {
        //     // delete the recipe watch
        //     $recipeWatch->delete();
            
        //     $recipe->view_count = $recipe->view_count - 1;
        //     $recipe->save();

        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Recipe unwatched',
        //         'view_count' => $recipe->view_count,
        //         'total_views' => $totalViews,
        //     ]);
        // } else {
        //     // if user has not watched the recipe added
        //     $recipeWatch = new RecipeView();
        //     $recipeWatch->recipe_id = $recipe->id;
        //     $recipeWatch->user_id = $userID;
        //     $recipeWatch->user_id = $userID;
        //     $recipeWatch->expires_at = $expiresAt;
        //     $recipeWatch->save();

        //     $recipe->view_count = $recipe->view_count + 1;
        //     $recipe->save();

        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Recipe watched',
        //         'view_count' => $recipe->view_count,
        //         'total_views' => $totalViews,
        //     ]);
        // }


        return view('backend.recipe.single-data', compact('recipe', 'totalViews'));
       // return view('backend.recipe.show', compact('recipe', 'totalViews'));
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

        return response()->json(['success' => true, 'message' => 'Recipe Status Changed.']);

        // return redirect()->route('recipe.index')->with($toasterMessage);
    }

    /*
    *  Login user Recipe List
    *
    */

    public function UserRecipe()
    {

        $user = Auth::user()->id;

        $recipes = Recipe::where('user_id', $user)->latest()->paginate(6);

        // $recipes = Recipe::orderBy('view_count', 'desc')->get();

        $totalViews = $recipes->sum('view_count');

        return view('backend.userRecipe.index', compact('recipes', 'totalViews'));
    }

    public function favorite()
    {
        // $user = User::with('favoriteRecipes')->find(1); // Replace with authenticated user if necessary

        // return Auth::user()->name;
        $userid = Auth::user()->id;

        $user = User::where('id', $userid)->withCount('favorites')->first();
        // return $user->name->favorite_recipes_count;

        return view('backend.recipe.favorite', compact('user'));
    }

    # Recipe View List
    public function RecipeViewList()
    {


        $recipes = Recipe::where('view_count', '>', 0)->get();
        // $recipes = Recipe::where('user_id', $recipe->user_id)->latest()->

        $totalViews = $recipes->sum('view_count');

        return view('backend.recipe.recipe-view-list', compact('recipes', 'totalViews'));
    }



    public function RecipeWatch(Recipe $recipe)
    {

        // $recipe->increment('views');

        //recipe watch expire date over then delete

        RecipeView::where('expires_at', '<', Carbon::now())->delete();


        // foreach ($expiredRecipes as $recipe) {
        //     Log::info('Deleting expired recipe: ' . $recipe->name);
        //     $recipe->delete();
        // }

        $userid = Auth::user()->id;
        $RecipeWatch = RecipeView::where('user_id', $userid)
            ->with('user', 'recipes')
            // ->where('recipe_id', $recipe->id)
            ->get();


        return view('backend.UserRecipe.recipe-watch', compact('RecipeWatch'));
    }
}
