<?php

namespace App\Http\Controllers\Voter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Party;

class HomeController extends Controller
{
    public function index()
    {
        $data = Party::where('is_active',1)->get();

        return response()->json(['data'=>$data]);
    }
}
