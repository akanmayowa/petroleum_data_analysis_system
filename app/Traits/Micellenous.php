<?php

namespace App\Traits;

use App\Notifications\emailNOGIARManager;

trait Micellenous
{
    public function exportToBalaExcel($datas, $view)
    {
        return     \Excel::create("$view", function ($excel) use ($datas, $view) {
            $excel->sheet("$view", function ($sheet) use ($datas, $view) {
                $sheet->loadView("export.$view", compact('datas'))
                ->setOrientation('landscape');
            });
        })->export('xlsx');
    }

    //function for sending email
    public function send_all_mail($upload_name, $target_role)
    {
        //getting the number of DWP USERS
        $count = \App\User::where('role', $target_role)->get();
        //sending email to every DWP MANAGER
        foreach ($count as $manager) {
            $sender = $manager->email;
            $name = $manager->name;
            $message = ', Data for '.$upload_name.' has been uploaded/Modified by '.\Auth::user()->name.' into PRIS, please review and take necessary action.';

            \Auth::user()->notify(new emailNOGIARManager($message, $sender, $name));
            $manager->notify(new emailNOGIARManager($message, $sender, $name));
        }

        return 'success';
    }

    //function for sending approved email
    public function send_approve_mail($message, $target_role)
    {
        //getting the number of DWP USERS
        $count = \App\User::where('role', $target_role)->get();
        //sending email to every DWP MANAGER
        foreach ($count as $manager) {
            $sender = $manager->email;
            $name = $manager->name;
            // $message =  $nogiar_manager->name.",  Data for ".$upload_name." has been uploaded/Modified by ". \Auth::user()->name." into PRIS, please review and take necessary action.";

            \Auth::user()->notify(new emailNOGIARManager($message, $sender, $name));
            $manager->notify(new emailNOGIARManager($message, $sender, $name));
        }

        return 'success';
    }

    public function QuickInsight()
    {
        $groupId = env('QI_GROUPID', '');
        $dataSetId = env('QI_DATASETID', '');
        $response = \Curl::to("https://api.powerbi.com/v1.0/myorg/groups/$groupId/datasets/$dataSetId/GenerateToken")
        ->withHeader('Authorization:Bearer '.$this->plugPowerBI())
        ->withData(['accessLevel'=>'view'])
        ->asJson()
        ->post();
        // 572f20f0-947c-42b4-a2e4-2faa5a18a786/datasets/d8340c85-6c25-43c6-b1fd-9198f48b9403
        // dd($response);
        return $response->token;
    }

    public function plugPowerBI()
    {
        $auth_data =
        [
            'grant_type'=>'password',
            'client_id'=>env('POW_CLIENT_ID', ''),
            'client_secret'=> env('POW_CLIENT_SECRET', ''),
            'resource'=>'https://analysis.windows.net/powerbi/api',
            'username'=> env('POW_USERNAME', ''),
            'password'=> env('POW_PASSWORD', ''),
            'scope'=>'openid',
        ];
        // if(session()->has('access_token') && session('access_token')!=''){
        //         return session('access_token');
        //     }
        $response = \Curl::to('https://login.microsoftonline.com/snapnet.com.ng/oauth2/token')
          ->withData($auth_data)
          ->post();
        $response = json_decode($response);

        if (! isset($response->access_token)) {
            \Auth::logout();

            return 'Error';
        }

        session(['access_token'=>$response->access_token]);

        return $response->access_token;
    }

    public function getYearRange($year, $range)
    {
        $getRange = [];
        for ($i = $year - $range; $i <= $year; $i++) {
            $getRange[] = $i;
        }

        return $getRange;
    }
}
