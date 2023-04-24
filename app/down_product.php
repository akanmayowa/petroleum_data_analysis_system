<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_product extends Model
{
    //
    protected $table = 'down_product';

    public function down_petrochemical_plant()
    {
        return $this->hasMany(\App\down_petrochemical_plant::class, 'location');
    }

    public function down_depot()
    {
        return $this->hasMany(\App\down_depot::class, 'product_id');
    }

    public function down_jetty()
    {
        return $this->hasMany(\App\down_jetty::class, 'product_id');
    }

    public function down_terminal()
    {
        return $this->hasMany(\App\down_terminal::class, 'product_id');
    }

    public function gas_export_volume_vessel()
    {
        return $this->hasMany(\App\gas_export_volume_vessel::class, 'product_id');
    }
}
