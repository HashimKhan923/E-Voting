<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Party;

class PartyController extends Controller
{
    public function index()
    {
       $data = Party::with('votes')->get();

       return response()->json(['data'=>$data]);
    }

    public function create(Request $request)
    {
        $new = new Party();

        $count = Party::count();
        $order = $count+1;

        $new->name = $request->name;
        $new->candidate_name = $request->candidate_name;
        $new->sort = $order;
        if($request->file('flag'))
        {
            $file= $request->flag;
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('Flag'),$filename);
            $new->flag = $filename;
        }
        if($request->file('image'))
        {
            $file= $request->image;
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('Candidate'),$filename);
            $new->candidate_image = $filename;
        }
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


        if($request->order != null)
        {
            $changeOrder = Party::where('sort',$request->sort)->first();
            $changeOrder->sort = $update->sort;
            $changeOrder->save();
        }


        $update->name = $request->name;
        $update->flag = $request->flag;
        $update->candidate_name = $request->candidate_name;
        $update->sort = $request->sort;
        if($request->file('flag'))
        {
            // if($update->flag)
            // {
            //     unlink(public_path('Flag/'.$update->flag));
            // }

            $file= $request->flag;
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('Flag'),$filename);
            $update->flag = $filename;
        }
        if($request->file('image'))
        {
            if($update->candidate_image)
            {
                unlink(public_path('Candidate/'.$update->candidate_image));
            }

            $file= $request->image;
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('Candidate'),$filename);
            $update->candidate_image = $filename;

        }   

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
        $data = Party::find($id);

        if($data->flag)
        {
            unlink(public_path('Flag/'.$data->flag));
        }

        if($data->candidate_image)
        {
            unlink(public_path('Candidate/'.$data->candidate_image));
        }

        if($data->audio)
        {
            unlink(public_path('Audio/'.$data->audio));
        }

        if($data->video)
        {
            unlink(public_path('Video/'.$data->video));
        }

        $data->delete();

        return response()->json(['message'=>'deleted successfully!']);

    }



    public function status($id)
    {
        $status = Party::find($id);

        if($status->is_active == 1)
        {
            $status->is_active = 0;
        }
        else
        {
            $status->is_active = 1;
        }

        $status->save();

        return response()->json(['message'=>'status changed successfully!',200]);

    }


}

