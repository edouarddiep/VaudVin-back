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

/** ROUTES GET */
Route::get('/wines', 'WineController@getWines');
Route::get('/wines/{win_id}', 'WineController@getWineById');
Route::get('/wines/{win_id}/rates', 'RateController@getRatesByWine');
Route::get('/wines/{win_id}/vintages', 'VintageController@getWineVintages');
Route::get('/wines/{win_id}/concoursrates', 'ConcoursRateController@getConcoursRatesByWine');
Route::get('/wines/{win_id}/concoursrates/nb', 'ConcoursRateController@getNumberConcoursRateByWine');
Route::get('/wines/{win_id}/concoursrates/avg', 'ConcoursRateController@getAverageConcoursRateByWine');
Route::get('/restaurants', 'RestaurantController@getRestaurants');
Route::get('/restaurants/{res_id}', 'RestaurantController@getRestaurantById');
Route::get('/restaurants/{id}/wines', 'RestaurantController@getWinesByRestaurant');
Route::get('/rates', 'RateController@getRates');
Route::get('/vintages', 'VintageController@getVintages');
Route::get('/user', 'UserController@getAuthenticatedUser');
Route::get('/users', 'UserController@getAllUsers');
Route::get('/users/{user_id}', 'UserController@getUserById');
Route::get('/users/{user_id}/rates/distinct', 'RateController@getUserDistinctRates');
Route::get('/users/{user_id}/rates', 'RateController@getUserRates');
Route::get('/users/{user_id}/vintages/{vin_id}', 'RateController@getUserRatesByVintages');
Route::get('/users/{user_id}/wines/{win_id}', 'RateController@getUserRatesByWines');
Route::get('/users/{user_id}/wines/{win_id}/rates/avg', 'RateController@getAverageRateByWine');
Route::get('/user_id', 'UserController@getAuthenticatedUserId');

/** ROUTES POST */
Route::post('rates', 'RateController@postRate');
Route::post('vintages', 'VintageController@postVintage');

/** ROUTES PUT */
Route::put('rates/{rat_id}', 'RateController@updateRate');

/** ROUTES POUR AUTHENTICATIONS*/
Auth::routes();