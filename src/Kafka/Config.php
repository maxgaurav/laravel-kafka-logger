<?php


namespace MaxGaurav\LaravelKafkaLogger\Kafka;


use Kafka\ProducerConfig;

class Config
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var ProducerConfig
     */
    protected $instance;

    public function __construct(array $configuration, ProducerConfig $producerConfig)
    {
        dd($configuration);
        $this->setConfiguration($configuration);
        $this->setInstance($producerConfig);
    }

    /**
     * Overwrite current instance with new instance
     *
     * @param ProducerConfig $producerConfig
     */
    public function setInstance(ProducerConfig $producerConfig)
    {
        $this->instance = $producerConfig;
        $this->setupConnection($this->config['connection_configuration']);
        $this->setHost();
    }

    /**
     * Overwrite current configuration with new configuration
     *
     * @param array $configuration
     */
    public function setConfiguration(array $configuration)
    {
        $this->config = $configuration;
    }

    /**
     * Set various configuration parameters
     *
     * @param array $connectionConfiguration
     */
    protected function setupConnection(array $connectionConfiguration)
    {
        $this->instance->setMetadataRefreshIntervalMs($connectionConfiguration['refresh_interval']);
        $this->instance->setBrokerVersion($connectionConfiguration['broker_version']);
        $this->instance->setRequiredAck($connectionConfiguration['ack_value']);
        $this->instance->setProduceInterval($connectionConfiguration['produce_interval']);
    }

    /**
     * Setup host
     */
    protected function setHost()
    {
        $this->instance->setMetadataBrokerList($this->config['host'] . ':' . $this->config['port']);
    }
}
