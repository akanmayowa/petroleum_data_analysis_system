<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_storage_location extends Model
{
    //
    protected $table = 'down_storage_location';

    protected $fillable = ['location_name', 'created_by'];

    public function down_licensed_oil_makerters()
    {
        return $this->hasMany(\App\down_licensed_oil_makerters::class, 'location_id');
    }
}
