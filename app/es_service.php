<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class es_service extends Model
{
    //
    protected $table = 'es_service';

    protected $fillable = ['service', 'created_by'];

    public function es_metering()
    {
        return $this->hasMany(\App\es_metering::class, 'service_id');
    }
}
