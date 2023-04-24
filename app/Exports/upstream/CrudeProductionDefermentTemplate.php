<?php

namespace App\Exports\upstream;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class CrudeProductionDefermentTemplate implements  WithMultipleSheets
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
                $sheets[] = new CrudeProductionDefermentHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new CompanySheet();
            }
            else
            {
                $sheets[] = new ContractSheet();
            }           
        }

        return $sheets;
    }

}
