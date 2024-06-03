<?php

namespace App\Imports;

use App\Models\AccountService;
use App\Models\ServiceSummary;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ServiceSummaryImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // dd($row);
        // Retrieve contact_code based on service_number
        $accountService = AccountService::where('phonenumber', $row['service_number'])->first();

        // Check if contact_code exists for the service_number
        if ($accountService) {
            $servicesummary = [
                'cost_centre' => $row['cost_centre'],
                'service_number' => $row['service_number'],
                'service_narrative' => $row['service_narrative'],
                'service_type' => $row['service_type'],
                'total_charges' => $this->formatTax($row['total_charges_ex_tax']),
                'total_usage' => $this->formatTax($row['total_usage_ex_tax']),
                'total' => $this->formatTax($row['total_ex_tax']),
                'contact_code' => $accountService->id // Ensure we're using the correct field
            ];
    
            // Create ServiceSummary model
            return new ServiceSummary($servicesummary);
        } else {
            // If contact_code is not found, log the error or handle it appropriately
            Log::warning('Service number not found in account_services table', ['service_number' => $row['service_number']]);
            return null;
        }    
    }
    private function formatTax($value)
    {
        // Example: convert to float and format to 2 decimal places
        return number_format((float)$value, 2, '.', '');
    }
}
