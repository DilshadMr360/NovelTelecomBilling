<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_service_id',
        'contract',
        'contract_start_date',
        'contract_end_date',
        'status',
        'created_by',
        'contact__number',
        'sales_person'
    ];

    public function accountService()
    {
        return $this->belongsTo(AccountService::class);
    }


    public static function getcontractdata($id)
    {
        return DB::table('contracts')
        ->where('account_service_id',$id)
        ->get();


    }
}
