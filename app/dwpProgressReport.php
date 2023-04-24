<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwpProgressReport extends Model
{
    //
    protected $fillable = ['dwp_id', 'achievement_status_id', 'submitted_date', 'added_by'];

    public function dwp()
    {
        return $this->belongsTo(\App\dwp::class, 'dwp_id')->withDefault();
    }

    public function achievement_status()
    {
        return $this->belongsTo(\App\dwp_achievement_status::class, 'achievement_status_id')->withDefault();
    }
}
