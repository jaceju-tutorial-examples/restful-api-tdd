<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);
$api->version('v1', function (Router $api) {
    $api->get('/', function () {
        return ['Fruits' => 'Delicious and healthy!'];
    });
    $api->get('fruits', 'App\Http\Controllers\FruitsController@index');
    $api->get('fruit/{id}', 'App\Http\Controllers\FruitsController@show');

    $api->post('authenticate', 'App\Http\Controllers\AuthenticateController@authenticate');
    $api->post('logout', 'App\Http\Controllers\AuthenticateController@logout');
    $api->get('token', 'App\Http\Controllers\AuthenticateController@getToken');
});
