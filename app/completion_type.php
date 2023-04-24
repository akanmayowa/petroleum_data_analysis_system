<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class completion_type extends Model
{
    //
    protected $table = 'completion_type';

    protected $fillable = ['type_name', 'created_by'];

    public function up_well_completion()
    {
        return $this->hasMany(\App\up_well_completion::class, 'type_id', 'well_type');
    }

    // public function up_well_completion()
    // {
    // 	return $this->hasMany('App\up_well_completion');
    // }
}
