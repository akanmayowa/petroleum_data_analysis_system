<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_configuration extends Model
{
    //
    protected $table = 'down_configuration';

    public function down_refinery_performance()
    {
        return $this->hasMany(\App\down_refinery_performance::class, 'configuration');
    }
}
