<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bala_multiclient_project_status extends Model
{
    //
    protected $table = 'bala_multiclient_project_status';

    protected $fillable = ['approved_at', 'approved_by', 'year', 'company_id', 'survey_name', 'agreement_date', 'area_of_survey_block_id', 'type_of_survey_project_id', 'quantum_of_survey', 'year_of_survey', 'remark', 'created_by'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function area_of_survey()
    {
        return $this->belongsTo(\App\area_of_survey::class, 'area_of_survey_block_id');
    }

    public function type_of_survey()
    {
        return $this->belongsTo(\App\type_of_survey::class, 'type_of_survey_project_id');
    }
}
