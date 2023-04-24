<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bala_opl_oml_history extends Model
{
    //
    protected $table = 'bala_opl_oml_history';

    protected $fillable = ['history_id', 'company_id', 'concession_held_id', 'equity_distribution', 'contract_type', 'year_of_award', 'license_expire_date', 'area', 'geological_terrain_id', 'comment', 'created_by', 'created_at', 'updated_by', 'updated_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function company_parent()
    {
        return $this->belongsTo(\App\company_parent::class, 'company_id');
    }

    public function concession()
    {
        return $this->belongsTo(\App\concession::class, 'concession_held_id');
    }

    public function terrain()
    {
        return $this->belongsTo(\App\terrain::class, 'geological_terrain_id');
    }

    public function contract()
    {
        return $this->belongsTo(\App\contract::class, 'contract_type');
    }
}
