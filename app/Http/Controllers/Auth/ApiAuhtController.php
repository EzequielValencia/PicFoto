<?php

namespace PicFoto\Http\Controllers\Auth;

use Illuminate\Http\Request;
use PicFoto\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiAuhtController extends Controller
{
    //
    public function login(Request $request){

        try{
        $credenciales = $request->only('email','password');

        $token = \JWTAuth::attempt($credenciales);

            if($token){
                return ['token'=>$token,'status'=>200];
            }
        }catch (JWTException $e){
            return ["error"=>$e->getMessage(),'status'=>500];
        }
        return ["error"=>'acceso denegado',"status"=>404];
    }
}
