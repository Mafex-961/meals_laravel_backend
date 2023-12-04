<?php

namespace App\Providers;

use App\Interfaces\CategoryInterface;
use App\Repositories\CategoryRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(CategoryInterface::class,CategoryRepository::class);
    }
}
