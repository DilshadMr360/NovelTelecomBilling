<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account_index(Request $request){
        // dd($request);
        return view('account.newAccount');
    }
}
