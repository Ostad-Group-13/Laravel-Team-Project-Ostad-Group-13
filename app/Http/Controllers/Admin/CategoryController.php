<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use function App\helpers\deleteImage;
use function App\helpers\uploadImage;

// use function App\uploadImage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::latest('id')->paginate(10);
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Category $category)
    {
        # Validation
        $request->validate([
            'categoryName' => 'required',
            'status' => 'required|string|in:active,inactive',
        ], [
            'categoryName.required' => 'Sorry Category Name is Empty',
            'status.required' => 'Sorry Status is Empty',
        ]);


        // $category = new Category();

        if ($request->file('FileUpload')) {

            # upload image using helper function
            $url = uploadImage($request->file('FileUpload'), 'category');
            $category->image = $url;
        }

        $category->name = $request->input('categoryName');
        $category->slug = Str::slug($request->categoryName);
        $category->status = $request->input('status');
        $category->color = $request->input('color');
        $category->save();

        $notification = [
            'message' => 'Created Category Successfully',
            'alert-type' => 'success'
        ];


        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //

        // return $category->id;
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        if ($request->file('FileUpload')) {

            # old img delete
            deleteImage($category->image);

            # Image upload
            $category->image = uploadImage($request->file('FileUpload'), 'category');
        }

        $category->name = $request->categoryName;
        $category->slug = Str::slug($request->categoryName);
        $category->status = $request->status;
        $category->color = $request->color;
        $category->save();

        $notification = [
            'message' => 'Category Successfully Updated...',
            'alert-type' => 'info'
        ];

        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        #img upload and old img delete
        // if (File::exists($category->image)) {
        //     File::delete($category->image);
        // }

        //Delete Image with Helper Function
        deleteImage($category->image);

        $category->delete();

        $notification = [
            'message' => 'Deleted Category Successfully',
            'alert-type' => 'error'
        ];

        return redirect()->route('category.index')->with($notification);
    }
}
