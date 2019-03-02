<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\User;

class UserController extends Controller
{
    public function profile(Request $request, $username){

        $foundUser = User::where('username',$username)->firstOrFail();

        $self = $foundUser->id === Auth::id();



        return view('users.profile',['user'=>$foundUser,'self'=>$self]);
    }

    public function indexNotifications(Request $request){
        return "Notifcations index";
    }
}
