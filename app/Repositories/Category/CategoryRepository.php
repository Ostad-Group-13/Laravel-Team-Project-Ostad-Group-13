<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Service\FileUploadService;
use App\Repositories\Category\CategoryInterface;

class CategoryRepository implements CategoryInterface
{
    private $file_path = 'uploads/';
    public function store($request)
    {

        $data = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug, '-'),
            'color' => $request->color,
            'status' => $request->status,
        ]);
        $image_path = (new FileUploadService())->imageUpload($request, $data, 'image' , $this->file_path);
        $data->update([
            'image' => $image_path
        ]);

        return $this->show($data->id);
    }
    public function allPaginated($perPage)
    {
        $data = Category::latest('id')
            ->paginate($perPage);
        return $data;
    }
    public function all()
    {
        $data = Category::latest('id')
               ->get();
        return $data;
    }
    public function show($id)
    {
        return Category::findOrFail($id);
    }
    public function update($request, $id)
    {
        $data = $this->show($id);
        $data->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'color' => $request->color,
            'status' => $request->status,
        ]);

        $image_path = (new FileUploadService())->imageUpload($request, $data, 'image' , $this->file_path);
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
