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

    public function getPackageOption(Request $request)
    {

        $package_id = $request->input('package_id');

        $packageOptions = PackageOption::where('package_id', $package_id)->get();

        return response()->json($packageOptions->all());
        // return response()->json($request);
    }




    // public function storeAccountService(Request $request)
    // {
    //     try {
    //         $accountNumber = session('account_number');
    //         $validatedData = $request->validate([
    //             'network' => 'required',
    //             'service_id' => 'required',
    //             'phonenumber' => 'required',
    //             'status' => 'required',
    //             'dob' => 'required',
    //             'service_narrative' => 'required',
    //             'costcentre' => 'required',
    //             'password' => 'required',
    //             'parent' => 'required',
    //             'package_id' => 'required',
    //             'serviceoption_id'=>'required',
    //             'packageoption_id' => 'required',
    //             'dealer' => 'required'
    //         ]);

    //         // $data = AccountService::setData($accountNumber, $validatedData);
    //         // dd($accountNumber);

    //         $account = Account::where('id', $accountNumber)->first();
    //         // dd($account);
    //         if ($account) {
    //             // $accountService = new AccountService();
    //             // $accountService->fill($validatedData);
    //             // $accountService->save();
    //             $data = AccountService::setData($accountNumber, $validatedData);

    //             return redirect()->back();
    //         } else {
    //             return response()->json(['error' => 'Account not found'], 404);
    //         }
    //     } catch (\Exception $e) {

    //         Log::error('Error creating account service: ' . $e->getMessage());
    //         return response()->json(['error' => $e], 500);
    //     }
    //     // Redirect to the service page with a success message
    //     return redirect()->route('service_newservice')->with('success', 'Service saved successfully!');
    // }






    public function getPackageDetails($serviceId)
    {
        // Fetch package details based on the service_id
        $package = Package::where('service_id', $serviceId)->get();

        if ($package) {
            return response()->json($package);
        } else {
            return response()->json(['error' => 'Package options not found'], 404);
        }
    }
    public function getPackageOptions($packageId)
    {
        $packageOptions = PackageOption::where('package_id', $packageId)->get();

        if ($packageOptions->isEmpty()) {
            return response()->json(['error' => 'Package options not found'], 404);
        }

        return response()->json($packageOptions);
    }

}
