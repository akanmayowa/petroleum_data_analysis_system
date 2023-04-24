<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_terminal extends Model
{
    //
    protected $table = 'down_terminal';

    protected $fillable = ['year', 'terminal_name', 'facility_type_id',  'state_id', 'location', 'ownership_id', 'design_capacity', 'product_id', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function ownership()
    {
        return $this->belongsTo(\App\company::class, 'ownership_id');
    }

    public function product()
    {
        return $this->belongsTo(\App\down_import_product::class, 'product_id');
    }

    public function state()
    {
        return $this->belongsTo(\App\down_outlet_states::class, 'state_id');
    }

    public function facility_type()
    {
        return $this->belongsTo(\App\facility_type::class, 'facility_type_id');
    }
}
