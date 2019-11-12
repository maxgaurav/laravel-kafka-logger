<?php

namespace MaxGaurav\LaravelKafkaLogger;

use Illuminate\Support\ServiceProvider;
use Kafka\ProducerConfig;
use MaxGaurav\LaravelKafkaLogger\Kafka\Config;
use MaxGaurav\LaravelKafkaLogger\Kafka\Producer;

class LaravelKafkaLoggerServiceProvider extends ServiceProvider
{
    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $this->app->singleton(Config::class, function () {
            /**
             * @var ProducerConfig $config
             */
            $config = ProducerConfig::getInstance();
            return new Config(config('kafka-settings'), $config);
        });

        $this->app->singleton(Producer::class, function () {
            $config = $this->app->make(Config::class);
            return new Producer($config);
        });
    }

    /**
     * Registering configurations for publishing
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/kafka-settings.php' => config_path('kafka-settings.php')
        ], 'config');
    }
}
