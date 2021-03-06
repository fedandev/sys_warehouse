<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

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
        require_once __DIR__ . '/../Http/helpers.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
         
        URL::forceScheme('https');
        
        app('view')->composer('layouts.app', function ($view) {
            $action = app('request')->route()->getAction();
            $controller = class_basename($action['controller']);
    
            list($controller, $action) = explode('@', $controller);
    
            $view->with(compact('controller', 'action'));
        });
    }
}
