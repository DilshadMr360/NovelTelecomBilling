<?php

namespace App\Imports;

use App\Models\AccountService;
use App\Models\UsageDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Exception;
use Illuminate\Support\Facades\Log;

class UsageDetailsImport implements ToModel, WithHeadingRow
{
    protected $invalidRows = [];

    private function transformDate($date)
    {
        $dateTime = \DateTime::createFromFormat('d/m/Y', $date);
        return $dateTime ? $dateTime->format('Y-m-d') : false;
    }

    private function transformTime($time)
    {
        // Handle Excel time as a float
        if (is_numeric($time)) {
            $totalSeconds = $time * 86400; // Total seconds in a day
            $hours = floor($totalSeconds / 3600);
            $minutes = floor(($totalSeconds / 60) % 60);
            $seconds = $totalSeconds % 60;
            return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
        }

        // Check for AM/PM and convert to 24-hour format
        $dateTime = \DateTime::createFromFormat('h.i.s A', $time);
        if ($dateTime) {
            return $dateTime->format('H:i:s');
        } else {
            // Attempt to create from other possible formats
            $dateTime = \DateTime::createFromFormat('H:i:s', $time);
            if ($dateTime) {
                return $dateTime->format('H:i:s');
            } else {
                Log::error("Invalid time format: $time");
                return false;
            }
        }
    }

    public function model(array $row)
    {

        // Retrieve contact_code based on service_number
        $accountService = AccountService::where('phonenumber', $row['service_number'])->first();

        // Check if contact_code exists for the service_number
        if ($accountService && $accountService->contact_code) {
            try {
                $fromDate = $this->transformDate($row['date']);
                $fromTime = $this->transformTime($row['time']);

                // dd($fromTime);
                if ($fromDate === false || $fromTime === false) {
                    throw new Exception('Invalid date or time format');
                }

                $usagedetails = [
                    'cost_centre' => $row['cost_centre'],
                    'service_number' => $row['service_number'],
                    'service_narrative' => $row['service_narrative'],
                    'service_type' => $row['service_type'],
                    'date' => $fromDate,
                    'time' => $fromTime,
                    'number_called' => $row['number_called'],
                    'quantity' => $row['quantity'],
                    'quantity_type' => $row['quantity_type'],
                    'rate_period' => $row['rate_period'],
                    'non_discounted_price_(ex_tax)' => $row['non_discounted_price_ex_tax'],
                    'discounted_price_(ex_tax)' => $row['discounted_price_ex_tax'],
                    'tax_free' => $row['tax_free'],
                    'usage_type' => $row['usage_type'],
                    'usage_description' => $row['usage_description'],
                    'contact_code' => $accountService->contact_code
                ];

                // Create UsageDetails model
                return new UsageDetails($usagedetails);

            } catch (Exception $e) {
                // Add invalid row to the list
                $this->invalidRows[] = $row;
                return null;
            }
        } else {
            // If contact_code is not found, return null to skip adding the data
            return null;
        }
    }

    public function getInvalidRows()
    {
        return $this->invalidRows;
    }

    public function displayErrors()
    {
        if (!empty($this->invalidRows)) {
            echo 'Some rows have invalid date or time formats:';
            foreach ($this->invalidRows as $row) {
                echo 'Invalid row: ' . json_encode($row) . PHP_EOL;
            }
        } else {
            echo 'All rows processed successfully.';
        }
    }
}
