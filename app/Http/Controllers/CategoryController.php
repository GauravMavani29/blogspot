<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        //
        $data = Category::all();
        return view('backend.category.index',['collection'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $req)
    {
        $req->validate([
            'title'=>'required',
            'detail'=>'required'
        ]);

        if($req->hasFile('cat_image'))
        {
            $image = $req->file('cat_image');
            $reImage = time().'.'.$image->getClientoriginalExtension();
            $dest = public_path('/Images');
            $image->move($dest,$reImage);
        }
        $category = new Category;

        $category->title = $req->title;
        $category->detail = $req->detail;
        $category->image = $reImage;
        $category->save();

        return redirect('/admin/category/create')->with('success','Data has been added');
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
        //
        $data = Category::find($id);
        return view('backend.category.update',['collection'=>$data]);
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
            'detail'=>'required'
        ]);

        if($req->hasFile('cat_image'))
        {
            $image = $req->file('cat_image');
            $reImage = time().'.'.$image->getClientoriginalExtension();
            $dest = public_path('/Images');
            $image->move($dest,$reImage);
        }
        else{
            $reImage = $req->cur_image;
        }
        $category = Category::find($id);

        $category->title = $req->title;
        $category->detail = $req->detail;
        $category->image = $reImage;
        $category->save();

        return redirect('/admin/category/'.$id.'/edit')->with('success','Data has been Updated');
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
        Category::find($id)->delete();
        return redirect('admin/category');
    }
}
