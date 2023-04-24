<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationMessage extends Model
{
    protected $fillable = ['year', 'section', 'message', 'created_by'];
}
