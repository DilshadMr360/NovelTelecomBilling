<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsageSummary extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_code', 'phonenumber','service_narrative','service_types','cost_center','mobilecalls_tax' ,'nationalcalls_tax','othercalls_tax','localcalls_tax','incomingcalls_tax','discount_tax','total_tax'
    ];
}
