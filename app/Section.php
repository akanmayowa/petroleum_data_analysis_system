<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $table='sections';
    protected $fillable=['name', ];

//     public function ownership()
//     {
//     	return $this->belongsTo('App\down_ownership', 'ownership_id');
//     }
// }
