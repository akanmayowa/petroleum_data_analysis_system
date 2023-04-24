<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_plant_location extends Model
{
    //
    protected $table = 'down_plant_location';

    public function down_petrochemical_plant()
    {
        return $this->hasMany(\App\down_petrochemical_plant::class, 'location');
    }

    public function down_refinary_capacity_utilization()
    {
        return $this->hasMany(\App\down_refinary_capacity_utilization::class, '');
    }

    public function down_refinery_production_volumes()
    {
        return $this->hasMany(\App\down_refinery_production_volumes::class, 'refinery_id');
    }

    public function down_refinery_performance()
    {
        return $this->hasMany(\App\down_refinery_performance::class, 'id');
    }
}
