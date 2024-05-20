<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountService extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_code', 'service_id', 'package_id', 'packageoption_id', 'network', 'phonenumber', 'service_narrative',
        'status', 'dob', 'password', 'parent', 'dealer', 'costcentre', 'serviceoption_id', 'contract'
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


    public  function serviceoption()
    {
        return $this->belongsTo(ServiceOption::class, 'service_id');
    }

    public function accountservice()
    {
        return $this->belongsTo(AccountService::class, 'contact_code');
    }


    public static function getData($contact_code)
    {
        // dd($contact_code);
        // Eager load the relationships
        $accountServices = static::with(['serviceoption', 'accountservice'])->where('contact_code', $contact_code)->get();

        // Loop through the records to get the data
        foreach ($accountServices as $accountService) {
            if ($accountService->serviceoption) {
                $accountService->service_id = $accountService->serviceoption->service_types;
            } else {
                dd('ServiceOption not found for AccountService ID: ' . $accountService->id); // Debugging when serviceoption is null
            }
        }
        return $accountServices;
    }
}
