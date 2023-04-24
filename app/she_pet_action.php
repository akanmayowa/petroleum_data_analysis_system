<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_pet_action extends Model
{
    //
    protected $table = 'she_pet_actions';

    protected $fillable = ['action_name', 'created_by'];

    public function she_petitions_received()
    {
        return $this->hasMany('App\she_petitions_received', 'action_taken_id');
    }
}
