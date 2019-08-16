<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller{

    public function getRestaurants(){
        return \DB::table('app_restaurants')->orderBy('res_name')->get(); // requête permettant de récupérer tous les restaurants
    }

    public function getRestaurantById($id){
        return \DB::table('app_restaurants')->where('res_id', $id)->get();
    }

    public function getWinesByRestaurant($id){
        return \DB::table('app_wine_cards')
        ->join('app_wines', 'app_wine_cards.fk_win_car_win_id', '=', 'app_wines.win_id')
        ->where('fk_win_car_res_id', $id)->get();
        
    }
}