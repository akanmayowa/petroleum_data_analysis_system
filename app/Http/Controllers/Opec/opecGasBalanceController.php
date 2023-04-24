<?php

namespace App\Http\Controllers\Opec;

use App\Http\Controllers\Controller;
use App\Repositories\OpecGasBalanceRepository;
use Illuminate\Http\Request;

class opecGasBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $opecGasBalance;

    /**
     * Display a listing of the resource.
     *
     * @param OpecGasBalanceRepository $opecGasBalance
     */
    public function __construct(OpecGasBalanceRepository $opecGasBalance)
    {
        $this->opecGasBalance = $opecGasBalance;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $this->opecGasBalance->processPost();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return string|void
     */
    public function show($id, Request $request)
    {
        //

        return $this->opecGasBalance->processGet($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
