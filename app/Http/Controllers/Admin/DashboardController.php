<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Party;
use App\Models\Vote;
use App\Models\Banner;
use App\Models\YoutubeGallery;

class DashboardController extends Controller
{
    public function index()
    {
        $Voters = User::where('user_type','voter')->count();
        $Vote = Vote::count();
        $Parties = Party::count();
        $BannersCount = Banner::count();
        $YoutubeGalleryCount = YoutubeGallery::count();


        return response()->json(['VotersCount'=>$Voters,'VoteCount'=>$Vote,'PartiesCount'=>$Parties
        ,'BannersCount'=>$BannersCount,'YoutubeGalleryCount'=>$YoutubeGalleryCount]);
    }
}
