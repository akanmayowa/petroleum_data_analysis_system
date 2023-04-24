<?php

namespace App\Repositories;

use App\OpecUpstreamManualInput;
use App\Traits\Opec;
use Illuminate\Support\Facades\Request;

class OpecUpstreamRepository
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
            case 'saveUpstream':

                return $this->saveUpstream(\App\OpecUpstream::class);
            default:
                return '';

        }
    }

    public function processGet($id)
    {
        switch ($id) {
            case 'manageUpstream':
//return $this->getUpstreamManualData();
                return $this->manageUpstream();

            default:
                return '';

        }
    }

    private function manageUpstream()
    {
        $year = $this->year;

        $product1 = ['Oil', 'Gas', 'Dry hole', 'Others', 'Total'];
        $product2 = ['Oil', 'Gas', 'Miscellaneous', 'Total'];
        $sumReserve = round($this->sumReserve(), 2);
        $wellDrillings = $this->getWellDrilling();
        $rigDispositions = $this->drillingRig();
        $upstreamData = $this->getUpstreamManualData();

        $eor = explode(',', @$upstreamData[5]['eor']);

        return view('opec.upstream', compact('eor', 'upstreamData', 'year', 'product1', 'product2', 'sumReserve', 'wellDrillings', 'rigDispositions'));
    }

    public function sumReserve()
    {
        return \App\up_reserves_oil::where('year', $this->year)->selectRaw('sum(oil_reserves) as oil_reserves')->value('oil_reserves');
    }

    public function getWellDrilling()
    {
        $wellDrilling = \App\up_well_activities::selectRaw('no_of_well as total , type_id,class_id')->with('type')->where('year', $this->year)->get();

        return $wellDrilling;
    }

    public function drillingRig()
    {
        $drillingRig = \App\up_rig_disposition::selectRaw('SUM(january) as january,SUM(febuary) AS february, sum(march) as march ,sum(april) as april ,sum(may) as may ,sum(june) as june , sum(july) as july, sum(august) as august,sum(september) as september,sum(october) as october,sum(november) as november,sum(december) as december')->where('year', $this->year)->first();
        $sum = collect($drillingRig)->flatten()->sum();

        return ['Oil'=>$sum, 'Total'=>$sum];
    }

    public function saveUpstream($model)
    {
        $saveData = $this->saveData(\App\OpecUpstreamManualInput::class, 0);
        if ($saveData) {
            $data = request()->except(['_token', 'year', 'a_id', 'type']);
            foreach ($data as $key=>$datum) {
                if (! strpos($key, '_') === false) {
                    $finData[] = $model::updateOrCreate(['year'=>explode('_', $key)[1]], ['a_id'=>request()->a_id, 'year'=>explode('_', $key)[1], 'capacity'=>$datum]);
                }
            }

            return response()->json(['status'=>'success', 'message'=>'Operation Successful']);
        }
        throw new \Exception('Some Error occurred');
    }

    private function getUpstreamManualData()
    {
        $firstManual = \App\OpecUpstreamManualInput::where('year', $this->year)->get()->toArray();
        $upstreamManualData = \App\OpecUpstream::whereIn('year', $this->getYears())->select('year', 'capacity')->get()->toArray();

        return array_merge($upstreamManualData, $firstManual);
    }
}
