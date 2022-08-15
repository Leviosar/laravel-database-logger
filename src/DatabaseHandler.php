<?php

namespace Maia\LaravelDatabaseLogger;

use Monolog\Handler\AbstractProcessingHandler;
use Maia\LaravelDatabaseLogger\Models\Log;

class DatabaseHandler extends AbstractProcessingHandler
{
    /**
     * @inheritDoc
     */
    protected function write(array $record): void
    {
        Log::create([
            'level' => $record['level'],
            'level_name' => $record['level_name'],
            'message' => $record['message'],
            'context' => $record['context'],
            'extra' => $record['extra'],
        ]);
    }
}