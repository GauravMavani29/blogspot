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
            'comment_auto'=>'required', 
            'user_auto'=>'required',
            'recent_post_limit'=>'required',
            'popular_post_limit'=>'required',
            'recent_comment_limit'=>'required',
        ]);

        $countdata = Setting::count();
        if($countdata == 0)
        {
            $setting = new Setting;
            $setting->comment_auto = $req->comment_auto;
            $setting->user_auto = $req->user_auto;
            $setting->recent_post_limit = $req->recent_post_limit;
            $setting->popular_post_limit = $req->popular_post_limit;
            $setting->recent_comment_limit = $req->recent_comment_limit;
            $setting->save();
        }else{
            $firstdata = Setting::first();
            $setting = Setting::find($firstdata->id);
            $setting->comment_auto = $req->comment_auto;
            $setting->user_auto = $req->user_auto;
            $setting->recent_post_limit = $req->recent_post_limit;
            $setting->popular_post_limit = $req->popular_post_limit;
            $setting->recent_comment_limit = $req->recent_comment_limit;
            $setting->save();
        }

        return redirect('admin/setting')->with('success','Setting Update Successfully!!');

    }
}
