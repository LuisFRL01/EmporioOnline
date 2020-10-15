<?php

namespace App\Providers;

use App\View\Components\AppLayoutProduto;
use App\View\Components\LayoutProduto;
use App\View\Components\NavigationDropdown;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('navigation-dropdown', NavigationDropdown::class);
        Blade::component('app-layout-produto', AppLayoutProduto::class);
    }
}
