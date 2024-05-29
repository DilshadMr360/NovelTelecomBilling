<?php

namespace App\Imports;

use App\Models\ServiceSummary;
use App\Models\AccountService;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ServiceSummaryImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Retrieve contact_code based on service_number
        $accountService = AccountService::where('phonenumber', $row['service_number'])->first();

        // Check if contact_code exists for the service_number
        if ($accountService && $accountService->contact_code) {
            $servicesummary = [
                'cost_centre' => $row['cost_centre'] ,
                'service_number' => $row['service_number'],
                'service_narrative' => $row['service_narrative'],
                'service_type' => $row['service_type'] ,
                'total_charges' => $row['total_charges'] ,
                'total_usage' => $row['total_usage'] ,
                'total' => $row['total'],
                'contact_code' => $accountService->contact_code
            ];

            // Create ServiceSummary model
            return new ServiceSummary($servicesummary);
        } else {
            // If contact_code is not found, return null to skip adding the data
            return null;
        }
    }
}
