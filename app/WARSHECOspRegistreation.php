<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARSHECOspRegistreation extends Model
{
    //
    protected $table = 'war_shec_osp_registration';

    protected $fillable = ['date', 'week', 'personel_captured', 'image_captured', 'permit_issued', 'created_by'];
}
