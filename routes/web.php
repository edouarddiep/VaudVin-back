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
Route::get('wines/{id}/rates', 'RateController@getRatesByWine');
Route::get('/restaurants', 'RestaurantController@getRestaurants');
Route::get('/restaurants/{id}', 'RestaurantController@getRestaurantById');
Route::get('/rates', 'RateController@getRates');
Route::get('/vintages/{id}/rates', 'RateController@getRatesByVintage');
Route::get('/vintages', 'VintageController@getVintages');
Route::get('/wines/{id}/vintages', 'VintageController@getWineVintages');
Route::get('/user', 'UserController@getAuthenticatedUser');
Route::get('/user/{id}', 'UserController@getUserById');
Route::get('/user/{id}/rates', 'RateController@getUserRates');
Route::get('/user/{user_id}/vintages/{vint_id}', 'RateController@getUserRatesByVintages');
Route::get('/user/{user_id}/wines/{wine_id}', 'RateController@getUserRatesByWines');
Route::get('/user_id', 'UserController@getAuthenticatedUserId');

Route::post('rates', 'RateController@postRate');

Route::put('rates/{id}', 'RateController@updateRate');


Route::bind('/wine', function ($search) {
    return App\Models\Wine::where('name', 'LIKE', '%'.$search.'%')->get();
});

Route::get('/maman', function () {
    return "<h1>Hello mère !</h1>";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');