<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_provisional_crude_production extends Model
{
    use \App\Traits\FilterQueryTrait;

    //
    protected $table = 'up_provisional_crude_production';

    protected $fillable = ['company_id', 'field_id', 'contract_id', 'terrain_id', 'year', 'january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'company_total', 'average_production', 'percentage_production', 'stage_id', 'batch_number', 'pending_id', 'created_by', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function company_parent()
    {
        return $this->belongsTo(\App\company_parent::class, 'company_id');
    }

    public function field()
    {
        return $this->belongsTo(\App\field::class, 'field_id');
    }

    public function contract()
    {
        return $this->belongsTo(\App\contract::class, 'contract_id');
    }

    public function terrain()
    {
        return $this->belongsTo(\App\terrain::class, 'terrain_id');
    }
}
