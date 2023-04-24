<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_jetty extends Model
{
    //
    protected $table = 'down_jetty';

    protected $fillable = ['year', 'jetty_name', 'state_id', 'location', 'ownership_id', 'design_capacity', 'product_id', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function ownership()
    {
        return $this->belongsTo(\App\down_ownership::class, 'ownership_id');
    }

    public function product()
    {
        return $this->belongsTo(\App\down_import_product::class, 'product_id');
    }

    public function state()
    {
        return $this->belongsTo(\App\down_outlet_states::class, 'state_id');
    }
}
