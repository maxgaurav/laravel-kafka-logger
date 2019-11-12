<?php

/**
 * Kafka Server settings
 */
return [
    'host' => '127.0.0.1',
    'port' => '9121',
    'topic' => 'topic',
    'connection_configuration' => [
        'refresh_interval' => 10000,
        'broker_version' => '1.1.1',
        'produce_interval' => 500, // in milli seconds
        'ack_value' => 1
    ],

];
