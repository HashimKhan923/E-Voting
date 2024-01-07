<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VoterController extends Controller
{
    public function index()
    {
        $data = User::with('vote.party')->where('user_type','voter')->get();

        return response()->json(['data'=>$data]);
    }

    public function status($id)
    {
        $status = User::find($id);

        if($status->is_active == 1)
        {
            $status->is_active = 0;
        }
        else
        {
            $status->is_active = 1;
        }

        $status->save();

        return response()->json(['message'=>'status changed successfully!',200]);

    }

    public function delete($id)
    {
        User::find($id)->delete();

        return response()->json(['message'=>'deleted successfully!',200]);

    }
}
