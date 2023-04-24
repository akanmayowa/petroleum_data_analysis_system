<?php

namespace App\Actions;

class IndexAction
{
    public function index()
    {
        $year = ['2011', '2012', '2013', '2014', '2015', '2016', '2017'];
        $Terrs = \App\Bala_block::distinct()->orderBy('basin_id', 'asc')->get(['basin_id']);

        $users_last_log = \App\user_login_history::orderBy('id', 'desc')->get();
        $users = \App\User::orderBy('id', 'asc')->get();

        return compact('year', 'Terrs', 'users_last_log', 'users');
    }
}
