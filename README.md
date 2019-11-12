# Laravel Kafka Logger

Description

## Requirements
* Minimum PHP version: 7.1
* Kafka Version greater than 0.8
* The consumer module needs kafka broker version greater than 0.9.0
* Laravel 6.*

## Installation

### Composer installation 
First install the package using composer 

```shell
composer require maxgaurav/laravel-kafka-logger
```

### Publishing Configuration

Publish the configuration file using the artisan vendor publish command
```shell
php artisan vendor:publish --provider=MaxGaurav\LaravelKafkaLogger\LaravelKafkaLoggerServiceProvider --tag=config
```





