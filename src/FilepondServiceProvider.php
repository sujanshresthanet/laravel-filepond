<?php

namespace RahulHaque\Filepond;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use RahulHaque\Filepond\Console\FilepondClear;

class FilepondServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/filepond.php' => base_path('config/filepond.php'),
            ], 'filepond-config');

            if (!Schema::hasTable('fileponds')) {
                $this->publishes([
                    __DIR__.'/../database/migrations/create_fileponds_table.php.stub' => database_path('migrations/'.date('Y_m_d', time()).'_000000_create_fileponds_table.php'),
                ], 'filepond-migrations');
            }

            $this->commands([
                FilepondClear::class
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/filepond.php', 'filepond');

        $this->app->config['filesystems.disks.' . config('filepond.disk', 'filepond')] = config('filepond.storage', [
            'driver' => 'local',
            'root' => storage_path('app/filepond'),
        ]);

        $this->app->singleton('filepond', function () {
            return new Filepond;
        });
    }
}
