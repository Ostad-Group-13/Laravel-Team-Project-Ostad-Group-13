<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Repositories\Blog\BlogRepository;

class BlogController extends Controller
{
    use ApiResponse;
    protected $blogRepository;
    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
        $user = auth()->user();
        if (!$user->hasRole('Super Admin')){
            return abort(404);
        }
    }

    public function store(BlogStoreRequest $request)
    {
        try {
            $data = $this->blogRepository->store($request);
            return redirect()->route('blog.index')
            ->withSuccess('Blog Created successfully.');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }


    public function index()
    {
        $perPage = 10;
        $data['blogs'] = $this->blogRepository->allPaginated($perPage);
        return view('backend.blog.index',$data);
    }

    public function create()
    {
        $categories = Category::where('status','active')->get();
        return view('backend.blog.create', compact('categories'));
    }


    public function edit(Blog $blog)
    {
       $data['blog'] = $blog;
       $data['category'] = Category::all();
       return view('backend.blog.edit', $data);
    }
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        try {
            $data = $this->blogRepository->update($request, $blog->id);
            return redirect()->route('blog.index')
            ->withSuccess('Blog Updated successfully.');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $data = $this->blogRepository->delete($id);
            return redirect()->route('blog.index')
            ->withSuccess('Blog Deleted successfully.');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
    public function show(Blog $blog){
        return view('backend.blog.show', compact('blog'));
    }
}
