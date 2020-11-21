<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class RouteMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('jTitle', function($model){
            /* If to use real Model, we can write below $model->title
            * because if we send from route Model object it will automatically
            * bind with corresponding model using DI mechanisms
            */
            return Response::json([$model]);
        });
    }
}
