<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WineController extends Controller{

    public function getWines(){
        return \DB::select('SELECT * FROM app_wines ORDER BY win_name'); // requête permettant de récupérer tous les vins
    }
    
    public function getWineById($id){
        return \DB::select('SELECT * FROM app_wines WHERE win_id = '.$id); // requête permettant de récupérer un vin par son id
    }
}