<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARGasExportOperation extends Model
{
    //
    protected $table = 'war_gas_export_operation_downstream';

    protected $fillable = ['date', 'week', 'application_received', 'application_approved', 'application_querried', 'site_verification', 'approval_for_cng_downloading', 'approval_for_lpg_refilling', 'approval_for_lpg_bulk', 'approval_for_lpg_addon', 'license_for_cng_downloading', 'license_for_lpg_refilling', 'license_for_lpg_bulk', 'license_for_lpg_addon', 'license_for_lpg_reseller', 'facility_inspection_conducted', 'created_by'];
}
