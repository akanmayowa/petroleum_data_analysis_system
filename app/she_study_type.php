<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_study_type extends Model
{
    //
    protected $table = 'she_study_types';

    protected $fillable = ['type_name', 'created_by'];

    public function she_environmental_studies()
    {
        return $this->hasMany(\App\she_environmental_studies::class, 'type_id');
    }
}
