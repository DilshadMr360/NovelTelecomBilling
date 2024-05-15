<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountService extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_code', 'service_id', 'package_id', 'packageoption_id', 'network', 'phonenumber','service_narrative',
        'status', 'dob', 'password', 'parent', 'dealer', 'costcentre','serviceoption_id'
    ];

    public static function setData($accountNumber, $validatedData)
    {
        // dd($validatedData);
        // Find or create an AccountService based on the contact code
       // Merge the account number with the validated data
    $data = array_merge(['contact_code' => $accountNumber], $validatedData);

    // Create a new AccountService record
    $accountService = self::create($data);

    return $accountService;
    }

    
    public  function serviceoption(){
        return $this->belongsTo(ServiceOption::class, 'service_id');
    }

    public static function getPackage($contactCode)
    {
        return static::where('contact_code', $contactCode)->first();
    }

    public static function getData($contact_code)
    {
        // Eager load the serviceoption relationship
        $accountServices = static::with('serviceoption')->where('contact_code', $contact_code)->get();

        // Loop through the records to get the service name
        foreach ($accountServices as $accountService) {
            if ($accountService->serviceoption) {
                // Access the related ServiceOption model to get the service name
                $accountService->service_id = $accountService->serviceoption->service_names;
                // dd($accountService->serviceoption->service_names); // For debugging purposes
            } else {
                dd('ServiceOption not found for AccountService ID: ' . $accountService->id); // Debugging when serviceoption is null
            }
        }

        // Optionally return the collection instead of dd
        return $accountServices;
    }
}
