<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_ave_consumer_price_range extends Model
{
    //
    protected $table = 'down_ave_consumer_price_range';

    protected $fillable = ['year', 'month', 'production_type', 'pms', 'pms_to', 'ago', 'ago_to', 'dpk', 'dpk_to', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function production_types()
    {
        return $this->belongsTo(\App\down_market_segment::class, 'production_type');
    }
}
