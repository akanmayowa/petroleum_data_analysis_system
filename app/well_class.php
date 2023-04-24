<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class well_class extends Model
{
    //
    protected $table = 'well_class';

    protected $fillable = ['class_name', 'created_by'];

    public function up_well_activities()
    {
        return $this->hasMany(\App\up_well_activities::class, 'class_id');
    }
}
