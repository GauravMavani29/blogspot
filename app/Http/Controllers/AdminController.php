<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

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

        $userdata = Admin::where('username',$req->username)->first();
        if($userdata && Hash::check($req->password,$userdata->password))
        {
            session(['adminData'=>$userdata]);
            return redirect('admin/dashboard');
        }else{
            return redirect('admin/login')->with('error','Invalid Username/password!!');
        }
    }

    function dashboard()
    {
        $data = Post::where('user_id',0)->orderBy('id','desc')->get();
        return view('backend.dashboard',["collection"=>$data]);
    }

    function comments()
    {
        $data = Comment::orderBy('id','desc')->get();
        return view('backend.comments.index',['collection'=>$data]);
    }

    function delete_comment($id)
    {
        Comment::where('id',$id)->delete();
         return redirect('admin/comments');
    }

    function users()
    {
        $data = User::orderBy('id','desc')->get();
        return view('backend.users.index',['collection'=>$data]);
    }

    function delete_user($id)
    {
        User::where('id',$id)->delete();
         return redirect('admin/users');
    }

    function all_comment($id)
    {
        $data = Comment::where('post_id',$id)->get();
        return view('backend.comments.index',["collection"=>$data]);
    }

    function allpost($id)
    {
        $data = Post::where('user_id',$id)->get();
        return view('backend.post.index',["collection"=>$data]);
    }
}