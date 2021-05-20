<?php

namespace CozyFex\BreezeUsername;

use CozyFex\BreezeUsername\Commands\InstallCommand;
use Illuminate\Support\ServiceProvider;

class BreezeUsernameServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
