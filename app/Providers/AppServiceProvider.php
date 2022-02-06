<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Product\ProductInterface;
use App\Repository\Product\ProductRepository;

class AppServiceProvider extends ServiceProvider
{                                                                                           
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductInterface::class,ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
