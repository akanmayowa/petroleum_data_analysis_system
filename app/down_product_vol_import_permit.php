<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_product_vol_import_permit extends Model
{
    //
    protected $table = 'down_product_vol_import_permit';

    protected $fillable = ['market_segment_id', 'product_id', 'year', 'january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'total', 'total_litres', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function product()
    {
        return $this->belongsTo(\App\down_import_product::class, 'product_id');
    }

    public function market_segment()
    {
        return $this->belongsTo(\App\down_market_segment::class, 'market_segment_id');
    }
}
