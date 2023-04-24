<?php

namespace App\Exports\downstream;

use App\down_plant_type;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class PlantTypeSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return down_plant_type::select('id', 'plant_type_name');
    }

    public function title() : string
    {
    	return 'Plant Types';  
    }

}
