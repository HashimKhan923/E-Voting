<?php

namespace App\Http\Controllers\Voter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Mail;
use Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            "email" => "required|email|unique:users,email",
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }



        
        $new = new User();
        $new->uu_id = $request->uu_id.'-'.rand(100000,999999);
        $new->name = $request->name;
        $new->email = $request->email;
        $new->city = $request->city;
        $new->state = $request->state;
        $new->country = $request->country;
        $new->phone = $request->phone;
        $new->gender = $request->gender;
        $new->is_pakistani = $request->is_pakistani;
        $new->pakistan_province = $request->pakistan_province;
        $new->pakistan_city = $request->pakistan_city;
        $new->profession = $request->profession;
        // $token = uniqid();
        // $new->remember_token = $token;
        $new->password = Hash::make($request->password);
        // $new->is_active = 1;
        $new->save();

        // Mail::send(
        //     'email.customer_verification',
        //     [
        //         'token'=>$token,
        //         'name'=>$new->name,
        //         //'last_name'=>$query->last_name
        //     ], 
        
        // function ($message) use ($new) {
        //     $message->from('support@dragonautomart.com','Dragon Auto Mart');
        //     $message->to($new->email);
        //     $message->subject('Email Verification');
        // });
        

        $response = ['status'=>true,"message" => "we have send the verification email to your gmail please verify your account"];
        return response($response, 200);
    }


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

        // if($user->remember_token == null)
        // {   
        //     if($user->is_active == 1)
        //     {
                if (Hash::check($request->password, $user->password)) {
    
                        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                        $response = ['status'=>true,"message" => "Login Successfully",'token' => $token,'user'=>$user];
                        return response($response, 200);
    
                    
                } else {
                    $response = ['status'=>false,"message" => "Password mismatch"];
                    return response($response, 422);
                }
    
        //     }
        //     else
        //     {
        //         $response = ['status'=>false,"message" =>'Your Account has been Blocked by Admin!'];
        //         return response($response, 422);
        //     }
        // } 
        // else
        // {


        //     $response = ['status'=>false,"message" =>'your email is not verified. we have sent a verification link to your email while registration!'];
        //     return response($response, 422);
        // }  


        } else {
            $response = ['status'=>false,"message" =>'User does not exist'];
            return response($response, 422);
        }
    }
}
