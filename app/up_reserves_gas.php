<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_reserves_gas extends Model
{
    //
    protected $table = 'up_reserves_gas';

    protected $fillable = ['year', 'month', 'company_id', 'associated_gas', 'non_associated_gas', 'total_gas', 'pending_id', 'stage_id', 'batch_number', 'created_by', 'approve_by', 'approve_at', 'contract_id', 'description'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }
}
