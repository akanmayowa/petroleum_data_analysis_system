<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_refinery_performance extends Model
{
    //
    protected $table = 'down_refinery_performance';

    protected $fillable = ['year', 'processing_unit', 'refinery_id', 'location', 'value', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function refinery()
    {
        return $this->belongsTo(\App\down_plant_location::class, 'refinery_id');
    }

    // public function ownership()
    // {
    // 	return $this->belongsTo('App\down_ownership', 'ownership_id');
    // }

    // public function configurations()
    // {
    //     return $this->belongsTo('App\down_configuration', 'configuration');
    // }

    // public function feedstock()
    // {
    // 	return $this->belongsTo('App\down_feedstock', 'feedstock_id');
    // }

    // public function product()
    // {
    // 	return $this->belongsTo('App\down_product', 'products_id');
    // }

    // public function state()
    // {
    //     return $this->belongsTo('App\down_outlet_states', 'state_id');
    // }
}
