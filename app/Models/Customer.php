<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'debtor_code',
        'last_name',
        'first_name',
        'business_name',
        'date_of_birth',
        'gender',
        'email_address',
        'address_1',
        'address_2',
        'suburb',
        'state',
        'post_code',
        'email_billing',
    ];
}
