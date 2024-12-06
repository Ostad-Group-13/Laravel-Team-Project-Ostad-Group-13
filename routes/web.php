<?php

use App\Http\Controllers\RecipeSliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\{BackendController,
    CategoryController,
    RecipeController,
    RoleController,
    UserController};
use App\Http\Controllers\Frontend\PageController;
use App\Livewire\Comments;


// pages route
Route::get('/', [PageController::class, 'homePage'])->name('homePage');

Route::get('/contact',  [PageController::class, 'contactPage'])->name('contactPage');
Route::get('/about',  [PageController::class, 'aboutPage'])->name('aboutPage');

Route::get('/racipes',  [PageController::class, 'racipesPage'])->name('racipesPage');

Route::get('/articles',  [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blogPage');

Route::get('/articles/{blog:slug}', [App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('article.show');


Route::post('/subscribe', [PageController::class, 'collectEmail'])->name('newsletter.subscribe');




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

    Route::get('comments/{recipe_id}', [Comments::class, 'render'])->name('comments');
});
/*develop by ekramul*/
Route::post('create-recipe', [RecipeController::class, 'CreateRecipe'])->name('create-recipe');
Route::get('list-recipe', [RecipeController::class, 'ListRecipe'])->name('list-recipe');
Route::post('by-recipe-id', [RecipeController::class, 'ByRecipeID'])->name('by-recipe-id');
Route::delete('delete-recipe', [RecipeController::class, 'DeleteRecipe'])->name('delete-recipe');
Route::post('update-recipe', [RecipeController::class, 'UpdateRecipe'])->name('update-recipe');
Route::resource('recipe-slider', RecipeSliderController::class);
