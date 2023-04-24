<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARSHECSpillIncidenceMgt extends Model
{
    //
    protected $table = 'war_shec_spill_incidence_mgt';

    protected $fillable = ['date', 'week', 'spill_number', 'spill_volume', 'quantity_recoverd', 'jiv_conducted', 'community_issued', 'created_by'];
}
