<?php

namespace App\Providers;

use App\Interfaces\CategoryInterface;
use App\Repositories\CategoryRepository;

use App\Interfaces\ProductInterface;
use App\Repositories\ProductRepository;

use App\Interfaces\Api\CategoryInterface as ApiCategoryInterface;
use App\Repositories\Api\CategoryRepository as ApiCategoryRepository;

use App\Interfaces\Api\ProductInterface as ApiProductInterface;
use App\Repositories\Api\ProductRepository as ApiProductrepository;



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

        $this->app->bind(ProductInterface::class,ProductRepository::class);

        $this->app->bind(ApiCategoryInterface::class,ApiCategoryRepository::class);

        $this->app->bind(ApiProductInterface::class,ApiProductRepository::class);
    }
}
