<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;

class ConcoursRateController extends Controller{

    public function getConcoursRates(){
        return \DB::table('app_concours_rates')->get(); // requête permettant de récupérer toutes les notes
    }

    // requête permettant de récupérer les notes pour tous les millésimes d'un vin
    public function getConcoursRatesByWine($id){
        return \DB::table('app_concours_rates')
        ->select('app_concours_rates.con_rat_id', 'con_rat_value', 'win_id', 'fk_con_rat_vin_id')
        ->join('app_vintages', 'app_concours_rates.fk_con_rat_vin_id', '=', 'app_vintages.vin_id')
        ->join('app_wines', 'app_vintages.fk_vin_win_id', '=', 'app_wines.win_id')
        ->where('win_id', $id)
        ->orderBy('vin_year', 'DESC')
        ->get();
    }

    // requête permettant de récupérer la note liée au millésime
    public function getAverageConcoursRateByWine($id){
        return \DB::table('app_concours_rates')
        ->join('app_vintages', 'app_concours_rates.fk_con_rat_vin_id', '=', 'app_vintages.vin_id')
        ->join('app_wines', 'app_vintages.fk_vin_win_id', '=', 'app_wines.win_id')
        ->where('win_id', $id)
        ->avg('con_rat_value');
    }

}