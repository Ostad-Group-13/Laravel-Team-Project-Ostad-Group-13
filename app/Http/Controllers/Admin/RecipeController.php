<?php

namespace App\Http\Controllers\admin;

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
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRecipeRequest;

use App\Http\Requests\UpdateRecipeRequest;




// use App\Models\Ingredient;

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
        // dd($request->all());
        try {
            DB::beginTransaction();

            $url = '';
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $url = $file->move('uploads/recipes/', $filename);
                $recipe->photo = $url;
            }

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

            if (!empty($request->input('ingredients'))) {
                foreach ($request->input('ingredients') as $ingredient) {
                    Ingredient::create([
                        'ingredients_title' => $ingredient['title'],
                        'ingredients_list' => json_encode($ingredient['ingredients_list']),
                        'recipe_id' => $recipe->id,
                    ]);
                }
            }

            if (!empty($request->input('nutritions'))) {
                $data = [];
                foreach ($request->input('nutritions') as $nutrition) {
                    $data[] = [
                        'name' => $nutrition['name'],
                        'amount' => $nutrition['amount'],
                        'unit' => $nutrition['unit'],
                        'recipe_id' => $recipe->id,
                    ];
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
            if ($request->hasFile('photo')) {

                if ($recipe->photo) {
                    Storage::disk('public')->delete($recipe->photo);
                }

                // Store new photo
                $photo = $request->file('photo')->store('recipes', 'public');
                $recipe->photo = $photo;
            }

            // Update Recipe Details
            $recipe->update([
                'title' => $request->input('recipeTitle'),
                'slug' => Str::slug($request->input('recipeTitle')),
                'pre_time' => $request->input('pre_time'),
                'cook_time' => $request->input('cook_time'),
                'category_id' => $request->input('cat_id'),
                'user_id' => Auth::id(),
                'short_description' => $request->input('short_description'),
                'directions' => $request->input('directions'),
                'nutrition_text' => $request->input('nutrition_text'),
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
            'alert-type' => "info"
        ];

        return redirect()->route('recipe.index')->with($toasterMessage);
    }
}
