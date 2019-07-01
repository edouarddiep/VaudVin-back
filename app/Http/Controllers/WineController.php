<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WineController extends Controller{

    public function getWines(){
        return \DB::select('SELECT * FROM app_wines'); // requête permettant de récupérer tous les vins
    }
    
    public function getWineById($id){
        return \DB::select('SELECT * FROM app_wines WHERE id = '.$id); // requête permettant de récupérer tous les vins
    }
}