<?php

namespace App\Http\Controllers;

use App\Http\Resources\WARGasDepletionRate as WARGasDepletionRateResource;
use App\Http\Resources\WARGasDrilling as WARGasDrillingResource;
use App\Http\Resources\WARGasExportBonny as WARGasExportBonnyResource;
use App\Http\Resources\WARGasExportEscravos as WARGasExportEscravosResource;
use App\Http\Resources\WARGasExportNlng as WARGasExportNlngResource;
use App\Http\Resources\WARGasExportOperation as WARGasExportOperationResource;
use App\Http\Resources\WARGasFDP as WARGasFDPResource;
use App\Http\Resources\WARGasFlare as WARGasFlareResource;
use App\Http\Resources\WARGasProductionUtilizationFlare as WARGasProductionUtilizationFlareResource;
use App\Http\Resources\WARGasReEntry as WARGasReEntryResource;
use App\Http\Resources\WARGasSupplyObligation as WARGasSupplyObligationResource;
use App\Http\Resources\WARGasUtilization as WARGasUtilizationResource;
use App\Notifications\emailNOGIARManager;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WARGasController extends Controller
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
            case 'gas_drilling':
                return $this->AddGasDrilling($request);
            break;

            case 'gas_re_entry':
                return $this->AddGasReEntry($request);
            break;

            case 'gas_fdp':
                return $this->AddGasFDP($request);
            break;

            case 'gas_depletion_rate':
                return $this->AddGasDepletionRate($request);
            break;

            case 'gas_production_utilization_flare':
                return $this->AddGasProductionUtilizationFlare($request);
            break;

            case 'gas_utilization':
                return $this->AddGasUtilization($request);
            break;

            case 'gas_flare':
                return $this->AddGasFlare($request);
            break;

            case 'gas_supply_obligation':
                return $this->AddGasSupplyObligation($request);
            break;

            case 'gas_export_bonny':
                return $this->AddGasExportBonny($request);
            break;

            case 'gas_export_nlng':
                return $this->AddGasExportNlng($request);
            break;

            case 'gas_export_escravos':
                return $this->AddGasExportEscravos($request);
            break;

            case 'gas_export_operation':
                return $this->AddGasExportOperation($request);
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
            case 'gas_drilling':
                $gas_drilling = \App\WARGasDrilling::findOrFail($id);

                return new WARGasDrillingResource($gas_drilling);
            break;

            case 'gas_re_entry':
                $gas_re_entry = \App\WARGasReEntry::findOrFail($id);

                return new WARGasReEntryResource($gas_re_entry);
            break;

            case 'gas_fdp':
                $gas_fdp = \App\WARGasFDP::findOrFail($id);

                return new WARGasFDPResource($gas_fdp);
            break;

            case 'gas_depletion_rate':
                $gas_depletion_rate = \App\WARGasDepletionRate::findOrFail($id);

                return new WARGasDepletionRateResource($gas_depletion_rate);
            break;

            case 'gas_production_utilization_flare':
                $gas_production_utilization_flare = \App\WARGasProductionUtilizationFlare::findOrFail($id);

                return new WARGasProductionUtilizationFlareResource($gas_production_utilization_flare);
            break;

            case 'gas_utilization':
                $gas_utilization = \App\WARGasUtilization::findOrFail($id);

                return new WARGasUtilizationResource($gas_utilization);
            break;

            case 'gas_flare':
                $gas_flare = \App\WARGasFlare::findOrFail($id);

                return new WARGasFlareResource($gas_flare);
            break;

            case 'gas_supply_obligation':
                $gas_supply_obligation = \App\WARGasSupplyObligation::findOrFail($id);

                return new WARGasSupplyObligationResource($gas_supply_obligation);
            break;

            case 'gas_export_bonny':
                $gas_export_bonny = \App\WARGasExportBonny::findOrFail($id);

                return new WARGasExportBonnyResource($gas_export_bonny);
            break;

            case 'gas_export_nlng':
                $gas_export_nlng = \App\WARGasExportNlng::findOrFail($id);

                return new WARGasExportNlngResource($gas_export_nlng);
            break;

            case 'gas_export_escravos':
                $gas_export_escravos = \App\WARGasExportEscravos::findOrFail($id);

                return new WARGasExportEscravosResource($gas_export_escravos);
            break;

            case 'gas_export_operation':
                $gas_export_operation = \App\WARGasExportOperation::findOrFail($id);

                return new WARGasExportOperationResource($gas_export_operation);
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
            case 'gas_drilling':
                $gas_drilling = \App\WARGasDrilling::findOrFail($id);
                if ($gas_drilling->delete()) {
                    return new WARGasDrillingResource($gas_drilling);
                }
            break;

            case 'gas_re_entry':
                $gas_re_entry = \App\WARGasReEntry::findOrFail($id);
                if ($gas_re_entry->delete()) {
                    return new WARGasReEntryResource($gas_re_entry);
                }
            break;

            case 'gas_fdp':
                $gas_fdp = \App\WARGasFDP::findOrFail($id);
                if ($gas_fdp->delete()) {
                    return new WARGasFDPResource($gas_fdp);
                }
            break;

            case 'gas_depletion_rate':
                $gas_depletion_rate = \App\WARGasDepletionRate::findOrFail($id);
                if ($gas_depletion_rate->delete()) {
                    return new WARGasDepletionRateResource($gas_depletion_rate);
                }
            break;

            case 'gas_production_utilization_flare':
                $gas_production_utilization_flare = \App\WARGasProductionUtilizationFlare::findOrFail($id);
                if ($gas_production_utilization_flare->delete()) {
                    return new WARGasProductionUtilizationFlareResource($gas_production_utilization_flare);
                }
            break;

            case 'gas_utilization':
                $gas_utilization = \App\WARGasUtilization::findOrFail($id);
                if ($gas_utilization->delete()) {
                    return new WARGasUtilizationResource($gas_utilization);
                }
            break;

            case 'gas_flare':
                $gas_flare = \App\WARGasUtilization::findOrFail($id);
                if ($gas_flare->delete()) {
                    return new WARGasUtilizationResource($gas_flare);
                }
            break;

            case 'gas_supply_obligation':
                $gas_supply_obligation = \App\WARGasSupplyObligation::findOrFail($id);
                if ($gas_supply_obligation->delete()) {
                    return new WARGasSupplyObligationResource($gas_supply_obligation);
                }
            break;

            case 'gas_export_bonny':
                $gas_export_bonny = \App\WARGasExportBonny::findOrFail($id);
                if ($gas_export_bonny->delete()) {
                    return new WARGasExportBonnyResource($gas_export_bonny);
                }
            break;

            case 'gas_export_nlng':
                $gas_export_nlng = \App\WARGasExportNlng::findOrFail($id);
                if ($gas_export_nlng->delete()) {
                    return new WARGasExportNlngResource($gas_export_nlng);
                }
            break;

            case 'gas_export_escravos':
                $gas_export_escravos = \App\WARGasExportEscravos::findOrFail($id);
                if ($gas_export_escravos->delete()) {
                    return new WARGasExportEscravosResource($gas_export_escravos);
                }
            break;

            case 'gas_export_operation':
                $gas_export_operation = \App\WARGasExportOperation::findOrFail($id);
                if ($gas_export_operation->delete()) {
                    return new WARGasExportOperationResource($gas_export_operation);
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
            case 'drilling':
                return $this->uploadDrilling($request);
            break;

            case 're_entry':
                return $this->uploadReEntry($request);
            break;

            case 'fdp':
                return $this->uploadFDP($request);
            break;

            case 'depletion':
                return $this->uploadDepletion($request);
            break;

            case 'production':
                return $this->uploadProduction($request);
            break;

            case 'utilization':
                return $this->uploadUtilization($request);
            break;

            case 'flared':
                return $this->uploadFlared($request);
            break;

            case 'dgso':
                return $this->uploadDGSO($request);
            break;

            case 'bonny':
                return $this->uploadBonnyTerminal($request);
            break;

            case 'nlng':
                return $this->uploadNLNG($request);
            break;

            case 'escravos':
                return $this->uploadEscravos($request);
            break;

            case 'gas_operation':
                return $this->uploadGasOperation($request);
            break;

            default:
                // code...
            break;
        }
    }

    public function indexGasDrilling(Request $request)
    {
        //
        if ($request->filled('all')) {
            $gas_drillings = \App\WARGasDrilling::orderBy('id', 'desc')->get();

            return ['data'=>$gas_drillings];
        } else {
            $gas_drillings = \App\WARGasDrilling::orderBy('id', 'desc')->paginate(15);

            return WARGasDrillingResource::collection($gas_drillings);
        }
    }

    public function AddGasDrilling(Request $request)
    {
        $gas_drilling = $request->isMethod('put') ? \App\WARGasDrilling::findOrFail($request->gas_drilling_id) : new \App\WARGasDrilling;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $gas_drilling->id = $request->gas_drilling_id;
            $gas_drilling->date = date('Y-m-d', strtotime($request->date));
            $gas_drilling->week = $request->week;
            $gas_drilling->exploration_commenced = $request->exploration_commenced;
            $gas_drilling->exploration_ongoing = $request->exploration_ongoing;
            $gas_drilling->exploration_completed = $request->exploration_completed;
            $gas_drilling->appraisal_commenced = $request->appraisal_commenced;
            $gas_drilling->appraisal_ongoing = $request->appraisal_ongoing;
            $gas_drilling->appraisal_completed = $request->appraisal_completed;
            $gas_drilling->development_commenced = $request->development_commenced;
            $gas_drilling->development_ongoing = $request->development_ongoing;
            $gas_drilling->development_completed = $request->development_completed;
            $gas_drilling->well_completion = $request->well_completion;
            $gas_drilling->well_spudded = $request->well_spudded;

            //send mail
            $this->send_all_mail($request, 'GAS - Drilling Activities');
            //Audit Logging
            $this->log_audit_trail($request, 'Drilling Activities', 'Updated Record');
        } else {
            // $gas_drilling->id = $request->gas_drilling_id;
            $gas_drilling->date = date('Y-m-d', strtotime($request->date));
            $gas_drilling->week = $request->week;
            $gas_drilling->exploration_commenced = $request->exploration_commenced;
            $gas_drilling->exploration_ongoing = $request->exploration_ongoing;
            $gas_drilling->exploration_completed = $request->exploration_completed;
            $gas_drilling->appraisal_commenced = $request->appraisal_commenced;
            $gas_drilling->appraisal_ongoing = $request->appraisal_ongoing;
            $gas_drilling->appraisal_completed = $request->appraisal_completed;
            $gas_drilling->development_commenced = $request->development_commenced;
            $gas_drilling->development_ongoing = $request->development_ongoing;
            $gas_drilling->development_completed = $request->development_completed;
            $gas_drilling->well_completion = $request->well_completion;
            $gas_drilling->well_spudded = $request->well_spudded;
            $gas_drilling->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'GAS - Drilling Activities');
            //Audit Logging
            $this->log_audit_trail($request, 'Drilling Activities', 'Added Record');
        }

        if ($gas_drilling->save()) {
            return new WARGasDrillingResource($gas_drilling);
        }
    }

    public function uploadDrilling(Request $request)
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
                    $uploaded = \App\WARGasDrilling::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'exploration_commenced' => $row['C'],
                        'exploration_ongoing' => $row['D'],
                        'exploration_completed' => $row['E'],
                        'appraisal_commenced' => $row['F'],
                        'appraisal_ongoing' => $row['G'],
                        'appraisal_completed' => $row['H'],
                        'development_commenced' => $row['I'],
                        'development_ongoing' => $row['J'],
                        'development_completed' => $row['K'],
                        'well_completion' => $row['L'],
                        'well_spudded' => $row['M'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'GAS - Drilling Activities');
            //Audit Logging
            $this->log_audit_trail($request, 'Drilling Activities', 'Bulk Data Upload');

            $gas_drillings = \App\WARGasDrilling::orderBy('id', 'desc')->paginate(15);

            return WARGasDrillingResource::collection($gas_drillings);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexGasReEntries(Request $request)
    {
        //
        if ($request->filled('all')) {
            $gas_re_entries = \App\WARGasReEntry::orderBy('id', 'desc')->get();

            return ['data'=>$gas_re_entries];
        } else {
            $gas_re_entries = \App\WARGasReEntry::orderBy('id', 'desc')->paginate(15);

            return WARGasReEntryResource::collection($gas_re_entries);
        }
    }

    public function AddGasReEntry(Request $request)
    {
        $gas_re_entry = $request->isMethod('put') ? \App\WARGasReEntry::findOrFail($request->gas_re_entry_id) : new \App\WARGasReEntry;

        if ($request->isMethod('put') == true) {
            $gas_re_entry->id = $request->gas_re_entry_id;
            $gas_re_entry->date = date('Y-m-d', strtotime($request->date));
            $gas_re_entry->week = $request->week;
            $gas_re_entry->completion = $request->completion;
            $gas_re_entry->workover = $request->workover;
            $gas_re_entry->total_reserve_addition = $request->total_reserve_addition;
            $gas_re_entry->expected_rate = $request->expected_rate;

            //send mail
            $this->send_all_mail($request, 'GAS - Re Entry');
            //Audit Logging
            $this->log_audit_trail($request, 'Re Entry', 'Updated Record');
        } else {
            // $gas_re_entry->id = $request->gas_re_entry_id;
            $gas_re_entry->date = date('Y-m-d', strtotime($request->date));
            $gas_re_entry->week = $request->week;
            $gas_re_entry->completion = $request->completion;
            $gas_re_entry->workover = $request->workover;
            $gas_re_entry->total_reserve_addition = $request->total_reserve_addition;
            $gas_re_entry->expected_rate = $request->expected_rate;
            $gas_re_entry->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'GAS - Re Entry');
            //Audit Logging
            $this->log_audit_trail($request, 'Re Entry', 'Added Record');
        }

        if ($gas_re_entry->save()) {
            return new WARGasReEntryResource($gas_re_entry);
        }
    }

    public function uploadReEntry(Request $request)
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
                    $uploaded = \App\WARGasReEntry::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'completion' => $row['C'],
                        'workover' => $row['D'],
                        'total_reserve_addition' => $row['E'],
                        'expected_rate' => $row['F'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'GAS - Re Entry');
            //Audit Logging
            $this->log_audit_trail($request, 'Re Entry', 'Bulk Data Upload');

            $gas_re_entries = \App\WARGasReEntry::orderBy('id', 'desc')->paginate(15);

            return WARGasReEntryResource::collection($gas_re_entries);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexGasFDPs(Request $request)
    {
        //
        if ($request->filled('all')) {
            $gas_fdps = \App\WARGasFDP::orderBy('id', 'desc')->get();

            return ['data'=>$gas_fdps];
        } else {
            $gas_fdps = \App\WARGasFDP::orderBy('id', 'desc')->paginate(2);

            return WARGasFDPResource::collection($gas_fdps);
        }
    }

    public function AddGasFDP(Request $request)
    {
        $gas_fdp = $request->isMethod('put') ? \App\WARGasFDP::findOrFail($request->gas_fdp_id) : new \App\WARGasFDP;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $gas_fdp->id = $request->gas_fdp_id;
            $gas_fdp->date = date('Y-m-d', strtotime($request->date));
            $gas_fdp->week = $request->week;
            $gas_fdp->application_received = $request->application_received;
            $gas_fdp->application_approved = $request->application_approved;
            $gas_fdp->reserves = $request->reserves;

            //send mail
            $this->send_all_mail($request, 'GAS - FDP');
            //Audit Logging
            $this->log_audit_trail($request, 'FDP', 'Updated Record');
        } else {
            // $gas_fdp->id = $request->gas_fdp_id;
            $gas_fdp->date = date('Y-m-d', strtotime($request->date));
            $gas_fdp->week = $request->week;
            $gas_fdp->application_received = $request->application_received;
            $gas_fdp->application_approved = $request->application_approved;
            $gas_fdp->reserves = $request->reserves;
            $gas_fdp->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'GAS - FDP');
            //Audit Logging
            $this->log_audit_trail($request, 'FDP', 'Added Record');
        }

        if ($gas_fdp->save()) {
            return new WARGasFDPResource($gas_fdp);
        }
    }

    public function uploadFDP(Request $request)
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
                    $uploaded = \App\WARGasFDP::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'application_received' => $row['C'],
                        'application_approved' => $row['D'],
                        'reserves' => $row['E'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'GAS - FDP');
            //Audit Logging
            $this->log_audit_trail($request, 'FDP', 'Bulk Data Upload');

            $gas_fdps = \App\WARGasFDP::orderBy('id', 'desc')->paginate(15);

            return WARGasFDPResource::collection($gas_fdps);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexGasDepletionRates(Request $request)
    {
        //
        if ($request->filled('all')) {
            $gas_depletion_rates = \App\WARGasDepletionRate::orderBy('id', 'desc')->get();

            return ['data'=>$gas_depletion_rates];
        } else {
            $gas_depletion_rates = \App\WARGasDepletionRate::orderBy('id', 'desc')->paginate(15);

            return WARGasDepletionRateResource::collection($gas_depletion_rates);
        }
    }

    public function AddGasDepletionRate(Request $request)
    {
        $gas_depletion_rate = $request->isMethod('put') ? \App\WARGasDepletionRate::findOrFail($request->gas_depletion_rate_id) : new \App\WARGasDepletionRate;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $gas_depletion_rate->id = $request->gas_depletion_rate_id;
            $gas_depletion_rate->date = date('Y-m-d', strtotime($request->date));
            $gas_depletion_rate->week = $request->week;
            $gas_depletion_rate->ag_reserves = $request->ag_reserves;
            $gas_depletion_rate->nag_reserves = $request->nag_reserves;
            $gas_depletion_rate->ag_depletion = $request->ag_depletion;
            $gas_depletion_rate->nag_depletion = $request->nag_depletion;
            $gas_depletion_rate->ag_life_year = $request->ag_life_year;
            $gas_depletion_rate->nag_life_year = $request->nag_life_year;

            //send mail
            $this->send_all_mail($request, 'GAS - Depletion Rate');
            //Audit Logging
            $this->log_audit_trail($request, 'Depletion Rate', 'Updated Record');
        } else {
            // $gas_depletion_rate->id = $request->gas_depletion_rate_id;
            $gas_depletion_rate->date = date('Y-m-d', strtotime($request->date));
            $gas_depletion_rate->week = $request->week;
            $gas_depletion_rate->ag_reserves = $request->ag_reserves;
            $gas_depletion_rate->nag_reserves = $request->nag_reserves;
            $gas_depletion_rate->ag_depletion = $request->ag_depletion;
            $gas_depletion_rate->nag_depletion = $request->nag_depletion;
            $gas_depletion_rate->ag_life_year = $request->ag_life_year;
            $gas_depletion_rate->nag_life_year = $request->nag_life_year;
            $gas_depletion_rate->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'GAS - Depletion Rate');
            //Audit Logging
            $this->log_audit_trail($request, 'Depletion Rate', 'Added Record');
        }

        if ($gas_depletion_rate->save()) {
            return new WARGasDepletionRateResource($gas_depletion_rate);
        }
    }

    public function uploadDepletion(Request $request)
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
                    $uploaded = \App\WARGasDepletionRate::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'ag_reserves' => $row['C'],
                        'nag_reserves' => $row['D'],
                        'ag_depletion' => $row['E'],
                        'nag_depletion' => $row['F'],
                        'ag_life_year' => $row['G'],
                        'nag_life_year' => $row['H'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'GAS - Depletion Rate');
            //Audit Logging
            $this->log_audit_trail($request, 'Depletion Rate', 'Bulk Data Upload');

            $gas_depletion_rates = \App\WARGasDepletionRate::orderBy('id', 'desc')->paginate(15);

            return WARGasDepletionRateResource::collection($gas_depletion_rates);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexGasProductionUtilizationFlares(Request $request)
    {
        //
        if ($request->filled('all')) {
            $gas_production_utilization_flares = \App\WARGasProductionUtilizationFlare::orderBy('id', 'desc')->get();

            return ['data'=>$gas_production_utilization_flares];
        } else {
            $gas_production_utilization_flares = \App\WARGasProductionUtilizationFlare::orderBy('id', 'desc')->paginate(15);

            return WARGasProductionUtilizationFlareResource::collection($gas_production_utilization_flares);
        }
    }

    public function AddGasProductionUtilizationFlare(Request $request)
    {
        $gas_production_utilization_flare = $request->isMethod('put') ? \App\WARGasProductionUtilizationFlare::findOrFail($request->gas_production_utilization_flare_id) : new \App\WARGasProductionUtilizationFlare;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $gas_production_utilization_flare->id = $request->gas_production_utilization_flare_id;
            $gas_production_utilization_flare->date = date('Y-m-d', strtotime($request->date));
            $gas_production_utilization_flare->week = $request->week;
            $gas_production_utilization_flare->ag_produced = $request->ag_produced;
            $gas_production_utilization_flare->nag_produced = $request->nag_produced;
            $gas_production_utilization_flare->gas_production = $request->gas_production;
            $gas_production_utilization_flare->gas_utilization = $request->gas_utilization;
            $gas_production_utilization_flare->gas_flared = $request->gas_flared;
            $gas_production_utilization_flare->gas_flared_perc = $request->gas_flared_perc;

            //send mail
            $this->send_all_mail($request, 'GAS - Production');
            //Audit Logging
            $this->log_audit_trail($request, 'Production', 'Updated Record');
        } else {
            // $gas_production_utilization_flare->id = $request->gas_production_utilization_flare_id;
            $gas_production_utilization_flare->date = date('Y-m-d', strtotime($request->date));
            $gas_production_utilization_flare->week = $request->week;
            $gas_production_utilization_flare->ag_produced = $request->ag_produced;
            $gas_production_utilization_flare->nag_produced = $request->nag_produced;
            $gas_production_utilization_flare->gas_production = $request->gas_production;
            $gas_production_utilization_flare->gas_utilization = $request->gas_utilization;
            $gas_production_utilization_flare->gas_flared = $request->gas_flared;
            $gas_production_utilization_flare->gas_flared_perc = $request->gas_flared_perc;
            $gas_production_utilization_flare->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'GAS - Production');
            //Audit Logging
            $this->log_audit_trail($request, 'Production', 'Added Record');
        }

        if ($gas_production_utilization_flare->save()) {
            return new WARGasProductionUtilizationFlareResource($gas_production_utilization_flare);
        }
    }

    public function uploadProduction(Request $request)
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
                    $uploaded = \App\WARGasProductionUtilizationFlare::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'ag_produced' => $row['C'],
                        'nag_produced' => $row['D'],
                        'gas_production' => $row['E'],
                        'gas_utilization' => $row['F'],
                        'gas_flared' => $row['G'],
                        'gas_flared_perc' => $row['H'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'GAS - Production');
            //Audit Logging
            $this->log_audit_trail($request, 'Production', 'Bulk Data Upload');

            $gas_production_utilization_flares = \App\WARGasProductionUtilizationFlare::orderBy('id', 'desc')->paginate(15);

            return WARGasProductionUtilizationFlareResource::collection($gas_production_utilization_flares);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexGasUtilization(Request $request)
    {
        //
        if ($request->filled('all')) {
            $gas_utilizations = \App\WARGasUtilization::orderBy('id', 'desc')->get();

            return ['data'=>$gas_utilizations];
        } else {
            $gas_utilizations = \App\WARGasUtilization::orderBy('id', 'desc')->paginate(15);

            return WARGasUtilizationResource::collection($gas_utilizations);
        }
    }

    public function AddGasUtilization(Request $request)
    {
        $gas_utilization = $request->isMethod('put') ? \App\WARGasUtilization::findOrFail($request->gas_utilization_id) : new \App\WARGasUtilization;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $gas_utilization->id = $request->gas_utilization_id;
            $gas_utilization->date = date('Y-m-d', strtotime($request->date));
            $gas_utilization->week = $request->week;
            $gas_utilization->fuel_gas = $request->fuel_gas;
            $gas_utilization->gas_lift = $request->gas_lift;
            $gas_utilization->gas_reinjection = $request->gas_reinjection;
            $gas_utilization->ngl_lpg = $request->ngl_lpg;
            $gas_utilization->gas_to_ipp = $request->gas_to_ipp;
            $gas_utilization->local_supply = $request->local_supply;
            $gas_utilization->gas_export = $request->gas_export;

            //send mail
            $this->send_all_mail($request, 'GAS - Utilization');
            //Audit Logging
            $this->log_audit_trail($request, 'Utilization', 'Updated Record');
        } else {
            // $gas_utilization->id = $request->gas_utilization_id;
            $gas_utilization->date = date('Y-m-d', strtotime($request->date));
            $gas_utilization->week = $request->week;
            $gas_utilization->fuel_gas = $request->fuel_gas;
            $gas_utilization->gas_lift = $request->gas_lift;
            $gas_utilization->gas_reinjection = $request->gas_reinjection;
            $gas_utilization->ngl_lpg = $request->ngl_lpg;
            $gas_utilization->gas_to_ipp = $request->gas_to_ipp;
            $gas_utilization->local_supply = $request->local_supply;
            $gas_utilization->gas_export = $request->gas_export;
            $gas_utilization->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'GAS - Utilization');
            //Audit Logging
            $this->log_audit_trail($request, 'Utilization', 'Added Record');
        }

        if ($gas_utilization->save()) {
            return new WARGasUtilizationResource($gas_utilization);
        }
    }

    public function uploadUtilization(Request $request)
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
                    $uploaded = \App\WARGasUtilization::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'fuel_gas' => $row['C'],
                        'gas_lift' => $row['D'],
                        'gas_reinjection' => $row['E'],
                        'ngl_lpg' => $row['F'],
                        'gas_to_ipp' => $row['G'],
                        'local_supply' => $row['H'],
                        'gas_export' => $row['I'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'GAS - Utilization');
            //Audit Logging
            $this->log_audit_trail($request, 'Utilization', 'Bulk Data Upload');

            $gas_utilizations = \App\WARGasUtilization::orderBy('id', 'desc')->paginate(15);

            return WARGasUtilizationResource::collection($gas_utilizations);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexGasFlare(Request $request)
    {
        //
        if ($request->filled('all')) {
            $gas_flares = \App\WARGasFlare::orderBy('id', 'desc')->get();

            return ['data'=>$gas_flares];
        } else {
            $gas_flares = \App\WARGasFlare::orderBy('id', 'desc')->paginate(15);

            return WARGasFlareResource::collection($gas_flares);
        }
    }

    public function AddGasFlare(Request $request)
    {
        $gas_flare = $request->isMethod('put') ? \App\WARGasFlare::findOrFail($request->gas_flare_id) : new \App\WARGasFlare;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $gas_flare->id = $request->gas_flare_id;
            $gas_flare->date = date('Y-m-d', strtotime($request->date));
            $gas_flare->week = $request->week;
            $gas_flare->permit_to_flare = $request->permit_to_flare;
            $gas_flare->quantity_approved = $request->quantity_approved;
            $gas_flare->quantity_under_review = $request->quantity_under_review;

            //send mail
            $this->send_all_mail($request, 'GAS - Flared');
            //Audit Logging
            $this->log_audit_trail($request, 'Flared', 'Updated Record');
        } else {
            // $gas_flare->id = $request->gas_flare_id;
            $gas_flare->date = date('Y-m-d', strtotime($request->date));
            $gas_flare->week = $request->week;
            $gas_flare->permit_to_flare = $request->permit_to_flare;
            $gas_flare->quantity_approved = $request->quantity_approved;
            $gas_flare->quantity_under_review = $request->quantity_under_review;
            $gas_flare->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'GAS - Flared');
            //Audit Logging
            $this->log_audit_trail($request, 'Flared', 'Added Record');
        }

        if ($gas_flare->save()) {
            return new WARGasFlareResource($gas_flare);
        }
    }

    public function uploadFlared(Request $request)
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
                    $uploaded = \App\WARGasFlare::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'permit_to_flare' => $row['C'],
                        'quantity_approved' => $row['D'],
                        'quantity_under_review' => $row['E'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'GAS - Flared');
            //Audit Logging
            $this->log_audit_trail($request, 'Flared', 'Bulk Data Upload');

            $gas_flares = \App\WARGasFlare::orderBy('id', 'desc')->paginate(15);

            return WARGasFlareResource::collection($gas_flares);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexGasSupplyObligation(Request $request)
    {
        //
        if ($request->filled('all')) {
            $gas_supply_obligations = \App\WARGasSupplyObligation::orderBy('id', 'desc')->get();

            return ['data'=>$gas_supply_obligations];
        } else {
            $gas_supply_obligations = \App\WARGasSupplyObligation::orderBy('id', 'desc')->paginate(15);

            return WARGasSupplyObligationResource::collection($gas_supply_obligations);
        }
    }

    public function AddGasSupplyObligation(Request $request)
    {
        $gas_supply_obligation = $request->isMethod('put') ? \App\WARGasSupplyObligation::findOrFail($request->gas_supply_obligation_id) : new \App\WARGasSupplyObligation;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $gas_supply_obligation->id = $request->gas_supply_obligation_id;
            $gas_supply_obligation->date = date('Y-m-d', strtotime($request->date));
            $gas_supply_obligation->week = $request->week;
            $gas_supply_obligation->allocated_dgso = $request->allocated_dgso;
            $gas_supply_obligation->dom_gas_supply = $request->dom_gas_supply;
            $gas_supply_obligation->dgso_performance = $request->dgso_performance;

            //send mail
            $this->send_all_mail($request, 'GAS - Supply Obligation');
            //Audit Logging
            $this->log_audit_trail($request, 'Supply Obligation', 'Updated Record');
        } else {
            // $gas_supply_obligation->id = $request->gas_supply_obligation_id;
            $gas_supply_obligation->date = date('Y-m-d', strtotime($request->date));
            $gas_supply_obligation->week = $request->week;
            $gas_supply_obligation->allocated_dgso = $request->allocated_dgso;
            $gas_supply_obligation->dom_gas_supply = $request->dom_gas_supply;
            $gas_supply_obligation->dgso_performance = $request->dgso_performance;
            $gas_supply_obligation->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'GAS - Supply Obligation');
            //Audit Logging
            $this->log_audit_trail($request, 'Supply Obligation', 'Added Record');
        }

        if ($gas_supply_obligation->save()) {
            return new WARGasSupplyObligationResource($gas_supply_obligation);
        }
    }

    public function uploadRomApplication(Request $request)
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
                    $uploaded = \App\WARGasSupplyObligation::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'allocated_dgso' => $row['C'],
                        'dom_gas_supply' => $row['D'],
                        'dgso_performance' => $row['E'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'GAS - Supply Obligation');
            //Audit Logging
            $this->log_audit_trail($request, 'Supply Obligation', 'Bulk Data Upload');

            $gas_supply_obligations = \App\WARGasSupplyObligation::orderBy('id', 'desc')->paginate(15);

            return WARGasSupplyObligationResource::collection($gas_supply_obligations);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexGasExportBonny(Request $request)
    {
        //
        if ($request->filled('all')) {
            $gas_export_bonnies = \App\WARGasExportBonny::orderBy('id', 'desc')->get();

            return ['data'=>$gas_export_bonnies];
        } else {
            $gas_export_bonnies = \App\WARGasExportBonny::orderBy('id', 'desc')->paginate(2);

            return WARGasExportBonnyResource::collection($gas_export_bonnies);
        }
    }

    public function AddGasExportBonny(Request $request)
    {
        $gas_export_bonny = $request->isMethod('put') ? \App\WARGasExportBonny::findOrFail($request->gas_export_bonny_id) : new \App\WARGasExportBonny;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $gas_export_bonny->id = $request->gas_export_bonny_id;
            $gas_export_bonny->date = date('Y-m-d', strtotime($request->date));
            $gas_export_bonny->week = $request->week;
            $gas_export_bonny->propane = $request->propane;
            $gas_export_bonny->butane = $request->butane;
            $gas_export_bonny->pentane = $request->pentane;
            $gas_export_bonny->total_no_vessel = $request->total_no_vessel;

            //send mail
            $this->send_all_mail($request, 'GAS - Bonny Terminal');
            //Audit Logging
            $this->log_audit_trail($request, 'Bonny Terminal', 'Updated Record');
        } else {
            // $gas_export_bonny->id = $request->gas_export_bonny_id;
            $gas_export_bonny->date = date('Y-m-d', strtotime($request->date));
            $gas_export_bonny->week = $request->week;
            $gas_export_bonny->propane = $request->propane;
            $gas_export_bonny->butane = $request->butane;
            $gas_export_bonny->pentane = $request->pentane;
            $gas_export_bonny->total_no_vessel = $request->total_no_vessel;
            $gas_export_bonny->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'GAS - Bonny Terminal');
            //Audit Logging
            $this->log_audit_trail($request, 'Bonny Terminal', 'Added Record');
        }

        if ($gas_export_bonny->save()) {
            return new WARGasExportBonnyResource($gas_export_bonny);
        }
    }

    public function uploadBonnyTerminal(Request $request)
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
                    $uploaded = \App\WARGasExportBonny::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'propane' => $row['C'],
                        'butane' => $row['D'],
                        'pentane' => $row['E'],
                        'total_no_vessel' => $row['F'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'GAS - Bonny Terminal');
            //Audit Logging
            $this->log_audit_trail($request, 'Bonny Terminal', 'Updated Record');

            $gas_export_bonnies = \App\WARGasExportBonny::orderBy('id', 'desc')->paginate(15);

            return WARGasExportBonnyResource::collection($gas_export_bonnies);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexGasExportNlng(Request $request)
    {
        //
        if ($request->filled('all')) {
            $gas_export_nlngs = \App\WARGasExportNlng::orderBy('id', 'desc')->get();

            return ['data'=>$gas_export_nlngs];
        } else {
            $gas_export_nlngs = \App\WARGasExportNlng::orderBy('id', 'desc')->paginate(15);

            return WARGasExportNlngResource::collection($gas_export_nlngs);
        }
    }

    public function AddGasExportNlng(Request $request)
    {
        $gas_export_nlng = $request->isMethod('put') ? \App\WARGasExportNlng::findOrFail($request->gas_export_nlng_id) : new \App\WARGasExportNlng;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $gas_export_nlng->id = $request->gas_export_nlng_id;
            $gas_export_nlng->date = date('Y-m-d', strtotime($request->date));
            $gas_export_nlng->week = $request->week;
            $gas_export_nlng->propane = $request->propane;
            $gas_export_nlng->butane = $request->butane;
            $gas_export_nlng->condensate = $request->condensate;
            $gas_export_nlng->lng = $request->lng;
            $gas_export_nlng->total_no_vessel = $request->total_no_vessel;

            //send mail
            $this->send_all_mail($request, 'GAS - Export NLNG');
            //Audit Logging
            $this->log_audit_trail($request, 'Export NLNG', 'Updated Record');
        } else {
            // $gas_export_nlng->id = $request->gas_export_nlng_id;
            $gas_export_nlng->date = date('Y-m-d', strtotime($request->date));
            $gas_export_nlng->week = $request->week;
            $gas_export_nlng->propane = $request->propane;
            $gas_export_nlng->butane = $request->butane;
            $gas_export_nlng->condensate = $request->condensate;
            $gas_export_nlng->lng = $request->lng;
            $gas_export_nlng->total_no_vessel = $request->total_no_vessel;
            $gas_export_nlng->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'GAS - Export NLNG');
            //Audit Logging
            $this->log_audit_trail($request, 'Export NLNG', 'Added Record');
        }

        if ($gas_export_nlng->save()) {
            return new WARGasExportNlngResource($gas_export_nlng);
        }
    }

    public function uploadNLNG(Request $request)
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
                    $uploaded = \App\WARGasExportNlng::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'propane' => $row['C'],
                        'butane' => $row['D'],
                        'condensate' => $row['E'],
                        'lng' => $row['F'],
                        'total_no_vessel' => $row['G'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'GAS - Bonny NLNG');
            //Audit Logging
            $this->log_audit_trail($request, 'Bonny NLNG', 'Bulk Data Upload');

            $gas_export_nlngs = \App\WARGasExportNlng::orderBy('id', 'desc')->paginate(15);

            return WARGasExportNlngResource::collection($gas_export_nlngs);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexGasExportEscravos(Request $request)
    {
        //
        if ($request->filled('all')) {
            $gas_export_escravoses = \App\WARGasExportEscravos::orderBy('id', 'desc')->get();

            return ['data'=>$gas_export_escravoses];
        } else {
            $gas_export_escravoses = \App\WARGasExportEscravos::orderBy('id', 'desc')->paginate(15);

            return WARGasExportEscravosResource::collection($gas_export_escravoses);
        }
    }

    public function AddGasExportEscravos(Request $request)
    {
        $gas_export_escravos = $request->isMethod('put') ? \App\WARGasExportEscravos::findOrFail($request->gas_export_escravos_id) : new \App\WARGasExportEscravos;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $gas_export_escravos->id = $request->gas_export_escravos_id;
            $gas_export_escravos->date = date('Y-m-d', strtotime($request->date));
            $gas_export_escravos->week = $request->week;
            $gas_export_escravos->lpg = $request->lpg;
            $gas_export_escravos->condensate = $request->condensate;
            $gas_export_escravos->transmix = $request->transmix;
            $gas_export_escravos->total_no_vessel = $request->total_no_vessel;

            //send mail
            $this->send_all_mail($request, 'GAS - Escravos Terminal');
            //Audit Logging
            $this->log_audit_trail($request, 'Escravos Terminal', 'Updated Record');
        } else {
            // $gas_export_escravos->id = $request->gas_export_escravos_id;
            $gas_export_escravos->date = date('Y-m-d', strtotime($request->date));
            $gas_export_escravos->week = $request->week;
            $gas_export_escravos->lpg = $request->lpg;
            $gas_export_escravos->condensate = $request->condensate;
            $gas_export_escravos->transmix = $request->transmix;
            $gas_export_escravos->total_no_vessel = $request->total_no_vessel;
            $gas_export_escravos->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'GAS - Escravos Terminal');
            //Audit Logging
            $this->log_audit_trail($request, 'Escravos Terminal', 'Added Record');
        }

        if ($gas_export_escravos->save()) {
            return new WARGasExportEscravosResource($gas_export_escravos);
        }
    }

    public function uploadEscravos(Request $request)
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
                    $uploaded = \App\WARGasExportEscravos::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'lpg' => $row['C'],
                        'condensate' => $row['D'],
                        'transmix' => $row['E'],
                        'total_no_vessel' => $row['F'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'GAS - Escravos Terminal');
            //Audit Logging
            $this->log_audit_trail($request, 'Escravos Terminal', 'Bulk Data Upload');

            $gas_export_escravoses = \App\WARGasExportEscravos::orderBy('id', 'desc')->paginate(15);

            return WARGasExportEscravosResource::collection($gas_export_escravoses);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexGasExportOperation(Request $request)
    {
        //
        if ($request->filled('all')) {
            $gas_export_operations = \App\WARGasExportOperation::orderBy('id', 'desc')->get();

            return ['data'=>$gas_export_operations];
        } else {
            $gas_export_operations = \App\WARGasExportOperation::orderBy('id', 'desc')->paginate(15);

            return WARGasExportOperationResource::collection($gas_export_operations);
        }
    }

    public function AddGasExportOperation(Request $request)
    {
        $gas_export_operation = $request->isMethod('put') ? \App\WARGasExportOperation::findOrFail($request->gas_export_operation_id) : new \App\WARGasExportOperation;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $gas_export_operation->id = $request->gas_export_operation_id;
            $gas_export_operation->date = date('Y-m-d', strtotime($request->date));
            $gas_export_operation->week = $request->week;
            $gas_export_operation->application_received = $request->application_received;
            $gas_export_operation->application_approved = $request->application_approved;
            $gas_export_operation->application_querried = $request->application_querried;
            $gas_export_operation->site_verification = $request->site_verification;
            $gas_export_operation->approval_for_cng_downloading = $request->approval_for_cng_downloading;
            $gas_export_operation->approval_for_lpg_refilling = $request->approval_for_lpg_refilling;
            $gas_export_operation->approval_for_lpg_bulk = $request->approval_for_lpg_bulk;
            $gas_export_operation->approval_for_lpg_addon = $request->approval_for_lpg_addon;
            $gas_export_operation->license_for_cng_downloading = $request->license_for_cng_downloading;
            $gas_export_operation->license_for_lpg_refilling = $request->license_for_lpg_refilling;
            $gas_export_operation->license_for_lpg_bulk = $request->license_for_lpg_bulk;
            $gas_export_operation->license_for_lpg_addon = $request->license_for_lpg_addon;
            $gas_export_operation->license_for_lpg_reseller = $request->license_for_lpg_reseller;
            $gas_export_operation->facility_inspection_conducted = $request->facility_inspection_conducted;

            //send mail
            $this->send_all_mail($request, 'GAS - Export Operation');
            //Audit Logging
            $this->log_audit_trail($request, 'Export Operation', 'Updated Record');
        } else {
            // $gas_export_operation->id = $request->gas_export_operation_id;
            $gas_export_operation->date = date('Y-m-d', strtotime($request->date));
            $gas_export_operation->week = $request->week;
            $gas_export_operation->application_received = $request->application_received;
            $gas_export_operation->application_approved = $request->application_approved;
            $gas_export_operation->application_querried = $request->application_querried;
            $gas_export_operation->site_verification = $request->site_verification;
            $gas_export_operation->approval_for_cng_downloading = $request->approval_for_cng_downloading;
            $gas_export_operation->approval_for_lpg_refilling = $request->approval_for_lpg_refilling;
            $gas_export_operation->approval_for_lpg_bulk = $request->approval_for_lpg_bulk;
            $gas_export_operation->approval_for_lpg_addon = $request->approval_for_lpg_addon;
            $gas_export_operation->license_for_cng_downloading = $request->license_for_cng_downloading;
            $gas_export_operation->license_for_lpg_refilling = $request->license_for_lpg_refilling;
            $gas_export_operation->license_for_lpg_bulk = $request->license_for_lpg_bulk;
            $gas_export_operation->license_for_lpg_addon = $request->license_for_lpg_addon;
            $gas_export_operation->license_for_lpg_reseller = $request->license_for_lpg_reseller;
            $gas_export_operation->facility_inspection_conducted = $request->facility_inspection_conducted;
            $gas_export_operation->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'GAS - Export Operation');
            //Audit Logging
            $this->log_audit_trail($request, 'Export Operation', 'Added Record');
        }

        if ($gas_export_operation->save()) {
            return new WARGasExportOperationResource($gas_export_operation);
        }
    }

    public function uploadGasOperation(Request $request)
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
                    $uploaded = \App\WARGasExportOperation::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'application_received' => $row['C'],
                        'application_approved' => $row['D'],
                        'application_querried' => $row['E'],
                        'site_verification' => $row['F'],
                        'approval_for_cng_downloading' => $row['G'],
                        'approval_for_lpg_refilling' => $row['H'],
                        'approval_for_lpg_bulk' => $row['I'],
                        'approval_for_lpg_addon' => $row['J'],
                        'license_for_cng_downloading' => $row['K'],
                        'license_for_lpg_refilling' => $row['L'],
                        'license_for_lpg_bulk' => $row['M'],
                        'license_for_lpg_addon' => $row['N'],
                        'license_for_lpg_reseller' => $row['O'],
                        'facility_inspection_conducted' => $row['P'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'GAS - Export Operation');
            //Audit Logging
            $this->log_audit_trail($request, 'Export Operation', 'Bulk Data Upload');

            $gas_export_operations = \App\WARGasExportOperation::orderBy('id', 'desc')->paginate(15);

            return WARGasExportOperationResource::collection($gas_export_operations);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexGasMonthlyActivity($path, $year, Request $request)
    {
        $path = explode('/', $request->path());
        switch ($path[2]) {
            case 'drilling':
                return $this->getMonthlyGasReportDrilling($request);
            break;

            case 're_entry':
                return $this->getMonthlyGasReportReentry($request);
            break;

            case 'FDP':
                return $this->getMonthlyGasReportFDP($request);
            break;

            case 'depletion':
                return $this->getMonthlyGasReportDepletionRate($request);
            break;

            case 'production':
                return $this->getMonthlyGasReportProduction($request);
            break;

            case 'utilization':
                return $this->getMonthlyGasReportUtilization($request);
            break;

            case 'flared':
                return $this->getMonthlyGasReportFlared($request);
            break;

            case 'DGSO':
                return $this->getMonthlyGasReportDGSO($request);
            break;

            case 'bonny':
                return $this->getMonthlyGasReportBonny($request);
            break;

            case 'NLNG':
                return $this->getMonthlyGasReportNLNG($request);
            break;

            case 'escravos':
                return $this->getMonthlyGasReportEscravos($request);
            break;

            case 'gas_operation':
                return $this->getMonthlyGasReportGasOperation($request);
            break;

            default:
                return $this->getMonthlyGasReportDrilling($request);
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

    public function getMonthlyGasReportDrilling(Request $request)
    {
        $data = ['exploration_commenced'=>'Exploration Commenced',
            'exploration_ongoing'=>'Exploration Ongoing',
            'exploration_completed'=>'Exploration Completed',
            'appraisal_commenced'=>'Appraisal Commenced',
            'appraisal_ongoing'=>'Appraisal Ongoing',
            'appraisal_completed'=>'Appraisal Completed',
            'development_commenced'=>'Development Commenced',
            'development_ongoing'=>'Development Ongoing',
            'development_completed'=>'Development Completed',
            'well_completion'=>'Well Completion',
            'well_spudded'=>'Well Spudded',
        ];

        return $this->getMonthlyData($request, $data, \App\WARGasDrilling::class);
    }

    public function getMonthlyGasReportReentry(Request $request)
    {
        $data = ['completion'=>'Completion',
            'workover'=>'Workover',
            'total_reserve_addition'=>'Total Reserve addition(Bscf)',
            'expected_rate'=>'Expected Rate(MMscf/d)',
        ];

        return $this->getMonthlyData($request, $data, \App\WARGasReEntry::class);
    }

    public function getMonthlyGasReportFDP(Request $request)
    {
        $data = ['application_received'=>'No. of FDP application Received',
            'application_approved'=>'No. of FDP application Approved',
            'reserves'=>'Reserves(BSCF)',
        ];

        return $this->getMonthlyData($request, $data, \App\WARGasFDP::class);
    }

    public function getMonthlyGasReportDepletionRate(Request $request)
    {
        $data = ['ag_reserves'=>'AG. Reserve(TSCF)',
            'nag_reserves'=>'NAG. Reserve(TSCF)',
            'ag_depletion'=>'AG. Depletion rate(%)',
            'nag_depletion'=>'NAG. Depletion rate(%)',
            'ag_life_year'=>'AG life index(Years)',
            'nag_life_year'=>'NAG life index(Years)',
        ];

        return $this->getMonthlyData($request, $data, \App\WARGasDepletionRate::class);
    }

    public function getMonthlyGasReportProduction(Request $request)
    {
        $data = ['ag_produced'=>'AG produced(Mscf)',
            'nag_produced'=>'NAG produced(Mscf)',
            'gas_production'=>'Gas production(Mscf)',
            'gas_utilization'=>'Gas Utilized(Mscf)',
            'gas_flared'=>'Gas Flared(Mscf)',
            'gas_flared_perc'=>'Percent Gas Flared %',
        ];

        return $this->getMonthlyData($request, $data, \App\WARGasProductionUtilizationFlare::class);
    }

    public function getMonthlyGasReportUtilization(Request $request)
    {
        $data = ['fuel_gas'=>'Fuel Gas(Mscf)',
            'gas_lift'=>'Gas lift make-up(Mscf)',
            'gas_reinjection'=>'Gas re-injection(Mscf)',
            'ngl_lpg'=>'NGL/LPG Feed Gas(Mscf)',
            'gas_to_ipp'=>'Gas to IPP(Mscf)',
            'local_supply'=>'Local supply(Mscf)',
            'gas_export'=>'Gas Export(Mscf)',
        ];

        return $this->getMonthlyData($request, $data, \App\WARGasUtilization::class);
    }

    public function getMonthlyGasReportFlared(Request $request)
    {
        $data = ['permit_to_flare'=>'No of Permit to flared',
            'quantity_approved'=>'Quantity -Approved',
            'quantity_under_review'=>'Quantity- Under review',
        ];

        return $this->getMonthlyData($request, $data, \App\WARGasFlare::class);
    }

    public function getMonthlyGasReportDGSO(Request $request)
    {
        $data = ['allocated_dgso'=>'Total allocated  DGSO (MMscf/D)',
            'dom_gas_supply'=>'Dom. Gas Supply (MMscf/D)',
            'dgso_performance'=>'DGSO Performance(%)',
        ];

        return $this->getMonthlyData($request, $data, \App\WARGasSupplyObligation::class);
    }

    public function getMonthlyGasReportBonny(Request $request)
    {
        $data = ['propane'=>'Propane MT',
            'butane'=>'Butane MT',
            'pentane'=>'Pentane MT',
            'total_no_vessel'=>'Total No. of Vessels',
        ];

        return $this->getMonthlyData($request, $data, \App\WARGasExportBonny::class);
    }

    public function getMonthlyGasReportNLNG(Request $request)
    {
        $data = ['propane'=>'Propane MT',
            'butane'=>'Butane MT',
            'condensate'=>'Condensate MT',
            'lng'=>'LNG MT',
            'total_no_vessel'=>'Total No. of Vessels',
        ];

        return $this->getMonthlyData($request, $data, \App\WARGasExportNlng::class);
    }

    public function getMonthlyGasReportEscravos(Request $request)
    {
        $data = ['lpg'=>'LPG MT',
            'condensate'=>'Condensate MT',
            'transmix'=>'Transmix MT',
            'total_no_vessel'=>'Total No. of Vessels',
        ];

        return $this->getMonthlyData($request, $data, \App\WARGasExportEscravos::class);
    }

    public function getMonthlyGasReportGasOperation(Request $request)
    {
        $data = ['application_received'=>'Application Received',
            'application_approved'=>'Application Approved',
            'application_querried'=>'Application Querried',
            'site_verification'=>'Site Verification',
            'approval_for_cng_downloading'=>'Approval CNG',
            'approval_for_lpg_refilling'=>'Approval LPG Refilling',
            'approval_for_lpg_bulk'=>'Approval LPG Bulk Stage',
            'approval_for_lpg_addon'=>'Approval LPG Add-on',
            'license_for_cng_downloading'=>'License CNG',
            'license_for_lpg_refilling'=>'License LPG Refilling',
            'license_for_lpg_bulk'=>'License LPG Bulk Stage',
            'license_for_lpg_addon'=>'License LPG Add-on',
            'license_for_lpg_reseller'=>'License LPG Reseller',
            'facility_inspection_conducted'=>'Inspection Conducted',
        ];

        return $this->getMonthlyData($request, $data, \App\WARGasExportOperation::class);
    }
}
