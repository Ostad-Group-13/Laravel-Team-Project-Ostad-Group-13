<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/all-categories', [CategoryController::class, 'allCategories']);
Route::get('/categories/status/{id}', [CategoryController::class, 'status']);
Route::apiResource('categories', CategoryController::class);


Route::get('/all-blogs', [BlogController::class, 'allBlogs']);
Route::apiResource('blogs', BlogController::class);
