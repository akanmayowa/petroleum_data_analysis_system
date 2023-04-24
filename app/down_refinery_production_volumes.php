<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_refinery_production_volumes extends Model
{
    //
    protected $table = 'down_refinery_production_volumes';

    protected $fillable = ['refinery_id', 'product_id', 'year', 'january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'total', 'total_litres', 'stream_id', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function refinery()
    {
        return $this->belongsTo(\App\down_plant_location::class, 'refinery_id');
    }

    public function product()
    {
        return $this->belongsTo(\App\down_import_product::class, 'product_id');
    }

    public function stream()
    {
        return $this->belongsTo(\App\Stream::class, 'stream_id');
    }
}
