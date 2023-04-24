<?php

namespace App\Exports\downstream;

use App\down_plant_location;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class RefinerySheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return down_plant_location::select('id', 'plant_location_name');
    }

    public function title() : string
    {
    	return 'Refineries';  
    }

}
