<?php

use App\Stream;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|*/

Route::resource('benchmark', 'BenchmarkController');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/check-auth', 'ApiAuth@checkAuth');

// Route::post('/authenticate','Auth\Login@authenticate')->name('authenticate');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/home', 'HomeController@home')->name('home');

//ADMIN
// Route::post('/admin/download-search-data', 'AdminController@downloadSearchData')->name('download-search-data');
Route::get('/admin/users', 'AdminController@users')->name('admin.users')->middleware('permission:add_users');
Route::post('/admin/add_users', 'AdminController@addUser')->name('admin.add_users')->middleware('permission:add_users');
Route::get('admin/modals/editUsers', 'AdminController@editUsers')->name('admin.editUsers')->middleware('permission:add_users');
Route::post('/admin/updateuser', 'AdminController@updateuser')->name('admin.updateuser')->middleware('permission:add_users');
Route::post('/admin/deactivateUser', 'AdminController@deactivateUser')->name('admin.deactivateUser')->middleware('permission:manage_users');
Route::post('/admin/reactivateUser', 'AdminController@reactivateUser')->name('admin.reactivateUser')->middleware('permission:manage_users');
Route::get('/admin/change-password', 'AdminController@change_password')->name('admin.change-password');
Route::post('/admin/update_password', 'AdminController@update_password')->name('admin.update_password');

Route::post('/admin/add_external_users', 'AdminController@addExternalUsers')->name('admin.add_external_users');
Route::get('/admin/email-comfirmation/{token}', 'AdminController@emailConfirmation')->name('admin.email-comfirmation');

Route::get('/admin/settings', 'AdminController@settings')->name('admin.settings')->middleware('permission:manage_users');
Route::post('/admin/updatesettings', 'AdminController@updatesettings')->name('admin.updatesettings')->middleware('permission:manage_users');

Route::post('/admin/add_roles', 'AdminController@add_roles')->name('admin.add_roles')->middleware('permission:add_roles');
Route::get('admin/modals/editRoles', 'AdminController@editRoles')->name('admin.editRoles')->middleware('permission:add_roles');
Route::post('/admin/upload_roles', 'AdminController@upload_roles')->name('admin.upload_roles')->middleware('permission:add_roles');
Route::get('/admin/download_roles/{type}', 'AdminController@download_roles')->name('admin.download_roles')->middleware('permission:add_roles');

Route::post('/admin/add_notification', 'AdminController@add_notification')->name('admin.add_notification')->middleware('permission:configure_notification');

Route::post('/admin/add-email-list', 'AdminController@addEmailList')->name('add-email-list');
Route::get('getEmailListing', 'AdminController@getEmailListing');
Route::post('/admin/remove-user', 'AdminController@removeUser')->name('remove-user');
Route::get('getEmailUsersById', 'AdminController@getEmailUsersById');

//route to get all monthly stream data based on stream selected
Route::get('/getNotificationDetails', function () {
    $report_name = Request::get('report_name');
    $notify = \App\pris_notification::where('report_name', $report_name)->get();

    return Response::json($notify);
});

//PERMISSIONS
Route::post('/admin/add_permission_category', 'AdminController@add_permission_category')->name('admin.add_permission_category')->middleware('permission:manage_users');
Route::get('admin/modals/editPermissionCategory', 'AdminController@editPermissionCategory')->name('admin.editPermissionCategory')->middleware('permission:manage_users');

Route::post('/admin/add_permission', 'AdminController@add_permission')->name('admin.add_permission')->middleware('permission:manage_users');
Route::get('admin/modals/editPermission', 'AdminController@editPermission')->name('admin.editPermission')->middleware('permission:manage_users');

Route::post('/admin/save_role', 'AdminController@save_role')->name('admin.save_role');

Route::post('/admin/delegate_role', 'AdminController@delegate_role')->name('admin.delegate_role');

//ADMIN SETUP
Route::get('/admin/setup', 'AdminController@setup')->name('admin.setup');


Route::post('/admin/set-stage_id', 'AdminController@setStageId')->name('set-stage_id');
Route::post('/admin/approve-all-stage_id', 'AdminController@approveAllStageId')->name('approve-all-stage_id');

Route::post('/admin/adddepartment', 'AdminController@adddepartment')->name('admin.adddepartment');
Route::get('admin/modals/editDepartment', 'AdminController@editDepartment')->name('admin.editDepartment');
Route::post('/admin/upload_department', 'AdminController@upload_department');
Route::get('/admin/download_department/{type}', 'AdminController@download_department')->name('admin.download_department');

Route::post('/admin/add_parent_company', 'AdminController@add_parent_company')->name('admin.add_parent_company')->middleware('permission:manage_companies');
Route::get('admin/modals/editParentCompany', 'AdminController@editParentCompany')->name('admin.editParentCompany')->middleware('permission:manage_companies');
Route::post('/admin/upload_parent_company', 'AdminController@upload_parent_company')->middleware('permission:manage_companies');
Route::get('/admin/download_parent_company/{type}', 'AdminController@download_parent_company')->name('admin.download_parent_company')->middleware('permission:manage_companies');

Route::post('/admin/add_company', 'AdminController@add_company')->name('admin.add_company')->middleware('permission:manage_companies');
Route::get('admin/modals/editCompany', 'AdminController@editCompany')->name('admin.editCompany')->middleware('permission:manage_companies');
Route::post('/admin/upload_company', 'AdminController@upload_company')->middleware('permission:manage_companies');
Route::get('/admin/download_company/{type}', 'AdminController@download_company')->name('admin.download_company')->middleware('permission:manage_companies');
Route::get('admin/view/approveCompany', 'AdminController@approveCompany')->name('admin.approveCompany')->middleware('permission:approve_companies');
Route::get('/admin/viewcompanyfields/{id}', 'AdminController@viewcompanyfields')->name('admin.viewcompanyfields')->middleware('permission:manage_companies');
Route::post('/admin/approve_pending_company', 'AdminController@approve_pending_company')->name('admin.approve_pending_company')->middleware('permission:approve_companies');

Route::post('/admin/add_field', 'AdminController@add_field')->name('admin.add_field')->middleware('permission:manage_fields');
Route::get('admin/modals/editField', 'AdminController@editField')->name('admin.editField')->middleware('permission:manage_fields');
Route::post('/admin/upload_field', 'AdminController@upload_field')->middleware('permission:manage_fields');
Route::get('/admin/download_field/{type}', 'AdminController@download_field')->name('admin.download_field')->middleware('permission:manage_fields');
Route::get('admin/view/approveField', 'AdminController@approveField')->name('admin.approveField')->middleware('permission:manage_fields');
Route::post('/admin/approve_pending_field', 'AdminController@approve_pending_field')->name('admin.approve_pending_field')->middleware('permission:manage_fields');

Route::post('/admin/add_contract', 'AdminController@add_contract')->name('admin.add_contract')->middleware('permission:manage_contract');
Route::get('admin/modals/editContract', 'AdminController@editContract')->name('admin.editContract')->middleware('permission:manage_contract');
Route::post('/admin/upload_contract', 'AdminController@upload_contract')->middleware('permission:manage_contract');
Route::get('/admin/download_contract/{type}', 'AdminController@download_contract')->name('admin.download_contract')->middleware('permission:manage_contract');

Route::post('/admin/add_concession', 'AdminController@add_concession')->name('admin.add_concession')->middleware('permission:manage_concession');
Route::get('admin/modals/editConcession', 'AdminController@editConcession')->name('admin.editConcession')->middleware('permission:manage_concession');
Route::post('/admin/update_concession', 'AdminController@update_concession')->name('admin.update_concession')->middleware('permission:manage_concession');
Route::post('/admin/upload_department', 'AdminController@upload_department')->middleware('permission:manage_concession');
Route::get('/admin/download_concession/{type}', 'AdminController@download_concession')->name('admin.download_concession')->middleware('permission:manage_concession');
Route::get('/admin/viewconcessionhistory/{id}', 'AdminController@viewconcessionhistory')->name('admin.viewconcessionhistory')->middleware('permission:manage_concession');
Route::get('/admin/viewconcessionfields/{id}', 'AdminController@viewconcessionfields')->name('admin.viewconcessionfields')->middleware('permission:manage_concession');
Route::get('/admin/download_concession_history/{type}', 'AdminController@download_concession_history')->name('admin.download_concession_history')->middleware('permission:manage_concession');
Route::get('admin/view/approveConcession', 'AdminController@approveConcession')->name('admin.approveConcession')->middleware('permission:approve_concession');
Route::post('/admin/approve_pending_concession', 'AdminController@approve_pending_concession')->name('admin.approve_pending_concession')->middleware('permission:approve_concession');

Route::post('/admin/add_unlisted_open_block', 'AdminController@add_unlisted_open_block')->name('admin.add_unlisted_open_block')->middleware('permission:manage_concession');
Route::get('admin/modals/editUnlistedOpenBlock', 'AdminController@editUnlistedOpenBlock')->name('admin.editUnlistedOpenBlock')->middleware('permission:manage_concession');
Route::post('/admin/upload_unlisted_open_block', 'AdminController@upload_unlisted_open_block')->middleware('permission:manage_concession');
Route::get('/admin/download_unlisted_open_block/{type}', 'AdminController@download_unlisted_open_block')->name('admin.download_unlisted_open_block')->middleware('permission:manage_concession');
Route::get('admin/view/approveConcessionUnlisted', 'AdminController@approveConcessionUnlisted')->name('admin.approveConcessionUnlisted')->middleware('permission:approve_concession');

Route::post('/admin/add_marginal_field', 'AdminController@add_marginal_field')->middleware('permission:manage_concession');
Route::get('admin/modals/editMarginalField', 'AdminController@editMarginalField')->middleware('permission:manage_concession');
Route::post('/admin/upload_marginal_field', 'AdminController@upload_marginal_field')->middleware('permission:manage_concession');
Route::get('/admin/download_marginal_field/{type}', 'AdminController@download_marginal_field')->name('admin.download_marginal_field');
Route::get('admin/view/approveBalaMarginalField', 'AdminController@approveBalaMarginalField')->middleware('permission:approve_concession');
Route::post('/admin/approve_marginal_field', 'AdminController@approve_marginal_field')->middleware('permission:approve_concession');

Route::post('/admin/add_terrain', 'AdminController@add_terrain')->name('admin.add_terrain')->middleware('permission:manage_terrain');
Route::get('admin/modals/editTerrain', 'AdminController@editTerrain')->name('admin.editTerrain')->middleware('permission:manage_terrain');
Route::post('/admin/upload_concession', 'AdminController@upload_concession')->middleware('permission:manage_terrain');
Route::get('/admin/download_terrain/{type}', 'AdminController@download_terrain')->name('admin.download_terrain')->middleware('permission:manage_terrain');

Route::post('/admin/add_streams', 'AdminController@add_streams')->name('admin.add_streams')->middleware('permission:manage_stream');
Route::get('admin/modals/editStream', 'AdminController@editStream')->name('admin.editStream')->middleware('permission:manage_stream');
Route::post('/admin/upload_streams', 'AdminController@upload_streams')->middleware('permission:manage_stream');
Route::get('/admin/download_streams/{type}', 'AdminController@download_streams')->name('admin.download_streams')->middleware('permission:manage_stream');
Route::get('admin/view/approveStream', 'AdminController@approveStream')->name('admin.approveStream')->middleware('permission:approve_stream');
Route::post('/admin/approve_pending_stream', 'AdminController@approve_pending_stream')->name('admin.approve_pending_stream')->middleware('permission:approve_stream');

Route::post('/admin/addfacility', 'AdminController@addfacility')->name('admin.addfacility')->middleware('permission:manage_facilities');
Route::get('admin/modals/editFacilities', 'AdminController@editFacilities')->name('admin.editFacilities')->middleware('permission:manage_facilities');
Route::post('/admin/upload_facility', 'AdminController@upload_facility')->middleware('permission:manage_facilities');
Route::get('/admin/download_facility/{type}', 'AdminController@download_facility')->name('admin.download_facility')->middleware('permission:manage_facilities');
Route::get('admin/view/approveFacility', 'AdminController@approveFacility')->name('admin.approveFacility')->middleware('permission:approve_facilities');
Route::post('/admin/approve_pending_facility', 'AdminController@approve_pending_facility')->name('admin.approve_pending_facility')->middleware('permission:approve_facilities');

Route::post('/admin/addfacilitytype', 'AdminController@addfacilitytype')->name('admin.addfacilitytype')->middleware('permission:approve_facilities');
Route::get('admin/modals/editFacilityTypes', 'AdminController@editFacilityTypes')->name('admin.editFacilityTypes')->middleware('permission:approve_facilities');
Route::post('/admin/upload_facilitytype', 'AdminController@upload_facilitytype')->middleware('permission:approve_facilities');
Route::get('/admin/download_facilitytype/{type}', 'AdminController@download_facilitytype')->name('admin.download_facilitytype')->middleware('permission:approve_facilities');

Route::post('/admin/addlocation', 'AdminController@addlocation')->name('admin.addlocation')->middleware('permission:manage_location');
Route::get('admin/modals/editLocations', 'AdminController@editLocations')->name('admin.editLocations')->middleware('permission:manage_location');
Route::post('/admin/upload_location', 'AdminController@upload_location')->middleware('permission:manage_location');
Route::get('/admin/download_location/{type}', 'AdminController@download_location')->name('admin.download_location');

Route::post('/admin/add_storage_location', 'AdminController@add_storage_location')->name('admin.add_storage_location')->middleware('permission:manage_location');
Route::get('admin/modals/editStorageLocations', 'AdminController@editStorageLocations')->name('admin.editStorageLocations')->middleware('permission:manage_location');
Route::post('/admin/upload_storage_location', 'AdminController@upload_storage_location')->middleware('permission:manage_location');
Route::get('/admin/download_storage_location/{type}', 'AdminController@download_storage_location')->name('admin.download_sl');

//Route::resource('admin', 'AdminController');  // RESOURCE ROUTE

//REPORT UPSTREAM
Route::get('/report/NOGIAR', 'ReportController@getReport')->name('report.nogiar.index');
Route::get('/report/upstream/asset', 'ReportController@asset')->name('report.upstream.asset');
//DOWNSTREAM
Route::get('/report/downstream', 'ReportController@downstream')->name('report.downstream.index');
//MIDSTREAM
Route::get('/report/midstream', 'ReportController@midstream')->name('report.midstream.index');
//SHE
Route::get('/report/she', 'ReportController@she')->name('report.she.index');
//CONCESSION
Route::get('/report/concession', 'ReportController@concession')->name('report.concession.index');
//MINISTERIAL PERFORMANCE
Route::get('/report/ministerial-performance', 'ReportController@ministerial_performance')->name('report.ministerial-performance.index');

//ECONOMICS
Route::get('/report/economics', 'ReportController@economics')->name('report.economics.index');

//DWP
Route::get('/report/dwp', 'ReportController@dwp')->name('report.dwp.index');

//OIL & GAS
Route::get('/report/oil&gas', 'ReportController@oilandgas')->name('report.oil&gas.index');

//DASHBOARD
Route::get('/report/executive_dashboard', 'ReportController@executive_dashboard')->name('report.executive_dashboard.index');
Route::get('/report/divisional_dashboard', 'ReportController@divisional_dashboard')->name('report.divisional_dashboard.index');

//FORECASTING
Route::get('/forecasting', 'ForecastingController@forecasting')->name('forecasting.index');

//BENCHMARKING AND COMPARISM
Route::get('/benchmark&comparism', 'BenchmarkingController@benchmarkandcomparism')->name('benchmark&comparism.index');

//NOGIAR  PUBLICATION
Route::get('/publication/nogiar', 'PublicationController@index')->name('index')->middleware('permission:access_publication');
Route::get('/publication/year/loadNOGIARPublication', 'PublicationController@loadNOGIARPublication')->name('publication.year.loadNOGIARPublication')->middleware('permission:access_publication');
Route::get('/nogiar/loadPub', 'PublicationController@loadPub')->name('publication.year.loadPub')->middleware('permission:access_publication');
Route::get('/publication/year/section-one', 'PublicationController@loadSectionOne')->name('section-one');
Route::get('/publication/year/section-two', 'PublicationController@loadSectionTwo')->name('section-two');
Route::get('/publication/year/section-three', 'PublicationController@loadSectionThree')->name('section-three');
Route::get('/publication/year/section-four', 'PublicationController@loadSectionFour')->name('section-four');
Route::get('/publication/year/section-five', 'PublicationController@loadSectionFive')->name('section-five');
Route::get('/publication/nogiar/admin/{year?}', 'PublicationController@admin')->name('nogiar.admin');
Route::get('/publication/nogiar/approve/{year?}', 'PublicationController@review_approve')->name('nogiar.approve');
Route::get('/publication/nogiar/add', 'PublicationController@add')->name('nogiar.add');
Route::get('/publication/nogiar/view', 'PublicationController@view')->name('nogiar.view');
Route::get('/publication/nogiar/project/{year}', 'PublicationController@project')->name('nogiar.project');
Route::get('/publication/nogiar/view/{year}', 'PublicationController@viewByYear')->name('nogiar.view-year');
Route::get('/publication/nogiar/publication-section', 'PublicationController@publication_section')->name('nogiar.publication-section');
Route::post('/publication/nogiar/update-publication', 'PublicationController@updatePublicationStatus')->name('nogiar.update-publication');
Route::get('/publication/nogiar/list', 'PublicationController@publicationList')->name('nogiar.list');
Route::get('/publication/nogiar/nogiar-approval', 'PublicationController@nogiarApproval')->name('nogiar.approval')->middleware('permission:manage_publication');
Route::post('/publication/nogiar/insert', 'PublicationController@insert')->name('insert')->middleware('permission:manage_publication');
Route::post('/publication/nogiar/addNogiar', 'PublicationController@addNogiar')->name('addNogiar')->middleware('permission:manage_publication');
Route::post('/publication/nogiar/approveNogiar', 'PublicationController@approveNogiar')->name('approveNogiar')->middleware('permission:manage_publication');
Route::get('/publication/nogiar/modals/editSection', 'PublicationController@editSection')->name('publication.editSection')->middleware('permission:manage_publication');
Route::post('/publication/nogiar/update', 'PublicationController@update')->name('update')->middleware('permission:manage_publication');
Route::post('/publication/nogiar/approve', 'PublicationController@approve')->name('approve')->middleware('permission:approve_publication');
Route::post('/publication/nogiar/admin/add_publication_remark', 'PublicationController@add_publication_remark')->name('add_publication_remark');
Route::post('/publication/nogiar/admin/add_page_number', 'PublicationController@add_page_number')->name('add_page_number')->middleware('permission:manage_publication');
Route::post('/publication/nogiar/admin/testPDF', 'PublicationController@testPDF')->name('testPDF')->middleware('permission:manage_publication');
Route::post('/publication/nogiar/admin/notify-remark-contributor', 'PublicationController@notifyRemarkContributor')->name('notify-remark-contributor')->middleware('permission:manage_publication');
Route::get('/publication/nogiar/modals/editPublicationRemark', 'PublicationController@editPublicationRemark')->name('editPublicationRemark')->middleware('permission:manage_publication');
Route::post('/publication/nogiar/admin/update_publication_remark', 'PublicationController@update_publication_remark')->name('update_publication_remark')->middleware('permission:manage_publication');

Route::post('/publication/nogiar/initPublication', 'PublicationController@initPublication')->name('init-publication')->middleware('permission:manage_publication');
Route::post('/publication/nogiar/reviewPublication', 'PublicationController@reviewPublication')->middleware('permission:manage_publication');
Route::post('/publication/nogiar/approvePublication', 'PublicationController@approvePublication');
Route::post('/publication/nogiar/enableArchivePublication', 'PublicationController@enableArchivePublication')->middleware('permission:approve_publication');

Route::post('/publication/add_table', 'PublicationController@addTable')->name('add_table');

Route::post('/publication/update-save-upload', 'PublicationController@updateSaveUpload')->name('update-save-upload');
Route::post('/publication/upload', 'PublicationController@uploadPublication')->name('upload_publication');
Route::post('/publication/upload-final', 'PublicationController@uploadFinalPublication')->name('upload_final_publication');
Route::post('/publication/nogiar/admin/approve-publication', 'PublicationController@approveNogiarPublication')->name('approve-publication');

Route::get('/publication/nogiar/library', 'PublicationController@publicationLibrary')->name('library');
Route::get('/content/search', 'PublicationController@searchContent')->name('content.search')->middleware('external');
Route::get('/publication/list', 'PublicationController@list')->name('list');
Route::get('/publication/add-to-cart-view/{id}', 'PublicationController@addToCartView')->name('add-to-cart-view')->middleware('external');
Route::post('/publication/add-to-cart', 'PublicationController@addItemToCart')->name('add-to-cart')->middleware('external');
Route::get('/publication/nogiar/cart', 'PublicationController@cart')->name('cart')->middleware('external');
Route::delete('/remove-item-from-cart/{id}', 'PublicationController@removeItemFromCart')->name('remove-item')->middleware('external');
Route::get('/publication/make-payment', 'PublicationController@makePayment')->name('make-payment')->middleware('external');

Route::get('/publication/nogiar/content', 'PublicationController@getPublicationContent');
Route::get('/publication/nogiar/load-content', 'PublicationController@searchPublicationByYear')->middleware('external');

Route::get('getSectionDetails', 'PublicationController@getSectionDetails');
Route::get('getPublicationMessages', 'PublicationController@getPublicationMessages');
Route::get('check-init-status', 'PublicationController@check_init_status');
Route::get('/publication/view-toc', 'PublicationController@viewTableOfContent')->name('view-toc');
Route::post('/publication/table-of-content', 'PublicationController@addTableOfContent')->name('add-table-of-content');
Route::post('/publication/generate-table-header', 'PublicationController@generateAllTableHeader')->name('generate-table-header');
Route::post('/publication/add-section', 'PublicationController@addNOGIARSection')->name('add-section');
Route::post('/publication/enable-section', 'PublicationController@enableNOGIARSection')->name('enable-section');
Route::post('/publication/approve-section', 'PublicationController@approveNOGIARSection')->name('approve-section');
Route::post('/publication/decline-section', 'PublicationController@declineNOGIARSection')->name('decline-section');
Route::post('/publication/add-init-user', 'PublicationController@addInitUser')->name('add-init-user');
Route::post('/publication/remove-contributor', 'PublicationController@removeContributor')->name('remove-contributor');
Route::post('/publication/publication-comment', 'PublicationController@addPublicationComment')->name('publication-comment');
Route::post('/publication/notify-head-for-approval', 'PublicationController@notifyHeadForApproval')->name('notify-head-for-approval');
Route::post('/publication/notify-head-for-decline', 'PublicationController@declineApprovalNotification')->name('notify-head-for-decline');
Route::post('/publication/send-for-approval', 'PublicationController@sendForApproval')->name('send-for-approval');
Route::post('/publication/enable-save-upload', 'PublicationController@enableSaveUpload')->name('enable-save-upload');
Route::post('/publication/add-publication-message', 'PublicationController@addPublicationMessages')->name('add-publication-message');
Route::post('/publication/send-reminder', 'PublicationController@sendReminder')->name('send-reminder');
Route::post('/publication/showhide-publication-tables', 'PublicationController@showHidePubTables')->name('showhide-publication-tables');
Route::get('/publication/nogiar-comment', 'PublicationController@viewPublicationComment')->name('nogiar.comment');

//CONVERT TO DOC
Route::get('publication-complete', 'PublicationController@publicationComplete')->name('publication-complete');
Route::get('publication-converttoword', 'PublicationController@convertToWord')->name('publication-converttoword');

//OPEC ROUTE
Route::get('/publication/OPEC', 'PublicationController@opec_page')->name('index')->middleware('permission:access_publication');

//DWP  PUBLICATION
Route::get('/publication/dwp', 'PublicationController@dwp')->name('dwp')->middleware('permission:access_publication');
Route::get('/publication/year/loadDWPPublication', 'PublicationController@loadDWPPublication')->name('publication.year.loadDWPPublication')->middleware('permission:access_publication');
Route::get('/publication/year/loadDWPAdminPublication', 'PublicationController@loadDWPAdminPublication')->name('loadDWPAdminPublication')->middleware('permission:access_publication');
Route::get('/publication/dwp/admin/{year?}', 'PublicationController@admin_dwp')->name('dwp.admin')->middleware('permission:access_publication');
Route::get('/publication/dwp/add', 'PublicationController@add_dwp')->name('dwp.add')->middleware('permission:manage_publication');
Route::post('/publication/dwp/insert', 'PublicationController@insert_dwp')->name('insert')->middleware('permission:manage_publication');
Route::get('/publication/dwp/modals/editDWPSection', 'PublicationController@editDWPSection')->name('publication.editDWPSection')->middleware('permission:manage_publication');
Route::post('/publication/dwp/update', 'PublicationController@update_dwp')->name('update_dwp')->middleware('permission:manage_publication');
Route::post('/publication/dwp/approve', 'PublicationController@approve_dwp')->name('approve_dwp')->middleware('permission:approve_publication');

Route::get('getATableOfContent', 'PublicationController@getATableOfContent');
Route::get('getATableOfContentCount', 'PublicationController@getATableOfContentCount');
Route::get('getATableOfContentFirst', 'PublicationController@getATableOfContentFirst');
Route::get('getATableOfContentLast', 'PublicationController@getATableOfContentLast');
Route::get('getTempTableHeader', 'PublicationController@getTempTableHeader');
Route::get('getTempTableHeader', 'PublicationController@getTempTableHeader');
Route::get('checkPubYear', 'PublicationController@checkPubYear');
Route::get('getAllPageNo', 'PublicationController@getAllPageNo');

Route::get('getPrevYearSectionDetails', 'PublicationController@getPrevYearSectionDetails');
Route::get('getNogiarContributorsByYear', 'PublicationController@getNogiarContributorsByYear');
Route::get('getNotificationMessage', 'PublicationController@getNotificationMessage');
Route::get('getNogiarContributorsById', 'PublicationController@getNogiarContributorsById');
Route::get('getPublicationStageId', 'PublicationController@getPublicationStageId');
Route::get('getWorkflowUser', 'PublicationController@getWorkflowUser');
Route::get('getPublicationTables', 'PublicationController@getPublicationTables');

Route::get('/new-table-of-content', 'PublicationController@TableOfContent')->name('new-table-of-content')->middleware('auth');
Route::post('/update-table-of-content', 'PublicationController@updateTableOfContent')->name('update-table-of-content')->middleware('auth');

Route::post('/bala/add_bala_aop', 'BALAController@add_bala_aop')->name('bala.add_bala_aop');
Route::get('bala/modals/editBalaBlock', 'BALAController@editBalaBlock')->name('bala.editBalaBlock');
Route::post('/bala/upload_bala_aop', 'BALAController@upload_bala_aop')->name('bala.upload_bala_aop');
Route::get('bala/view/viewBalaBlock', 'BALAController@viewBalaBlock')->name('bala.viewBalaBlock');

Route::post('/bala/add_data_project_status', 'BALAController@add_data_project_status')->name('bala.add_data_project_status');
Route::get('bala/modals/editBalaProjectStatus', 'BALAController@editBalaProjectStatus')->name('bala.editBalaProjectStatus');
Route::post('/bala/upload_data_project_status', 'BALAController@upload_data_project_status')->name('bala.upload_data_project_status');
Route::get('bala/view/viewBalaProjectStatus', 'BALAController@viewBalaProjectStatus')->name('bala.viewBalaProjectStatus');
Route::get('bala/downloadBalaProjectStatus/{type}', 'BALAController@downloadBalaProjectStatus')->name('bala.downloadBalaProjectStatus');

Route::post('/bala/add_area_of_survey', 'BALAController@add_area_of_survey')->name('bala.add_area_of_survey');
Route::get('bala/modals/editBalaAreaOfSurvey', 'BALAController@editBalaAreaOfSurvey')->name('bala.editBalaAreaOfSurvey');
Route::post('/bala/upload_area_of_survey', 'BALAController@upload_area_of_survey')->name('bala.upload_area_of_survey');
Route::get('bala/downloadarea_of_survey/{type}', 'BALAController@downloadarea_of_survey')->name('bala.downloadarea_of_survey');

Route::post('/bala/add_type_of_survey', 'BALAController@add_type_of_survey')->name('bala.add_type_of_survey');
Route::get('bala/modals/editBalaTypeOfSurvey', 'BALAController@editBalaTypeOfSurvey')->name('bala.editBalaTypeOfSurvey');
Route::post('/bala/upload_type_of_survey', 'BALAController@upload_type_of_survey');
Route::get('bala/downloadtype_of_survey/{type}', 'BALAController@downloadtype_of_survey');
Route::get('bala', 'BALAController@index')->name('bala');

//route to get all monthly stream data based on stream selected
Route::get('/getCapacityDetails', 'AjaxController@getCapacityDetails');

//route to get all monthly stream data based on stream selected
Route::get('/getRolePermissions', 'AjaxController@getRolePermissions');

//AUDIT
Route::get('/admin/audit', 'AdminController@view_audit')->name('admin.audit')->middleware('permission:access_audit');
Route::get('admin/modals/viewLoginLogs', 'AdminController@viewLoginLogs')->name('admin.viewLoginLogs')->middleware('permission:access_audit');
Route::get('getAuditLoginByUser', 'AdminController@getAuditLoginByUser');
Route::get('getActionPerformedByUser', 'AdminController@getActionPerformedByUser');

Route::get('/getRevenueChart', function () {
    $revenues = \App\eco_revenue_performance_summary::get();

    return Response::json($revenues);
});

Route::resource('dwp', 'dwpController');

//report loaders start
Route::get('home/loadreport/{year}', 'HomeController@loadBlocks');
Route::get('home/loadterrain/{terrain_id}', 'HomeController@loadTerrains');
Route::get('home/load_blocks/{terrain_id}', 'HomeController@load_Block');
//report loaders end

Route::resource('ajax', 'AjaxController');
Route::get('/getFields', 'AjaxController@getFields');
Route::get('/getFieldDetails', 'AjaxController@getFieldDetails');
Route::get('/getFieldCompanyDetails', 'AjaxController@getFieldCompanyDetails');
Route::get('/getConcessionDetails', 'AjaxController@getConcessionDetails');
Route::get('/getConstants', 'AjaxController@getConstants');
Route::get('/getCategoryRoles', 'AjaxController@getCategoryRoles');
Route::get('/checkPermissions', 'AjaxController@checkPermissions');
Route::get('/getCompanyObligation', 'AjaxController@getCompanyObligation');
Route::get('/getTotalAg_Nag', 'AjaxController@getTotalAg_Nag');
Route::get('/getRefineryCapacityDetails', 'AjaxController@getRefineryCapacityDetails');
Route::get('/loadNogiarPublication', 'AjaxController@loadNogiarPublication');
Route::get('/getReportCustodianEmail', 'AjaxController@getReportCustodianEmail');
Route::get('/getReportManagerEmail', 'AjaxController@getReportManagerEmail');
Route::get('/getFieldCompany', 'AjaxController@getFieldCompany');
Route::get('/getconcessionCompany', 'AjaxController@getconcessionCompany');
Route::get('/getMPMThematicAreaByYear', 'AjaxController@getMPMThematicAreaByYear');
Route::get('/getMPMKeyResultByYear', 'AjaxController@getMPMKeyResultByYear');
Route::get('/getMPMKPIByYear', 'AjaxController@getMPMKPIByYear');
Route::get('/getExchangeRateDetails', 'AjaxController@getExchangeRateDetails');
Route::post('/approveOpl', 'AjaxController@approveOpl')->name('approveOpl');
Route::post('/approveOml', 'AjaxController@approveOml')->name('approveOml');
Route::post('/approveOpenAcreage', 'AjaxController@approveOpenAcreage')->name('approveOpenAcreage');

Route::post('/approveWellCompletionActivities', 'AjaxController@approveWellCompletionActivities')->name('approveWellCompletionActivities');


Route::resource('workflows', 'WorkflowController');

//Route::get('/publication/nogiar', 'PublicationController@index')->name('index')->middleware('permission:publications');
Route::get('/pdfview', 'PublicationController@pdfview')->name('pdfview');
//Route::get('/pdfview', 'ItemController@pdfview')->name('pdfview');

//redirect to provider
Route::get('/auth/microsoft', 'MicrosoftController@redirectToProvider');
Route::get('/auth/microsoft/callback', 'MicrosoftController@callbackurl');

//ROUTE FOR HANDSHAKE INTO PRIS
Route::get('/PRISlogin', function (Request $request) {
    $user = \App\User::updateOrCreate(['email'=>$request->email], ['email'=>$request->email, 'password'=>bcrypt('peace133'), 'name'=>'Users']);
    \Auth::loginUsingId($user->id);

    return redirect('/dashboard');
});

// $2y$10$t1z6Cs2OMEbTPfLySlPOHeGIXFYmRMcJvfFB3tmE.TyokIdQzDmni

// $2y$12$HQtiM0YzgSjyGhZj5kv7V.QiCzYTZbEdGvEPjASEIleXgvkO5fSCe

//UPSTREAM
Route::resource('upstream', 'UpstreamController');
// Route::post('/bala/download-search-data', 'BALAController@downloadSearchData')->name('download-search-data');
Route::get('bala/downloadOPL/{type}', 'UpstreamController@downloadOPL')->name('bala.downloadOPL')->middleware('permission:manage_concession');
Route::get('bala/downloadOML/{type}', 'UpstreamController@downloadOML')->name('bala.downloadOML')->middleware('permission:manage_concession');
Route::get('bala/downloadBalaMarginalField/{type}', 'UpstreamController@downloadBalaMarginalField');
Route::get('upstream/downloadBalaProjectStatus/{type}', 'UpstreamController@downloadBalaProjectStatus');
Route::get('upstream/downloadOpenAcreage/{type}', 'UpstreamController@downloadOpenAcreage');

Route::post('/upstream/download-search-data', 'UpstreamController@downloadSearchData')->name('download-search-data');
Route::post('/upstream/set-stage_id', 'UpstreamController@setStageId')->name('set-stage_id');
Route::post('/upstream/approve-all-stage_id', 'UpstreamController@approveAllStageId')->name('approve-all-stage_id');
Route::post('/upstream/notify-custodian-for-approval', 'UpstreamController@notifyCustodian')->name('notify-custodian-for-approval');
Route::get('upstream/download_reserve/{type}', 'UpstreamController@download_reserve');
Route::get('upstream/download_reserve_oil/{type}', 'UpstreamController@download_reserve_oil');
Route::get('upstream/download_reserve_gas/{type}', 'UpstreamController@download_reserve_gas');
Route::get('upstream/download_crude_production/{type}', 'UpstreamController@download_crude_production');
Route::get('/upstream/download_production_deferment/{type}', 'UpstreamController@download_production_deferment');
Route::get('upstream/download_seismic_data/{type}', 'UpstreamController@download_seismic_data');
Route::get('upstream/download_rig_disposition/{type}', 'UpstreamController@download_rig_disposition');
Route::get('upstream/download_well_activities/{type}', 'UpstreamController@download_well_activities');
Route::get('upstream/download_well_completion/{type}', 'UpstreamController@download_well_completion');
Route::get('upstream/download_well_workover/{type}', 'UpstreamController@download_well_workover');
Route::get('upstream/download_well_plugback_abandonment/{type}', 'UpstreamController@download_well_plugback_abandonment');
Route::get('/upstream/download_oil_facility/{type}', 'UpstreamController@download_oil_facility');
Route::get('/upstream/download_field_development_plan/{type}', 'UpstreamController@download_field_development_plan');
Route::get('/upstream/download_approved_gas_development_plan/{type}', 'UpstreamController@download_approved_gas_development_plan');
Route::get('/upstream/download_drilling_gas/{type}', 'UpstreamController@download_drilling_gas');
Route::get('/upstream/download_gas_initial_completions/{type}', 'UpstreamController@download_gas_initial_completions');
Route::get('/upstream/download_field_summary/{type}', 'UpstreamController@download_field_summary');
Route::get('/upstream/download_replacement_rate/{type}', 'UpstreamController@download_replacement_rate');
Route::get('/upstream/download_depletion_rate/{type}', 'UpstreamController@download_depletion_rate');
Route::get('/upstream/download_gas_depletion_rate/{type}', 'UpstreamController@download_gas_depletion_rate');

Route::get('/download-opl-template', function(){ return Excel::download(new \App\Exports\upstream\OPLTemplate, 'OPL Template.xlsx'); });
Route::get('/download-oml-template', function(){ return Excel::download(new \App\Exports\upstream\OMLTemplate, 'OML Template.xlsx'); });
Route::get('/download-multi-client-template', function(){ return Excel::download(new \App\Exports\upstream\MultiClientTemplate, 'MultiClient Template.xlsx'); });
Route::get('/download-open-acreage-template', function(){ return Excel::download(new \App\Exports\upstream\OpenAcreageTemplate, 'Open Acreage Template.xlsx'); });
Route::get('/download-oil-reserve-template', function(){ return Excel::download(new \App\Exports\upstream\OilReserveTemplate, 'Oil Reserve Template.xlsx'); });
Route::get('/download-oil-condensate-template', function(){ return Excel::download(new \App\Exports\upstream\CondensateReserveTemplate, 'Condensate Reserve Template.xlsx'); });
Route::get('/download-gas-reserve-template', function(){ return Excel::download(new \App\Exports\upstream\GasReserveTemplate, 'Gas Reserve Template.xlsx'); });
Route::get('/download-geo-data-template', function(){ return Excel::download(new \App\Exports\upstream\GeoPhysicalDataTemplate, 'Geo Physical Data Template.xlsx'); });
Route::get('/download-provisional-crude-template', function(){ return Excel::download(new \App\Exports\upstream\ProvisionalCrudeTemplate, 'Provisional Crude Template.xlsx'); });
Route::get('/download-crude-deferment-template', function(){ return Excel::download(new \App\Exports\upstream\CrudeProductionDefermentTemplate, 'Crude Production Deferment Template.xlsx'); });
Route::get('/download-up-drilling-template', function(){ return Excel::download(new \App\Exports\upstream\UpstreamDrillingTemplate, 'Upstream Drilling Template.xlsx'); });
Route::get('/download-up-well-completion-template', function(){ return Excel::download(new \App\Exports\upstream\UpstreamWellCompletionTemplate, 'Upstream Well Completion Template.xlsx'); });
Route::get('/download-up-workover-template', function(){ return Excel::download(new \App\Exports\upstream\UpstreamWellWorkoverTemplate, 'Upstream Well Workover Template.xlsx'); });
Route::get('/download-up-plugback-template', function(){ return Excel::download(new \App\Exports\upstream\UpstreamPlugbackTemplate, 'Upstream Plugback Abandonment Template.xlsx'); });
Route::get('/download-up-fdp-template', function(){ return Excel::download(new \App\Exports\upstream\UpstreamFDPTemplate, 'Upstream FDP Template.xlsx'); });
Route::get('/download-up-field-summary-template', function(){ return Excel::download(new \App\Exports\upstream\UpstreamFieldSummaryTemplate, 'Upstream Field Summary Template.xlsx'); });
Route::get('/download-up-rig-disposition-template', function(){ return Excel::download(new \App\Exports\upstream\UpstreamRigDispositionTemplate, 'Upstream Rig Disposition Template.xlsx'); });

Route::get('/download-gas-drilling-template', function(){ return Excel::download(new \App\Exports\upstream\GasDrillingTemplate, 'Gas Drilling Template.xlsx'); });
Route::get('/download-gas-completion-template', function(){ return Excel::download(new \App\Exports\upstream\GasCompletionTemplate, 'Gas Initial Completion Template.xlsx'); });
Route::get('/download-gas-approved-dev-plan-template', function(){ return Excel::download(new \App\Exports\upstream\GasApprovedDevPlanTemplate, 'Approved Gas Dev Plan Template.xlsx'); });
Route::get('/download-gas-completion-actitity-template', function(){ return Excel::download(new \App\Exports\upstream\GasCompletionActivityTemplate, 'Gas Completion Activity Template.xlsx'); });

Route::post('/upstream/delete-record', 'UpstreamController@deleteRecord');

//UPSTREAM REPLACEMENT RATE
Route::POST('/upstream/reserve-replacement-rate', 'UpstreamController@calculate_ratio');
Route::POST('/upstream/reserve-replacement-rate-gas', 'UpstreamController@calculate_ratio_gas');

// DOWNSTREAM
Route::resource('downstream', 'DownstreamController');
Route::post('/downstream/download-search-data', 'DownstreamController@downloadSearchData')->name('download-search-data');
Route::get('/downstream/download_terminal_stream_prod/{type}', 'DownstreamController@download_terminal_stream_prod');
Route::get('/downstream/download_monthly_summary_crude_export/{type}', 'DownstreamController@download_monthly_summary_crude_export');
Route::get('/downstream/download_crude_export_destination/{type}', 'DownstreamController@download_crude_export_destination');
Route::get('/downstream/download_crude_export_destination/{type}', 'DownstreamController@download_crude_export_destination');
Route::get('/downstream/download_crude_export_company/{type}', 'DownstreamController@download_crude_export_company');
Route::get('/downstream/download_petrochemical_plant/{type}', 'DownstreamController@download_petrochemical_plant');
Route::get('/downstream/download_refinary_capacity/{type}', 'DownstreamController@download_refinary_capacity');
Route::get('/downstream/download_refinary_performance/{type}', 'DownstreamController@download_refinary_performance');
Route::get('/downstream/download_depot/{type}', 'DownstreamController@download_depot')->name('downstream.download_depot');
Route::get('/downstream/download_jetty/{type}', 'DownstreamController@download_jetty')->name('downstream.download_jetty');
Route::get('/downstream/download_terminal/{type}', 'DownstreamController@download_terminal')->name('downstream.download_terminal');
Route::get('/downstream/download_product_volume_permit/{type}', 'DownstreamController@download_product_volume_permit');
Route::get('/downstream/download_product_volume_permit_vessel/{type}', 'DownstreamController@download_product_volume_permit_vessel');
Route::get('/downstream/download_refinery_production/{type}', 'DownstreamController@download_refinery_production');
Route::get('/downstream/download_refinery_production_volume/{type}', 'DownstreamController@download_refinery_production_volume');
Route::get('/downstream/download_prod_ave_price_range/{type}', 'DownstreamController@download_prod_ave_price_range');
Route::get('/downstream/download_retail_outlet/{type}', 'DownstreamController@download_retail_outlet');
Route::get('/downstream/download_retail_outlet_capacity/{type}', 'DownstreamController@download_retail_outlet_capacity');
Route::get('/downstream/download_license_marketer_storage/{type}', 'DownstreamController@download_license_marketer_storage');
Route::get('/downstream/download_import_product/{type}', 'DownstreamController@download_import_product');
Route::get('/downstream/download_ave_price_crude/{type}', 'DownstreamController@download_ave_price_crude');

Route::get('/download-crude-production-template', function(){ return Excel::download(new \App\Exports\downstream\CrudeProductionTemplate, 'Reconciled Crude & Condensate Prod Template.xlsx'); });
Route::get('/download-crude-export-template', function(){ return Excel::download(new \App\Exports\downstream\ExportByCrudeStreamTemplate, 'Export by Crude Stream Template.xlsx'); });
Route::get('/download-crude-export-destination-template', function(){ return Excel::download(new \App\Exports\downstream\ExportByDestinationTemplate, 'Export by Destination Template.xlsx'); });
Route::get('/download-crude-export-country-template', function(){ return Excel::download(new \App\Exports\downstream\ExportByCountryTemplate, 'Export by Country Template.xlsx'); });
Route::get('/download-average-crude-price-template', function(){ return Excel::download(new \App\Exports\downstream\AveCrudePriceTemplate, 'Ave Crude Price Template.xlsx'); });
Route::get('/download-refinery-details-template', function(){ return Excel::download(new \App\Exports\downstream\RefineryDetailsTemplate, 'Refinery Details Template.xlsx'); });
Route::get('/download-refined-crude-processed-template', function(){ return Excel::download(new \App\Exports\downstream\RefinedCrudeProcessedTemplate, 'Refined Crude Processed Template.xlsx'); });
Route::get('/download-petrochemical-plant-template', function(){ return Excel::download(new \App\Exports\downstream\PetrochemicalPlantTemplate, 'Petrochemical Plant Template.xlsx'); });
Route::get('/download-depot-template', function(){ return Excel::download(new \App\Exports\downstream\DepotTemplate, 'Depot Facilities Template.xlsx'); });
Route::get('/download-jetty-template', function(){ return Excel::download(new \App\Exports\downstream\JettyTemplate, 'Jetty Facilities Template.xlsx'); });
Route::get('/download-terminal-template', function(){ return Excel::download(new \App\Exports\downstream\TerminalTemplate, 'Terminal Facilities Template.xlsx'); });
Route::get('/download-domestic-production-template', function(){ return Excel::download(new \App\Exports\downstream\DomesticProductionTemplate, 'Domestic Production Template.xlsx'); });
Route::get('/download-product-import-vessel-template', function(){ return Excel::download(new \App\Exports\downstream\ProductImportVesselTemplate, 'Product Import Vessel Template.xlsx'); });
Route::get('/download-import-permit-issued-template', function(){ return Excel::download(new \App\Exports\downstream\ImportPermitIssuedTemplate, 'Import Permit Issued Template.xlsx'); });
Route::get('/download-product-import-by-market-template', function(){ return Excel::download(new \App\Exports\downstream\ActualProductImportTemplate, 'Actual Product Import By Mkt Seg Template.xlsx'); });
Route::get('/download-retail-outlet-count-template', function(){ return Excel::download(new \App\Exports\downstream\RetailOutletCountTemplate, 'Retail Outlet Count Template.xlsx'); });
Route::get('/download-retail-outlet-capacity-template', function(){ return Excel::download(new \App\Exports\downstream\RetailOutletCapacityTemplate, 'Retail Outlet Storage Capacity Template.xlsx'); });
Route::get('/download-lube-blending-plant-template', function(){ return Excel::download(new \App\Exports\downstream\LubeBlendingPlantTemplate, 'Lubricant Blending Plant Template.xlsx'); });
Route::get('/download-product-retail-price-template', function(){ return Excel::download(new \App\Exports\downstream\ProductRetailPriceTemplate, 'Product Retail Price Template.xlsx'); });

Route::post('/downstream/delete-record', 'DownstreamController@deleteRecord');

//GAS
Route::resource('gas', 'GasController');
Route::post('/gas/download-search-data', 'GasController@downloadSearchData')->name('download-search-data');
Route::get('/gas/download_gas_supply_obligation/{type}', 'GasController@download_gas_supply_obligation');

Route::get('/download-gas-obligation-template', function(){ return Excel::download(new \App\Exports\gas\GasObligationTemplate, 'gas Obligation Template.xlsx'); });
Route::get('/download-gas-supply-template', function(){ return Excel::download(new \App\Exports\gas\GasSupplyTemplate, 'gas Supply Template.xlsx'); });
Route::get('/download-gas-production-template', function(){ return Excel::download(new \App\Exports\gas\GasProductionTemplate, 'gas Production Template.xlsx'); });
Route::get('/download-gas-utilization-template', function(){ return Excel::download(new \App\Exports\gas\GasUtilizationTemplate, 'gas Utilization Template.xlsx'); });
Route::get('/download-gas-facilities-template', function(){ return Excel::download(new \App\Exports\gas\GasFacilitiesTemplate, 'gas Facilities Template.xlsx'); });
Route::get('/download-gas-import-permit-issued-template', function(){ return Excel::download(new \App\Exports\gas\GasImportPermitIssuedTemplate, 'gas Import Permit Issued Template.xlsx'); });
Route::get('/download-gas-actual-import-template', function(){ return Excel::download(new \App\Exports\gas\GasActualImportTemplate, 'gas Actual Import Template.xlsx'); });
Route::get('/download-gas-lpg-consumption-template', function(){ return Excel::download(new \App\Exports\gas\GasLPGConsumptionTemplate, 'gas LPG Consumption Template.xlsx'); });
Route::get('/download-gas-export-template', function(){ return Excel::download(new \App\Exports\gas\GasExportTemplate, 'gas Export Template.xlsx'); });
Route::get('/download-gas-products-template', function(){ return Excel::download(new \App\Exports\gas\GasProductTemplate, 'gas Product Template.xlsx'); });

Route::get('/gas/download_gas_supply_performance/{type}', 'GasController@download_gas_supply_performance');
Route::get('/gas/download_gas_production_summary/{type}', 'GasController@download_gas_production_summary');
Route::get('/gas/download_gas_utilization_summary/{type}', 'GasController@download_gas_utilization_summary')->name('gas-util');
Route::get('/gas/download_gas_performance/{type}', 'GasController@download_gas_performance');
Route::get('/gas/download_gas_facility/{type}', 'GasController@download_gas_facility')->name('gas.download_gas_facility');
Route::get('/gas/download_gas_lpg/{type}', 'GasController@download_gas_lpg')->name('gas.download_gas_lpg');
Route::get('/gas/download_gas_cng/{type}', 'GasController@download_gas_cng')->name('gas.download_gas_cng');
Route::get('/gas/download_gas_lng/{type}', 'GasController@download_gas_lng')->name('gas.download_gas_lng');
Route::get('/gas/download_gas_propane/{type}', 'GasController@download_gas_propane')->name('gas.download_gas_propane');
Route::get('/gas/download_retail_outlet_capacity/{type}', 'GasController@download_retail_outlet_capacity');
Route::get('/gas/download_product_volume_permit/{type}', 'GasController@download_product_volume_permit');
Route::get('/gas/download_refinery_production/{type}', 'GasController@download_refinery_production');
Route::get('/gas/download_gas_actual_production/{type}', 'GasController@download_gas_actual_production');
Route::get('/gas/download_gas_supply_textile_industry/{type}', 'GasController@download_gas_supply_textile_industry');
Route::get('/gas/download_gas_export_volume_vessel/{type}', 'GasController@download_gas_export_volume_vessel');

Route::post('/gas/delete-record', 'GasController@deleteRecord');

//HSE
Route::resource('she-accident-report', 'SHEController');
Route::post('/she-accident-report/download-search-data', 'SHEController@downloadSearchData')->name('download-search-data');
Route::get('/she-accident-report/download_she_accident_report_up/{type}', 'SHEController@download_she_accident_report_up');
Route::get('/she-accident-report/download_she_accident_report_down/{type}', 'SHEController@download_she_accident_report_down');
Route::get('/she-accident-report/download_she_spill_incidence_report/{type}', 'SHEController@download_she_spill_incidence_report');
Route::get('/she-accident-report/download_she_water_volumes/{type}', 'SHEController@download_she_water_volumes');
Route::get('/she-accident-report/download_she_waste_volumes/{type}', 'SHEController@download_she_waste_volumes');
Route::get('/she-accident-report/download_she_effluent_waste_discharged/{type}', 'SHEController@download_she_effluent_waste_discharged');
Route::get('/she-accident-report/download_she_offshore_safety_permit/{type}', 'SHEController@download_she_offshore_safety_permit');
Route::get('/she-accident-report/download_she_accredited_waste_manager/{type}', 'SHEController@download_she_accredited_waste_manager');
Route::get('/she-accident-report/download_she_waste_management_facilities/{type}', 'SHEController@download_she_waste_management_facilities');
Route::get('/she-accident-report/download_she_oil_spill_contingency/{type}', 'SHEController@download_she_oil_spill_contigency');
Route::get('/she-accident-report/download_she_petitions_received/{type}', 'SHEController@download_she_pettitions_received');
Route::get('/she-accident-report/download_she_accredited_laboratories/{type}', 'SHEController@download_she_accredited_laboratories');
Route::get('/she-accident-report/download_she_chemical_certification/{type}', 'SHEController@download_she_chemical_certification');
Route::get('/she-accident-report/download_she_drilling_chemical/{type}', 'SHEController@download_she_drilling_chemical');
Route::get('/she-accident-report/download_she_environmental_restoration/{type}', 'SHEController@download_she_environmental_restoration');
Route::get('/she-accident-report/download_she_environmental_studies/{type}', 'SHEController@download_she_environmental_studies');
Route::get('/she-accident-report/download_she_environmental_compliance/{type}', 'SHEController@download_she_environmental_compliance');
Route::get('/she-accident-report/download_she_medical_training_center/{type}', 'SHEController@download_she_medical_training_center');
Route::get('/she-accident-report/download_she_radiation_safety_permit/{type}', 'SHEController@download_she_radiation_safety_permit');

Route::get('/download-chemical-certification-template', function(){ return Excel::download(new \App\Exports\hse\ChemicalCertificationTemplate, 'Chemical Certification Template.xlsx'); });
Route::get('/download-accredited-laboratory-template', function(){ return Excel::download(new \App\Exports\hse\AccreditedLaboratoryTemplate, 'Accredited Laboratory Template.xlsx'); });
Route::get('/download-compliance-monitoring-template', function(){ return Excel::download(new \App\Exports\hse\ComplianceMonitoringTemplate, 'Compliance Monitoring Template.xlsx'); });
Route::get('/download-safty-permit-template', function(){ return Excel::download(new \App\Exports\hse\SaftyPermitTemplate, 'Offshore Safety Permit Template.xlsx'); });
Route::get('/download-radiation-safty-permit-template', function(){ return Excel::download(new \App\Exports\hse\RadiationSaftyPermitTemplate, 'Radiation Safety Permit Template.xlsx'); });
Route::get('/download-safety-training-center-template', function(){ return Excel::download(new \App\Exports\hse\SafetyTrainingCenterTemplate, 'Safety Training Center Template.xlsx'); });
Route::get('/download-upstream-incidence-template', function(){ return Excel::download(new \App\Exports\hse\UpstreamIncidenceTemplate, 'Upstream Incidence Template.xlsx'); });
Route::get('/download-downstream-incidence-template', function(){ return Excel::download(new \App\Exports\hse\DownstreamIncidenceTemplate, 'Downstream Incidence Template.xlsx'); });
Route::get('/download-environmental-studies-template', function(){ return Excel::download(new \App\Exports\hse\EnvironmentStudiesTemplate, 'Environmental Studies Template.xlsx'); });
Route::get('/download-drill-waste-water-template', function(){ return Excel::download(new \App\Exports\hse\DrillWasteWaterTemplate, 'Drilled Waste Water Template.xlsx'); });
Route::get('/download-effluent-waste-discharged-template', function(){ return Excel::download(new \App\Exports\hse\EffluentWasteDischargedTemplate, 'Effluent Waste Discharged Template.xlsx'); });
Route::get('/download-produced-water-volume-template', function(){ return Excel::download(new \App\Exports\hse\ProducedWaterVolumeTemplate, 'Produced Water Volume Template.xlsx'); });
Route::get('/download-waste-management-facilities-template', function(){ return Excel::download(new \App\Exports\hse\WasteManagementFacilitiesTemplate, 'Waste Management Facilities Template.xlsx'); });
Route::get('/download-accredited-waste-managers-template', function(){ return Excel::download(new \App\Exports\hse\AccreditedWasteManagersTemplate, 'Accredited Waste Managers Template.xlsx'); });
Route::get('/download-oil-spill-contingency-template', function(){ return Excel::download(new \App\Exports\hse\OilSpillContingencyTemplate, 'Oil Spill Contingency Template.xlsx'); });
Route::get('/download-pettitions-received-template', function(){ return Excel::download(new \App\Exports\hse\PettitionsReceivedTemplate, 'Pettitions Received Template.xlsx'); });
Route::get('/download-environmental-restoration-template', function(){ return Excel::download(new \App\Exports\hse\EnvironmentalRestorationTemplate, 'Environmental Restoration Template.xlsx'); });
Route::get('/download-spill-report-template', function(){ return Excel::download(new \App\Exports\hse\SpillReportTemplate, 'Spill Incidence Report Template.xlsx'); });

Route::post('/she-accident-report/delete-record', 'SHEController@deleteRecord');

//DISTRIBUTION
Route::resource('transport', 'DistributionController');
Route::post('/transport/download-search-data', 'DistributionController@downloadSearchData')->name('download-search-data');
Route::get('/transport/download_processing_plant_project/{type}', 'DistributionController@download_processing_plant_project');
Route::get('/transport/download_refinery_project/{type}', 'DistributionController@download_refinery_project');
Route::get('/transport/download_down_project/{type}', 'DistributionController@download_down_project');
Route::get('/transport/download_gas_project/{type}', 'DistributionController@download_gas_project');
Route::get('/transport/download_upstream_project/{type}', 'DistributionController@download_upstream_project');
Route::get('/transport/download_pipeline_project/{type}', 'DistributionController@download_pipeline_project');
Route::get('/transport/download_metering/{type}', 'DistributionController@download_metering');
Route::get('/transport/download_technology/{type}', 'DistributionController@download_technology');

Route::get('/download-upstream-project-template', function(){ return Excel::download(new \App\Exports\es\UpstreamProjectTemplate, 'Upstream Project Template.xlsx'); });
Route::get('/download-refinery-project-template', function(){ return Excel::download(new \App\Exports\es\RefineryProjectTemplate, 'Licensed Refinery Project Template.xlsx'); });
Route::get('/download-pet-plant-project-template', function(){ return Excel::download(new \App\Exports\es\PetPlantProjectTemplate, 'Petrochemical Plant Project Template.xlsx'); });
Route::get('/download-gas-project-template', function(){ return Excel::download(new \App\Exports\es\GasProjectTemplate, 'Major Gas Project Template.xlsx'); });
Route::get('/download-pipeline-project-template', function(){ return Excel::download(new \App\Exports\es\PipelineProjectTemplate, 'Pipeline Project Template.xlsx'); });
Route::get('/download-metering-project-template', function(){ return Excel::download(new \App\Exports\es\MeteringProjectTemplate, 'Metering Project Template.xlsx'); });
Route::get('/download-technology-project-template', function(){ return Excel::download(new \App\Exports\es\TechnologyProjectTemplate, 'Technology Project Template.xlsx'); });

Route::post('/transport/delete-record', 'DistributionController@deleteRecord');

// REVENUE
Route::resource('economics', 'RevenueController');
Route::post('/economics/download-search-data', 'RevenueController@downloadSearchData')->name('download-search-data');
Route::get('/economics/download_revenue_projected/{type}', 'RevenueController@download_revenue_projected');
Route::get('/economics/download_revenue_actual/{type}', 'RevenueController@download_revenue_actual');

Route::get('/download-revenue-template', function(){ return Excel::download(new \App\Exports\revenue\RevenueTemplate, 'Revenue Template.xlsx'); });

Route::post('/economics/delete-record', 'RevenueController@deleteRecord');

//MPM
Route::resource('ministerial-performance', 'MPMController');
Route::get('/ministerial-performance/download_mpm/{type}', 'MPMController@download_mpm')->name('ministerial-performance.download_mpm');
Route::get('/ministerial-kpi/net-cash-flow', 'MPMController@viewNetCashFlow')->name('ministerial-kpi.viewNetCashFlow');
Route::get('/ministerial-performance/download_war/{type}', 'MPMController@download_war')->name('ministerial-performance.download_war');
Route::get('/ministerial-performance/download_themic_area/{type}', 'MPMController@download_themic_area');
Route::get('/ministerial-performance/download_key_result_area/{type}', 'MPMController@download_key_result_area');
Route::get('/ministerial-performance/download_mpm_kpi/{type}', 'MPMController@download_mpm_kpi');
Route::get('/ministerial-performance/download_source/{type}', 'MPMController@download_source');
Route::get('/ministerial-performance/download_metric/{type}', 'MPMController@download_metric');
Route::get('/ministerial-performance/download_frequency_of_measurement/{type}', 'MPMController@download_frequency_of_measurement');

//DWP
Route::resource('project', 'ProjectController');
Route::get('/project/download_dwp/{type}', 'ProjectController@download_dwp')->name('project.download_dwp');
Route::get('/project/download_mtss_dpr_pp/{type}', 'ProjectController@download_mtss_dpr_pp');
Route::get('/project/download_critical_milestone_matrix/{type}', 'ProjectController@download_critical_milestone_matrix');
Route::get('/project/download_alignment/{type}', 'ProjectController@download_alignment')->name('project.download_alignment');
Route::get('/project/download_program_priority/{type}', 'ProjectController@download_program_priority');
Route::get('/project/download_task_target/{type}', 'ProjectController@download_task_target')->name('project.download_task_target');
Route::get('/project/download_task_critical_milestone/{type}', 'ProjectController@download_task_critical_milestone');
Route::get('/project/download_task_timeline/{type}', 'ProjectController@download_task_timeline')->name('project.download_task_timeline');
Route::get('/project/download_achievement_status/{type}', 'ProjectController@download_achievement_status');
Route::get('/project/download_restricting_factor/{type}', 'ProjectController@download_restricting_factor')->name('project.download_restricting_factor');
Route::get('/project/download_kpi_target/{type}', 'ProjectController@download_kpi_target')->name('project.download_kpi_target');
Route::get('/project/download_key_recovery_plan/{type}', 'ProjectController@download_key_recovery_plan');
Route::post('/project/uploaddivision', 'ProjectController@uploaddivision')->name('project.uploaddivision');
Route::get('/project/download_division/{type}', 'ProjectController@download_division');

//Weekly Activity Reporting
// Route::resource('WAR-Upstream', 'WARUpstreamController');
Route::get('/WAR-Upstream/download_acquisition/{type}', 'WARUpstreamController@download_acquisition');

//GUEST-EXTERNAL USER
Route::prefix('external')->group(function () {
    Route::get('/external/dashboard-external', 'ExternalUserController@index')->name('external.dashboard-external');
    // Route::get('dashboard-external', 'ExternalUserController@index')->name('external.dashboard-external');
    Route::get('register', 'ExternalUserController@create')->name('external.register');
    Route::post('register', 'ExternalUserController@store')->name('external.register.store');
    Route::get('login', 'Auth\External\LoginController@login')->name('external.auth.login');
    Route::post('login', 'Auth\External\LoginController@loginExternal')->name('external.auth.loginExternal');
    Route::post('logout', 'Auth\External\LoginController@logout')->name('external.auth.logout');
});

//BOT
// Route::resource('bot', 'BotController');

Route::get('/bot-qna/{q}/{a}', 'BotController@BotQnA');

Route::resource('opec', 'Opec\OpecCrudeController')->middleware('auth');
Route::resource('opecNgl', 'Opec\OpecNglController')->middleware('auth');
Route::resource('opecPetroleum', 'Opec\OpecPetroleumController')->middleware('auth');
Route::resource('opecUpstream', 'Opec\OpecUpstreamController')->middleware('auth');
Route::resource('opecFutureProduct', 'Opec\OpecFutureProductController')->middleware('auth');
Route::resource('opecGasBalance', 'Opec\opecGasBalanceController')->middleware('auth');
Route::resource('opecGasUpstream', 'Opec\opecGasUpstreamController')->middleware('auth');
Route::resource('opecOtherPrimaries', 'Opec\opecOtherPrimaryController')->middleware('auth');
Route::resource('opecRefineryPetrochemical', 'Opec\opecRefineryPetrochemicalController')->middleware('auth');
Route::resource('opecExportByDestination', 'Opec\opecExportByDestinationController')->middleware('auth');

Route::fallback(function () {
    return redirect('home');
});
// Route to resolve Laravel to Vue Route
Route::get('/{vue_capture?}', function () {
    // if(\Auth::guest()){
    // 	return redirect('login');
    // }
    return view('welcome');
})->where('vue_capture', '^(?!storage).*$')->where('vue_capture', '!=', 'publica/*')->middleware('auth');

Route::get('read-env', function () {

   // $env = \Illuminate\Support\Facades\Storage::disk('global')->get('.env');

    $env = \Illuminate\Support\Facades\Storage::disk('global')->get('public/.env_tmp');

    \Illuminate\Support\Facades\Storage::disk('global')->put('.env', $env);

    // \Illuminate\Support\Facades\Storage::disk('global')->put('public/env.txt',$env);

    return 'copied...';
});

Route::get('/send-email', 'HomeController@tesEmail')->name('send-email')->middleware('auth');

Route::get('/purge-data', 'AdminController@purge')->name('purge-data')->middleware('permission:add_users');
