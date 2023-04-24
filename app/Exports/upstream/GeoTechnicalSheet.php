<?php

namespace App\Exports\upstream;

use App\up_geotechnical;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class GeoTechnicalSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return up_geotechnical::select('id', 'geotechnical_name');
    }

    public function title() : string
    {
    	return 'Geo Technical';  
    }

}
