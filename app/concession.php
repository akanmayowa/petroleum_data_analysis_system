<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class concession extends Model
{
    //
    protected $table = 'concession';

    protected $fillable = ['company_id', 'concession_name', 'equity_1', 'percentage_1', 'equity_2', 'percentage_2', 'equity_3', 'percentage_3', 'equity_4', 'percentage_4', 'equity_5', 'percentage_5', 'equity_6', 'percentage_6', 'equity_7', 'percentage_7', 'equity_8', 'percentage_8', 'contract_id', 'award_date', 'license_expire_date', 'area', 'geological_terrain_id', 'comment', 'stage_id', 'batch_number', 'created_by'];

    public function Bala_oml()
    {
        return $this->hasMany(\App\Bala_oml::class, 'concession_held_id');
    }

    public function Bala_opl()
    {
        return $this->hasMany(\App\Bala_opl::class, 'concession_held_id');
    }

    public function bala_opl_oml_history()
    {
        return $this->hasMany(\App\bala_opl_oml_history::class, 'concession_held_id');
    }

    public function field()
    {
        return $this->hasMany('App\Field', 'concession_id');
    }

    public function up_processing_plant_project()
    {
        return $this->hasMany(\App\up_processing_plant_project::class, 'concession_id');
    }

    public function up_well_workover()
    {
        return $this->hasMany(\App\up_well_workover::class, 'concession_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function company_parent()
    {
        return $this->belongsTo(\App\company_parent::class, 'company_id');
    }

    public function contract()
    {
        return $this->belongsTo(\App\contract::class, 'contract_id');
    }

    public function terrain()
    {
        return $this->belongsTo(\App\up_concession_terrain::class, 'geological_terrain_id');
    }

    public function equity_one()
    {
        return $this->belongsTo(\App\company::class, 'equity_1');
    }

    public function equity_two()
    {
        return $this->belongsTo(\App\company::class, 'equity_2');
    }

    public function equity_three()
    {
        return $this->belongsTo(\App\company::class, 'equity_3');
    }

    public function equity_four()
    {
        return $this->belongsTo(\App\company::class, 'equity_4');
    }

    public function equity_five()
    {
        return $this->belongsTo(\App\company::class, 'equity_5');
    }

    public function equity_six()
    {
        return $this->belongsTo(\App\company::class, 'equity_6');
    }

    public function equity_seven()
    {
        return $this->belongsTo(\App\company::class, 'equity_7');
    }

    public function equity_eight()
    {
        return $this->belongsTo(\App\company::class, 'equity_8');
    }
}
