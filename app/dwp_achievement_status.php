<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp_achievement_status extends Model
{
    //
    protected $table = 'dwp_achievement_status';

    protected $fillable = ['achievement_status_name', 'status', 'created_by'];

    public function dwp()
    {
        return $this->hasMany(\App\dwp::class, 'achievement_status_id');
    }
}
