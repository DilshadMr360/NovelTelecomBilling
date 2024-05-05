<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_code',
        'email_bill',
        'paper_bill',
        'excel_bill',
    ];

public function account()
{
    return $this->belongsTo(Account::class, 'contact_code'); // Define the inverse relationship with Account

}
}
