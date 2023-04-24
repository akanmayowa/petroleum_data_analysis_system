<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_pet_status extends Model
{
    //
    protected $table = 'she_pet_statuses';

    protected $fillable = ['status_name', 'created_by'];

    public function she_petitions_received()
    {
        return $this->hasMany('App\she_petitions_received', 'status_id');
    }

    public function she_chemical_certification()
    {
        return $this->hasMany(\App\she_chemical_certification::class, 'status_id');
    }
}
