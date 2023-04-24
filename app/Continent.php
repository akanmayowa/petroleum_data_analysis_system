<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //
    protected $table = 'continent';

    protected $fillable = ['continent_name', 'created_by'];

    public function down_crude_export_by_destination()
    {
        return $this->hasMany(\App\down_crude_export_by_destination::class, 'destination');
    }

    public function down_crude_export_by_company()
    {
        return $this->hasMany(\App\down_crude_export_by_company::class, 'country_id');
    }
}
