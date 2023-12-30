# laravel-nelc-xapi-integration
Lamoud NELC Integration laravel package, It was launched specifically to link with the National Center for E-Learning in Saudi Arabia, so that the tool sends all the activities of the trainees, starting from registering for the course until obtaining the certificate.

## Installation

1- install the package via composer:

```bash
composer require lamoud/laravel-nelc-xapi-integration
```
2- Register the `ServiceProvider` in the config/app.php file under the `providers` section

```php
// config/app.php

'providers' => ServiceProvider::defaultProviders()->merge([
    /*
        * Package Service Providers...
    */
    // ...
    Lamoud\LaravelNelcXapiIntegration\NelcXapiServiceProvider::class,
])->toArray(),
```

3- 

```bash
php artisan vendor:publish --provider="Lamoud\LaravelNelcXapiIntegration\NelcXapiServiceProvider"
```