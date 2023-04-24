<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDownstreamDepotStock extends Model
{
    //
    protected $table = 'war_downstream_depot_stock';

    protected $fillable = ['date', 'week', 'pms_open_stock', 'pms_reciept', 'pms_lifting_transfer', 'pms_closing_stock', 'dpk_open_stock', 'dpk_reciept', 'dpk_lifting_transfer', 'dpk_closing_stock', 'ago_open_stock', 'ago_reciept', 'ago_lifting_transfer', 'ago_closing_stock', 'created_by'];
}
