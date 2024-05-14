<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageOption extends Model
{
    protected $fillable = [
        'packageoption_id',
        'package_id',
        'package_options',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
