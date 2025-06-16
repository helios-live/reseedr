# Helios Live Reseedr

### Dump tables to php for easy re-seed.

```bash
composer require helios-live/reseedr
php artisan reseedr:export-table users
php artisan reseedr:export-table terms
```

#### **`DatabaseSeeder.php`**:
```php
// if no options are given to the call, the seeder scans the
// database/dumps/ directory for php files and uses that
// however the ordering might not be what you need
$this->call(\HeliosLive\Reseeder\Seeders\ReSeed::class);
````

#### **`DatabaseSeeder.php`**:
```php
// if given the tables option, it will only reseed those tables, in the 
// specified order
$this->call(\HeliosLive\Reseeder\Seeders\ReSeed::class,
true,
[
    'tables' => ['users', 'terms'],
]);

```