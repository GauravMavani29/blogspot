<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
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
        ]);

        if($req->has('post_thumb'))
        {
            $image = $req->file('post_thumb');
            $reThumbImage = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('./Post images/Thumbnail');
            $image->move($dest,$reThumbImage);
        }
        else{
            $reThumbImage = $req->cur_thumbimage;
        }

        if($req->has('post_image'))
        {
            $image = $req->file('post_image');
            $rePostImage = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('./Post images/Main Images');
            $image->move($dest,$rePostImage);
        }
        else{
            $rePostImage = $req->cur_postimage;
        }

        $post = Post::find($id);
        $post->user_id = 0;
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
        Post::find($id)->delete();
        return redirect('admin/post');
    }
}