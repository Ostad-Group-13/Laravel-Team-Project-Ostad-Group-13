<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    function index() {
        return view('pages.blog.index' );

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
