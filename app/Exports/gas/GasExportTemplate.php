<?php

namespace App\Exports\gas;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class GasExportTemplate implements  WithMultipleSheets
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
                $sheets[] = new ExportHeader();
            }
            else if($sheet == 2)
            {
                $sheets[] = new CompanySheet();
            } 
            else if($sheet == 3)
            {
                $sheets[] = new StreamSheet();
            }
            else
            {
                $sheets[] = new DownProductSheet();
            }            
        }

        return $sheets;
    }

}
