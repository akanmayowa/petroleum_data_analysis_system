<?php

namespace App\Http\Controllers;

use App\Traits\WorkflowTrait;
use Illuminate\Http\Request;

class WorkflowController extends Controller
{
    use WorkflowTrait;

    public function store(Request $request)
    {
        //
        return $this->processPost($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        return $this->processGet($id, $request);
    }
}
