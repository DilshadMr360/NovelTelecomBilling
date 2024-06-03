<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSummary extends Model
{
    use HasFactory;

    protected $table = 'servicesummarys';

    protected $fillable=
    [
        'cost_centre',
        'service_number',
        'service_narrative',
        'service_type',
        'total_charges',
        'total_usage',
        'total',
        'contact_code',

    ];
}
