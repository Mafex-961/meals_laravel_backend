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

use App\Interfaces\AdminInterface;
use App\Repositories\AdminRepository;

use App\Interfaces\OwnerInterface;
use App\Repositories\OwnerRepository;

use App\Interfaces\ShopInterface;
use App\Repositories\ShopRepository;

use App\Interfaces\SubCategoryInterface;
use App\Repositories\SubCategoryRepository;

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

        $this->app->bind(AdminInterface::class,AdminRepository::class);

        $this->app->bind(OwnerInterface::class,OwnerRepository::class);

        $this->app->bind(ShopInterface::class,ShopRepository::class);

        $this->app->bind(SubCategoryInterface::class,SubCategoryRepository::class);
    }
}
