<?php

namespace App\Exports\gas;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class GasFacilitiesTemplate implements  WithMultipleSheets
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
                $sheets[] = new FacilitiesHeader();
            }
            else if($sheet == 2)
            {
                $sheets[] = new CompanySheet();
            } 
            else if($sheet == 3)
            {
                $sheets[] = new FacilitySheet();
            } 
            else if($sheet == 4)
            {
                $sheets[] = new FacilityTypeSheet();
            } 
            else
            {
                $sheets[] = new TerrainSheet();
            }            
        }

        return $sheets;
    }

}
