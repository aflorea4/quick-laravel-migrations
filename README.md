# quick-laravel-migrations
A package made for importing database dumps faster than the laravel classic migration system.

# What you can do after installation

    php artisan db:dump
    php artisan db:load

# Documentation & Installation

#### 2 Utility classes are provided:
##### 1. QuickDatabaseMigrations
- defines hooks to migrate the database
- you use the laravel-implemented database migrations:
    - ->baseRunDatabaseMigrations();
    - ->baseRunDatabaseSeedMigrations();
- or faster migrations via:
    - ->runDatabaseMigrations();
    - ->runDatabaseSeedMigrations();
- it requires the usage of MySqlDump (or manual placement of dump files)
##### 2. MySqlDump
- a fast way to generate dump files

-- installation instruction will eventually end up here :)


# Supported versions

Laravel 5.6+

# Credits

👑 @GaussianWonder - Main Developer

# License

The MIT License (MIT). Please see License File for more information.

