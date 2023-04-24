<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gas_product_monitoring extends Model
{
    //
    protected $table = 'gas_product_monitoring';

    protected $fillable = ['year', 'month', 'company_id', 'product_type', 'category_id', 'state_id', 'lga', 'zone', 'capacity', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function category()
    {
        return $this->belongsTo(\App\gas_category::class, 'category_id');
    }

    public function state()
    {
        return $this->belongsTo(\App\down_outlet_states::class, 'state_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }
}
