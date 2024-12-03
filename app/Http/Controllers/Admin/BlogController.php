<?php

namespace App\Http\Controllers\Admin;

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
    }

    public function store(BlogStoreRequest $request)
    {
        try {
            $data = $this->blogRepository->store($request);
            return $this->ResponseSuccess(new BlogResource($data), "Blog Create Successfully", 201);
        } catch (\Exception $ex) {
            return $this->ResponseError($ex->getMessage());
        }
    }
    public function index()
    {
        $perPage = request('per_page');
        $data = $this->blogRepository->allPaginated($perPage);
        if (!$data) {
            return $this->ResponseError([], null, 'No Data Found', 200, 'error');
        }
        return $this->ResponseSuccess($data);
    }
    public function update(BlogUpdateRequest $request, $id)
    {
        try {
            $data = $this->blogRepository->update($request, $id);
            return $this->ResponseSuccess(new BlogResource($data), "Blog Updated Successfully", 201);
        } catch (\Exception $ex) {
            return $this->ResponseError($ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $data = $this->blogRepository->delete($id);
            return $this->ResponseSuccess($data, null, 'Blog Deleted Successfully!', 201);
        } catch (\Exception $ex) {
            return $this->ResponseError($ex->getMessage());
        }
    }
}
