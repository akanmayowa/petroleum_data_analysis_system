<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_refinary_production extends Model
{
    //
    protected $table = 'down_refinary_production';

    protected $fillable = ['market_segment_id', 'product_id', 'company_id', 'year', 'january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'total', 'total_litres', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function market_segment()
    {
        return $this->belongsTo(\App\down_market_segment::class, 'market_segment_id');
    }

    public function product()
    {
        return $this->belongsTo(\App\down_import_product::class, 'product_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }
}
