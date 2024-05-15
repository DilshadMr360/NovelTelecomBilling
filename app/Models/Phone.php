<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_code',
        'area_code',
        'phone_number',
        'phone_type',
    ];

public function account()
{
    return $this->belongsTo(Account::class, 'contact_code'); // Define the inverse relationship with Account

}
public static function getPhoneDetails($contactCode)
    {
        return static::where('contact_code', $contactCode)->first();
    }
}
