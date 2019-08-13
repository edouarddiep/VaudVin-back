<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller{

    public function getRestaurants(){
        return \DB::select('SELECT * FROM app_restaurants ORDER BY res_name'); // requête permettant de récupérer tous les restaurants
    }

    public function getRestaurantById($id){
        return \DB::select('SELECT * FROM app_restaurants WHERE res_id = '.$id);
    }

    public function getWinesByRestaurant($id){
        return \DB::select('SELECT * FROM app_wine_cards JOIN app_wines ON app_wine_cards.fk_win_car_win_id = app_wines.win_id WHERE fk_win_car_res_id = '.$id);
    }
}