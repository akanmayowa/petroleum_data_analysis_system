<?php

namespace App\Http\Controllers;

use App\Traits\Micellenous;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    use Micellenous;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('microsoft');
    }

    //UPSTREAM REPORT
    public function index()
    {
        return view('report.upstream.index');
    }

    //function to log action for audit trail
    public function log_audit_trail($record, $action)
    {
        $log = \App\AuditLogs::create([
            'user_id' => \Auth::user()->id,
            'section' => 'PRIS Reports',
            'record' => $record,
            'action' => $action,
        ]);
    }

    public function asset()
    {
        $year = 2016;

        $products = \App\down_import_product::all();
        $months = ['january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        $market_segment_id = 3;

        $ref_prod_first = \App\down_refinary_production::orderBy('year', 'asc')->first();
        $ref_prod_last = \App\down_refinary_production::orderBy('year', 'desc')->first();

        $reserves = \App\up_reserves_report::orderBy('year', 'asc')->get();
        $spills = \App\she_spill_incidence_report::orderBy('year', 'asc')->get();

        return view('report.upstream.asset', ['reserves'=>$reserves, 'spills'=>$spills]);

        // return view('report.upstream.asset',['months'=>$months,'products'=>$products,"market_segment_id"=>$market_segment_id,"year"=>$year,"ref_prod_first"=>$ref_prod_first,"ref_prod_last"=>$ref_prod_last]);
    }

    //DOWNSTREAM
    public function downstream()
    {
        //Audit Logging
        self::log_audit_trail('downstream Reports', 'Viewed Reports');
        return view('report.downstream.index');
    }

    //MIDSTREAM
    public function midstream()
    {
        //Audit Logging
        self::log_audit_trail('Gas Reports', 'Viewed Reports');
        return view('report.midstream.index');
    }

    //SHE
    public function she()
    {
        //Audit Logging
        self::log_audit_trail('HSE Reports', 'Viewed Reports');

        return view('report.she.index');
    }

    //Concession
    public function concession()
    {
        //Audit Logging
        self::log_audit_trail('BALA Reports', 'Viewed Reports');

        return view('report.concession.index');
    }

    //ministerial_performance
    public function ministerial_performance()
    {
        //Audit Logging
        self::log_audit_trail('Ministerial KPI Reports', 'Viewed Reports');

        return view('report.ministerial-performance.index');
    }

    //economics
    public function economics()
    {
        //Audit Logging
        self::log_audit_trail('Revenue Reports', 'Viewed Reports');

        return view('report.economics.index');
    }

    //dwp
    public function dwp()
    {
        //Audit Logging
        self::log_audit_trail('DPR Work Plan (DWP) Reports', 'Viewed Reports');

        return view('report.dwp.index');
    }

    //OIL & GAS
    public function oilandgas()
    {
        //Audit Logging
        self::log_audit_trail('Gas Reports', 'Viewed Reports');

        return view('report.oil&gas.index');
    }

    //DASH BOARD
    public function executive_dashboard()
    {
        //Audit Logging
        self::log_audit_trail('Executive Dashboard Reports', 'Viewed Reports');

        return view('report.executive_dashboard.index');
    }

    public function divisional_dashboard()
    {
        //Audit Logging
        self::log_audit_trail('Divisional Dashboard Reports', 'Viewed Reports');

        return view('report.divisional_dashboard.index');
    }

    //POWER BI Quick insight
    public function getReport(Request $request)
    {
        //UPSTREAM
        if (in_array($request->page, ['concession', 'reserves', 'crude_prod', 'seismic', 'rig', 'well', 'Drilling_Activities', 'oil_facilities', 'app_gas_dev', 'imp_field_office', 'field_summary', 'deplete_rate', 'replacement_rate', 'crude_deferment'])) {
            $page = ['concession'=>'Cocession Report', 'reserves'=>'Reserves', 'crude_prod'=>' Provisional Crude Production', 'seismic'=>'Seismic Data', 'rig'=>'Rig Disposition', 'well'=>' Well Activities', 'Drilling_Activities'=>'Drilling', 'oil_facilities'=>'Major Oil Facilities', 'app_gas_dev'=>'Gas Development', 'imp_field_office'=>'Import by Field Office', 'field_summary'=>'Field Summary', 'deplete_rate'=>'Depletion Rate', 'replacement_rate'=>'Replacement Rate', 'crude_deferment'=>'Crude Deferment'];
        }
        //DOWNSTREAM
        elseif (in_array($request->page, ['crude_export', 'condensate_prod', 'export_dest', 'ave_price', 'ref_performance', 'plant_situation', 'petroleum_dist', 'capacity_storage', 'account_report', 'appplication_report', 'facility_report', 'invoice_report', 'payment_report', 'permit_report', 'receipt_report'])) {
            $page = ['crude_export'=>'Crude / Condensate Export', 'export_dest'=>'Export by Destination', 'condensate_prod'=>'Export by Stream', 'ave_price'=>'Average Crude Price', 'plant_situation'=>'Petrochemical Plant', 'ref_performance'=>'Refinery Performance', 'petroleum_dist'=>'Petroleum Distribution / Consumption', 'capacity_storage'=>'Retail Outlet Capacities', 'account_report'=>'Account Transaction', 'appplication_report' => 'Application Report', 'facility_report' => 'Facility Report', 'invoice_report' => 'Invoice Report', 'payment_report' => 'Payment Report', 'permit_report' => 'Permit Report', 'receipt_report' => 'Receipt Report'];
        }
        //MIDSTREAM
        elseif (in_array($request->page, ['gas_supply', 'gas_balance', 'gas_facility', 'cnp_lpg'])) {
            $page = ['gas_supply'=>'Domestic Gas Obligation/Supply Report', 'gas_balance'=>'Gas Balance Report', 'gas_facility'=>'Gas Facility Report', 'cnp_lpg'=>'GAS RETAIL COUNT CAPACITY'];
        }
        //HSE
        elseif (in_array($request->page, ['safety_incidence', 'spill_incidence', 'water_vol', 'waste_mgt', 'safety_permit', 'lab_accreditation', 'lab_chemical_permit', 'safety_accident', 'safety_case', 'safety_radiation', 'safety_risk_inspection', 'safety_rsp', 'study_report', 'environmental_studies', 'environmental_rest', 'spill_contigency'])) {
            $page = ['safety_incidence'=>'Incidence Industry-Wide', 'spill_incidence'=>'Spill Incidence', 'water_vol'=>'Produced Water Vols', 'waste_mgt'=>'Waste Management', 'safety_permit'=>'Safety Permit', 'lab_accreditation'=>'Lab Accreditation', 'lab_chemical_permit'=>'Lab Chemical Permit', 'safety_accident'=>'Safety Accidents', 'safety_case'=>'Safety Case', 'safety_radiation'=>'Safety Radiation Permit', 'safety_risk_inspection'=>'Safety Risk Inspection', 'safety_rsp'=>'Safety RSP', 'environmental_studies'=>'Environment Studies', 'environmental_rest'=>'Environment Restoration', 'spill_contigency'=>'Spill Contigency'];
        }
        //ECONOMICS
        elseif (in_array($request->page, ['revenue_sum'])) {
            $page = ['revenue_sum'=>'Revenue Performance Summary Report'];
        }
        //MPM
        elseif (in_array($request->page, ['war', 'ministerial_kpi', 'proj_monitoring'])) {
            $page = ['war'=>'Weekly Activity Report', 'ministerial_kpi'=>'Monthly Performance Management Report', 'proj_monitoring'=>'Project Monitoring and Performance Scorecard Report'];
        }
        //DWP
        elseif (in_array($request->page, ['dwp', 'dwp_evaluation'])) {
            $page = ['dwp'=>'DPR Work Plan Report', 'dwp_evaluation'=>'DWP Evaluation Report'];
        }

        $accessToken = $this->plugPowerBI();

        $dataSetId = env('QI_DATASETID', '');

        $group_ids = '5c69a278-689e-446d-9925-284c2082026c';  //"d5710203-a360-4c3f-81dd-9d4082aaa9a2";
        $group_ids_celps = '5c69a278-689e-446d-9925-284c2082026c';
        $group_ids_new = '5c69a278-689e-446d-9925-284c2082026c';

        //UPSTREAM
        if ($request->page == 'concession') {
            $groupId = $group_ids;
            $reportId = '98282c49-1377-4fb9-b856-3f49c4537cdf';
        } elseif ($request->page == 'reserves') {
            $groupId = $group_ids;
            $reportId = '245c4956-4089-4776-8a10-67cc963701a2';
        } elseif ($request->page == 'crude_prod') {
            $groupId = $group_ids;
            $reportId = '05df6fac-e820-4ccb-beda-58a454de4ad1';
        } elseif ($request->page == 'seismic') {
            $groupId = $group_ids;
            $reportId = 'e85d66f3-4ede-4b79-9120-4efa933a54e4';
        } elseif ($request->page == 'rig') {
            $groupId = $group_ids;
            $reportId = '24da7eb1-2143-4fd2-b4d2-64eab7f8d9e1';
        } elseif ($request->page == 'well') {
            $groupId = $group_ids;
            $reportId = 'a66e1c39-ea65-4070-b531-2a818c088416';
        } elseif ($request->page == 'Drilling_Activities') {
            $groupId = $group_ids;
            $reportId = '31eb10bd-4772-4705-871a-e6655246b081';
        } elseif ($request->page == 'oil_facilities') {
            $groupId = $group_ids;
            $reportId = '5e98504c-54e5-4518-848c-f150866d1524';
        }//c9c779c3-4f03-41ba-82bf-03f8671508f3

        elseif ($request->page == 'app_gas_dev') {
            $groupId = $group_ids_new;
            $reportId = 'e1f15323-004c-4511-96e6-ce6b608425fa';
        }//75cb8c69-7dab-404c-a771-321bf668294f

        elseif ($request->page == 'imp_field_office') {
            $groupId = $group_ids_new;
            $reportId = '5213fada-1b8f-408b-8a46-1af163cbf08e';
        } elseif ($request->page == 'field_summary') {
            $groupId = $group_ids_new;
            $reportId = 'a3ad1db1-3085-493c-b8a3-8e8601f3bb25';
        } elseif ($request->page == 'deplete_rate') {
            $groupId = $group_ids_new;
            $reportId = 'bde08d30-a482-46d2-af34-8e61ebf39b46';
        } elseif ($request->page == 'replacement_rate') {
            $groupId = $group_ids_new;
            $reportId = 'ed9ce596-74bb-4283-8750-bab60dde1caf';
        } elseif ($request->page == 'crude_deferment') {
            $groupId = $group_ids_new;
            $reportId = '4fb8ef28-dbcd-4e04-ab5d-8461a3e0cd9b';
        }

        //DOWNSTREAM
        elseif ($request->page == 'crude_export') {
            $groupId = $group_ids;
            $reportId = 'b800bd79-7eb9-4f83-aea5-ad82c6b86901';
        } elseif ($request->page == 'export_dest') {
            $groupId = $group_ids;
            $reportId = '29a8bf3c-9247-4b08-b493-aaf843537cc9';
        } elseif ($request->page == 'condensate_prod') {
            $groupId = $group_ids;
            $reportId = 'd8d11b8f-8b95-4f9b-b526-50432417b394';
        } elseif ($request->page == 'ave_price') {
            $groupId = $group_ids;
            $reportId = '8a4bd051-46af-4b8c-a524-4e1ee7506f54';
        } elseif ($request->page == 'plant_situation') {
            $groupId = $group_ids;
            $reportId = '431fa79f-b637-471d-beba-27bf6ba6c738';
        } elseif ($request->page == 'ref_performance') {
            $groupId = $group_ids;
            $reportId = '27f2dfd0-139b-4dc9-89b2-019e1817aebb';
        } elseif ($request->page == 'petroleum_dist') {
            $groupId = $group_ids;
            $reportId = '61f5820b-b1fc-495e-997b-19301c6d1ae7';
        } elseif ($request->page == 'capacity_storage') {
            $groupId = $group_ids;
            $reportId = '9c5467ce-0f0f-416c-9d1a-3543a4109ee1';
        } elseif ($request->page == 'account_report') {
            $groupId = $group_ids_celps;
            $reportId = 'd4138b3d-11c1-4ff1-92b1-2c20952d8490';
        } elseif ($request->page == 'appplication_report') {
            $groupId = $group_ids_celps;
            $reportId = '68620a32-b9bb-4e8f-bd3a-6bef4dca9a1c';
        } elseif ($request->page == 'facility_report') {
            $groupId = $group_ids_celps;
            $reportId = 'fcb77699-5bca-4688-ba25-c1954839b188';
        } elseif ($request->page == 'invoice_report') {
            $groupId = $group_ids_celps;
            $reportId = 'ddcbf19e-5dfb-44fa-a4ca-93f438bb487b';
        } elseif ($request->page == 'payment_report') {
            $groupId = $group_ids_celps;
            $reportId = '09e8abb1-2816-46eb-be21-11f9d0c8deec';
        } elseif ($request->page == 'permit_report') {
            $groupId = $group_ids_celps;
            $reportId = 'b4216ce6-b0b3-4766-a7e5-f9338218c5c5';
        } elseif ($request->page == 'receipt_report') {
            $groupId = $group_ids_celps;
            $reportId = '61f99d5e-abbe-4650-b63c-7ecbe9248bd6';
        }

        //GAS
        elseif ($request->page == 'gas_supply') {
            $groupId = $group_ids;
            $reportId = '00a3ab5b-91d7-4e8c-b56c-2b842f47aeeb';
        }//b2230cc5-e125-4e8c-bbe8-e1a571959770

        elseif ($request->page == 'gas_balance') {
            $groupId = $group_ids;
            $reportId = '5e1efe2a-4638-4143-9e27-d7c5759a45a9';
        } elseif ($request->page == 'gas_facility') {
            $groupId = $group_ids;
            $reportId = '9667afd2-330b-4ae1-ae6a-ba08fb308aef';
        } elseif ($request->page == 'cnp_lpg') {
            $groupId = $group_ids;
            $reportId = '1d531cad-6074-4d7a-908e-0dba7b3a8da8';
        }

        //HSE
        elseif ($request->page == 'safety_incidence') {
            $groupId = $group_ids;
            $reportId = '53e00a25-d3f6-4c83-96a0-00f8942a3add'; //5d548f5e-dc6c-4c18-8f12-cac2c60527cf
        } elseif ($request->page == 'spill_incidence') {
            $groupId = $group_ids;
            $reportId = '12782055-5976-4b07-b005-ccb6171acc32';
        } elseif ($request->page == 'water_vol') {
            $groupId = $group_ids;
            $reportId = 'd314a45f-a933-4970-88fa-0bc1a87242c5';
        } elseif ($request->page == 'waste_mgt') {
            $groupId = $group_ids;
            $reportId = '5f1d9269-bf24-4968-87e1-d48e60367132';
        } elseif ($request->page == 'safety_permit') {
            $groupId = $group_ids;
            $reportId = 'be75038b-b654-47ad-88ed-48e29165cf7b';
        } elseif ($request->page == 'lab_accreditation') {
            $groupId = $group_ids_celps;
            $reportId = '4f7dd919-f4b3-4852-a75a-4aaccda01365';
        } elseif ($request->page == 'lab_chemical_permit') {
            $groupId = $group_ids_celps;
            $reportId = 'e3e0c2f8-5e6b-478a-a185-a5df0ca81db9';
        } elseif ($request->page == 'safety_accident') {
            $groupId = $group_ids_celps;
            $reportId = '9ccf4371-3f44-4ed0-b562-ac755fe9bee9';
        } elseif ($request->page == 'safety_case') {
            $groupId = $group_ids_celps;
            $reportId = 'db1cf24d-e584-426f-ab35-839fa9158385';
        } elseif ($request->page == 'safety_radiation') {
            $groupId = $group_ids_celps;
            $reportId = 'bf668950-893a-4c55-972b-a5584524ff13';
        } elseif ($request->page == 'safety_risk_inspection') {
            $groupId = $group_ids_celps;
            $reportId = '0c5ab961-d9b7-4704-8d4d-b5413f2e2e53';
        } elseif ($request->page == 'safety_rsp') {
            $groupId = $group_ids_celps;
            $reportId = 'c99d7dbb-507c-4eec-9a2d-2d52cb66a10b';
        } elseif ($request->page == 'study_report') {
            $groupId = $group_ids_celps;
            $reportId = '100c017c-e8e5-4a8d-b21c-3c45dbde1603';
        } elseif ($request->page == 'environmental_studies') {
            $groupId = $group_ids_new;
            $reportId = '31bea10b-d451-4dba-8942-14bbd67e217e';
        } elseif ($request->page == 'environmental_rest') {
            $groupId = $group_ids_new;
            $reportId = 'c3342101-a536-424d-8898-4ecaef5502f3';
        } elseif ($request->page == 'spill_contigency') {
            $groupId = $group_ids_new;
            $reportId = 'e0a1de13-9791-45fe-b106-103637f5323e';
        }

        //CONCESSION
        // elseif($request->page=='concession')
        // {
        //     $groupId= $group_ids;            $reportId="5c87ecc5-3ef6-4f25-9975-cd8447a58f15";
        // }

        //ECONOMICS
        elseif ($request->page == 'revenue_sum') {
            $groupId = $group_ids;
            $reportId = 'f413890f-97fd-46a0-9bc5-3e29f800ad50';
        }

        //MONTHLY PERFORMANCE MANAGEMENT
        elseif ($request->page == 'war') {
            $groupId = $group_ids;
            $reportId = 'b0b589ca-884a-4b18-abbf-d52a2e72b328';
        } elseif ($request->page == 'ministerial_kpi') {
            $groupId = $group_ids;
            $reportId = '8fffe37d-1e2c-46a5-a8f3-a0821d5b5895';
        } elseif ($request->page == 'proj_monitoring') {
            $groupId = $group_ids;
            $reportId = '8a4bd051-46af-4b8c-a524-4e1ee7506f54';
        }

        //DWP
        elseif ($request->page == 'dwp') {
            $groupId = $group_ids;
            $reportId = 'fd7af778-7c90-4788-90c7-3bd858f907b2';
        } elseif ($request->page == 'dwp_evaluation') {
            $groupId = $group_ids;
            $reportId = 'fd7af778-7c90-4788-90c7-3bd858f907b2';
        } elseif ($request->page == 'quickinsight') {
            $accessToken = $this->QuickInsight();
            $groupId = env('QI_GROUPID', '');
        }
        return view('report.NOGIAR.index', compact('accessToken', 'groupId', 'reportId', 'dataSetId', 'page'));
    }
}
