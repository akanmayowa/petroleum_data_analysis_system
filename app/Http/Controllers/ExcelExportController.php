<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcelExportController extends Controller
{
    //
    public function exportToExcel()
    {
        $companies = $company_mf = $companie = $company_dps = \App\company::get();

        $concessions = $concession = \App\concession::get();
        $contracts = $contract = \App\contract::get();

        $terrains = $terrain = $terrain_oap = $terrain_aop = \App\terrain::get();

        $fields = $field_mf = \App\field::get();
        $blocks = \App\bala_block::get();
        $area_of_surveys = \App\area_of_survey::get();
        $type_of_surveys = \App\type_of_survey::get();
        $departments = \App\department::orderBy('id', 'desc')->get();
        $sta_cats = \App\status_category::orderBy('id', 'desc')->get();

        return  \Excel::create('bala.index', function ($excel) use ($companies, $company_mf, $concessions, $contracts, $terrains, $companie, $concession, $contract, $terrain, $terrain_oap, $terrain_aop, $fields, $field_mf, $blocks, $area_of_surveys, $type_of_surveys, $company_dps, $departments, $sta_cats) {
            $excel->sheet('bala.index', function ($sheet) use ($companies, $company_mf, $concessions, $contracts, $terrains, $companie, $concession, $contract, $terrain, $terrain_oap, $terrain_aop, $fields, $field_mf, $blocks, $area_of_surveys, $type_of_surveys, $company_dps, $departments, $sta_cats) {
                $sheet->loadView('bala.index', compact('companies', 'company_mf', 'concessions', 'contracts', 'terrains', 'companie', 'concession', 'contract', 'terrain', 'terrain_oap', 'terrain_aop', 'field_mf', 'blocks_mf', 'area_of_surveys', 'type_of_surveys', 'company_dps', 'departments', 'sta_cats'))
                        ->setOrientation('landscape');
            });
        })->export('xlsx');
    }
}
