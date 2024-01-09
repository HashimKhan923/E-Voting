<?php

namespace App\Http\Controllers\Voter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\Banner;
use App\Models\Vote;
use App\Models\HomeYoutubeGallery;
use App\Models\YoutubeGallery;

class HomeController extends Controller
{
    public function index()
    {
        $Parties = Party::where('is_active',1)->orderBy('sort','ASC')->get();
        $Banners = Banner::orderBy('sort','ASC')->get();
        $Votes = Vote::all();
        $HomeYoutubeGallery = HomeYoutubeGallery::all();
        $YoutubeGallery = YoutubeGallery::orderBy('sort','ASC')->get();

        return response()->json(['Parties'=>$Parties,'Banners'=>$Banners,'Votes'=>$Votes,'HomeYoutubeGallery'=>$HomeYoutubeGallery,'YoutubeGallery'=>$YoutubeGallery]);
    }
}
