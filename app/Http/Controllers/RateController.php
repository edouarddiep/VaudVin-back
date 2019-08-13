<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;

class RateController extends Controller{

    public function getRates(){
        return \DB::select('SELECT * FROM app_rates'); // requête permettant de récupérer toutes les notes
    }

    public function getAverageRateByWine($id){
        return \DB::select('SELECT AVG(rat_value) FROM app_rates JOIN app_vintages ON app_rates.fk_rat_vin_id = app_vintages.vin_id JOIN app_wines on app_vintages.fk_vin_win_id = app_wines.win_id WHERE app_wines.win_id = '.$id); // requête permettant de récupérer la note liée au millésime
    }

    public function getUserDistinctRates($id){
        return \DB::select('SELECT DISTINCT app_wines.win_id, win_region, win_name, win_style, win_producer, win_appellation, win_grape_variety, win_category, win_capacity FROM app_rates JOIN app_vintages ON app_rates.fk_rat_vin_id = app_vintages.vin_id JOIN app_wines on app_vintages.fk_vin_win_id = app_wines.win_id WHERE fk_rat_user_id = '.$id); // requête permettant de récupérer la note liée au user
    }
    public function getUserRates($id){
        return \DB::select('SELECT app_rates.rat_id, rat_value, win_id, fk_rat_vin_id, fk_rat_user_id FROM app_rates JOIN app_vintages ON app_rates.fk_rat_vin_id = app_vintages.vin_id JOIN app_wines on app_vintages.fk_vin_win_id = app_wines.win_id WHERE fk_rat_user_id = '.$id); // requête permettant de récupérer la note liée au user
    }

    public function getUserRatesByWines($user_id, $wine_id){
        return \DB::select('SELECT app_rates.rat_id, rat_value, rat_comment, fk_rat_vin_id, fk_rat_user_id FROM app_rates JOIN app_vintages ON app_rates.fk_rat_vin_id = app_vintages.vin_id JOIN app_wines on app_vintages.fk_vin_win_id = app_wines.win_id WHERE fk_rat_user_id = '.$user_id.' AND app_wines.win_id = '.$wine_id); // requête permettant de récupérer la note liée au user
    }

    public function getUserRatesByVintages($user_id, $vint_id){
        return \DB::select('SELECT app_rates.rat_id, rat_value, rat_comment, fk_rat_vin_id, fk_rat_user_id FROM app_rates JOIN app_vintages ON app_rates.fk_rat_vin_id = app_vintages.vin_id JOIN app_wines on app_vintages.fk_vin_win_id = app_wines.win_id WHERE fk_rat_user_id = '.$user_id.' AND fk_rat_vin_id = '.$vint_id); // requête permettant de récupérer la note liée au user
    }

    public function getRatesByWine($id){
        return \DB::select('SELECT app_wines.win_id, rat_value, rat_comment, vin_id, vin_year, fk_rat_user_id FROM app_rates JOIN app_vintages ON app_rates.fk_rat_vin_id = app_vintages.vin_id JOIN app_wines on app_vintages.fk_vin_win_id = app_wines.win_id WHERE win_id = '.$id.' ORDER BY vin_year DESC'); // requête permettant de récupérer les notes pour tous les millésimes d'un vin
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
        return \DB::update('UPDATE app_rates SET rat_value = '.$request->rat_value.', rat_comment = \''.$request->rat_comment.'\' WHERE rat_id = '.$id);
    }
}