<?php

namespace MaxGaurav\LaravelKafkaLogger\Kafka;

use Kafka\Producer as KafkaProducer;

class Producer
{
    /**
     * @var KafkaProducer
     */
    protected $instance;

    /**
     * @var Config
     */
    protected $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->setInstance(new KafkaProducer());
    }

    /**
     * Overwrite current instance with new instance
     *
     * @param KafkaProducer $producerConfig
     */
    public function setInstance(KafkaProducer $producer)
    {
        $this->instance = $producer;
    }

    /**
     * Send message
     *
     * @param array $messages
     */
    public function send(array $messages)
    {
        $this->instance->send($messages);
    }
}
