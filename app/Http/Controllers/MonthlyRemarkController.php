<?php

namespace App\Http\Controllers;

use App\Http\Resources\MonthlyRemark as MonthlyRemarkResource;
use App\Notifications\emailNOGIARManager;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MonthlyRemarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            $message = ', Monthly Activitiy Report Remarks for '.$upload_name.' was entered by '.$UserObj->name.' into PRIS, please review and take necessary action.';

            // \Auth::user()->notify(new emailNOGIARManager( $message, $sender, $name));
            $WAR->notify(new emailNOGIARManager($message, $sender, $name));
        }
    }

    //function to log action for audit trail
    public function log_audit_trail($request, $record, $action)
    {
        $log = \App\AuditLogs::create([
            'user_id' => $request->user_id,
            'section' => 'Monthly Remarks',
            'record' => $record,
            'action' => $action,
        ]);
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

        // return $request->type;
        switch ($request->type) {
            case 'acquisition':
                return $this->addAcquisitionRemark($request);
            break;

            case 'drilling':
                return $this->addDrillingRemark($request);
            break;

            case 're_entry':
                return $this->addReEntryRemark($request);
            break;

            case 'rig_disposition':
                return $this->addRigDispositionRemark($request);
            break;

            case 'fdp_application':
                return $this->addFDPApplicationRemark($request);
            break;

            case 'depletion_rate':
                return $this->addDepletionRateRemark($request);
            break;

            case 'crude_oil_production':
                return $this->addCrudeOilProductionRemark($request);
            break;

            case 'revenue_generated':
                return $this->addRevenueGeneratedRemark($request);
            break;

            case 'unitization':
                return $this->addUnitizationRemark($request);
            break;

            //DOWNSTREAM
            case 'rom_application':
                return $this->addRomApplicationRemark($request);
            break;

            case 'downstream_license':
                return $this->AddLicenseRemark($request);
            break;

            case 'downstream_surveillance':
                return $this->AddSurveillanceRemark($request);
            break;

            case 'downstream_depot_stock':
                return $this->AddDepotStockRemark($request);
            break;

            case 'downstream_depot_application':
                return $this->AddDeportApplicationRemark($request);
            break;

            case 'downstream_product_import':
                return $this->AddProductImportRemark($request);
            break;

            case 'downstream_perf_util_krpc':
                return $this->AddRefineryKRPCRemark($request);
            break;

            case 'downstream_refinery_wrpc':
                return $this->AddRefineryWRPCRemark($request);
            break;

            case 'downstream_refinery_phrc_old':
                return $this->AddRefineryPHRCOldRemark($request);
            break;

            case 'downstream_refinery_phrc_new':
                return $this->AddRefineryPHRCNewRemark($request);
            break;

            case 'downstream_refinery_total':
                return $this->AddRefineryTotalRemark($request);
            break;

            case 'downstream_perf_util_krpc':
                return $this->AddRefineryPerformanceUtilKRPCRemark($request);
            break;

            case 'downstream_perf_util_wrpc':
                return $this->AddRefineryPerformanceUtilWRPCRemark($request);
            break;

            case 'downstream_perf_util_phrc_old':
                return $this->AddRefineryPerformanceUtilPCRCOldRemark($request);
            break;

            case 'downstream_perf_util_phrc_new':
                return $this->AddRefineryPerformanceUtilPHRCNewnRemark($request);
            break;

            case 'downstream_perf_util_ndpr':
                return $this->AddRefineryPerformanceUtilNDPRRemark($request);
            break;

            case 'downstream_perf_total':
                return $this->AddRefineryPerformanceUtilTotalRemark($request);
            break;

            case 'downstream_truck_out':
                return $this->AddTruckOutRemark($request);
            break;

            case 'downstream_terminal_operation_nnpc':
                return $this->AddMarketSegmentNNPCRemark($request);
            break;

            case 'downstream_terminal_operation_major':
                return $this->AddMarketSegmentMajorRemark($request);
            break;

            case 'downstream_terminal_operation_independent':
                return $this->AddMarketSegmentIndependentRemark($request);
            break;

            case 'downstream_terminal_operation':
                return $this->AddTerminalOperationRemark($request);
            break;

            case 'downstream_terminal_operation_application':
                return $this->AddTerminalOperationApplicationRemark($request);
            break;

            //GAS
            case 'gas_drilling':
                return $this->AddGasDrillingRemark($request);
            break;

            case 'gas_re_entry':
                return $this->AddGasReEntryRemark($request);
            break;

            case 'gas_fdp':
                return $this->AddGasFDPRemark($request);
            break;

            case 'gas_depletion_rate':
                return $this->AddGasDepletionRateRemark($request);
            break;

            case 'gas_production_utilization_flare':
                return $this->AddGasProductionUtilizationFlareRemark($request);
            break;

            case 'gas_utilization':
                return $this->AddGasUtilizationRemark($request);
            break;

            case 'gas_flare':
                return $this->AddGasFlareRemark($request);
            break;

            case 'gas_supply_obligation':
                return $this->AddGasSupplyObligationRemark($request);
            break;

            case 'gas_export_bonny':
                return $this->AddGasExportBonnyRemark($request);
            break;

            case 'gas_export_nlng':
                return $this->AddGasExportNlngRemark($request);
            break;

            case 'gas_export_escravos':
                return $this->AddGasExportEscravosRemark($request);
            break;

            case 'gas_export_operation':
                return $this->AddGasExportOperationRemark($request);
            break;

            //ENGINEERING and STANDAND

            case 'eng_standand_application':
                return $this->AddEngStandandApplicationRemark($request);
            break;

            case 'eng_standand_permit':
                return $this->AddEngStandandPermitRemark($request);
            break;

            case 'eng_standand_development':
                return $this->AddEngStandandDevelopmentRemark($request);
            break;

            case 'eng_standand_maintenance':
                return $this->AddEngStandandMaintenanceRemark($request);
            break;

            //HSE
            case 'shec_application':
                return $this->AddSHECApplicationRemark($request);
            break;

            case 'shec_osp_registration':
                return $this->AddSHECOspRegistrationRemark($request);
            break;

            case 'shec_incidence_mgt':
                return $this->AddSHECIncidenceMgtRemark($request);
            break;

            case 'shec_spill_incidence_mgt':
                return $this->AddSHECSpillIncidenceMgtRemark($request);
            break;

            case 'shec_waste_management':
                return $this->AddSHECWasteManagementRemark($request);
            break;

            case 'shec_other_report':
                return $this->AddSHECOtherReportRemark($request);
            break;

            //Corporate Affairs
            case 'staff_matter':
                return $this->AddCorporateServiceStaffMatterRemark($request);
            break;

            case 'medical_service':
                return $this->AddMedicalServiceRemark($request);
            break;

            case 'disease_pattern':
                return $this->AddDiseasePatternRemark($request);
            break;

            case 'logistic':
                return $this->AddLogisticsRemark($request);
            break;

            //FAD
            case 'revenue_fad':
                return $this->AddRevenueFADRemark($request);
            break;

            case 'revenue_tax_matter':
                return $this->AddRevenueTaxMatterRemark($request);
            break;

            //PUBLIC AFFAIR
            case 'pau':
                return $this->AddPAURemark($request);
            break;

            case 'legal':
                return $this->AddLegalRemark($request);
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
    public function show($type, $month, $year)
    {
        //$acquisition = \App\MonthlyRemark::where('monthly_remark_type_id', $type)->with(['remark_type', 'remark_type_row'])->get();
        // return MonthlyRemarkResource::collection($acquisition);

        switch ($type) {
            case 'acquisition':
                $acquisition = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($acquisition);
            break;

            case 'drilling':
                $well_drilling = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($well_drilling);
            break;

            case 're_entry':
                $re_entry = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($re_entry);
            break;

            case 'rig_disposition':
                $rig_disposition = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($rig_disposition);
            break;

            case 'fdp_application':
                $fdp_application = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($fdp_application);
            break;

            case 'depletion_rate':
                $depletion_rate = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($depletion_rate);
            break;

            case 'crude_oil_production':
                $crude_oil_production = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($crude_oil_production);
            break;

            case 'revenue_generated':
                $revenue_generated = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($revenue_generated);
            break;

            case 'unitization':
                $unitization = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($unitization);
            break;

            //DOWNSTREAM
            case 'rom_application':
                $rom_application = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($rom_application);
            break;

            case 'downstream_license':
                $downstream_license = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_license);
            break;

            case 'downstream_surveillance':
                $downstream_surveillance = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_surveillance);
            break;

            case 'downstream_depot_stock':
                $downstream_depot_stock = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_depot_stock);
            break;

            case 'downstream_depot_application':
                $downstream_depot_application = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_depot_application);
            break;

            case 'downstream_product_import':
                $downstream_product_import = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_product_import);
            break;

            case 'downstream_perf_util_krpc':
                $downstream_perf_util_krpc = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_perf_util_krpc);
            break;

            case 'downstream_refinery_wrpc':
                $downstream_refinery_wrpc = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_refinery_wrpc);
            break;

            case 'downstream_refinery_phrc_old':
                $downstream_refinery_phrc_old = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_refinery_phrc_old);
            break;

            case 'downstream_refinery_phrc_new':
                $downstream_refinery_phrc_new = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_refinery_phrc_new);
            break;

            case 'downstream_refinery_total':
                $downstream_refinery_total = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_refinery_total);
            break;

            case 'downstream_perf_util_krpc':
                $downstream_perf_util_krpc = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_perf_util_krpc);
            break;

            case 'downstream_perf_util_wrpc':
                $downstream_perf_util_wrpc = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_perf_util_wrpc);
            break;

            case 'downstream_perf_util_phrc_old':
                $downstream_perf_util_phrc_old = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_perf_util_phrc_old);
            break;

            case 'downstream_perf_util_phrc_new':
                $downstream_perf_util_phrc_new = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_perf_util_phrc_new);
            break;

            case 'downstream_perf_util_ndpr':
                $downstream_perf_util_ndpr = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_perf_util_ndpr);
            break;

            case 'downstream_perf_util_total':
                $downstream_perf_util_total = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_perf_util_total);
            break;

            case 'downstream_truck_out':
                $downstream_truck_out = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_truck_out);
            break;

            case 'downstream_terminal_operation_nnpc':
                $downstream_terminal_operation_nnpc = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_terminal_operation_nnpc);
            break;

            case 'downstream_terminal_operation_major':
                $downstream_terminal_operation_major = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_terminal_operation_major);
            break;

            case 'downstream_terminal_operation_independent':
                $downstream_terminal_operation_independent = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_terminal_operation_independent);
            break;

            case 'downstream_terminal_operation':
                $downstream_terminal_operation = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_terminal_operation);
            break;

            case 'downstream_terminal_operation_application':
                $downstream_terminal_operation_application = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($downstream_terminal_operation_application);
            break;

            //GAS
            case 'gas_drilling':
                $gas_drilling = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($gas_drilling);
            break;

            case 'gas_re_entry':
                $gas_re_entry = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($gas_re_entry);
            break;

            case 'gas_fdp':
                $gas_fdp = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($gas_fdp);
            break;

            case 'gas_depletion_rate':
                $gas_depletion_rate = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($gas_depletion_rate);
            break;

            case 'gas_production_utilization_flare':
                $gas_production_utilization_flare = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($gas_production_utilization_flare);
            break;

            case 'gas_utilization':
                $gas_utilization = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($gas_utilization);
            break;

            case 'gas_flare':
                 $gas_flare = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($gas_flare);
            break;

            case 'gas_supply_obligation':
                $gas_supply_obligation = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($gas_supply_obligation);
            break;

            case 'gas_export_bonny':
                $gas_export_bonny = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($gas_export_bonny);
            break;

            case 'gas_export_nlng':
                $gas_export_nlng = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($gas_export_nlng);
            break;

            case 'gas_export_escravos':
                $gas_export_escravos = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($gas_export_escravos);
            break;

            case 'gas_export_operation':
                $gas_export_operation = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($gas_export_operation);
            break;

            //ENGINEERING and STANDAND

            case 'eng_standand_application':
                $eng_standand_application = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($eng_standand_application);
            break;

            case 'eng_standand_permit':
                $eng_standand_permit = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($eng_standand_permit);
            break;

            case 'eng_standand_development':
                $eng_standand_development = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($eng_standand_development);
            break;

            case 'eng_standand_maintenance':
                $eng_standand_maintenance = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($eng_standand_maintenance);
            break;

            //HSE
            case 'shec_application':
                $shec_application = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($shec_application);
            break;

            case 'shec_osp_registration':
                $shec_osp_registration = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($shec_osp_registration);
            break;

            case 'shec_incidence_mgt':
                $shec_incidence_mgt = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($shec_incidence_mgt);
            break;

            case 'shec_spill_incidence_mgt':
                $shec_spill_incidence_mgt = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($shec_spill_incidence_mgt);
            break;

            case 'shec_waste_management':
                $shec_waste_management = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($shec_waste_management);
            break;

            case 'shec_other_report':
                $shec_other_report = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($shec_other_report);
            break;

            //Corporate Affairs
            case 'staff_matter':
                $staff_matter = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($staff_matter);
            break;

            case 'medical_service':
                $medical_service = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($medical_service);
            break;

            case 'disease_pattern':
                $disease_pattern = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($disease_pattern);
            break;

            case 'logistic':
                $logistic = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($logistic);
            break;

            //FAD
            case 'revenue_fad':
                $revenue_fad = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($revenue_fad);
            break;

            case 'revenue_tax_matter':
                $revenue_tax_matter = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($revenue_tax_matter);
            break;

            //PUBLIC AFFAIR
            case 'pau':
                $pau = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($pau);
            break;

            case 'legal':
                $legal = \App\MonthlyRemark::where('year', $year)->where('tab_name', $type)->where('month', $month)->get();

                return MonthlyRemarkResource::collection($legal);
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
    public function destroy($id)
    {
        //
    }

    public function addGenericMonthlyRemark($request, $data, $division, $type)
    {
        return $year = date('Y', strtotime($request->year));
        $remark = \App\MonthlyRemark::where('year', $year)->where('month', $request->month)->where('division', $division)->where('tab_name', $type)->first();

        // return $request->all();
        // FOR UPDATING REMARKS IF IT EXIST
        if ($request->isMethod('post') == true && ! is_null($remark)) {
            $type_val = $request->type;
            foreach ($data as $key => $value) {
                $arr = ['remark' => $request->$key];
                $type_val = \App\MonthlyRemark::where('year', $year)->where('month', $request->month)->where('division', $division)->where('row_name', $key)->update($arr);
            }

            //send mail
            $this->send_all_mail($request, $type);
            //Audit Logging
            $this->log_audit_trail($request, $type, 'Updated Record');

            return $type_val;
        }
        // ADDING NEW REMARK
        if ($request->isMethod('post') == true && is_null($remark)) {
            $type_val = $request->type;
            foreach ($data as $key => $value) {
                $type_val = new \App\MonthlyRemark;
                // $val->id = $request->val_id;
                $type_val->year = $year;
                $type_val->month = $request->month;
                $type_val->division = $division;
                $type_val->tab_name = $type;
                $type_val->row_name = $key;
                $type_val->remark = $request->$key;
                $type_val->created_by = $request->user_id;

                $type_val->save();
            }

            //send mail
            $this->send_all_mail($request, $type);
            //Audit Logging
            $this->log_audit_trail($request, $type, 'Added Record');

            if ($type_val) {
                return ['data'=>$type_val];
                // return new MonthlyRemarkResource($type_val);
            }
        }
    }

    public function addAcquisitionRemark(Request $request)
    {
        $data = ['seismic_data_acquired'=>'Siesmic data quantum acquired - 3D Kms', 'cumulative_seismic_acquired'=>'Cumulative Siesmic Acquired - 3D Kms',
            'annual_seismic_acquisition'=>'Annual seismic aquisation target - 3D Kms', 'seismic_data_processed'=>'Siesmic data Quantum Processed - 3D Kms', ];

        $this->addGenericMonthlyRemark($request, $data, 'UPSTREAM', 'acquisition');
    }

    public function addDrillingRemark(Request $request)
    {
        $data = ['exploration_commenced'=>'Exploration Drilling Commenced',       'exploration_ongoing'=>'Exploration Drilling Ongoing',
            'exploration_completed'=>'Exploration Drilling Completed',       'appraisal_commenced'=>'Appraisal Drilling Commenced',
            'appraisal_ongoing'=>'Appraisal Drilling Ongoing',               'appraisal_completed'=>'Appraisal Drilling Completed',
            'development_commenced'=>'Development Drilling Commenced',       'development_ongoing'=>'Development Drilling Ongoing',
            'development_completed'=>'Development Drilling Completed',       'well_completion'=>'Well Completion',
            'well_spudded'=>'Well Spudded',                                  'drilling_rig'=>'Drilling Rig',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'UPSTREAM', 'drilling');
    }

    public function addReEntryRemark(Request $request)
    {
        $data = ['re_entry_commenced'=>'Well re_entry Commenced',      're_entry_ongoing'=>'Well re_entry Ongoing',
            're_entry_completed'=>'Well re_entry Completed',      'workover_commenced'=>'Well re_entry Commenced',
            'workover_ongoing'=>'Well re_entry Ongoing',          'workover_completed'=>'Well re_entry Completed',
            're_entry_completion'=>'Well re_entry Completion',    're_entry_workover'=>'Well re_entry Workover',
            're_entry_reserve_addition'=>'Well re_entry Reserve Addition (MMBO)',    'well_expected_rate'=>'Well Expected Rate (Bopd)',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'UPSTREAM', 're_entry');
    }

    public function addRigDispositionRemark(Request $request)
    {
        $data = ['active_rig'=>'No. of Active Rigs',       'statcked_rig'=>'No. of Stacked Rigs',
            'rig_on_standby'=>'No. of Rigs on Standby',     'total_rig'=>'Total no of Rigs',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'UPSTREAM', 'rig_disposition');
    }

    public function addFDPApplicationRemark(Request $request)
    {
        $data = ['application_received'=>'FDP applications Received',     'application_approved'=>'FDP applications Approved',
            'production_rate'=>'Anticipated production Rate(BOPD)',  'expected_reserve'=>'Expected Reserve(MMSTB)',
            'total_cost'=>'Total cost (MM$)',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'UPSTREAM', 'fdp_application');
    }

    public function addDepletionRateRemark(Request $request)
    {
        $date = date('Y');
        $oil = 'Reserves as at '.$date.' Oil(MMB)';
        $con = 'Reserves as at '.$date.' Condensate(MMB)';
        $data = ['annual_production_oil'=>'Estimated annual production-Oil(MMB)',   'annual_production_condensate'=>'Estimated annual production-Condensate(MMB)',
            'depletion_rate_oil'=>'Depletion Rate-Oil (%)',    'depletion_rate_condensate'=>'Depletion Rate-Condensate (%)',
            'year_start_reserve_oil'=>$oil,       'year_start_reserve_condensate'=> $con,
            'life_index_oil'=>'Life Index-Oil(Years)',       'life_index_condensate'=>'Life Index-Condensate(Years)',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'UPSTREAM', 'depletion_rate');
    }

    public function addCrudeOilProductionRemark(Request $request)
    {
        $data = ['avg_oil_condensate_production'=>'No of Avg Oil & Condensate Prod(BOPD)',
            'deferment'=>'No of Deferment (BOPD)',  'producing_companies'=>'No of Producing Companies',
            'producing_field'=>'No of Producing Fields',  'shut_in_field'=>'No of Shut-in Fields',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'UPSTREAM', 'crude_oil_production');
    }

    public function addRevenueGeneratedRemark(Request $request)
    {
        $data = ['revenue_generated'=>'Amount of Revenue generated from Proposal/request(N)'];

        $this->addGenericMonthlyRemark($request, $data, 'UPSTREAM', 'revenue_generated');
    }

    public function addUnitizationRemark(Request $request)
    {
        $data = ['unitized_field'=>'No of unitized fields'];

        $this->addGenericMonthlyRemark($request, $data, 'UPSTREAM', 'unitization');
    }

    //DOWNSTREAM

    public function addRomApplicationRemark(Request $request)
    {
        // return $request->all();
        $data = ['suitability_inspection_received'=>'App Received',
            'suitability_inspection_approved'=>'App Approved',
            'atc_received'=>'App Querried',
            'atc_approved'=>'Site Verification',
            'pressure_test_received'=>'Appr CNG',
            'pressure_test_approved'=>'Appr LPG Refilling',
            'tank_buried_received'=>'Appr LPG Bulk Stg',
            'tank_buried_approved'=>'Appr LPG Addon',
            'leak_detection_received'=>'License CNG',
            'leak_detection_approved'=>'License LPG Refilling',
            'final_inspection_received'=>'License LPG Bulk Stg',
            'final_inspection_approved'=>'License LPG Addon',
            'renewal_inspection_received'=>'License LPG Reseller',
            'renewal_inspection_approved'=>'Inspection Conducted',
            'vessel_license_received'=>'Inspection Conducted',
            'vessel_license_approved'=>'Inspection Conducted',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'rom_application');
    }

    public function AddLicenseRemark(Request $request)
    {
        $data = ['category_a_new'=>'Catigory A- New',
            'category_a_renewal'=>'Catigory A- Renewal',
            'category_b_new'=>'Catigory B- New',
            'category_b_renewal'=>'Catigory B- Renewal',
            'category_c_new'=>'Catigory C- New',
            'category_c_renewal'=>'Catigory C- Renewal',
            'total_cat_a'=>'Total CAT A',
            'total_cat_b'=>'Total CAT B',
            'total_cat_c'=>'Total CAT C',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_license');
    }

    public function AddSurveillanceRemark(Request $request)
    {
        $data = ['station_visited'=>'Station visited',
            'station_with_pms'=>'Station With PMS',
            'sealed_under_dispensing'=>'Sealed for under Dispensing',
            'sealed_for_over_price'=>'Sealed for Over Pricing',
            'sealed_for_hoarding'=>'Sealed for Hoarding',
            'sealed_for_diversion'=>'Sealed for Diversion',
            'sealed_for_violation_of_seal'=>'Sealed for Violation of seal',
            'other'=>'Others',
            'total_station_sealed'=>'Total Station Sealed',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_surveillance');
    }

    public function AddDepotStockRemark(Request $request)
    {
        $data = ['pms_open_stock'=>'PMS Opening Stock',
            'pms_reciept'=>'PMS Reciept',
            'pms_lifting_transfer'=>'PMS Lifting/Tranfers',
            'pms_closing_stock'=>'PMS Closing Stock',
            'dpk_open_stock'=>'DPK Opening Stock',
            'dpk_reciept'=>'DPK Reciept',
            'dpk_lifting_transfer'=>'DPK Lifting/Tranfers',
            'dpk_closing_stock'=>'DPK Closing Stock',
            'ago_open_stock'=>'AGO Opening Stock',
            'ago_reciept'=>'AGO Reciept',
            'ago_lifting_transfer'=>'AGO Lifting/Tranfers',
            'ago_closing_stock'=>'AGO Closing Stock',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_depot_stock');
    }

    public function AddDeportApplicationRemark(Request $request)
    {
        $data = ['proposal_received'=>'Proposal- Received',
            'proposal_approved'=>'Proposal- Approved',
            'presentation_received'=>'Presentation- Received',
            'presentation_approved'=>'Presentation- Approved',
            'assessment_received'=>'Assesment-Received',
            'assessment_approved'=>'Assesment-Approved',
            'atc_received'=>'ATC-Received',
            'atc_approved'=>'ATC-Approved',
            'presure_test_received'=>'Test-Received',
            'presure_test_approved'=>'Test-Approved',
            'calibration_received'=>'Calibration-Received',
            'calibration_approved'=>'Calibration-Approved',
            'final_inspection_received'=>'Final Inspection-Received',
            'final_inspection_approved'=>'Final Inspection-Approved',
            'renewal_inspection_received'=>'Renewal Inspection-Received',
            'renewal_inspection_approved'=>'Renewal Inspection-Approved',
            'new_lto_received'=>'New LTO- Received',
            'new_lto_approved'=>'New LTO- Approved',
            'renewal_lto_received'=>'Renewal LTO Received',
            'renewal_lto_approved'=>'Renewal LTO Approved',
            'import_permit_received'=>'Permit-Received',
            'import_permit_approved'=>'Permit-Approved',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_depot_application');
    }

    public function AddProductImportRemark(Request $request)
    {
        return $request->all();
        $data = ['pms'=>'PMS',
            'hhk'=>'HHK',
            'ago'=>'AGO',
            'atk'=>'ATK',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_product_import');
    }

    public function AddRefineryKRPCRemark(Request $request)
    {
        $data = ['pms'=>'PMS',       'hhk'=>'HHK',        'ago'=>'AGO',       'atk'=>'ATK',      'fuel_oil'=>'FUEL OIL'];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_perf_util_krpc');
    }

    public function AddRefineryWRPCRemark(Request $request)
    {
        $data = ['pms'=>'PMS',       'hhk'=>'HHK',        'ago'=>'AGO',       'atk'=>'ATK',      'fuel_oil'=>'FUEL OIL'];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_refinery_wrpc');
    }

    public function AddRefineryPHRCOldRemark(Request $request)
    {
        $data = ['pms'=>'PMS',       'hhk'=>'HHK',        'ago'=>'AGO',       'atk'=>'ATK',      'fuel_oil'=>'FUEL OIL'];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_refinery_phrc_old');
    }

    public function AddRefineryPHRCNewRemark(Request $request)
    {
        $data = ['pms'=>'PMS',       'hhk'=>'HHK',        'ago'=>'AGO',       'atk'=>'ATK',      'fuel_oil'=>'FUEL OIL'];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_refinery_phrc_new');
    }

    public function AddRefineryTotalRemark(Request $request)
    {
        $data = ['pms'=>'PMS',       'hhk'=>'HHK',        'ago'=>'AGO',       'atk'=>'ATK',      'fuel_oil'=>'FUEL OIL'];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_refinery_total');
    }

    public function AddRefineryPerformanceUtilKRPCRemark(Request $request)
    {
        $data = ['install_capacity'=>'Install Capacity (BPSD)',
            'opening_stock'=>'Opening Stock',
            'crude_receipt'=>'Crude Receipt',
            'crude_processed'=>'Crude Processed',
            'closing_stock'=>'Closing Stock',
            'capacity_utilization'=>'Capacity Utilisation %',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_perf_util_krpc');
    }

    public function AddRefineryPerformanceUtilWRPCRemark(Request $request)
    {
        $data = ['install_capacity'=>'Install Capacity (BPSD)',
            'opening_stock'=>'Opening Stock',
            'crude_receipt'=>'Crude Receipt',
            'crude_processed'=>'Crude Processed',
            'closing_stock'=>'Closing Stock',
            'capacity_utilization'=>'Capacity Utilisation %',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_perf_util_wrpc');
    }

    public function AddRefineryPerformanceUtilPCRCOldRemark(Request $request)
    {
        $data = ['install_capacity'=>'Install Capacity (BPSD)',
            'opening_stock'=>'Opening Stock',
            'crude_receipt'=>'Crude Receipt',
            'crude_processed'=>'Crude Processed',
            'closing_stock'=>'Closing Stock',
            'capacity_utilization'=>'Capacity Utilisation %',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_perf_util_phrc_old');
    }

    public function AddRefineryPerformanceUtilPHRCNewnRemark(Request $request)
    {
        $data = ['install_capacity'=>'Install Capacity (BPSD)',
            'opening_stock'=>'Opening Stock',
            'crude_receipt'=>'Crude Receipt',
            'crude_processed'=>'Crude Processed',
            'closing_stock'=>'Closing Stock',
            'capacity_utilization'=>'Capacity Utilisation %',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_perf_util_phrc_new');
    }

    public function AddRefineryPerformanceUtilNDPRRemark(Request $request)
    {
        $data = ['install_capacity'=>'Install Capacity (BPSD)',
            'opening_stock'=>'Opening Stock',
            'crude_receipt'=>'Crude Receipt',
            'crude_processed'=>'Crude Processed',
            'closing_stock'=>'Closing Stock',
            'capacity_utilization'=>'Capacity Utilisation %',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_perf_util_ndpr');
    }

    public function AddRefineryPerformanceUtilTotalRemark(Request $request)
    {
        $data = ['install_capacity'=>'Install Capacity (BPSD)',
            'opening_stock'=>'Opening Stock',
            'crude_receipt'=>'Crude Receipt',
            'crude_processed'=>'Crude Processed',
            'closing_stock'=>'Closing Stock',
            'capacity_utilization'=>'Capacity Utilisation %',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_perf_util_total');
    }

    public function AddTruckOutRemark(Request $request)
    {
        $data = ['pms'=>'PMS',
            'hhk'=>'HHK',
            'ago'=>'AGO',
            'atk'=>'ATK',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_truck_out');
    }

    public function AddMarketSegmentNNPCRemark(Request $request)
    {
        $data = ['pms'=>'PMS',
            'dpk'=>'DPK',
            'ago'=>'AGO',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_terminal_operation_nnpc');
    }

    public function AddMarketSegmentMajorRemark(Request $request)
    {
        $data = ['pms'=>'PMS',
            'dpk'=>'DPK',
            'ago'=>'AGO',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_terminal_operation_major');
    }

    public function AddMarketSegmentIndependentRemark(Request $request)
    {
        $data = ['pms'=>'PMS',
            'dpk'=>'DPK',
            'ago'=>'AGO',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_terminal_operation_independent');
    }

    public function AddTerminalOperationRemark(Request $request)
    {
        $data = ['oil_condensate_production'=>'Crude oil and condensate production(bbls)',
            'oil_condensate_export'=>'Crude Oil and condensate Export(Bbls)',
            'refinery_supply'=>'Refinery Supply(Bbls)',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_terminal_operation');
    }

    public function AddTerminalOperationApplicationRemark(Request $request)
    {
        $data = ['export_permit_received'=>'Permits Received',
            'export_permit_approved'=>'Permits Approved',
            'establishment_received'=>'Establishment-Received',
            'establishment_approved'=>'Establishment-Approved',
            'suttle_trucking_received'=>'Trucking-Received',
            'suttle_trucking_approved'=>'Trucking-Approved',
            'suttle_bargingreceived'=>'Barging-Received',
            'suttle_bargingapproved'=>'Barging-Approved',
            'tank_calibration_received'=>'Tank Calibration-Received',
            'tank_calibration_approved'=>'Tank Calibration-Approved',
            'calibration_proving_received'=>'Meter Calibration-Received',
            'calibration_proving_approved'=>'Meter Calibration-Approved',
            'instrument_calibration_received'=>'Instrument Calibration-Received',
            'instrument_calibration_approved'=>'Instrument Calibration-Approved',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'DOWNSTREAM', 'downstream_terminal_operation_application');
    }

    //GAS
    public function AddGasDrillingRemark(Request $request)
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

        $this->addGenericMonthlyRemark($request, $data, 'GAS', 'gas_drilling');
    }

    public function AddGasReEntryRemark(Request $request)
    {
        $data = ['completion'=>'Completion',
            'workover'=>'Workover',
            'total_reserve_addition'=>'Total Reserve addition(Bscf)',
            'expected_rate'=>'Expected Rate(MMscf/d)',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'GAS', 'gas_re_entry');
    }

    public function AddGasFDPRemark(Request $request)
    {
        $data = ['application_received'=>'No. of FDP application Received',
            'application_approved'=>'No. of FDP application Approved',
            'reserves'=>'Reserves(BSCF)',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'GAS', 'gas_fdp');
    }

    public function AddGasDepletionRateRemark(Request $request)
    {
        $data = ['ag_reserves'=>'AG. Reserve(TSCF)',
            'nag_reserves'=>'NAG. Reserve(TSCF)',
            'ag_depletion'=>'AG. Depletion rate(%)',
            'nag_depletion'=>'NAG. Depletion rate(%)',
            'ag_life_year'=>'AG life index(Years)',
            'nag_life_year'=>'NAG life index(Years)',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'GAS', 'gas_depletion_rate');
    }

    public function AddGasProductionUtilizationFlareRemark(Request $request)
    {
        $data = ['ag_produced'=>'AG produced(Mscf)',
            'nag_produced'=>'NAG produced(Mscf)',
            'gas_production'=>'Gas production(Mscf)',
            'gas_utilization'=>'Gas Utilized(Mscf)',
            'gas_flared'=>'Gas Flared(Mscf)',
            'gas_flared_perc'=>'Percent Gas Flared %',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'GAS', 'gas_production_utilization_flare');
    }

    public function AddGasUtilizationRemark(Request $request)
    {
        $data = ['fuel_gas'=>'Fuel Gas(Mscf)',
            'gas_lift'=>'Gas lift make-up(Mscf)',
            'gas_reinjection'=>'Gas re-injection(Mscf)',
            'ngl_lpg'=>'NGL/LPG Feed Gas(Mscf)',
            'gas_to_ipp'=>'Gas to IPP(Mscf)',
            'local_supply'=>'Local supply(Mscf)',
            'gas_export'=>'Gas Export(Mscf)',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'GAS', 'gas_utilization');
    }

    public function AddGasFlareRemark(Request $request)
    {
        $data = ['permit_to_flare'=>'No of Permit to flared',
            'quantity_approved'=>'Quantity -Approved',
            'quantity_under_review'=>'Quantity- Under review',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'GAS', 'gas_flare');
    }

    public function AddGasSupplyObligationRemark(Request $request)
    {
        $data = ['allocated_dgso'=>'Total allocated  DGSO (MMscf/D)',
            'dom_gas_supply'=>'Dom. Gas Supply (MMscf/D)',
            'dgso_performance'=>'DGSO Performance(%)',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'GAS', 'gas_supply_obligation');
    }

    public function AddGasExportBonnyRemark(Request $request)
    {
        $data = ['propane'=>'Propane MT',
            'butane'=>'Butane MT',
            'pentane'=>'Pentane MT',
            'total_no_vessel'=>'Total No. of Vessels',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'GAS', 'gas_export_bonny');
    }

    public function AddGasExportNlngRemark(Request $request)
    {
        $data = ['propane'=>'Propane MT',
            'butane'=>'Butane MT',
            'condensate'=>'Condensate MT',
            'lng'=>'LNG MT',
            'total_no_vessel'=>'Total No. of Vessels',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'GAS', 'gas_export_nlng');
    }

    public function AddGasExportEscravosRemark(Request $request)
    {
        $data = ['lpg'=>'LPG MT',
            'condensate'=>'Condensate MT',
            'transmix'=>'Transmix MT',
            'total_no_vessel'=>'Total No. of Vessels',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'GAS', 'gas_export_escravos');
    }

    public function AddGasExportOperationRemark(Request $request)
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

        $this->addGenericMonthlyRemark($request, $data, 'GAS', 'gas_export_operation');
    }

    //ENGINEERING and STANDAND
    public function AddEngStandandApplicationRemark(Request $request)
    {
        $data = ['processing_plant_received'=>'Gas Plant-Received',
            'processing_plant_issued'=>'Gas Plant-Issued',
            'pet_refinery_received'=>'Petrochemicals Refinery Received',
            'pet_refinery_issued'=>'Petrochemicals Refinery Issued',
            'petrochemical_received'=>'Petrochemicals Received',
            'petrochemical_issued'=>'Petrochemicals Issued',
            'oil_facility_received'=>'Oil Facility-Received',
            'oil_facility_issued'=>'Oil Facility-Issued',
            'fert_plant_received'=>'Fert plants-Received',
            'fert_plant_issued'=>'Fert plants-Issued',
            'alternate_fuel_received'=>'Alternate fuels-Received',
            'alternate_fuel_issued'=>'Alternate fuels-Issued',
            'pts_received'=>'PTS-Received',
            'pts_issued'=>'PTS-Issued',
            'opll_received'=>'OPLL Received',
            'opll_issued'=>'OPLL Issued',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'Engineering and Standand', 'eng_standand_application');
    }

    public function AddEngStandandPermitRemark(Request $request)
    {
        $data = ['general_received'=>'General-Received',
            'general_issued'=>'General-Issued',
            'major_received'=>'Major Received',
            'major_issued'=>'Major Issued',
            'specialised_received'=>'Specialised Received',
            'specialised_issued'=>'Specialised Issued',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'Engineering and Standand', 'eng_standand_permit');
    }

    public function AddEngStandandDevelopmentRemark(Request $request)
    {
        $data = ['deep_offshore_project'=>'No. of Deep offshore Projects',
            'western_area_project'=>'No. of western Area projects',
            'eastern_area_project'=>'No. of Eastern Area projects',
            'pipeline_project'=>'No. of Pipeline projects',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'Engineering and Standand', 'eng_standand_development');
    }

    public function AddEngStandandMaintenanceRemark(Request $request)
    {
        $data = ['system_failure'=>'No of system faillures',
            'system_failure_resolved'=>'No of system faillures Resolved',
            'printer_failure'=>'No Printer Faillures',
            'printer_failure_resolved'=>'No Printer Faillures Resolved',
            'application_error'=>'No of application Errors',
            'application_error_resolved'=>'No of application Errors Resolved',
            'adhoc_issues'=>'No of Adhoc Issues',
            'adhoc_issues_resolved'=>'No of Adhoc Issues Resolved',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'Engineering and Standand', 'eng_standand_maintenance');
    }

    //HEALTH SAFETY and Environment
    public function AddSHECApplicationRemark(Request $request)
    {
        $data = ['environment_application_receiced'=>'Environmental Studies Received',
            'environment_application_issued'=>'Environmental Studies issued',
            'discharge_permit_receiced'=>'Discharge Permits Received',
            'discharge_permit_issued'=>'Discharge Permits Issued',
            'radiation_safety_permit_receiced'=>'Radiation Permits Received',
            'radiation_safety_permit_issued'=>'Radiation Permits Issued',
            'safety_case_permit_receiced'=>'Safety Cases Received',
            'safety_case_permit_issued'=>'Safety Cases Issued',
            'lab_accredition_receiced'=>'Lab Accreditatiod Received',
            'lab_accredition_issued'=>'Lab Accreditatiod Issued',
            'chemical_application_receiced'=>'Oil Field Received',
            'chemical_application_issued'=>'Oil Field Issued',
            'registration_application_received'=>'Point Sour Reg Received',
            'registration_application_issued'=>'Point Sour Reg issued',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'Health Safety & Environment', 'shec_application');
    }

    public function AddSHECOspRegistrationRemark(Request $request)
    {
        $data = ['personel_captured'=>'Personnel Registered',
            'image_captured'=>'Image Captured',
            'permit_issued'=>'Permit issued',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'Health Safety & Environment', 'shec_osp_registration');
    }

    public function AddSHECIncidenceMgtRemark(Request $request)
    {
        $data = ['incidence_accident'=>'Incidents/Accidents',
            'fatal_incidence'=>'Fatal Incidents',
            'fatalities'=>'Fatalities',
            'work_related'=>'Work Related',
            'non_work_related'=>'Non-Work Related',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'Health Safety & Environment', 'shec_incidence_mgt');
    }

    public function AddSHECSpillIncidenceMgtRemark(Request $request)
    {
        $data = ['spill_number'=>'Spill Number',
            'spill_volume'=>'Spill Volume (bbls)',
            'quantity_recoverd'=>'Quantity Recovered(bbls)',
            'jiv_conducted'=>'No. of JIV Conducted',
            'community_issued'=>'No. of Community Issues',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'Health Safety & Environment', 'shec_spill_incidence_mgt');
    }

    public function AddSHECWasteManagementRemark(Request $request)
    {
        $data = ['tdu_new_application'=>'TDU-Application',
            'tdu_approval_granted'=>'TDU-Approved Granted',
            'incinerator_new_application'=>'Incinerator Application',
            'incinerator_approval_granted'=>'Incinerator Approved Granted',
            'wbm_new_application'=>'WBM Application',
            'wbm_approval_granted'=>'WBM Approved Granted',
            'tank_cleaning_new_application'=>'Tank Cleaning Application',
            'tank_cleaning_approval_granted'=>'Tank Cleaning Approved Granted',
            'solid_control_new_application'=>'Solid Control Application',
            'solid_control_approval_granted'=>'Solid Control Approved Granted',
            'spill_clean_up_new_application'=>'Spill Clean up Application',
            'spill_clean_up_approval_granted'=>'Spill Clean up Approved Granted',
            'remediation_new_application'=>'Remediation Application',
            'remediation_approval_granted'=>'Remediation Approved Granted',
            'produced_water_new_application'=>'Prod Water Application',
            'produced_water_approval_granted'=>'Prod Water Approved Granted',
            'waste_slop_new_application'=>'Waste Water/Slop Application',
            'waste_slop_approval_granted'=>'Waste Water/Slop Approved Granted',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'Health Safety & Environment', 'shec_waste_management');
    }

    public function AddSHECOtherReportRemark(Request $request)
    {
        $data = ['hazop'=>'HAZOP',
            'rbi'=>'RBI',
            'psv_certification'=>'PSV Certificate',
            'leak_test'=>'Leak Test',
            'rig_inspection'=>'Rig Inspection',
            'vessel_inspection'=>'Vessel Inspection',
            'new_technologies'=>'New Technology',
            'conpliance_monitoring'=>'Compliance Monitoring',
            'project_monitoring_activities'=>'Proj monitoring',
            'facility_inspection_audit'=>'Facility Inspection Audit',
            'safety_training'=>'Safety Training',
            'permit_withdrawal_cases'=>'Permit Withdrawal Case',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'Health Safety & Environment', 'shec_other_report');
    }

    //HEALTH SAFETY and Environment
    public function AddCorporateServiceStaffMatterRemark(Request $request)
    {
        $data = ['staff_strength'=>'Staff Strength',
            'retired'=>'Retired',
            'deceased'=>'Deceased',
            'commence_annual_leave'=>'Commence Annual Leave',
            'resumed_annaul_leave'=>'Resumed Annual Leave',
            'new_disiplinary_case'=>'Disciplinary Cases',
            'contractor_registered'=>'Contractors  Registered',
            'local_training'=>'Local Training',
            'overseas_training'=>'Overseas Training',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'Corporate Services', 'staff_matter');
    }

    public function AddMedicalServiceRemark(Request $request)
    {
        $data = ['clinic_visit'=>'Patient Attendance/Clinic Visits',
            'referral'=>'Referrals',
            'sick_leave_case'=>'Sick Leave',
            'maternity_leave'=>'Maternity Leave',
            'health_talk'=>'YTD on Health Talk',
            'health_walk'=>'YTD on Health Walk',
            'immunization'=>'YTD on Immunization',
            'canteen_visit'=>'YTD on Canteen Visits',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'Corporate Services', 'medical_service');
    }

    public function AddDiseasePatternRemark(Request $request)
    {
        $data = ['arthritis'=>'Arthritis',
            'malaria'=>'Malaria',
            'urti'=>'URTI',
            'diabetes'=>'Diabetes',
            'hypertension'=>'Hypertension',
            'viral_syndrome'=>'Viral Syndrome',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'Corporate Services', 'disease_pattern');
    }

    public function AddLogisticsRemark(Request $request)
    {
        $data = ['newly_received_vehicle'=>'New Vehicles',
            'fleet_utilization'=>'Utility-Total Fleet',
            'coaster_bus'=>'Coaster Buses',
            'hilux'=>'Hilux',
            'cars'=>'Cars',
            'peugeot_bus'=>'Peugeot Buses',
            'mits_p_up_van'=>'Mits Pick/up Van',
            'land_cruiser'=>'Toyota Land Cruisers',
            'prado_suv'=>'Prado Jeep',
            'hiace_bus'=>'Hiace Buses',
            'ambulance'=>'Ambulance',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'Corporate Services', 'logistic');
    }

    //FAD
    public function AddRevenueFADRemark(Request $request)
    {
        $data = ['revenue'=>'Revenue',
            'revenue_receipt_issued'=>'Revenue Issued',
            'fund_transfer'=>'Funds Transfer',
            'personnel_cost'=>'Personnel Cost',
            'medical_bill_transfer'=>'Medical Bill Transfer',
            'outsorced_secuirity_services'=>'Outsourced Security Services',
            'outsorced_cleaning_services'=>'Outsourced Cleaning Services',
            'penalty_fee'=>'Penalty Fee',
            'overhead_allocation'=>'Overhead Allocation',
            'salary_allowance'=>'Salary/Allowances',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'FAD', 'revenue_fad');
    }

    public function AddRevenueTaxMatterRemark(Request $request)
    {
        $data = ['vat'=>'VAT',
            'paye'=>'PAYE',
            'wht'=>'WHT',
            'third_party_bill'=>'Third Party Bills',
            'monthly_expenditure'=>'Mandatory Monthly Expenditure to Zonal/ Field Office(N)',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'FAD', 'revenue_tax_matter');
    }

    //PUBLIC AFFAIRS
    public function AddPAURemark(Request $request)
    {
        $data = ['meeting_conference_attended'=>'No.of Meeting and Conferences Attended',
            'consular_liason_visa_support'=>'Consular Liaison – Visa Support Letters – No',
        ];

        $this->addGenericMonthlyRemark($request, $data, 'Public Affairs', 'pau');
    }

    public function AddLegalRemark(Request $request)
    {
        $data = ['court_cases'=>'No. of Court Cases',
            'agreement_executed'=>'No.of Agreements Executed',
        ];
        $this->addGenericMonthlyRemark($request, $data, 'Public Affairs', 'legal');
    }
}
