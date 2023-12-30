<?php

namespace Lamoud\LaravelNelcXapiIntegration;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class NelcXapiServiceProvider extends ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config';
    const ROUTE_PATH = __DIR__ . '/../routes';
    const VIEW_PATH = __DIR__ . '/views';
    const ASSET_PATH = __DIR__ . '/../assets';

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Load configuration files

        $this->publishes([
            self::CONFIG_PATH => config_path()
        ], 'config');

        // Load assets files
        $this->publishes([
            self::ASSET_PATH => public_path('lamoud-nelc-xapi')
        ], 'assets');

        // Load route files
        $this->loadRoutesFrom(self::ROUTE_PATH . '/web.php');

        // Load views
        $this->loadViewsFrom(self::VIEW_PATH, 'lamoud-nelc-xapi');

        Blade::directive('NelcXapiScript', function ($expression) {
            $output = "<script src=\"{{asset('lamoud-nelc-xapi/js/lamoud-nelc-xapi.js')}}\"></script>";
            $output .= "<script src=\"{{asset('lamoud-nelc-xapi/bootstrap/js/bootstrap.min.js')}}\"></script>";
            return $output;
        });

        Blade::directive('NelcXapiStyle', function ($expression) {
            $output = "<link href=\"{{asset('lamoud-nelc-xapi/css/lamoud-nelc-xapi.css')}}\" rel=\"stylesheet\" />";
            $output .= "<link href=\"{{asset('lamoud-nelc-xapi/bootstrap/css/bootstrap.min.css')}}\" rel=\"stylesheet\" />";
            return $output;
        });
    }

        /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register any services, bindings, or other things here
        $this->mergeConfigFrom(
            self::CONFIG_PATH . '/lamoud-nelc-xapi.php',
            'lamoud-nelc-xapi'
        );
    }
}
