<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/* for rendering documentation */
$app->get('/', function () use ($app) {
    return $app->version();
});


$api = app('Dingo\Api\Routing\Router');

// JWT Protected routes
$api->version('v1', ['middleware' => 'api.auth', 'providers' => 'jwt'], function ($api) {
    $api->get('/index', 'App\Http\Controllers\BackendController@index');
});

// Publicly accessible routes
$api->version(['v1', 'v2'], [], function ($api) {
    /**
     * VERSION 1 routes
     */
    $api->group(['prefix' => 'v1'], function ($api) {
        $api->get('/cities', 'App\Api\v1\Controllers\CommonController@showCitites');
        $api->get('/car-makes', 'App\Api\v1\Controllers\CommonController@showCarMakes');
        $api->get('/car-models/{make}', 'App\Api\v1\Controllers\CommonController@showCarModels');
    });

});
