<?php

namespace MaxGaurav\LaravelKafkaLogger;

use MaxGaurav\LaravelKafkaLogger\Kafka\Producer;
use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class LogHandler extends AbstractProcessingHandler
{
    /**
     * @var Producer
     */
    protected $kafkaProducer;

    /**
     * LogHandler constructor.
     * @param Producer $kafkaProducer
     * @param int $level
     * @param bool $bubble
     */
    public function __construct(Producer $kafkaProducer, $level = Logger::DEBUG, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
        $this->kafkaProducer = $kafkaProducer;
    }

    /**
     * Writes log in kafka
     *
     * @param array $record Formatted record data
     */
    public function write(array $record): void
    {
        $message = array_merge(['topic' => config('kafka-settings.topic')], $record['formatted']);
        $this->kafkaProducer->send([$message]);
    }

    /**
     * Returns formatted array record according to formatter
     *
     * @return FormatterInterface
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new LogFormatter();
    }


}
