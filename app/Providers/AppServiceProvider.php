<?php

namespace App\Providers;

use App\Models\Tag;
use App\Services\TagsService;
use App\View\Components\Alert;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        view()->composer('layouts.sidebar', function (View $view){
            $view->with('tagsCloud', Tag::tagsCloud());
        });
        \Blade::aliasComponent('layouts.components.alert', 'alert');
    }
}
