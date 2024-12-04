<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\Nutrition;
use App\Models\Ingredient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Service\FileUploadService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

class PageController extends Controller
{

    function homePage(){
        $categorys = Category::take(6)->get();
        //return $categorys;
        return view('pages.home', ['categorys' => $categorys]);
    }

    function contactPage(){
        return view('pages.contact');
    }


    function aboutPage(){
        return view('pages.about');
    }

    function racipesPage(){
        return view('pages.racipes');
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
