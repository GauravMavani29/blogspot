<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Image;
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
    function post() 
    {
        if(Post::orderBy('id','desc')->first())
        {
            Post::orderBy('id','desc')->first()->increment('views');
        }
        $data = Post::orderBy('id','desc')->first();
        return view('frontend.post',['collection'=>$data]);
    }

    function postmain($id)
    {
        Post::find($id)->increment('views');
        $data = Post::find($id);   
        return view('frontend.post',['collection'=>$data]);
    }

   
    function tag_blog($tag)
    {
        $data = Post::where('tags','like','%'.$tag.'%')->paginate(4);
        return view('frontend.blog',['collection'=>$data,'name'=>$tag]);
    }
}
