<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Image;
class UserpostController extends Controller
{
    //
    function addpost()
    {
        $collection = Category::all();
        return view('frontend.post.addpost',['collection'=>$collection]);
    }
    function editpost($id)
    {
        $category = Category::all();
        $data = Post::find($id);
        return view('frontend.post.updatepost',['data'=>$data,'Category'=>$category]);
    }

    function savepost(Request $req)
    {
        $req->validate([
            'title'=>'required',
            'detail'=>'required',
            'tags'=>'required',
            'post_thumb'=>'dimensions:min_width=500,min_height=350',
            'post_image'=>'dimensions:min_width=750,min_height=470'
        ]);

        if($req->has('post_thumb'))
        {
            $image = $req->file('post_thumb');
            $reThumbImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('./Post images/Thumbnail');
            // $image->move($dest,$reThumbImage);
            $img = Image::make($image->path());
            $img->resize(500, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($dest.'/'.$reThumbImage);
        }

        if($req->has('post_image'))
        {
            $image = $req->file('post_image');
            $rePostImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('./Post images/Main Images');
            // $image->move($dest,$rePostImage);
            $img = Image::make($image->path());
            $img->resize(750, 470, function ($constraint) {
                $constraint->aspectRatio();
            })->save($dest.'/'.$rePostImage);
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


    function updatepost(Request $req,$id)
    {
        $req->validate([
            'title'=>'required',
            'detail'=>'required',
            'tags'=>'required',
            'post_thumb'=>'dimensions:min_width=500,min_height=350',
            'post_image'=>'dimensions:min_width=750,min_height=470'
        ]);

        if($req->has('post_thumb'))
        {
            $image = $req->file('post_thumb');
            $reThumbImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('./Post images/Thumbnail');
            // $image->move($dest,$reThumbImage);
            $img = Image::make($image->path());
            $img->resize(500, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($dest.'/'.$reThumbImage);
        }
        else{
            $reThumbImage = $req->cur_thumbimage;
        }

        if($req->has('post_image'))
        {
            $image = $req->file('post_image');
            $rePostImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('./Post images/Main Images');
            // $image->move($dest,$rePostImage);
            $img = Image::make($image->path());
            $img->resize(750, 470, function ($constraint) {
                $constraint->aspectRatio();
            })->save($dest.'/'.$rePostImage);
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


    function deletepost($id){
        $img = Post::where('id',$id)->select('thumb','full_img')->get();
        $thumbpath = "./Post images/Thumbnail/".$img[0]->thumb;
        $fullpath = "./Post images/Main Images/".$img[0]->full_img;

        if (file_exists($thumbpath)) {
            @unlink($thumbpath);
        }
        if (file_exists($fullpath)) {

            @unlink($fullpath);
     
        }
        Post::find($id)->delete();
        return redirect('frontend/post/managepost');
    }

    function managepost(Request $req)
    {
        $collection = Post::where('user_id',$req->user()->id)->rightJoin('categories','posts.cat_id','=','categories.id')->select('categories.title as cname','posts.*')->orderBy('posts.id','desc')->get();
        return view('frontend.post.managepost',['collection'=>$collection]);
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
            $data = Comment::where([['post_id',$id],['user_id',$req->user()->id()]])->get();
            return view('frontend.post.postcomment',["collection"=>$data]);
        }
        else{
            return view('frontend.page.pageerror');
        }
    }
}
