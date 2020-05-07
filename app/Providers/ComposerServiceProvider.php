<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\MenuComposer;
use App\Http\ViewComposers\CartComposer;

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
            'products.product_detail'
        ], MenuComposer::class);
        view()->composer([
            'homes.index',
            'products.product_detail',
            'carts.cart',
            'carts.checkout',
            'accounts.login'
        ], CartComposer::class);
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
