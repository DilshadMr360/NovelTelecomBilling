<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOption extends Model
{
    protected $fillable = [
        'servicecategory_id',
        'service_id',
        'service_types',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
