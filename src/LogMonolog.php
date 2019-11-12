<?php

namespace MaxGaurav\LaravelKafkaLogger;

use MaxGaurav\LaravelKafkaLogger\Kafka\Producer;
use Monolog\Logger;

class LogMonolog
{

    /**
     * Invoke new log handler for kafka logging service
     *
     * @param array $config
     * @return Logger
     * @throws
     */
    public function __invoke(array $config)
    {
        $logger = new Logger('custom');
        $logger->pushHandler(new LogHandler(app()->make(Producer::class)));
        $logger->pushProcessor(new LogProcessor());

        return $logger;
    }
}
