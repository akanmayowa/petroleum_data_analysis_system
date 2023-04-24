<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARLegal extends Model
{
    //
    protected $table = 'war_legal';

    protected $fillable = ['date', 'week', 'court_cases', 'agreement_executed', 'created_by'];
}
