<?php

namespace API\Platform\Services;

class DatabaseService
{
    public function getActiveDatabaseName(): string
    {
        $databaseName = \DB::connection()->getDatabaseName();

        return $databaseName;
    }

    public function getDefaultDatabaseName(): string
    {
        $databaseName = Config::get('database.connections.'.Config::get('database.default'));

        return $databaseName['database'];
    }

    public function getDatabaseName(string $databaseHandle = 'mysql'): string
    {
        $databaseName = Config::get('database.connections');

        return $databaseName[$databaseHandle]['database'];
    }
}
