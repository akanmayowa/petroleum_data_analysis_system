<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp_publication extends Model
{
    //
    protected $table = 'dwp_publication';

    protected $fillable = ['year', 'header', 'title', 'picture_1', 'picture_2', 'footer', 'sub_footer', 'status', 'approved_by', 'approved_at', 'created_by'];

    public function dwp_publication_contents()
    {
        return $this->hasMany(\App\dwp_publication_content::class, 'dwp_id');
    }

    public function dwp_publication_lists()
    {
        return $this->hasMany(\App\dwp_publication_list::class, 'dwp_id');
    }
}
