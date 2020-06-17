<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\MenuComposer;
use App\Http\ViewComposers\CartComposer;
use App\Http\ViewComposers\SliderComposer;
use App\Http\ViewComposers\ReadComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'homes.index',
            'products.product_detail',
            'searchs.search',
            'products.product_category'
        ], MenuComposer::class);
        view()->composer('*', CartComposer::class);
        view()->composer([
            'homes.index',
            'searchs.search',
            'products.product_category'
        ], SliderComposer::class);
        view()->composer('*', ReadComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
