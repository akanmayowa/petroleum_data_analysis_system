<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_reserve_replacement_rate extends Model
{
    //
    protected $table = 'up_reserve_replacement_rate';

    protected $fillable = ['year', 'month', 'contract_id', 'oil_condensate_reserve', 'oil_condensate_production', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function contract()
    {
        return $this->belongsTo(\App\contract::class, 'contract_id');
    }
}
