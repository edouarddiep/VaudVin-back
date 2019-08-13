<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vintage;

class VintageController extends Controller{

    public function getVintages(){
        return \DB::select('SELECT * FROM app_vintages'); // requête permettant de récupérer toutes les notes
    }

    public function getWineVintages($id){
        return \DB::select('SELECT * FROM app_vintages JOIN app_rates ON app_rates.fk_rat_vin_id = vin_id WHERE fk_vin_win_id = '.$id.' ORDER BY vin_year DESC'); // requête permettant de récupérer la note liée au vin
    }

    public function postVintage(Request $request){
        $vintage = Vintage::create([
            'vin_year' => $request->json()->get('vin_year'),
            'fk_vin_win_id' => $request->json()->get('fk_vin_win_id'),
        ]);
        return response()->json($vintage, 201);
    }
}