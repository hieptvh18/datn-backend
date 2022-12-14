<?php

namespace App\Providers;

use App\Models\WebSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrap();
        // $webSetting = WebSetting::find(1);
        // View::share('logoWeb',$webSetting);
        view()->composer('*', function($view){
                $view->with(['logoWeb'=> Auth::guard('admin')->id() ? WebSetting::find(1) : []]);
        });
    }
}
