<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARCorporateServiceLogistics extends Model
{
    //
    protected $table = 'war_corporate_service_logistics';

    protected $fillable = ['date', 'week', 'newly_received_vehicle', 'fleet_utilization', 'coaster_bus', 'hilux', 'cars', 'peugeot_bus', 'mits_p_up_van', 'land_cruiser', 'prado_suv', 'hiace_bus', 'ambulance', 'created_by'];
}
