<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller{

    public function getRestaurants(){
        return \DB::select('SELECT * FROM app_restaurants'); // requête permettant de récupérer tous les restaurants
    }

    public function getRestaurantById($id){
        return \DB::select('SELECT * FROM app_restaurants WHERE id = '.$id);
    }
}