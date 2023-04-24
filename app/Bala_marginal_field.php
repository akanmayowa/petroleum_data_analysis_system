<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bala_marginal_field extends Model
{
    //
    protected $table = 'Bala_marginal_field';

    protected $fillable = ['year', 'company_id', 'field_id', 'blocks', 'created_by'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function company_parent()
    {
        return $this->belongsTo(\App\company_parent::class, 'company_id');
    }

    public function field()
    {
        return $this->belongsTo(\App\field::class, 'field_id');
    }
}
