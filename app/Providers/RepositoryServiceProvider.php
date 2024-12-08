<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Blog\BlogInterface;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Category\CategoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(BlogInterface::class, BlogRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
