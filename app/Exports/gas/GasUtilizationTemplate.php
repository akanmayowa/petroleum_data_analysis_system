<?php

namespace App\Exports\gas;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class GasUtilizationTemplate implements  WithMultipleSheets
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
                $sheets[] = new UtilizationHeader();
            }
            else if($sheet == 2)
            {
                $sheets[] = new FieldSheet();
            } 
            else
            {
                $sheets[] = new CompanySheet();
            }            
        }

        return $sheets;
    }

}
