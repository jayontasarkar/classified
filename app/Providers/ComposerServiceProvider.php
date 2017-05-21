<?php

namespace App\Providers;

use App\{Area, Category};
use App\Http\ViewComposers\AreaComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', AreaComposer::class);
        View::composer(['listings.partials.forms._areas', 'listings.partials.forms._categories'], function($view){
            $categories = Category::get()->toTree();
            $areas = Area::get()->toTree();

            $view->with(compact('categories', 'areas'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AreaComposer::class);
    }
}