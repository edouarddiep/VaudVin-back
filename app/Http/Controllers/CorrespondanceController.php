<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Correspondance;

class CorrespondanceController extends Controller{

    public function getCorrespondances(){
        return \DB::table('app_correspondances')->get(); // requête permettant de récupérer toutes les correspondances
    }

    public function getCorrespondancesBetweenUsers($first_user_id, $second_user_id){
        return \DB::table('app_correspondances')
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