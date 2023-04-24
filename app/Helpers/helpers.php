<?php

    $yrs = date('Y');
    function rev_legend()
    {
        $rev_year = \App\eco_revenue_actual::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 4;
            $rev_legend[] = $no_yr;
            for ($i = 1; $i <= 4; $i++) {
                $rev_legend[$i] = $no_yr + $i;
            }
        } else {
            $rev_legend[0] = 0;
        }

        return $rev_legend;
    }

    function revenue_oil()
    {
        $rev_year = \App\eco_revenue_actual::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 5;
            $rev_legend[] = $no_yr;
            for ($i = 1; $i <= 5; $i++) {
                $rev_legend[$i] = $no_yr + $i;
                $r_oil = \App\eco_revenue_actual::where('year', $no_yr + $i)->sum('oil_actual');
                $revenue_oil[$i] = ($r_oil / 1000000000);
            }
        } else {
            $revenue_oil[0] = 0;
        }

        return $revenue_oil;
    }

    function revenue_gas()
    {
        $rev_year = \App\eco_revenue_actual::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 5;
            $rev_legend[] = $no_yr;
            for ($i = 1; $i <= 5; $i++) {
                $rev_legend[$i] = $no_yr + $i;
                $r_gas = \App\eco_revenue_actual::where('year', $no_yr + $i)->sum('gas_actual');
                $revenue_gas[$i] = ($r_gas / 1000000000);
            }
        } else {
            $revenue_gas[0] = 0;
        }

        return $revenue_gas;
    }

    function crude_legend()
    {
        $rev_year = \App\down_terminal_stream_prod::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 4;
            $crude_legend[] = $no_yr;
            for ($i = 1; $i <= 4; $i++) {
                $crude_legend[$i] = $no_yr + $i;
            }
        } else {
            $crude_legend[0] = 0;
        }

        return $crude_legend;
    }

    function crude_leg()
    {
        $rev_year = \App\down_terminal_stream_prod::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 4;
            $crude_leg[] = $no_yr;
            for ($i = 1; $i <= 4; $i++) {
                $crude_leg[$i] = $no_yr + $i;
            }
        } else {
            $crude_leg[0] = 0;
        }

        return $crude_leg;
    }

    function crude_oil_prod()
    {
        $rev_year = \App\down_terminal_stream_prod::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 5;
            $rev_legend[] = $no_yr;
            for ($i = 1; $i <= 5; $i++) {
                $rev_legend[$i] = $no_yr + $i;
                $cop = \App\down_terminal_stream_prod::where('year', $no_yr + $i)->sum('stream_total');
                $crude_oil_prod[$i] = ($cop / 1000000);
            }
        } else {
            $crude_oil_prod[0] = 0;
        }

        return $crude_oil_prod;
    }

    function crude_oil_export()
    {
        $rev_year = \App\down_terminal_stream_prod::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 5;
            $rev_legend[] = $no_yr;
            for ($i = 1; $i <= 5; $i++) {
                $rev_legend[$i] = $no_yr + $i;
                $coe = \App\down_monthly_summary_crude_export::where('year', $no_yr + $i)->sum('stream_total');
                $crude_oil_export[$i] = ($coe / 1000000);
            }
        } else {
            $crude_oil_export[0] = 0;
        }

        return $crude_oil_export;
    }

    function gas_legend()
    {
        $rev_year = \App\gas_summary_of_gas_utilization::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 4;
            $gas_legend[] = $no_yr;
            for ($i = 1; $i <= 4; $i++) {
                $gas_legend[$i] = $no_yr + $i;
            }
        } else {
            $gas_legend[0] = 0;
        }

        return $gas_legend;
    }

    function gas_production()
    {
        $rev_year = \App\gas_summary_of_gas_production::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 5;
            $rev_legend[] = $no_yr;
            for ($i = 1; $i <= 5; $i++) {
                $rev_legend[$i] = $no_yr + $i;
                $gpb = \App\gas_summary_of_gas_production::where('year', $no_yr + $i)->sum('total');
                $gas_production[$i] = ($gpb / 1000000);
            }
        } else {
            $gas_production[0] = 0;
        }

        return $gas_production;
    }

    function gas_utilized()
    {
        $rev_year = \App\gas_summary_of_gas_utilization::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 5;
            $rev_legend[] = $no_yr;
            for ($i = 1; $i <= 5; $i++) {
                $rev_legend[$i] = $no_yr + $i;
                $gub = \App\gas_summary_of_gas_utilization::where('year', $no_yr + $i)->sum('total_gas_utilized');
                $gas_utilized[$i] = ($gub / 1000000);
            }
        } else {
            $gas_utilized[0] = 0;
        }

        return $gas_utilized;
    }

    function hse_legend()
    {
        $rev_year = \App\she_accident_report_upstream::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 4;
            $hse_legend[] = $no_yr;
            for ($i = 1; $i <= 4; $i++) {
                $hse_legend[$i] = $no_yr + $i;
            }
        } else {
            $hse_legend[0] = 0;
        }

        return $hse_legend;
    }

    function up_incidences()
    {
        $rev_year = \App\she_accident_report_upstream::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 5;
            $rev_legend[] = $no_yr;
            for ($i = 1; $i <= 5; $i++) {
                $rev_legend[$i] = $no_yr + $i;
                $up_incidences[$i] = \App\she_accident_report_upstream::where('year', $no_yr + $i)->sum('incidents');
            }
        } else {
            $up_incidences[0] = 0;
        }

        return $up_incidences;
    }

    function down_incidences()
    {
        $rev_year = \App\she_accident_report_downstream::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 5;
            $rev_legend[] = $no_yr;
            for ($i = 1; $i <= 5; $i++) {
                $rev_legend[$i] = $no_yr + $i;
                $down_incidences[$i] = \App\she_accident_report_downstream::where('year', $no_yr + $i)->sum('incidents');
            }
        } else {
            $down_incidences[0] = 0;
        }

        return $down_incidences;
    }

    function up_fatality()
    {
        $rev_year = \App\she_accident_report_upstream::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 5;
            $rev_legend[] = $no_yr;
            for ($i = 1; $i <= 5; $i++) {
                $rev_legend[$i] = $no_yr + $i;
                $up_fatality[$i] = \App\she_accident_report_upstream::where('year', $no_yr + $i)->sum('fatality');
            }
        } else {
            $up_fatality[0] = 0;
        }

        return $up_fatality;
    }

    function down_fatality()
    {
        $rev_year = \App\she_accident_report_downstream::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 5;
            $rev_legend[] = $no_yr;
            for ($i = 1; $i <= 5; $i++) {
                $rev_legend[$i] = $no_yr + $i;
                $down_fatality[$i] = \App\she_accident_report_downstream::where('year', $no_yr + $i)->sum('fatality');
            }
        } else {
            $down_fatality[0] = 0;
        }

        return $down_fatality;
    }

    function reserve_legend()
    {
        $rev_year = \App\up_reserves_oil::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 4;
            $reserve_legend[] = $no_yr;
            for ($i = 1; $i <= 4; $i++) {
                $reserve_legend[$i] = $no_yr + $i;
            }
        } else {
            $reserve_legend[0] = 0;
        }

        return $reserve_legend;
    }

    function reserve_oil()
    {
        $rev_year = \App\up_reserves_oil::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 5;
            $rev_legend[] = $no_yr;
            for ($i = 1; $i <= 5; $i++) {
                $rev_legend[$i] = $no_yr + $i;
                $reserve_oil[$i] = \App\up_reserves_oil::where('year', $no_yr + $i)->sum('oil_reserves');
            }
        } else {
            $reserve_oil[0] = 0;
        }

        return $reserve_oil;
    }

    function reserve_cond()
    {
        $rev_year = \App\up_reserves_report::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 5;
            $rev_legend[] = $no_yr;
            for ($i = 1; $i <= 5; $i++) {
                $rev_legend[$i] = $no_yr + $i;
                $reserve_cond[$i] = \App\up_reserves_report::where('year', $no_yr + $i)->sum('condensate_reserves');
            }
        } else {
            $reserve_cond[0] = 0;
        }

        return $reserve_cond;
    }

    function reserve_gas()
    {
        $rev_year = \App\up_reserves_gas::orderBy('year', 'desc')->first();
        if ($rev_year) {
            $no_yr = $rev_year->year - 5;
            $rev_legend[] = $no_yr;
            for ($i = 1; $i <= 5; $i++) {
                $rev_legend[$i] = $no_yr + $i;
                $reserve_gas[$i] = \App\up_reserves_gas::where('year', $no_yr + $i)->sum('total_gas');
            }
        } else {
            $reserve_gas[0] = 0;
        }

        return $reserve_gas;
    }

    function crude_year()
    {
        return 2019;
    } //$crude_year = \App\down_terminal_stream_prod::orderBy('year', 'desc')->first();	}
    function recon_crude()
    {
        $years = \App\down_terminal_stream_prod::orderBy('year', 'desc')->first();
        if ($years) {
            return $recon_crude = \App\down_terminal_stream_prod::where('year', 2019)->sum('stream_total');
        }
    }
    function crude_export()
    {
        $years = \App\down_monthly_summary_crude_export::orderBy('year', 'desc')->first();
        if ($years) {
            return $crude_export = \App\down_monthly_summary_crude_export::where('year', $years->year)->sum('stream_total');
        }
    }
    function crude_import()
    {
        $years = \App\down_monthly_summary_crude_export::orderBy('year', 'desc')->first();
        if ($years) {
            return $crude_import = \App\down_product_vol_import_permit::where('year', $years->year)->sum('total');
        }
    }

    function res_year()
    {
        return $res_year = \App\up_reserves_gas::orderBy('year', 'desc')->first();
    }
    function ag_nag()
    {
        $r_year = \App\up_reserves_gas::orderBy('year', 'desc')->first();
        if ($r_year) {
            return $ag_nag = \App\up_reserves_gas::where('year', $r_year->year)->sum('total_gas');
        }
    }
    function oil_res()
    {
        $oil_y = \App\up_reserves_oil::orderBy('year', 'desc')->first();
        if ($oil_y) {
            return $oil_res = \App\up_reserves_oil::where('year', $oil_y->year)->sum('oil_reserves');
        }
    }
    function cond_res()
    {
        $cond_y = \App\up_reserves_report::orderBy('year', 'desc')->first();
        if ($cond_y) {
            return $cond_res = \App\up_reserves_report::where('year', $cond_y->year)->sum('condensate_reserves');
        }
    }

    function ref_year()
    {
        return $ref_year = \App\down_refinary_capacity_utilization::orderBy('year', 'desc')->first();
    }
    function tot_dom_prod()
    {
        $years = \App\down_refinary_capacity_utilization::orderBy('year', 'desc')->first();
        if ($years) {
            return $tot_dom_prod = \App\down_refinary_capacity_utilization::where('year', $years->year)->first()->december;
        }
    }

    function wrpc()
    {
        $years = \App\down_refinary_capacity_utilization::orderBy('year', 'desc')->first();
        if ($years && $years->refinery_id == 1) {
            return $wrpc = \App\down_refinary_capacity_utilization::where('year', $years->year)->where('refinery_id', '1')->first()->december;
        }
    }

    function krpc()
    {
        $years = \App\down_refinary_capacity_utilization::orderBy('year', 'desc')->first();
        if ($years && $years->refinery_id == 2) {
            return $krpc = \App\down_refinary_capacity_utilization::where('year', $years->year)->where('refinery_id', '2')->first()->december;
        }
    }

    function phrc()
    {
        $years = \App\down_refinary_capacity_utilization::orderBy('year', 'desc')->first();
        if ($years && $years->refinery_id == 3) {
            return $phrc = \App\down_refinary_capacity_utilization::where('year', $years->year)->where('refinery_id', '3')->orwhere('refinery_id', '5')->first()->december;
        }
    }

    function ndpr()
    {
        $years = \App\down_refinary_capacity_utilization::orderBy('year', 'desc')->first();
        if ($years && $years->refinery_id == 4) {
            return $ndpr = \App\down_refinary_capacity_utilization::where('year', $years->year)->where('refinery_id', '4')->first()->december;
        }
    }

    function imp_year()
    {
        return $imp_year = \App\down_refinery_production_volumes::orderBy('year', 'desc')->first();
    }
    function dom_prod()
    {
        $years = \App\down_refinery_production_volumes::orderBy('year', 'desc')->first();
        if ($years) {
            return $dom_prod = \App\down_refinery_production_volumes::where('year', $years->year)->sum('total');
        }
    }

    function prod_imp_yr()
    {
        return $prod_imp_yr = \App\down_refinery_production_volumes::orderBy('year', 'desc')->first();
    }
    function imp_permit()
    {
        $prod_imp_yr = \App\down_product_vol_import_permit::orderBy('year', 'desc')->first();
        if ($prod_imp_yr) {
            return $imp_permit = \App\down_product_vol_import_permit::where('year', $prod_imp_yr->year)->sum('total_litres');
        }
    }

    function act_import()
    {
        $years = \App\down_refinary_production::orderBy('year', 'desc')->first();
        if ($years) {
            return $act_import = \App\down_refinary_production::where('year', $years->year)->sum('total_litres');
        }
    }

    //AUDIT
    function all_login()
    {
        return $all_login = \App\user_login_history::whereMonth('created_at', '12')->count();
    }

    $yrs = date('Y'); $year = $yrs - 1;

    function OPL_total()
    {
        $y = \App\Bala_opl::orderBy('year', 'desc')->first();

        return $OPL_total = \App\Bala_opl::where('year', $y->year)->count();
    }
    function OML_total()
    {
        $y = \App\Bala_oml::orderBy('year', 'desc')->first();

        return $OML_total = \App\Bala_oml::where('year', $y->year)->count();
    }
    function MARG_total()
    {
        $y = \App\Bala_marginal_field::orderBy('year', 'desc')->first();

        return $MARG_total = \App\Bala_marginal_field::where('year', $y->year)->count();
    }
    function Unlisted_total()
    {
        return $Unlisted_total = \App\concession_unlisted_open::count();
    }

    function ref_high_cap()
    {
        return $ref_high_cap = \App\down_refinery_performance::orderBy('design_capacity', 'desc')->first();
    }
    function plant_high_cap()
    {
        return $plant_high_cap = \App\down_petrochemical_plant::orderBy('plant_capacity', 'desc')->first();
    }

    function high_gas_obli()
    {
        return $high_gas_obli = \App\gas_domestic_gas_obligation::orderBy('performance_obligation', 'desc')->first();
    }
    function gas_year()
    {
        return $years = \App\gas_summary_of_gas_production::orderBy('year', 'desc')->first();
    }
    function gas_prods()
    {
        $years = \App\gas_summary_of_gas_production::orderBy('year', 'desc')->first();

        return $gas_prods = \App\gas_summary_of_gas_production::where('year', $years->year)->sum('total');
    }
    function gas_utils()
    {
        $years = \App\gas_summary_of_gas_production::orderBy('year', 'desc')->first();

        return $gas_utils = \App\gas_summary_of_gas_utilization::where('year', $years->year)->sum('total_gas_utilized');
    }
    function gas_flared()
    {
        $years = \App\gas_summary_of_gas_production::orderBy('year', 'desc')->first();

        return $gas_flared = \App\gas_summary_of_gas_utilization::where('year', $years->year)->sum('percent_flared');
    }
    //count
    function flare_count()
    {
        $years = \App\gas_summary_of_gas_production::orderBy('year', 'desc')->first();

        return $flare_count = \App\gas_summary_of_gas_utilization::where('year', $years->year)->count();
    }

    function hse_year()
    {
        return $years = \App\she_spill_incidence_report::orderBy('year', 'desc')->first();
    }
    function spill()
    {
        $years = \App\she_spill_incidence_report::orderBy('year', 'desc')->first();

        return $spill = \App\she_spill_incidence_report::where('year', $years->year)->sum('volume_spilled');
    }
    function incident()
    {
        $years = \App\she_spill_incidence_report::orderBy('year', 'desc')->first();

        return $incident = \App\she_accident_report_upstream::where('year', $years->year)->sum('incidents');
    }
    function fatality()
    {
        $years = \App\she_accident_report_upstream::orderBy('year', 'desc')->first();

        return $fatality = \App\she_accident_report_upstream::where('year', $years->year)->sum('fatality');
    }
    // function down_inci() {  $years = \App\she_accident_report_upstream::orderBy('year', 'desc')->first();
    // return $down_inci = \App\she_accident_report_downstream::orderByDesc('year')->limit(12)->sum('incidents');	}
    // function down_fata_last_yr() {  return $down_fata_last_yr = \App\she_accident_report_downstream::orderByDesc('year')->limit(12)->sum('fatality');	}

    function es_up_year()
    {
        return $years = \App\up_processing_plant_project::orderBy('year', 'desc')->first();
    }
    function up_project()
    {
        $es_up_year = \App\up_processing_plant_project::orderBy('year', 'desc')->first();

        return $up_project = \App\up_processing_plant_project::where('year', $es_up_year->year)->count();
    }
    function down_project()
    {
        $p_year = \App\down_petrochemical_plant_project::orderBy('year', 'desc')->first();
        $p_project = \App\down_petrochemical_plant_project::where('year', $p_year->year)->count();
        $r_year = \App\es_licensed_refinery_project::orderBy('year', 'desc')->first();
        $r_project = \App\es_licensed_refinery_project::where('year', $r_year->year)->count();

        return $p_project + $r_project;
    }
    function gas_project()
    {
        $g_year = \App\gas_processing_plant_project::orderBy('year', 'desc')->first();

        return $gas_project = \App\gas_processing_plant_project::where('year', $g_year->year)->count();
    }

    //CHARTS
    function oil_condensate()
    {
        $yr = date('Y');
        $yrs = $yr - '10';

        return $oil_condensate = \App\up_reserves_report::where('year', '>=', $yrs)->where('month', 'december')->take(5)->get();
    }

    function year_array()
    {
        return $year_array = ['legends' => 'Total Wells in years'];
    }

    function array_year()
    {
        $yrs = date('Y');

        return $array_year = ['5' => $yrs - 5, '4' => $yrs - 4, '3' => $yrs - 3, '2' => $yrs - 2, '1' => $yrs - 1, '0' => $yrs - 0];
    }
    function years()
    {
        $yrs = date('Y');

        return $years = ['0' => $yrs - 0, '1' => $yrs - 1, '2' => $yrs - 2, '3' => $yrs - 3, '4' => $yrs - 4];
    }

    function contracts()
    {
        return $contracts = $contract_legend = \App\contract::all();
    }
