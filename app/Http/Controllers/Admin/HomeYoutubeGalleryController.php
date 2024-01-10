<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeYoutubeGallery;


class HomeYoutubeGalleryController extends Controller
{
    public function index()
    {
        $data = HomeYoutubeGallery::all();

        return response()->json(['data'=>$data]);
    }

    public function create(Request $request)
    {
        $new = new HomeYoutubeGallery();
        $new->heading = $request->heading;
        $new->description = $request->description;
        $new->link = $request->link;
        $new->save();

        return response()->json(['message'=>'created successfully!']);
    }

    public function update(Request $request)
    {
        $update = HomeYoutubeGallery::where('id',$request->id)->first();
        $update->heading = $request->heading;
        $update->description = $request->description;
        $update->link = $request->link;
        $update->save();

        return response()->json(['message'=>'updated successfully!']);
    }

    public function delete($id)
    {
        HomeYoutubeGallery::find($id)->delete();

        return response()->json(['message'=>'deleted successfully!']);

    }
}
