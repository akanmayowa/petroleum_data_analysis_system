<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facility_type extends Model
{
    //
    protected $table = 'facility_type';

    protected $fillable = ['type_id', 'facility_type_name', 'created_by'];

    public function gas_major_gas_facilities()
    {
        return $this->hasMany(\App\gas_major_gas_facilities::class, 'facility_type_id');
    }

    public function up_major_oil_facilities()
    {
        return $this->hasMany(\App\up_major_oil_facilities::class, 'facility_type_id');
    }

    public function down_terminal()
    {
        return $this->hasMany(\App\down_terminal::class, 'facility_type_id');
    }

    public function she_accredited_waste_manager()
    {
        return $this->hasMany(\App\she_accredited_waste_manager::class, 'type_of_facility_id');
    }

    public function type()
    {
        return $this->belongsTo(\App\type_facility_type::class, 'type_id');
    }
}
