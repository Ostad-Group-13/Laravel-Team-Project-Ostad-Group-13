<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    function index() {
        $recipes = Recipe::take(3)->inRandomOrder()->with('user')->get();
        return view('pages.blog.index', compact('recipes'));

    }

    function show(Blog $blog) {
        $blog->load('user');
        //return $blog;
        
        return view('pages.blog.show', compact('blog'));
    }


    public function search(Request $request){
    $searchTerm = $request->query('q');

    $blogs = Blog::query()
        ->where('title', 'like', "%{$searchTerm}%")
        ->orWhere('long_description', 'like', "%{$searchTerm}%")
        ->orderBy('created_at', 'desc') // Sort by most recent
        ->with('user')
        ->paginate(5); // 5 items per page

    return response()->json($blogs);
}




}
