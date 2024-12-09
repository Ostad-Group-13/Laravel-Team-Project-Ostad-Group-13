<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Nutrition;
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
    public function store(StoreRecipeRequest $request, Recipe $recipe)
    {

        try {
            DB::beginTransaction();

            $url = '';

            # Image Upload
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $url = $file->move('uploads/recipes/', $filename);
                $recipe->photo = $url;
                $recipe->save();
            }

            # Recipe Create
            $recipe = Recipe::create([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'pre_time' => $request->input('pre_time'),
                'cook_time' => $request->input('cook_time'),
                'video_link' => $request->input('video_link'),
                'photo' => $url,
                'category_id' => $request->input('cat_id'),
                'user_id' => Auth::user()->id,
                'nutrition_text' => $request->input('nutrition_text'),
                'short_description' => $request->input('short_description'),
                'directions' => $request->input('directions'),
                'recipe_type' => $request->input('recipe_type'),
            ]);

            # Ingredients Create

            if (!empty($request->input('ingredients'))) {
                foreach ($request->input('ingredients') as $ingredient) {
                    Ingredient::create([
                        'ingredients_title' => $ingredient['title'],
                        'ingredients_list' => json_encode($ingredient['ingredients_list']),
                        'recipe_id' => $recipe->id,
                    ]);
                }
            }

            # Nutrition Create

            if (!empty($request->input('nutritions'))) {
                $data = [];
                foreach ($request['nutritions'] as $nutrition) {
                    $data['name'] = $nutrition['name'];
                    $data['amount'] = $nutrition['amount'];
                    $data['unit'] = $nutrition['unit'];
                    $data['recipe_id'] = $recipe->id;

                    // Nutritions::insert($data);
                }
                Nutrition::insert($data);
            }

            DB::commit();

            $toasterMessage = [
                'message' => 'Recipe Created Successfully...',
                'alert-type' => 'success',
            ];

            return redirect()->route('recipe.index')->with($toasterMessage);
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

            // Validate input data
            // $validatedData = $request->validate([
            //     'title' => 'required|string|max:255',
            //     'slug' => 'required|string|max:255|unique:recipes,slug,' . $recipe->id,
            //     'pre_time' => 'nullable|string|max:255',
            //     'cook_time' => 'nullable|string|max:255',
            //     'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            //     'ingredients' => 'nullable|array',
            //     'ingredients.*.title' => 'required_with:ingredients|string|max:255',
            //     'ingredients.*.ingredients_list' => 'required_with:ingredients|array',
            //     'ingredients.*.ingredients_list.*' => 'required_with:ingredients|string|max:255',
            //     'nutritions' => 'nullable|array',
            //     'nutritions.*.name' => 'required_with:nutritions|string|max:255',
            //     'nutritions.*.amount' => 'required_with:nutritions|string|max:255',
            //     'nutritions.*.unit' => 'required_with:nutritions|string|max:255',
            // ]);


            // Handle file upload for photo
            // if ($request->hasFile('photo')) {
            //     if ($recipe->photo) {
            //         // Storage::disk('public')->delete($recipe->photo);
            //         unlink($recipe->photo);

            //     }
            //     $photo = $request->file('photo')->store('recipes', 'public');
            //     $recipe->photo = $photo;
            // }



            $url = '';

            if ($request->hasFile('photo')) {

                # old image  delete
                if (File::exists($recipe->photo)) {
                    File::delete($recipe->photo);
                }

                # Image upload

                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $url = $file->move(public_path('uploads/car'), $filename);
                $url = $file->move('uploads/recipes/', $filename);
                $recipe->photo = $url;
                $recipe->save();
            }

            // Update recipe
            $recipe->update([
                'title' => $request['recipeTitle'],
                'slug' => Str::slug($request['recipeTitle']),
                'pre_time' => $request['pre_time'],
                'cook_time' => $request['cook_time'],

                // 'photo' => $url,
                'video_link' => $request['video_link'],

                'category_id' => $request->cat_id,
                'user_id' => Auth::user()->id,
                'short_description' => $request->short_description,
                'directions' => $request->directions,
                'nutrition_text' => $request->nutrition_text,

                'recipe_type' => $request->recipe_type,


            ]);

            // Delete Old Ingredients and Recreate
            $recipe->ingredients()->delete();
            $ingredients = $request->input('ingredients', []);
            foreach ($ingredients as $ingredientData) {
                $recipe->ingredients()->create([
                    'ingredients_title' => $ingredientData['title'],
                    'ingredients_list' => json_encode($ingredientData['ingredients_list']),
                ]);
            }

            // Delete Old Nutritions and Recreate
            $recipe->nutritions()->delete();
            $nutritions = $request->input('nutritions', []);
            foreach ($nutritions as $nutritionData) {
                $recipe->nutritions()->create([
                    'name' => $nutritionData['name'],
                    'amount' => $nutritionData['amount'],
                    'unit' => $nutritionData['unit'],
                ]);
            }

            DB::commit();

            return redirect()->route('recipe.index')->with('success', 'Recipe updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Handle the error
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
