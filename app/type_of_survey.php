<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_of_survey extends Model
{
    //
    protected $table = 'type_of_survey';

    protected $fillable = ['id', 'type_of_survey_name', 'created_by'];

    public function bala_multiclient_project_status()
    {
        return $this->hasMany(\App\bala_multiclient_project_status::class, 'type_of_survey_project_id');
    }
}
