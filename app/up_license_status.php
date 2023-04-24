<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_license_status extends Model
{
    //
    protected $table = 'up_license_status';

    public function up_major_oil_facilities()
    {
        return $this->hasMany(\App\up_major_oil_facilities::class, 'license_status');
    }
}
