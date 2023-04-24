<?php

namespace App\Exports\upstream;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class GeophysicalDataTemplate implements  WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;



    public function sheets() : array
    {
        $sheets = [];

        for ($sheet=1; $sheet <= 6; $sheet++) 
        {
            if($sheet == 1) 
            {
                $sheets[] = new GeophysicalDataHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new TerrainSheet();
            }
            else if($sheet == 3) 
            {
                $sheets[] = new GeoPhysicalSheet();
            }
            else if($sheet == 4) 
            {
                $sheets[] = new GeoTechnicalSheet();
            }
            else if($sheet == 5) 
            {
                $sheets[] = new StatusSheet();
            }
            else
            {
                $sheets[] = new SiesmicTypeSheet();
            }           
        }

        return $sheets;
    }

}
