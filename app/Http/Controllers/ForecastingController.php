<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ForecastingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('microsoft');
    }

    //UPSTREAM
    public function forecasting()
    {
        return view('forecasting.index');
    }
}
