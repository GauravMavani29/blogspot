<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
class AdminController extends Controller
{
    //
    function login()
    {
        return view('backend.login');
    }

    function submit_login(Request $req)
    {
        $req->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $userCheck = Admin::where(['username'=>$req->username, 'password'=>$req->password])->count();
        if($userCheck == 1)
        {
            return redirect('admin/dashboard');
        }else{
            return redirect('admin/login')->with('error','Invalid Username/password!!');
        }
    }

    function dashboard()
    {
        return view('backend.dashboard');
    }
}