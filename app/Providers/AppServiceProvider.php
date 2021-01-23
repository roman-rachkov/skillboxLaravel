<?php

namespace App\Providers;

use App\Models\Tag;
use App\Services\PushAllService;
use App\View\Components\Alert;
use Illuminate\Support\Facades\Blade;
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
        app()->bind(PushAllService::class,
            fn() => new PushAllService(config('skillbox.push_all.api_key'), config('skillbox.push_all.api_id')));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function (View $view) {
            $view->with('tagsCloud', Tag::tagsCloud());
        });
        \Blade::aliasComponent('layouts.components.alert', 'alert');
        \Blade::if('admin', function () {
            return \Auth::user()?->isAdmin() ?? false;
        });
        \Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->toFormattedDateString();?>";
        });

    }
}
