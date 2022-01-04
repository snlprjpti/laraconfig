<?php

namespace Snlprjpti\Laraconfig;

use App\Http\Middleware\Language;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerConfig();
        $this->registerMiddleware();
    }

    public function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../src/config/' =>  base_path('config/'),
        ], "core_config");
    }

    public function registerMiddleware()
    {
        $this->publishes([
            __DIR__ . '/../src/middleware/' =>  base_path('app/Http/Middleware/'),
        ], "core_middleware");

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('language', Language::class);
    }
}