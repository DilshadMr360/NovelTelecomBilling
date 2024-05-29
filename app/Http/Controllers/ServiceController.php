<?php

namespace App\Http\Controllers;

use App\Models\AccountService;
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
    public function getaservicedetails($phonenumber, $accountId)
    {
        try {
            $data = AccountService::getdataview($phonenumber, $accountId);
            $new = "new";
            return response()->json(['data' => $data, 'new' => $new]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
