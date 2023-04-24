<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_reserves_report extends Model
{
    //
    protected $table = 'up_reserves_report';

    protected $fillable = ['year', 'month', 'type_id', 'contract_id', 'terrain_id', 'company_id', 'condensate_reserves', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function contract()
    {
        return $this->belongsTo(\App\contract::class, 'contract_id');
    }

    public function terrain()
    {
        return $this->belongsTo(\App\terrain::class, 'terrain_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }
}
