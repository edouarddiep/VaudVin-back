<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VintageController extends Controller{

    public function getVintages(){
        return \DB::select('SELECT * FROM app_vintages'); // requête permettant de récupérer toutes les notes
    }

    public function getWineVintages($id){
        return \DB::select('SELECT * FROM app_vintages WHERE wine_id = '.$id); // requête permettant de récupérer la note liée au vin
    }
}