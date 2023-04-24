<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_ownership extends Model
{
    protected $table = 'down_ownership';

    //
    public function down_petrochemical_plant()
    {
        return $this->hasMany(\App\down_petrochemical_plant::class, 'ownership');
    }
}
