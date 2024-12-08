<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\RecipeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RecipeSliderController extends Controller
{

    //Display a listing of the resource.
    public function index()
    {

        $recipeSlider = RecipeSlider::with('user', 'recipe')->latest()->paginate(2);
        return view('backend.recipeslider.index', compact('recipeSlider'));
    }


    //Show the form for creating a new resource.
    public function create(Request $request)
    {
        $recipes = Recipe::get();
        return view('backend.recipeslider.create', compact('recipes'));
    }


    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $img = $request->file('img');
        $file_name = $img->getClientOriginalName();
        $img->move(public_path('uploads/slider'), $file_name);

        $recipeSlider = RecipeSlider::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'img' => $file_name,
            'user_id' => $user_id,
            'recipe_id' => $request->input('recipe_id'),
        ]);
        return response()->json([
            'status' => "Success",
            'data' => $recipeSlider
        ], 201);
    }


    //Display the specified resource.
    public function show(RecipeSlider $recipeSlider)
    {
        //$recipeSlider = RecipeSlider::with('recipe')->find($recipeSlider->id);

        return view('backend.recipeslider.show', compact('recipeSlider'));
    }


    //Show the form for editing the specified resource.
    public function edit(RecipeSlider $recipeSlider)
    {
        return view('backend.recipeslider.edit', compact('recipeSlider'));
    }


    //Update the specified resource in storage.
    public function update(Request $request, RecipeSlider $recipeSlider)
    {

        $slider_id = $recipeSlider->id;

        if($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $img->getClientOriginalName();
            $img->move(public_path('uploads/slider'), $file_name);

            $filePath=$request->input('file_path');
            File::delete($filePath);


             RecipeSlider::where('id', $slider_id)->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'img' => $file_name,

            ]);

        }
        else{
            RecipeSlider::where('id', $slider_id)->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),

            ]);
        }

        return redirect()->route('recipe-slider.index');
    }


    //Remove the specified resource from storage.
    public function destroy(RecipeSlider $recipeSlider)
    {
        $recipe_id = $recipeSlider->id;
        RecipeSlider::where('id', $recipe_id)->delete();
        return redirect()->route('recipe-slider.index');

    }
}
