<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\AccountService;
use App\Models\Contract;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AccountServiceController extends Controller
{


    ///



    public function storeAccountService(Request $request)
    {

        try {
            $accountNumber = session('account_number');
            $validatedData = $request->validate([
                'network' => 'required',
                'service_id' => 'required',
                'phonenumber' => 'required',
                'status' => 'required',
                'dob' => 'required',
                'service_narrative' => 'required',
                'costcentre' => 'required',
                'password' => 'required',
                'parent' => 'required',
                'package_id' => 'required',
                'serviceoption_id'=>'required',
                'packageoption_id' => 'required',
                'dealer' => 'required'
            ]);

            // $data = AccountService::setData($accountNumber, $validatedData);
            // dd($accountNumber);

            $account = Account::where('id', $accountNumber)->first();
            //dd($account);
            if ($account) {

                // $accountService = new AccountService();
                // $accountService->fill($validatedData);
                // $accountService->save();
                $data = AccountService::setData($accountNumber, $validatedData);

                 // Retrieve the last account service ID
                 $lastAccountServiceId = AccountService::getLastAccountId();
                // dd($lastAccountServiceId);
                $user =  Auth::user();
                //dd($user);
                $contractData = [
                    'account_service_id' => $lastAccountServiceId,
                    'contract' => $request->contract,
                    'contract_start_date' => $request->contract_start_date,
                    'contract_end_date' => $request->contract_end_date,
                    'created_by' => $user->name,
                    'status' => $request->contract_status,
                ];
               

                $contract = Contract::create($contractData);

                return redirect()->back();
            } else {
                return response()->json(['error' => 'Account not found'], 404);
            }
        } catch (\Exception $e) {

            Log::error('Error creating account service: ' . $e->getMessage());
            return response()->json(['error' => $e], 500);
        }
        // Redirect to the service page with a success message
        return redirect()->route('service_newservice')->with('success', 'Service saved successfully!');
    }



    ///
    public function update(Request $request)
    {
        try {
            // Validate the incoming data
            $validatedData = $request->validate([
                // Define your validation rules for each field here
                'Phone Number' => 'required|string',
                'Service Narrative' => 'required|string',
                'Status' => 'required|string',
                'Date Connected' => 'required|date_format:Y-m-d',
                'Password' => 'required|string',
                'Package' => 'required|string',
                'Charge Override' => 'required|string',
                'Package Start' => 'required|date_format:Y-m-d',
                'Contract' => 'required|string',
                'Contract Start' => 'required|string',
                'Contract End' => 'required|string',
                'Service Owner' => 'required|string',
                'Port Authority Date' => 'required|string',
                'Order Number' => 'required|string',
                'IPND' => 'required|string',
                // Add validation rules for other fields as needed
            ]);


            // Find the account service by phone number
            $accountService = AccountService::where('phonenumber', $validatedData['Phone Number'])->firstOrFail();

            // Update the account service with validated data
            $accountService->update([
                // Update fields with validated data
                'service_narrative' => $request->input('Service Narrative'),
                'status' => $request->input('Status'),
                // 'date_connected' => $request->input('Date Connected'),
                'password' => $request->input('Password'),
                // 'package' => $request->input('Package'),
                // 'charge_override' => $request->input('Charge Override'),
                // 'package_start' => $request->input('Package Start'),
                'contract' => $request->input('Contract'),
                // /'status'=>$request->input('status'),
                // 'password'=>$request->input('password'),

                // Update other fields similarly
            ]);


             ///

             // Update the contract details
            //    $contractData = [
            //     'contract' => $request->input('Contract'),
            //     'contract_start_date' => $request->input('Contract Start'),
            //     'contract_end_date' => $request->input('Contract End'),
            //     'contract_status' => $request->input('Contract Status'),
            // ];

            // $contract = $accountService->contract;
            // if ($contract) {
            //     $contract->update($contractData);
            // } else {
            //     $contract = new Contract($contractData);
            //     $contract->account_service_id = $accountService->id;
            //     $contract->save();
            // }


             //ENd Update the contract details

            return response()->json(['success' => true, 'message' => 'Data updated successfully.']);
        } catch (AccountService $e) {
            return response()->json(['success' => false, 'message' => 'Account service not found.'], 404);
        } catch (\Exception $e) {
            Log::error('Error updating account service: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred while updating the data.'], 500);
        }
    }

    public function updateAccountService(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'accounServiceId' => 'required|integer|exists:account_services,id',
            'packageSelect' => 'required|integer',
            'packageoption_id' => 'required|integer',
        ]);

        // Find the account service by its ID
        $accountService = AccountService::find($validatedData['accounServiceId']);

        if ($accountService) {
            // Update the account service with the new package and package option
            $accountService->package_id = $validatedData['packageSelect'];
            $accountService->packageoption_id = $validatedData['packageoption_id'];
            $accountService->save();

            // Return a success response, e.g., redirect back with a success message
            return redirect()->back()->with('success', 'Account service updated successfully.');
        } else {
            // Return an error response if the account service was not found
            return redirect()->back()->with('error', 'Account service not found.');
        }
    }
}
