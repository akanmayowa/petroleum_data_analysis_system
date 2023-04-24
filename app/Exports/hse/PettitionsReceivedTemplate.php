<?php

namespace App\Exports\hse;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class PettitionsReceivedTemplate implements  WithMultipleSheets
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
                $sheets[] = new PettitionsReceivedHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new PetCategorySheet();
            } 
            else if($sheet == 3) 
            {
                $sheets[] = new ActionSheet();
            } 
            else if($sheet == 4) 
            {
                $sheets[] = new PetStatusSheet();
            }
        }

        return $sheets;
    }

}
