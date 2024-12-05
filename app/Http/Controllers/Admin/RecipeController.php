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
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;

use function App\helpers\uploadImage;


// use App\Models\Ingredient;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $recipes = Recipe::all();
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

            // Handle file upload for photo
            $photo = $request->hasFile('photo') ? $request->file('photo')->store('recipes', 'public') : null;

            // Create the recipe record
            $recipe = Recipe::create([

                'title' => $request['recipeTitle'],
                'slug' => Str::slug($request['recipeTitle']),
                'pre_time' => $request['pre_time'],
                'cook_time' => $request['cook_time'],
                'video_link' => $request['video_link'],
                'photo' => $photo,
                'category_id' => $request->cat_id,
                'user_id' => Auth::user()->id,

                'nutrition_text' => $request->nutrition_text,
                'short_description' => $request->short_description,
                'directions' => $request->directions,

            ]);

            // Create ingredients and their lists (if provided)
            if (!empty($request['ingredients'])) {

                foreach ($request['ingredients'] as $ingredient) {
                    Ingredient::create([
                        'ingredients_title' => $ingredient['title'],
                        'ingredients_list' => json_encode($ingredient['ingredients_list']),
                        'recipe_id' => $recipe->id,
                    ]);
                }
            }

            // Create nutrition data (if provided)
            if (!empty($request['nutritions'])) {
                foreach ($request['nutritions'] as $nutrition) {
                    Nutrition::create([
                        'name' => $nutrition['name'],
                        'amount' => $nutrition['amount'],
                        'unit' => $nutrition['unit'],
                        'recipe_id' => $recipe->id,
                    ]);
                }
            }

            DB::commit();

            // return response()->json(['status' => 'success', 'message' => 'Recipe created successfully.']);
            return redirect()->route('recipe.index');
        } catch (\Exception $th) {
            DB::rollBack();
            // return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
            // $toasterMessage = [
            //     'message' => "Recipe Created Successfully...",
            //     'alert-type' => "error",
            //     'sms' => $th->getMessage()
            // ];
            return redirect()->route('recipe.index');
        }


        $toasterMessage = [
            'message' => "Recipe Created Successfully...",
            'alert-type' => "success"
        ];

        // return redirect()->route('recipe.index')->with($toasterMessage);
        return redirect()->route('recipe.index')->with($toasterMessage);
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {


        // return Ingredient::where('recipe_id', $recipe->id)->with('nutrition')->get();
        // return Nutrition::where('recipe_id', $recipe->id)->get();
        //  $recipe = Recipe::Where('id',$recipe->id)->with('ingredient','nutrition')->get();
        // $recipe = Recipe::Where('id',$recipe->id)->get();
        // return $recipe;
        // return view('backend.recipe.show', ['recipe' => $recipe]);
        return view('backend.recipe.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        $categories = Category::all();
        return view('backend.recipe.edit', compact('recipe', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {


        // Handle file upload for photo
        $photo = $request->hasFile('photo') ? $request->file('photo')->store('recipes', 'public') : null;



        $recipe->title = $request->recipeTitle;
        $recipe->slug = Str::slug($request->recipeTitle);
        $recipe->pre_time = $request->pre_time;
        $recipe->cook_time = $request->cook_time;
        $recipe->video_link = $request->video_link;
        $recipe->category_id = $request->cat_id;
        $recipe->user_id = 2;
        $recipe->nutrition_text  = $request->nutrition_text;
        $recipe->short_description = $request->short_description;
        $recipe->directions = $request->directions;
        $recipe->photo = $photo;
        $recipe->video_link = $request->video_link;


        $recipe->save();

        $ToasterMessage = [
            'message' => "Recipe Updated Successfully...",
            'alert-type' => "success"
        ];

        return redirect()->route('recipe.index')->with($ToasterMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
        $recipe->delete();

        $toasterMessage = [
            'message' => "Recipe Deleted Successfully",
            'alert-type' => "error"
        ];

        return redirect()->route('recipe.index')->with($toasterMessage);
    }
}
