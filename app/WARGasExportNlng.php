<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARGasExportNlng extends Model
{
    //
    protected $table = 'war_gas_export_nlng';

    protected $fillable = ['date', 'week', 'propane', 'butane', 'condensate', 'lng', 'total_no_vessel', 'created_by'];
}
