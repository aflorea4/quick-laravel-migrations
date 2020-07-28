<?php

namespace QuickDatabaseMigrations;

use Illuminate\Console\Command;

// Remeber to include this into your /app/Kernel.php file
class MySqlDump extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:dump';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the mysqldump utility using info from .env';

    /**
     * Make dump files for 
     *  artisan migrate:fresh
     *  artisan migrate:fresh --seed
     *
     * @return mixed
     */
    public function handle()
    {
        $migrateFilePath        = __DIR__ . DIRECTORY_SEPARATOR . "QuickMigration" . DIRECTORY_SEPARATOR . "sql.dump";
        $migrateSeedFilePath    = __DIR__ . DIRECTORY_SEPARATOR . "QuickSeedMigration" . DIRECTORY_SEPARATOR . "sql.dump";

        $migrateCommand        = sprintf('mysqldump --no-data -h %s -u %s -p %s > %s', env('DB_HOST'), env('DB_USERNAME'), env('DB_DATABASE'), $migrateFilePath);
        $migrateSeedCommand    = sprintf('mysqldump -h %s -u %s -p %s > %s', env('DB_HOST'), env('DB_USERNAME'), env('DB_DATABASE'), $migrateSeedFilePath);

        exec($migrateCommand);
        exec($migrateSeedCommand);
    }
}
