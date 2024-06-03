<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargesSummary extends Model
{
    use HasFactory;

    protected $table = 'charges_summary';

    protected $fillable=
    [
        'cost_centre',
        'service_number',
        'service_narrative',
        'service_type',
        'charge_group',
        'charge_description',
        'from',
        'to',
        'charge_amount',
        'contact_code',

    ];
}
