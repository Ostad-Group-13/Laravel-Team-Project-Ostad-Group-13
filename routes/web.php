<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\{BackendController, CategoryController, RoleController, UserController};
use App\Http\Controllers\Frontend\PageController;


// pages route
Route::get('/', function () {
    return view('pages.home');
});

Route::get('/contact',  [PageController::class, 'contactPage'])->name('contact');
Route::get('/about',  [PageController::class, 'aboutPage'])->name('aboutPage');
Route::get('/articles',  [PageController::class, 'blogPage'])->name('blogPage');

Route::get('/racipes',  [PageController::class, 'racipesPage'])->name('racipesPage');

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
    Route::get('blog/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');

    //Common Feature For Backend
    Route::get('subscribe', [BackendController::class, 'Subscribe'])->name('subscribe');
    Route::get('contact-us', [BackendController::class, 'contact'])->name('contact');
    Route::get('userList', [BackendController::class, 'userlist'])->name('user-list');
    Route::get('UserPost/{UserPost}', [BackendController::class, 'UserPost'])->name('User-Post');
});
