<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\{CategoryController, RoleController, UserController};
use App\Http\Controllers\Frontend\PageController;


// pages route
Route::get('/', function () {
    return view('pages.home');
});

Route::get('/contact',  [PageController::class, 'contactPage'])->name('contact');

Route::get('/articles',  [PageController::class, 'blogPage']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::resources([
        'roles' => RoleController::class,
        'users' => UserController::class,
    ]);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /**
     * Develop By Hasib Feature
     */
    # Category Route
    Route::resource('category', CategoryController::class);
    # Blog Route
    Route::resource('blog', BlogController::class);

});
