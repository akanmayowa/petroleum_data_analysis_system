<?php

namespace App\Exports\hse;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class SaftyPermitTemplate implements  WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;


    public function sheets() : array
    {
        $sheets = [];

        for ($sheet=1; $sheet <= 1; $sheet++) 
        {
            if($sheet == 1) 
            {
                $sheets[] = new SaftyPermitHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new CompanySheet();
            }    
        }

        return $sheets;
    }

}
