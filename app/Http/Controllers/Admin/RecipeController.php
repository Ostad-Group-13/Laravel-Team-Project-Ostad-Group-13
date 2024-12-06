<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Nutritions;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    function ListRecipe(Request $request){
        $data = Recipe::all();
        return response()->json([
            'status'=>"Success",
            'data'=>$data
        ],200);
    }

    function CreateRecipe(Request $request){
        $img = $request->file('img');
        $file_name=$img->getClientOriginalName();
        $img->move(public_path('uploads/recipe'),$file_name);

        $recipe = Recipe::create([
            'title'=>$request->input('title'),
            'photo'=>$file_name,
            'slug'=> Str::slug($request->input('title')),
            'pre_time'=>$request->input('pre_time'),
            'cook_time'=>$request->input('cook_time'),
            'video_link'=>$request->input('video_link'),
            'nutritions_text'=>$request->input('nutritions_text'),
            'short_description'=>$request->input('short_description'),
            'directions'=>$request->input('directions'),
        ]);

        $recipe_id = $recipe->id;
        Ingredient::create([
            'recipe_id'=>$recipe_id,
            'title'=>$request->input('ingredient_title'),
            'ingredients_list'=>json_encode($request->input('ingredients_list')),
        ]);

        Nutritions::create([
            'name'=>$request->input('nutrition_name'),
            'amount'=>$request->input('amount'),
            'unit'=>$request->input('unit'),
            'recipe_id'=>$recipe_id
        ]);

        return response()->json([
            'status'=>"Success",
            'data'=>$recipe,
        ],201);

    }

    function ByRecipeID(Request $request)
    {
        $recipe_id=$request->input('recipe_id');
        return Recipe::where('id',$recipe_id)->first();
    }

    function UpdateRecipe(Request $request){
        $recipe_id=$request->input('recipe_id');

        if ($request->hasFile('img')) {

            // Upload New File
            $img=$request->file('img');
            $file_name=$img->getClientOriginalName();
            $img->move(public_path('uploads/recipe'),$file_name);

            // Delete Old File
            $filePath=$request->input('file_path');
            File::delete($filePath);

            // Update Product
            return Recipe::where('id',$recipe_id)->update([
                'title'=>$request->input('title'),
                'photo'=>$file_name,
                'slug'=> Str::slug($request->input('title')),
                'pre_time'=>$request->input('pre_time'),
                'cook_time'=>$request->input('cook_time'),
                'video_link'=>$request->input('video_link'),
                'nutritions_text'=>$request->input('nutritions_text'),
                'short_description'=>$request->input('short_description'),
                'directions'=>$request->input('directions'),
            ]);

        }else{
            return Recipe::where('id',$recipe_id)->update([
                'title'=>$request->input('title'),
                'slug'=> Str::slug($request->input('title')),
                'pre_time'=>$request->input('pre_time'),
                'cook_time'=>$request->input('cook_time'),
                'video_link'=>$request->input('video_link'),
                'nutritions_text'=>$request->input('nutritions_text'),
                'short_description'=>$request->input('short_description'),
                'directions'=>$request->input('directions'),
            ]);
        }
    }

    function DeleteRecipe(Request $request){
        $recipe_id=$request->input('recipe_id');
        $filePath=$request->input('file_path');
        File::delete($filePath);
        return Recipe::where('id',$recipe_id)->delete();
    }
}
