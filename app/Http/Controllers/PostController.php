<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Post::all();
        return view('backend.post.index',['collection'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Category::all();
        return view('backend.post.add',['collection'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
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
        $post->user_id = 0;
        $post->cat_id = $req->category;
        $post->title = $req->title;
        $post->thumb = $reThumbImage;
        $post->full_img = $rePostImage;
        $post->detail = $req->detail;
        $post->tags = $req->tags;
        $post->save();

        return redirect('admin/post/create')->with('success','Post Uploaded Successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = Category::all();
        $data = Post::find($id);
        return view('backend.post.update',['data'=>$data, 'collection'=>$collection]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
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
            $reThumbImage = time().'.'.$image->getClientOriginalExtension();
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
            $rePostImage = time().'.'.$image->getClientOriginalExtension();
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
        $post->cat_id = $req->category;
        $post->title = $req->title;
        $post->thumb = $reThumbImage;
        $post->full_img = $rePostImage;
        $post->detail = $req->detail;
        $post->tags = $req->tags;
        $post->save();

        return redirect('admin/post/'.$id.'/edit')->with('success','Post Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $img = Post::where('id',$id)->select('thumb','full_img')->get();
        $thumbpath = "./Post images/Thumbnail/".$img[0]->thumb;
        $fullpath = "./Post images/Main Images/".$img[0]->full_img;

        if (file_exists($thumbpath)) {
            @unlink($thumbpath);
        }
        if (file_exists($fullpath)) {
            @unlink($fullpath);
        }
        Comment::where('post_id',$id)->delete();
        Post::find($id)->delete();
        return redirect('admin/post');
    }
}
