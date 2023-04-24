<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARGasExportBonny extends Model
{
    //
    protected $table = 'war_gas_export_bonny';

    protected $fillable = ['date', 'week', 'propane', 'butane', 'pentane', 'total_no_vessel', 'created_by'];
}
