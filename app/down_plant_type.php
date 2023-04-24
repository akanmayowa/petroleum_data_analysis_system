<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_plant_type extends Model
{
    //
    protected $table = 'down_plant_type';

    public function down_petrochemical_plant()
    {
        return $this->hasMany(\App\down_petrochemical_plant::class, 'plant_type');
    }
}
