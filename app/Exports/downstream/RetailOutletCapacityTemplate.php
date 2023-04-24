<?php

namespace App\Exports\downstream;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class RetailOutletCapacityTemplate implements  WithMultipleSheets
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
                $sheets[] = new RetailOutletCapacityHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new MarketSegmentSheet();
            } 
            else if($sheet == 3) 
            {
                $sheets[] = new StateSheet();
            }
            else if($sheet == 4) 
            {
                $sheets[] = new ProductSheet();
            }     
        }

        return $sheets;
    }

}
