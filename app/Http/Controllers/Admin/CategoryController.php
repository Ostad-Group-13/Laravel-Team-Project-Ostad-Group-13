<?php

namespace App\Http\Controllers\Admin;

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
            return $this->ResponseSuccess(new CategoryResource($data), "Category Create Successfully", 201);
        } catch (\Exception $ex) {
            return $this->ResponseError($ex->getMessage());
        }
    }

    public function index()
    {
        $perPage = request('per_page');
        $data = $this->categoryRepository->allPaginated($perPage);
        if (!$data) {
            return $this->ResponseError([], null, 'No Data Found', 200, 'error');
        }
        return $this->ResponseSuccess($data);
    }
    public function update(CategoryUpdateRequest $request, $id)
    {
        try {
            $data = $this->categoryRepository->update($request, $id);
            return $this->ResponseSuccess(new CategoryResource($data), "Category Updated Successfully", 201);
        } catch (\Exception $ex) {
            return $this->ResponseError($ex->getMessage());
        }
    }

    public function destroy($id){
        try {
            $data = $this->categoryRepository->delete($id);
            return $this->ResponseSuccess($data, null, 'Category Deleted Successfully!', 201);
        } catch (\Exception $ex) {
            return $this->ResponseError($ex->getMessage());
        }
    }

    public function status($id){
        try {
            $data = $this->categoryRepository->status($id);
            return $this->ResponseSuccess($data, null, 'Status Updated Successfully!', 201);
        } catch (\Exception $ex) {
            return $this->ResponseError($ex->getMessage());
        }
    }

}
