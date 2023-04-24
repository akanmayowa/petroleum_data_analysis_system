<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARUnitization extends Model
{
    //
    protected $table = 'war_up_unitization';

    protected $fillable = ['date', 'week', 'unitized_field', 'created_by'];
}
