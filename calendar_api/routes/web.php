<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
// calendar table
// $router->get('/calendar','CalendarController@index');
$router->get('/calendar/{calendarid}','CalendarController@show');
$router->get('/calendar/hijri/{hijri}','CalendarController@showByHijri');

// user table
$router->get('/user','UserController@index');
$router->get('/user/{userid}','UserController@show');
$router->post('/user/create','UserController@store');
$router->delete('/user/delete/{userid}','UserController@destroy');

// record table
$router->get('/record','RecordController@index');
$router->get('/record/user/{userid}','RecordController@userIndex');


$router->get('/record/{recordid}','RecordController@show');

$router->post('/record/create','RecordController@store');
$router->post('/record/update/{recordid}','RecordController@update');
$router->delete('/record/delete/{recordid}','RecordController@destroy');


$router->get('/', function () use ($router) {
    return $router->app->version();
});
