<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARRevenueGenerated extends Model
{
    //
    protected $table = 'war_up_revenue_generation';

    protected $fillable = ['date', 'week', 'revenue_generated', 'created_by'];
}
