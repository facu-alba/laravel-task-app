<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\Yaml\Yaml;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = config_path('../config/app.yml');

        if (file_exists($configPath)) {
            $config = Yaml::parseFile($configPath);

            foreach ($config as $key => $value) {
                config([$key => $value]);
            }
        }
    }
}
