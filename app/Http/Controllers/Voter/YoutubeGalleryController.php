<?php

namespace App\Http\Controllers\Voter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YoutubeGallery;


class YoutubeGalleryController extends Controller
{
    public function index()
    {
        $data = YoutubeGallery::all();

        return response()->json(['data'=>$data]);
    }
}
