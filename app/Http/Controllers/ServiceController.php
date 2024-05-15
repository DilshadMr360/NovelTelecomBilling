<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceOption;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service_index(){
       
        $services=Service::all();
        $serviceoptions=ServiceOption::all();
        return view('Service.newservice',compact('services','serviceoptions'));
        
    }
}
