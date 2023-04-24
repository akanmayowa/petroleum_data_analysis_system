<?php

namespace App\Exports\upstream;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class OMLTemplate implements  WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;



    public function sheets() : array
    {
        $sheets = [];

        for ($sheet=1; $sheet <= 3; $sheet++) 
        {
            if($sheet == 1) 
            {
                $sheets[] = new OMLHeader();
            }
            else if($sheet == 2)
            {
                $sheets[] = new ConcessionSheet();
            }  
            else
            {
                $sheets[] = new TerrainSheet();
            }           
        }

        return $sheets;
    }

}
