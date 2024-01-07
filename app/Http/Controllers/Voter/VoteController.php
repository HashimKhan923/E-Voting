<?php

namespace App\Http\Controllers\Voter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    public function create(Request $request)
    {
        $check = Vote::where('voter_id',$request->voter_id)->first();

        if($check)
        {
            return response()->json(['message'=>'you have already cast your vote']);
        }

        $new = new Vote();
        $new->voter_id = $request->voter_id;
        $new->party_id = $request->party_id;
        $new->save();

        $user = User::where('id',$request->voter_id)->first();

        Mail::send(
            'email.vote',
            [
                
                'name'=>$user->name,
                //'last_name'=>$query->last_name
            ], 
        
        function ($message) use ($user) {
            $message->from('overseaspkc@gmail.com','E-Voting');
            $message->to($user->email);
            $message->subject('Vote');
        });

        return response()->json(['message'=>'vote casted successfully!']);

    }
}
