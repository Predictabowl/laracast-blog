<?php

namespace App\Providers;

//use Illuminate\Pagination\Paginator;

use Illuminate\Database\Eloquent\Model;
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
        //Paginator::useBootstrap(); //work if we use Twitter bootstrap
        //Model::unguard(); // this disable the guarded and fillable fields in models
    }
}
