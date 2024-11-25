<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{RoleController, UserController};
Route::get('/', function () {
    return view('welcome');
});

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
});
