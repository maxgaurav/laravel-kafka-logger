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

    public function __construct(Producer $kafkaProducer, $level = Logger::DEBUG, bool $bubble = true)
    {
        $this->kafkaProducer = $kafkaProducer;
        parent::__construct($level, $bubble);
    }

    /**
     * Writes log in kafka
     *
     * @param array $record Formatted record data
     */
    public function write(array $record): void
    {
        $message = array_merge(['topic' => config('kafka-settings.topic')], $record);
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
