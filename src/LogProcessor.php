<?php


namespace MaxGaurav\LaravelKafkaLogger;


class LogProcessor
{
    public function __invoke(array $record)
    {
        // TODO: add extra data if needed
        $record['extra'] = [
            'user_id' => auth()->user() ? auth()->user()->id : NULL,
            'origin' => request()->headers->get('origin'),
            'ip' => request()->server('REMOTE_ADDR'),
            'user_agent' => request()->server('HTTP_USER_AGENT')
        ];
        return $record;
    }
}
