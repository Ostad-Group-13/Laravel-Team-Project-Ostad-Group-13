<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    function ListRecipeByCategory(Request $request){
        $data = Recipe::where('category_id',$request->catetory_id)
            ->orWhere('user_id',$request->user_id)
            ->get();
        return response()->json([
            'status'=>"Success",
            'data'=>$data
        ],200);
    }

    function RecipeList(Request $request){
        return Recipe::get();
    }
    function CreateRecipe(Request $request){
        $img = $request->file('img');
        $file_name=$img->getClientOriginalName();
        $img->move(public_path('uploads'),$file_name);

        return Recipe::create([
            'photo'=>$request->input('photo'),
            'title'=>$request->input('title'),
            'pre_time'=>$request->input('pre_time'),
            'cook_time'=>$request->input('cook_time'),
            'price'=>$request->input('price'),
        ]);

    }
    function ByRecipeID(Request $request)
    {
        $recipe_id=$request->input('recipe_id');
        return Recipe::where('recipe_id',$recipe_id)->first();
    }
}
