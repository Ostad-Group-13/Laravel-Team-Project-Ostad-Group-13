<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Repositories\Category\CategoryRepository;

class CategoryController extends Controller
{
    use ApiResponse;

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function store(CategoryStoreRequest $request)
    {
        try {
            $data = $this->categoryRepository->store($request);
            return redirect()->route('category.index')
            ->withSuccess('Category Created successfully.');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function index()
    {
        $perPage = 10;
        $data['categories'] = $this->categoryRepository->allPaginated($perPage);
        return view('backend.category.index',$data);
    }

    public function create(){
        return view('backend.category.create');
    }

    public function edit(Category $category)
    {
       $data['category'] = $category;
        return view('backend.category.edit',$data);
    }
    // public function update(CategoryUpdateRequest $request, Category $category){

    // }
    public function update(CategoryUpdateRequest $request, Category  $category)
    {
        try {
            $this->categoryRepository->update($request, $category->id);
            return redirect()->route('category.index')
                ->withSuccess('Category Updated successfully.');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function destroy($id){
        try {
            $data = $this->categoryRepository->delete($id);
            return redirect()->route('category.index')
            ->withSuccess('Category Deleted successfully.');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

}
