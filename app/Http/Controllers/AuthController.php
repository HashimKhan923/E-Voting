<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Mail;

class AuthController extends Controller
{
    public function forgetpassword(Request $req)
    {
        $req->validate([
            'email' => 'required|email'
        ]);
        $query = User::where('email',$req->email)->first();
        // dd($query);
        if($query == null)
        {
            return response(['status' => false, 'message' => 'Email does not exist']);
        }        
        else{
            $token = uniqid();
            $query->remember_token = $token;
            $query->save();
            Mail::send(
                'email.password-reset',
                [
                    'token'=>$token,
                    'name'=>$query->name,
                    //'last_name'=>$query->last_name
                ], 
            
            function ($message) use ($query) {
                $message->from('overseaspkc@gmail.com','E-Voting');
                $message->to($query->email);
                $message->subject('Forget Password');
            });
            return response(['status' => true, 'message' => 'Token send to your email']);

        }

    }

    public function token_check(Request $req)
    {
        $req->validate([
            'token' => 'required'
        ]);
        $query = User::where('remember_token',$req->token)->first();
        if($query == null)
        {
            return response(['status' => false, 'message' => 'Token not match']);
        }
        else{
            return response(['status' => true, 'message' => 'Token match','token'=>$req->token]);
        }

    }
    public function reset_password(Request $req)
    {
        $req->validate([
            'token'=>'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        $user = User::where('remember_token','=',$req->token)->first();  
        if($user == null)
        {
            return response(['status' => false, 'message' => 'Token not match']);
        }
        else
        {
            $user->password = Hash::make($req->password);
            $user->remember_token = null;
            $save = $user->save();
            if($save)
            {
                return response(['status' => true, 'message' => 'Success']);
            }
            else
            {
                return response(['status' => false, 'message' => 'Failed']);
            }
        }

    }


    public function passwordChange(Request $request){
        $controlls = $request->all();
        $id=$request->id;
        $rules = array(
            "old_password" => "required",
            "new_password" => "required|required_with:confirm_password|same:confirm_password",
            "confirm_password" => "required"
        );

        $validator = Validator::make($controlls, $rules);
        if ($validator->fails()) {
            //return redirect()->back()->withErrors($validator)->withInput($controlls);
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = User::where('id',$request->id)->first();
        $hashedPassword = $user->password;
 
        if(Hash::check($request->old_password , $hashedPassword )) {
 
            if (!Hash::check($request->new_password , $hashedPassword)) {
                $users =User::find($request->id);
                $users->password = bcrypt($request->new_password);
                $users->save();

                $response = ['status'=>true,"message" => "Password Changed Successfully"];
                return response($response, 200);
            }else{
                $response = ['status'=>true,"message" => "new password can not be the old password!"];
                return response($response, 422);
            }
 
        }else{
            $response = ['status'=>true,"message" => "old password does not matched"];
            return response($response, 422);
        }

    }


    public function verification($id)
    {
        
   
      $check = User::where('remember_token',$id)->first();

      if($check)
      {
        $check->remember_token = null;
        $check->save();
        $response = ['status' => true, "message" => "Email Verified Successfully!"];

        return response($response,200);
      }
      else
      {
        $response = ['status' => true, "message" => "something went wrong!"];

        
        return response($response,422);
      }


    }
}
