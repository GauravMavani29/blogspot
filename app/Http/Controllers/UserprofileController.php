<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserprofileController extends Controller
{
    //
    function createprofile()
    {
        return view('frontend.profile.create');
    }
}
