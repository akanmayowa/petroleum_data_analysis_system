<?php

namespace App\Repositories;

use App\Traits\Opec;
use Carbon\Carbon;

class OpecCrudeRepository
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
    //dd($this->year);

    public function processPost()
    {
        switch (request()->type) {
            case 'saveCrude':
                return $this->saveData(\App\OpecCrude::class);
            default:
                return response()->json(['status'=>'error', 'message'=>'invalid route'], 404);
        }
    }

    public function processGet($id)
    {
        switch ($id) {
            case 'manageCrude':
                return $this->manageCrude();
            case 'getCrudeCalc':
                return $this->getCrudeCalc();
            default:
                return response()->json(['status'=>'error', 'message'=>'invalid route'], 404);
        }
    }

    public function manageCrude()
    {
        $monthly = $this->getCrudeCalc();
        $monthlyStream = $this->getCrudeCalcStream();
        $sumTotal = $this->convertToBopdYear($monthly);
        $sumTotalStream = $this->convertToBopdStreamYear($monthlyStream);
//        return ;
        $crudeExports = $this->getCrudeExportQuarter();
        $OpecCrudes = \App\OpecCrude::where('year', $this->year)->first();
        $OpecCrudes = is_null($OpecCrudes) ? [] : $OpecCrudes->toArray();
        // $year=request()->has('year') ? request()->year: date('Y') ;
        if ($year = request()->has('year')) {
            $year = request()->year;
        } else {
            $year = (date('Y')) - 1;
        }
        $exportTotal = 0;
        $Q_Day = $this->getQdays();
        $streams = $this->getStream(\App\down_terminal_stream_prod::class);

        if (request()->has('excel')) {
            return $this->toExcel(compact('sumTotalStream', 'monthly', 'monthlyStream', 'streams', 'sumTotal', 'crudeExports', 'year', 'exportTotal', 'OpecCrudes', 'Q_Day'), 'CrudeExport', 'opec.crude');
        }

        return view('opec.crude', compact('sumTotalStream', 'monthly', 'monthlyStream', 'sumTotal', 'streams', 'crudeExports', 'year', 'exportTotal', 'OpecCrudes', 'Q_Day'));
    }

    public function getMonthlyData($model)
    {
        $monthlydata = $this->fixNullArray($model::selectRaw('SUM(january) as january,SUM(febuary) AS february, sum(march) as march ,sum(april) as april ,sum(may) as may ,sum(june) as june , sum(july) as july, sum(august) as august,sum(september) as september,sum(october) as october,sum(november) as november,sum(december) as december')->where('year', $this->year)->first());

        return $monthlydata;
    }

    //stream_id
    public function getMonthlyDataStream($model)
    {
        $monthlydataStream = $model::selectRaw('SUM(january) as january,SUM(febuary) AS february, sum(march) as march ,sum(april) as april ,sum(may) as may ,sum(june) as june , sum(july) as july, sum(august) as august,sum(september) as september,sum(october) as october,sum(november) as november,sum(december) as december,stream_id')->where('year', $this->year)->groupBy('stream_id')->get()->toArray();

        return $monthlydataStream;
    }

    public function getCrudeCalcStream()
    {
        $down_terminal_stream_prod = $this->getMonthlyDataStream(\App\down_terminal_stream_prod::class);
//        return $down_terminal_stream_prod;
        return $this->converToBopdStream($down_terminal_stream_prod);
    }

//    get mothly crude
    public function getCrudeCalc()
    {
        $down_terminal_stream_prod = $this->getMonthlyData(\App\down_terminal_stream_prod::class);

        return $this->convertToBopd($down_terminal_stream_prod);
    }

    public function getCrudeExportQuarter()
    {
        $crudeExport = $this->getMonthlyData(\App\down_monthly_summary_crude_export::class);

        return $this->converToQuarterBopd($crudeExport);
    }
}
