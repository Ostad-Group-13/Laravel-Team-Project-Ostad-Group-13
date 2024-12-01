<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

# Helper Function
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use function App\helpers\deleteImage;
use function App\helpers\uploadImage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $blog = Blog::latest('id')->paginate(10);
        return view('backend.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::all();
        return view('backend.blog.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Blog $blog)
    {
        # Check user 

        // $user = User::check();

        // $user = User::Auth()->id();
        $user = Auth::User()->id;
        // $user = Auth::User();
        // return $user->name;

        # Validation
        $request->validate([
            'title' => 'required',
            'cat_id' => 'required',
            // 'FileUpload' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ], [
            'title.required' => 'Sorry Name is Empty',
            'cat_id.required' => 'Sorry Category is Empty',
            // 'FileUpload.required' => 'Sorry Image Field is Empty',
            'short_description.required' => 'Sorry Short Description Field is Empty',
            'long_description.required' => 'Sorry Long Description Field is Empty',
        ]);

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->short_description = $request->short_description;
        $blog->long_description = $request->long_description;
        $blog->user_id = $user;
        $blog->cat_id = $request->cat_id;

        # Image Upload using By Helper Function
        if ($request->hasFile('FileUpload')) {
            $blog->image = uploadImage($request->file('FileUpload'), 'blog');
        }

        $blog->save();

        # Toaster Message
        $notification = [
            'message' => 'Blog Created Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('blog.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        // return $blog->slug;
        // if(!$blog->slug){
        //     return 'yes';
        // }else{
        //     return 'no';
        // }

        // if ($slug !== 1) {
            
        //     return 'yes';

        // } else {
        //     // abort(404, 'Soory No data Found');
        //     // abort(500, 'Something went wrong');
        //     return 'Soory No data';
        // }

        $blog = Blog::where('slug', $blog->slug)->first();
            return view('backend.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
        $category = Category::all();

        return view('backend.blog.edit', compact('blog', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->short_description = $request->short_description;
        $blog->long_description = $request->long_description;
        $blog->user_id = 4;
        $blog->cat_id = $request->cat_id;

        # Helper Function
        if ($request->hasFile('FileUpload')) {

            # OLD image Delete
            deleteImage($blog->image);

            # Upload Image
            $blog->image = uploadImage($request->file('FileUpload'), 'blog');
        }

        $blog->save();

        # Toaster Message
        $notification = [
            'message' => 'Blog Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('blog.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {

        # OLD image Delete
        deleteImage($blog->image);

        #Delete Blog Data
        // $blog->delete();
        Blog::destroy($blog->id);

        # Toaster Message
        $notification = [
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'error'
        ];
        return redirect()->route('blog.index')->with($notification);
    }
}
