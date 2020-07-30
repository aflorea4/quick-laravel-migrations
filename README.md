# quick-laravel-migrations

A [composer package](https://packagist.org/packages/alexandruflorea/quick-laravel-migrations) made for importing database dumps faster than the laravel classic migration system.

It can be used to replace the rather slow <br/>
* `$this->runDatabaseMigrations()`<br/>
* `$this->seed()`<br/>
* `artisan migrate:fresh`<br/>
* `artisan migrate:fresh --seed`

# What you can do after installation

```bash
php artisan db:dump
php artisan db:load {--seed}
```

<hr/>

### You can also replace

```php
use Illuminate\Foundation\Testing\DatabaseMigrations;
```

### with

```php
use QuickDatabaseMigrations\QuickDatabaseMigrations;
```

> It makes migrations for tests as fast as db:load at the cost of manually running db:dump after a migration|seed change (and no rollbacks after tests)

# Documentation & Installation

## Installation

```bash
composer require alexandruflorea/quick-laravel-migrations
```

<hr/>

### Add these into your /app/Console/Kernel.php

> this enables db:dump and db:load

```php
use QuickDatabaseMigrations;
```

```php
/**
 * The Artisan commands provided by your application.
 *
 * @var array
 */
protected $commands = [
    \QuickDatabaseMigrations\MySqlDump::class,
    \QuickDatabaseMigrations\MySqlLoad::class
];
```

<hr/>

### To benefit from faster migrations during tests, replace:

```php
use Illuminate\Foundation\Testing\DatabaseMigrations;
```

### with

```php
use QuickDatabaseMigrations\QuickDatabaseMigrations;
```

<hr>

## Documentation

> 3 utility classes are provided under the same namespace

### `QuickDatabaseMigrations`

> defines hooks to migrate the database

> it requires a db:dump beforehand

#### Paste this at the top of the file

```php
use QuickDatabaseMigrations\QuickDatabaseMigrations;
```

#### And this at the top of the class

```php
use QuickDatabaseMigrations;
```

#### Migrate using

```php
$this->runDatabaseMigrations();     //fast migrate:fresh
$this->runDatabaseSeedMigrations(); //fast migrate:fresh --seed
```

```php
$this->baseRunDatabaseMigrations();     //default migrate:fresh
$this->baseRunDatabaseSeedMigrations(); //default migrate:fresh --seed
```

### `MySqlDump`

> a fast way to generate dump files

> you can totally ignore this and manually place the dump files in `/QuickMigration/sql.dump` or `/QuickSeedMigration/sql.dump`

```bash
php artisan db:dump
```

### `MySqlLoad`

> a fast way to load a dump file

> you can totally ignore this as well if you want to manually import it every time

```bash
php artisan db:load
```

# Supported versions

Laravel 5.6+

# Credits

## 👑 @GaussianWonder - Main Developer

# License

The MIT License (MIT). Please see License File for more information.

