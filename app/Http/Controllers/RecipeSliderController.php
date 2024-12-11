<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\RecipeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use function App\helpers\uploadImage;

class RecipeSliderController extends Controller
{

    //Display a listing of the resource.
    public function index()
    {

        $recipeSlider = RecipeSlider::with('user', 'recipe')->latest()->paginate(5);
        return response()->json($recipeSlider);

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
        // return $request->all();

        $user_id = Auth::user()->id;

        # img upload


        // if ($request->type == 'image') {


        // }

        // else {
        //     # video upload
        //     $img = $request->file('uploadVideo');
        //     $file_name = $img->getClientOriginalExtension();
        //     $img->move(public_path('uploads/slider'), $file_name);
        // }

        $url = '';

        # img upload
        if ($request->hasFile('uploadImg')) {
            $img = $request->file('uploadImg');
            $path = time() . '.' . $img->getClientOriginalExtension();
            // $img->move(public_path('uploads/slider'), $path);
            $url = $img->move('uploads/slider', $path);


            // $path = uploadImage($request->file('uploadImg'), 'slider');
        }

        if ($request->hasFile('uploadVideo')) {
            $path = $request->file('uploadVideo')->move('uploads/slider', $path);
            // $video->video = $path;
        }


        $recipeSlider = RecipeSlider::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'img' => $url,
            'user_id' => $user_id,
            'recipe_id' => $request->input('recipe_id'),
            'status' => 'inactive'

        ]);
        // return response()->json([
        //     'status' => "Success",
        //     'data' => $recipeSlider
        // ], 201);

        return redirect()->route('recipe-slider.index');
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
        $recipes = Recipe::all();
        return view('backend.recipeslider.edit', compact('recipes', 'recipeSlider'));
    }


    //Update the specified resource in storage.
    public function update(Request $request, RecipeSlider $recipeSlider)
    {


        $slider_id = $recipeSlider->id;
        $user_id = Auth::user()->id;
        $url = "";


        if ($request->hasFile('uploadImg')) {

            # Old img Delete
            $old_image = 'uploads/slider/' . $recipeSlider->img;
            if (file_exists($old_image)) {
                unlink($old_image);
            }

            // if ($request->hasFile('photo')) {
            //     $file = $request->file('photo');
            //     $filename = time() . '.' . $file->getClientOriginalExtension();
            //     $url = $file->move('uploads/recipes/', $filename);
            //     $recipe->photo = $url;
            // }

            #Upload Img
            $img = $request->file('uploadImg');
            $file_name = $img->getClientOriginalName();
            // $img->move(public_path('uploads/slider'), $file_name);
            $url = $img->move('uploads/slider', $file_name);


            // $filePath = $request->input('file_path');
            // File::delete($filePath);

            RecipeSlider::where('id', $slider_id)->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'img' => $url,
                'user_id' => $user_id,
                'recipe_id' => $request->input('recipe_id'),

            ]);
        } else {
            RecipeSlider::where('id', $slider_id)->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'img' => $url,
                'user_id' => $user_id,
                'recipe_id' => $request->input('recipe_id'),
                

            ]);
        }

        return redirect()->route('recipe-slider.index');
    }


    //Remove the specified resource from storage.
    public function destroy(RecipeSlider $recipeSlider)
    {
        $recipe_id = $recipeSlider->id;
        // $filePath = $request->input('file_path');
        // File::delete($filePath);

        if ($recipeSlider->img) {

            $old_image = 'uploads/slider/' . $recipeSlider->img;
            if (file_exists($old_image)) {
                unlink($old_image);
            }

        }

        RecipeSlider::where('id', $recipe_id)->delete();
        return redirect()->route('recipe-slider.index');
    }

    // if ($request->hasFile('image')) {
    //     $filename = $request->image->getClientOriginalName();
    //     $this->deleteOldImage();
    //     $request->image->storeAs('images', $filename, 'public');
    //     Auth()->user()->update(['image' => $filename]);
    //     return back()->with('message', 'Profile Picture Uploaded Successfully');
    // }

    function SliderStatus(RecipeSlider $recipeSlider)
    {

        if ($recipeSlider->status == 'inactive') {
            $status = 'active';
        } else {
            $status = 'inactive';
        }

        $recipeSlider->status = $status;
        $recipeSlider->save();
     
        return redirect()->route('recipe-slider.index');
    }

}
