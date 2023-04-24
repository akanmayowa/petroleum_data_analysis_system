<?php

namespace App\Http\Controllers;

use App\Notifications\emailNOGIARManager;
use App\Traits\ExcelExport;
use App\Traits\Micellenous;
use DB;
use Excel;
use Illuminate\Http\Request;

class BALAController extends Controller
{
    use Micellenous;
    use ExcelExport;

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
        $users = \App\EmailList::where('division', 'MASTER DATA')->get();
        //sending email to every DWP MANAGER
        $sender = \Auth::user()->email;
        $sender_name = \Auth::user()->name;
        $message = ', Data for '.$upload_name.' has been uploaded/Modified by '.$sender_name.' into PRIS, please review and take necessary action.';
        foreach ($users as $_user) {
            $user = \App\User::where('id', $_user->user_id)->first();
            $name = $user->name;

            $user->notify(new emailNOGIARManager($message, $sender, $name));
        }
        $admin = \App\User::where('id', 9)->first();
        $admin->notify(new emailNOGIARManager($message, $sender, 'Admin'));
    }

    //function to log action for audit trail
    public function log_audit_trail($record, $action)
    {
        $log = \App\AuditLogs::create([
            'user_id' => \Auth::user()->id,
            'section' => 'BALA',
            'record' => $record,
            'action' => $action,
        ]);
    }

    public function index(Request $request)
    {
        $companies = $company_mf = $companie = $company_dps = \App\company::orderBy('company_name', 'asc')->get();

        $concessions = $concession = \App\concession::orderBy('concession_name', 'asc')->get();
        $contracts = $contract = \App\contract::orderBy('contract_name', 'asc')->get();

        $terrains = $terrain = $terrain_oap = \App\terrain::orderBy('terrain_name', 'asc')->get();

        $fields = $field_mf = \App\field::orderBy('field_name', 'asc')->get();
        $blocks_mf = $blocks = \App\bala_block::get();
        $area_of_surveys = \App\area_of_survey::orderBy('area_of_survey_name', 'asc')->get();
        $type_of_surveys = \App\type_of_survey::orderBy('type_of_survey_name', 'asc')->get();
        $departments = \App\department::orderBy('id', 'desc')->paginate(10);
        $sta_cats = \App\status_category::orderBy('id', 'desc')->paginate(10);
        $basins = \App\Basin::orderBy('basin_name', 'asc')->get();

        return view('bala.index', compact('companies', 'company_mf', 'concessions', 'contracts', 'terrains', 'companie', 'concession', 'contract', 'terrain', 'terrain_oap', 'basins', 'field_mf', 'blocks_mf', 'area_of_surveys', 'type_of_surveys', 'company_dps', 'departments', 'sta_cats'));
    }

    public function add_bala_opl(Request $request)
    {
        try {
            //INSERTING NEW (OPL) Oil Prospective License
            $add_bala_opl = \App\Bala_opl::updateOrCreate(['id'=> $request->id],
            [
                'company_id' => $request->company_id,
                'concession_held_id' => $request->concession_held_id,
                'equity_distribution' => $request->equity_distribution,
                'contract_type' => $request->contract_type,
                'year_of_award' => $request->year_of_award,
                'license_expire_date' => $request->license_expire_date,
                'area' => $request->area,
                'geological_terrain_id' => $request->geological_terrain_id,
                'comment' => $request->comment,
                'created_by' => \Auth::user()->name,
            ]);

            if ($request->id) {
                $add_hist = DB::table('bala_opl_oml_history')->insert([
                    'history_id' => $request->id,
                    'company_id' => $request->company_id,
                    'concession_held_id' => $request->concession_held_id,
                    'equity_distribution' => $request->equity_distribution,
                    'contract_type' => $request->contract_type,
                    'year_of_award' => $request->year_of_award,
                    'license_expire_date' => $request->license_expire_date,
                    'area' => $request->area,
                    'geological_terrain_id' => $request->geological_terrain_id,
                    'comment' => $request->comment,
                    'created_by' => $add_bala_opl->created_by,
                    'created_at' => $add_bala_opl->created_at,
                    'updated_by' => \Auth::user()->name,
                    'updated_at' => date('Y-m-d h:i:s'),
                ]);
            } else {
                $add_hist = DB::table('bala_opl_oml_history')->insert([
                    'history_id' => $add_bala_opl->id,
                    'company_id' => $request->company_id,
                    'concession_held_id' => $request->concession_held_id,
                    'equity_distribution' => $request->equity_distribution,
                    'contract_type' => $request->contract_type,
                    'year_of_award' => $request->year_of_award,
                    'license_expire_date' => $request->license_expire_date,
                    'area' => $request->area,
                    'geological_terrain_id' => $request->geological_terrain_id,
                    'comment' => $request->comment,
                    'created_by' => \Auth::user()->name,
                    'created_at' => date('Y-m-d h:i:s'),
                ]);
            }

            //sending mail
            self::send_all_mail('UPSTREAM - (OPL) Oil Prospective Lease ');
            //Audit Logging
            self::log_audit_trail('OPL', 'Added Data');

            if ($request->ajax()) {
                $opl_details = ['company'=>$add_bala_opl->company->company_name, 'concession'=>$add_bala_opl->concession->concession_name, 'equity_distribution'=>$add_bala_opl->equity_distribution, 'contract'=>$add_bala_opl->contract->contract_name, 'year_of_award'=>$add_bala_opl->year_of_award, 'license_expire_date'=>$add_bala_opl->license_expire_date, 'area'=>$add_bala_opl->area, 'terrain'=>$add_bala_opl->terrain->terrain_name, 'comment'=>$add_bala_opl->comment, 'id'=>$add_bala_opl->id];

                return response()->json(['status'=>'ok', 'message'=>$opl_details, 'info'=>'New (OPL) Oil Prospective Lease Added Successfully. ']);
            } else {
                return redirect()->route('upstream')->with('info', '(OPL) Oil Prospective Lease Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editBalaOPL(Request $request)
    {
        $OPL_ = \App\Bala_opl::where('id', $request->id)->first();
        $one_comp = \App\company::where('id', $OPL_->company_id)->first();
        $all_comp = \App\company::orderBy('company_name', 'asc')->get();
        $one_conc = \App\concession::where('id', $OPL_->concession_held_id)->first();
        $all_conc = \App\concession::orderBy('concession_name', 'asc')->get();
        $one_cont = \App\contract::where('id', $OPL_->contract_type)->first();
        $all_cont = \App\contract::where('contract_name', '<>', 'Marginal')->orderBy('contract_name', 'asc')->get();
        $one_terr = \App\up_concession_terrain::where('id', $OPL_->geological_terrain_id)->first();
        $all_terr = \App\up_concession_terrain::orderBy('terrain_name', 'asc')->get();

        return view('bala.modals.editBalaOPL', compact('OPL_', 'one_comp', 'all_conc', 'one_conc', 'all_cont', 'one_cont', 'all_comp', 'one_terr', 'all_terr'));
    }

    public function upload_bala_opl(Request $request)
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
                    $add_ = \App\bala_opl::updateOrCreate(['id'=> $request->id],
                        [
                            'company_id' => $row['A'],
                            'concession_held_id' => $row['B'],
                            'equity_distribution' => $row['C'],
                            'contract_type' => $row['D'],
                            'year_of_award' => $row['E'],
                            'license_expire_date' => $row['F'],
                            'area' => $row['G'],
                            'geological_terrain_id' => $row['H'],
                            'comment' => $row['I'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - (OPL) Oil Prospective Lease ');
            //Audit Logging
            self::log_audit_trail('OPL', 'Bulk Data Upload');

            return redirect()->route('upstream')->with('info', 'Oil Prospective License Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewBalaOPL(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('OPL', 'Viewed Data');
        $OPL = \App\Bala_opl::where('id', $request->id)->first();
        $opl_history = \App\bala_opl_oml_history::where('history_id', $request->id)->orderBy('id', 'asc')->get();

        $one_comp = \App\company::where('id', $OPL->company_id)->first();
        $one_conc = \App\concession::where('id', $OPL->concession_held_id)->first();
        $one_cont = \App\contract::where('id', $OPL->contract_type)->first();
        $one_terr = \App\up_concession_terrain::where('id', $OPL->geological_terrain_id)->first();

        return view('bala.view.viewBalaOPL', compact('OPL', 'opl_history', 'one_comp', 'one_conc', 'one_cont', 'one_terr'));
    }

    public function downloadOPL($type)
    {
        //Audit Logging
        self::log_audit_trail('OPL', 'Downloaded Data');
        $data = \App\Bala_opl::get();
        $view = 'upstream.excel.opl_excel';

        return     \Excel::create('OPL', function ($excel) use ($view, $data) {
            $excel->sheet('OPL', function ($sheet) use ($view, $data) {
                $sheet->loadView("$view", compact('data'))->setOrientation('landscape');
            });
        })->export('xlsx');
    }

    public function add_bala_oml(Request $request)
    {
        try {
            //INSERTING NEW (OML) Oil Mining Lease
            $add_bala_oml = \App\Bala_oml::updateOrCreate(['id'=> $request->id],
            [
                'company_id' => $request->company_id,
                'concession_held_id' => $request->concession_held_id,
                'equity_distribution' => $request->equity_distribution,
                'contract_type' => $request->contract_type,
                'date_of_grant' => $request->date_of_grant,
                'license_expire_date' => $request->license_expire_date,
                'area' => $request->area,
                'geological_terrain_id' => $request->geological_terrain_id,
                'comment' => $request->comment,
                'created_by' => \Auth::user()->name,
            ]);

            if ($request->id) {
                $add_hist = DB::table('bala_opl_oml_history')->insert([
                    'history_id' => $request->id,
                    'company_id' => $request->company_id,
                    'concession_held_id' => $request->concession_held_id,
                    'equity_distribution' => $request->equity_distribution,
                    'contract_type' => $request->contract_type,
                    'year_of_award' => $request->date_of_grant,
                    'license_expire_date' => $request->license_expire_date,
                    'area' => $request->area,
                    'geological_terrain_id' => $request->geological_terrain_id,
                    'comment' => $request->comment,
                    'created_by' => $add_bala_oml->created_by,
                    'created_at' => $add_bala_oml->created_at,
                    'updated_by' => \Auth::user()->name,
                    'updated_at' => date('Y-m-d h:i:s'),
                ]);
            } else {
                $add_hist = DB::table('bala_opl_oml_history')->insert([
                    'history_id' => $add_bala_oml->id,
                    'company_id' => $request->company_id,
                    'concession_held_id' => $request->concession_held_id,
                    'equity_distribution' => $request->equity_distribution,
                    'contract_type' => $request->contract_type,
                    'year_of_award' => $request->date_of_grant,
                    'license_expire_date' => $request->license_expire_date,
                    'area' => $request->area,
                    'geological_terrain_id' => $request->geological_terrain_id,
                    'comment' => $request->comment,
                    'created_by' => \Auth::user()->name,
                    'created_at' => date('Y-m-d h:i:s'),
                ]);
            }

            //send mail
            self::send_all_mail('UPSTREAM - (OML) Oil Mining Lease ');
            //Audit Logging
            self::log_audit_trail('OML', 'Added Data');

            if ($request->ajax()) {
                $oml_details = ['company'=>$add_bala_oml->company->company_name, 'concession'=>$add_bala_oml->concession->concession_name, 'equity_distribution'=>$add_bala_oml->equity_distribution, 'contract'=>$add_bala_oml->contract->contract_name, 'year_of_award'=>$add_bala_oml->year_of_award, 'license_expire_date'=>$add_bala_oml->license_expire_date, 'area'=>$add_bala_oml->area, 'terrain'=>$add_bala_oml->terrain->terrain_name, 'comment'=>$add_bala_oml->comment, 'id'=>$add_bala_oml->id];

                return response()->json(['status'=>'ok', 'message'=>$oml_details, 'info'=>'New (OML) Oil Mining Lease Added Successfully.']);
            } else {
                return redirect()->route('upstream')->with('info', '(OML) Oil Mining Lease Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editBalaOML(Request $request)
    {
        $OML_ = \App\Bala_oml::where('id', $request->id)->first();
        $one_comp = \App\company::where('id', $OML_->company_id)->first();
        $all_comp = \App\company::orderBy('company_name', 'asc')->get();
        $one_conc = \App\concession::where('id', $OML_->concession_held_id)->first();
        $all_conc = \App\concession::orderBy('concession_name', 'asc')->get();
        $one_cont = \App\contract::where('id', $OML_->contract_type)->first();
        $all_cont = \App\contract::where('contract_name', '<>', 'Marginal')->orderBy('contract_name', 'asc')->get();
        $one_terr = \App\up_concession_terrain::where('id', $OML_->geological_terrain_id)->first();
        $all_terr = \App\up_concession_terrain::orderBy('terrain_name', 'asc')->get();

        return view('bala.modals.editBalaOML', compact('OML_', 'one_comp', 'all_conc', 'one_conc', 'all_cont', 'one_cont', 'all_comp', 'one_terr', 'all_terr'));
    }

    public function upload_bala_oml(Request $request)
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
                    $add_ = \App\bala_oml::updateOrCreate(['id'=> $request->id],
                        [
                            'company_id' => $row['A'],
                            'concession_held_id' => $row['B'],
                            'equity_distribution' => $row['C'],
                            'contract_type' => $row['D'],
                            'date_of_grant' => $row['E'],
                            'license_expire_date' => $row['F'],
                            'area' => $row['G'],
                            'geological_terrain_id' => $row['H'],
                            'comment' => $row['I'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - (OML) Oil Mining Lease ');
            //Audit Logging
            self::log_audit_trail('OML', 'Bulk Data Upload');

            return redirect()->route('upstream')->with('info', 'Oil Mining Lease Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewBalaOML(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('OML', 'Viewed Data');
        $OML = \App\Bala_oml::where('id', $request->id)->first();
        $opl_history = \App\bala_opl_oml_history::where('history_id', $request->id)->orderBy('id', 'asc')->get();
        $one_comp = \App\company::where('id', $OML->company_id)->first();
        $all_comp = \App\company::orderBy('company_name', 'asc')->get();
        $one_conc = \App\concession::where('id', $OML->concession_held_id)->first();
        $all_conc = \App\concession::orderBy('concession_name', 'asc')->get();
        $one_cont = \App\contract::where('id', $OML->contract_type)->first();
        $all_cont = \App\contract::where('contract_name', '<>', 'Marginal')->orderBy('contract_name', 'asc')->get();
        $one_terr = \App\up_concession_terrain::where('id', $OML->geological_terrain_id)->first();
        $all_terr = \App\up_concession_terrain::orderBy('terrain_name', 'asc')->get();

        return view('bala.view.viewBalaOML', compact('OML', 'opl_history', 'one_comp', 'one_conc', 'one_cont', 'one_terr'));
    }

    public function downloadOML($type)
    {
        //Audit Logging
        self::log_audit_trail('OML', 'Downloaded Data');
        $data = \App\Bala_oml::get();
        $view = 'upstream.excel.oml_excel';

        return     \Excel::create('OML', function ($excel) use ($view, $data) {
            $excel->sheet('OML', function ($sheet) use ($view, $data) {
                $sheet->loadView("$view", compact('data'))->setOrientation('landscape');
            });
        })->export('xlsx');
    }

    public function add_bala_aop(Request $request)
    {
        try {
            //INSERTING NEW Allocated and Open Blocks
            $add_bala_aop = \App\Bala_block::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'basin_id' => $request->basin_id,
                'opl_blocks_allocated' => $request->opl_blocks_allocated,
                'oml_blocks_allocated' => $request->oml_blocks_allocated,
                'blocks_open' => $request->blocks_open,
                'total_block' => $request->total_block,
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            self::send_all_mail('UPSTREAM - Allocated and Open Blocks ');

            if ($request->ajax()) {
                $block_details = ['year'=>$add_bala_aop->year, 'basin'=>$add_bala_aop->basin->basin_name, 'opl_blocks_allocated'=>$add_bala_aop->opl_blocks_allocated, 'oml_blocks_allocated'=>$add_bala_aop->oml_blocks_allocated, 'blocks_open'=>$add_bala_aop->blocks_open, 'total_block'=>$add_bala_aop->total_block, 'id'=>$add_bala_aop->id];

                return response()->json(['status'=>'ok', 'message'=>$block_details, 'info'=>'New Allocated and Open Blocks Added Successfully.']);
            } else {
                return redirect()->route('upstream')->with('info', 'Allocated and Open Blocks Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editBalaBlock(Request $request)
    {
        $B_Bloc_ = \App\Bala_block::where('id', $request->id)->first();

        return view('bala.modals.editBalaBlock', compact('B_Bloc_'));
    }

    public function upload_bala_aop(Request $request)
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
                    $add_ = \App\Bala_block::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'basin_id' => $this->resolveModelId(\App\Basin::class, 'basin_name', $row['B']),
                            'opl_blocks_allocated' => $row['C'],
                            'oml_blocks_allocated' => $row['D'],
                            'blocks_open' => $row['E'],
                            'total_block' => $row['F'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Allocated and Open Blocks ');

            return redirect()->route('upstream')->with('info', 'Allocated and Open Blocks Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewBalaBlock(Request $request)
    {
        $B_Bloc = \App\Bala_block::where('id', $request->id)->first();

        return view('bala.view.viewBalaBlock', compact('B_Bloc'));
    }

    public function downloadAOL($type)
    {
        $data = \App\Bala_block::get();
        $view = 'upstream.excel.block_excel';

        return     \Excel::create('Blocks', function ($excel) use ($view, $data) {
            $excel->sheet('Blocks', function ($sheet) use ($view, $data) {
                $sheet->loadView("$view", compact('data'))->setOrientation('landscape');
            });
        })->export('xlsx');
    }

    public function add_marginal_field(Request $request)
    {
        try {
            //INSERTING NEW list Of Marginal Fields
            $add_bala_mf = \App\Bala_marginal_field::updateOrCreate(['id'=> $request->id],
            [
                'company_id' => $request->company_id,
                'field_id' => $request->field_id,
                'blocks' => $request->blocks,
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            self::send_all_mail('UPSTREAM - Marginal Fields ');
            //Audit Logging
            self::log_audit_trail('Marginal Fields', 'Added Data');

            if ($request->ajax()) {
                $field_details = ['company'=>$add_bala_mf->company->company_name, 'field'=>$add_bala_mf->field->field_name, 'blocks'=>$add_bala_mf->blocks, 'id'=>$add_bala_mf->id];

                return response()->json(['status'=>'ok', 'message'=>$field_details, 'info'=>'New list Of Marginal Fields Added Successfully.']);
            } else {
                return redirect()->route('upstream')->with('info', 'list Of Marginal Fields Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editBalaMarginalField(Request $request)
    {
        $M_FIELD_ = \App\Bala_marginal_field::where('id', $request->id)->first();

        return view('bala.modals.editBalaMarginalField', compact('M_FIELD_'));
    }

    public function upload_marginal_field(Request $request)
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
                    $add_ = \App\Bala_marginal_field::updateOrCreate(['id'=> $request->id],
                        [
                            'company_id' => $row['A'],
                            'field_id' => $row['B'],
                            'blocks' => $row['C'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Marginal Fields ');
            //Audit Logging
            self::log_audit_trail('Marginal Fields', 'Bulk Data Upload');

            return redirect()->route('upstream')->with('info', 'List Of Marginal Fields Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewBalaMarginalField(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Marginal Fields', 'Viewed Data');
        $M_FIELD = \App\Bala_marginal_field::where('id', $request->id)->first();

        return view('bala.view.viewBalaMarginalField', compact('M_FIELD'));
    }

    public function downloadBalaMarginalField($type)
    {
        //Audit Logging
        self::log_audit_trail('Marginal Fields', 'Downloaded Data');
        $data = \App\Bala_marginal_field::get();
        $view = 'upstream.excel.marginal_field_excel';

        return     \Excel::create('Marginal Fields', function ($excel) use ($view, $data) {
            $excel->sheet('Marginal Fields', function ($sheet) use ($view, $data) {
                $sheet->loadView("$view", compact('data'))->setOrientation('landscape');
            });
        })->export('xlsx');
    }

    public function add_data_project_status(Request $request)
    {
        try {
            //INSERTING NEW Multi-Client Data Projects Status
            $add_bala_dps = \App\bala_multiclient_project_status::updateOrCreate(['id'=> $request->id],
            [
                'company_id' => $request->company_id,
                'agreement_date' => $request->agreement_date,
                'area_of_survey_block_id' => $request->area_of_survey_block_id,
                'type_of_survey_project_id' => $request->type_of_survey_project_id,
                'quantum_of_survey' => $request->quantum_of_survey,
                'year_of_survey' => $request->year_of_survey,
                'remark' => $request->remark,
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            self::send_all_mail('UPSTREAM -  ');

            if ($request->ajax()) {
                $pstatus_details = ['company'=>$add_bala_dps->company->company_name, 'agreement_date'=>$add_bala_dps->agreement_date, 'area_of_survey'=>$add_bala_dps->area_of_survey->area_of_survey_name, 'type_of_survey'=>$add_bala_dps->type_of_survey->type_of_survey_name, 'quantum_of_survey'=>$add_bala_dps->quantum_of_survey, 'year_of_survey'=>$add_bala_dps->year_of_survey, 'remark'=>$add_bala_dps->remark, 'id'=>$add_bala_dps->id];

                return response()->json(['status'=>'ok', 'message'=>$pstatus_details, 'info'=>'New Multi-Client Data Projects Status Added Successfully.']);
            } else {
                return redirect()->route('bala')->with('info', 'Multi-Client Data Projects Status Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('bala')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editBalaProjectStatus(Request $request)
    {
        $PRO_STA_ = \App\bala_multiclient_project_status::where('id', $request->id)->first();

        return view('bala.modals.editBalaProjectStatus', compact('PRO_STA_'));
    }

    public function upload_data_project_status(Request $request)
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
                    $add_ = \App\bala_multiclient_project_status::updateOrCreate(['id'=> $request->id],
                        [
                            'company_id' => $row['A'],
                            'agreement_date' => $row['B'],
                            'area_of_survey_block_id' => $row['C'],
                            'type_of_survey_project_id' => $row['D'],
                            'quantum_of_survey' => $row['E'],
                            'year_of_survey' => $row['F'],
                            'remark' => $row['G'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM -  ');

            return redirect()->route('bala')->with('info', 'Multi-Client Data Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('bala')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewBalaProjectStatus(Request $request)
    {
        $PRO_STATUS = \App\bala_multiclient_project_status::where('id', $request->id)->first();

        return view('bala.view.viewBalaProjectStatus', compact('PRO_STATUS'));
    }

    public function downloadBalaProjectStatus($type)
    {
        $data = \App\bala_multiclient_project_status::get()->toArray();

        return Excel::create('Concession_BalaProjectStatus', function ($excel) use ($data) {
            $excel->sheet('BalaProjectStatus', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_area_of_survey(Request $request)
    {
        try {
            $aos = \App\area_of_survey::orderBy('id', 'desc')->first();
            $aos_id = $aos->id + 1;
            //INSERTING NEW Area Of Survey
            $add_bala_aos = \App\area_of_survey::updateOrCreate(['id'=> $request->id],
            [
                'id' => $aos_id,
                'area_of_survey_name' => $request->area_of_survey_name,
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            self::send_all_mail('UPSTREAM -  ');

            if ($request->ajax()) {
                $area_details = ['area_of_survey_name'=>$add_bala_aos->area_of_survey_name, 'id'=>$add_bala_aos->id];

                return response()->json(['status'=>'ok', 'message'=>$area_details, 'info'=>'New Area Of Survey Added Successfully.']);
            } else {
                return redirect()->route('bala')->with('info', 'Area Of Survey Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('bala')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editBalaAreaOfSurvey(Request $request)
    {
        $AOS_ = \App\area_of_survey::where('id', $request->id)->first();

        return view('bala.modals.editBalaAreaOfSurvey', compact('AOS_'));
    }

    public function upload_area_of_survey(Request $request)
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
                    $add_ = \App\area_of_survey::updateOrCreate(['id'=> $request->id],
                        [
                            'area_of_survey_name' => $row['A'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM -  ');

            return redirect()->route('bala')->with('info', 'Area Of Survey Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('bala')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function downloadarea_of_survey($type)
    {
        $data = \App\area_of_survey::get()->toArray();

        return Excel::create('Concession_area_of_survey', function ($excel) use ($data) {
            $excel->sheet('area_of_survey', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_type_of_survey(Request $request)
    {
        try {
            $tos = \App\type_of_survey::orderBy('id', 'desc')->first();
            $tos_id = $tos->id + 1;
            //INSERTING NEW Type Of Survey
            $add_bala_tos = \App\type_of_survey::updateOrCreate(['id'=> $request->id],
            [
                'id' => $tos_id,
                'type_of_survey_name' => $request->type_of_survey_name,
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            self::send_all_mail('UPSTREAM -  ');

            if ($request->ajax()) {
                $area_details = ['type_of_survey_name'=>$add_bala_tos->type_of_survey_name, 'id'=>$add_bala_tos->id];

                return response()->json(['status'=>'ok', 'message'=>$area_details, 'info'=>'New Type Of Survey Added Successfully.']);
            } else {
                return redirect()->route('bala')->with('info', 'Type Of Survey Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('bala')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editBalaTypeOfSurvey(Request $request)
    {
        $TOS_ = \App\type_of_survey::where('id', $request->id)->first();

        return view('bala.modals.editBalaTypeOfSurvey', compact('TOS_'));
    }

    public function upload_type_of_survey(Request $request)
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
                    $add_ = \App\type_of_survey::updateOrCreate(['id'=> $request->id],
                        [
                            'type_of_survey_name' => $row['A'],
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM -  ');

            return redirect()->route('bala')->with('info', 'Type Of Survey Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('bala')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function downloadtype_of_survey($type)
    {
        $data = \App\type_of_survey::get()->toArray();

        return Excel::create('Concession_type_of_survey', function ($excel) use ($data) {
            $excel->sheet('type_of_survey', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
}
