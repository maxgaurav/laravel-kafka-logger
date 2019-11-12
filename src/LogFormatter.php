<?php

namespace MaxGaurav\LaravelKafkaLogger;

use Monolog\Formatter\NormalizerFormatter;

class LogFormatter extends NormalizerFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(array $record)
    {
        $record =  parent::format($record);

        return $this->formatMessage($record);
    }

    /**
     * Converts the main log message to formatted message ready to be logged by Kafka
     *
     * @param array $record
     * @return array
     */
    private function formatMessage(array $record)
    {
        $data = [
            'key' => $record['level_name'],
            'value' => json_encode([
                'message' => $record['message'],
                'formatted_data' => collect($record)->except('extra')->toArray(),
                'request_info' => $record['extra']
            ])
        ];

        return $data;
    }
}
