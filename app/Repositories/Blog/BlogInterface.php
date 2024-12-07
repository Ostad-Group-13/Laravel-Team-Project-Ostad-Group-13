<?php
namespace App\Repositories\Blog;

interface BlogInterface{

    public function store($data);
    public function allPaginated($perPage);
    public function all();
    public function show($id);
    public function update($id, $data);
    public function delete($id);
}
