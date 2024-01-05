<?php

namespace App\Http\Controllers\Voter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Party;

class HomeController extends Controller
{
    public function index()
    {
        $Parties = Party::where('is_active',1)->get();
        $Banners = Banner::all();

        return response()->json(['Parties'=>$Parties,'Banners'=>$Banners]);
    }
}
