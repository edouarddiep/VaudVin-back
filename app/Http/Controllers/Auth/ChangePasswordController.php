<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;


class ChangePasswordController extends Controller
{
    public function process(ChangePasswordRequest $request){
        return $this->getPasswordResetTableRow($request)->count() > 0 ? $this->changePassword($request) : $this->tokenNotFoundResponse();
    }

    private function getPasswordResetTableRow($request){
        return \DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->resetToken]);
    }

    private function changePassword($request){
        $user = User::where('email', $request->email)->first();
        $user->update(['password' => bcrypt($request->password)]);
        $this->getPasswordResetTableRow($request)->delete();
        return response()->json(['data'=>'Le mot de passe a été mise à jour'], Response::HTTP_CREATED);
    }

    private function tokenNotFoundResponse(){
        return response()->json(['error' => 'Le token ou l\'email est incorrect.'], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
