<?php

namespace App\Http\Controllers\Opec;

use App\Http\Controllers\Controller;
use App\Repositories\OpecNglRepository;
use Illuminate\Http\Request;

class OpecNglController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $opecNgl;

    /**
     * Display a listing of the resource.
     *
     * @param OpecNglRepository $opecNgl
     */
    public function __construct(OpecNglRepository $opecNgl)
    {
        $this->opecNgl = $opecNgl;
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
        return $this->opecNgl->processPost();
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

        return $this->opecNgl->processGet($id);
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
