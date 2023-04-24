<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SheOilSpillContingency extends Model
{
    //
    protected $table = 'she_oil_spill_contingency';

    protected $fillable = ['year', 'state_id', 'types', 'terrain_id', 'no_of_company', 'actual_no_of_company', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function type()
    {
        return $this->belongsTo(\App\she_spill_facility::class, 'types');
    }

    public function terrain()
    {
        return $this->belongsTo(\App\terrain::class, 'terrain_id');
    }

    public function zone()
    {
        return $this->belongsTo(\App\she_zone::class, 'state_id');
    }
}
