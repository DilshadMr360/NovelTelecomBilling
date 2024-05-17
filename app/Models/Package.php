<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'package_id',
        'service_id',
        'package_name',
    ];

    public function packageOptions()
    {
        return $this->hasMany(PackageOption::class, 'package_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}