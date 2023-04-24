<?php

namespace App\Http\Controllers;

use App\Notifications\emailDWPManager;
use DB;
use Excel;
use Illuminate\Http\Request;

class MPMController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('microsoft');
    }

    //function for sending email
    public function send_all_mail($upload_name)
    {
        //getting the number of DWP USERS
        $count = \App\User::where('role', '7')->get();
        //sending email to every DWP MANAGER
        foreach ($count as $dwp_manager) {
            $sender = $dwp_manager->email;
            $name = $dwp_manager->name;
            $message = ' Data for '.$upload_name.' has been uploaded/Modified by '.\Auth::user()->name.' into PRIS, please review and take necessary action.';

            \Auth::user()->notify(new emailDWPManager($message, $sender, $name));
            $dwp_manager->notify(new emailDWPManager($message, $sender, $name));
        }
    }

    //function to log action for audit trail
    public function log_audit_trail($record, $action)
    {
        $log = \App\AuditLogs::create([
            'user_id' => \Auth::user()->id,
            'section' => 'Ministerial KPI',
            'record' => $record,
            'action' => $action,
        ]);
    }

    public function index(Request $request)
    {
        $mpms = \App\mpm::orderBy('id', 'desc')->where('month', 'january')->paginate(10);

        $themic_areas = \App\themic_area::orderBy('themic_area_name', 'asc')->get();
        $result_areas = \App\key_result_area::orderBy('result_area_name', 'asc')->get();
        $kpis = \App\mpm_kpi::orderBy('kpi_name', 'asc')->get();
        $sources = \App\source::orderBy('source_name', 'asc')->get();
        $metrics = \App\metric::orderBy('metric_name', 'asc')->get();
        $frequency = \App\mpm_frequency_of_measurement::orderBy('frequency_name', 'asc')->get();

        //WAR
        $Wars = \App\war::orderBy('deliverables', 'asc')->get();
        $departments = \App\department::orderBy('department_name', 'asc')->get();
        $sta_cats = \App\status_category::orderBy('status', 'asc')->get();
        $Users = \App\User::orderBy('name', 'asc')->get();

        return view('ministerial-performance.index', compact('mpms', 'themic_areas', 'result_areas', 'kpis', 'sources', 'metrics', 'frequency', 'Wars', 'departments', 'sta_cats', 'Users'));
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

            case 'addmpm':
                return $this->addmpm($request);
            break;

            case 'uploadmpm':
                return $this->uploadmpm($request);
            break;

            case 'addwar':
                return $this->addwar($request);
            break;

            case 'uploadwar':
                return $this->uploadwar($request);
            break;

            case 'addthemic_area':
                return $this->addthemic_area($request);
            break;

            case 'uploadthemic_area':
                return $this->uploadthemic_area($request);
            break;

            case 'addkey_result_area':
                return $this->addkey_result_area($request);
            break;

            case 'uploadkey_result_area':
                return $this->uploadkey_result_area($request);
            break;

            case 'add_mpm_kpi':
                return $this->add_mpm_kpi($request);
            break;

            case 'upload_mpm_kpi':
                return $this->upload_mpm_kpi($request);
            break;

            case 'addsource':
                return $this->addsource($request);
            break;

            case 'uploadsource':
                return $this->uploadsource($request);
            break;

            case 'addmetric':
                return $this->addmetric($request);
            break;

            case 'uploadmetric':
                return $this->uploadmetric($request);
            break;

            case 'add_frequency_of_measurement':
                return $this->add_frequency_of_measurement($request);
            break;

            case 'upload_frequency_of_measurement':
                return $this->upload_frequency_of_measurement($request);
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
    public function show(Request $request, $route)
    {
        //
        switch ($route) {

            case 'modals_editMPM':
                // code...
                return $this->editMPM($request);
            break;

            case 'view_viewMPM':
                // code...
                return $this->viewMPM($request);
            break;

            case 'modals_editWARMPM':
                // code...
                return $this->editWARMPM($request);
            break;

            case 'view_viewWARMPM':
                // code...
                return $this->viewWARMPM($request);
            break;

            case 'modals_editThemicArea':
                // code...
                return $this->editThemicArea($request);
            break;

            case 'modals_editResultArea':
                // code...
                return $this->editResultArea($request);
            break;

            case 'modals_editMPMKPI':
                // code...
                return $this->editMPMKPI($request);
            break;

            case 'modals_editMPMSource':
                // code...
                return $this->editMPMSource($request);
            break;

            case 'modals_editMPMMetric':
                // code...
                return $this->editMPMMetric($request);
            break;

            case 'modals_editFrequencyOfMeasurement':
                // code...
                return $this->editFrequencyOfMeasurement($request);
            break;

            default:
                return $this->index($request);
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
    public function destroy($id)
    {
        //
    }

    public function addmpm2(Request $request)
    {
        $data = $request->all();
        $data2 = ['ajax'=>0];
        $data = (object) array_merge($data, $data2);

        return $this->addmpm($data);

        //send mail
        self::send_all_mail('Monthly Performance - Ministerial KPI ');
        //Audit Logging
        $id = $request->id;
        if ($id) {
            self::log_audit_trail('Ministerial KPI', 'Update Record');
        } else {
            self::log_audit_trail('Ministerial KPI', 'Add Record');
        }
    }

    public function addmpm($request, $type = 0)
    {
        try {
            //INSERTING NEW Ministerial Performance Management
            $month = ['january' => $request->january,
                'february' => $request->february,
                'march' => $request->march,
                'april' => $request->april,
                'may' => $request->may,
                'june' => $request->june,
                'july' => $request->july,
                'august' => $request->august,
                'september' => $request->september,
                'october' => $request->october,
                'november' => $request->november,
                'december' => $request->december,
            ];
            $id = 0;
            foreach ($month as $month => $value) {
                $add_mpm = \App\mpm::updateOrCreate(['year' => $request->year,
                    'themic_area_id' => $request->themic_area_id,
                    'key_result_area_id' => $request->key_result_area_id,
                    'kpi' => $request->kpi,
                    'source_id' => $request->source_id,
                    'metric_id' => $request->metric_id,
                    'frequency_of_measurement_id' => $request->frequency_of_measurement_id,
                    'month' => $month,
                ],
            [
                'year' => $request->year,
                'themic_area_id' => $request->themic_area_id,
                'key_result_area_id' => $request->key_result_area_id,
                'kpi' => $request->kpi,
                'source_id' => $request->source_id,
                'metric_id' => $request->metric_id,
                'frequency_of_measurement_id' => $request->frequency_of_measurement_id,
                'remark' => $request->remark,
                'mpm' => $value,
                'month' => $month,
                'created_by' => \Auth::user()->name,
            ]);
                if ($month == 'january') {
                    $id = $add_mpm->id;
                }
            }

            //send mail
            self::send_all_mail('Monthly Performance - Ministerial KPI ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Ministerial KPI', 'Update Record');
            } else {
                self::log_audit_trail('Ministerial KPI', 'Add Record');
            }

            $add_baseline = \App\mpmBaseline::updateOrCreate(['year'=>$request->year, 'mpm_id'=>$id],
          [
              'baseline' => $request->baseline,
              'year_target' => $request->year_target,
          ]);

            if ($type == 0) {
                if ($request->ajax == 1) {
                    $mpm_details = ['year'=>$add_mpm->year, 'themic_area'=>$add_mpm->themic_area->themic_area_name, 'result_area'=>$add_mpm->key_result_area->result_area_name, 'kpi'=>$add_mpm->kpis->kpi_name, 'source'=>$add_mpm->source->source_name, 'metric'=>$add_mpm->metric->metric_name, 'frequency_of_measurement'=>$add_mpm->frequency_of_measurement->frequency_name, 'baseline'=>$add_mpm->baseline, 'year_target'=>$add_mpm->year_target, 'january'=>$add_mpm->getMpm('january'), 'febuary'=>$add_mpm->getMpm('february'), 'march'=>$add_mpm->getMpm('march'), 'april'=>$add_mpm->getMpm('april'), 'may'=>$add_mpm->getMpm('may'), 'june'=>$add_mpm->getMpm('june'), 'july'=>$add_mpm->getMpm('july'), 'august'=>$add_mpm->getMpm('august'), 'september'=>$add_mpm->getMpm('september'), 'october'=>$add_mpm->getMpm('october'), 'november'=>$add_mpm->getMpm('november'), 'december'=>$add_mpm->getMpm('december'), 'remark'=>$add_mpm->remark, 'id'=>$add_mpm->id];

                    //send mail
                    self::send_all_mail('MINISTERIAL KPI - Ministerial Performance Management ');
                    //Audit Logging
                    $id = $request->id;
                    if ($id) {
                        self::log_audit_trail('Ministerial KPI Baseline', 'Update Record');
                    } else {
                        self::log_audit_trail('Ministerial KPI Baseline', 'Add Record');
                    }

                    return response()->json(['status'=>'ok', 'message'=>$mpm_details, 'info'=>'New Ministerial Performance Management Added Successfully.']);
                } else {
                    return redirect()->route('ministerial-performance.index')->with('info', 'Ministerial Performance Management Updated Successfully');
                }
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());

            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editMPM(Request $request)
    {
        $MPM = \App\mpm::where('id', $request->id)->first();

        return view('ministerial-performance.modals.editMPM', compact('MPM'));
    }

    public function uploadmpm(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            $getFile = $request->file('file');

            $data = \Excel::load($getFile->getrealPath(), function ($reader) {
                $reader->noHeading()->skipRows(1);
            })->get()[0];

            foreach ($data as $data) {
                if (! is_null($data[0])) {
                    $data = (object) [
                        'year'=>$data[0],
                        'themic_area_id'=>$data[1],
                        'key_result_area_id'=>$data[2],
                        'kpi'=>$data[2],
                        'source_id'=>$data[3],
                        'metric_id'=>$data[4],
                        'frequency_of_measurement_id'=>$data[5],
                        'baseline'=>$data[6],
                        'year_target'=>$data[7],
                        'month'=>$data[8],
                        'january'=>$data[9],
                        'february'=>$data[10],
                        'march'=>$data[11],
                        'april'=>$data[12],
                        'may'=>$data[13],
                        'june'=>$data[14],
                        'july'=>$data[15],
                        'august'=>$data[16],
                        'september'=>$data[17],
                        'october'=>$data[18],
                        'november'=>$data[19],
                        'december'=>$data[20],
                        'remark'=>$data[21],
                    ];
                    $this->addmpm($data, 'excel');
                }
            }

            //send mail
            self::send_all_mail('MINISTERIAL KPI - Ministerial Performance Management ');
            //Audit Logging
            self::log_audit_trail('MINISTERIAL KPI ', 'Data Bulk Upload');

            return redirect()->route('ministerial-performance.index')->with('info', 'Ministerial Performance Management Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewMPM(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Ministerial KPI', 'Viewed Data');
        $MPM = \App\mpm::where('id', $request->id)->first();

        return view('ministerial-performance.view.viewMPM', compact('MPM'));
    }

    public function download_mpm($type)
    {
        //Audit Logging
        self::log_audit_trail('Ministerial KPI', 'Downloaded Data');
        $data = \App\mpm::get();
        $view = 'ministerial-performance.excel.mpm_excel';

        return     \Excel::create('Monthly Ministerial KPI', function ($excel) use ($view, $data) {
            $excel->sheet('Ministerial KPI', function ($sheet) use ($view, $data) {
                $sheet->loadView("$view", compact('data'))->setOrientation('landscape');
            });
        })->export('xlsx');
    }

    public function viewNetCashFlow(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Net Cash Flow', 'Viewed Data');

        $net_cash_flows = \App\MPM::where('year', $request->year)->where('themic_area_id', $request->themic_area)->limit(12)->get();
        $flows = \App\MPM::where('year', $request->year)->where('month', 'january')->where('themic_area_id', $request->themic_area)->get();
        $themic_area_name = \App\themic_area::where('id', $request->themic_area)->first();

        $expenditures = \App\MpmExpenditure::where('year', $request->year)->limit(12)->get();

        $year = $request->year;
        $themic_area = $request->themic_area;

        return view('ministerial-performance.net-cash-flow', compact('flows', 'year', 'themic_area', 'themic_area_name', 'expenditures'));
    }

    //WAR
    public function addwar(Request $request)
    {
        try {
            //INSERTING NEW Weekly Activity Report
            $add_war = \App\war::updateOrCreate(['id'=> $request->id],
            [
                'deliverables' => $request->deliverables,
                'department_id' => $request->department_id,
                'status_id' => $request->status_id,
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'created_by' => \Auth::user()->name,
            ]);

            if ($request->ajax()) {
                $mpm_details = ['deliverables'=>$add_war->deliverables, 'department'=>$add_war->department->department_name, 'status'=>$add_war->status->status, 'from_date'=>$add_war->from_date, 'to_date'=>$add_war->to_date, 'id'=>$add_war->id];

                //send mail
                self::send_all_mail('WEEKLY ACTIVITY REPORT - Weekly Activity Report ');
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Weekly Activity Report ', 'Update Record');
                } else {
                    self::log_audit_trail('Weekly Activity Report ', 'Add Record');
                }

                return response()->json(['status'=>'ok', 'message'=>$mpm_details, 'info'=>'New Weekly Activity Report Added Successfully.']);
            } else {
                return redirect()->route('ministerial-performance.index')->with('info', 'Weekly Activity Report Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editWARMPM(Request $request)
    {
        $WAR_ = \App\war::where('id', $request->id)->first();

        return view('ministerial-performance.modals.editWARMPM', compact('WAR_'));
    }

    public function uploadwar(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $created_by = \Auth::user()->name;

                    //INSERTING NEW
                    $add_ = \App\war::updateOrCreate(['id'=> $request->id],
                        [
                            'deliverables' => $row['A'],
                            'department_id' => $row['B'],
                            'status_id' => $row['C'],
                            'from_date' => $row['D'],
                            'to_date' => $row['E'],
                            'created_by' => $created_by,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('WEEKLY ACTIVITY REPORT - Weekly Activity Report ');
            //Audit Logging
            self::log_audit_trail('Weekly Activity Report', 'Data Bulk Upload');

            return redirect()->route('ministerial-performance.index')->with('info', 'Weekly Activity Report Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewWARMPM(Request $request)
    {
        $WAR = \App\war::where('id', $request->id)->first();

        return view('ministerial-performance.view.viewWARMPM', compact('WAR'));
    }

    public function download_war($type)
    {
        $data = \App\war::get()->toArray();

        return Excel::create('Weekly Activity Report', function ($excel) use ($data) {
            $excel->sheet('WAR', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function addthemic_area(Request $request)
    {
        try {
            //INSERTING NEW Themic Area
            $add_themic = \App\themic_area::updateOrCreate(['id'=> $request->id],
          [
              'year' => $request->year,
              'themic_area_name' => $request->themic_area_name,
              'created_by' => \Auth::user()->name,
          ]);

            //send mail
            self::send_all_mail('MINISTERIAL KPI Master Data - Thematic Area ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Thematic Area', 'Update Record');
            } else {
                self::log_audit_trail('Thematic Area', 'Add Record');
            }

            if ($request->ajax()) {
                $themic_details = ['themic_area'=>$add_themic->themic_area_name, 'year'=>$add_themic->year, 'id'=>$add_themic->id];

                return response()->json(['status'=>'ok', 'message'=>$themic_details, 'info'=>'New Themic Area Added Successfully.']);
            } else {
                return redirect()->route('ministerial-performance.index')->with('info', 'Themic Area Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editThemicArea(Request $request)
    {
        $themics = \App\themic_area::where('id', $request->id)->first();

        return view('ministerial-performance.modals.editThemicArea', compact('themics'));
    }

    public function uploadthemic_area(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING NEW
                    $add_ = \App\themic_area::updateOrCreate(['id'=> $request->id],
                        [
                            'themic_area_name' => $row['A'],
                            'year' => $row['B'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('MINISTERIAL KPI Master Data - Thematic Area ');
            //Audit Logging
            self::log_audit_trail('Thematic Area', 'Data Bulk Upload');

            return redirect()->route('ministerial-performance.index')->with('info', 'Themic Area Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_themic_area($type)
    {
        //Audit Logging
        self::log_audit_trail('Thematic Area', 'Downloaded Data');
        $data = \App\themic_area::get()->toArray();

        return Excel::create('MPM Themic Area', function ($excel) use ($data) {
            $excel->sheet('Themic Area', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function addkey_result_area(Request $request)
    {
        try {
            //INSERTING NEW key Result Area
            $add_key_result = \App\key_result_area::updateOrCreate(['id'=> $request->id],
          [
              'year' => $request->year,
              'result_area_name' => $result_area_name,
              'created_by' => \Auth::user()->name,
          ]);

            //send mail
            self::send_all_mail('MINISTERIAL KPI Master Data - Key Result Area ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Key Result Area', 'Update Record');
            } else {
                self::log_audit_trail('Key Result Area', 'Add Record');
            }

            if ($request->ajax()) {
                $kra_details = ['year'=>$add_key_result->year, 'result_area'=>$add_key_result->result_area_name, 'id'=>$add_key_result->id];

                return response()->json(['status'=>'ok', 'message'=>$kra_details, 'info'=>'New Key Result Area Added Successfully.']);
            } else {
                return redirect()->route('ministerial-performance.index')->with('info', 'Key Result Area Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editResultArea(Request $request)
    {
        $kra = \App\key_result_area::where('id', $request->id)->first();

        return view('ministerial-performance.modals.editResultArea', compact('kra'));
    }

    public function uploadkey_result_area(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $created_by = \Auth::user()->name;

                    //INSERTING NEW
                    $add_ = \App\key_result_area::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'result_area_name' => $row['B'],
                            'created_by' => $created_by,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('MINISTERIAL KPI Master Data - Key Result Area ');
            //Audit Logging
            self::log_audit_trail('Key Result Area', 'Data Bulk Upload');

            return redirect()->route('ministerial-performance.index')->with('info', 'Key Result Area Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_key_result_area($type)
    {
        //Audit Logging
        self::log_audit_trail('Key Result Area', 'Downloaded Data');
        $data = \App\key_result_area::get()->toArray();

        return Excel::create('MPM Key Result Area', function ($excel) use ($data) {
            $excel->sheet('Key Result Area', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_mpm_kpi(Request $request)
    {
        try {
            //INSERTING NEW KPI
            $add_KPI = \App\mpm_kpi::updateOrCreate(['id'=> $request->id],
          [
              'year' => $request->year,
              'kpi_name' => $request->kpi_name,
              'created_by' => \Auth::user()->name,
          ]);

            //send mail
            self::send_all_mail('MINISTERIAL KPI Master Data - Key Performance Index (KPI) ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data - KPI', 'Update Record');
            } else {
                self::log_audit_trail('Master Data - KPI', 'Add Record');
            }

            if ($request->ajax()) {
                $KPI_details = ['year'=>$add_KPI->year, 'kpi_name'=>$add_KPI->kpi_name, 'id'=>$add_KPI->id];

                return response()->json(['status'=>'ok', 'message'=>$KPI_details, 'info'=>'New Key Performance Index (KPI) Added Successfully.']);
            } else {
                return redirect()->route('ministerial-performance.index')->with('info', 'Key Performance Index (KPI) Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editMPMKPI(Request $request)
    {
        $KPI = \App\mpm_kpi::where('id', $request->id)->first();

        return view('ministerial-performance.modals.editMPMKPI', compact('KPI'));
    }

    public function upload_mpm_kpi(Request $request)
    {
        $allowedExt = ['.csv', '.xlsx', '.txt'];
        if (in_array($request->file->getClientOriginalExtension(), $allowedExt)) {
            return redirect()->back('/')->with('error', 'Error Processing Request');
        }

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING NEW
                    $add_ = \App\mpm_kpi::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'kpi_name' => $row['A'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('MINISTERIAL KPI Master Data - Key Performance Index (KPI) ');
            //Audit Logging
            self::log_audit_trail('Master Data - KPI', 'Data Bulk Upload');

            return redirect()->route('ministerial-performance.index')->with('info', 'Key Performance Index (KPI) Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_mpm_kpi($type)
    {
        //Audit Logging
        self::log_audit_trail('Key Performance Index (KPI)', 'Downloaded Data');
        $data = \App\mpm_kpi::get()->toArray();

        return Excel::create('MPM Key Performance Index', function ($excel) use ($data) {
            $excel->sheet('Key Performance Index', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function addsource(Request $request)
    {
        try {
            $source_name = $request->source_name;
            $created_by = \Auth::user()->name;

            //INSERTING NEW SOURCE
            $add_source = \App\source::updateOrCreate(['id'=> $request->id],
          [
              'source_name' => $source_name,
              'created_by' => $created_by,
          ]);

            //send mail
            self::send_all_mail('MINISTERIAL KPI Master Data - Source ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data - Source', 'Update Record');
            } else {
                self::log_audit_trail('Master Data - Source', 'Add Record');
            }

            if ($request->ajax()) {
                $source_details = ['source'=>$add_source->source_name, 'id'=>$add_source->id];

                return response()->json(['status'=>'ok', 'message'=>$source_details, 'info'=>'New Source Added Successfully.']);
            } else {
                return redirect()->route('ministerial-performance.index')->with('info', 'Source Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editMPMSource(Request $request)
    {
        $sources = \App\source::where('id', $request->id)->first();

        return view('ministerial-performance.modals.editMPMSource', compact('sources'));
    }

    public function uploadsource(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $created_by = \Auth::user()->name;

                    //INSERTING NEW
                    $add_ = \App\source::updateOrCreate(['id'=> $request->id],
                        [
                            'source_name' => $row['A'],
                            'created_by' => $created_by,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('MINISTERIAL KPI Master Data - Source ');
            //Audit Logging
            self::log_audit_trail('Master Data - Source', 'Data Bulk Upload');

            return redirect()->route('ministerial-performance.index')->with('info', 'Source Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_source($type)
    {
        //Audit Logging
        self::log_audit_trail('Source', 'Downloaded Data');
        $data = \App\source::get()->toArray();

        return Excel::create('MPM Source', function ($excel) use ($data) {
            $excel->sheet('Source', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function addmetric(Request $request)
    {
        try {
            $metric_name = $request->metric_name;
            $created_by = \Auth::user()->name;

            //INSERTING NEW METRIC
            $add_metric = \App\metric::updateOrCreate(['id'=> $request->id],
          [
              'metric_name' => $metric_name,
              'created_by' => $created_by,
          ]);

            //send mail
            self::send_all_mail('MINISTERIAL KPI Master Data - Metric ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data Metric', 'Update Record');
            } else {
                self::log_audit_trail('Master Data Metric', 'Add Record');
            }

            if ($request->ajax()) {
                $metric_details = ['metric'=>$add_metric->metric_name, 'id'=>$add_metric->id];

                return response()->json(['status'=>'ok', 'message'=>$metric_details, 'info'=>'New Metric Added Successfully.']);
            } else {
                return redirect()->route('ministerial-performance.index')->with('info', 'Metric Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editMPMMetric(Request $request)
    {
        $metrics = \App\metric::where('id', $request->id)->first();

        return view('ministerial-performance.modals.editMPMMetric', compact('metrics'));
    }

    public function uploadmetric(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $created_by = \Auth::user()->name;

                    //INSERTING NEW
                    $add_ = \App\metric::updateOrCreate(['id'=> $request->id],
                        [
                            'metric_name' => $row['A'],
                            'created_by' => $created_by,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('MINISTERIAL KPI Master Data - Metric ');
            //Audit Logging
            self::log_audit_trail('Master Data - Metric', 'Data Bulk Upload');

            return redirect()->route('ministerial-performance.index')->with('info', 'Metric Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_metric($type)
    {
        //Audit Logging
        self::log_audit_trail('Metric', 'Downloaded Data');
        $data = \App\metric::get()->toArray();

        return Excel::create('MPM Metric', function ($excel) use ($data) {
            $excel->sheet('Metric', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_frequency_of_measurement(Request $request)
    {
        try {
            //INSERTING NEW Frequency of Measurement
            $add_fom = \App\mpm_frequency_of_measurement::updateOrCreate(['id'=> $request->id],
          [
              'frequency_name' => $request->frequency_name,
              'created_by' => \Auth::user()->name,
          ]);

            //send mail
            self::send_all_mail('MINISTERIAL KPI Master Data - Frequency of Measurement '); //Audit Logging
                $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data - Frequency of Measurement', 'Update Record');
            } else {
                self::log_audit_trail('Master Data - Frequency of Measurement', 'Add Record');
            }

            if ($request->ajax()) {
                $fom_details = ['frequency_name'=>$add_fom->frequency_name, 'id'=>$add_fom->id];

                return response()->json(['status'=>'ok', 'message'=>$fom_details, 'info'=>'New Frequency of Measurement Added Successfully.']);
            } else {
                return redirect()->route('ministerial-performance.index')->with('info', 'Frequency of Measurement Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editFrequencyOfMeasurement(Request $request)
    {
        $FREQUENCY = \App\mpm_frequency_of_measurement::where('id', $request->id)->first();

        return view('ministerial-performance.modals.editFrequencyOfMeasurement', compact('FREQUENCY'));
    }

    public function upload_frequency_of_measurement(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING NEW
                    $add_ = \App\mpm_frequency_of_measurement::updateOrCreate(['id'=> $request->id],
                        [
                            'frequency_name' => $row['A'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('MINISTERIAL KPI Master Data - Frequency of Measurement ');
            //Audit Logging
            self::log_audit_trail('Master Data - Frequency of Measurement', 'Data Bulk Upload');

            return redirect()->route('ministerial-performance.index')->with('info', 'Frequency of Measurement Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('ministerial-performance.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_frequency_of_measurement($type)
    {
        //Audit Logging
        self::log_audit_trail('Measurement Frequency', 'Downloaded Data');
        $data = \App\mpm_frequency_of_measurement::get()->toArray();

        return Excel::create('MPM Frequency of Measurement', function ($excel) use ($data) {
            $excel->sheet('Frequency of Measurement', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
}
