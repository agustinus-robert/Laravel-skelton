<?php

namespace {{Namespace}}\Providers;

use Illuminate\Support\ServiceProvider;

class {{Module}}ServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $modulePath = dirname(__DIR__, 2);

        if (is_file($modulePath.'/config/config.php')) {
            $this->mergeConfigFrom(
                $modulePath.'/config/config.php',
                '{{module}}'
            );
        }
    }

    public function boot(): void
    {
        $modulePath = dirname(__DIR__, 2);

        if (is_file($modulePath.'/routes/web.php')) {
            $this->loadRoutesFrom($modulePath.'/routes/web.php');
        }

        if (is_file($modulePath.'/routes/api.php')) {
            $this->loadRoutesFrom($modulePath.'/routes/api.php');
        }

        if (is_dir($modulePath.'/resources/views')) {
            $this->loadViewsFrom(
                $modulePath.'/resources/views',
                '{{module}}'
            );
        }

        if (is_dir($modulePath.'/database/migrations')) {
            $this->loadMigrationsFrom(
                $modulePath.'/database/migrations'
            );
        }
    }
}