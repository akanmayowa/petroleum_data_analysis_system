<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_reserves_oil extends Model
{
    //
    protected $table = 'up_reserves_oil';

    protected $fillable = ['year', 'month', 'type_id', 'contract_id', 'terrain_id', 'company_id', 'oil_reserves', 'pending_id', 'stage_id', 'batch_number', 'created_by', 'approve_by', 'approve_at'];

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
