<?php

namespace Forum\Providers;

use App;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Cache;
use Forum\Channel;
use Illuminate\Support\ServiceProvider;
use Orangehill\Iseed\IseedServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $channels = Cache::rememberForever('channels', function () {
                return Channel::all();
            });
            $view->with('channels', $channels);
        });

        if(App::environment() == 'local'){
	        $this->app->register(IdeHelperServiceProvider::class);
	        $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
	        $this->app->register(IseedServiceProvider::class);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
