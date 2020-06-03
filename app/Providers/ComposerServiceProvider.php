<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\MenuComposer;
use App\Http\ViewComposers\CartComposer;
use App\Http\ViewComposers\SliderComposer;

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
            'searchs.search'
        ], MenuComposer::class);
        view()->composer([
            'homes.index',
            'products.product_detail',
            'carts.cart',
            'carts.checkout',
            'accounts.login',
            'errors.success',
            'blog.blog',
            'blog.blog_detail',
            'searchs.search',
            'contact.contact'
        ], CartComposer::class);
        view()->composer([
            'homes.index',
            'searchs.search'
        ], SliderComposer::class);
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
