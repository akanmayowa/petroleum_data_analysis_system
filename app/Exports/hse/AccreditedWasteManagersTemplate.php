<?php

namespace App\Exports\hse;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class AccreditedWasteManagersTemplate implements  WithMultipleSheets
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
                $sheets[] = new AccreditedWasteManagersHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new CompanySheet();
            } 
            else if($sheet == 3) 
            {
                $sheets[] = new FacilityTypeSheet();
            } 
        }

        return $sheets;
    }

}
