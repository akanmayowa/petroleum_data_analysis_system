<?php

namespace App\Exports\upstream;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class ProvisionalCrudeTemplate implements  WithMultipleSheets
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
                $sheets[] = new ProvisionalCrudeHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new FieldSheet();
            }
            else if($sheet == 3) 
            {
                $sheets[] = new CompanySheet();
            }
            else if($sheet == 4) 
            {
                $sheets[] = new TerrainSheet();
            }
            else
            {
                $sheets[] = new ContractSheet();
            }           
        }

        return $sheets;
    }

}
