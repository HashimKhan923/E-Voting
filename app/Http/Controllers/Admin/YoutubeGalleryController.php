<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YoutubeGallery;

class YoutubeGalleryController extends Controller
{
    public function index()
    {
        $data = YoutubeGallery::orderBy('sort','ASC')->get();

        return response()->json(['data'=>$data]);
    }

    public function create(Request $request)
    {
        $new = new YoutubeGallery();


        $count = YoutubeGallery::count();
        $order = $count+1;

        $new->link = $request->link;
        $new->sort = $order;
        $new->save();

        return response()->json(['message'=>'created successfully!']);
    }

    public function update(Request $request)
    {

        $update = YoutubeGallery::where('id',$request->id)->first();

        if($request->sort != null)
        {
            $changeOrder = YoutubeGallery::where('sort',$request->sort)->first();
            $changeOrder->sort = $update->sort;
            $changeOrder->save();
        }


        $update->sort = $request->sort;
        $update->link = $request->link;
        $update->save();

        return response()->json(['message'=>'updated successfully!']);
    }

    public function delete($id)
    {
        YoutubeGallery::find($id)->delete();

        return response()->json(['message'=>'deleted successfully!']);

    }
}
