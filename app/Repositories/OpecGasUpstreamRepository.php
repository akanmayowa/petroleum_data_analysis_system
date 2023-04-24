<?php

namespace App\Repositories;

use App\Traits\Opec;

class OpecGasUpstreamRepository
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
            case 'saveGasUpstream':

                return  $this->saveFutureGrossCapacity(\App\GasUpstream::class);
            default:
//                return $this->getCondensate();

        }
    }

    public function processGet($id)
    {
        switch ($id) {
            case 'manageGasUpstream':

                return $this->manageGasUpstream();

            default:
                return $this->getFutureGross();

        }
    }

    private function manageGasUpstream()
    {
        $year = $this->year;
        $gasReserve = $this->getUpReserve();
        $futureGrossCapacities = $this->getFutureGross();

        return view('opec.gas_upstream', compact('year', 'gasReserve', 'futureGrossCapacities'));
    }

    private function getUpReserve()
    {
        $up_reserves_gas = \App\up_reserves_gas::where('year', $this->year)->selectRaw('SUM(total_gas) as total_gas, sum(associated_gas) as associated_gas, sum(non_associated_gas) as non_associated_gas')->first();

        return array_map(function ($value) {
            return $this->convertTomsmc($value);
        }, $this->fixNullArray($up_reserves_gas));
    }

    private function saveFutureGrossCapacity($model)
    {
        $data = request()->except(['_token', 'year', 'a_id', 'type']);
        $realData = [];
        foreach ($data as $key=>$datum) {
            $rawVal = explode('_', $key);
            $realData[$rawVal[1]][] = [$rawVal[0]=>$datum];
        }

        return $this->cleanAndSaveFutureGrossCapacity($realData, $model);
    }

    private function cleanAndSaveFutureGrossCapacity(array $realData, $model)
    {
        foreach ($realData as $key=>$realValue) {
            $data = ['a_id'=>request()->a_id, 'year'=>$key, 'currentgrossassociated'=>$realValue[0]['currentgrossassociated'], 'currentgrossnonassociated'=>$realValue[1]['currentgrossnonassociated']];
            $model::updateOrCreate(['year'=>$key], $data);
        }

        return response()->json(['status'=>'success', 'message'=>'Operation Successful']);
    }

    private function getFutureGross()
    {
        return \App\GasUpstream::whereIn('year', $this->getYears())->get();
    }
}
