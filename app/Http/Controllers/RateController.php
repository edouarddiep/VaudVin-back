<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;

class RateController extends Controller{

    public function getRates(){
        return \DB::table('app_rates')->get(); // requête permettant de récupérer toutes les notes
    }

    public function getAverageRateByWine($user_id, $win_id){
        return \DB::table('app_rates')
        ->join('app_vintages', 'app_rates.fk_rat_vin_id', '=', 'app_vintages.vin_id')
        ->join('app_wines', 'app_vintages.fk_vin_win_id', '=', 'app_wines.win_id')
        ->where(['fk_rat_user_id' => $user_id, 'app_wines.win_id' => $win_id])
        ->avg('rat_value');
    }

    public function getUserDistinctRates($id){
        return \DB::select('SELECT DISTINCT app_wines.win_id, win_region, win_name, win_style, win_producer, win_appellation, win_grape_variety, win_category, win_capacity FROM app_rates JOIN app_vintages ON app_rates.fk_rat_vin_id = app_vintages.vin_id JOIN app_wines on app_vintages.fk_vin_win_id = app_wines.win_id WHERE fk_rat_user_id = '.$id.' ORDER BY win_name'); // requête permettant de récupérer la note liée au user
    }
    public function getUserRates($id){
        return \DB::table('app_rates')->select('app_rates.rat_id', 'rat_value', 'win_id', 'fk_rat_vin_id', 'fk_rat_user_id')
        ->join('app_vintages', 'app_rates.fk_rat_vin_id', '=', 'app_vintages.vin_id')
        ->join('app_wines', 'app_vintages.fk_vin_win_id', '=', 'app_wines.win_id')
        ->where('fk_rat_user_id', $id)->get();
    }

    public function getUserRatesByWines($user_id, $win_id){
        return \DB::table('app_rates')->select('app_rates.rat_id', 'rat_value', 'rat_comment', 'fk_rat_vin_id', 'fk_rat_user_id')
        ->join('app_vintages', 'app_rates.fk_rat_vin_id', '=', 'app_vintages.vin_id')
        ->join('app_wines', 'app_vintages.fk_vin_win_id', '=', 'app_wines.win_id')
        ->where(['fk_rat_user_id' => $user_id, 'app_wines.win_id' => $win_id])
        ->get();
    }

    public function getUserRatesByVintages($user_id, $vin_id){
        return \DB::table('app_rates')->select('app_rates.rat_id', 'rat_value', 'rat_comment', 'fk_rat_vin_id', 'fk_rat_user_id')
        ->join('app_vintages', 'app_rates.fk_rat_vin_id', '=', 'app_vintages.vin_id')
        ->join('app_wines', 'app_vintages.fk_vin_win_id', '=', 'app_wines.win_id')
        ->where(['fk_rat_user_id' => $user_id, 'fk_rat_vin_id' => $vin_id])
        ->get();
    }

    // requête permettant de récupérer les notes pour tous les millésimes d'un vin
    public function getRatesByWine($id){
        return \DB::table('app_rates')->select('app_rates.rat_id', 'rat_value', 'rat_comment', 'vin_id', 'vin_year', 'fk_rat_user_id')
        ->join('app_vintages', 'app_rates.fk_rat_vin_id', '=', 'app_vintages.vin_id')
        ->join('app_wines', 'app_vintages.fk_vin_win_id', '=', 'app_wines.win_id')
        ->where('win_id', $id)
        ->orderBy('vin_year', 'DESC')
        ->get(); 
    }

    public function postRate(Request $request){
        $rate = Rate::create([
            'rat_value' => $request->json()->get('rat_value'),
            'rat_comment' => $request->json()->get('rat_comment'),
            'fk_rat_vin_id' => $request->json()->get('fk_rat_vin_id'),
            'fk_rat_user_id' => $request->json()->get('fk_rat_user_id'),
        ]);

        return response()->json($rate, 201);
    }

    public function updateRate(Request $request, $id){
        $rate = Rate::find($id);
        $rate->rat_value = $request->rat_value;
        $rate->rat_comment = $request->rat_comment;
        $rate->save();
    }
}