<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //

    public function country()
    {
        return $this->hasMany('App\country', 'region_id');
    }

    public function down_crude_export_by_destination()
    {
        return $this->hasMany(\App\down_crude_export_by_destination::class, 'destination');
    }
}
