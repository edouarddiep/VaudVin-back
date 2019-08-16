<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WineController extends Controller{

    public function getWines(){
        return \DB::table('app_wines')->orderBy('win_name')->get(); // requête permettant de récupérer tous les vins
    }
    
    public function getWineById($id){
        return \DB::table('app_wines')->where('win_id', $id)->get(); // requête permettant de récupérer un vin par son id
    }
}