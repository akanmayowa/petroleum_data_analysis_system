<?php

namespace App\Exports\gas;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class GasImportPermitIssuedTemplate implements  WithMultipleSheets
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
                $sheets[] = new ImportPermitIssuedHeader();
            }
            else if($sheet == 2)
            {
                $sheets[] = new CompanySheet();
            } 
            else if($sheet == 3)
            {
                $sheets[] = new ProductSheet();
            } 
            else
            {
                $sheets[] = new CountrySheet();
            }            
        }

        return $sheets;
    }

}
