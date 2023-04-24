<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_outlet_storage_capacity extends Model
{
    //
    protected $table = 'down_outlet_storage_capacity';

    protected $fillable = ['year', 'state_id', 'market_segment_id', 'product_id', 'january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'total', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function state()
    {
        return $this->belongsTo(\App\down_outlet_states::class, 'state_id');
    }

    public function market_segment()
    {
        return $this->belongsTo(\App\down_market_segment::class, 'market_segment_id');
    }

    public function product()
    {
        return $this->belongsTo(\App\down_import_product::class, 'product_id');
    }
}
