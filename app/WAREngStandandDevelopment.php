<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WAREngStandandDevelopment extends Model
{
    //
    protected $table = 'war_eng_standand_development';

    protected $fillable = ['date', 'week', 'deep_offshore_project', 'western_area_project', 'eastern_area_project', 'pipeline_project', 'created_by'];
}
