<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_field_summary extends Model
{
    //
    protected $table = 'up_field_summaries';

    protected $fillable = ['year', 'month', 'company_id', 'contract_id', 'producing_field', 'well', 'string', 'stage_id', 'batch_number', 'section', 'pending_id', 'created_by', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function contract()
    {
        return $this->belongsTo(\App\contract::class, 'contract_id');
    }
}
