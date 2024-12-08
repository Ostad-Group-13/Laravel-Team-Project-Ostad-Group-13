<?php

namespace App\Repositories\Blog;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Service\FileUploadService;
use App\Repositories\Blog\BlogInterface;

class BlogRepository implements BlogInterface
{
    private $file_path = 'uploads/';
    public function store($request)
    {

        $auth = auth()->user();
        $data = Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'user_id' => $auth->id,
            'cat_id' => $request->cat_id,
        ]);

        $image_path = (new FileUploadService())->imageUpload($request, $data, $this->file_path);
        $data->update([
            'image' => $image_path
        ]);

        return $this->show($data->id);
    }
    public function allPaginated($perPage)
    {
        $data = Blog::latest('id')->with('category', 'user')
            ->paginate($perPage);
        return $data;
    }
    public function all()
    {
        $data = Blog::latest('id')
               ->get();
        return $data;
    }
    public function show($id)
    {
        return Blog::findOrFail($id);
    }
    public function update($request, $id)
    {
        $data = $this->show($id);
        $auth = auth()->user();
        $data->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'user_id' =>  $auth->id,
            'cat_id' => $request->cat_id,
        ]);

        $image_path = (new FileUploadService())->imageUpload($request, $data, $this->file_path);
        $data->update([
            'image' => $image_path
        ]);

        return $data;
    }
    public function delete($id)
    {
        $category = $this->show($id);
        if ($category) {
            $category->delete();
            return true;
        }
        return false;
    }
}
