<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_spill_facility extends Model
{
    //
    protected $table = 'she_spill_facility';

    protected $fillable = ['type_name', 'created_by'];

    public function SheOilSpillContingency()
    {
        return $this->hasMany(\App\SheOilSpillContingency::class, 'types');
    }
}
