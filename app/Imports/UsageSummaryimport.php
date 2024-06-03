<?php

namespace App\Imports;

use App\Models\AccountService;
use App\Models\UsageSummary;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsageSummaryImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        $contact_code = AccountService::where('phonenumber', $row['service_number'])->first();
        // dd($contact_code);
        if ($contact_code) {
            $usageData = [
                'contact_code' => $contact_code->contact_code,
                'phonenumber' => $row['service_number'],
                'service_narrative' => $row['service_narrative'],
                'service_types' => $row['service_type'],
                'cost_center' => $row['cost_centre'],
                'mobilecalls_tax' => $this->formatTax($row['mobile_calls_ex_tax']),
                'nationalcalls_tax' => $this->formatTax($row['national_calls_ex_tax']),
                'othercalls_tax' => $this->formatTax($row['other_calls_ex_tax']),
                'localcalls_tax' => $this->formatTax($row['local_calls_ex_tax']),
                'incomingcalls_tax' => $this->formatTax($row['incoming_1300_calls_ex_tax']),
                'discount_tax' => $this->formatTax($row['discount_ex_tax']),
                'total_tax' => $this->formatTax($row['total_ex_tax']),
            ];
            return new UsageSummary($usageData);
        }

        return null;
    }

    private function formatTax($value)
    {
        // Example: convert to float and format to 2 decimal places
        return number_format((float)$value, 2, '.', '');
    }
}
