<?php

namespace App\Exports\gas;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class GasLPGConsumptionTemplate implements  WithMultipleSheets
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
                $sheets[] = new LPGConsumptionHeader();
            }
            else if($sheet == 2)
            {
                $sheets[] = new CompanySheet();
            } 
            else
            {
                $sheets[] = new ProductSheet();
            }            
        }

        return $sheets;
    }

}
