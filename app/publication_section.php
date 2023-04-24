<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publication_section extends Model
{
    //
    protected $table = 'publication_section';

    protected $fillable = ['section_name', 'created_by'];
}
