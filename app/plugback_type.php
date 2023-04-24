<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class plugback_type extends Model
{
    //
    protected $table = 'plugback_type';

    protected $fillable = ['type_name', 'created_by'];

    public function up_well_completion()
    {
        return $this->hasMany(\App\up_well_completion::class, 'type_id');
    }
}
