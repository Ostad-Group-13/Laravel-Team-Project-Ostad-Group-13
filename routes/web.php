<?php

//use BackendController;
// use UserControllerport\Facades\Routeommentsp\Requestport\Facades\Routeport\Facades\Routeers\Admin\{ UserController};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BackendController;
use App\Http\Controllers\Frontend\PageController;

use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin/dashboard', function () {
//     return view('dashboard');
// });
// Route::resource('blogs', BlogController::class);

// pages route
Route::get('/', [PageController::class, 'homePage'])->name('homePage');

Route::get('/contact',  [PageController::class, 'contactPage'])->name('contactPage');
Route::get('/about',  [PageController::class, 'aboutPage'])->name('aboutPage');

Route::get('/racipes',  [PageController::class, 'racipesPage'])->name('racipesPage');

Route::get('/articles',  [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blogPage');

Route::get('/articles/{blog:slug}', [App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('article.show');


Route::post('/subscribe', [PageController::class, 'collectEmail'])->name('newsletter.subscribe');

Route::get('/search-blogs', [App\Http\Controllers\Frontend\BlogController::class, 'search'])->name('search.blogs');




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
    // Route::get('/all-categories', [CategoryController::class, 'allCategories']);
    // Route::get('/categories/status/{id}', [CategoryController::class, 'status']);
    Route::resource('category', CategoryController::class);
    # Blog Route
    // Route::get('/all-blogs', [BlogController::class, 'allBlogs']);
    Route::resource('blog', BlogController::class);
    Route::get('blog/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');

    //Common Feature For Backend
    Route::get('subscribe', [BackendController::class, 'Subscribe'])->name('subscribe');
    Route::get('contact-us', [BackendController::class, 'contact'])->name('contact');
    Route::get('userList', [BackendController::class, 'userlist'])->name('user-list');
    Route::get('UserPost/{UserPost}', [BackendController::class, 'UserPost'])->name('User-Post');

    // Route::get('comments/{recipe_id}', [Comments::class, 'render'])->name('comments');
});
