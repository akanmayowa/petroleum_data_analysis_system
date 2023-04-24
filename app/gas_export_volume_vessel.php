<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gas_export_volume_vessel extends Model
{
    //
    protected $table = 'gas_export_by_volume_vessels';

    protected $fillable = ['year', 'month', 'equity_holder_id', 'stream_id', 'product_id', 'no_of_vessel', 'volume', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function equity()
    {
        return $this->belongsTo(\App\company::class, 'equity_holder_id');
    }

    public function stream()
    {
        return $this->belongsTo(\App\Stream::class, 'stream_id');
    }

    public function product()
    {
        return $this->belongsTo(\App\down_product::class, 'product_id');
    }
}
