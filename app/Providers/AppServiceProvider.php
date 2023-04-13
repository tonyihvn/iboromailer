<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\tasks;
use App\Models\User;
use App\Models\school;
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
                $view->with('login_user', Auth::user());
                $view->with('mytasks', tasks::where('assigned_to',Auth::user()->id)->get());
                $view->with('students', User::select('id','name','matric_no','role','status')->where('school_id',Auth::user()->school_id)->get());
                $view->with('staff', User::select('id','name','phone_number','status')->where('school_id',Auth::user()->school_id)->get());


                $view->with('school', school::where('id',Auth::user()->school_id)->first());

            }else{
                $view->with('school', school::first());
            }


            // if you need to access in controller and views:
            // Config::set('something', $something);
        });
    }
}
