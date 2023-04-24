<?php

namespace App\Exports\gas\masterData;

use App\terrain;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class TerrainSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return terrain::query();
    }

    public function title() : string
    {
    	return 'Gas Tempaltes';  
    }

}
