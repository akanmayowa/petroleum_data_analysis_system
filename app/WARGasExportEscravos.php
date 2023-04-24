<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARGasExportEscravos extends Model
{
    //
    protected $table = 'war_gas_export_escravos';

    protected $fillable = ['date', 'week', 'lpg', 'condensate', 'transmix', 'total_no_vessel', 'created_by'];
}
