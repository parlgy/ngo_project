<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Userlogin extends Controller
{
    function userlogin(Request $req){
        
    }
    function registration(Request $req){
        $user = new User;
        $user->firstname = $req->firstname;
        $user->lastname = $req->lastname;
        $user->email = $req->email;
        $user->password =$req->password;
        $user->save();
        return redirect('login');
    }
}
