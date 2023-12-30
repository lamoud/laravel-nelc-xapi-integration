<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => '\Lamoud\LaravelNelcXapiIntegration\Controllers',
    'middleware' => config('lamoud-nelc-xapi.middleware')
], function () {
    Route::get(config('lamoud-nelc-xapi.base_route'), 'LamoudNelcXapiController@getIndex')
        ->name('lamoud-nelc-xapi.base_route');
});