<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARPAU extends Model
{
    //
    protected $table = 'war_pau';

    protected $fillable = ['date', 'week', 'meeting_conference_attended', 'consular_liason_visa_support', 'created_by'];
}
