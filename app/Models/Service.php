<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{


    protected $fillable = [
        'service_id',
        'service_name',
        'service_type',
    ];

    public function serviceoptions()
    {
        return $this->hasMany(ServiceOption::class, 'service_id');
    }

    public function packages()
    {
        return $this->hasMany(Package::class, 'service_id');
    }
}
