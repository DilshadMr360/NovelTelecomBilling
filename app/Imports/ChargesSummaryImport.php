<?php

namespace App\Imports;

use App\Models\ChargesSummary;
use App\Models\AccountService;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Exception;
use Illuminate\Support\Facades\Log;

class ChargesSummaryImport implements ToModel, WithHeadingRow
{
    protected $invalidRows = [];

    private function transformDate($date)
    {
        if (\DateTime::createFromFormat('j/m/Y', $date) !== false) {
            return \DateTime::createFromFormat('j/m/Y', $date)->format('Y-m-d');
        }
        return false;
    }

    public function model(array $row)
    {
        
        // Retrieve contact_code based on service_number
        $accountService = AccountService::where('phonenumber', $row['service_number'])->first();

        // Check if contact_code exists for the service_number
        if ($accountService) {
            try {
                $fromDate = $this->transformDate($row['from']);
                $toDate = $this->transformDate($row['to']);

                if ($fromDate === false || $toDate === false) {
                    throw new Exception('Invalid date format');
                }

                $chargesummary = [
                    'cost_centre' => $row['cost_centre'],
                    'service_number' => $row['service_number'],
                    'service_narrative' => $row['service_narrative'],
                    'service_type' => $row['service_type'],
                    'charge_group' => $row['charge_group'],
                    'charge_description' => $row['charge_description'],
                    'from' => $fromDate,
                    'to' => $toDate,
                    'charge_amount' => $this->formatTax($row['charge_amount_ex_tax']),
                    'contact_code' => $accountService->id
                ];

                // Create ChargesSummary model
                return new ChargesSummary($chargesummary);

            } catch (Exception $e) {
                // Add invalid row to the list
                $this->invalidRows[] = $row;
                Log::warning('Invalid row encountered', ['row' => $row, 'error' => $e->getMessage()]);
                return null;
            }
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

    public function getInvalidRows()
    {
        return $this->invalidRows;
    }

    public function displayErrors()
    {
        if (!empty($this->invalidRows)) {
            echo 'Some rows have invalid data:';
            foreach ($this->invalidRows as $row) {
                echo 'Invalid row: ' . json_encode($row) . PHP_EOL;
            }
        } else {
            echo 'All rows processed successfully.';
        }
    }
}
