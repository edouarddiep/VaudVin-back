<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;

class ConcoursRateController extends Controller{

    public function getConcoursRates(){
        return \DB::select('SELECT * FROM app_concours_rates'); // requête permettant de récupérer toutes les notes
    }

    public function getConcoursRatesByWine($id){
        return \DB::select('SELECT app_concours_rates.con_rat_id, con_rat_value, win_id, fk_con_rat_vin_id FROM app_concours_rates JOIN app_vintages ON app_concours_rates.fk_con_rat_vin_id = app_vintages.vin_id JOIN app_wines on app_vintages.fk_vin_win_id = app_wines.win_id WHERE win_id = '.$id.' ORDER BY vin_year DESC'); // requête permettant de récupérer les notes pour tous les millésimes d'un vin
    }

    public function getAverageConcoursRateByWine($id){
        return \DB::select('SELECT AVG(con_rat_value) FROM app_concours_rates JOIN app_vintages ON app_concours_rates.fk_con_rat_vin_id = app_vintages.vin_id JOIN app_wines on app_vintages.fk_vin_win_id = app_wines.win_id WHERE win_id = '.$id); // requête permettant de récupérer la note liée au millésime
    }

}