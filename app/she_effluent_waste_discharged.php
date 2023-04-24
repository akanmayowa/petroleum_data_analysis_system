<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_effluent_waste_discharged extends Model
{
    //
    protected $table = 'she_effluent_waste_discharged';

    protected $fillable = ['year', 'month', 'company_id', 'well_name', 'spent_wbm', 'spent_obm', 'wbm_generated', 'obm_generated', 'waste_manager', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }
}
