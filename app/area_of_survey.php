<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class area_of_survey extends Model
{
    //
    protected $table = 'area_of_survey';

    protected $fillable = ['id', 'area_of_survey_name', 'created_by'];

    public function bala_multiclient_project_status()
    {
        return $this->hasMany(\App\bala_multiclient_project_status::class, 'area_of_survey_block_id');
    }
}
