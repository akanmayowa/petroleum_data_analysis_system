<?php

namespace App\Repositories;

use App\Traits\Opec;

class OpecGasBalanceRepository
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
            case 'saveGasBalance':
//                return request()->all();
                return  $this->saveData(\App\GasBalance::class);
            default:
                return response()->json(['status'=>'error', 'message'=>'Route Not Found']);

        }
    }

    public function processGet($id)
    {
        switch ($id) {
            case 'manageGasBalance':
//return $this->getGasUtilization();
                return $this->manageGasBalance();

            default:
//                return $this->getCondensate();

        }
    }

    private function manageGasBalance()
    {
        $year = $this->year;
        $gasProduction = $this->getGasProduction();
        $gasUtilization = $this->getGasUtilization();
        $gasBalance = \App\GasBalance::where('year', $this->year)->value('gasBalance');
        $gasBalance = explode(',', $gasBalance);
        $export = $this->converToCubic(\App\gas_summary_of_gas_utilization::where('year', $year)->sum('nlng_export'));
//        return $gasBalance;
        return view('opec.gas_balance', compact('year', 'gasProduction', 'gasUtilization', 'gasBalance', 'export'));
    }

    public function getGasProduction()
    {
        $gasPorduction = \App\gas_summary_of_gas_production::where('year', $this->year)->selectRaw('SUM(total) as totalgas')->value('totalgas');

        return $this->converToCubic($gasPorduction);
    }

    public function getGasUtilization()
    {
        $gasUtilization = \App\gas_summary_of_gas_utilization::where('year', $this->year)->selectRaw('SUM(total_gas_flared) as total_gas_flared , (SUM(fuel_gas) + SUM(gas_lift)) as ownuse, SUM(re_injection) as re_injection , SUM(shrinkage) as shrinkage ,SUM(gas_to_nipp) as gas_to_nipp')->first()->toArray();

        return collect($gasUtilization)->map(function ($value) {
            return $this->converToCubic($value);
        });
    }
}
