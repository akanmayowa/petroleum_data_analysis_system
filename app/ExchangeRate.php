<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    //
    protected $table = 'eco_exchange_rates';

    protected $fillable = ['date', 'currency', 'rate', 'created_by'];
}
