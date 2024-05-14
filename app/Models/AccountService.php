<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountService extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_code', 'service_id', 'package_id', 'packageoption_id', 'network', 'service_type', 'phonenumber',
        'status', 'dob', 'password', 'parent', 'dealer', 'costcentre'
    ];
}
