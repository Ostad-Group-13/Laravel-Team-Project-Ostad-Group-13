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
use Illuminate\Support\Facades\File;
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

        // return $request->all();


        try {

            DB::beginTransaction();

            // Handle file upload for photo
            $url = '';

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $url = $file->move('uploads/recipes/', $filename);
                $recipe->photo = $url;
            }


            // Create the recipe record
            $recipe = Recipe::create([

                'title' => $request['recipeTitle'],
                'slug' => Str::slug($request['recipeTitle']),
                'pre_time' => $request['pre_time'],
                'cook_time' => $request['cook_time'],
                'video_link' => $request['video_link'],
                'photo' => $url,
                'category_id' => $request->cat_id,
                'user_id' => Auth::user()->id,

                'nutrition_text' => $request->nutrition_text,
                'short_description' => $request->short_description,
                'directions' => $request->directions,
                'recipe_type' => $request->recipe_type,

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

                $data = [];

                foreach ($request['nutritions'] as $nutrition) {

                    $data['name'] = $nutrition['name'];
                    $data['amount'] = $nutrition['amount'];
                    $data['unit'] = $nutrition['unit'];
                    $data['recipe_id'] = $recipe->id;

                    Nutrition::insert($data);
                }
            }

            DB::commit();

            // return response()->json(['status' => 'success', 'message' => 'Recipe created successfully.']);
            return redirect()->route('recipe.index');
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }


        $toasterMessage = [
            'message' => "Recipe Created Successfully...",
            'alert-type' => "success"
        ];

        return redirect()->route('recipe.index')->with($toasterMessage);
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

        // Assuming ingredients and nutritions are stored as JSON or related models
        $ingredients = $recipe->ingredients; // Adjust if using JSON or relationship
        $nutritions = $recipe->nutritions;

        // return view('backend.recipe.edit', ['recipe' => $recipe, 'categories' => $categories ]);

        return view('backend.recipe.edit', compact('recipe', 'ingredients', 'nutritions', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
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
            //         // unlink($recipe->photo);

            //     }
            //     $photo = $request->file('photo')->store('recipes', 'public');
            //     $recipe->photo = $photo;
            // }

            # old image  delete



            $url = '';

            if ($request->hasFile('photo')) {


                #img upload and old img delete
                if (File::exists($recipe->photo)) {
                    File::delete($recipe->photo);
                }

                # Image upload

                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $url = $file->move('uploads/recipes/', $filename);
                $recipe->photo = $url;
            }


            // # Image upload
            // $file = $request->file('FileUpload');
            // $filename = time() . '.' . $file->getClientOriginalExtension();
            // // $url = $file->move(public_path('uploads/car'), $filename);
            // $url = $file->move('uploads/blog/', $filename);
            // // $file->move('uploads/car', $filename);
            // // $url = uploadImage($request->file('image'), 'car');
            // $blog->image = $url;

            // Update recipe
            $recipe->update([
                'title' => $request['recipeTitle'],
                'slug' => Str::slug($request['recipeTitle']),
                'pre_time' => $request['pre_time'],
                'cook_time' => $request['cook_time'],
                'photo' => $url,
                'video_link' => $request['video_link'],

                'category_id' => $request->cat_id,
                'user_id' => Auth::user()->id,
                'short_description' => $request->short_description,
                'directions' => $request->directions,
                'nutrition_text' => $request->nutrition_text,

                'recipe_type' => $request->recipe_type,


            ]);


            // Update ingredients
            $recipe->ingredients()->delete();
            if (!empty($request['ingredients'])) {
                foreach ($request['ingredients'] as $ingredient) {
                    $recipe->ingredients()->create([
                        'ingredients_title' => $ingredient['title'],
                        'ingredients_list' => json_encode($ingredient['ingredients_list']),
                        'recipe_id' => $recipe->id,
                    ]);
                }
            }

            // Update nutritions
            $recipe->nutritions()->delete();
            if (!empty($request['nutritions'])) {
                foreach ($request['nutritions'] as $nutrition) {
                    $recipe->nutritions()->create([
                        'name' => $nutrition['name'],
                        'amount' => $nutrition['amount'],
                        'unit' => $nutrition['unit'],
                        'recipe_id' => $recipe->id,

                    ]);
                }
            }

            DB::commit();
            // return response()->json(['status' => 'success', 'message' => 'Recipe updated successfully.']);
            return redirect()->route('recipe.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        // return redirect()->route('recipe.index');
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
}
