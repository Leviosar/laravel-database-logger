<?php

namespace Maia\LaravelDatabaseLogger;

use Illuminate\Support\ServiceProvider;

class DatabaseLoggerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}