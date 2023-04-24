<?php

namespace App\Exports\es;

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
        return terrain::select('id', 'terrain_name');
    }

    public function title() : string
    {
        return 'Terrains';  
    }

}
