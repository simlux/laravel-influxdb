<?php declare(strict_types=1);

namespace Simlux\LaravelInfluxdb;

use Illuminate\Support\ServiceProvider;

class LaravelGeneratorsServiceProvider extends ServiceProvider
{
    private const CONFIG_FILE = __DIR__ . '/../../config/influxdb.php';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            self::CONFIG_FILE => config_path('influxdb.php'),
        ]);
        /*
        if ($this->app->runningInConsole()) {
            $this->commands([
                // Class::class
            ]);
        }
        */
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_FILE, 'influxdb'
        );
    }
}