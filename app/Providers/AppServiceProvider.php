<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\settings;
use Auth;

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

            if (Auth::check())
            {
                $view->with('company', settings::first());
                $view->with('login_user', Auth::user());

            }else{
                $view->with('company', settings::first());

            }


            // if you need to access in controller and views:
            // Config::set('something', $something);
        });
    }
}
