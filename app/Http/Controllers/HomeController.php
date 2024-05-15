<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $account=null;
        return view ('user.home',compact('account'));
    }
    
}
