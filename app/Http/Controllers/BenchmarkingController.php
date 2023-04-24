<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class BenchmarkingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('microsoft');
    }

    //BENCHMARKING
    public function benchmarkandcomparism()
    {
        return view('benchmark&comparism.index');
    }
}
