<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    function index( Request $request) {

        $query = Blog::query();

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('long_description', 'LIKE', "%{$searchTerm}%");
        }
    
        $posts = $query->with('users')->paginate(2);
    
        return view('pages.blog.index', compact('posts'));

    }

    function show(Blog $blog) {
        $blog->load('users');
        //return $blog;
        
        return view('pages.blog.show', compact('blog'));
    }
}
