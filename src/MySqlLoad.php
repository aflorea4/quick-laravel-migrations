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
    protected $signature = 'db:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It runs `migrate:fresh --path=... --realpath`. This results in faster migrations at the cost of manually running `db:dump` after each migration / seed change';

    /**
     * Load dump files for
     *  artisan migrate:fresh --seed
     *
     * @return mixed
     */
    public function handle()
    {
        $migrateSeedPath        = __DIR__ . DIRECTORY_SEPARATOR . "QuickSeedMigration";
        $migrateSeedCommand     = sprintf('php artisan migrate:fresh --path='. $migrateSeedPath .' --realpath');
        
        exec($migrateSeedCommand);
    }
}
