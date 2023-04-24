<?php

namespace App\Exports\upstream;

use App\type_of_survey;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class TypeOfSurveySheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
    */


    public function query()
    {
        return type_of_survey::select('id', 'type_of_survey_name');
    }

    public function title() : string
    {
    	return 'Type of Surveys';  
    }

}
