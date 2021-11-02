<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\View\Composers\MenuComposer;
use App\View\Composers\UserInfoComposer;
use Illuminate\Pagination\Paginator;

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
        View::composer(['admin.includes.menu'], MenuComposer::class);
        View::composer(['admin.includes.sidebar','admin.includes.header'], UserInfoComposer::class);
        Paginator::useBootstrap();
    }
}
