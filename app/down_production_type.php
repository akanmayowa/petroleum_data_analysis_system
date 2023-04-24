<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_production_type extends Model
{
    //
    protected $table = 'down_production_type';

    protected $fillable = ['production_type_name', 'created_by'];

    public function down_monthly_summary_crude_export()
    {
        return $this->hasMany(\App\down_monthly_summary_crude_export::class, 'production_type_id');
    }

    public function down_terminal_stream_prod()
    {
        return $this->hasMany(\App\down_terminal_stream_prod::class, 'production_type_id');
    }

    public function stream()
    {
        return $this->hasMany(\App\Stream::class, 'production_type');
    }
}
