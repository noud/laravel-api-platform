<?php

namespace API\Platform\Services;

use \DB;
use API\Platform\Models\Table;
use Artisan;
use Doctrine\Inflector\InflectorFactory;
use Doctrine\Inflector\Language;

class ModelsService
{
    private $databaseService;

    private $ormService;

    public function __construct(DatabaseService $databaseService, ORMService $ormService)
    {
        $this->databaseService = $databaseService;
        $this->ormService = $ormService;
    }

    public function generateAll(string $api = null): void
    {
        // SELECT table_name FROM information_schema.tables WHERE table_schema = 'your_database_name';

        $yourDatabaseNameVariable = $this->databaseService->getActiveDatabaseName();

        // @todo mysql only
        $results = DB::select(DB::raw("SELECT table_name FROM information_schema.tables WHERE table_schema = :your_database_name"), [
            'your_database_name' => $yourDatabaseNameVariable,
        ]);

        $commands = [];
        foreach ($results as $tableName) {
            $tableName = $tableName->TABLE_NAME;

            if (!in_array($tableName, ["failed_jobs", "jobs", "migrations", "password_resets", "tables", "users"])) {
                $table = Table::firstWhere(['name' => $tableName]);

                $modelName = $this->ormService->tableToClass($table, $tableName);

                $command = 'php artisan infyom:api ' . $modelName . ' -n --fromTable --tableName=' . $tableName;
                if ($api) {
                    $command .= ' --prefix=' . $api;
                }
                $commands[] = $command;
                // @todo barfs on $modelName
                // $exitCode = Artisan::call('infyom:api', [
                //     $modelName => true,
                //     '--fromTable' => true,
                //     '--tableName' => $tableName->table_name
                // ]);
            }
        }
        $commands = implode(';', $commands);
        $output = shell_exec($commands);
    }

    // @todo examples
    // DB::statement( 'ALTER TABLE HS_Request AUTO_INCREMENT=:incrementStart', ['incrementStart' => 9999] );
}
