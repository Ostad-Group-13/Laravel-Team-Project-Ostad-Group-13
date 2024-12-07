<?php

namespace App\Http\Controllers;

use App\Models\RecipeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RecipeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RecipeSlider::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        return view('backend.recipeslider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img = $request->file('img');
        $file_name = $img->getClientOriginalName();
        $img->move(public_path('uploads/slider'), $file_name);

        $recipeSlider = RecipeSlider::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'img' => $request->input('img'),
            'recipe_id' => $request->input('recipe_id')
        ]);
        return response()->json([
            'status' => "Success",
            'data' => $recipeSlider
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(RecipeSlider $recipeSlider)
    {

        return view('backend.recipeslider.show', compact('recipeSlider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecipeSlider $recipeSlider)
    {
        return $recipeSlider;
        return view('backend.recipeslider.edit', compact('recipeSlider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecipeSlider $recipeSlider)
    {
        $recipe_id = $request->input('recipe_id');

        if($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $img->getClientOriginalName();
            $img->move(public_path('uploads/slider'), $file_name);

            $filePath=$request->input('file_path');
            File::delete($filePath);


            return RecipeSlider::where('recipe_id', $recipe_id)->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'img' => $file_name,

            ]);

        }
        else{
            return RecipeSlider::where('recipe_id', $recipe_id)->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecipeSlider $recipeSlider)
    {

        $recipeSlider->delete();

    }
}
