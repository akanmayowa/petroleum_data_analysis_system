<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    //
    public $table = 'stream';

    protected $fillable = ['stream_code', 'stream_name', 'company_id', 'production_type', 'stage_id', 'batch_number', 'created_by'];

    public function down_terminal_stream_prod()
    {
        return $this->hasMany(\App\down_terminal_stream_prod::class, 'stream_id');
    }

    public function down_monthly_summary_crude_export()
    {
        return $this->hasMany(\App\down_monthly_summary_crude_export::class, 'stream_id');
    }

    public function up_ave_price_stream()
    {
        return $this->hasMany('App\up_ave_price_stream', 'stream_id');
    }

    public function up_ave_price_crude_stream()
    {
        return $this->hasMany(\App\up_ave_price_crude_stream::class, 'stream_id');
    }

    public function down_crude_export_by_destination()
    {
        return $this->hasMany(\App\down_crude_export_by_destination::class, 'stream_id');
    }

    public function gas_export_volume_vessel()
    {
        return $this->hasMany(\App\gas_export_volume_vessel::class, 'stream_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function company_parent()
    {
        return $this->belongsTo(\App\company_parent::class, 'company_id');
    }

    public function production_types()
    {
        return $this->belongsTo(\App\down_production_type::class, 'production_type');
    }

    // public function down_terminal_stream_prod($year, $type, $month)
    // {
    //     $val = \App\down_terminal_stream_prod::where('stream_id', $this->id)->where('year', $year)->where('production_type_id', $type)->value($month);
    //     return is_null($val) ? 0 : $val;
    // }

    public function down_terminal_stream_prod_total($year, $type)
    {
        $total = \App\down_terminal_stream_prod::where('stream_id', $this->id)->where('year', $year)->where('production_type_id', $type)->value('stream_total');

        return is_null($total) ? 0 : $total;
    }

    public function monthly_crude_export_total($year, $type)
    {
        $total = \App\down_monthly_summary_crude_export::where('stream_id', $this->id)->where('year', $year)->where('production_type_id', $type)->value('stream_total');

        return is_null($total) ? 0 : $total;
    }

    public function export_by_destination_total($year, $region)
    {
        $total = \App\down_crude_export_by_destination::where('stream_id', $this->id)->where('year', $year)->where('destination', $region)->value('stream_total');

        return is_null($total) ? 0 : $total;
    }
}
