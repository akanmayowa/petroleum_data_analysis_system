<?php

namespace App\Http\Controllers;

use App\Http\Resources\WARLegal as WARLegalResource;
use App\Http\Resources\WARPAU as WARPAUResource;
use App\Notifications\emailNOGIARManager;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WARPublicAffairController extends Controller
{
    public function __construct(Request $request)
    {
        \Auth::loginUsingId($request->user_id);
    }

    //function for sending email
    public function send_all_mail($request, $upload_name)
    {
        //getting the number of Weekly Activity Report USERS
        $UserObj = \App\User::where('id', $request->user_id)->first();
        $count = \App\User::where('id', 13)->orWhere('id', 15)->orWhere('id', 19)->get();
        //sending email to every Weekly Activitiy Report MANAGER
        foreach ($count as $WAR) {
            $sender = $WAR->email;
            $name = $WAR->name;
            $message = ', Weekly Activitiy Report Data for '.$upload_name.' was entered by '.$UserObj->name.' into PRIS, please review and take necessary action.';

            // \Auth::user()->notify(new emailNOGIARManager( $message, $sender, $name));
            $WAR->notify(new emailNOGIARManager($message, $sender, $name));
        }
    }

    //function to log action for audit trail
    public function log_audit_trail($request, $record, $action)
    {
        $log = \App\AuditLogs::create([
            'user_id' => $request->user_id,
            'section' => 'Weekly Activitiy Report',
            'record' => $record,
            'action' => $action,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        switch ($request->type) {
            case 'pau':
                return $this->AddPAU($request);
            break;

            case 'legal':
                return $this->AddLegal($request);
            break;

            default:
                // code...
            break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        switch ($type) {
            case 'pau':
                $pau = \App\WARPAU::findOrFail($id);

                return new WARPAUResource($pau);
            break;

            case 'legal':
                $legal = \App\WARLegal::findOrFail($id);

                return new WARLegalResource($legal);
            break;

            default:
                // code...
            break;
        }
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
    public function destroy($id, $type)
    {
        //
        switch ($type) {
            case 'pau':
                $pau = \App\WARPAU::findOrFail($id);
                if ($pau->delete()) {
                    return new WARPAUResource($pau);
                }
            break;

            case 'legal':
                $legal = \App\WARLegal::findOrFail($id);
                if ($legal->delete()) {
                    return new WARLegalResource($legal);
                }
            break;

            default:
                // code...
            break;
        }
    }

    public function uploading(Request $request)
    {
        switch ($request->type) {
            case 'pau':
                return $this->uploadPublicAffair($request);
            break;

            case 'legal':
                return $this->uploadLegal($request);
            break;

            default:
                // code...
            break;
        }
    }

    public function indexPAU(Request $request)
    {
        //
        if ($request->filled('all')) {
            $paus = \App\WARPAU::orderBy('id', 'desc')->get();

            return ['data'=>$paus];
        } else {
            $paus = \App\WARPAU::orderBy('id', 'desc')->paginate(15);

            return WARPAUResource::collection($paus);
        }
    }

    public function AddPAU(Request $request)
    {
        $pau = $request->isMethod('put') ? \App\WARPAU::findOrFail($request->pau_id) : new \App\WARPAU;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $pau->id = $request->pau_id;
            $pau->date = date('Y-m-d', strtotime($request->date));
            $pau->week = $request->week;
            $pau->meeting_conference_attended = $request->meeting_conference_attended;
            $pau->consular_liason_visa_support = $request->consular_liason_visa_support;

            //send mail
            $this->send_all_mail($request, 'Public Affair Unit - Public Affairs');
            //Audit Logging
            $this->log_audit_trail($request, 'Public Affairs', 'Updated Record');
        } else {
            // $pau->id = $request->pau_id;
            $pau->date = date('Y-m-d', strtotime($request->date));
            $pau->week = $request->week;
            $pau->meeting_conference_attended = $request->meeting_conference_attended;
            $pau->consular_liason_visa_support = $request->consular_liason_visa_support;
            $pau->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Public Affair Unit - Public Affairs');
            //Audit Logging
            $this->log_audit_trail($request, 'Public Affairs', 'Added Record');
        }

        if ($pau->save()) {
            return new WARPAUResource($pau);
        }
    }

    public function uploadPublicAffair(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING BULK
                    $day = Carbon::createFromFormat('m/d/Y', $row['A'])->format('Y-m-d');
                    $uploaded = \App\WARPAU::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'meeting_conference_attended' => $row['C'],
                        'consular_liason_visa_support' => $row['D'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Public Affair Unit - Public Affairs');
            //Audit Logging
            $this->log_audit_trail($request, 'Public Affairs', 'Bulk Data Upload');

            $paus = \App\WARPAU::orderBy('id', 'desc')->paginate(15);

            return WARPAUResource::collection($paus);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexLegal(Request $request)
    {
        //
        if ($request->filled('all')) {
            $legals = \App\WARLegal::orderBy('id', 'desc')->get();

            return ['data'=>$legals];
        } else {
            $legals = \App\WARLegal::orderBy('id', 'desc')->paginate(15);

            return WARLegalResource::collection($legals);
        }
    }

    public function AddLegal(Request $request)
    {
        $legal = $request->isMethod('put') ? \App\WARLegal::findOrFail($request->legal_id) : new \App\WARLegal;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $legal->id = $request->legal_id;
            $legal->date = date('Y-m-d', strtotime($request->date));
            $legal->week = $request->week;
            $legal->court_cases = $request->court_cases;
            $legal->agreement_executed = $request->agreement_executed;

            //send mail
            $this->send_all_mail($request, 'Public Affair Unit - legal');
            //Audit Logging
            $this->log_audit_trail($request, 'legal', 'Updated Record');
        } else {
            // $legal->id = $request->legal_id;
            $legal->date = date('Y-m-d', strtotime($request->date));
            $legal->week = $request->week;
            $legal->court_cases = $request->court_cases;
            $legal->agreement_executed = $request->agreement_executed;
            $legal->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Public Affair Unit - legal');
            //Audit Logging
            $this->log_audit_trail($request, 'legal', 'Added Record');
        }

        if ($legal->save()) {
            return new WARLegalResource($legal);
        }
    }

    public function uploadLegal(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING BULK
                    $day = Carbon::createFromFormat('m/d/Y', $row['A'])->format('Y-m-d');
                    $uploaded = \App\WARLegal::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'court_cases' => $row['C'],
                        'agreement_executed' => $row['D'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Public Affair Unit - Legal');
            //Audit Logging
            $this->log_audit_trail($request, 'Legal', 'Bulk Data Upload');

            $legals = \App\WARLegal::orderBy('id', 'desc')->paginate(15);

            return WARLegalResource::collection($legals);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexPublicAffairMonthlyActivity($path, $year, Request $request)
    {
        $path = explode('/', $request->path());
        switch ($path[2]) {
            case 'public_affair':
                return $this->getMonthlyPublicAffairReportPublicAffair($request);
            break;

            case 'legal':
                return $this->getMonthlyPublicAffairReportLegal($request);
            break;

            default:
                return $this->getMonthlyPublicAffairReportPublicAffair($request);
            break;
        }
    }

    public function getMonthlyData(Request $request, $datas, $model)
    {
        // return date('W');
        $year_f = substr($request->year, 0, 4);
        $year_from = $year_f.'-01-01';
        $year_to = $year_f.'-12-31';
        $monthVal = [];
        $monthWeek = ['jan'=>[1, 5], 'feb'=>[6, 9], 'mar'=>[10, 13], 'qrt1'=>[1, 13], 'apr'=>[14, 18], 'may'=>[19, 22], 'jun'=>[23, 26],
            'qrt2'=>[14, 26], 'm_yr'=>[1, 26],
            'jul'=>[27, 30], 'aug'=>[31, 35], 'sep'=>[36, 39], 'qrt3'=>[27, 39], 'oct'=>[40, 44], 'nov'=> [45, 48], 'dec'=>[49, 52],
            'qrt4'=>[40, 52], 'ann'=>[1, 52], ];

        foreach ($monthWeek as $months=>$weeks) {
            $weeks = (array) $weeks;
            for ($i = min($weeks); $i <= max($weeks); $i++) {
                $weekArr[$months][] = "Week $i";
            }

            foreach ($datas as $data=>$descrption) {
                $monthVal[$data][$months] = $model::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                           ->whereIn('week', $weekArr[$months])
                                           ->sum($data);
            }
        }

        $mergedVal = [];
        foreach ($monthVal as $key=>$value) {
            $mergedVal[] = array_merge($value, ['name'=>$datas[$key]]);
        }

        return $mergedVal;

        // return $list;
    }

    public function getMonthlyPublicAffairReportPublicAffair(Request $request)
    {
        $data = ['meeting_conference_attended'=>'No.of Meeting and Conferences Attended',
            'consular_liason_visa_support'=>'Consular Liaison – Visa Support Letters – No',
        ];

        return $this->getMonthlyData($request, $data, \App\WARPAU::class);
    }

    public function getMonthlyPublicAffairReportLegal(Request $request)
    {
        $data = ['court_cases'=>'No. of Court Cases',
            'agreement_executed'=>'No.of Agreements Executed',
        ];

        return $this->getMonthlyData($request, $data, \App\WARLegal::class);
    }
}
