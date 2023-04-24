<?php

namespace App\Exports\downstream;

use App\Region;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class RegionSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return Region::select('id', 'name');
    }

    public function title() : string
    {
    	return 'Destinations / Regions';  
    }

}
