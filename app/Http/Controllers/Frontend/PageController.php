<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\Nutrition;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{

    function homePage(){
        $categorys = Category::take(6)->get();
        $recipes = Recipe::take(6)->with('category')->get();
        //return $recipes;
        return view('pages.home', ['categorys' => $categorys, 'recipes' => $recipes]);
    }

    function contactPage(){
        return view('pages.contact');
    }


    function aboutPage(){
        return view('pages.about');
    }

    function recipesPage(){
        return view('pages.recipes');
    }

    function collectEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscriptions',
        ]);
    
        DB::table('subscriptions')->insert([
            'email' => $request->email,
        ]);
    
        return response()->json(['status' => 'success', 'message' => 'Subscribed successfully.']);
    }



}
