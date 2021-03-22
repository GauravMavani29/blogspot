<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
class HomeController extends Controller
{
    //
    function index()
    {
        return view('home');
    }

    function addpost()
    {
        $collection = Category::all();
        return view('frontend.post.addpost',['collection'=>$collection]);
    }

    function managepost(Request $req)
    {
        $collection = Post::where('user_id',$req->user()->id)->orderBy('id','desc')->get();
        return view('frontend.post.managepost',['collection'=>$collection]);
    }

    function editpost($id)
    {
        $category = Category::all();
        $data = Post::find($id);
        return view('frontend.post.updatepost',['data'=>$data,'Category'=>$category]);
    }

    function updatepost(Request $req,$id)
    {
        $req->validate([
            'title'=>'required',
            'detail'=>'required',
            'tags'=>'required',
            'post_thumb'=>'dimensions:min_width=540,min_height=540',
            'post_image'=>'dimensions:min_width=720,min_height=720'
        ]);

        if($req->has('post_thumb'))
        {
            $image = $req->file('post_thumb');
            $reThumbImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('./Post images/Thumbnail');
            $image->move($dest,$reThumbImage);
        }
        else{
            $reThumbImage = $req->cur_thumbimage;
        }

        if($req->has('post_image'))
        {
            $image = $req->file('post_image');
            $rePostImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('./Post images/Main Images');
            $image->move($dest,$rePostImage);
        }
        else{
            $rePostImage = $req->cur_postimage;
        }

        $post = Post::find($id);
        $post->user_id = $req->user()->id;
        $post->cat_id = $req->category;
        $post->title = $req->title;
        $post->thumb = $reThumbImage;
        $post->full_img = $rePostImage;
        $post->detail = $req->detail;
        $post->tags = $req->tags;
        $post->status = 1;
        $post->save();

        return redirect('frontend/post/editpost/'.$id)->with('success','Post Updated Successfully!!');
    }

    function savepost(Request $req)
    {
        $req->validate([
            'title'=>'required',
            'detail'=>'required',
            'tags'=>'required',
            'post_thumb'=>'dimensions:min_width=540,min_height=540',
            'post_image'=>'dimensions:min_width=720,min_height=720'
        ]);

        if($req->has('post_thumb'))
        {
            $image = $req->file('post_thumb');
            $reThumbImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('./Post images/Thumbnail');
            $image->move($dest,$reThumbImage);
        }

        if($req->has('post_image'))
        {
            $image = $req->file('post_image');
            $rePostImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('./Post images/Main Images');
            $image->move($dest,$rePostImage);
        }

        $post = new Post;
        $post->user_id = $req->user()->id;
        $post->cat_id = $req->category;
        $post->title = $req->title;
        $post->thumb = $reThumbImage;
        $post->full_img = $rePostImage;
        $post->detail = $req->detail;
        $post->tags = $req->tags;
        $post->status = 1;
        $post->save();

        return redirect('frontend/post/addpost')->with('success','Post Uploaded Successfully!!');
    }

    function deletepost($id){
        Post::find($id)->delete();
        return redirect('frontend/post/managepost');
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
        return view('frontend.blog',['collection'=>$data]);
    }

    function category_blog($id)
    {
        $data = Post::where('cat_id',$id)->paginate(4);
        return view('frontend.blog',['collection'=>$data]);
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

    function save_comment(Request $req,$id)
    {
        $data = new Comment;
        $data->user_id = $req->user()->id;
        $data->post_id = $id;
        $data->comment = $req->usercomment;
        $data->save();

        return redirect('frontend/post/'.$id)->with('success','Comment Added Successfully');
    }

    function all_comment(Request $req,$id)
    {
        // $data = Comment::where('post_id',$id)->where('user_id',$req->user()->id)->get();
        $userdata = Post::find($id);
        if(!$userdata)
        {
            return view('frontend.page.pageerror');
        }
        if($userdata->user_id == $req->user()->id)
        {
            $data = Comment::where([['post_id',$id],['user_id',$req->user()->id]])->get();
            return view('frontend.post.postcomment',["collection"=>$data]);
        }
        else{
            return view('frontend.page.pageerror');
        }
    }
}
