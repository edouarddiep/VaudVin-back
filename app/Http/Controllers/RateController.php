<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;

class RateController extends Controller{

    public function getRates(){
        return \DB::select('SELECT * FROM app_rates'); // requête permettant de récupérer toutes les notes
    }

    public function getRatesByVintage($id){
        return \DB::select('SELECT * FROM app_rates WHERE vint_id = '.$id); // requête permettant de récupérer la note liée au millésime
    }

    public function getUserRates($id){
        return \DB::select('SELECT app_rates.id, value, vint_id, user_id FROM app_rates JOIN app_vintages ON app_rates.vint_id = app_vintages.id JOIN app_wines on app_vintages.wine_id = app_wines.id WHERE user_id = '.$id); // requête permettant de récupérer la note liée au user
    }

    public function getUserRatesByWines($user_id, $wine_id){
        return \DB::select('SELECT app_rates.id, value, vint_id, user_id FROM app_rates JOIN app_vintages ON app_rates.vint_id = app_vintages.id JOIN app_wines on app_vintages.wine_id = app_wines.id WHERE user_id = '.$user_id.' AND wine_id = '.$wine_id); // requête permettant de récupérer la note liée au user
    }

    public function getUserRatesByVintages($user_id, $vint_id){
        return \DB::select('SELECT app_rates.id, value, vint_id, user_id FROM app_rates JOIN app_vintages ON app_rates.vint_id = app_vintages.id JOIN app_wines on app_vintages.wine_id = app_wines.id WHERE user_id = '.$user_id.' AND app_rates.vint_id = '.$vint_id); // requête permettant de récupérer la note liée au user
    }

    public function getRatesByWine($id){
        return \DB::select('SELECT wine_id, value, year FROM app_rates JOIN app_vintages ON app_rates.vint_id = app_vintages.id JOIN app_wines on app_vintages.wine_id = app_wines.id WHERE wine_id = '.$id.' ORDER BY year DESC'); // requête permettant de récupérer les notes pour tous les millésimes d'un vin
    }

    public function postRate(Request $request){
        $rate = Rate::create([
            'value' => $request->json()->get('value'),
            'vint_id' => $request->json()->get('vint_id'),
            'user_id' => $request->json()->get('user_id'),
        ]);

        return response()->json($rate, 201);
    }

    public function updateRate(Request $request, $id){
        return \DB::update('UPDATE app_rates SET value = '.$request->value.' WHERE id = '.$id);
    }
}