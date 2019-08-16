<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vintage;

class VintageController extends Controller{

    public function getVintages(){
        return \DB::table('app_vintages')->get(); // requête permettant de récupérer toutes les notes
    }

    public function getWineVintages($id){
        return \DB::table('app_vintages')
        ->join('app_rates', 'app_rates.fk_rat_vin_id', '=', 'vin_id')
        ->where('fk_vin_win_id', $id)->get();
    }

    public function postVintage(Request $request){
        $vintage = Vintage::create([
            'vin_year' => $request->json()->get('vin_year'),
            'fk_vin_win_id' => $request->json()->get('fk_vin_win_id'),
        ]);
        return response()->json($vintage, 201);
    }
}