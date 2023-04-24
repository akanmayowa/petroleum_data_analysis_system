<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDownstreamProductImport extends Model
{
    //
    protected $table = 'war_downstream_product_import';

    protected $fillable = ['date', 'week', 'pms', 'hhk', 'ago', 'atk', 'created_by'];
}
