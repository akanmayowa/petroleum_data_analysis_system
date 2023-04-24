<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARCorporateServiceDiseasePattern extends Model
{
    //
    protected $table = 'war_corporate_service_disease_pattern';

    protected $fillable = ['date', 'week', 'arthritis', 'malaria', 'urti', 'diabetes', 'hypertension', 'viral_syndrome', 'created_by'];
}
