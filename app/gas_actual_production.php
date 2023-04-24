<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gas_actual_production extends Model
{
    //
    protected $table = 'gas_actual_productions';

    protected $fillable = ['year', 'month', 'company_id', 'vessel_name', 'import_permit_no', 'state_id', 'zone', 'product_id',  'volume',  'date_discharged', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function state()
    {
        return $this->belongsTo(\App\down_outlet_states::class, 'state_id');
    }

    public function product()
    {
        return $this->belongsTo(\App\down_import_product::class, 'product_id');
    }
}
