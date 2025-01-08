<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Recipe;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    function homePage(){
        $categorys = Category::where('status', 'active')->take(6)->get();
        $recipes = Recipe::take(6)->with('category')->get();
        //return $categorys;
        return view('pages.home', ['categorys' => $categorys, 'recipes' => $recipes]);
    }

    function contactPage(){
        return view('pages.contact');
    }

    public function storeContact(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required',
            ]);
    
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'enquiry_type' => $request->enquiry_type,
                'message' => $request->message,
            ]);
    
            return response()->json(['status' => 'success', 'message' => 'Message sent successfully.']);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return validation errors
            return response()->json([
                'status' => 'error',
                'errors' => $e->errors(),
            ], 422);
        }
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


    function categoryByRecipe(Category $category){
        $category = Category::where('slug', $category->slug)->with('recipe')->first();
        //return $category;
        return view('pages.recipe.category-by-recipe', compact('category'));
        
    }



}
