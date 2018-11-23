<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;

class UserController extends Controller
{
    public function profile(Request $request){
        dump(Auth::user()->name);
    }
}
