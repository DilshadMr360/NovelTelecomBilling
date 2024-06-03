<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;

class ContractController extends Controller
{
    public function updateContract(Request $request)
    {
        // Validate the incoming request if necessary

        // Find the contract by ID
        $contract = Contract::find($request->id);

        // Update the contract attributes with the values from the request
        $contract->contract = $request->contract;
        $contract->contract_start_date = $request->contract_start_date;
        $contract->contract_end_date = $request->contract_end_date;
        $contract->contact__number = $request->contract_number;
        $contract->sales_person = $request->salesperson;
        $contract->created_at = $request->createddate;
        $contract->created_by = $request->createdby;

        // Save the updated contract
        $contract->save();

        // Optionally redirect or return a success response
        return redirect()->back()->with('success', 'Contract updated successfully.');
    }
}
