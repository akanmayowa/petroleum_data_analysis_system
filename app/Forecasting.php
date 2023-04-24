<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forecasting extends Model
{
    protected $table = 'forecastings';

    protected $fillable = ['date', 'products', 'price', 'constraint'];
}
