<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $data = Banner::all();

        return response()->json(['data'=>$data]);
    }

    public function create(Request $request)
    {

        $new = new Banner();

        if($request->file('image'))
        {
            $file= $request->image;
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('Banner'),$filename);
            $new->image = $filename;
        }
        $new->link = $request->link;
        $new->save();

        return response()->json(['message'=>'created successfully!']);
    }

    public function delete($id)
    {
        $data = Banner::find($id);

        if($data->flag)
        {
            unlink(public_path('Banner/'.$data->flag));
        }


        $data->delete();

        return response()->json(['message'=>'deleted successfully!']);
    }

}
