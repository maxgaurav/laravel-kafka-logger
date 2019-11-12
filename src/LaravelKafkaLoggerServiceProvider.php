<?php


namespace MaxGaurav\LaravelKafkaLogger;


use Illuminate\Support\ServiceProvider;

class LaravelKafkaLoggerServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/kafka-settings.php' => config_path('kafka-settings.php')
        ]);
    }
}
