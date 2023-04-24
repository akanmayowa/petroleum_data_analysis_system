<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contract extends Model
{
    //
    protected $table = 'contract';

    protected $fillable = ['contract_name', 'created_by'];

    public function Bala_oml()
    {
        return $this->hasMany(\App\Bala_oml::class, 'contract_type');
    }

    public function Bala_opl()
    {
        return $this->hasMany(\App\Bala_opl::class, 'contract_type');
    }

    public function bala_opl_oml_history()
    {
        return $this->hasMany(\App\bala_opl_oml_history::class, 'contract_type');
    }

    public function up_reserves_oil()
    {
        return $this->hasMany(\App\up_reserves_oil::class, 'contract_id');
    }

    public function up_reserves_report()
    {
        return $this->hasMany(\App\up_reserves_report::class, 'contract_id');
    }

    public function up_crude_production_deferment()
    {
        return $this->hasMany(\App\up_crude_production_deferment::class, 'contract_id');
    }

    // public function up_well_activities()
    // {
    //     return $this->hasMany('App\up_well_activities','contract_id');
    // }

    public function field()
    {
        return $this->hasMany(\App\field::class, 'contract_id');
    }

    public function concession()
    {
        return $this->hasMany(\App\concession::class, 'contract_id');
    }

    public function down_terminal_stream_prod()
    {
        return $this->hasMany(\App\down_terminal_stream_prod::class, 'contract_id');
    }

    public function up_field_summary()
    {
        return $this->hasMany(\App\up_field_summary::class, 'contract_id');
    }

    public function up_reserve_addition_depletion_rate()
    {
        return $this->hasMany(\App\up_reserve_addition_depletion_rate::class, 'contract_id');
    }

    public function up_reserve_replacement_rate()
    {
        return $this->hasMany(\App\up_reserve_replacement_rate::class, 'contract_id');
    }
}
