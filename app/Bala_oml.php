<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bala_oml extends Model
{
    //
    protected $table = 'Bala_oml';

    protected $fillable = ['company_id', 'stage_id', 'concession_held_id', 'equity_distribution', 'contract_type', 'date_of_grant', 'license_expire_date', 'area', 'geological_terrain_id', 'comment', 'year', 'created_by'];

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
        return $this->belongsTo(\App\up_concession_terrain::class, 'geological_terrain_id');
    }

    public function contract()
    {
        return $this->belongsTo(\App\contract::class, 'contract_type');
    }

    public function up_concession_terrain()
    {
        return $this->belongsTo(\App\up_concession_terrain::class, 'geological_terrain_id');
    }
}
