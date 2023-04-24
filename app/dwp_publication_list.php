<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp_publication_list extends Model
{
    //
    protected $table = 'dwp_publication_list';

    protected $fillable = ['dwp_id', 'year', 'list', 'status', 'created_by'];

    public function dwp_publication()
    {
        return $this->belongsTo(\App\dwp_publication::class, 'dwp_id');
    }
}
