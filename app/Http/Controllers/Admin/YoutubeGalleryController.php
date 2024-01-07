<?php

namespace App\Http\Controllers\Admin;

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

    public function create(Request $request)
    {
        $new = new YoutubeGallery();
        $new->link = $request->link;
        $new->save();

        return response()->json(['message'=>'created successfully!']);
    }

    public function delete($id)
    {
        YoutubeGallery::find($id)->delete();

        return response()->json(['message'=>'deleted successfully!']);

    }
}
