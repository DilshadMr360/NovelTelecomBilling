<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_code',
        'bill_types', // Update fillable attributes to include bill_types
    ];

    // Define an accessor to decode the JSON data when accessing the bill_types attribute
    public function getBillTypesAttribute($value)
    {
        return json_decode($value, true);
    }

    // Define a mutator to encode the bill_types data into JSON before saving
    public function setBillTypesAttribute($value)
    {
        $this->attributes['bill_types'] = json_encode($value);
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'contact_code'); // Define the inverse relationship with Account
    }
    public static function getBillDetails($contactCode)
    {
        return static::where('contact_code', $contactCode)->first();
    }
}
