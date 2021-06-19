<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
class SettingController extends Controller
{
    function index()
    {
        $data = Setting::first();
        return view('backend.setting.index',['collection'=>$data]);
    }

    function save_setting(Request $req)
    {
        $req->validate([
            'recent_post_limit'=>'required',
            'popular_post_limit'=>'required',
        ]);

        $countdata = Setting::count();
        if($countdata == 0)
        {
            $setting = new Setting;
            $setting->recent_post_limit = $req->recent_post_limit;
            $setting->popular_post_limit = $req->popular_post_limit;
            $setting->save();
        }else{
            $firstdata = Setting::first();
            $setting = Setting::find($firstdata->id);
            $setting->recent_post_limit = $req->recent_post_limit;
            $setting->popular_post_limit = $req->popular_post_limit;
            $setting->save();
        }

        return redirect('admin/setting')->with('success','Setting Updated Successfully!!');

    }
}
