<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\AccountService;
use Exception;
use Illuminate\Support\Facades\Log;

class AccountServiceController extends Controller
{
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

            return response()->json(['success' => true, 'message' => 'Data updated successfully.']);
        } catch (AccountService $e) {
            return response()->json(['success' => false, 'message' => 'Account service not found.'], 404);
        } catch (\Exception $e) {
            Log::error('Error updating account service: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred while updating the data.'], 500);
        }
    }
}
