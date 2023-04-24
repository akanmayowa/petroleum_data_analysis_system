<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//WEEKS
Route::get('weeks', 'WARUpstreamController@getWeeks');
Route::get('refineries', 'WARUpstreamController@getRefineries');
Route::get('segments', 'WARUpstreamController@getSegments');

//WAR-UPSTREAM
// Route::get('war-upstreams', 'WARUpstreamController@index');
Route::get('war-upstreams', 'WARUpstreamController@indexAquisition');
Route::get('war-drillings', 'WARUpstreamController@indexWellDrilling');
Route::get('war-re-entries', 'WARUpstreamController@indexWellReEntry');
Route::get('war-rig-dispositions', 'WARUpstreamController@indexRigDisposition');
Route::get('war-fdp-applications', 'WARUpstreamController@indexFDPApplication');
Route::get('war-depletion-rates', 'WARUpstreamController@indexDepletionRate');
Route::get('war-crude-oil-productions', 'WARUpstreamController@indexCrudeOilProduction');
Route::get('war-revenue-generateds', 'WARUpstreamController@indexRevenueGenerated');
Route::get('war-unitizations', 'WARUpstreamController@indexUnitization');

//MONTHLY REPORTING
Route::get('monthly-reporting-UPSTREAM', 'WARUpstreamController@indexMonthlyActivity');
Route::get('monthly-report-upstream/{type}/{year}', 'WARUpstreamController@indexUpstreamMonthlyActivity');

Route::get('war-upstream/{id}', 'WARUpstreamController@show');
Route::post('war-upstream', 'WARUpstreamController@store');
Route::put('war-upstream', 'WARUpstreamController@store');
Route::delete('war-upstream/{id}', 'WARUpstreamController@destroy');
Route::post('war-upstream-uploading/{type}', 'WARUpstreamController@uploading');

//WAR-GAS
Route::get('war-gases', 'WARGasController@indexGasDrilling');
Route::get('war-gas-re-entries', 'WARGasController@indexGasReEntries');
Route::get('war-gas-fdps', 'WARGasController@indexGasFDPs');
Route::get('war-gas-depletion-rates', 'WARGasController@indexGasDepletionRates');
Route::get('war-gas-prodution-utilization-flares', 'WARGasController@indexGasProductionUtilizationFlares');
Route::get('war-gas-utilizations', 'WARGasController@indexGasUtilization');
Route::get('war-gas-flares', 'WARGasController@indexGasFlare');
Route::get('war-gas-supply-obligations', 'WARGasController@indexGasSupplyObligation');
Route::get('war-gas-export-bonnies', 'WARGasController@indexGasExportBonny');
Route::get('war-gas-export-nlngs', 'WARGasController@indexGasExportNlng');
Route::get('war-gas-export-escravoses', 'WARGasController@indexGasExportEscravos');
Route::get('war-gas-export-operations', 'WARGasController@indexGasExportOperation');

//MONTHLY REPORTING
Route::get('monthly-reporting-GAS', 'WARGasController@indexMonthlyActivity');
Route::get('monthly-reporting/{type}/{year}', 'WARGasController@indexGasMonthlyActivity');

Route::get('war-gas/{id}', 'WARGasController@show');
Route::post('war-gas', 'WARGasController@store');
Route::put('war-gas', 'WARGasController@store');
Route::delete('war-gas/{id}/{type}', 'WARGasController@destroy');
Route::post('war-gas-uploading/{type}', 'WARGasController@uploading');

//WAR-DOWNSTREAM

Route::get('war-downstreams', 'WARDownstreamController@indexRomApplication');
Route::get('war-downstream-licenses', 'WARDownstreamController@indexLicense');
Route::get('war-downstream-surveillances', 'WARDownstreamController@indexSurveillance');
Route::get('war-downstream-depot-stocks', 'WARDownstreamController@indexDepotStock');
Route::get('war-downstream-depot-applications', 'WARDownstreamController@indexDepotApplication');
Route::get('war-downstream-product-imports', 'WARDownstreamController@indexProductImport');
Route::get('war-downstream-refinery-krpcs', 'WARDownstreamController@indexRefineryKRPC');
Route::get('war-downstream-refinery-wrpcs', 'WARDownstreamController@indexRefineryWRPC');
Route::get('war-downstream-refinery-phrcs', 'WARDownstreamController@indexRefineryPHRC');
Route::get('war-downstream-refinery-phrc-news', 'WARDownstreamController@indexRefineryPHRCNew');
Route::get('war-downstream-refinery-totals', 'WARDownstreamController@indexRefineryTotal');
Route::get('war-downstream-refinery-performance-utilizations', 'WARDownstreamController@indexRefineryPerformanceUtilization',
    function () {
        return WARDownstreamRefineryPerformanceUtilization::with('refinery')->get();
    });
Route::get('war-downstream-refinery-performance-utilization_totals', 'WARDownstreamController@indexRefineryPerformanceUtilizationTotal',
    function () {
        return WARDownstreamRefineryPerformanceUtilization::with('refinery')->get();
    });
Route::get('war-downstream-truck-outs', 'WARDownstreamController@indexTruckOut');
Route::get('war-downstream-truck-out-marketers', 'WARDownstreamController@indexTruckOutMarketer',
    function () {
        return WARDownstreamTruckOutMarketer::with('segment')->get();
    });
Route::get('war-downstream-terminal-operations', 'WARDownstreamController@indexTerminalOperation');
Route::get('war-downstream-terminal-operation-applications', 'WARDownstreamController@indexTerminalOperationApplication');

//MONTHLY REPORTING
Route::get('monthly-report/{type}/{year}', 'WARDownstreamController@indexDownstreamMonthlyActivity');

Route::get('war-downstream/{id}', 'WARDownstreamController@show');
Route::post('war-downstream', 'WARDownstreamController@store');
Route::put('war-downstream', 'WARDownstreamController@store');
Route::delete('war-downstream/{id}/{type}', 'WARDownstreamController@destroy');
Route::post('war-downstream-uploading/{type}', 'WARDownstreamController@uploading');

Route::get('war-total-refinery-production', 'WARDownstreamController@getTotalRefineryProduction');

//WAR-ENGINEERING-STANDAND
Route::get('war-engineering-standands', 'WAREngStandandController@indexApplication');
Route::get('war-engineering-standand-permits', 'WAREngStandandController@indexPermit');
Route::get('war-engineering-standand-developments', 'WAREngStandandController@indexDevelopment');
Route::get('war-engineering-standand-maintenances', 'WAREngStandandController@indexMaintenance');

//MONTHLY REPORTING
Route::get('monthly-reportings-es/{type}/{year}', 'WAREngStandandController@indexEndStandandMonthlyActivity');

Route::get('war-engineering-standand/{id}', 'WAREngStandandController@show');
Route::post('war-engineering-standand', 'WAREngStandandController@store');
Route::put('war-engineering-standand', 'WAREngStandandController@store');
Route::delete('war-engineering-standand/{id}/{type}', 'WAREngStandandController@destroy');
Route::post('war-engineering-standand-uploading/{type}', 'WAREngStandandController@uploading');

//WAR-SAFETY HEALTH ENVIRONMENT
Route::get('war-shecs', 'WARSHECController@indexApplication');
Route::get('war-shec-registrations', 'WARSHECController@indexRegistration');
Route::get('war-shec-incidence-managements', 'WARSHECController@indexIncidenceMgt');
Route::get('war-shec-spill-incidence-managements', 'WARSHECController@indexSpillIncidenceMgt');
Route::get('war-shec-waste-managements', 'WARSHECController@indexWasteManagement');
Route::get('war-shec-other-reports', 'WARSHECController@indexOtherReport');

//MONTHLY REPORTING
Route::get('monthly-reportings/{type}/{year}', 'WARSHECController@indexSHECMonthlyActivity');

Route::get('war-shec/{id}', 'WARSHECController@show');
Route::post('war-shec', 'WARSHECController@store');
Route::put('war-shec', 'WARSHECController@store');
Route::delete('war-shec/{id}/{type}', 'WARSHECController@destroy');
Route::post('war-shec-uploading/{type}', 'WARSHECController@uploading');

//WAR-CORPRATE SERVICES
Route::get('war-corporate-services', 'WARCorporateServiceController@indexCorporateService');
Route::get('war-corporate-service-medical-services', 'WARCorporateServiceController@indexMedicalService');
Route::get('war-corporate-service-disease-patterns', 'WARCorporateServiceController@indexDiseasePattern');
Route::get('war-corporate-service-logistics', 'WARCorporateServiceController@indexLogistics');

//MONTHLY REPORTING
Route::get('monthly-reporting-corp-services/{type}/{year}', 'WARCorporateServiceController@indexCorporateServiceMonthlyActivity');

Route::get('war-corporate-service/{id}', 'WARCorporateServiceController@show');
Route::post('war-corporate-service', 'WARCorporateServiceController@store');
Route::put('war-corporate-service', 'WARCorporateServiceController@store');
Route::delete('war-corporate-service/{id}/{type}', 'WARCorporateServiceController@destroy');
Route::post('war-corporate-service-uploading/{type}', 'WARCorporateServiceController@uploading');

//WAR-FAD
Route::get('war-fads', 'WARRevenueController@indexRevenueFAD');
Route::get('war-tax-matters', 'WARRevenueController@indexRevenueTaxMatter');

//MONTHLY REPORTING
Route::get('monthly-reporting-fad/{type}/{year}', 'WARRevenueController@indexFADMonthlyActivity');

Route::get('war-fad/{id}', 'WARRevenueController@show');
Route::post('war-fad', 'WARRevenueController@store');
Route::put('war-fad', 'WARRevenueController@store');
Route::delete('war-fad/{id}/{type}', 'WARRevenueController@destroy');
Route::post('war-fad-uploading/{type}', 'WARRevenueController@uploading');

//WAR-PAU
Route::get('war-public-affairs-units', 'WARPublicAffairController@indexPAU');
Route::get('war-legals', 'WARPublicAffairController@indexLegal');

//MONTHLY REPORTING
Route::get('monthly-reporting-pau/{type}/{year}', 'WARPublicAffairController@indexPublicAffairMonthlyActivity');

Route::get('war-public-affairs-unit/{id}', 'WARPublicAffairController@show');
Route::post('war-public-affairs-unit', 'WARPublicAffairController@store');
Route::put('war-public-affairs-unit', 'WARPublicAffairController@store');
Route::delete('war-public-affairs-unit/{id}/{type}', 'WARPublicAffairController@destroy');
Route::post('war-public-affairs-uploading/{type}', 'WARPublicAffairController@uploading');

Route::get('war-remarks/{type}/{month}/{year}', 'MonthlyRemarkController@show');
Route::post('war-remarks', 'MonthlyRemarkController@store');

//ARTICLES
//List Revenue
Route::get('revenues-projected', 'RevenueController@index');

//List Single Revenues
Route::get('revenue-projected/{id}', 'RevenueController@show');

//Create New Revenues
Route::post('revenue-projected', 'RevenueController@store');

//Update Revenues
Route::put('revenue-projected', 'RevenueController@store');

//Delete Revenues
Route::delete('revenue-projected/{id}', 'RevenueController@destroy');
