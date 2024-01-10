<?php

namespace App\Http\Controllers\Voter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\User;
use Mail;

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
                'ballot_number'=>$user->uu_id
            ], 
        
        function ($message) use ($user) {
            $message->from('overseaspkc@gmail.com','E-Voting');
            $message->to($user->email);
            $message->subject('Vote');
        });

        return response()->json(['message'=>'vote casted successfully!']);

    }
}
