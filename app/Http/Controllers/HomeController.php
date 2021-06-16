<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\subscription;
use App\Models\Viewscount;
use App\Models\UsersClubpoint;
use App\Models\Clubpoint;
use Image;
use Auth;
class HomeController extends Controller
{
    //
    function index()
    {
        return view('home');
    }
    
    function blog(Request $req)
    {
        if($req->has('que'))
        {
            $que = $req->que;
            $data = Post::where('title','like','%'.$que.'%')->orderBy('id','desc')->paginate(4);
        }else{
            $data = Post::orderBy('id','desc')->paginate(4);
        }
        return view('frontend.blog',['collection'=>$data,'name'=>'All Post']);
    }

    function category_blog($id)
    {
        $data = Post::where('cat_id',$id)->paginate(4);
        $name = Category::where('id',$id)->select('title')->get();
        return view('frontend.blog',['collection'=>$data,'name'=>$name[0]->title]);
    }
    function post(Request $req) 
    {
        $check = 0;
        $todayDate = date("Y-m-d");
        $data = Post::orderBy('id','desc')->first()->get();
        $id = $data[0]->id;
        if(Auth::check())
        {
            $count = subscription::where('user_id',$req->user()->id)->count();
            if($count  == 1)
            {
                $check = 1;
            }

        }
        else{
            $totalcount = Viewscount::where('ip',$req->ip())->where('viewdate',$todayDate)->where('user_id',null)->count();
            if($totalcount >= 5){
                $viewedpost = Viewscount::where('ip',$req->ip())->where('viewdate',$todayDate)->where('post_id',$id)->where('user_id',null)->count();
                if($viewedpost == 1)
                {   
                    $data = Post::find($id);
                    return view('frontend.post',['collection'=>$data]);
                } 
                return redirect('/plans');
            }
            else{
                $checkpost = Viewscount::where('post_id',$id)->where('ip',$req->ip())->where('viewdate',$todayDate)->where('user_id',null)->count();
                if($checkpost == 0){
                    Post::find($id)->increment('views');
                    $view = new Viewscount;
                    $view->ip = $req->ip();
                    if(Auth::check())
                    {
                        $view->user_id = $req->user()->id;
                    }
                    $view->post_id = $id;
                    $view->viewdate = $todayDate;
                    $view->save();
                    $data = Post::find($id);   

                    if($data->user_id != 0){
                        $clubpoint = Clubpoint::first();
                        $id = UsersClubpoint::where('user_id',$data->user_id)->get();
                        $usersclubpoint = UsersClubpoint::find($id[0]->id);
                        $usersclubpoint->points += $clubpoint->view;
                        $usersclubpoint->save();
                    }
                    return view('frontend.post',['collection'=>$data]);
                }
                else{
                    $data = Post::find($id);    
                    return view('frontend.post',['collection'=>$data]);
                }
            }
        }
        if($check == 1)
        {
            $checkpost = Viewscount::where('post_id',$id)->where('user_id',$req->user()->id)->where('viewdate',$todayDate)->count();
            if($checkpost == 0){
                Post::find($id)->increment('views');
                    $view = new Viewscount;
                    $view->ip = $req->ip();
                    $view->user_id = $req->user()->id;
                    $view->post_id = $id;
                    $view->viewdate = $todayDate;
                    $view->save();
                    $data = Post::find($id);   
                    if($data->user_id != 0){
                        $clubpoint = Clubpoint::first();
                        $id = UsersClubpoint::where('user_id',$data->user_id)->get();
                        $usersclubpoint = UsersClubpoint::find($id[0]->id);
                        $usersclubpoint->points += $clubpoint->view;
                        $usersclubpoint->save();
                    }
                    return view('frontend.post',['collection'=>$data]);
            }
            else{
                $data = Post::find($id);   
                return view('frontend.post',['collection'=>$data]);
            }
        }
        else{
            $totalcount = Viewscount::where('ip',$req->ip())->where('viewdate',$todayDate)->where('user_id',$req->user()->id)->count();
            if($totalcount >= 5){
                $viewedpost = Viewscount::where('ip',$req->ip())->where('viewdate',$todayDate)->where('post_id',$id)->count();
                if($viewedpost == 1)
                {
                    $data = Post::find($id);   
                    return view('frontend.post',['collection'=>$data]);
                } 
                return redirect('/plans');
            }
            else{
                $checkpost = Viewscount::where('post_id',$id)->where('ip',$req->ip())->where('viewdate',$todayDate)->where('user_id',$req->user()->id)->count();
                if($checkpost == 0){
                    Post::find($id)->increment('views');
                    $view = new Viewscount;
                    $view->ip = $req->ip();
                    if(Auth::check())
                    {
                        $view->user_id = $req->user()->id;
                    }
                    $view->post_id = $id;
                    $view->viewdate = $todayDate;
                    $view->save();
                    $data = Post::find($id);   
                    if($data->user_id != 0){
                        $clubpoint = Clubpoint::first();
                        $id = UsersClubpoint::where('user_id',$data->user_id)->get();
                        $usersclubpoint = UsersClubpoint::find($id[0]->id);
                        $usersclubpoint->points += $clubpoint->view;
                        $usersclubpoint->save();
                    }
                    return view('frontend.post',['collection'=>$data]);
                }
                else{
                    $data = Post::find($id);    
                    return view('frontend.post',['collection'=>$data]);
                }
            }
        }
    }

    function postmain(Request $req,$id)
    {
        $check = 0;
        $todayDate = date("Y-m-d");
        if(Auth::check())
        {
            $count = subscription::where('user_id',$req->user()->id)->count();
            if($count  == 1)
            {
                $check = 1;
            }

        }
        else{
            $totalcount = Viewscount::where('ip',$req->ip())->where('viewdate',$todayDate)->where('user_id',null)->count();
            if($totalcount >= 5){
                $viewedpost = Viewscount::where('ip',$req->ip())->where('viewdate',$todayDate)->where('post_id',$id)->where('user_id',null)->count();
                if($viewedpost == 1)
                {   
                    $data = Post::find($id);
                    return view('frontend.post',['collection'=>$data]);
                } 
                return redirect('/plans');
            }
            else{
                $checkpost = Viewscount::where('post_id',$id)->where('ip',$req->ip())->where('viewdate',$todayDate)->where('user_id',null)->count();
                if($checkpost == 0){
                    Post::find($id)->increment('views');
                    $view = new Viewscount;
                    $view->ip = $req->ip();
                    if(Auth::check())
                    {
                        $view->user_id = $req->user()->id;
                    }
                    $view->post_id = $id;
                    $view->viewdate = $todayDate;
                    $view->save();
                    $data = Post::find($id);   

                    if($data->user_id != 0){
                        $clubpoint = Clubpoint::first();
                        $id = UsersClubpoint::where('user_id',$data->user_id)->get();
                        $usersclubpoint = UsersClubpoint::find($id[0]->id);
                        $usersclubpoint->points += $clubpoint->view;
                        $usersclubpoint->save();
                    }
                    return view('frontend.post',['collection'=>$data]);
                }
                else{
                    $data = Post::find($id);    
                    return view('frontend.post',['collection'=>$data]);
                }
            }
        }
        if($check == 1)
        {
            $checkpost = Viewscount::where('post_id',$id)->where('user_id',$req->user()->id)->where('viewdate',$todayDate)->count();
            if($checkpost == 0){
                Post::find($id)->increment('views');
                    $view = new Viewscount;
                    $view->ip = $req->ip();
                    $view->user_id = $req->user()->id;
                    $view->post_id = $id;
                    $view->viewdate = $todayDate;
                    $view->save();
                    $data = Post::find($id);   
                    if($data->user_id != 0){
                        $clubpoint = Clubpoint::first();
                        $id = UsersClubpoint::where('user_id',$data->user_id)->get();
                        $usersclubpoint = UsersClubpoint::find($id[0]->id);
                        $usersclubpoint->points += $clubpoint->view;
                        $usersclubpoint->save();
                    }
                    return view('frontend.post',['collection'=>$data]);
            }
            else{
                $data = Post::find($id);   
                return view('frontend.post',['collection'=>$data]);
            }
        }
        else{
            $totalcount = Viewscount::where('ip',$req->ip())->where('viewdate',$todayDate)->where('user_id',$req->user()->id)->count();
            if($totalcount >= 5){
                $viewedpost = Viewscount::where('ip',$req->ip())->where('viewdate',$todayDate)->where('post_id',$id)->count();
                if($viewedpost == 1)
                {
                    $data = Post::find($id);   
                    return view('frontend.post',['collection'=>$data]);
                } 
                return redirect('/plans');
            }
            else{
                $checkpost = Viewscount::where('post_id',$id)->where('ip',$req->ip())->where('viewdate',$todayDate)->where('user_id',$req->user()->id)->count();
                if($checkpost == 0){
                    Post::find($id)->increment('views');
                    $view = new Viewscount;
                    $view->ip = $req->ip();
                    if(Auth::check())
                    {
                        $view->user_id = $req->user()->id;
                    }
                    $view->post_id = $id;
                    $view->viewdate = $todayDate;
                    $view->save();
                    $data = Post::find($id);   
                    if($data->user_id != 0){
                        $clubpoint = Clubpoint::first();
                        $id = UsersClubpoint::where('user_id',$data->user_id)->get();
                        $usersclubpoint = UsersClubpoint::find($id[0]->id);
                        $usersclubpoint->points += $clubpoint->view;
                        $usersclubpoint->save();
                    }
                    return view('frontend.post',['collection'=>$data]);
                }
                else{
                    $data = Post::find($id);    
                    return view('frontend.post',['collection'=>$data]);
                }
            }
        }
    }

   
    function tag_blog($tag)
    {
        $data = Post::where('tags','like','%'.$tag.'%')->paginate(4);
        return view('frontend.blog',['collection'=>$data,'name'=>$tag]);
    }
}
