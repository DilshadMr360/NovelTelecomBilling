<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_code',
        'paymentType',
        'bill_types', // Update fillable attributes to include bill_types
    ];


    public function account()
    {
        return $this->belongsTo(Account::class, 'contact_code'); // Define the inverse relationship with Account
    }
    public static function getBillDetails($contactCode)
    {
        return static::where('contact_code', $contactCode)->first();
    }
}
