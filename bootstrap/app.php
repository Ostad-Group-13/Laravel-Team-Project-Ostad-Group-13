<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\IncrementRecipeViewCount;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            '*',
        ]);

        // $middleware->use([
        // \Illuminate\Foundation\Http\Middleware\InvokeDeferredCallbacks::class,
        // ]);

        // $middleware->web(append: [
        //     IncrementRecipeViewCount::class,
        // ]);

        $middleware->alias([
            // 'admin' => \App\Http\Middleware\IncrementRecipeViewCount::class,

        // Other middleware...
        'increment.recipe.view' => App\Http\Middleware\IncrementRecipeViewCount::class,
        
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
