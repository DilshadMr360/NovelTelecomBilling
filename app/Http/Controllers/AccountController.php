<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account_index(){
        return view('account.newAccount');
    }
}
