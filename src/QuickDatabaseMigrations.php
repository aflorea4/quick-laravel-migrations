<?php

namespace QuickDatabaseMigrations;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

trait QuickDatabaseMigrations
{
    /**
     * Define hooks to migrate the database before and after each test. (no seeding)
     * Default way to perform migrations
     *
     * @return void
     */
    public function baseRunDatabaseMigrations()
    {
        $this->artisan('migrate:fresh');

        $this->app[Kernel::class]->setArtisan(null);

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:rollback');

            RefreshDatabaseState::$migrated = false;
        });
    }
	
	/**
     * Define hooks to migrate the database before and after each test. (with seeding)
     * Default way to perform migrations
     *
     * @return void
     */
    public function baseRunDatabaseSeedMigrations()
    {
        $this->artisan('migrate:fresh --seed');

        $this->app[Kernel::class]->setArtisan(null);

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:rollback');

            RefreshDatabaseState::$migrated = false;
        });
    }

    /**
     * Define hooks to migrate the database before and after a test (no seeding)
     *
     * @return void
     */
    public function runDatabaseMigrations()
    {
        // Make sure to php artisan db:dump first
		$this->artisan('migrate:fresh --path='. __DIR__ . DIRECTORY_SEPARATOR .'QuickMigration --realpath');
		
        $this->app[Kernel::class]->setArtisan(null);

        $this->beforeApplicationDestroyed(function () {
            // No rollback, it's slow, usually it's redundant
            RefreshDatabaseState::$migrated = false;
        });
    }

    /**
     * Define hooks to migrate the database before and after a test (with seeding)
     *
     * @return void
     */
    public function runDatabaseSeedMigrations()
    {
        // Make sure to php artisan db:dump first
		$this->artisan('migrate:fresh --path='. __DIR__ . DIRECTORY_SEPARATOR .'QuickSeedMigration --realpath');
		
        $this->app[Kernel::class]->setArtisan(null);

        $this->beforeApplicationDestroyed(function () {
            // No rollback, it's slow, usually it's redundant
            RefreshDatabaseState::$migrated = false;
        });
    }
}
