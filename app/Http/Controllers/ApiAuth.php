<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ApiAuth extends Controller
{
    //

    public function checkAuth()
    {
        if (Auth::user()) {
            return [
                'message'=>'Currently loggedin',
                'error'=>false,
                'data'=>Auth::user(),
            ];
        } else {
            return [
                'message'=>'Session expired.',
                'error'=>true,
                'data'=>null,
            ];
        }
    }
}
