<?php

namespace App\Repositories;

use App\Traits\Opec;

class OpecExportByDestinationRepository
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
//        return request()->all();
        switch (request()->type) {
            case 'saveExportByDestination':

                return $this->saveData('\App\OpecExportByDestination');
            default:
                return '';

        }
    }

    public function processGet($id)
    {
        switch ($id) {
            case 'manageExportByDestination':
                return $this->manageExportByDestination();

            default:
                return '';

        }
    }

    private function manageExportByDestination()
    {
        $year = $this->year;
        $regions = \App\Region::get();
        $streamDatas = $this->getStream();

        $countries = $this->getUniqueCountry($streamDatas);
        $streamHeaders = $this->getStreamHeader($streamDatas);
        if (request()->has('excel')) {
            return $this->toExcel(compact('year', 'regions', 'countries', 'streamHeaders', 'streamDatas'), 'CrudeExportByDestination', 'opec.export_by_destination');
        }

        return view('opec.export_by_destination', compact('year', 'regions', 'countries', 'streamHeaders', 'streamDatas'));
    }

    private function getStreamHeader($streams)
    {
        return collect($streams)->pluck('stream.stream_name', 'stream.id')->unique();
    }

    private function getUniqueCountry($streams)
    {
        return collect($streams)->pluck('country.country_name', 'country.id')->unique();
    }

    private function getStream()
    {
        $numberOfdays = $this->getNumDayInYear($this->year.'-01-01');

        return \App\down_crude_export_by_destination::where('year', $this->year)
                                                    ->with('stream:id,stream_name', 'country:id,region_id,country_name')
                                                     ->selectRaw("stream_id  , Round(( SUM(january)  +
                                                                    SUM(febuary) +
                                                                    sum(march) +
                                                                    sum(april) +
                                                                    sum(may) +
                                                                    sum(june) +
                                                                    sum(july) +
                                                                    sum(august) +
                                                                    sum(september) +
                                                                    sum(october) +
                                                                    sum(november) +
                                                                    sum(december) ) /$numberOfdays/1000,2) as total,country_id ")
                                                                ->groupBy('country_id', 'stream_id')
                                                                 ->get();
    }
}
