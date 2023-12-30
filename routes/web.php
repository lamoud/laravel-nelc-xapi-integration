<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => '\Lamoud\LaravelNelcXapiIntegration\Controllers',
    'middleware' => config('lamoud-nelc-xapi.middleware')
], function () {
    Route::get(config('lamoud-nelc-xapi.base_route'), 'LamoudNelcXapiController@getIndex')
        ->name('lamoud-nelc-xapi.base_route');

    Route::post(config('lamoud-nelc-xapi.base_route'), 'LamoudNelcXapiController@postIndex')
        ->name('lamoud-nelc-xapi.validate_base_route');
});