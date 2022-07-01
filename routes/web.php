<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\UserController;

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

// usergit rev-parse --show-toplevel
$router->post('/user/create','UserController@store');
$router->delete('/user/delete/{externid}','UserController@destroy');
// getting records
$router->get('/me/event', ['middleware' => 'auth','uses' => 'RecordController@getUserRecordsByLunarDate']);
$router->get('/me', ['middleware' => 'auth','uses' => 'RecordController@getUserRecords']);
// records CRUD
$router->post('/record/create', 'RecordController@store');
$router->post('/record/update/{recordid}', 'RecordController@update');
$router->delete('/record/delete/{recordid}', 'RecordController@destroy');
$router->get('/record/{recordid}', 'RecordController@show');

// for testing
// $router->get('/record', 'RecordController@index');
// $router->post('/test','UserController@verify');

$router->get('/', function () use ($router) {
    return $router->app->version();
});
