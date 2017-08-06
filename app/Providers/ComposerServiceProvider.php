<?php

namespace App\Providers;

use App\{Area, Category};
use App\Http\ViewComposers\{AreaComposer, NavigationComposer};
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
        View::composer(['layouts.partials._navigation'], NavigationComposer::class);

        View::composer(['listings.partials.forms._categories'], function($view){
            $categories = Category::get()->toTree();
            
            $view->with(compact('categories'));
        });

        View::composer(['listings.partials.forms._areas'], function($view){
            $areas = Area::get()->toTree();

            $view->with(compact('areas'));
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
