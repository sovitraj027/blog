<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SiteSetting;
use App\Models\Tag;
use App\Models\User;
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
        view()->composer('*',function($view) {
        $view->with('site_setting',SiteSetting::first());
        });
    }
}
