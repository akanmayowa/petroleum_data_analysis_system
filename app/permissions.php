<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    //
    protected $table = 'permissions';

    protected $fillable = ['role', 'upstream', 'downstream', 'midstream', 'concession', 'performance_management', 'dwp', 'she', 'economics', 'report', 'forecasting', 'benchmark', 'statistics', 'created_by'];

    public function role()
    {
        return $this->belongsTo(\App\roles::class, 'role');
    }
}
