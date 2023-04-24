<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gas_outlet_storage_capacity extends Model
{
    //
    protected $table = 'gas_outlet_storage_capacity';

    protected $fillable = ['year', 'state_id', 'product_type_id', 'company_id', 'capacity', 'january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'total', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function state()
    {
        return $this->belongsTo(\App\down_outlet_states::class, 'state_id');
    }

    public function segment()
    {
        return $this->belongsTo(\App\down_market_segment::class, 'segment_id');
    }

    public function product_type()
    {
        return $this->belongsTo(\App\gas_product_type::class, 'product_type_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }
}
