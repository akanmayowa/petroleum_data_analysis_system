<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpecCrude extends Model
{
    //
    protected $fillable = ['imports', 'petchem', 'year', 'stocks', 'diff', 'refineryintakes', 'refineryStatisticalDiff', 'refloses', 'powgen', 'refFuel', 'directs', 'a_id'];
}
