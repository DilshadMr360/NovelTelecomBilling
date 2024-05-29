<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_code',
        'contact_code2s',
        'contact_types',
        'name1s',
        'contactUsages',
    ];

public function account()
{
    return $this->belongsTo(Account::class, 'contact_code'); // Define the inverse relationship with Account

}
public static function getContactDetails($contactCode)
    {
        return static::where('contact_code', $contactCode)->first();
    }
}
