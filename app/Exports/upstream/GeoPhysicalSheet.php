<?php

namespace App\Exports\upstream;

use App\up_geophysical;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class GeoPhysicalSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return up_geophysical::select('id', 'geophysical_name');
    }

    public function title() : string
    {
    	return 'Geo Physical';  
    }

}
