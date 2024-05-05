<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_code',
        'contact_code1',
        'contact_type',
        'name',
        'contact_usage',
    ];

public function account()
{
    return $this->belongsTo(Account::class, 'contact_code'); // Define the inverse relationship with Account

}
}
