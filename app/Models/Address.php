<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'address1', 'address2', 'post_code', 'suburb', 'state', 'country', 'address_type','contact_code'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'contact_code'); // Define the inverse relationship with Account

    }
    public static function getAddressDetails($contactCode)
    {
        return static::where('contact_code', $contactCode)->first();
    }
}
