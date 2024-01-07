<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Party;
use App\Models\Vote;

class DashboardController extends Controller
{
    public function index()
    {
        $Voters = User::where('user_type','voter')->count();
        $Vote = Vote::count();
        $Parties = Party::count();


        return response()->json(['VotersCount'=>$Voters,'VoteCount'=>$Vote,'PartiesCount'=>$Parties]);
    }
}
