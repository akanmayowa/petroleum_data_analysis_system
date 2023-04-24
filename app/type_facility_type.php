<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_facility_type extends Model
{
    //
    protected $table = 'type_facility_type';

    protected $fillable = ['type_name', 'created_by'];

    public function facility_type()
    {
        return $this->hasMany(\App\facility_type::class, 'type_id');
    }
}
