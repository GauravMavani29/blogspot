<?php

namespace App\Http\Controllers;
use App\Models\Clubpoint;
use Illuminate\Http\Request;

class ClubpointController extends Controller
{
    //
    function index()
    {
        $data = Clubpoint::first();
        return view('backend.clubpoints.index',['collection'=>$data]);
    }
    function save_clubpoints(Request $req)
    {
        $req->validate([
            'view'=>'required', 
            'comment'=>'required',
        ]);

        $countdata = Clubpoint::count();
        if($countdata == 0)
        {
            $setting = new Clubpoint;
            $setting->view = $req->view;
            $setting->comment = $req->comment;
            $setting->save();
        }else{
            $firstdata = Clubpoint::first();
            $setting = Clubpoint::find($firstdata->id);
            $setting->view = $req->view;
            $setting->comment = $req->comment;
            $setting->save();
        }

        return redirect('admin/clubpoints')->with('success','Clubpoints Update Successfully!!');

    }
}
