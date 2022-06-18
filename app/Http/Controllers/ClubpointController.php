<?php

namespace App\Http\Controllers;
use App\Models\Clubpoint;
use App\Models\redeem;
use Illuminate\Http\Request;
use Mail;
class ClubpointController extends Controller
{
    //
    function index()
    {
        $data = Clubpoint::first();
        return view('backend.clubpoints.index',['collection'=>$data]);
    }
    function save_clubpoints(Request $req)
    {
        $req->validate([
            'view'=>'required', 
            'comment'=>'required',
        ]);

        $countdata = Clubpoint::count();
        if($countdata == 0)
        {
            $setting = new Clubpoint;
            $setting->view = $req->view;
            $setting->comment = $req->comment;
            $setting->save();
        }else{
            $firstdata = Clubpoint::first();
            $setting = Clubpoint::find($firstdata->id);
            $setting->view = $req->view;
            $setting->comment = $req->comment;
            $setting->save();
        }

        return redirect('admin/clubpoints')->with('success','Clubpoints Update Successfully!!');

    }

    function users_point(){
        $data = redeem::where('status',1)->get();
        return view('backend.clubpoints.users_clubpoint',["collection"=>$data]);
    }

    function approve(Request $req,$id){
       $data = redeem::find($id);
       $data->status = 0;
       $data->Save();
       $emaildata = [
        'subject' => 'Redeem Payment Status',
        'name' => 'BlogSpot',
        'email' => $data->email,
        'content' => 'Your Redeem Payment Request has been approved in case of any queries you can reply to this mail gauravmavani29@gmail.com'
      ];

      Mail::send('email-template', $emaildata, function($message) use ($emaildata) {
        $message->to($emaildata['email'])
        ->subject($emaildata['subject']);
      });

       return redirect("admin/users_point")->with("approve","Redeem approval successfully");
    }

    function disapprove(Request $req,$id){
        $data = redeem::find($id);
        redeem::find($id)->delete();
        $emaildata = [
            'subject' => 'Redeem Payment Status',
            'name' => 'BlogSpot',
            'email' => $data->email,
            'content' => 'Your Redeem Payment Request has been dispproved beacause of invalid data or lack of information in case of any queries you can reply to this mail gauravmavani29@gmail.com'
          ];
    
          Mail::send('email-template', $emaildata, function($message) use ($emaildata) {
            $message->to($emaildata['email'])
            ->subject($emaildata['subject']);
          });
        return redirect("admin/users_point")->with("disapprove","Redeem disapproval successfully");
    }
}
