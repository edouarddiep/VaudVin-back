<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tests', function () {

    $isWeekend = date('N') >= 6;

    $infos = [
        'Edouard',
        'Diep',
        'Rue des Barques 4',
        '1207 Genève',
        'Suisse'
    ];

    return view('TEST.events', compact('infos', 'isWeekend'));

});

Route::get('/wines', 'WineController@getWines');
Route::get('wines/{id}', 'WineController@getWineById');
Route::get('/restaurants', 'RestaurantController@getRestaurants');
Route::get('/restaurants/{id}', 'RestaurantController@getRestaurantById');

Route::get('/maman', function () {
    return "<h1>Hello mère !</h1>";
});