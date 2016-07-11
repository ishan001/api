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
$api->version(['v1', 'v2'], [], function ($api)  {
    /**
     * VERSION 1 routes
     */
    $api->group(['prefix' => 'v1','namespace' => 'App\Api\v1\Controllers'], function ($api)  {
        $api->get('/cities', 'CommonController@showCities');
        $api->get('/makes', 'CommonController@showMakes');
        $api->get('/models/{make}', 'CommonController@showModels');
        $api->get('/features', 'CommonController@showFeatures');

        //$api->get('/add', 'CommonController@addData');

        $api->group(['prefix' => 'car'], function ($api)  {
            $api->get('/makes', 'CarController@showMakes');
            $api->get('/models/{make}', 'CarController@showModels');
            $api->get('/cities', 'CarController@showCities');
        });


    });

});
