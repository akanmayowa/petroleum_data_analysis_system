<?php

namespace App\Exports\downstream;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class CrudeProductionTemplate implements  WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;


    public function sheets() : array
    {
        $sheets = [];

        for ($sheet=1; $sheet <= 5; $sheet++) 
        {
            if($sheet == 1) 
            {
                $sheets[] = new CrudeProductionHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new StreamSheet();
            }
            else if($sheet == 3) 
            {
                $sheets[] = new CompanySheet();
            }   
            else if($sheet == 4) 
            {
                $sheets[] = new ContractSheet();
            } 
            else if($sheet == 5) 
            {
                $sheets[] = new ProductionTypeSheet();
            }       
        }

        return $sheets;
    }

}
