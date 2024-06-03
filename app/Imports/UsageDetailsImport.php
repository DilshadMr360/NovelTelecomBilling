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

    private function transformDate($excelDate)
    {
        // Excel's date system starts from 1900-01-01, so we add the number of days to that date.
        $unixDate = ($excelDate - 25569) * 86400; // Convert Excel date to Unix timestamp
        return gmdate("Y-m-d", $unixDate); // Format the Unix timestamp to a date
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

    private function transformCustomToGeneral($value)
    {
        // Remove any currency symbols or other formatting characters
        $value = preg_replace('/[^0-9.-]/', '', $value);
        
        // Convert to float if the value is numeric
        if (is_numeric($value)) {
            return (float) $value;
        }

        return $value;
    }

    private function transformQuantity($quantity)
    {
        $seconds = $quantity * 86400; // Total seconds in a day
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds / 60) % 60);
        $seconds = $seconds % 60;
        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }
    public function model(array $row)
    {

        // Retrieve contact_code based on service_number
        $accountService = AccountService::where('phonenumber', $row['service_number'])->first();
    
        // Check if contact_code exists for the service_number
        if ($accountService && $accountService->contact_code) {
            // dd($accountService->contact_code);
            try {
                $fromDate = $this->transformDate($row['date']);
                $fromTime = $this->transformTime($row['time']);
    
               if ($fromDate === false || $fromTime === false) {
                    throw new Exception('Invalid date or time format');
                } 
    
                $quantity = $this->transformQuantity($row['quantity']); 
                $nonDiscountedPrice = $this->transformCustomToGeneral($row['non_discounted_price_ex_tax']);
                $discountedPrice = $this->transformCustomToGeneral($row['discounted_price_ex_tax']);
    
                // Log transformed values for debugging
                Log::info('Transformed values', [
                    'quantity' => $quantity,
                    'non_discounted_price' => $nonDiscountedPrice,
                    'discounted_price' => $discountedPrice,
                ]);
    
                $usagedetails = [
                    'cost_centre' => $row['cost_centre'],
                    'service_number' => $row['service_number'],
                    'service_narrative' => $row['service_narrative'],
                    'service_type' => $row['service_type'],
                    'date' => $fromDate,
                    'time' => $fromTime,
                    'number_called' => $row['number_called'],
                    'quantity' => $quantity,
                    'quantity_type' => $row['quantity_type'],
                    'rate_period' => $row['rate_period'],
                    'non_discounted_price_(ex_tax)' => $nonDiscountedPrice,
                    'discounted_price_(ex_tax)' => $discountedPrice,
                    'tax_free' => $row['tax_free'],
                    'usage_type' => $row['usage_type'],
                    'usage_description' => $row['usage_description'],
                    'contact_code' => $accountService->id
                ];
                
                return new UsageDetails($usagedetails);
    
            } catch (Exception $e) {
                // Add invalid row to the list
                $this->invalidRows[] = $row;
                Log::error("Error processing row: " . json_encode($row) . " - " . $e->getMessage());
                return null;
            }
        } else {
            // Log the invalid service_number
            Log::error("Invalid service_number: " . $row['service_number']);
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
