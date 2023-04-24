<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDownstreamTerminalOperation extends Model
{
    //
    protected $table = 'war_downstream_terminal_operation';

    protected $fillable = ['date', 'week', 'oil_condensate_production', 'oil_condensate_export', 'refinery_supply', 'created_by'];
}
