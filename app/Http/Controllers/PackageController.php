<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageOption;
use Illuminate\Http\Request;

use App\Models\Account;
use App\Models\AccountService;
use Exception;
use Illuminate\Support\Facades\Log;

class PackageController extends Controller
{

    // public function package_index(){

    //     $packages=Package::all();
    //     $packageoptions=PackageOption::all();
    //     return view('Service.modal',compact('packages','packageoptions'));

    // }
    public function getPackages()

    { 
        

  
        // return response()->json($packages);
        try {
            // Retrieve packages from the database or any other data source
            $packages = Package::all(); // Example query to retrieve all packages
            //  TODO GET SUB PACKEGES
            return response()->json($packages);
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error fetching packages: ' . $e->getMessage());
            // Return a 500 Internal Server Error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function getPackageOption(Request $request){

        $package_id = $request->input('package_id');

        $packageOptions = PackageOption::where('package_id', $package_id)->get();

        return response()->json($packageOptions->all());
        // return response()->json($request);
    }

    public function storeAccountService(Request $request)
    {
        // dd($request);
        try {
            $validatedData = $request->validate([
                'contact_code' => 'required',
                'service_id' => 'required',
                'package_id' => 'required',
                'packageoption_id' => 'required',
                'network' => 'required',
                'service_type' => 'required',
                'phonenumber' => 'required',
                'status' => 'required',
                'dob' => 'required|date',
                'password' => 'required',
                'parent' => 'required',
                'dealer' => 'required',
                'costcentre' => 'required'
            ]);

            $account = Account::where('contact_code', $validatedData['contact_code'])->first();

            if ($account) {
                $accountService = new AccountService();
                $accountService->fill($validatedData);
                $accountService->save();

                return response()->json(['message' => 'Account service created successfully'], 201);
            } else {
                return response()->json(['error' => 'Account not found'], 404);
            }
        } catch (\Exception $e) {
            Log::error('Error creating account service: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
   

}
