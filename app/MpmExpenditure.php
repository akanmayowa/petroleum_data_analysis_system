<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpmExpenditure extends Model
{
    //
    protected $fillable = ['month', 'year', 'expenditure', 'addedBy'];
}
