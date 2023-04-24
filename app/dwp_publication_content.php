<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp_publication_content extends Model
{
    //
    protected $table = 'dwp_publication_content';

    protected $fillable = ['dwp_id', 'year', 'content', 'status', 'created_by'];

    public function dwp_publication()
    {
        return $this->belongsTo(\App\dwp_publication::class, 'dwp_id');
    }

    public function getstatusHtmlAttribute()
    {
        switch ($this->status) {
            case 1:
                // code...
                return ['Locked from Editing', 'info'];
                break;

            default:
                  return ['', ''];
                break;

        }
    }
}
