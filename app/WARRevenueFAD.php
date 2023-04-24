<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARRevenueFAD extends Model
{
    //
    protected $table = 'war_revenue_fad';

    protected $fillable = ['date', 'week', 'revenue', 'revenue_receipt_issued', 'fund_transfer', 'personnel_cost', 'medical_bill_transfer', 'outsorced_secuirity_services', 'outsorced_cleaning_services', 'penalty_fee', 'overhead_allocation', 'salary_allowance', 'created_by'];
}
