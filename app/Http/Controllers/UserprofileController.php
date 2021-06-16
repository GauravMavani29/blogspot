<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Comment;
use App\Models\UsersClubpoint;
use Image;
class UserprofileController extends Controller
{
    //
    public function index(Request $req)
    {
        $data = Profile::where('user_id',$req->user()->id)->get();
        $post = Post::where('user_id',$req->user()->id)->count();
        $comment = Comment::where('user_id',$req->user()->id)->count();
        $points = Usersclubpoint::where('user_id', $req->user()->id)->get('points')[0]->points;
        return view('frontend.profile.index',['collection'=>$data,'post'=>$post,'comment'=>$comment,'points'=>$points]);
    }
    public function create()
    {
        return view('frontend.profile.create');
    }

    function store(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'fullname'=>'required',
            'profileimg'=>'required',
            'mobileno'=>'required|digits:10',
            'address'=>'required',
            'birthdate'=>'required',
            'github'=>'required',
            'twitter'=>'required',
            'instagram'=>'required',
            'facebook'=>'required',
        ]);
        if($req->has('profileimg')){
            $image = $req->file('profileimg');
            $dest = public_path('./frontend/img/profile');
            $reProfile = time() . '.' . $image->getClientOriginalExtension();
            // $image->move($dest,$reThumbImage);
            $img = Image::make($image->path());
            $img->resize(350, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($dest.'/'.$reProfile);
        }
        
        $profile = new Profile;
        $profile->user_id = $req->user()->id;
        $profile->username = $req->username;
        $profile->fullname = $req->fullname;
        $profile->profile = $reProfile;
        $profile->email = $req->user()->email;
        $profile->mno = $req->mobileno;
        $profile->address = $req->address;
        $profile->bdate = $req->birthdate;
        $profile->github = $req->github;
        $profile->twitter = $req->twitter;
        $profile->instagram = $req->instagram;
        $profile->facebook = $req->facebook;
        $profile->save();

        //usersclubpoint table
        $clubuser = new UsersClubpoint;

        $clubuser->user_id = $req->user()->id;
        $clubuser->points = 0;
        $clubuser->save();
        return redirect('/create/profile')->with('success','successfully profile created');
    }
}
