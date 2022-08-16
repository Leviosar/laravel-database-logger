<?php

namespace Maia\LaravelDatabaseLogger;

use Monolog\Logger;
use Maia\LaravelDatabaseLogger\DatabaseHandler;

class DatabaseLogger
{
    /**
     * Create a custom Monolog instance.
     *
     * @return Logger
     */
    public function __invoke(array $config)
    {
        return new Logger('Database', [
            new DatabaseHandler(),
        ]);
    }
}