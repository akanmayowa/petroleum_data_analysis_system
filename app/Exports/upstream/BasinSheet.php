<?php

namespace App\Exports\upstream;

use App\Basin;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class BasinSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return Basin::select('id', 'basin_name');
    }

    public function title() : string
    {
    	return 'Basins - Terrains';  
    }

}
