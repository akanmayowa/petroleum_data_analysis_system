<?php

namespace App\Exports\downstream;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class TerminalTemplate implements  WithMultipleSheets
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
                $sheets[] = new TerminalHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new StateSheet();
            } 
            else if($sheet == 3) 
            {
                $sheets[] = new OwnershipSheet();
            } 
            else if($sheet == 4) 
            {
                $sheets[] = new ProductSheet();
            } 
            else if($sheet == 5) 
            {
                $sheets[] = new FacilityTypeSheet();
            }    
        }

        return $sheets;
    }

}
