<?php

namespace App\Exports\hse;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class EnvironmentStudiesTemplate implements  WithMultipleSheets
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
                $sheets[] = new EnvironmentStudiesHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new CompanySheet();
            }  
            else if($sheet == 3) 
            {
                $sheets[] = new StudyTypeSheet();
            }
            else if($sheet == 4) 
            {
                $sheets[] = new HSEStatusSheet();
            } 
        }

        return $sheets;
    }

}
