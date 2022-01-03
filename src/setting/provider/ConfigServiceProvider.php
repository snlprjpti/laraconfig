<?php

namespace src\setting\provider;

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
            __DIR__ . '/laraconfig/' =>  base_path('src/setting/config/'),
        ], "core_config");
    }

    public function registerMiddleware()
    {
        $this->publishes([
            __DIR__ . '/laraconfig/' =>  base_path('src/setting/middleware/'),
        ], "core_middleware");
    }
}