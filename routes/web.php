<?php

//use BackendController;
use App\Models\Blog;
use App\Models\User;
//use Illuminate\Support\Facades\Routeers\Admin\{RoleController, UserController};
use App\Models\Category;

# Backend Controller
use App\Livewire\Comments;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\RoleController;
//use App\Http\Controllers\RecipeSliderControllerers\Admin\{BackendController, CategoryController, RoleController, UserController, UserRecipeController};
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\RecipeSliderController;

# Frontend Controller
use App\Http\Controllers\Admin\BackendController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Middleware\IncrementRecipeViewCount;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\RecipeController;
use App\Http\Controllers\Admin\RecipeController as Recipe;
use App\Http\Controllers\frontend\FavoriteRecipeController;

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

Route::get('/', [PageController::class, 'homePage']);


Route::get('/contact',  [PageController::class, 'contactPage'])->name('contactPage');
Route::get('/about',  [PageController::class, 'aboutPage'])->name('aboutPage');

Route::get('/recipes-filter',  [RecipeController::class, 'index'])->name('recipesPage');

Route::get('/recipes/{recipe:slug}',  [RecipeController::class, 'show'])->name('recipes.show');

Route::get('/articles',  [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blogPage');

Route::get('/articles/{blog:slug}', [App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('article.show');


Route::post('/subscribe', [PageController::class, 'collectEmail'])->name('newsletter.subscribe');

Route::get('/search-blogs', [App\Http\Controllers\Frontend\BlogController::class, 'search'])->name('search.blogs');

Route::post('/store-contact', [PageController::class, 'storeContact'])->name('store.contact');

Route::get('/category/{category:slug}', [PageController::class, 'categoryByRecipe'])->name(name: 'category.by.recipe');




# =================== Backend Route =================== #

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->prefix('admin')->group(function () {

    // Resource Route Array
    Route::resources([
        'roles' => RoleController::class,
        'users' => UserController::class,
    ]);

    Route::get('/dashboard', function () {

        // $data = [
        //     'category' => Category::all(),
        //     'user' => User::all(),
        // ];

        // return $data['user']->count();
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
    Route::delete('contact-us/{contact}', [BackendController::class, 'ContactDelete'])->name('contact.delete');
    // Route::get('userList', [BackendController::class, 'userlist'])->name('user-list');
    Route::get('UserPost/{UserPost}', [BackendController::class, 'UserPost'])->name('User-Post');

    Route::get('comments/{recipe_id}', [Comments::class, 'render'])->name('comments');

    // Backend Recipe Route
    Route::resource('recipe', Recipe::class);
    Route::get('recipe/status/{recipe}', [Recipe::class, 'RecipeStatus'])->name('recipe.status');

    //Total views recipes on user View Recipes
    // Route::get('/recipes/{recipe}', [Recipe::class, 'show'])->name('recipes.show');

    Route::get('/recipes/{recipe}', [Recipe::class, 'show'])
        ->middleware('increment.recipe.view')->name('recipes.show');


    Route::get('/recipe-view', [Recipe::class, 'RecipeView'])->name('recipe.view');


    //User Recipes Page
    Route::get('user/recipes', [Recipe::class, 'userRecipes'])->name('recipes.user');

    # Backend User Recipe List Route
    Route::get('user/recipe', [Recipe::class, 'UserRecipe'])->name('user.recipe');

    # Favorite Recipe
    Route::get('favorite/recipe', [Recipe::class, 'favorite'])->name('favorite.recipes');

    # Testing
    // Route::get('popular/recipe', [Recipe::class, 'popularPosts'])->name('recipe.popular');

    // Route::get('recipe-show/{recipe}', [Recipe::class, 'recipeShow'])->name('recipe.recipeshow');

    // Route::post('/recipes/{recipe}/favorite', [FavoriteController::class, 'favorite'])->name('recipes.favorite');
    // Route::delete('/recipes/{recipe}/unfavorite', [FavoriteController::class, 'unfavorite'])->name('recipes.unfavorite');
    
    // Recipe Histroy


    /*develop by ekramul*/

    Route::resource('recipe-slider', RecipeSliderController::class);
    Route::get('recipe-slider/status/{recipeSlider}', [RecipeSliderController::class, 'SliderStatus'])->name('recipe-slider.status');

});

# =================== Frontend Route =================== #

# Favorite/UnFavorite Recipe Route #

Route::get('/favorites', [FavoriteRecipeController::class, 'favoriteRecipe'])->name('favorites.index');

Route::delete('/favorite/delete/{recipe}', [FavoriteRecipeController::class, 'favoriteDelete'])->name('favorite.delete');

Route::post('/recipes/{recipe}/favorite', [FavoriteRecipeController::class, 'favorite'])->name('recipes.favorite');

Route::delete('/recipes/{recipe}/unfavorite', [FavoriteRecipeController::class, 'unfavorite'])->name('recipes.unfavorite');