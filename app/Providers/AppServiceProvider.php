<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        if ($this->app->environment('production')) {
            $this->app['request']->server->set('HTTPS', true);
        }

        if ($this->app->environment('production')) {
            $this->app->bind('path.public', function (){
                return base_path().'/home3/josegui5/public_html';
            });
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }


    }
}
