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

        $count = Banner::count();
        $order = $count+1;

        if($request->file('image'))
        {
            $file= $request->image;
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('Banner'),$filename);
            $new->image = $filename;
        }
        $new->sort = $order;
        $new->link = $request->link;
        $new->save();

        return response()->json(['message'=>'created successfully!']);
    }

    public function update(Request $request)
    {

        $update = Banner::where('id',$request->id)->first();

        if($request->order != null)
        {
            $changeOrder = Banner::where('sort',$request->sort)->first();
            $changeOrder->sort = $update->sort;
            $changeOrder->save();
        }


        if($request->file('image'))
        {
            $file= $request->image;
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('Banner'),$filename);
            $update->image = $filename;
        }

        $update->sort = $request->sort;
        $update->link = $request->link;
        $update->save();

        return response()->json(['message'=>'updated successfully!']);
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
