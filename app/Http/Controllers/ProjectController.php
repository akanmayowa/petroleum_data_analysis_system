<?php

namespace App\Http\Controllers;

use App\Notifications\emailDWPManager;
use App\Notifications\emailNotification;
use DB;
use Excel;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
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
            $message = $dwp_manager->name.',  Data for '.$upload_name.' has been uploaded/Modified by '.\Auth::user()->name.' into PRIS, please review and take necessary action.';

            \Auth::user()->notify(new emailDWPManager($message, $sender, $name));
            $dwp_manager->notify(new emailDWPManager($message, $sender, $name));
        }
    }

    //function to log action for audit trail
    public function log_audit_trail($record, $action)
    {
        $log = \App\AuditLogs::create([
            'user_id' => \Auth::user()->id,
            'section' => 'DWP',
            'record' => $record,
            'action' => $action,
        ]);
    }

    public function index(Request $request)
    {
        $statuses = \App\status_category::orderBy('id', 'desc')->paginate(10);

        $alignment = \App\alignment::orderBy('alignment_name', 'asc')->get();
        $prog_priority = \App\dwp_program_priority::orderBy('program_priority_name', 'asc')->get();
        $task_target = \App\dwp_task_target::orderBy('task_target_name', 'asc')->get();
        $kpi_target = \App\dwp_kpi_target::orderBy('kpi_name', 'asc')->get();
        $division = $divisions = \App\division::orderBy('division_name', 'asc')->get();
        $status = \App\status_category::orderBy('status', 'asc')->get();

        $milestones = \App\dwp_critical_milestone::orderBy('critical_milestone_name', 'asc')->get();
        $timelines = \App\dwp_timeline::orderBy('timeline_name', 'asc')->get();
        $achieve_status = \App\dwp_achievement_status::orderBy('achievement_status_name', 'asc')->get();
        $restrict_factor = \App\dwp_restricting_factor::orderBy('restricting_factor_name', 'asc')->get();
        $recovery_plan = \App\dwp_key_recovery_plan::orderBy('key_recovery_plan_name', 'asc')->get();

        return view('project.index', compact('statuses', 'alignment', 'prog_priority', 'task_target', 'kpi_target', 'timelines', 'achieve_status', 'restrict_factor', 'division', 'divisions', 'status', 'milestones', 'recovery_plan'));
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
            case 'addproject':
                return $this->addproject($request);
            break;

            case 'updateprogress':
                return $this->updateprogress($request);
            break;

            case 'uploadproject':
                return $this->uploadproject($request);
            break;

            case 'add_mtss_dpr_pp':
                return $this->add_mtss_dpr_pp($request);
            break;

            case 'upload_mtss_dpr_pp':
                return $this->upload_mtss_dpr_pp($request);
            break;

            case 'add_critical_milestone':
                return $this->add_critical_milestone($request);
            break;

            case 'upload_critical_milestone':
                return $this->upload_critical_milestone($request);
            break;

            case 'addalignment':
                return $this->addalignment($request);
            break;

            case 'uploadalignment':
                return $this->uploadalignment($request);
            break;

            case 'add_program_priority':
                return $this->add_program_priority($request);
            break;

            case 'upload_program_priority':
                return $this->upload_program_priority($request);
            break;

            case 'add_task_target':
                return $this->add_task_target($request);
            break;

            case 'upload_task_target':
                return $this->upload_task_target($request);
            break;

            case 'add_task_critical_milestone':
                return $this->add_task_critical_milestone($request);
            break;

            case 'upload_task_critical_milestone':
                return $this->upload_task_critical_milestone($request);
            break;

            case 'add_task_timeline':
                return $this->add_task_timeline($request);
            break;

            case 'upload_task_timeline':
                return $this->upload_task_timeline($request);
            break;

            case 'add_achievement_status':
                return $this->add_achievement_status($request);
            break;

            case 'upload_achievement_status':
                return $this->upload_achievement_status($request);
            break;

            case 'add_restricting_factor':
                return $this->add_restricting_factor($request);
            break;

            case 'upload_restricting_factor':
                return $this->upload_restricting_factor($request);
            break;

            case 'add_kpi_target':
                return $this->add_kpi_target($request);
            break;

            case 'upload_kpi_target':
                return $this->upload_kpi_target($request);
            break;

            case 'add_key_recovery_plan':
                return $this->add_key_recovery_plan($request);
            break;

            case 'upload_key_recovery_plan':
                return $this->upload_key_recovery_plan($request);
            break;

            case 'adddivision':
                return $this->adddivision($request);
            break;

            case 'uploaddivision':
                return $this->uploaddivision($request);
            break;

            case 'addstatus':
                return $this->addstatus($request);
            break;

            case 'uploadstatus':
                return $this->uploadstatus($request);
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
            case 'modals_editDWPProject':
                // code...
                return $this->editDWPProject($request);
            break;

            case 'view_viewDWPProject':
                // code...
                return $this->viewDWPProject($request);
            break;

            case 'modals_editMTSS_DPR_PP':
                // code...
                return $this->editMTSS_DPR_PP($request);
            break;

            case 'view_viewMTSS_DPR_PP':
                // code...
                return $this->viewMTSS_DPR_PP($request);
            break;

            case 'modals_editCriticalMilestone':
                // code...
                return $this->editCriticalMilestone($request);
            break;

            case 'view_viewCriticalMilestone':
                // code...
                return $this->viewCriticalMilestone($request);
            break;

            case 'modals_editAlignment':
                // code...
                return $this->editAlignment($request);
            break;

            case 'modals_editProgramPriority':
                // code...
                return $this->editProgramPriority($request);
            break;

            case 'modals_editTaskTarget':
                // code...
                return $this->editTaskTarget($request);
            break;

            case 'modals_editTaskCriticalMilestone':
                // code...
                return $this->editTaskCriticalMilestone($request);
            break;

            case 'modals_editTimeline':
                // code...
                return $this->editTimeline($request);
            break;

            case 'modals_editAchievementStatus':
                // code...
                return $this->editAchievementStatus($request);
            break;

            case 'modals_editRestrictingFactor':
                // code...
                return $this->editRestrictingFactor($request);
            break;

            case 'modals_editKpiTarget':
                // code...
                return $this->editKpiTarget($request);
            break;

            case 'modals_editKeyRecoveryPlan':
                // code...
                return $this->editKeyRecoveryPlan($request);
            break;

            case 'modals_editDivision':
                // code...
                return $this->editDivision($request);
            break;

            case 'modals_editStatusCategory':
                // code...
                return $this->editStatusCategory($request);
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

    public function dwp(Request $request)
    {
        $projects = \App\dwp::orderBy('id', 'desc')->paginate(10);
        $projected = \App\dwp::orderBy('id', 'desc')->get();
        $division = $divisions = \App\division::orderBy('division_name', 'asc')->get();
        $achieve_status = \App\dwp_achievement_status::orderBy('achievement_status_name', 'desc')->get();
        // return ($achieve_status);
        $years = \App\dwp::orderBy('year')->distinct()->get(['year']);

        return view('project.dwp', compact('projected', 'projects', 'years', 'division', 'achieve_status'));
    }

    public function addproject(Request $request)
    {
        try {
            //INSERTING NEW PROJECT
            $add_dwp = \App\dwp::updateOrCreate(['id'=> $request->id],
            [
                'month' => $request->month,
                'year' => $request->year,
                'alignment_id' => $request->alignment_id,
                'program_priority_id' => $request->program_priority_id,
                'task_and_target' => $request->task_and_target,
                'kpi_target_id' => $request->kpi_target_id,
                'critical_milestone_id' => $request->critical_milestone_id,
                'timeline_id' => $request->timeline_id,
                'division_id' => $request->division_id,
                'achievement_status_id' => $request->achievement_status_id,
                'restricting_factor' => $request->restricting_factor,
                'critical_path_activity' => $request->critical_path_activity,
                'cost_benefit_factor' => $request->cost_benefit_factor,
                'key_recovery_plan_id' => $request->key_recovery_plan_id,
                'monitored_by' => $request->monitored_by,
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            self::send_all_mail('DPR WORK PLAN - DWP Project ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('DPR Work Plan', 'Update Record');
            } else {
                self::log_audit_trail('DPR Work Plan', 'Add Record');
            }

            if ($request->ajax()) {
                $dwp_details = ['month'=>$add_dwp->month, 'year'=>$add_dwp->year, 'alignment'=>$add_dwp->alignment->alignment_name, 'program_priority'=>$add_dwp->program_priority->program_priority_name, 'task_and_target'=>$add_dwp->task_target->task_target_name, 'kpi_target'=>$add_dwp->kpi_target->kpi_name, 'critical_milestone'=>$add_dwp->critical_milestone->critical_milestone_name, 'timeline'=>$add_dwp->timeline->timeline_name, 'division'=>$add_dwp->division->division_name, 'achievement_status'=>$add_dwp->achievement_status->achievement_status_name, 'restricting_factor'=>$add_dwp->restricting_factors->restricting_factor_name, 'critical_path_activity'=>$add_dwp->critical_path_activity, 'cost_benefit_factor'=>$add_dwp->cost_benefit_factor, 'key_recovery_plan'=>$add_dwp->key_recovery_plan->key_recovery_plan_name, 'monitored_by'=>$add_dwp->monitored_by, 'id'=>$add_dwp->id];

                return response()->json(['status'=>'ok', 'message'=>$dwp_details, 'info'=>'New DWP Project Added Successfully.']);
            } else {
                return redirect()->route('project.index')->with('info', 'DWP Project Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editDWPProject(Request $request)
    {
        $Project = \App\dwp::where('id', $request->id)->first();

        return view('project.modals.editDWPProject', compact('Project'));
    }

    public function updateprogress(Request $request)
    {
        //Determining the general status based on the status progress selected
        $progress_status = $request->pp;
        if ($progress_status == 1) {
            $general_status_id = '1';
        } elseif ($progress_status == 2 || $progress_status == 3 || $progress_status == 4) {
            $general_status_id = '2';
        } elseif ($progress_status == 5) {
            $general_status_id = '3';
        }

        $data = [
            'status' => $request->input('pp'),
            'general_status_id' => $general_status_id,
            'updated_at' => date('Y-m-d h:i:s'),
        ];

        //UPDATING PROJECT
        $id = $request->idd;
        $update_progress = \App\dwp::where('id', $id)->update($data);

        //sending mail
        self::send_all_mail('DPR WORK PLAN - DWP Project progress Updated ');
        self::log_audit_trail('DPR Work Plan', 'Update Record');

        if ($update_progress) {
            return redirect()->route('project.dwp')->with('info', 'DWP Project Progress Updated Successfully.');
        } else {
            //return redirect()->route('project.dwp')->with('info', 'Please Select A Progress Status For The Project.');
        }
    }

    public function viewDWPProject(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('DPR Work Plan - Projects', 'Viewed Data');
        $Project = \App\dwp::where('id', $request->id)->first();

        return view('project.view.viewDWPProject', compact('Project'));
    }

    public function uploadproject(Request $request)
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
                    $add_ = \App\dwp::updateOrCreate(['id'=> $request->id],
                        [
                            'month' => $row['A'],
                            'year' => $row['B'],
                            'alignment_id' => $row['C'],
                            'program_priority_id' => $row['D'],
                            'task_and_target' => $row['E'],
                            'kpi_target_id' => $row['F'],
                            'critical_milestone_id' => $row['G'],
                            'timeline_id' => $row['H'],
                            'division_id' => $row['I'],
                            'critical_path_activity' => $row['J'],
                            'achievement_status_id' => $row['K'],
                            'restricting_factor' => $row['L'],
                            'cost_benefit_factor' => $row['M'],
                            'key_recovery_plan_id' => $row['N'],
                            'status' => $row['O'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('DPR WORK PLAN - DWP Project ');
            //Audit Logging
            self::log_audit_trail('DPR Work Plan', 'Data Bulk Upload');

            return redirect()->route('project.index')->with('info', 'DWP Project Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_dwp($type)
    {
        //Audit Logging
        self::log_audit_trail('DPR Work Plan - Projects', 'Downloaded Data');
        $data = \App\dwp::get();
        $view = 'project.excel.dwp_excel';

        return     \Excel::create('DPR Work Plan', function ($excel) use ($view, $data) {
            $excel->sheet('DPR Work Plan', function ($sheet) use ($view, $data) {
                $sheet->loadView("$view", compact('data'))->setOrientation('landscape');
            });
        })->export('xlsx');
    }

    public function add_critical_milestone(Request $request)
    {
        try {
            //INSERTING NEW PROJECT
            $add_matrix = \App\dwp_critical_milestone_matrix::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'division_id' => $request->division_id,
                'dpr_pp_milestones' => $request->dpr_pp_milestones,
                'priority_milestone' => $request->priority_milestone,
                'critical_milestones_count' => $request->critical_milestones_count,
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Critical Milestone ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Critical Milestone', 'Update Record');
            } else {
                self::log_audit_trail('Critical Milestone', 'Add Record');
            }

            if ($request->ajax()) {
                $matrix_details = ['year'=>$add_matrix->year, 'division'=>$add_matrix->division->division_name, 'dpr_pp_milestones'=>$add_matrix->dpr_pp_milestones, 'priority_milestone'=>$add_matrix->priority_milestone, 'critical_milestones_count'=>$add_matrix->critical_milestones_count, 'id'=>$add_matrix->id];

                //sending mail
                $dwp_manager = \App\User::where('role', '7')->first();
                $message = $dwp_manager->name.'<br> , Data has been uploaded/Modified for DWP - Cretical Milestone '.$required->year.' by '.\Auth::user()->name.' into PRIS, please review and take necessary action.';

                \Auth::user()->notify(new emailDWPManager($message));
                $dwp_manager->notify(new emailDWPManager($message));

                return response()->json(['status'=>'ok', 'message'=>$matrix_details, 'info'=>'New Critical Milestone Matrix Added Successfully.']);
            } else {
                return redirect()->route('project.index')->with('info', 'DWP Critical Milestone Matrix Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editCriticalMilestone(Request $request)
    {
        $Matrix = \App\dwp_critical_milestone_matrix::where('id', $request->id)->first();

        return view('project.modals.editCriticalMilestone', compact('Matrix'));
    }

    public function upload_critical_milestone(Request $request)
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
                    $add_ = \App\dwp_critical_milestone_matrix::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'division_id' => $row['B'],
                            'dpr_pp_milestones' => $row['C'],
                            'priority_milestone' => $row['D'],
                            'critical_milestones_count' => $row['E'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Critical Milestone ');
            //Audit Logging
            self::log_audit_trail('Critical Milestone', 'Data Bulk Upload');

            return redirect()->route('project.index')->with('info', 'Critical Milestone Matrix Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewCriticalMilestone(Request $request)
    {
        $Matrix = \App\dwp_critical_milestone_matrix::where('id', $request->id)->first();

        return view('project.view.viewCriticalMilestone', compact('Matrix'));
    }

    public function download_critical_milestone_matrix($type)
    {
        $data = \App\dwp_critical_milestone_matrix::get()->toArray();

        return Excel::create('DWP Critical Milestone Matrix', function ($excel) use ($data) {
            $excel->sheet('Critical Milestone Matrix', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function sendreport(Request $request)
    {
        $data = [
            'created_by' => '1',
            'updated_at' => date('Y-m-d h:i:s'),
        ];

        //UPDATING PROJECT
        $id = $request->idd;
        $update_progress = DB::table('dwp')->where('id', $id)->update($data);

        if ($update_progress) {
            return redirect()->route('project.dwp')->with('info', 'DWP Project Progress Updated Successfully.');
        } else {
            //return redirect()->route('project.dwp')->with('info', 'Please Select A Progress Status For The Project.');
        }
    }

    public function email_reports(Request $request)
    {
        $type = $request->send_to;
        $reportname = '';
        foreach ($request->check_list as $numb) {
            //echo '<p>' .$numb. '</p>';
        }

        $type = $type == 4 ? [1, 2, 3] : [$type];
        $message = 'A DWP Report Has Been Sent To You.';
        $this->notifyUser($request->check_list, $message, 'project/dwp', $type);
    }

    public function add_mtss_dpr_pp(Request $request)
    {
        try {
            //INSERTING NEW PROJECT
            $add_dwp = \App\dwp_mtss_dpr_pp::updateOrCreate(['id'=> $request->id],
            [
                'policy_objective' => $request->policy_objective,
                'zbb_pillar' => $request->zbb_pillar,
                'zbb_pp' => $request->zbb_pp,
                'zbb_spp' => $request->zbb_spp,
                'dwp_pp' => $request->dwp_pp,
                'kpi' => $request->kpi,
                'kpi_performance' => $request->kpi_performance,
                'responsible_division' => $request->responsible_division,
                'critical_linkage' => $request->critical_linkage,
                'created_by' => \Auth::user()->nam,
            ]);

            if ($request->ajax()) {
                $dwp_details = ['policy_objective'=>$add_dwp->policy_objective, 'zbb_pillar'=>$add_dwp->zbb_pillar, 'zbb_pp'=>$add_dwp->zbb_pp, 'zbb_spp'=>$add_dwp->zbb_spp, 'dwp_pp'=>$add_dwp->dwp_pp, 'kpi'=>$add_dwp->kpi, 'kpi_performance'=>$add_dwp->kpi_performance, 'responsible_division'=>$add_dwp->responsible_division, 'critical_linkage'=>$add_dwp->critical_linkage, 'id'=>$add_dwp->id];

                //sending mail
                $dwp_manager = \App\User::where('role', '7')->first();
                $message = $dwp_manager->name.'<br> , Data has been uploaded/Modified for DWP by '.\Auth::user()->name.' into PRIS, please review and take necessary action.';

                \Auth::user()->notify(new emailDWPManager($message));
                $dwp_manager->notify(new emailDWPManager($message));

                return response()->json(['status'=>'ok', 'message'=>$dwp_details, 'info'=>'New MTSS DPR Program priority Added Successfully.']);
            } else {
                return redirect()->route('project.dwp')->with('info', 'MTSS DPR Program priority Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('project.dwp')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editMTSS_DPR_PP(Request $request)
    {
        $DPR_PP = \App\dwp_mtss_dpr_pp::where('id', $request->id)->first();

        return view('project.modals.editMTSS_DPR_PP', compact('DPR_PP'));
    }

    public function upload_mtss_dpr_pp(Request $request)
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
                    $add_ = \App\dwp_mtss_dpr_pp::updateOrCreate(['id'=> $request->id],
                        [
                            'policy_objective' => $row['A'],
                            'zbb_pillar' => $row['B'],
                            'zbb_pp' => $row['C'],
                            'zbb_spp' => $row['D'],
                            'dwp_pp' => $row['E'],
                            'kpi' => $row['F'],
                            'kpi_performance' => $row['G'],
                            'responsible_division' => $row['H'],
                            'critical_linkage' => $row['I'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //sending mail
            $dwp_manager = \App\User::where('role', '7')->first();
            $message = $dwp_manager->name.'<br> , Data has been uploaded/Modified for DWP - Cretical Milestone by '.\Auth::user()->name.' into PRIS, please review and take necessary action.';

            \Auth::user()->notify(new emailDWPManager($message));
            $dwp_manager->notify(new emailDWPManager($message));

            return redirect()->route('project.dwp')->with('info', 'MTSS DPR Program priority Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('project.dwp')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewMTSS_DPR_PP(Request $request)
    {
        $DPR_PP = \App\dwp_mtss_dpr_pp::where('id', $request->id)->first();

        return view('project.view.viewMTSS_DPR_PP', compact('DPR_PP'));
    }

    public function download_mtss_dpr_pp($type)
    {
        $data = \App\dwp_mtss_dpr_pp::get()->toArray();

        return Excel::create('DWP MTSS DPR PP', function ($excel) use ($data) {
            $excel->sheet('MTSS DPR PP', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    // send  mail notify
    private function notifyUser($userid, $message, $urltoview, $type)
    {
        $users = \App\User::whereIn('role', $type)->get();
        foreach ($users as $user) {
            $user->notify(new emailNotification($user->name, $message, $urltoview));
        }

        return response()->json(['status'=>'ok', 'message'=>'Report Successsfully sent']);
    }

    public function assign_report_to(Request $request)
    {
        try {
            foreach ($request->check_list as $dwp) {
                //INSERTING NEW
                $add_asg_role = \App\dwp_assign_to::updateOrCreate(['id'=> $request->id],
              [
                  'dwp_id' => $request->dwp_id,
                  'assign_to_role' => $request->assign_to_role,
                  'created_by' => \Auth::user()->name,
              ]);
            }
            if ($request->ajax()) {
                $asg_role_details = ['dwp'=>$add_asg_role->dwp, 'role'=>$add_asg_role->role_name, 'id'=>$add_asg_role->id];

                return response()->json(['status'=>'ok', 'message'=>$asg_role_details, 'info'=>'New License Based Oil Marketers Added Successfully.']);
            } else {
                return redirect()->route('project.index')->with('info', 'Reports Where Assigned Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('project.dwp')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function addalignment(Request $request)
    {
        try {
            //INSERTING NEW ALIGNMENT
            $add_align = \App\alignment::updateOrCreate(['id'=> $request->id],
              [
                  'alignment_name' => $request->alignment_name,
                  'created_by' => \Auth::user()->name,
              ]);

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Alignment ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data Alignment', 'Update Record');
            } else {
                self::log_audit_trail('Maste rData Alignment', 'Add Record');
            }

            if ($request->ajax()) {
                $align_details = ['alignment'=>$add_align->alignment_name, 'id'=>$add_align->id];

                return response()->json(['status'=>'ok', 'message'=>$align_details, 'info'=>'New DWP Alignment Added Successfully.']);
            } else {
                return redirect()->route('project.index')->with('info', 'DWP Alignment Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editAlignment(Request $request)
    {
        $Alignment = \App\alignment::where('id', $request->id)->first();

        return view('project.modals.editAlignment', compact('Alignment'));
    }

    public function uploadalignment(Request $request)
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
                    $add_ = \App\alignment::updateOrCreate(['id'=> $request->id],
                        [
                            'alignment_name' => $row['A'],
                            'created_by' => $created_by,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Alignment ');
            //Audit Logging
            self::log_audit_trail('Master Data - Alignment', 'Data Bulk Upload');

            return redirect()->route('project.index')->with('info', 'DWP Alignment Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_alignment($type)
    {
        //Audit Logging
        self::log_audit_trail('DWP Alignments', 'Downloaded Data');
        $data = \App\alignment::get()->toArray();

        return Excel::create('DWP Alignment', function ($excel) use ($data) {
            $excel->sheet('Alignment', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_program_priority(Request $request)
    {
        try {
            //INSERTING NEW Work Plan
            $add_work = \App\dwp_program_priority::updateOrCreate(['id'=> $request->id],
              [
                  'program_priority_name' => $request->program_priority_name,
                  'created_by' => \Auth::user()->name,
              ]);

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Program Priority (PP) ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Program Priority (PP)', 'Update Record');
            } else {
                self::log_audit_trail('Program Priority (PP)', 'Add Record');
            }

            if ($request->ajax()) {
                $work_details = ['program_priority_name'=>$add_work->program_priority_name, 'id'=>$add_work->id];

                return response()->json(['status'=>'ok', 'message'=>$work_details, 'info'=>'New DWP Program Priority Added Successfully.']);
            } else {
                return redirect()->route('project.index')->with('info', 'DWP Program Priority Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editProgramPriority(Request $request)
    {
        $PROGRAM_P = \App\dwp_program_priority::where('id', $request->id)->first();

        return view('project.modals.editProgramPriority', compact('PROGRAM_P'));
    }

    public function upload_program_priority(Request $request)
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
                    $add_ = \App\dwp_program_priority::updateOrCreate(['id'=> $request->id],
                        [
                            'program_priority_name' => $row['A'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Program Priority (PP) ');
            //Audit Logging
            self::log_audit_trail('Program Priority (PP)', 'Data Bulk Upload');

            return redirect()->route('project.index')->with('info', 'DWP Program priority Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_program_priority($type)
    {
        //Audit Logging
        self::log_audit_trail('DWP Program Priority', 'Downloaded Data');
        $data = \App\dwp_program_priority::get()->toArray();

        return Excel::create('DWP Program Priority', function ($excel) use ($data) {
            $excel->sheet('Program Priority', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_task_target(Request $request)
    {
        try {
            //INSERTING NEW Task
            $add_task = \App\dwp_task_target::updateOrCreate(['id'=> $request->id],
              [
                  'task_target_name' => $request->task_target_name,
                  'created_by' => \Auth::user()->name,
              ]);

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Task and Target ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Task and Target', 'Update Record');
            } else {
                self::log_audit_trail('Task and Target', 'Add Record');
            }

            if ($request->ajax()) {
                $task_details = ['task_target_name'=>$add_task->task_target_name, 'id'=>$add_task->id];

                return response()->json(['status'=>'ok', 'message'=>$task_details, 'info'=>'New DWP Task And Target Added Successfully.']);
            } else {
                return redirect()->route('project.index')->with('info', 'DWP Task And Target Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editTaskTarget(Request $request)
    {
        $TASK_TARGET = \App\dwp_task_target::where('id', $request->id)->first();

        return view('project.modals.editTaskTarget', compact('TASK_TARGET'));
    }

    public function upload_task_target(Request $request)
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
                    $add_ = \App\dwp_task_target::updateOrCreate(['id'=> $request->id],
                        [
                            'task_target_name' => $row['A'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Task and Target ');
            //Audit Logging
            self::log_audit_trail('Upstream Condensate Reserves', 'Data Bulk Upload');

            return redirect()->route('project.index')->with('info', 'DWP Task And Target Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_task_target($type)
    {
        //Audit Logging
        self::log_audit_trail('DWP Task Target', 'Downloaded Data');
        $data = \App\dwp_task_target::get()->toArray();

        return Excel::create('DWP Task Target', function ($excel) use ($data) {
            $excel->sheet('Task Target', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_kpi_target(Request $request)
    {
        try {
            //INSERTING NEW kpi_target
            $add_kpi = \App\dwp_kpi_target::updateOrCreate(['id'=> $request->id],
              [
                  'kpi_name' => $request->kpi_name,
                  'kpi_target' => $request->kpi_target,
                  'created_by' => \Auth::user()->name,
              ]);

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - KPI and Target ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('KPI and Target', 'Update Record');
            } else {
                self::log_audit_trail('KPI and Target', 'Add Record');
            }

            if ($request->ajax()) {
                $kpi_details = ['kpi_name'=>$add_kpi->kpi_name, 'kpi_target'=>$add_kpi->kpi_target, 'id'=>$add_kpi->id];

                return response()->json(['status'=>'ok', 'message'=>$kpi_details, 'info'=>'New KPI and Target Added Successfully.']);
            } else {
                return redirect()->route('project.index')->with('info', 'KPI and Target Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editKpiTarget(Request $request)
    {
        $KPI = \App\dwp_kpi_target::where('id', $request->id)->first();

        return view('project.modals.editKpiTarget', compact('KPI'));
    }

    public function upload_kpi_target(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);
        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING NEW
                    $add_ = \App\dwp_kpi_target::updateOrCreate(['id'=> $request->id],
                      [
                          'kpi_name' => $row['A'],
                          'kpi_target' => $row['B'],
                          'created_by' => \Auth::user()->name,
                      ]);
                }
            }

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - KPI and Target ');
            //Audit Logging
            self::log_audit_trail('KPI and Target', 'Data Bulk Upload');

            return redirect()->route('project.index')->with('info', 'KPI and Target Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_kpi_target($type)
    {
        //Audit Logging
        self::log_audit_trail('DWP KPI Target', 'Downloaded Data');
        $data = \App\dwp_kpi_target::get()->toArray();

        return Excel::create('DWP KPI Target', function ($excel) use ($data) {
            $excel->sheet('KPI Target', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_task_critical_milestone(Request $request)
    {
        try {
            //INSERTING NEW Task
            $add_mile = \App\dwp_critical_milestone::updateOrCreate(['id'=> $request->id],
              [
                  'critical_milestone_name' => $request->critical_milestone_name,
                  'created_by' => \Auth::user()->name,
              ]);

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Critical Milestone ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Critical Milestone ', 'Update Record');
            } else {
                self::log_audit_trail('Critical Milestone ', 'Add Record');
            }

            if ($request->ajax()) {
                $mile_details = ['critical_milestone_name'=>$add_mile->critical_milestone_name, 'id'=>$add_mile->id];

                return response()->json(['status'=>'ok', 'message'=>$mile_details, 'info'=>'New DWP Task Critical Milestone Added Successfully.']);
            } else {
                return redirect()->route('project.index')->with('info', 'DWP Task Critical Milestone Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editTaskCriticalMilestone(Request $request)
    {
        $MILESTONE = \App\dwp_critical_milestone::where('id', $request->id)->first();

        return view('project.modals.editTaskCriticalMilestone', compact('MILESTONE'));
    }

    public function upload_task_critical_milestone(Request $request)
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
                    $add_ = \App\dwp_critical_milestone::updateOrCreate(['id'=> $request->id],
                        [
                            'critical_milestone_name' => $row['A'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Critical Milestone ');
            //Audit Logging
            self::log_audit_trail('Critical Milestone', 'Data Bulk Upload');

            return redirect()->route('project.index')->with('info', 'DWP Task Critical Milestone Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_task_critical_milestone($type)
    {
        //Audit Logging
        self::log_audit_trail('DWP Critical Milestone', 'Downloaded Data');
        $data = \App\dwp_critical_milestone::get()->toArray();

        return Excel::create('DWP Task critical Milestone', function ($excel) use ($data) {
            $excel->sheet('Task critical Milestone', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_task_timeline(Request $request)
    {
        try {
            //INSERTING NEW timeline
            $add_time = \App\dwp_timeline::updateOrCreate(['id'=> $request->id],
              [
                  'timeline_name' => $request->timeline_name,
                  'created_by' => \Auth::user()->name,
              ]);

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Timelines ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data - Timelines', 'Update Record');
            } else {
                self::log_audit_trail('Master Data - Timelines', 'Add Record');
            }

            if ($request->ajax()) {
                $timeline_details = ['timeline_name'=>$add_time->timeline_name, 'id'=>$add_time->id];

                return response()->json(['status'=>'ok', 'message'=>$timeline_details, 'info'=>'New DWP Timeline Added Successfully.']);
            } else {
                return redirect()->route('project.index')->with('info', 'DWP Timeline Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editTimeline(Request $request)
    {
        $TIMELINE = \App\dwp_timeline::where('id', $request->id)->first();

        return view('project.modals.editTimeline', compact('TIMELINE'));
    }

    public function upload_task_timeline(Request $request)
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
                    $add_ = \App\dwp_timeline::updateOrCreate(['id'=> $request->id],
                        [
                            'timeline_name' => $row['A'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Timelines ');
            //Audit Logging
            self::log_audit_trail('Master Data - Timelines', 'Data Bulk Upload');

            return redirect()->route('project.index')->with('info', 'DWP Timeline Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_task_timeline($type)
    {
        //Audit Logging
        self::log_audit_trail('DWP Task Timeline', 'Downloaded Data');
        $data = \App\dwp_timeline::get()->toArray();

        return Excel::create('DWP Task Timeline', function ($excel) use ($data) {
            $excel->sheet('Task Timeline', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_achievement_status(Request $request)
    {
        try {
            //INSERTING NEW timeline
            $add_ach = \App\dwp_achievement_status::updateOrCreate(['id'=> $request->id],
              [
                  'achievement_status_name' => $request->achievement_status_name,
                  'status' => $request->status,
                  'created_by' => \Auth::user()->name,
              ]);

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Achievement Status ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Achievement Status', 'Update Record');
            } else {
                self::log_audit_trail('Achievement Status', 'Add Record');
            }

            if ($request->ajax()) {
                $achievement_details = ['achievement_status'=>$add_ach->achievement_status_name, 'status'=>$add_ach->status, 'id'=>$add_ach->id];

                return response()->json(['status'=>'ok', 'message'=>$achievement_details, 'info'=>'New Achievement Status Added Successfully.']);
            } else {
                return redirect()->route('project.index')->with('info', 'Achievement Status Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editAchievementStatus(Request $request)
    {
        $ACH_STATUS = \App\dwp_achievement_status::where('id', $request->id)->first();

        return view('project.modals.editAchievementStatus', compact('ACH_STATUS'));
    }

    public function upload_achievement_status(Request $request)
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
                    $add_ = \App\dwp_achievement_status::updateOrCreate(['id'=> $request->id],
                        [
                            'achievement_status_name' => $row['A'],
                            'status' => $row['B'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Achievement Status ');
            //Audit Logging
            self::log_audit_trail('Achievement Status', 'Data Bulk Upload');

            return redirect()->route('project.index')->with('info', 'Achievement Status Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_achievement_status($type)
    {
        //Audit Logging
        self::log_audit_trail('DWP Achievement Status', 'Downloaded Data');
        $data = \App\dwp_achievement_status::get()->toArray();

        return Excel::create('DWP Achievement Status', function ($excel) use ($data) {
            $excel->sheet('Achievement Status', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_restricting_factor(Request $request)
    {
        try {
            //INSERTING NEW Restricting Factor
            $add_factor = \App\dwp_restricting_factor::updateOrCreate(['id'=> $request->id],
              [
                  'restricting_factor_name' => $request->restricting_factor_name,
                  'created_by' => \Auth::user()->name,
              ]);

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Restricting Factor ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Restricting Factor', 'Update Record');
            } else {
                self::log_audit_trail('Restricting Factor', 'Add Record');
            }

            if ($request->ajax()) {
                $factor_details = ['restricting_factor'=>$add_factor->restricting_factor_name, 'id'=>$add_factor->id];

                return response()->json(['status'=>'ok', 'message'=>$factor_details, 'info'=>'New Restricting Factor Added Successfully.']);
            } else {
                return redirect()->route('project.index')->with('info', 'Restricting Factor Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editRestrictingFactor(Request $request)
    {
        $FACTOR = \App\dwp_restricting_factor::where('id', $request->id)->first();

        return view('project.modals.editRestrictingFactor', compact('FACTOR'));
    }

    public function upload_restricting_factor(Request $request)
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
                    $add_ = \App\dwp_restricting_factor::updateOrCreate(['id'=> $request->id],
                        [
                            'restricting_factor_name' => $row['A'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Restricting Factor ');
            //Audit Logging
            self::log_audit_trail('Restricting Factor', 'Data Bulk Upload');

            return redirect()->route('project.index')->with('info', 'Restricting Factor Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_restricting_factor($type)
    {
        //Audit Logging
        self::log_audit_trail('DWP Restricting Factor', 'Downloaded Data');
        $data = \App\dwp_restricting_factor::get()->toArray();

        return Excel::create('DWP Restricting Factor', function ($excel) use ($data) {
            $excel->sheet('Restricting Factor', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function adddivision(Request $request)
    {
        try {
            //INSERTING NEW DIVISION
            $add_divi = \App\division::updateOrCreate(['id'=> $request->id],
            [
                'division_name' => $request->division_name,
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Division and Zones ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Division and Zones', 'Update Record');
            } else {
                self::log_audit_trail('Division and Zones', 'Add Record');
            }

            if ($request->ajax()) {
                $div_details = ['division_name'=>$add_divi->division_name, 'id'=>$add_divi->id];

                return response()->json(['status'=>'ok', 'message'=>$div_details, 'info'=>'New DWP Division Added Successfully.']);
            } else {
                return redirect()->route('project.index')->with('info', 'DWP Division Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editDivision(Request $request)
    {
        $Division = \App\division::where('id', $request->id)->first();

        return view('project.modals.editDivision', compact('Division'));
    }

    public function uploaddivision(Request $request)
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
                    $add_ = \App\division::updateOrCreate(['id'=> $request->id],
                        [
                            'division_name' => $row['A'],
                            'created_by' => $created_by,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Division and Zones ');
            //Audit Logging
            self::log_audit_trail('Division and Zones', 'Data Bulk Upload');

            return redirect()->route('project.index')->with('info', 'DWP Division Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_division($type)
    {
        //Audit Logging
        self::log_audit_trail('DWP Division/Zones', 'Downloaded Data');
        $data = \App\division::get()->toArray();

        return Excel::create('DWP Division', function ($excel) use ($data) {
            $excel->sheet('Division', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function addstatus(Request $request)
    {
        try {
            $status = $request->status;
            $score = $request->score;
            $created_by = \Auth::user()->name;

            //INSERTING NEW STATUS
            $add_sta = \App\status_category::updateOrCreate(['id'=> $request->id],
            [
                'status' => $status,
                'score' => $score,
                'created_by' => $created_by,
            ]);

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Status ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data - Status', 'Update Record');
            } else {
                self::log_audit_trail('Master Data - Status', 'Add Record');
            }

            if ($request->ajax()) {
                $status_details = ['status'=>$add_sta->status, 'score'=>$add_sta->score, 'id'=>$add_sta->id];

                return response()->json(['status'=>'ok', 'message'=>$status_details, 'info'=>'New DWP Status Added Successfully.']);
            } else {
                return redirect()->route('project.index')->with('info', 'DWP Status Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editStatusCategory(Request $request)
    {
        $Status_category = \App\status_category::where('id', $request->id)->first();

        return view('project.modals.editStatusCategory', compact('Status_category'));
    }

    public function uploadstatus(Request $request)
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
                    $add_ = \App\status_category::updateOrCreate(['id'=> $request->id],
                        [
                            'status' => $row['A'],
                            'score' => $row['B'],
                            'created_by' => $created_by,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Status ');
            //Audit Logging
            self::log_audit_trail('Master Data - Status', 'Data Bulk Upload');

            return redirect()->route('project.index')->with('info', 'DWP Status Category Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function add_key_recovery_plan(Request $request)
    {
        try {
            //INSERTING NEW Recovery
            $add_plan = \App\dwp_key_recovery_plan::updateOrCreate(['id'=> $request->id],
            [
                'key_recovery_plan_name' => $request->key_recovery_plan_name,
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Key Recovery Plan ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Key Recovery Plan', 'Update Record');
            } else {
                self::log_audit_trail('Key Recovery Plan', 'Add Record');
            }

            if ($request->ajax()) {
                $plan_details = ['key_recovery_plan'=>$add_plan->key_recovery_plan_name, 'id'=>$add_plan->id];

                return response()->json(['status'=>'ok', 'message'=>$plan_details, 'info'=>'New Key Recovery Plan Added Successfully.']);
            } else {
                return redirect()->route('project.index')->with('info', 'Key Recovery Plan Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editKeyRecoveryPlan(Request $request)
    {
        $PLAN = \App\dwp_key_recovery_plan::where('id', $request->id)->first();

        return view('project.modals.editKeyRecoveryPlan', compact('PLAN'));
    }

    public function upload_key_recovery_plan(Request $request)
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
                    $add_ = \App\dwp_key_recovery_plan::updateOrCreate(['id'=> $request->id],
                        [
                            'key_recovery_plan_name' => $row['A'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('DPR WORK PLAN Master Data - Key Recovery Plan ');
            //Audit Logging
            self::log_audit_trail('Key Recovery Plan', 'Data Bulk Upload');

            return redirect()->route('project.index')->with('info', 'Key Recovery Plan Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('project.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_key_recovery_plan($type)
    {
        //Audit Logging
        self::log_audit_trail('DWP Key Recovery Plan', 'Downloaded Data');
        $data = \App\dwp_key_recovery_plan::get()->toArray();

        return Excel::create('DWP key Recovery Plan', function ($excel) use ($data) {
            $excel->sheet('key Recovery Plan', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function q1_performance_status(Request $request)
    {
        //$perf_status = \App\pris_performance_status::where('')
    }
}
