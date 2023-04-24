<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARRevenueTaxMatter extends Model
{
    //
    protected $table = 'war_revenue_tax_matter';

    protected $fillable = ['date', 'week', 'vat', 'paye', 'wht', 'third_party_bill', 'monthly_expenditure', 'created_by'];
}
