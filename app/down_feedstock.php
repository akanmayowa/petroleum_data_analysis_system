<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_feedstock extends Model
{
    //
    protected $table = 'down_feedstock';

    public function down_petrochemical_plant()
    {
        return $this->hasMany(\App\down_petrochemical_plant::class, 'feedstock');
    }
}
