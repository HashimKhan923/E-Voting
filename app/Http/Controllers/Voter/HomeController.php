<?php

namespace App\Http\Controllers\Voter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\Banner;
use App\Models\Vote;
use App\Models\HomeYoutubeGallery;

class HomeController extends Controller
{
    public function index()
    {
        $Parties = Party::where('is_active',1)->get();
        $Banners = Banner::all();
        $Votes = Vote::all();
        $HomeYoutubeGallery = HomeYoutubeGallery::all();

        return response()->json(['Parties'=>$Parties,'Banners'=>$Banners,'Votes'=>$Votes,'HomeYoutubeGallery',$HomeYoutubeGallery]);
    }
}
