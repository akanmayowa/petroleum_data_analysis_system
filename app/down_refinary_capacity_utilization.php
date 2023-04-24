<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_refinary_capacity_utilization extends Model
{
    //
    protected $table = 'down_refinary_capacity_utilization';

    protected $fillable = ['year', 'refinery_id', 'product_id', 'state_id', 'location', 'january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'total', 'total_utilization', 'capacity_utilization', 'q1', 'q2', 'q3', 'q4', 'created_by', 'pending_id'];

    public function state()
    {
        return $this->belongsTo(\App\down_outlet_states::class, 'state_id');
    }

    public function refinery()
    {
        return $this->belongsTo(\App\down_plant_location::class, 'refinery_id');
    }

    public function product()
    {
        return $this->belongsTo(\App\down_import_product::class, 'product_id');
    }
}
