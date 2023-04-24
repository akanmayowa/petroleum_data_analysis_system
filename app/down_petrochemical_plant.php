<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_petrochemical_plant extends Model
{
    //
    protected $table = 'down_petrochemical_plant';

    protected $fillable = ['plant_location', 'state_id', 'location', 'ownership', 'plant_type', 'plant_capacity', 'feedstock', 'products', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function locations()
    {
        return $this->belongsTo(\App\down_plant_location::class, 'plant_location');
    }

    public function ownerships()
    {
        return $this->belongsTo(\App\down_ownership::class, 'ownership');
    }

    public function plant_types()
    {
        return $this->belongsTo(\App\down_plant_type::class, 'plant_type');
    }

    public function feedstocks()
    {
        return $this->belongsTo(\App\down_feedstock::class, 'feedstock');
    }

    public function product()
    {
        return $this->belongsTo(\App\down_product::class, 'products');
    }

    public function state()
    {
        return $this->belongsTo(\App\down_outlet_states::class, 'state_id');
    }
}
