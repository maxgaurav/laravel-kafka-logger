<?php
return [
    /**
     * Host ip address of kafka
     */
    'host' => '127.0.0.1',

    /**
     * Port address
     */
    'port' => '9121',

    /**
     * Default topic the producer will send message to
     */
    'topic' => 'topic',

    /**
     * Connection configuration to kafka
     */
    'connection_configuration' => [
        'refresh_interval' => 10000,
        'broker_version' => '1.1.1',
        'produce_interval' => 500, // in milli seconds
        'ack_value' => 1
    ],

];
