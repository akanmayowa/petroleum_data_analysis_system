<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class well_type extends Model
{
    //
    protected $table = 'well_type';

    protected $fillable = ['type_name', 'created_by'];

    public function up_well_activities()
    {
        return $this->hasMany(\App\up_well_activities::class, 'type_id');
    }
}
