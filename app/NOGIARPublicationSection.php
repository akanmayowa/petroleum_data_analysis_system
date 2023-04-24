<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NOGIARPublicationSection extends Model
{
    //
    protected $table = 'nogiar_publication_sections';

    protected $fillable = ['year', 'section_type', 'title', 'content', 'status', 'copy', 'workflow_id', 'created_by', 'reviewed_by', 'reviewed_at', 'approved_by', 'approved_at'];

    public function workflow()
    {
        return $this->belongsTo(\App\Workflow::class, 'workflow_id');
    }
}
