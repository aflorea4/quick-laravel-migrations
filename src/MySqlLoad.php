<?php

namespace QuickDatabaseMigrations;

use Illuminate\Console\Command;

// Remeber to include this into your /app/Kernel.php file
class MySqlLoad extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:load {--seed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It runs `migrate:fresh --path=... --realpath`. This results in faster migrations at the cost of manually running `db:dump` after each migration / seed change';

    /**
     * Load dump files for
     *  artisan migrate:fresh --seed
     *  artisan migrate:fresh
     *
     * @return mixed
     */
    public function handle()
    {
        $seeding = $this->option('seed');
        $migratePath = __DIR__ . DIRECTORY_SEPARATOR;
        $migrateCommand = 'php artisan migrate:fresh --path=%s --realpath';

        if($seeding == true) {
            $migratePath .= "QuickSeedMigration";
        }
        else {
            $migratePath .= "QuickMigration";
        }

        $migrateCommand = sprintf($migrateCommand, $migrateSeedPath);
        $this->info($migrateCommand);

        exec($migrateSeedCommand);
    }
}
