<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_environmental_compliance_monitoring extends Model
{
    //
    protected $table = 'she_environmental_compliance_monitoring';

    protected $fillable = ['year', 'month', 'company_id', 'compliance', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }
}
