<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Party;

class PartyController extends Controller
{
    public function index()
    {
       $data = Party::all();

       return response()->json(['data'=>$data]);
    }

    public function create(Request $request)
    {
        $new = new Party();
        $new->name = $request->name;
        $new->flag = $request->flag;
        $new->candidate_name = $request->candidate_name;
        $new->candidate_image = $request->candidate_image;
        if($request->file('audio'))
        {
            $file= $request->audio;
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('Audio'),$filename);
            $new->audio = $filename;
        }

        if($request->file('video'))
        {
            $file= $request->video;
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('Video'),$filename);
            $new->video = $filename;
        }
        
        $new->save();

        return response()->json(['message'=>'new party created successfully!',200]);
    }


    public function update(Request $request)
    {
        $update = Party::where('id',$request->id)->first();
        $update->name = $request->name;
        $update->flag = $request->flag;
        $update->candidate_name = $request->candidate_name;
        $update->candidate_image = $request->candidate_image;
        if($request->file('audio'))
        {
            if($update->audio)
            {
                unlink(public_path('Audio/'.$update->audio));
            }

            $file= $request->audio;
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('Audio'),$filename);
            $update->audio = $filename;
        }

        if($request->file('video'))
        {

            if($update->video)
            {
                unlink(public_path('Video/'.$update->video));
            }

            $file= $request->video;
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('Video'),$filename);
            $update->video = $filename;
        }
        
        $update->save();

        return response()->json(['message'=>'party updated successfully!',200]);
    }


    public function delete($id)
    {
        $data = Party::find();
    }


}

