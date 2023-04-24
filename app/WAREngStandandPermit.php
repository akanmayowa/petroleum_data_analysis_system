<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WAREngStandandPermit extends Model
{
    //
    protected $table = 'war_eng_standand_permit';

    protected $fillable = ['date', 'week', 'general_received', 'general_issued', 'major_received', 'major_issued', 'specialised_received', 'specialised_issued', 'created_by'];
}
