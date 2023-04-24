<?php

namespace App\Repositories;

use App\Traits\Opec;

class opecRefineryPetrochemicalRepository
{
    use Opec;

    public $year;

    public function __construct()
    {
        // $this->year=request()->has('year') ? request()->year : date('Y');
        if ($this->year = request()->has('year')) {
            $this->year = request()->year;
        } else {
            $this->year = (date('Y')) - 1;
        }
    }

    public function processPost()
    {
        switch (request()->type) {
            case 'saveRefineryPetrochemical':
//                return request()->all();
                return $this->saveData('\App\OpecRefineryPetrochemical');
            default:
                return '';

        }
    }

    public function processGet($id)
    {
        switch ($id) {
            case 'manageRefineryPetrochemical':

                return $this->manageRefineryPetrochemical();

            default:
                return '';

        }
    }

    private function manageRefineryPetrochemical()
    {
        $year = $this->year;
        $down_petrochemical_plant_projects = \App\down_petrochemical_plant_project::where('start_year', $this->year)
                                                                                ->orwhere('estimated_completion', $this->year)
                                                                                ->get();

        return view('opec.refinery_petrochemical_expansion', compact('year', 'down_petrochemical_plant_projects'));
    }
}
