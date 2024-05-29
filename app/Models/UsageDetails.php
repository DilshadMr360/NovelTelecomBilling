<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsageDetails extends Model
{
    use HasFactory;

    protected $table = 'usage_details';

    protected $fillable=
    [
        'cost_centre',
        'service_number',
        'service_narrative',
        'service_type',
        'date',
        'time',
        'number_called',
        'quantity',
        'quantity_type',
        'rate_period',
        'non_discounted_price_(ex_tax)',
        'discounted_price_(ex_tax)',
        'tax_free',
        'usage_type',
        'usage_description',
        'contact_code',

    ];
}
