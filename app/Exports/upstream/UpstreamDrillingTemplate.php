<?php

namespace App\Exports\upstream;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class UpstreamDrillingTemplate implements  WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;



    public function sheets() : array
    {
        $sheets = [];

        for ($sheet=1; $sheet <= 4; $sheet++) 
        {
            if($sheet == 1) 
            {
                $sheets[] = new UpstreamDrillingHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new TerrainSheet();
            }
            else if($sheet == 3) 
            {
                $sheets[] = new WellClassSheet();
            }
            else
            {
                $sheets[] = new ContractSheet();
            }           
        }

        return $sheets;
    }

}
