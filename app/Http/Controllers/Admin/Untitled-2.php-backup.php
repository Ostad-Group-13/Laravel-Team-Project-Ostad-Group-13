<?php

namespace App\Http\Controllers\Admin;
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


    public function show(Recipe $recipe)
    {

        // # Auth check in login

        // if(Auth::Check()){

        //     // return Auth::user()->id;

        //     # user id 1 added
        //     // $ingredients = $recipe->ingredients;

        //     $UserID = Auth::user()->id;

        //     $recipeCheck = Recipe::where('user_id', $UserID)->first();

        //     // Increment the view count
        //     Recipe::where('id', $recipe->id)->increment('view_count');
        //     // return $recipe;


        // }else{
        //     return 'no';
        // }


        // // Auth Check



        // // if(Auth::check()){

        // // }

        if (Auth::check()) {
                $userId = Auth::id();

            // Check if the product is already in the user's recently viewed list
            $recentlyViewedProducts = RecentlyViewedRecipe::where('user_id', $userId)
                    ->where('recipe_id', $recipe->id)
                    ->first();

                    

            // return $recipe;

                if (!$recentlyViewedProducts) {
                    // Add to recently viewed products
                    RecentlyViewedRecipe::create([
                        'user_id' => $userId,
                        'recipe_id' => $recipe->id,
                    ]);

                    // Limit to 5 recent products
                RecentlyViewedRecipe::where('user_id', $userId)
                    ->orderBy('created_at', 'asc')
                    ->skip(5)
                    ->take(1); //PHP_INT_MAX
                        // ->delete();
                }
            } else {

               // Fallback to session for guests
                $recentlyViewed = session()->get('recently_viewed', []);
                $recentlyViewed = array_filter($recentlyViewed, fn($id) => $id != $recipe->id);
                array_unshift($recentlyViewed, $recipe->id);
                $recentlyViewed = array_slice($recentlyViewed, 0, 5);
                session(['recently_viewed' => $recentlyViewed]);
            }





        // if (Auth::check()) {
        //     // Fetch recently viewed products from the database
        //     $recentlyViewedProducts = RecentlyViewedRecipe::where('user_id', Auth::id())
        //     // ->with('product') // Eager load product data
        //         ->orderBy('created_at', 'desc')
        //         ->take(5)
        //         ->get()
        //         ->pluck('recipe');
        // } else {
        //     // Fallback for guests using session
        //     $recentlyViewedIds = session()->get('recently_viewed', []);
        //     $recentlyViewedProducts = Recipe::whereIn('id', $recentlyViewedIds)
        //         ->orderByRaw("FIELD(id, " . implode(',', $recentlyViewedIds) . ")")
        //         ->get();
        // }

        // $recentlyViewedProducts = Recipe::whereIn('id', $recentlyViewedIds)
        //         ->orderByRaw("FIELD(id, " . implode(',', $recentlyViewedIds) . ")")
        //         ->get();

        return view('backend.recipe.show', compact('recipe', 'recentlyViewedProducts'));
     
        // return view('backend.recipe.show', compact('recipe'));
    }



    /**
     * Display the specified resource.
     */
    // public function show(Recipe $recipe)
    // {
    //     // Increment the view count
    // //    $recipeInc = $recipe->increment('view_count');

    // //     // only 1 increment check user
    // //     if(Auth::check()){
    // //         Auth::user()->name;
    // //     }
    // //     $authID = Auth::user()->id;

    // //     return $recipeInc;

    // //     # check user
    // //     Recipe::where('user_id', $recipe->user_id)->first();

    //     // Fetch total views for the user's recipes
    //     $totalViews = Recipe::where('user_id', $recipe->user_id)->sum('view_count');

    //     // $recipe = Recipe::Where('slug', $slug)->with('ingredients', 'nutritions')->first();
    //     return view('backend.recipe.show', compact('recipe','totalViews'));
    // }

   
    // Show all recipes for the authenticated user
    public function userRecipes()
    {
        
        $userId = Auth::id();
        $recipes = Recipe::where('user_id', $userId)->get();
        $totalViews = $recipes->sum('view_count');

        return view('backend.recipe.user-recipes', compact('recipes', 'totalViews'));
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

        // return Auth::user()->name;
        $userid = Auth::user()->id;
        $user = User::where('id', $userid)->withCount('favoriteRecipes')->first();
        // return $user->name->favorite_recipes_count;

        return view('backend.recipe.favorite', compact('user'));
    }



    public function RecipeView(Recipe $recipe){

        $userid = Auth::user()->id;
        $recentlyViewedRecipe= RecentlyViewedRecipe::where('user_id', $userid)
            ->with('user','recipe')
            // ->where('recipe_id', $recipe->id)
            ->get();

        return $recentlyViewedRecipe;

        
        // $user = User::where('id', $userid)->withCount('favoriteRecipes')->first();


        return view('backend.recipe.recipe-view', compact('recipe', 'recentlyViewedRecipe'));

    }


    # Popular Recipe

    public function popularPosts(Recipe $recipe)
    {
       

        $posts = Recipe::orderBy('view_count', 'desc')->take(5)->get();


        return view('backend.recipe.popular', compact('posts'));
    }


    public function recipeShow(Recipe $recipe)
    {
        // $ipAddress = Request::ip();
        // return 2222;

        // return $recipe;

        $userID = Auth::user()->id;

        //check user already recipe
        $recentlyView = RecipeView::where('user_id', $userID)
            ->where('recipe_id', $recipe->id)
            ->first();


            if (!$recentlyView) {

            // Add to recently viewed products
            RecipeView::create([
                'user_id' => $userID,
                'recipe_id' => $recipe->id,
            ]);
            $recipe->increment('view_count');

            // return 'Added on view';
            
        }
        // else{
        //     return 'Sorry ALready Added on view';
        // }

        return redirect()->route('recipe.popular');
        // return $recentlyView;

        // if (!RecipeView::where('recipe_id',$recipe->id)->where('user_id', $userID)->exists()) {

        //     RecipeView::create([
        //         'user_id' => $userID,
        //         'recipe_id' => $recipe->id,
        //     ]);

        //     $recipe->increment('view_count');
        // }


       

        // if (!$recentlyViewedProducts) {
        //     // Add to recently viewed products
        //     RecentlyViewedRecipe::create([
        //         'user_id' => $userId,
        //         'recipe_id' => $recipe->id,
        //     ]);


        // }
        

        // Check if the user has already viewed this post

        // $recentlyViewedProducts = RecipeView::where('user_id', $userId)
        //     ->where('recipe_id', $recipe->id)
        //     ->first();

        // if(!RecipeView::where('recipe_id', $recipe->id)->where('user_id', $userID)->exists()) {

        //     RecipeView::create([
        //         'recipe_id' => $recipe->id,
        //         'user_id' => $userID,
        //     ]);

        //     $recipe->increment('views');
        // }

        // return view('admin.posts.show', compact('post'));
    }


    public function analytics()
    {
        $posts = Recipe::withCount('view')->get();

        return view('backend.recipe.analytics', compact('posts'));
    }
}
