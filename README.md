# Laravel Nelc Xapi Integration

Laravel package for integrating with Saudi NELC xAPI.

## Installation

## Step 1: Navigate to Your Project Directory

Before you begin, navigate to the directory where your Laravel project is located. Use the following command to change into your project directory:

```bash
cd path/to/your/laravel-project
```

## Step 2: Installation

You can install this library using Composer. Run the following command:

```bash
composer require lamoud/laravel-nelc-xapi-integration
```

## Step 3: Register the ServiceProvider

Register the `NelcXapiServiceProvider` in your Laravel project. Open the `config/app.php` file and add the following line to the `providers` array:

```php
// config/app.php

'providers' => ServiceProvider::defaultProviders()->merge([
    /*
        * Package Service Providers...
    */
    // Other providers...
    Lamoud\LaravelNelcXapiIntegration\NelcXapiServiceProvider::class,
])->toArray(),
```

## Step 4: Dump Autoload Files
After registering the ServiceProvider, run the following command to re-generate Composer's autoloader files:

```bash
composer dump-autoload
```

## Step 5: Publish Configuration Files
To publish the configuration files provided by this package, run the following Artisan command:

```bash
php artisan vendor:publish --provider="Lamoud\LaravelNelcXapiIntegration\NelcXapiServiceProvider"
```

## Usage
Once the package is installed and the ServiceProvider is registered, you can use it in your Laravel project. Here's a simple example:

```php
// config/app.php
use Lamoud\LaravelNelcXapiIntegration\XapiIntegration;

```
