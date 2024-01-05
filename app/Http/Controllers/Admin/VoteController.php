<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    public function index()
    {
        $data = Vote::with('voter','party')->get();

        return response()->json(['data'=>$data]);
    }
}
