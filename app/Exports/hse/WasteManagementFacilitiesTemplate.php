<?php

namespace App\Exports\hse;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class WasteManagementFacilitiesTemplate implements  WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;


    public function sheets() : array
    {
        $sheets = [];

        for ($sheet=1; $sheet <= 2; $sheet++) 
        {
            if($sheet == 1) 
            {
                $sheets[] = new WasteManagementFacilitiesHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new FacilityTypeSheet();
            } 
        }

        return $sheets;
    }

}
