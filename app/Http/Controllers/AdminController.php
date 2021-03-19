<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;

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
            $adminData = Admin::where(['username'=>$req->username, 'password'=>$req->password])->first();
            session(['adminData'=>$adminData]);
            return redirect('admin/dashboard');
        }else{
            return redirect('admin/login')->with('error','Invalid Username/password!!');
        }
    }

    function dashboard()
    {
        $data = Post::orderBy('id','desc')->get();
        return view('backend.dashboard',["collection"=>$data]);
    }

    function comments()
    {
        $data = Comment::orderBy('id','desc')->get();
        return view('comments.index',['collection'=>$data]);
    }

    function delete_comment($id)
    {
        Comment::where('id',$id)->delete();
         return redirect('admin/comments');
    }

    function users()
    {
        $data = User::orderBy('id','desc')->get();
        return view('Users.index',['collection'=>$data]);
    }

    function delete_user($id)
    {
        User::where('id',$id)->delete();
         return redirect('admin/users');
    }
}