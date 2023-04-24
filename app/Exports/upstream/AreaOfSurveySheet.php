<?php

namespace App\Exports\upstream;

use App\area_of_survey;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class AreaOfSurveySheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return area_of_survey::select('id', 'area_of_survey_name');
    }

    public function title() : string
    {
    	return 'Area of Surveys';  
    }

}
