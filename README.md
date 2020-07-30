# quick-laravel-migrations
A package made for importing database dumps faster than the laravel classic migration system.

# What you can do after installation

    php artisan db:dump
    php artisan db:load

You can also use <br/>
`QuickDatabaseMigrations\QuickDatabaseMigrations`<br/>which is a replacement for<br>
`Illuminate\Foundation\Testing\DatabaseMigrations`</br>
It makes migrations as fast as db:load at the cost of manually running db:dump after a migration|seed change (and no rollbacks after tests)

# Documentation & Installation

#### 3 Utility classes are provided:
##### 1. QuickDatabaseMigrations
- defines hooks to migrate the database
- you can still use the laravel-implemented database migrations:
    - ->baseRunDatabaseMigrations();
    - ->baseRunDatabaseSeedMigrations();
- or you can benefit benefit of faster migrations via:
    - ->runDatabaseMigrations();
    - ->runDatabaseSeedMigrations();
- it requires the usage of MySqlDump (or manually place the dump files)
##### 2. MySqlDump
- a fast way to generate dump files

-- installation instruction will eventually end up here :)


# Supported versions

Laravel 5.6+

# Credits

👑 @GaussianWonder - Main Developer

# License

The MIT License (MIT). Please see License File for more information.

