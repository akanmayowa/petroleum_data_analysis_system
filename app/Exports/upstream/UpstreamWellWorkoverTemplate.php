<?php

namespace App\Exports\upstream;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class UpstreamWellWorkoverTemplate implements  WithMultipleSheets
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
                $sheets[] = new UpstreamWorkoverHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new FieldSheet();
            }
            else if($sheet == 3) 
            {
                $sheets[] = new WorkoverTypeSheet();
            } 
            else if($sheet == 4) 
            {
                $sheets[] = new FacilitySheet();
            }          
        }

        return $sheets;
    }

}
