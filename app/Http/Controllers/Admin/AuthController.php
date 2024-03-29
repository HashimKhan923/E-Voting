<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Mail;
use Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        
        $user = User::where('email', $request->email)->first();
        if ($user) {


                if (Hash::check($request->password, $user->password)) {
    
                        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                        $response = ['status'=>true,"message" => "Login Successfully",'token' => $token,'user'=>$user];
                        return response($response, 200);
    
                    
                } else {
                    $response = ['status'=>false,"message" => "Password mismatch"];
                    return response($response, 422);
                }
    
  


        } else {
            $response = ['status'=>false,"message" =>'User does not exist'];
            return response($response, 422);
        }
    }
}
