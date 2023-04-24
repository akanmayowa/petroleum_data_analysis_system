<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_type_of_facility extends Model
{
    //
    protected $table = 'she_type_of_facility';

    protected $fillable = ['type_of_facility_name', 'description', 'created_by'];

    public function she_accredited_waste_manager()
    {
        return $this->hasMany(\App\she_accredited_waste_manager::class, 'type_of_facility_id');
    }
}
