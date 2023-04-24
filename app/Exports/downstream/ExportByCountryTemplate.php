<?php

namespace App\Exports\downstream;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportByCountryTemplate implements  WithMultipleSheets
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
                $sheets[] = new ExportByCountryHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new StreamSheet();
            }
            else if($sheet == 3) 
            {
                $sheets[] = new CountrySheet();
            } 
            else if($sheet == 4) 
            {
                $sheets[] = new RegionSheet();
            }       
        }

        return $sheets;
    }

}
