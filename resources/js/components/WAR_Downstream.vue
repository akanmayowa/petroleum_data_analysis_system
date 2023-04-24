<style>
    .p-3
    {
        padding: 10px 0px !important;
    }
</style>


<template>

  <!-- Page -->
  <div class="page" style="padding: -25px 0px 0px 0px;">

    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <!-- Notification Panel --> 
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Weekly Activities For Downstream Division </h4>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control pull-right m-b-2" placeholder="Search" v-model="search" style="width: 60%;" />
                        </div>
                    </div>
                    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#rom" role="tab" @click="globalPagination(application_data)">ROM </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#lic" role="tab" @click="globalPagination(license_data)">LICENSE </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#sur" role="tab" @click="globalPagination(surveillance_data)">SURVEILLANCE </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dep" role="tab">DEPOT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#pro" role="tab" @click="globalPagination(product_data)">PRODUCT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#ref_prod" role="tab">PRODUCTION </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#ref_perf" role="tab">PERFORMANCE </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#t_out" role="tab" @click="globalPagination(truck_out_data)">TRUCK OUT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#seg" role="tab" @click="globalPagination(market_segment_data)">MARKET </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#ops" role="tab">OPERATIONS </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">  
                        <div class="tab-pane p-3" id="rom" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> ROM APPLICATIONS <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload ROM APPLICATIONS" style="background: #202020; color: #fff" @click="setModaleHeader('ROM APPLICATIONS', 'rom_application')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="downstream_rom_applications" :file_name="'Rom Applications'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>Suitability insp-Received </th>
                                                    <th>Suitability insp-Received <i class="units"></i></th>
                                                    <th>ATC- received <i class="units"></i></th>
                                                    <th>ATC- Approved </th>
                                                    <th>Pressure test -Received <i class="units"></i></th>
                                                    <th>Pressure test -Approved <i class="units"></i></th>
                                                    <th>Tank Burial- Received </th>
                                                    <th>Tank Burial- Approved <i class="units"></i></th>
                                                    <th>Leak Test- Received <i class="units"></i></th>
                                                    <th>Leak Test- Received </th>
                                                    <th>Final insp -Received <i class="units"></i></th> 
                                                    <th>Final insp -Received <i class="units"></i></th>   
                                                    <th>Renewal insp- Received  <i class="units"></i></th> 
                                                    <th>Renewal insp- Approved  <i class="units"></i></th>  
                                                    <th>Vessel License- Received  <i class="units"></i></th>  
                                                    <th>Vessel License- Approved  <i class="units"></i></th>                                           
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addRomApplicationModal" data-toggle="modal" data-original-title="Enter Gas RomApplication Activities" @click="clearRomApplicationForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="downstream_rom_application in filteredRomApplications" v-bind:key="downstream_rom_application.id">
                                                <tr>  
                                                    <th>{{downstream_rom_application.date}}</th>
                                                    <th>{{downstream_rom_application.week}}</th>
                                                    <th>{{downstream_rom_application.suitability_inspection_received}}</th>
                                                    <th>{{downstream_rom_application.suitability_inspection_approved}}</th>
                                                    <th>{{downstream_rom_application.atc_received}}</th>
                                                    <th>{{downstream_rom_application.atc_approved}}</th> 
                                                    <th>{{downstream_rom_application.pressure_test_received}}</th> 
                                                    <th>{{downstream_rom_application.pressure_test_approved}}</th> 
                                                    <th>{{downstream_rom_application.tank_buried_received}}</th> 
                                                    <th>{{downstream_rom_application.tank_buried_approved}}</th> 
                                                    <th>{{downstream_rom_application.leak_detection_received}}</th> 
                                                    <th>{{downstream_rom_application.leak_detection_approved}}</th> 
                                                    <th>{{downstream_rom_application.final_inspection_received}}</th> 
                                                    <th>{{downstream_rom_application.final_inspection_approved}}</th> 
                                                    <th>{{downstream_rom_application.renewal_inspection_received}}</th> 
                                                    <th>{{downstream_rom_application.renewal_inspection_approved}}</th> 
                                                    <th>{{downstream_rom_application.vessel_license_received}}</th> 
                                                    <th>{{downstream_rom_application.vessel_license_approved}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteRomApplication(downstream_rom_application.id, 'downstream_rom_application')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addRomApplicationModal" @click="editRomApplication(downstream_rom_application)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRomApplications(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRomApplications(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="lic" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> LICENSES <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload LICENSES" style="background: #202020; color: #fff" @click="setModaleHeader('LICENSES', 'license')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="downstream_licenses" :file_name="'Licenses'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>Catigory A- New </th>
                                                    <th>Catigory A- Renewal <i class="units"></i></th>
                                                    <th>Catigory B- New <i class="units"></i></th>
                                                    <th>Catigory B- Renewal </th>
                                                    <th>Catigory C- New <i class="units"></i></th>
                                                    <th>Catigory C- Renewal <i class="units"></i></th>
                                                    <th>Total CAT A </th>
                                                    <th>Total CAT B <i class="units"></i></th>   
                                                    <th>Total CAT C <i class="units"></i></th>                                          
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addLicenseModal" data-toggle="modal" data-original-title="Enter Downstream License" @click="clearLicenseForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="downstream_license in filteredLicenses" v-bind:key="downstream_license.id">
                                                <tr>  
                                                    <th>{{downstream_license.date}}</th>
                                                    <th>{{downstream_license.week}}</th>
                                                    <th>{{downstream_license.category_a_new}}</th>
                                                    <th>{{downstream_license.category_a_renewal}}</th>
                                                    <th>{{downstream_license.category_b_new}}</th>
                                                    <th>{{downstream_license.category_b_renewal}}</th> 
                                                    <th>{{downstream_license.category_c_new}}</th> 
                                                    <th>{{downstream_license.category_c_renewal}}</th> 
                                                    <th>{{downstream_license.total_cat_a}}</th> 
                                                    <th>{{downstream_license.total_cat_b}}</th> 
                                                    <th>{{downstream_license.total_cat_c}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteLicense(downstream_license.id, 'downstream_license')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addLicenseModal" @click="editLicense(downstream_license)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchLicenses(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchLicenses(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="sur" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> SURVEILLANCE <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload SURVEILLANCE" style="background: #202020; color: #fff" @click="setModaleHeader('SURVEILLANCE', 'surveillance')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="downstream_surveillances" :file_name="'Surveillances'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>Station visited </th>
                                                    <th>Station With PMS  <i class="units"></i></th>
                                                    <th>Sealed for under Dispensing <i class="units"></i></th>
                                                    <th>Sealed for Over Pricing </th>
                                                    <th>Sealed for Hoarding <i class="units"></i></th>
                                                    <th>Sealed for Diversion <i class="units"></i></th>
                                                    <th>Sealed for Violation of seal </th>
                                                    <th>Others <i class="units"></i></th>   
                                                    <th>Total Station Sealed <i class="units"></i></th>                                          
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addSurveillanceModal" data-toggle="modal" data-original-title="Enter Downstream Surveillance" @click="clearSurveillanceForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="downstream_surveillance in filteredSurveillances" v-bind:key="downstream_surveillance.id">
                                                <tr>  
                                                    <th>{{downstream_surveillance.date}}</th>
                                                    <th>{{downstream_surveillance.week}}</th>
                                                    <th>{{downstream_surveillance.station_visited}}</th>
                                                    <th>{{downstream_surveillance.station_with_pms}}</th>
                                                    <th>{{downstream_surveillance.sealed_under_dispensing}}</th>
                                                    <th>{{downstream_surveillance.sealed_for_over_price}}</th> 
                                                    <th>{{downstream_surveillance.sealed_for_hoarding}}</th> 
                                                    <th>{{downstream_surveillance.sealed_for_diversion}}</th> 
                                                    <th>{{downstream_surveillance.sealed_for_violation_of_seal}}</th> 
                                                    <th>{{downstream_surveillance.other}}</th> 
                                                    <th>{{downstream_surveillance.total_station_sealed}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteSurveillance(downstream_surveillance.id, 'downstream_surveillance')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addSurveillanceModal" @click="editSurveillance(downstream_surveillance)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchSurveillances(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchSurveillances(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="dep" role="tabpanel">
                            <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#d_sto" role="tab" @click="globalPagination(depot_stock_data)">DEPOT STOCK LEVEL</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#d_app" role="tab" @click="globalPagination(depot_application_data)">DEPOT APPLICATIONS</a>
                                </li>
                            </ul>

                            <div class="tab-content">  
                                <div class="tab-pane p-3" id="d_sto" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> DEPOT STOCK LEVEL <span class="unit-header"> Volumns In Litres </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload DEPOT STOCK LEVEL" style="background: #202020; color: #fff" @click="setModaleHeader('DEPOT STOCK LEVEL', 'depot_stock')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="downstream_depot_stocks" :file_name="'Depot Stock Level'"></UpstreamExcelExport>
                                                
                                            </h5> 
                                                <table class="table table-striped table-sm mb-0" id="">
                                                    <thead>
                                                        <tr style="background-color: #202020; color: #fff">
                                                            <th>Date</th>
                                                            <th>Week</th>
                                                            <th>PMS Opening Stock </th>
                                                            <th>PMS Reciept </th>
                                                            <th>PMS Lifting/Tranfers </th>
                                                            <th>PMS Closing Stock </th>
                                                            <th>DPK Opening Stock </th>
                                                            <th>DPK Reciept </th>
                                                            <th>DPK Lifting/Tranfers </th>
                                                            <th>DPK Closing Stock </th>
                                                            <th>AGO Opening Stock </th>
                                                            <th>AGO Reciept </th>
                                                            <th>AGO Lifting/Tranfers </th>
                                                            <th>AGO Closing Stock </th>                                           
                                                            <th style="text-align: right"> 
                                                                <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addDepotStockModal" data-toggle="modal" data-original-title="Enter Downstream Depot Stock" @click="clearDepotStockForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody v-for="downstream_depot_stock in filteredDepotStocks" v-bind:key="downstream_depot_stock.id">
                                                        <tr>  
                                                            <th>{{downstream_depot_stock.date}}</th>
                                                            <th>{{downstream_depot_stock.week}}</th>
                                                            <th>{{downstream_depot_stock.pms_open_stock}}</th>
                                                            <th>{{downstream_depot_stock.pms_reciept}}</th>
                                                            <th>{{downstream_depot_stock.pms_lifting_transfer}}</th>
                                                            <th>{{downstream_depot_stock.pms_closing_stock}}</th> 
                                                            <th>{{downstream_depot_stock.dpk_open_stock}}</th> 
                                                            <th>{{downstream_depot_stock.dpk_reciept}}</th> 
                                                            <th>{{downstream_depot_stock.dpk_lifting_transfer}}</th> 
                                                            <th>{{downstream_depot_stock.dpk_closing_stock}}</th> 
                                                            <th>{{downstream_depot_stock.ago_open_stock}}</th> 
                                                            <th>{{downstream_depot_stock.ago_reciept}}</th> 
                                                            <th>{{downstream_depot_stock.ago_lifting_transfer}}</th> 
                                                            <th>{{downstream_depot_stock.ago_closing_stock}}</th> 
                                                            <th>  
                                                              <a class="pull-right" @click="deleteDepotStock(downstream_depot_stock.id, 'downstream_depot_stock')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                              </a>
                                                              <a class="pull-right" data-toggle="modal" data-target="#addDepotStockModal" @click="editDepotStock(downstream_depot_stock)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                              </a>
                                                            </th>  
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                  <nav aria-label="Page navigation example pull-right">
                                                      <ul class="pagination pagination-sm">
                                                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchDepotStocks(pagination.prev_page_url)">Prev</a></li>
                                                        <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchDepotStocks(pagination.next_page_url)">Next</a></li>
                                                      </ul>
                                                  </nav>

                                            </div> <!-- end col -->
                                    </p>
                                </div>  

                                <div class="tab-pane p-3" id="d_app" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> DEPOT APPLICATIONS <span class="unit-header"> Volumns In Litres </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload DEPOT APPLICATIONS" style="background: #202020; color: #fff" @click="setModaleHeader('DEPOT APPLICATIONS', 'depot_application')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="downstream_depot_applications" :file_name="'Depot Applications'"></UpstreamExcelExport>
                                                
                                            </h5> 
                                                <table class="table table-striped table-sm mb-0" id="">
                                                    <thead>
                                                        <tr style="background-color: #202020; color: #fff">
                                                            <th>Date</th>
                                                            <th>Week</th>
                                                            <th>proposal- Recei </th>
                                                            <th>Proposal- Apprv </th>
                                                            <th>Presentation- Recei </th>
                                                            <th>presentation- Approv </th>
                                                            <th>Assesment-Recei </th>
                                                            <th>Assesment-Approv </th>  
                                                            <th>ATC-Recei </th> 
                                                            <th>ATC-Approv </th> 
                                                            <th>Test-Recei </th> 
                                                            <th>Test-Approv </th> 
                                                            <th>Calibration-Recei </th> 
                                                            <th>Calibration-Approv </th> 
                                                            <th>Final Inspection-Recei </th> 
                                                            <th>Final Inspection-Approv </th> 
                                                            <th>Renewal Inspection-Recei </th> 
                                                            <th>Renewal Inspection-Approv </th> 
                                                            <th>New LTO- Recei </th> 
                                                            <th>New LTO- Approv </th> 
                                                            <th>Renewal LTO Recei </th> 
                                                            <th>Renewal LTO Approv </th> 
                                                            <th>Permit-Recei </th> 
                                                            <th>Permit-Approv </th>                                         
                                                            <th style="text-align: right"> 
                                                                <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addDepotApplicationModal" data-toggle="modal" data-original-title="Enter Downstream Depot Application" @click="clearDepotApplicationForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody v-for="downstream_depot_application in filteredDepotApplications" v-bind:key="downstream_depot_application.id">
                                                        <tr>  
                                                            <th>{{downstream_depot_application.date}}</th>
                                                            <th>{{downstream_depot_application.week}}</th>
                                                            <th>{{downstream_depot_application.proposal_received}}</th>
                                                            <th>{{downstream_depot_application.proposal_approved}}</th>
                                                            <th>{{downstream_depot_application.presentation_received}}</th>
                                                            <th>{{downstream_depot_application.presentation_approved}}</th>
                                                            <th>{{downstream_depot_application.assessment_received}}</th>
                                                            <th>{{downstream_depot_application.assessment_approved}}</th> 
                                                            <th>{{downstream_depot_application.atc_received}}</th> 
                                                            <th>{{downstream_depot_application.atc_approved}}</th> 
                                                            <th>{{downstream_depot_application.presure_test_received}}</th> 
                                                            <th>{{downstream_depot_application.presure_test_approved}}</th> 
                                                            <th>{{downstream_depot_application.calibration_received}}</th> 
                                                            <th>{{downstream_depot_application.calibration_approved}}</th> 
                                                            <th>{{downstream_depot_application.final_inspection_received}}</th> 
                                                            <th>{{downstream_depot_application.final_inspection_approved}}</th> 
                                                            <th>{{downstream_depot_application.renewal_inspection_received}}</th> 
                                                            <th>{{downstream_depot_application.renewal_inspection_approved}}</th> 
                                                            <th>{{downstream_depot_application.new_lto_received}}</th> 
                                                            <th>{{downstream_depot_application.new_lto_approved}}</th> 
                                                            <th>{{downstream_depot_application.renewal_lto_received}}</th> 
                                                            <th>{{downstream_depot_application.renewal_lto_approved}}</th> 
                                                            <th>{{downstream_depot_application.import_permit_received}}</th> 
                                                            <th>{{downstream_depot_application.import_permit_approved}}</th> 
                                                            <th>
                                                              <a class="pull-right" @click="deleteDepotApplication(downstream_depot_application.id, 'downstream_depot_application')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                              </a>
                                                              <a class="pull-right" data-toggle="modal" data-target="#addDepotApplicationModal" @click="editDepotApplication(downstream_depot_application)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                              </a>
                                                            </th>  
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                  <nav aria-label="Page navigation example pull-right">
                                                      <ul class="pagination pagination-sm">
                                                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchDepotApplications(pagination.prev_page_url)">Prev</a></li>
                                                        <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchDepotApplications(pagination.next_page_url)">Next</a></li>
                                                      </ul>
                                                  </nav>

                                            </div> <!-- end col -->
                                    </p>
                                </div> 
                            </div> 








                            
                        </div>

                        <div class="tab-pane p-3" id="pro" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> PRODUCT IMPORT <span class="unit-header"> Volumns In Litres </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload PRODUCT IMPORT" style="background: #202020; color: #fff" @click="setModaleHeader('PRODUCT IMPORT', 'product_import')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="downstream_product_imports" :file_name="'Product Import'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>PMS </th>
                                                    <th>HHK </th>
                                                    <th>AGO </th>
                                                    <th>ATK </th>                                          
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addProductImportModal" data-toggle="modal" data-original-title="Enter Downstream Depot Stock" @click="clearProductImportForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody v-for="downstream_product_import in filteredProductImports" v-bind:key="downstream_product_import.id">
                                                <tr>  
                                                    <th>{{downstream_product_import.date}}</th>
                                                    <th>{{downstream_product_import.week}}</th>
                                                    <th>{{downstream_product_import.pms}}</th>
                                                    <th>{{downstream_product_import.hhk}}</th>
                                                    <th>{{downstream_product_import.ago}}</th>
                                                    <th>{{downstream_product_import.atk}}</th> 
                                                    <th>
                                                      <a class="pull-right" @click="deleteProductImport(downstream_product_import.id, 'downstream_product_import')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addProductImportModal" @click="editProductImport(downstream_product_import)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchProductImports(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchProductImports(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                </div> <!-- end col -->
                            </p>
                        </div>



                        <div class="tab-pane p-3" id="ref_prod" role="tabpanel" style="">
                            
                            <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#krcp" role="tab" @click="globalPagination(krpc_data)">Kaduna Refinery (KRPC)</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#wrcp" role="tab" @click="globalPagination(wrpc_data)">Warri Refinery (WRPC)</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#phrc" role="tab" @click="globalPagination(phrc_data)">Port Harcourt Refinery (Old / New)</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#total" role="tab" @click="globalPagination(total_data)">Refinery Total</a>
                                </li>
                            </ul>

                            <div class="tab-content">  
                                <div class="tab-pane p-3" id="krcp" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> Kaduna Refinery (KRPC) <span class="unit-header"> Volumns In Litres </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload Kaduna Refinery (KRPC)" style="background: #202020; color: #fff" @click="setModaleHeader('Kaduna Refinery (KRPC)', 'refinery_krpc')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="downstream_refinery_krpcs" :file_name="'Kaduna Refinery KRPC'"></UpstreamExcelExport>
                                                
                                            </h5> 
                                                <table class="table table-striped table-sm mb-0" id="">
                                                    <thead>
                                                        <tr style="background-color: #202020; color: #fff">
                                                            <th>Date</th>
                                                            <th>Week</th>
                                                            <th>PMS </th>
                                                            <th>HHK </th>
                                                            <th>AGO </th>
                                                            <th>ATK </th>  
                                                            <th>FUEL OIL </th>                                         
                                                            <th style="text-align: right"> 
                                                                <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addRefineryKRPCModal" data-toggle="modal" data-original-title="Enter Downstream Refinery (KRPC)" @click="clearRefineryKRPCForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody v-for="downstream_refinery_krpc in filteredRefineryKRPCs" v-bind:key="downstream_refinery_krpc.id">
                                                        <tr>  
                                                            <th>{{downstream_refinery_krpc.date}}</th>
                                                            <th>{{downstream_refinery_krpc.week}}</th>
                                                            <th>{{downstream_refinery_krpc.pms}}</th>
                                                            <th>{{downstream_refinery_krpc.hhk}}</th>
                                                            <th>{{downstream_refinery_krpc.ago}}</th>
                                                            <th>{{downstream_refinery_krpc.atk}}</th> 
                                                            <th>{{downstream_refinery_krpc.fuel_oil}}</th> 
                                                            <th>
                                                              <a class="pull-right" @click="deleteRefineryKRPC(downstream_refinery_krpc.id, 'downstream_refinery_krpc')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                              </a>
                                                              <a class="pull-right" data-toggle="modal" data-target="#addRefineryKRPCModal" @click="editRefineryKRPC(downstream_refinery_krpc)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                              </a>
                                                            </th>  
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                  <nav aria-label="Page navigation example pull-right">
                                                      <ul class="pagination pagination-sm">
                                                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRefineryKRPCs(pagination.prev_page_url)">Prev</a></li>
                                                        <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRefineryKRPCs(pagination.next_page_url)">Next</a></li>
                                                      </ul>
                                                  </nav>

                                            </div> <!-- end col -->
                                    </p>
                                </div>  

                                <div class="tab-pane p-3" id="wrcp" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> Warri Refinery (KRPC) <span class="unit-header"> Volumns In Litres </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload Warri Refinery (KRPC)" style="background: #202020; color: #fff" @click="setModaleHeader('Warri Refinery (KRPC)', 'refinery_wrpc')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="downstream_refinery_wrpcs" :file_name="'Warri Refinery KRPC'"></UpstreamExcelExport>
                                                
                                            </h5> 
                                                <table class="table table-striped table-sm mb-0" id="">
                                                    <thead>
                                                        <tr style="background-color: #202020; color: #fff">
                                                            <th>Date</th>
                                                            <th>Week</th>
                                                            <th>PMS </th>
                                                            <th>HHK </th>
                                                            <th>AGO </th>
                                                            <th>ATK </th>  
                                                            <th>FUEL OIL </th>                                         
                                                            <th style="text-align: right"> 
                                                                <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addRefineryWRPCModal" data-toggle="modal" data-original-title="Enter Downstream Refinery (WRPC)" @click="clearRefineryWRPCForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody v-for="downstream_refinery_wrpc in filteredRefineryWRPCs" v-bind:key="downstream_refinery_wrpc.id">
                                                        <tr>  
                                                            <th>{{downstream_refinery_wrpc.date}}</th>
                                                            <th>{{downstream_refinery_wrpc.week}}</th>
                                                            <th>{{downstream_refinery_wrpc.pms}}</th>
                                                            <th>{{downstream_refinery_wrpc.hhk}}</th>
                                                            <th>{{downstream_refinery_wrpc.ago}}</th>
                                                            <th>{{downstream_refinery_wrpc.atk}}</th> 
                                                            <th>{{downstream_refinery_wrpc.fuel_oil}}</th> 
                                                            <th>
                                                              <a class="pull-right" @click="deleteRefineryWRPC(downstream_refinery_wrpc.id, 'downstream_refinery_wrpc')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                              </a>
                                                              <a class="pull-right" data-toggle="modal" data-target="#addRefineryWRPCModal" @click="editRefineryWRPC(downstream_refinery_wrpc)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                              </a>
                                                            </th>  
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                  <nav aria-label="Page navigation example pull-right">
                                                      <ul class="pagination pagination-sm">
                                                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRefineryWRPCs(pagination.prev_page_url)">Prev</a></li>
                                                        <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRefineryWRPCs(pagination.next_page_url)">Next</a></li>
                                                      </ul>
                                                  </nav>

                                            </div> <!-- end col -->
                                    </p>
                                </div> 

                                <div class="tab-pane p-3" id="phrc" role="tabpanel">
                                    <p class="font-14 mb-0 row">
                                        <div class="table-responsive col-md-6 pull-left">   
                                            <h5 style="margin-left: 5px; color: #aaa">Old Port Harcourt Refinery <span class="unit-header"> Volumns In Litres </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload Old Port Harcourt Refinery" style="background: #202020; color: #fff" @click="setModaleHeader('Old Port Harcourt Refinery', 'refinery_phrc_old')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="downstream_refinery_phrcs" :file_name="'Old Port Harcourt Refinery'"></UpstreamExcelExport>
                                                
                                            </h5> 
                                                <table class="table table-striped table-sm mb-0" id="">
                                                    <thead>
                                                        <tr style="background-color: #202020; color: #fff">
                                                            <th>Date</th>
                                                            <th>Week</th>
                                                            <th>Refinery</th>
                                                            <th>PMS </th>
                                                            <th>HHK </th>
                                                            <th>AGO </th>
                                                            <th>ATK </th>  
                                                            <th>FUEL OIL </th>                                         
                                                            <th style="text-align: right"> 
                                                                <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addRefineryPHRCModal" data-toggle="modal" data-original-title="Enter Downstream Refinery (PHRC)" @click="clearRefineryPHRCForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody v-for="downstream_refinery_phrc in filteredRefineryPHRCs" v-bind:key="downstream_refinery_phrc.id">
                                                        <tr>  
                                                            <th>{{downstream_refinery_phrc.date}}</th>
                                                            <th>{{downstream_refinery_phrc.week}}</th>
                                                            <th v-if="downstream_refinery_phrc.type_id === 1"> Old Refinery </th>
                                                            <th v-else-if="downstream_refinery_phrc.type_id === 2"> New Refinery</th>
                                                            <th v-else> Null </th>
                                                            <th>{{downstream_refinery_phrc.pms}}</th>
                                                            <th>{{downstream_refinery_phrc.hhk}}</th>
                                                            <th>{{downstream_refinery_phrc.ago}}</th>
                                                            <th>{{downstream_refinery_phrc.atk}}</th> 
                                                            <th>{{downstream_refinery_phrc.fuel_oil}}</th> 
                                                            <th>
                                                              <a class="pull-right" @click="deleteRefineryPHRC(downstream_refinery_phrc.id, 'downstream_refinery_phrc')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                              </a>
                                                              <a class="pull-right" data-toggle="modal" data-target="#addRefineryPHRCModal" @click="editRefineryPHRC(downstream_refinery_phrc)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                              </a>
                                                            </th>  
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                  <nav aria-label="Page navigation example pull-right">
                                                      <ul class="pagination pagination-sm">
                                                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRefineryPHRCs(pagination.prev_page_url)">Prev</a></li>
                                                        <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRefineryPHRCs(pagination.next_page_url)">Next</a></li>
                                                      </ul>
                                                  </nav>

                                            </div> <!-- end col -->

                                        <div class="table-responsive col-md-6 pull-left">   
                                            <h5 style="margin-left: 5px; color: #aaa"> New Port Harcourt Refinery <span class="unit-header"> Volumns In Litres </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload New Port Harcourt Refinery" style="background: #202020; color: #fff" @click="setModaleHeader('New Port Harcourt Refinery', refinery_phrc_new)">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="downstream_refinery_phrc_news" :file_name="'New Port Harcourt Refinery'"></UpstreamExcelExport>
                                                
                                            </h5> 
                                                <table class="table table-striped table-sm mb-0" id="">
                                                    <thead>
                                                        <tr style="background-color: #202020; color: #fff">
                                                            <th>Date</th>
                                                            <th>Week</th>
                                                            <th>Refinery</th>
                                                            <th>PMS </th>
                                                            <th>HHK </th>
                                                            <th>AGO </th>
                                                            <th>ATK </th>  
                                                            <th>FUEL OIL </th>                                         
                                                            <th style="text-align: right"> 
                                                                <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addRefineryPHRCModal" data-toggle="modal" data-original-title="Enter Downstream Refinery (new PHRC)" @click="clearRefineryPHRCForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody v-for="downstream_refinery_phrc_new in filteredRefineryPHRCNews" v-bind:key="downstream_refinery_phrc_new.id">
                                                        <tr>  
                                                            <th>{{downstream_refinery_phrc_new.date}}</th>
                                                            <th>{{downstream_refinery_phrc_new.week}}</th>
                                                            <th v-if="downstream_refinery_phrc_new.type_id === 1"> Old Refinery </th>
                                                            <th v-else-if="downstream_refinery_phrc_new.type_id === 2"> New Refinery</th>
                                                            <th v-else> Null </th>
                                                            <th>{{downstream_refinery_phrc_new.pms}}</th>
                                                            <th>{{downstream_refinery_phrc_new.hhk}}</th>
                                                            <th>{{downstream_refinery_phrc_new.ago}}</th>
                                                            <th>{{downstream_refinery_phrc_new.atk}}</th> 
                                                            <th>{{downstream_refinery_phrc_new.fuel_oil}}</th> 
                                                            <th>
                                                              <a class="pull-right" @click="deleteRefineryPHRC(downstream_refinery_phrc_new.id, 'downstream_refinery_phrc_new')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                              </a>
                                                              <a class="pull-right" data-toggle="modal" data-target="#addRefineryPHRCModal" @click="editRefineryPHRC(downstream_refinery_phrc_new)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                              </a>
                                                            </th>  
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                  <nav aria-label="Page navigation example pull-right">
                                                      <ul class="pagination pagination-sm">
                                                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRefineryPHRCs(pagination.prev_page_url)">Prev</a></li>
                                                        <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRefineryPHRCs(pagination.next_page_url)">Next</a></li>
                                                      </ul>
                                                  </nav>

                                            </div> <!-- end col -->
                                    </p>
                                </div>   

                                <div class="tab-pane p-3" id="total" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> Refinery Total <span class="unit-header"> Volumns In Litres </span>
                                        
                                        <UpstreamExcelExport :data="downstream_refinery_totals" :file_name="'Total Refinery '"></UpstreamExcelExport>
                                                
                                            </h5> 
                                                <table class="table table-striped table-sm mb-0" id="">
                                                    <thead>
                                                        <tr style="background-color: #202020; color: #fff">
                                                            <th>Year</th>
                                                            <th>Week</th>
                                                            <th>Total PMS </th>
                                                            <th>Total HHK </th>
                                                            <th>Total AGO </th>
                                                            <th>Total ATK </th>  
                                                            <th>Total FUEL OIL </th>  
                                                            <th> </th>  
                                                        </tr>
                                                    </thead>                                                   
                                                    <tbody v-for="downstream_refinery_total in downstream_refinery_totals" v-bind:key="downstream_refinery_total.id">
                                                        <tr>  
                                                            <th>{{downstream_refinery_total.date}}</th>
                                                            <th>{{downstream_refinery_total.week}}</th>
                                                            <th>{{downstream_refinery_total.pms}}</th>
                                                            <th>{{downstream_refinery_total.hhk}}</th>
                                                            <th>{{downstream_refinery_total.ago}}</th>
                                                            <th>{{downstream_refinery_total.atk}}</th> 
                                                            <th>{{downstream_refinery_total.fuel_oil}}</th> 
                                                            <th>    </th>  
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                  <nav aria-label="Page navigation example pull-right">
                                                      <ul class="pagination pagination-sm">
                                                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRefineryTotals(pagination.prev_page_url)">Prev</a></li>
                                                        <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRefineryTotals(pagination.next_page_url)">Next</a></li>
                                                      </ul>
                                                  </nav>

                                                  

                                            </div> <!-- end col -->
                                    </p>
                                </div>
                            </div> 
                        </div>


                        <div class="tab-pane p-3" id="ref_perf" role="tabpanel">

                            <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#perf_util" role="tab" @click="globalPagination(ref_utilization_data)">Refinery Performance Utilization</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#perf_tot" role="tab" @click="globalPagination(ref_utilization_total_data)">Total</a>
                                </li>
                            </ul>

                            <div class="tab-content">  
                                <div class="tab-pane p-3" id="perf_util" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> REFINERY PERFORMANCE/CAPACITY UTILIZATION <span class="unit-header"> Volumns In Litres </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload REFINERY PERFORMANCE/CAPACITY UTILIZATION" style="background: #202020; color: #fff" @click="setModaleHeader('REFINERY PERFORMANCE/CAPACITY UTILIZATION', 'refinery_performance_utilization')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="downstream_refinery_performance_utilizations" :file_name="'Refinery Perf Util'"></UpstreamExcelExport>
                                                
                                            </h5> 
                                                <table class="table table-striped table-sm mb-0" id="">
                                                    <thead>
                                                        <tr style="background-color: #202020; color: #fff">
                                                            <th>Date</th>
                                                            <th>Week</th>
                                                            <th>Refinery </th>  
                                                            <th>Install Capacity (BPSD) </th>
                                                            <th>Opening Stock </th>
                                                            <th>Crude Receipt </th>
                                                            <th>Crude Processed </th>    
                                                            <th>Closing Stock </th>   
                                                            <th>Capacity Utilisation % </th>                                        
                                                            <th style="text-align: right"> 
                                                                <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addRefineryPerformanceUtilizationModal" data-toggle="modal" data-original-title="Enter Downstream Depot Stock" @click="clearRefineryPerformanceUtilizationForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody v-for="downstream_refinery_performance_utilization in filteredRefineryPerformanceUtilizations" v-bind:key="downstream_refinery_performance_utilization.id">
                                                        <tr>  
                                                            <th>{{downstream_refinery_performance_utilization.date}}</th>
                                                            <th>{{downstream_refinery_performance_utilization.week}}</th>
                                                            <th>{{downstream_refinery_performance_utilization.refinery.plant_location_name}}</th>
                                                            <th>{{downstream_refinery_performance_utilization.install_capacity}}</th>
                                                            <th>{{downstream_refinery_performance_utilization.opening_stock}}</th>
                                                            <th>{{downstream_refinery_performance_utilization.crude_receipt}}</th>
                                                            <th>{{downstream_refinery_performance_utilization.crude_processed}}</th>
                                                            <th>{{downstream_refinery_performance_utilization.closing_stock}}</th> 
                                                            <th>{{downstream_refinery_performance_utilization.capacity_utilization}}</th>
                                                            <th> 
                                                              <a class="pull-right" @click="deleteRefineryPerformanceUtilization(downstream_refinery_performance_utilization.id, 'downstream_refinery_performance_utilization')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                              </a>
                                                              <a class="pull-right" data-toggle="modal" data-target="#addRefineryPerformanceUtilizationModal" @click="editRefineryPerformanceUtilization(downstream_refinery_performance_utilization)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                              </a>
                                                            </th>  
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                  <nav aria-label="Page navigation example pull-right">
                                                      <ul class="pagination pagination-sm">
                                                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRefineryPerformanceUtilizations(pagination.prev_page_url)">Prev</a></li>
                                                        <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRefineryPerformanceUtilizations(pagination.next_page_url)">Next</a></li>
                                                      </ul>
                                                  </nav>

                                            </div> <!-- end col -->
                                    </p>
                                </div>  

                                <div class="tab-pane p-3" id="perf_tot" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> REFINERY PERFORMANCE/CAPACITY UTILIZATION TOTAL <span class="unit-header"> Volumns In Litres </span>
                                        
                                        <UpstreamExcelExport :data="downstream_refinery_performance_utilization_totals" :file_name="'Refinery Perf Util Total'"></UpstreamExcelExport>
                                                
                                            </h5> 
                                                <table class="table table-striped table-sm mb-0" id="">
                                                    <thead>
                                                        <tr style="background-color: #202020; color: #fff">
                                                            <th>Year</th>
                                                            <th>Week</th>
                                                            <th>Refinery </th>  
                                                            <th>Install Capacity (BPSD) </th>
                                                            <th>Opening Stock </th>
                                                            <th>Crude Receipt </th>
                                                            <th>Crude Processed </th>    
                                                            <th>Closing Stock </th>   
                                                            <th>Capacity Utilisation % </th>                                        
                                                            <th style="text-align: right"> </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody v-for="downstream_refinery_performance_utilization_total in downstream_refinery_performance_utilization_totals" v-bind:key="downstream_refinery_performance_utilization_total.id">
                                                        <tr>  
                                                            <th>{{downstream_refinery_performance_utilization_total.date}}</th>
                                                            <th>{{downstream_refinery_performance_utilization_total.week}}</th>
                                                            <th>{{downstream_refinery_performance_utilization_total.refinery.plant_location_name}}</th>
                                                            <th>{{downstream_refinery_performance_utilization_total.install_capacity}}</th>
                                                            <th>{{downstream_refinery_performance_utilization_total.opening_stock}}</th>
                                                            <th>{{downstream_refinery_performance_utilization_total.crude_receipt}}</th>
                                                            <th>{{downstream_refinery_performance_utilization_total.crude_processed}}</th>
                                                            <th>{{downstream_refinery_performance_utilization_total.closing_stock}}</th> 
                                                            <th>{{downstream_refinery_performance_utilization_total.capacity_utilization}}</th>
                                                            <th>  </th>  
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                  <nav aria-label="Page navigation example pull-right">
                                                      <ul class="pagination pagination-sm">
                                                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRefineryPerformanceUtilizationTotals(pagination.prev_page_url)">Prev</a></li>
                                                        <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRefineryPerformanceUtilizationTotals(pagination.next_page_url)">Next</a></li>
                                                      </ul>
                                                  </nav>

                                            </div> <!-- end col -->
                                    </p>
                                </div> 
                            </div>

                        </div>

                        <div class="tab-pane p-3" id="t_out" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> DEPOT TRUCK OUT <span class="unit-header"> Volumns In Litres </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload DEPOT TRUCK OUT" style="background: #202020; color: #fff" @click="setModaleHeader('DEPOT TRUCK OUT', 'truck_out')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="downstream_truck_outs" :file_name="'Depot Truck Out'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>PMS </th>
                                                    <th>HHK </th>
                                                    <th>AGO </th>
                                                    <th>ATK </th>                                          
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addTruckOutModal" data-toggle="modal" data-original-title="Enter Downstream Depot Stock" @click="clearTruckOutForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="downstream_truck_out in filteredTruckOuts" v-bind:key="downstream_truck_out.id">
                                                <tr>  
                                                    <th>{{downstream_truck_out.date}}</th>
                                                    <th>{{downstream_truck_out.week}}</th>
                                                    <th>{{downstream_truck_out.pms}}</th>
                                                    <th>{{downstream_truck_out.hhk}}</th>
                                                    <th>{{downstream_truck_out.ago}}</th>
                                                    <th>{{downstream_truck_out.atk}}</th> 
                                                    <th>
                                                      <a class="pull-right" @click="deleteTruckOut(downstream_truck_out.id, 'downstream_truck_out')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addTruckOutModal" @click="editTruckOut(downstream_truck_out)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchTruckOuts(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchTruckOuts(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div>

                        <div class="tab-pane p-3" id="seg" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> DEPOT TRUCK OUT MARKET SEGMENT <span class="unit-header"> Volumns In Litres </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload DEPOT TRUCK OUT MARKET SEGMENT" style="background: #202020; color: #fff" @click="setModaleHeader('DEPOT TRUCK OUT MARKET SEGMENT', 'truck_out_marketer')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="downstream_truck_out_marketers" :file_name="'Depot Truck Market Segment'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>MARKET SEGMENT </th>
                                                    <th>PMS </th>
                                                    <th>DPK </th>
                                                    <th>AGO </th>                                          
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addTruckOutMarketerModal" data-toggle="modal" data-original-title="Enter Downstream Depot Truck Out Market Segment" @click="clearTruckOutMarketerForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="downstream_truck_out_marketer in filteredTruckOutMarketers" v-bind:key="downstream_truck_out_marketer.id">
                                                <tr>  
                                                    <th>{{downstream_truck_out_marketer.date}}</th>
                                                    <th>{{downstream_truck_out_marketer.week}}</th>
                                                    <th>{{downstream_truck_out_marketer.segment.market_segment_name}}</th> 
                                                    <th>{{downstream_truck_out_marketer.pms}}</th>
                                                    <th>{{downstream_truck_out_marketer.dpk}}</th>
                                                    <th>{{downstream_truck_out_marketer.ago}}</th>
                                                    <th>
                                                      <a class="pull-right" @click="deleteTruckOutMarketer(downstream_truck_out_marketer.id, 'downstream_truck_out_marketer')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addTruckOutMarketerModal" @click="editTruckOutMarketer(downstream_truck_out_marketer)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchTruckOutMarketers(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchTruckOutMarketers(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div>


                        <div class="tab-pane p-3" id="ops" role="tabpanel">

                            <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#term_ops" role="tab" @click="globalPagination(ops_terminal_data)">TERMINAL OPERATION</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#ops_app" role="tab" @click="globalPagination(ops_application_data)">OPERATION APPLICATION</a>
                                </li>
                            </ul>

                            <div class="tab-content">  
                                <div class="tab-pane p-3" id="term_ops" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> CRUDE OIL TERMINAL OPERATION <span class="unit-header"> Volumns In Bbls </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload CRUDE OIL TERMINAL OPERATION" style="background: #202020; color: #fff" @click="setModaleHeader('CRUDE OIL TERMINAL OPERATION', 'terminal_operation')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="downstream_terminal_operations" :file_name="'Oil Terminal Operation'"></UpstreamExcelExport>
                                                
                                            </h5> 
                                                <table class="table table-striped table-sm mb-0" id="">
                                                    <thead>
                                                        <tr style="background-color: #202020; color: #fff">
                                                            <th>Date</th>
                                                            <th>Week</th>
                                                            <th>Crude oil and condensate production(bbls) </th>  
                                                            <th>Crude Oil and condensate Export(Bbls) </th>
                                                            <th>Refinery Supply(Bbls) </th>                                      
                                                            <th style="text-align: right"> 
                                                                <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addTerminalOperationModal" data-toggle="modal" data-original-title="Enter Downstream Terminal Operation" @click="clearTerminalOperationForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody v-for="downstream_terminal_operation in filteredTerminalOperations" v-bind:key="downstream_terminal_operation.id">
                                                        <tr>  
                                                            <th>{{downstream_terminal_operation.date}}</th>
                                                            <th>{{downstream_terminal_operation.week}}</th>
                                                            <th>{{downstream_terminal_operation.oil_condensate_production}}</th>
                                                            <th>{{downstream_terminal_operation.oil_condensate_export}}</th>
                                                            <th>{{downstream_terminal_operation.refinery_supply}}</th>
                                                            <th> 
                                                              <a class="pull-right" @click="deleteTerminalOperation(downstream_terminal_operation.id, 'downstream_terminal_operation')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                              </a>
                                                              <a class="pull-right" data-toggle="modal" data-target="#addTerminalOperationModal" @click="editTerminalOperation(downstream_terminal_operation)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                              </a>
                                                            </th>  
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                  <nav aria-label="Page navigation example pull-right">
                                                      <ul class="pagination pagination-sm">
                                                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchTerminalOperations(pagination.prev_page_url)">Prev</a></li>
                                                        <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchTerminalOperations(pagination.next_page_url)">Next</a></li>
                                                      </ul>
                                                  </nav>

                                            </div> <!-- end col -->
                                    </p>
                                </div>  

                                <div class="tab-pane p-3" id="ops_app" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> CRUDE OIL TERMINAL OPERATION APPLICATION <span class="unit-header"> Volumns In Litres </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload CRUDE OIL TERMINAL OPERATION APPLICATION" style="background: #202020; color: #fff" @click="setModaleHeader('CRUDE OIL TERMINAL OPERATION APPLICATION', 'terminal_operation_application')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="downstream_terminal_operation_applications" :file_name="'Terminal Operation Application'"></UpstreamExcelExport>
                                                
                                            </h5> 
                                                <table class="table table-striped table-sm mb-0" id="">
                                                    <thead>
                                                        <tr style="background-color: #202020; color: #fff">
                                                            <th>Date</th>
                                                            <th>Week</th>
                                                            <th>Permits Rec</th>  
                                                            <th>Permits App</th>
                                                            <th>Establishment-Rec</th>  
                                                            <th>Establishment-App</th>  
                                                            <th>Trucking-Rec</th>  
                                                            <th>Trucking-App</th>  
                                                            <th>Barging-Rec</th>  
                                                            <th>Barging-App</th>  
                                                            <th>Tank Calib-Rec</th>  
                                                            <th>Tank Calib-App</th>  
                                                            <th>Meter Calib-Rec</th>  
                                                            <th>Meter Calib-App</th>  
                                                            <th>Instrument Calib-Rec</th>  
                                                            <th>Instrument Calib-App</th>                                       
                                                            <th style="text-align: right"> 
                                                                <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addTerminalOperationApplicationModal" data-toggle="modal" data-original-title="Enter Downstream Terminal Operation Application" @click="clearTerminalOperationApplicationForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                            </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody v-for="downstream_terminal_operation_application in filteredTerminalOperationApplications" v-bind:key="downstream_terminal_operation_application.id">
                                                        <tr>  
                                                            <th>{{downstream_terminal_operation_application.date}}</th>
                                                            <th>{{downstream_terminal_operation_application.week}}</th>
                                                            <th>{{downstream_terminal_operation_application.export_permit_received}}</th>
                                                            <th>{{downstream_terminal_operation_application.export_permit_approved}}</th>
                                                            <th>{{downstream_terminal_operation_application.establishment_received}}</th>
                                                            <th>{{downstream_terminal_operation_application.establishment_approved}}</th>
                                                            <th>{{downstream_terminal_operation_application.suttle_trucking_received}}</th>
                                                            <th>{{downstream_terminal_operation_application.suttle_trucking_approved}}</th>
                                                            <th>{{downstream_terminal_operation_application.suttle_bargingreceived}}</th>
                                                            <th>{{downstream_terminal_operation_application.suttle_bargingapproved}}</th>
                                                            <th>{{downstream_terminal_operation_application.tank_calibration_received}}</th>
                                                            <th>{{downstream_terminal_operation_application.tank_calibration_approved}}</th>
                                                            <th>{{downstream_terminal_operation_application.calibration_proving_received}}</th>
                                                            <th>{{downstream_terminal_operation_application.calibration_proving_approved}}</th>
                                                            <th>{{downstream_terminal_operation_application.instrument_calibration_received}}</th>
                                                            <th>{{downstream_terminal_operation_application.instrument_calibration_approved}}</th>
                                                            <th> 
                                                              <a class="pull-right" @click="deleteTerminalOperationApplication(downstream_terminal_operation_application.id, 'downstream_terminal_operation_application')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                              </a>
                                                              <a class="pull-right" data-toggle="modal" data-target="#addTerminalOperationApplicationModal" @click="editTerminalOperationApplication(downstream_terminal_operation_application)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                              </a>
                                                            </th>  
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                  <nav aria-label="Page navigation example pull-right">
                                                      <ul class="pagination pagination-sm">
                                                        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchTerminalOperationApplications(pagination.prev_page_url)">Prev</a></li>
                                                        <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchTerminalOperationApplications(pagination.next_page_url)">Next</a></li>
                                                      </ul>
                                                  </nav>

                                            </div> <!-- end col -->
                                    </p>
                                </div> 
                            </div>

                        </div>





                    </div>

                </div>
            </div>
        </div>











        <!-- Add DOWNSTREAM ROM APPLICATION modal -->
        <form @submit.prevent="addRomApplication" class="form-horizontal">
            <div id="addRomApplicationModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit DOWNSTREAM ROM APPLICATION':'Add DOWNSTREAM ROM APPLICATION' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="downstream_rom_application.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="downstream_rom_application.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_rom_application.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Suitability Insp-Received</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="downstream_rom_application.suitability_inspection_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Suitability Insp-Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_rom_application.suitability_inspection_approved" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATC- Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_rom_application.atc_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">ATC- Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_rom_application.atc_approved" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Pressure test -Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_rom_application.pressure_test_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Pressure test -Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_rom_application.pressure_test_approved" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Tank Burial- Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_rom_application.tank_buried_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Tank Burial- Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_rom_application.tank_buried_approved" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Leak Test- Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_rom_application.leak_detection_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Leak Test- Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_rom_application.leak_detection_approved" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Final insp -Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_rom_application.final_inspection_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Final insp -Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_rom_application.final_inspection_approved" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Renewal insp- Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_rom_application.renewal_inspection_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Renewal insp- Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_rom_application.renewal_inspection_approved" required>
                        </div>
                      </div>    

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Vessel License- Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_rom_application.vessel_license_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Vessel License- Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_rom_application.vessel_license_approved" required>
                        </div>
                      </div>                                  


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add ROM APPLICATION' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add DOWNSTREAM LICENSE modal -->
        <form @submit.prevent="addLicense" class="form-horizontal">
            <div id="addLicenseModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit DOWNSTREAM LICENSE':'Add DOWNSTREAM LICENSE' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="downstream_license.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="downstream_license.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_license.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Catigory A- New</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="downstream_license.category_a_new" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Catigory A- Renewal</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_license.category_a_renewal" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Catigory B- New</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_license.category_b_new" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Catigory B- Renewal</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_license.category_b_renewal" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Catigory C- New</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_license.category_c_new" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Catigory C- Renewal</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_license.category_c_renewal" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total CAT A</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_license.total_cat_a" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total CAT B</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_license.total_cat_b" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total CAT C</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_license.total_cat_c" required>
                        </div>
                      </div> 



                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add License' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add DOWNSTREAM SURVEILLANCE modal -->
        <form @submit.prevent="addSurveillance" class="form-horizontal">
            <div id="addSurveillanceModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit DOWNSTREAM SURVEILLANCE':'Add DOWNSTREAM SURVEILLANCE' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="downstream_surveillance.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="downstream_surveillance.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_surveillance.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> station visited</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="downstream_surveillance.station_visited" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Station With PMS</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_surveillance.station_with_pms" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sealed for under Dispensing</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_surveillance.sealed_under_dispensing" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sealed for Over Pricing</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_surveillance.sealed_for_over_price" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sealed for Hoarding</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_surveillance.sealed_for_hoarding" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sealed for Diversion</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_surveillance.sealed_for_diversion" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sealed for Violation of seal</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_surveillance.sealed_for_violation_of_seal" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Others</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_surveillance.other" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total Station Sealed</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_surveillance.total_station_sealed" required>
                        </div>
                      </div> 



                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Surveillance' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add DOWNSTREAM DEPOT STOCK modal -->
        <form @submit.prevent="addDepotStock" class="form-horizontal">
            <div id="addDepotStockModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit DOWNSTREAM DEPOT STOCK':'Add DOWNSTREAM DEPOT STOCK' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="downstream_depot_stock.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="downstream_depot_stock.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_depot_stock.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS Opening Stock -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="downstream_depot_stock.pms_open_stock" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">PMS Reciept -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_stock.pms_reciept" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">PMS Lifting/Tranfers -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_stock.pms_lifting_transfer" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">PMS Closing Stock -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_stock.pms_closing_stock" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">DPK Opening Stock -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_stock.dpk_open_stock" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">DPK Reciept -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_stock.dpk_reciept" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">DPK Lifting/Tranfers -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_stock.dpk_lifting_transfer" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">DPK Closing Stock -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_stock.dpk_closing_stock" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO Opening Stock -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_stock.ago_open_stock" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO Reciept -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_stock.ago_reciept" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO Lifting/Tranfers -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_stock.ago_lifting_transfer" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO Closing Stock -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_stock.ago_closing_stock" required>
                        </div>
                      </div> 



                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Depot Stock' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add DOWNSTREAM DEPOT Application modal -->
        <form @submit.prevent="addDepotApplication" class="form-horizontal">
            <div id="addDepotApplicationModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit DOWNSTREAM DEPOT Application':'Add DOWNSTREAM DEPOT Application' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="downstream_depot_application.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="downstream_depot_application.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_depot_application.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">proposal Received</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="downstream_depot_application.proposal_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Proposal Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_application.proposal_approved" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Presentation Received</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="downstream_depot_application.presentation_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">presentation Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_application.presentation_approved" required>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Assesment Received</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="downstream_depot_application.assessment_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Assesment Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_application.assessment_approved" required>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATC Received</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="downstream_depot_application.atc_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">ATC Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_application.atc_approved" required>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Test Received</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="downstream_depot_application.presure_test_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Test Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_application.presure_test_approved" required>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Calibration Received</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="downstream_depot_application.calibration_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Calibration Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_application.calibration_approved" required>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Final Inspection Received</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="downstream_depot_application.final_inspection_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Final Inspection Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_application.final_inspection_approved" required>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Renewal Inspection Received</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="downstream_depot_application.renewal_inspection_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Renewal Inspection Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_application.renewal_inspection_approved" required>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">New LTO Received</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="downstream_depot_application.new_lto_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">New LTO Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_application.new_lto_approved" required>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Renewal LTO Received</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="downstream_depot_application.renewal_lto_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Renewal LTO Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_application.renewal_lto_approved" required>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Permit Received</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="downstream_depot_application.import_permit_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Permit Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_depot_application.import_permit_approved" required>
                        </div>
                      </div> 

                      



                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Depot Application' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add DOWNSTREAM PRODUCT IMPORT modal -->
        <form @submit.prevent="addProductImport" class="form-horizontal">
            <div id="addProductImportModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit DOWNSTREAM PRODUCT IMPORT':'Add DOWNSTREAM PRODUCT IMPORT' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="downstream_product_import.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="downstream_product_import.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_product_import.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="downstream_product_import.pms" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">HHK -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_product_import.hhk" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_product_import.ago" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATK -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_product_import.atk" required>
                        </div>
                      </div> 

                     


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Product Import' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add DOWNSTREAM REFINERY (KRPC) modal -->
        <form @submit.prevent="addRefineryKRPC" class="form-horizontal">
            <div id="addRefineryKRPCModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit DOWNSTREAM REFINERY (KRPC)':'Add DOWNSTREAM REFINERY (KRPC)' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="downstream_refinery_krpc.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="downstream_refinery_krpc.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_refinery_krpc.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="downstream_refinery_krpc.pms" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">HHK -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_krpc.hhk" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_krpc.ago" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATK -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_krpc.atk" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">FUEL OIL -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_krpc.fuel_oil" required>
                        </div>
                      </div> 

                     


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Refinery (KRPC)' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add DOWNSTREAM REFINERY (WRPC) modal -->
        <form @submit.prevent="addRefineryWRPC" class="form-horizontal">
            <div id="addRefineryWRPCModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit DOWNSTREAM REFINERY (WRPC)':'Add DOWNSTREAM REFINERY (WRPC)' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="downstream_refinery_wrpc.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="downstream_refinery_wrpc.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_refinery_wrpc.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="downstream_refinery_wrpc.pms" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">HHK -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_wrpc.hhk" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_wrpc.ago" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATK -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_wrpc.atk" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">FUEL OIL -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_wrpc.fuel_oil" required>
                        </div>
                      </div> 

                     


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Refinery (WRPC)' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add DOWNSTREAM REFINERY (PHRC) modal -->
        <form @submit.prevent="addRefineryPHRC" class="form-horizontal">
            <div id="addRefineryPHRCModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit DOWNSTREAM REFINERY (PHRC)':'Add DOWNSTREAM REFINERY (PHRC)' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="downstream_refinery_phrc.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="downstream_refinery_phrc.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_refinery_phrc.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Refinery</label>
                        <div class="col-sm-9">
                            <select class="form-control" v-model="downstream_refinery_phrc.type_id" required>
                                <option value="">Select Refinery</option>
                                <option value="1">Old PHRC Refinery</option>
                                <option value="2">New PHRC Refinery</option>
                            </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="downstream_refinery_phrc.pms" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">HHK -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_phrc.hhk" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_phrc.ago" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATK -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_phrc.atk" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">FUEL OIL -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_phrc.fuel_oil" required>
                        </div>
                      </div> 

                     


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Refinery (PHRC)' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add DOWNSTREAM REFINERY PERFORMANCE UTILIZATION modal -->
        <form @submit.prevent="addRefineryPerformanceUtilization" class="form-horizontal">
            <div id="addRefineryPerformanceUtilizationModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit DOWNSTREAM REFINERY PERFORMANCE UTILIZATION':'Add DOWNSTREAM REFINERY PERFORMANCE UTILIZATION' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="downstream_refinery_performance_utilization.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="downstream_refinery_performance_utilization.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_refinery_performance_utilization.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Refinery</label>
                        <div class="col-sm-9">
                            <select class="form-control" v-model="downstream_refinery_performance_utilization.refinery_id" required>
                                <option value="">Select Refinery</option>
                                <option v-for="allRefinery in refineries" v-bind:key="allRefinery.id" v-bind:value="allRefinery.id"> {{ allRefinery.plant_location_name }} </option>
                            </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Install Capacity (BPSD)</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="downstream_refinery_performance_utilization.install_capacity" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Opening Stock</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_performance_utilization.opening_stock" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Receipt</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_performance_utilization.crude_receipt" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Processed</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_performance_utilization.crude_processed" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Closing Stock</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_performance_utilization.closing_stock" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Capacity Utilisation %</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_refinery_performance_utilization.capacity_utilization" required>
                        </div>
                      </div> 

                     


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Refinery Performance Utilization' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add DOWNSTREAM DEPOT TRUCK OUT modal -->
        <form @submit.prevent="addTruckOut" class="form-horizontal">
            <div id="addTruckOutModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit DOWNSTREAM DEPOT TRUCK OUT':'Add DOWNSTREAM DEPOT TRUCK OUT' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="downstream_truck_out.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="downstream_truck_out.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_truck_out.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="downstream_truck_out.pms" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">HHK -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_truck_out.hhk" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_truck_out.ago" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATK -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_truck_out.atk" required>
                        </div>
                      </div> 

                     


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Truck Out' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add DOWNSTREAM DEPOT TRUCK OUT MAERKET SEGMENT modal -->
        <form @submit.prevent="addTruckOutMarketer" class="form-horizontal">
            <div id="addTruckOutMarketerModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit DOWNSTREAM DEPOT TRUCK OUT MAERKET SEGMENT':'Add DOWNSTREAM DEPOT TRUCK OUT MAERKET SEGMENT' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="downstream_truck_out_marketer.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="downstream_truck_out_marketer.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_truck_out_marketer.date" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Segment</label>
                        <div class="col-sm-9">
                            <select class="form-control" v-model="downstream_truck_out_marketer.segment_id" required>
                                <option value="">Select Market Segment</option>
                                <option v-for="segment in segments" v-bind:key="segment.id" v-bind:value="segment.id"> {{ segment.market_segment_name }} </option>
                            </select>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="downstream_truck_out_marketer.pms" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">DPK -ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_truck_out_marketer.dpk" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-ltrs</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_truck_out_marketer.ago" required>
                        </div>
                      </div>  

                     


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Truck Out Market Segment' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add DOWNSTREAM TERMINAL OPERATION modal -->
        <form @submit.prevent="addTerminalOperation" class="form-horizontal">
            <div id="addTerminalOperationModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit DOWNSTREAM TERMINAL OPERATION':'Add DOWNSTREAM TERMINAL OPERATION' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="downstream_terminal_operation.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="downstream_terminal_operation.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_terminal_operation.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Crude oil and condensate production(bbls)</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="downstream_terminal_operation.oil_condensate_production" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Oil and condensate Export(Bbls)</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_terminal_operation.oil_condensate_export" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Refinery Supply(Bbls)</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_terminal_operation.refinery_supply" required>
                        </div>
                      </div>

                     


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Terminal Operation' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add DOWNSTREAM TERMINAL OPERATION APPLICATION modal -->
        <form @submit.prevent="addTerminalOperationApplication" class="form-horizontal">
            <div id="addTerminalOperationApplicationModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit DOWNSTREAM TERMINAL OPERATION APPLICATION':'Add DOWNSTREAM TERMINAL OPERATION APPLICATION' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="downstream_terminal_operation_application.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="downstream_terminal_operation_application.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_terminal_operation_application.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Permits Received</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="downstream_terminal_operation_application.export_permit_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Permits Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_terminal_operation_application.export_permit_approved" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Establishment-Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_terminal_operation_application.establishment_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Establishment-Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_terminal_operation_application.establishment_approved" required>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Trucking-Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_terminal_operation_application.suttle_trucking_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Trucking-Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_terminal_operation_application.suttle_trucking_approved" required>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Barging-Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_terminal_operation_application.suttle_bargingreceived" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Barging-Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_terminal_operation_application.suttle_bargingapproved" required>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Tank Calib-Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_terminal_operation_application.tank_calibration_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Tank Calib-Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_terminal_operation_application.tank_calibration_approved" required>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Meter Calib-Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_terminal_operation_application.calibration_proving_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Meter Calib-Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_terminal_operation_application.calibration_proving_approved" required>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Instrument Calib-Received</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_terminal_operation_application.instrument_calibration_received" required>
                        </div>
                        
                        <label for="" class="col-sm-3 col-form-label">Instrument Calib-Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="downstream_terminal_operation_application.instrument_calibration_approved" required>
                        </div>
                      </div>


                     


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Terminal Operation Application' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>






        <!-- Upload Downstream modal -->
        <form @submit.prevent="uploadDownstreamDataExcel" class="form-horizontal">
            <div id="uploadModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">{{modal_header}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">                        
                     
                        <input type="hidden" class="form-control" name="type" id="" v-model='type'>
                        <input type="file" name="file" id="filed">
                        <p style="color:red">  </p>
                        <input type="submit" value="Upload Excel" class="btn btn-dark pull-right" /> 

                    </div>
                  </div>
                </div>  
            </div>
        </form>

    </div>
</div>


</template>












<script>


    export default
    {
        data()
        {
            return{
                search: '',
                weeks: [],
                refineries: [],
                segments: [],
                downstream_rom_applications: [], 
                downstream_rom_application: {
                    id: '',
                    date: '',
                    week: '',
                    suitability_inspection_received: '',
                    suitability_inspection_approved: '',
                    atc_received: '',
                    atc_approved: '',
                    pressure_test_received: '',
                    pressure_test_approved: '',
                    tank_buried_received: '',
                    tank_buried_approved: '',
                    leak_detection_received: '',
                    leak_detection_approved: '',
                    final_inspection_received: '',
                    final_inspection_approved: '',
                    renewal_inspection_received: '',
                    renewal_inspection_approved: '',
                    vessel_license_received: '',
                    vessel_license_approved: '',
                    type: 'downstream_rom_application',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_licenses: [], 
                downstream_license: {
                    id: '',
                    date: '',
                    week: '',
                    category_a_new: '',
                    category_a_renewal: '',
                    category_b_new: '',
                    category_b_renewal: '',
                    category_c_new: '',
                    category_c_renewal: '',
                    total_cat_a: '',
                    total_cat_b: '',
                    total_cat_c: '',
                    type: 'downstream_license',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_surveillances: [], 
                downstream_surveillance: {
                    id: '',
                    date: '',
                    week: '',
                    station_visited: '',
                    station_with_pms: '',
                    sealed_under_dispensing: '',
                    sealed_for_over_price: '',
                    sealed_for_hoarding: '',
                    sealed_for_diversion: '',
                    sealed_for_violation_of_seal: '',
                    other: '',
                    total_station_sealed: '',
                    type: 'downstream_surveillance',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_depot_stocks: [], 
                downstream_depot_stock: {
                    id: '',
                    date: '',
                    week: '',
                    pms_open_stock: '',
                    pms_reciept: '',
                    pms_lifting_transfer: '',
                    pms_closing_stock: '',
                    dpk_open_stock: '',
                    dpk_reciept: '',
                    dpk_lifting_transfer: '',
                    dpk_closing_stock: '',
                    ago_open_stock: '',
                    ago_reciept: '',
                    ago_lifting_transfer: '',
                    ago_closing_stock: '',
                    type: 'downstream_depot_stock',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_depot_applications: [], 
                downstream_depot_application: {
                    id: '',
                    date: '',
                    week: '',
                    proposal_received: '',
                    proposal_approved: '',
                    presentation_received: '',
                    presentation_approved: '',
                    assessment_received: '',
                    assessment_approved: '',
                    atc_received: '',
                    atc_approved: '',
                    presure_test_received: '',
                    presure_test_approved: '',
                    calibration_received: '',
                    calibration_approved: '',
                    final_inspection_received: '',
                    final_inspection_approved: '',
                    renewal_inspection_received: '',
                    renewal_inspection_approved: '',
                    new_lto_received: '',
                    new_lto_approved: '',
                    renewal_lto_received: '',
                    renewal_lto_approved: '',
                    import_permit_received: '',
                    import_permit_approved: '',
                    type: 'downstream_depot_application',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_product_imports: [], 
                downstream_product_import: {
                    id: '',
                    date: '',
                    week: '',
                    pms: '',
                    hhk: '',
                    ago: '',
                    atk: '',
                    type: 'downstream_product_import',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_refinery_krpcs: [], 
                downstream_refinery_krpc: {
                    id: '',
                    date: '',
                    week: '',
                    pms: '',
                    hhk: '',
                    ago: '',
                    atk: '',
                    fuel_oil: '',
                    type: 'downstream_refinery_krpc',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_refinery_wrpcs: [], 
                downstream_refinery_wrpc: {
                    id: '',
                    date: '',
                    week: '',
                    pms: '',
                    hhk: '',
                    ago: '',
                    atk: '',
                    fuel_oil: '',
                    type: 'downstream_refinery_wrpc',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_refinery_phrc_news: [],
                downstream_refinery_phrcs: [],  
                downstream_refinery_phrc: {
                    id: '',
                    type_id: '',
                    date: '',
                    week: '',
                    pms: '',
                    hhk: '',
                    ago: '',
                    atk: '',
                    fuel_oil: '',
                    type: 'downstream_refinery_phrc',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_refinery_totals: [],  
                downstream_refinery_total: {
                    id: '',
                    date: '',
                    week: '',
                    pms: '',
                    hhk: '',
                    ago: '',
                    atk: '',
                    fuel_oil: '',
                    type: 'downstream_refinery_total',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_refinery_performance_utilizations: [],  
                downstream_refinery_performance_utilization: {
                    id: '',
                    refinery_id: '',
                    date: '',
                    week: '',
                    install_capacity: '',
                    opening_stock: '',
                    crude_receipt: '',
                    crude_processed: '',
                    closing_stock: '',
                    capacity_utilization: '',
                    type: 'downstream_refinery_performance_utilization',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_refinery_performance_utilization_totals: [],  
                downstream_refinery_performance_utilization_total: {
                    id: '',
                    refinery_id: '',
                    date: '',
                    week: '',
                    install_capacity: '',
                    opening_stock: '',
                    crude_receipt: '',
                    crude_processed: '',
                    closing_stock: '',
                    capacity_utilization: '',
                    type: 'downstream_refinery_performance_utilization_total',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_truck_outs: [], 
                downstream_truck_out: {
                    id: '',
                    date: '',
                    week: '',
                    pms: '',
                    hhk: '',
                    ago: '',
                    atk: '',
                    type: 'downstream_truck_out',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_truck_out_marketers: [], 
                downstream_truck_out_marketer: {
                    id: '',
                    date: '',
                    week: '',
                    segment_id: '',
                    pms: '',
                    dpk: '',
                    ago: '',
                    type: 'downstream_truck_out_marketer',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_terminal_operations: [], 
                downstream_terminal_operation: {
                    id: '',
                    date: '',
                    week: '',
                    oil_condensate_production: '',
                    oil_condensate_export: '',
                    refinery_supply: '',
                    type: 'downstream_terminal_operation',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_terminal_operation_applications: [], 
                downstream_terminal_operation_application: {
                    id: '',
                    date: '',
                    week: '',
                    export_permit_received: '',
                    export_permit_approved: '',
                    establishment_received: '',
                    establishment_approved: '',
                    suttle_trucking_received: '',
                    suttle_trucking_approved: '',
                    suttle_bargingreceived: '',
                    suttle_bargingapproved: '',
                    tank_calibration_received: '',
                    tank_calibration_approved: '',
                    calibration_proving_received: '',
                    calibration_proving_approved: '',
                    instrument_calibration_received: '',
                    instrument_calibration_approved: '',
                    type: 'downstream_terminal_operation_application',
                    user_id:window.sessionStorage.getItem('user_id')
                },


                downstream_rom_application_id: '',
                downstream_license_id: '',
                downstream_surveillance_id: '',
                downstream_depot_stock_id: '',
                downstream_depot_application_id: '',
                downstream_product_import_id: '',
                downstream_refinery_krpc_id: '',
                downstream_refinery_wrpc_id: '',
                downstream_refinery_phrc_id: '',
                downstream_refinery_total_id: '',
                downstream_refinery_performance_utilization_id: '',
                downstream_truck_out_id: '',
                downstream_truck_out_marketer_id: '',
                downstream_terminal_operation_id: '',
                downstream_terminal_operation_application_id: '',
                pagination: {},
                application_data:{},
                license_data:{},
                surveillance_data:{},
                depot_stock_data:{},
                depot_application_data:{},
                product_data:{},
                krpc_data:{},
                wrpc_data:{},
                phrc_data:{},
                total_data:{},
                ref_utilization_data:{},
                ref_utilization_total_data:{},
                truck_out_data:{},
                market_segment_data:{},
                ops_terminal_data:{},
                ops_application_data:{},
                modal_header: '',
                type: '',
                edit: false
            }
        },


        created()
        {
            this.fetchWeeks();
            this.fetchRefineries();
            this.fetchSegments();

            this.fetchAllRomApplications();
            this.fetchRomApplications();
            this.fetchAllLicenses();
            this.fetchLicenses();
            this.fetchAllSurveillances();
            this.fetchSurveillances();
            this.fetchAllDepotStocks();
            this.fetchDepotStocks();
            this.fetchAllDepotApplications();
            this.fetchDepotApplications();
            this.fetchAllProductImports();
            this.fetchProductImports();
            this.fetchAllRefineryKRPCs();
            this.fetchRefineryKRPCs();
            this.fetchAllRefineryWRPCs();
            this.fetchRefineryWRPCs();
            this.fetchAllRefineryPHRCs();
            this.fetchRefineryPHRCs();
            this.fetchAllRefineryPHRCNews();
            this.fetchRefineryPHRCNews();
            this.fetchAllRefineryTotals();
            this.fetchRefineryTotals();
            this.fetchAllRefineryPerformanceUtilizations();
            this.fetchRefineryPerformanceUtilizations();
            this.fetchAllRefineryPerformanceUtilizationTotals();
            this.fetchRefineryPerformanceUtilizationTotals();
            this.fetchAllTruckOuts();
            this.fetchTruckOuts();
            this.fetchAllTruckOutMarketers();
            this.fetchTruckOutMarketers();
            this.fetchAllTerminalOperations();
            this.fetchTerminalOperations();
            this.fetchAllTerminalOperationApplications();
            this.fetchTerminalOperationApplications();
        },

        computed: {
            filteredRomApplications: function()
            {
                return this.downstream_rom_applications.filter((downstream_rom_application) => {
                    return downstream_rom_application.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_rom_application.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredLicenses: function()
            {
                return this.downstream_licenses.filter((downstream_license) => {
                    return downstream_license.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_license.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredSurveillances: function()
            {
                return this.downstream_surveillances.filter((downstream_surveillance) => {
                    return downstream_surveillance.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_surveillance.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredDepotStocks: function()
            {
                return this.downstream_depot_stocks.filter((downstream_depot_stock) => {
                    return downstream_depot_stock.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_depot_stock.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredDepotApplications: function()
            {
                return this.downstream_depot_applications.filter((downstream_depot_application) => {
                    return downstream_depot_application.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_depot_application.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredProductImports: function()
            {
                return this.downstream_product_imports.filter((downstream_product_import) => {
                    return downstream_product_import.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_product_import.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredRefineryKRPCs: function()
            {
                return this.downstream_refinery_krpcs.filter((downstream_refinery_krpc) => {
                    return downstream_refinery_krpc.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_refinery_krpc.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredRefineryWRPCs: function()
            {
                return this.downstream_refinery_wrpcs.filter((downstream_refinery_wrpc) => {
                    return downstream_refinery_wrpc.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_refinery_wrpc.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredRefineryPHRCs: function()
            {
                return this.downstream_refinery_phrcs.filter((downstream_refinery_phrc) => {
                    return downstream_refinery_phrc.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_refinery_phrc.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredRefineryPHRCNews: function()
            {
                return this.downstream_refinery_phrc_news.filter((downstream_refinery_phrc_new) => {
                    return downstream_refinery_phrc_new.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_refinery_phrc_new.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredRefineryTotals: function()
            {
                return this.downstream_refinery_totals.filter((downstream_refinery_total) => {
                    return downstream_refinery_total.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredRefineryPerformanceUtilizations: function()
            {
                return this.downstream_refinery_performance_utilizations.filter((downstream_refinery_performance_utilization) => {
                    return downstream_refinery_performance_utilization.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_refinery_performance_utilization.week.toLowerCase().match(this.search.toLowerCase())  || 
                           downstream_refinery_performance_utilization.refinery.plant_location_name.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredRefineryPerformanceUtilization_totals: function()
            {
                return this.downstream_refinery_performance_utilization_totals.filter((downstream_refinery_performance_utilization_total) => {
                    return downstream_refinery_performance_utilization_total.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_refinery_performance_utilization_total.week.toLowerCase().match(this.search.toLowerCase())  || 
                           downstream_refinery_performance_utilization_total.refinery.plant_location_name.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredTruckOuts: function()
            {
                return this.downstream_truck_outs.filter((downstream_truck_out) => {
                    return downstream_truck_out.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_truck_out.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredTruckOutMarketers: function()
            {
                return this.downstream_truck_out_marketers.filter((downstream_truck_out_marketer) => {
                    return downstream_truck_out_marketer.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_truck_out_marketer.week.toLowerCase().match(this.search.toLowerCase())  || 
                           downstream_truck_out_marketer.segment.market_segment_name.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredTerminalOperations: function()
            {
                return this.downstream_terminal_operations.filter((downstream_terminal_operation) => {
                    return downstream_terminal_operation.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_terminal_operation.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredTerminalOperationApplications: function()
            {
                return this.downstream_terminal_operation_applications.filter((downstream_terminal_operation_application) => {
                    return downstream_terminal_operation_application.date.toLowerCase().match(this.search.toLowerCase()) || 
                           downstream_terminal_operation_application.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },
        },

        methods:{

            fetchWeeks()
            {
                let weeks = '/api/weeks'
                fetch(weeks)
                .then(res => res.json())
                .then(res => {
                    this.weeks = res.data;
                })
                .catch(err => console.log(err));            
            },

            fetchRefineries()
            {
                let refineries = '/api/refineries'
                fetch(refineries)
                .then(res => res.json())
                .then(res => {
                    this.refineries = res.data;
                })
                .catch(err => console.log(err));            
            },

            fetchSegments()
            {
                let segments = '/api/segments'
                fetch(segments)
                .then(res => res.json())
                .then(res => {
                    this.segments = res.data;
                })
                .catch(err => console.log(err));            
            },







            //downstream Rom Application
            fetchAllRomApplications(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstreams?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.application_data = res;
                    this.downstream_rom_applications = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchRomApplications(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstreams'
                fetch(page_url)
                .then(res => res.json())
                .then(res => { 
                    this.application_data = res;                   
                    this.downstream_rom_applications = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteRomApplication(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Rom Application ?'))
                {
                    fetch(`api/war-downstream/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Rom Application Has Been Deleted Successfully');
                        this.fetchRomApplications();
                    })
                    .catch(err => console.log(err));
                }
            },

            addRomApplication()
            {
                if(this.edit === false)
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.downstream_rom_application),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearRomApplicationForm()
                        toastr.success('Downstream Rom Application Has Been Add Successfully');
                        this.fetchRomApplications();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addRomApplicationModal').trigger('click');

                }
                else
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.downstream_rom_application),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearRomApplicationForm();
                        toastr.success('Downstream Rom Application Has Been Updated Successfully');
                        this.fetchRomApplications();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addRomApplicationModal').trigger('click');
                }
            },

            editRomApplication(downstream_rom_application)
            {
                this.edit = true;
                this.downstream_rom_application.id = downstream_rom_application.id;
                this.downstream_rom_application.downstream_rom_application_id = downstream_rom_application.id;
                this.downstream_rom_application.date = downstream_rom_application.date;
                this.downstream_rom_application.week = downstream_rom_application.week;
                this.downstream_rom_application.suitability_inspection_received = downstream_rom_application.suitability_inspection_received;
                this.downstream_rom_application.suitability_inspection_approved = downstream_rom_application.suitability_inspection_approved;
                this.downstream_rom_application.atc_received = downstream_rom_application.atc_received;
                this.downstream_rom_application.atc_approved = downstream_rom_application.atc_approved;
                this.downstream_rom_application.pressure_test_received = downstream_rom_application.pressure_test_received;
                this.downstream_rom_application.pressure_test_approved = downstream_rom_application.pressure_test_approved;
                this.downstream_rom_application.tank_buried_received = downstream_rom_application.tank_buried_received;
                this.downstream_rom_application.tank_buried_approved = downstream_rom_application.tank_buried_approved;
                this.downstream_rom_application.leak_detection_received = downstream_rom_application.leak_detection_received;
                this.downstream_rom_application.leak_detection_approved = downstream_rom_application.leak_detection_approved;
                this.downstream_rom_application.final_inspection_received = downstream_rom_application.final_inspection_received;
                this.downstream_rom_application.final_inspection_approved = downstream_rom_application.final_inspection_approved;
                this.downstream_rom_application.renewal_inspection_received = downstream_rom_application.renewal_inspection_received;
                this.downstream_rom_application.renewal_inspection_approved = downstream_rom_application.renewal_inspection_approved;
                this.downstream_rom_application.vessel_license_received = downstream_rom_application.vessel_license_received;
                this.downstream_rom_application.vessel_license_approved = downstream_rom_application.vessel_license_approved;
            },

            clearRomApplicationForm()
            {
                this.downstream_rom_application.id = '';
                this.downstream_rom_application.date = '';
                this.downstream_rom_application.week = '';
                this.downstream_rom_application.suitability_inspection_received = '';
                this.downstream_rom_application.suitability_inspection_approved = '';
                this.downstream_rom_application.atc_received = '';
                this.downstream_rom_application.atc_approved = '';
                this.downstream_rom_application.pressure_test_received = '';
                this.downstream_rom_application.pressure_test_approved = '';
                this.downstream_rom_application.tank_buried_received = '';
                this.downstream_rom_application.tank_buried_approved = '';
                this.downstream_rom_application.leak_detection_received = '';
                this.downstream_rom_application.leak_detection_approved = '';
                this.downstream_rom_application.final_inspection_received = '';
                this.downstream_rom_application.final_inspection_approved = '';
                this.downstream_rom_application.renewal_inspection_received = '';
                this.downstream_rom_application.renewal_inspection_approved = '';
                this.downstream_rom_application.vessel_license_received = '';
                this.downstream_rom_application.vessel_license_approved = '';
            },





            //downstream License
            fetchAllLicenses(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-licenses?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.license_data = res;
                    this.downstream_licenses = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchLicenses(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-licenses'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.license_data = res;
                    this.downstream_licenses = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteLicense(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream License ?'))
                {
                    fetch(`api/war-downstream/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream License Has Been Deleted Successfully');
                        this.fetchLicenses();
                    })
                    .catch(err => console.log(err));
                }
            },

            addLicense()
            {
                if(this.edit === false)
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.downstream_license),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearLicenseForm()
                        toastr.success('Downstream License Has Been Add Successfully');
                        this.fetchLicenses();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addLicenseModal').trigger('click');

                }
                else
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.downstream_license),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearLicenseForm();
                        toastr.success('Downstream License Has Been Updated Successfully');
                        this.fetchLicenses();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addLicenseModal').trigger('click');
                }
            },

            editLicense(downstream_license)
            {
                this.edit = true;
                this.downstream_license.id = downstream_license.id;
                this.downstream_license.downstream_license_id = downstream_license.id;
                this.downstream_license.date = downstream_license.date;
                this.downstream_license.week = downstream_license.week;
                this.downstream_license.category_a_new = downstream_license.category_a_new;
                this.downstream_license.category_a_renewal = downstream_license.category_a_renewal;
                this.downstream_license.category_b_new = downstream_license.category_b_new;
                this.downstream_license.category_b_renewal = downstream_license.category_b_renewal;
                this.downstream_license.category_c_new = downstream_license.category_c_new;
                this.downstream_license.category_c_renewal = downstream_license.category_c_renewal;
                this.downstream_license.total_cat_a = downstream_license.total_cat_a;
                this.downstream_license.total_cat_b = downstream_license.total_cat_b;
                this.downstream_license.total_cat_c = downstream_license.total_cat_c;
            },

            clearLicenseForm()
            {
                this.downstream_license.id = '';
                this.downstream_license.date = '';
                this.downstream_license.week = '';
                this.downstream_license.category_a_new = '';
                this.downstream_license.category_a_renewal = '';
                this.downstream_license.category_b_new = '';
                this.downstream_license.category_b_renewal = '';
                this.downstream_license.category_c_new = '';
                this.downstream_license.category_c_renewal = '';
                this.downstream_license.total_cat_a = '';
                this.downstream_license.total_cat_b = '';
                this.downstream_license.total_cat_c = '';
            },





            //downstream Surveillance
            fetchAllSurveillances(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-surveillances?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.surveillance_data = res;
                    this.downstream_surveillances = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchSurveillances(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-surveillances'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.surveillance_data = res;
                    this.downstream_surveillances = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteSurveillance(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Surveillance ?'))
                {
                    fetch(`api/war-downstream/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Surveillance Has Been Deleted Successfully');
                        this.fetchSurveillances();
                    })
                    .catch(err => console.log(err));
                }
            },

            addSurveillance()
            {
                if(this.edit === false)
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.downstream_surveillance),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearSurveillanceForm()
                        toastr.success('Downstream Surveillance Has Been Add Successfully');
                        this.fetchSurveillances();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addSurveillanceModal').trigger('click');

                }
                else
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.downstream_surveillance),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearSurveillanceForm();
                        toastr.success('Downstream Surveillance Has Been Updated Successfully');
                        this.fetchSurveillances();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addSurveillanceModal').trigger('click');
                }
            },

            editSurveillance(downstream_surveillance)
            {
                this.edit = true;
                this.downstream_surveillance.id = downstream_surveillance.id;
                this.downstream_surveillance.downstream_surveillance_id = downstream_surveillance.id;
                this.downstream_surveillance.date = downstream_surveillance.date;
                this.downstream_surveillance.week = downstream_surveillance.week;
                this.downstream_surveillance.station_visited = downstream_surveillance.station_visited;
                this.downstream_surveillance.station_with_pms = downstream_surveillance.station_with_pms;
                this.downstream_surveillance.sealed_under_dispensing = downstream_surveillance.sealed_under_dispensing;
                this.downstream_surveillance.sealed_for_over_price = downstream_surveillance.sealed_for_over_price;
                this.downstream_surveillance.sealed_for_hoarding = downstream_surveillance.sealed_for_hoarding;
                this.downstream_surveillance.sealed_for_diversion = downstream_surveillance.sealed_for_diversion;
                this.downstream_surveillance.sealed_for_violation_of_seal = downstream_surveillance.sealed_for_violation_of_seal;
                this.downstream_surveillance.other = downstream_surveillance.other;
                this.downstream_surveillance.total_station_sealed = downstream_surveillance.total_station_sealed;
            },

            clearSurveillanceForm()
            {
                this.downstream_surveillance.id = '';
                this.downstream_surveillance.date = '';
                this.downstream_surveillance.week = '';
                this.downstream_surveillance.station_visited = '';
                this.downstream_surveillance.station_with_pms = '';
                this.downstream_surveillance.sealed_under_dispensing = '';
                this.downstream_surveillance.sealed_for_over_price = '';
                this.downstream_surveillance.sealed_for_hoarding = '';
                this.downstream_surveillance.sealed_for_diversion = '';
                this.downstream_surveillance.sealed_for_violation_of_seal = '';
                this.downstream_surveillance.other = '';
                this.downstream_surveillance.total_station_sealed = '';
            },





            //downstream DepotStock
            fetchAllDepotStocks(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-depot-stocks?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.depot_stock_data = res;
                    this.downstream_depot_stocks = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchDepotStocks(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-depot-stocks'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.depot_stock_data = res;
                    this.downstream_depot_stocks = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteDepotStock(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Depot Stock ?'))
                {
                    fetch(`api/war-downstream/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Depot Stock Has Been Deleted Successfully');
                        this.fetchDepotStocks();
                    })
                    .catch(err => console.log(err));
                }
            },

            addDepotStock()
            {
                if(this.edit === false)
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.downstream_depot_stock),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearDepotStockForm()
                        toastr.success('Downstream Depot Stock Has Been Add Successfully');
                        this.fetchDepotStocks();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addDepotStockModal').trigger('click');

                }
                else
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.downstream_depot_stock),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearDepotStockForm();
                        toastr.success('Downstream Depot Stock Has Been Updated Successfully');
                        this.fetchDepotStocks();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addDepotStockModal').trigger('click');
                }
            },

            editDepotStock(downstream_depot_stock)
            {
                this.edit = true;
                this.downstream_depot_stock.id = downstream_depot_stock.id;
                this.downstream_depot_stock.downstream_depot_stock_id = downstream_depot_stock.id;
                this.downstream_depot_stock.date = downstream_depot_stock.date;
                this.downstream_depot_stock.week = downstream_depot_stock.week;
                this.downstream_depot_stock.pms_open_stock = downstream_depot_stock.pms_open_stock;
                this.downstream_depot_stock.pms_reciept = downstream_depot_stock.pms_reciept;
                this.downstream_depot_stock.pms_lifting_transfer = downstream_depot_stock.pms_lifting_transfer;
                this.downstream_depot_stock.pms_closing_stock = downstream_depot_stock.pms_closing_stock;
                this.downstream_depot_stock.dpk_open_stock = downstream_depot_stock.dpk_open_stock;
                this.downstream_depot_stock.dpk_reciept = downstream_depot_stock.dpk_reciept;
                this.downstream_depot_stock.dpk_lifting_transfer = downstream_depot_stock.dpk_lifting_transfer;
                this.downstream_depot_stock.dpk_closing_stock = downstream_depot_stock.dpk_closing_stock;
                this.downstream_depot_stock.ago_open_stock = downstream_depot_stock.ago_open_stock;
                this.downstream_depot_stock.ago_reciept = downstream_depot_stock.ago_reciept;
                this.downstream_depot_stock.ago_lifting_transfer = downstream_depot_stock.ago_lifting_transfer;
                this.downstream_depot_stock.ago_closing_stock = downstream_depot_stock.ago_closing_stock;
            },

            clearDepotStockForm()
            {
                this.downstream_depot_stock.id = '';
                this.downstream_depot_stock.date = '';
                this.downstream_depot_stock.week = '';
                this.downstream_depot_stock.pms_open_stock = '';
                this.downstream_depot_stock.pms_reciept = '';
                this.downstream_depot_stock.pms_lifting_transfer = '';
                this.downstream_depot_stock.pms_closing_stock = '';
                this.downstream_depot_stock.dpk_open_stock = '';
                this.downstream_depot_stock.dpk_reciept = '';
                this.downstream_depot_stock.dpk_lifting_transfer = '';
                this.downstream_depot_stock.dpk_closing_stock = '';
                this.downstream_depot_stock.ago_open_stock = '';
                this.downstream_depot_stock.ago_reciept = '';
                this.downstream_depot_stock.ago_lifting_transfer = '';
                this.downstream_depot_stock.ago_closing_stock = '';
            },





            //downstream DepotApplication
            fetchAllDepotApplications(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-depot-applications?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.depot_application_data = res;
                    this.downstream_depot_applications = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchDepotApplications(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-depot-applications'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.depot_application_data = res;
                    this.downstream_depot_applications = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteDepotApplication(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Depot Application ?'))
                {
                    fetch(`api/war-downstream/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Depot Application Has Been Deleted Successfully');
                        this.fetchDepotApplications();
                    })
                    .catch(err => console.log(err));
                }
            },

            addDepotApplication()
            {
                if(this.edit === false)
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.downstream_depot_application),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearDepotApplicationForm()
                        toastr.success('Downstream Depot Application Has Been Add Successfully');
                        this.fetchDepotApplications();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addDepotApplicationModal').trigger('click');

                }
                else
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.downstream_depot_application),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearDepotApplicationForm();
                        toastr.success('Downstream Depot Application Has Been Updated Successfully');
                        this.fetchDepotApplications();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addDepotApplicationModal').trigger('click');
                }
            },

            editDepotApplication(downstream_depot_application)
            {
                this.edit = true;
                this.downstream_depot_application.id = downstream_depot_application.id;
                this.downstream_depot_application.downstream_depot_application_id = downstream_depot_application.id;
                this.downstream_depot_application.date = downstream_depot_application.date;
                this.downstream_depot_application.week = downstream_depot_application.week;
                this.downstream_depot_application.proposal_received = downstream_depot_application.proposal_received;
                this.downstream_depot_application.proposal_approved = downstream_depot_application.proposal_approved;
                this.downstream_depot_application.presentation_received = downstream_depot_application.presentation_received;
                this.downstream_depot_application.presentation_approved = downstream_depot_application.presentation_approved;
                this.downstream_depot_application.assessment_received = downstream_depot_application.assessment_received;
                this.downstream_depot_application.assessment_approved = downstream_depot_application.assessment_approved;
                this.downstream_depot_application.atc_received = downstream_depot_application.atc_received;
                this.downstream_depot_application.atc_approved = downstream_depot_application.atc_approved;
                this.downstream_depot_application.presure_test_received = downstream_depot_application.presure_test_received;
                this.downstream_depot_application.presure_test_approved = downstream_depot_application.presure_test_approved;
                this.downstream_depot_application.calibration_received = downstream_depot_application.calibration_received;
                this.downstream_depot_application.calibration_approved = downstream_depot_application.calibration_approved;
                this.downstream_depot_application.final_inspection_received = downstream_depot_application.final_inspection_received;
                this.downstream_depot_application.final_inspection_approved = downstream_depot_application.final_inspection_approved;
                this.downstream_depot_application.renewal_inspection_received = downstream_depot_application.renewal_inspection_received;
                this.downstream_depot_application.renewal_inspection_approved = downstream_depot_application.renewal_inspection_approved;
                this.downstream_depot_application.new_lto_received = downstream_depot_application.new_lto_received;
                this.downstream_depot_application.new_lto_approved = downstream_depot_application.new_lto_approved;
                this.downstream_depot_application.renewal_lto_received = downstream_depot_application.renewal_lto_received;
                this.downstream_depot_application.renewal_lto_approved = downstream_depot_application.renewal_lto_approved;
                this.downstream_depot_application.import_permit_received = downstream_depot_application.import_permit_received;
                this.downstream_depot_application.import_permit_approved = downstream_depot_application.import_permit_approved;
            },

            clearDepotApplicationForm()
            {
                this.downstream_depot_application.id = '';
                this.downstream_depot_application.date = '';
                this.downstream_depot_application.week = '';
                this.downstream_depot_application.proposal_received = '';
                this.downstream_depot_application.proposal_approved = '';
                this.downstream_depot_application.presentation_received = '';
                this.downstream_depot_application.presentation_approved = '';
                this.downstream_depot_application.assessment_received = '';
                this.downstream_depot_application.assessment_approved = '';
                this.downstream_depot_application.atc_received = '';
                this.downstream_depot_application.atc_approved = '';
                this.downstream_depot_application.presure_test_received = '';
                this.downstream_depot_application.presure_test_approved = '';
                this.downstream_depot_application.calibration_received = '';
                this.downstream_depot_application.calibration_approved = '';
                this.downstream_depot_application.final_inspection_received = '';
                this.downstream_depot_application.final_inspection_approved = '';
                this.downstream_depot_application.renewal_inspection_received = '';
                this.downstream_depot_application.renewal_inspection_approved = '';
                this.downstream_depot_application.new_lto_received = '';
                this.downstream_depot_application.new_lto_approved = '';
                this.downstream_depot_application.renewal_lto_received = '';
                this.downstream_depot_application.renewal_lto_approved = '';
                this.downstream_depot_application.import_permit_received = '';
                this.downstream_depot_application.import_permit_approved = '';
            },






            //downstream ProductImport
            fetchAllProductImports(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-product-imports?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.product_data = res;
                    this.downstream_product_imports = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchProductImports(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-product-imports'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.product_data = res;
                    this.downstream_product_imports = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteProductImport(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Product Import ?'))
                {
                    fetch(`api/war-downstream/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Product Import Has Been Deleted Successfully');
                        this.fetchProductImports();
                    })
                    .catch(err => console.log(err));
                }
            },

            addProductImport()
            {
                if(this.edit === false)
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.downstream_product_import),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearProductImportForm()
                        toastr.success('Downstream Product Import Has Been Add Successfully');
                        this.fetchProductImports();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addProductImportModal').trigger('click');

                }
                else
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.downstream_product_import),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearProductImportForm();
                        toastr.success('Downstream Product Import Has Been Updated Successfully');
                        this.fetchProductImports();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addProductImportModal').trigger('click');
                }
            },

            editProductImport(downstream_product_import)
            {
                this.edit = true;
                this.downstream_product_import.id = downstream_product_import.id;
                this.downstream_product_import.downstream_product_import_id = downstream_product_import.id;
                this.downstream_product_import.date = downstream_product_import.date;
                this.downstream_product_import.week = downstream_product_import.week;
                this.downstream_product_import.pms = downstream_product_import.pms;
                this.downstream_product_import.hhk = downstream_product_import.hhk;
                this.downstream_product_import.ago = downstream_product_import.ago;
                this.downstream_product_import.atk = downstream_product_import.atk;
            },

            clearProductImportForm()
            {
                this.downstream_product_import.id = '';
                this.downstream_product_import.date = '';
                this.downstream_product_import.week = '';
                this.downstream_product_import.pms = '';
                this.downstream_product_import.hhk = '';
                this.downstream_product_import.ago = '';
                this.downstream_product_import.atk = '';
            },





            //downstream RefineryKRPC
            fetchAllRefineryKRPCs(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-refinery-krpcs?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.krpc_data = res;
                    this.downstream_refinery_krpcs = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchRefineryKRPCs(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-refinery-krpcs'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.krpc_data = res;
                    this.downstream_refinery_krpcs = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteRefineryKRPC(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Refinery (KRPC) ?'))
                {
                    fetch(`api/war-downstream/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Refinery (KRPC) Has Been Deleted Successfully');
                        this.fetchRefineryKRPCs();
                    })
                    .catch(err => console.log(err));
                }
            },

            addRefineryKRPC()
            {
                if(this.edit === false)
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.downstream_refinery_krpc),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearRefineryKRPCForm()
                        toastr.success('Downstream Refinery (KRPC) Has Been Add Successfully');
                        this.fetchRefineryKRPCs();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addRefineryKRPCModal').trigger('click');

                }
                else
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.downstream_refinery_krpc),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearRefineryKRPCForm();
                        toastr.success('Downstream Refinery (KRPC) Has Been Updated Successfully');
                        this.fetchRefineryKRPCs();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addRefineryKRPCModal').trigger('click');
                }
            },

            editRefineryKRPC(downstream_refinery_krpc)
            {
                this.edit = true;
                this.downstream_refinery_krpc.id = downstream_refinery_krpc.id;
                this.downstream_refinery_krpc.downstream_refinery_krpc_id = downstream_refinery_krpc.id;
                this.downstream_refinery_krpc.date = downstream_refinery_krpc.date;
                this.downstream_refinery_krpc.week = downstream_refinery_krpc.week;
                this.downstream_refinery_krpc.pms = downstream_refinery_krpc.pms;
                this.downstream_refinery_krpc.hhk = downstream_refinery_krpc.hhk;
                this.downstream_refinery_krpc.ago = downstream_refinery_krpc.ago;
                this.downstream_refinery_krpc.atk = downstream_refinery_krpc.atk;
                this.downstream_refinery_krpc.fuel_oil = downstream_refinery_krpc.fuel_oil;
            },

            clearRefineryKRPCForm()
            {
                this.downstream_refinery_krpc.id = '';
                this.downstream_refinery_krpc.date = '';
                this.downstream_refinery_krpc.week = '';
                this.downstream_refinery_krpc.pms = '';
                this.downstream_refinery_krpc.hhk = '';
                this.downstream_refinery_krpc.ago = '';
                this.downstream_refinery_krpc.atk = '';
                this.downstream_refinery_krpc.fuel_oil = '';
            },





            //downstream RefineryWRPC
            fetchAllRefineryWRPCs(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-refinery-wrpcs?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.wrpc_data = res;
                    this.downstream_refinery_wrpcs = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchRefineryWRPCs(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-refinery-wrpcs'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.wrpc_data = res;
                    this.downstream_refinery_wrpcs = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteRefineryWRPC(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Refinery (WRPC) ?'))
                {
                    fetch(`api/war-downstream/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Refinery (WRPC) Has Been Deleted Successfully');
                        this.fetchRefineryWRPCs();
                    })
                    .catch(err => console.log(err));
                }
            },

            addRefineryWRPC()
            {
                if(this.edit === false)
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.downstream_refinery_wrpc),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearRefineryWRPCForm()
                        toastr.success('Downstream Refinery (WRPC) Has Been Add Successfully');
                        this.fetchRefineryWRPCs();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addRefineryWRPCModal').trigger('click');

                }
                else
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.downstream_refinery_wrpc),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearRefineryWRPCForm();
                        toastr.success('Downstream Refinery (WRPC) Has Been Updated Successfully');
                        this.fetchRefineryWRPCs();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addRefineryWRPCModal').trigger('click');
                }
            },

            editRefineryWRPC(downstream_refinery_wrpc)
            {
                this.edit = true;
                this.downstream_refinery_wrpc.id = downstream_refinery_wrpc.id;
                this.downstream_refinery_wrpc.downstream_refinery_wrpc_id = downstream_refinery_wrpc.id;
                this.downstream_refinery_wrpc.date = downstream_refinery_wrpc.date;
                this.downstream_refinery_wrpc.week = downstream_refinery_wrpc.week;
                this.downstream_refinery_wrpc.pms = downstream_refinery_wrpc.pms;
                this.downstream_refinery_wrpc.hhk = downstream_refinery_wrpc.hhk;
                this.downstream_refinery_wrpc.ago = downstream_refinery_wrpc.ago;
                this.downstream_refinery_wrpc.atk = downstream_refinery_wrpc.atk;
                this.downstream_refinery_wrpc.fuel_oil = downstream_refinery_wrpc.fuel_oil;
            },

            clearRefineryWRPCForm()
            {
                this.downstream_refinery_wrpc.id = '';
                this.downstream_refinery_wrpc.date = '';
                this.downstream_refinery_wrpc.week = '';
                this.downstream_refinery_wrpc.pms = '';
                this.downstream_refinery_wrpc.hhk = '';
                this.downstream_refinery_wrpc.ago = '';
                this.downstream_refinery_wrpc.atk = '';
                this.downstream_refinery_wrpc.fuel_oil = '';
            },





            //downstream RefineryPHRC
            fetchAllRefineryPHRCs(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-refinery-phrcs?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.phrc_data = res;
                    this.downstream_refinery_phrcs = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchRefineryPHRCs(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-refinery-phrcs'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.phrc_data = res;
                    this.downstream_refinery_phrcs = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },

            //downstream RefineryPHRC NEW
            fetchAllRefineryPHRCNews(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-refinery-phrc-news?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.downstream_refinery_phrc_news = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchRefineryPHRCNews(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-refinery-phrc-news'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.downstream_refinery_phrc_news = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteRefineryPHRC(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Refinery (PHRC) ?'))
                {
                    fetch(`api/war-downstream/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Refinery (PHRC) Has Been Deleted Successfully');
                        this.fetchRefineryPHRCs();
                        this.fetchRefineryPHRCNews();
                    })
                    .catch(err => console.log(err));
                }
            },

            addRefineryPHRC()
            {
                if(this.edit === false)
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.downstream_refinery_phrc),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearRefineryPHRCForm()
                        toastr.success('Downstream Refinery (PHRC) Has Been Add Successfully');
                        this.fetchRefineryPHRCs();
                        this.fetchRefineryPHRCNews();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addRefineryPHRCModal').trigger('click');

                }
                else
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.downstream_refinery_phrc),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearRefineryPHRCForm();
                        toastr.success('Downstream Refinery (PHRC) Has Been Updated Successfully');
                        this.fetchRefineryPHRCs();
                        this.fetchRefineryPHRCNews();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addRefineryPHRCModal').trigger('click');
                }
            },

            editRefineryPHRC(downstream_refinery_phrc)
            {
                this.edit = true;
                this.downstream_refinery_phrc.id = downstream_refinery_phrc.id;
                this.downstream_refinery_phrc.downstream_refinery_phrc_id = downstream_refinery_phrc.id;
                this.downstream_refinery_phrc.type_id = downstream_refinery_phrc.type_id;
                this.downstream_refinery_phrc.date = downstream_refinery_phrc.date;
                this.downstream_refinery_phrc.week = downstream_refinery_phrc.week;
                this.downstream_refinery_phrc.pms = downstream_refinery_phrc.pms;
                this.downstream_refinery_phrc.hhk = downstream_refinery_phrc.hhk;
                this.downstream_refinery_phrc.ago = downstream_refinery_phrc.ago;
                this.downstream_refinery_phrc.atk = downstream_refinery_phrc.atk;
                this.downstream_refinery_phrc.fuel_oil = downstream_refinery_phrc.fuel_oil;
            },

            clearRefineryPHRCForm()
            {
                this.downstream_refinery_phrc.id = '';
                this.downstream_refinery_phrc.type_id = '';
                this.downstream_refinery_phrc.date = '';
                this.downstream_refinery_phrc.week = '';
                this.downstream_refinery_phrc.pms = '';
                this.downstream_refinery_phrc.hhk = '';
                this.downstream_refinery_phrc.ago = '';
                this.downstream_refinery_phrc.atk = '';
                this.downstream_refinery_phrc.fuel_oil = '';
            },


            //downstream Total Refinery
            fetchAllRefineryTotals(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-refinery-totals?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.wrpc_data = res;
                    this.downstream_refinery_totals = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchRefineryTotals(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-refinery-totals'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.wrpc_data = res;
                    this.downstream_refinery_totals = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            







            //downstream RefineryPerformanceUtilization
            fetchAllRefineryPerformanceUtilizations(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-refinery-performance-utilizations?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.ref_utilization_data = res;
                    this.downstream_refinery_performance_utilizations = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchRefineryPerformanceUtilizations(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-refinery-performance-utilizations'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.ref_utilization_data = res;
                    this.downstream_refinery_performance_utilizations = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteRefineryPerformanceUtilization(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Refinery Performance Utilization ?'))
                {
                    fetch(`api/war-downstream/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Refinery Performance Utilization Has Been Deleted Successfully');
                        this.fetchRefineryPerformanceUtilizations();
                    })
                    .catch(err => console.log(err));
                }
            },

            addRefineryPerformanceUtilization()
            {
                if(this.edit === false)
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.downstream_refinery_performance_utilization),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearRefineryPerformanceUtilizationForm()
                        toastr.success('Downstream Refinery Performance Utilization Has Been Add Successfully');
                        this.fetchRefineryPerformanceUtilizations();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addRefineryPerformanceUtilizationModal').trigger('click');

                }
                else
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.downstream_refinery_performance_utilization),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearRefineryPerformanceUtilizationForm();
                        toastr.success('Downstream Refinery Performance Utilization Has Been Updated Successfully');
                        this.fetchRefineryPerformanceUtilizations();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addRefineryPerformanceUtilizationModal').trigger('click');
                }
            },

            editRefineryPerformanceUtilization(downstream_refinery_performance_utilization)
            {
                this.edit = true;
                this.downstream_refinery_performance_utilization.id = downstream_refinery_performance_utilization.id;
                this.downstream_refinery_performance_utilization.downstream_refinery_performance_utilization_id = downstream_refinery_performance_utilization.id;
                this.downstream_refinery_performance_utilization.date = downstream_refinery_performance_utilization.date;
                this.downstream_refinery_performance_utilization.week = downstream_refinery_performance_utilization.week;
                this.downstream_refinery_performance_utilization.refinery_id = downstream_refinery_performance_utilization.refinery_id;
                this.downstream_refinery_performance_utilization.install_capacity = downstream_refinery_performance_utilization.install_capacity;
                this.downstream_refinery_performance_utilization.opening_stock = downstream_refinery_performance_utilization.opening_stock;
                this.downstream_refinery_performance_utilization.crude_receipt = downstream_refinery_performance_utilization.crude_receipt;
                this.downstream_refinery_performance_utilization.crude_processed = downstream_refinery_performance_utilization.crude_processed;
                this.downstream_refinery_performance_utilization.closing_stock = downstream_refinery_performance_utilization.closing_stock;
                this.downstream_refinery_performance_utilization.capacity_utilization = downstream_refinery_performance_utilization.capacity_utilization;
            },

            clearRefineryPerformanceUtilizationForm()
            {
                this.downstream_refinery_performance_utilization.id = '';
                this.downstream_refinery_performance_utilization.date = '';
                this.downstream_refinery_performance_utilization.week = '';
                this.downstream_refinery_performance_utilization.refinery_id = '';
                this.downstream_refinery_performance_utilization.install_capacity = '';
                this.downstream_refinery_performance_utilization.opening_stock = '';
                this.downstream_refinery_performance_utilization.crude_receipt = '';
                this.downstream_refinery_performance_utilization.crude_processed = '';
                this.downstream_refinery_performance_utilization.closing_stock = '';
                this.downstream_refinery_performance_utilization.capacity_utilization = '';
            },


            //downstream RefineryPerformanceUtilization TOTAL
            fetchAllRefineryPerformanceUtilizationTotals(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-refinery-performance-utilization_totals?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.ref_utilization_totaL_data = res;
                    this.downstream_refinery_performance_utilization_totals = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchRefineryPerformanceUtilizationTotals(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-refinery-performance-utilization_totals'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.ref_utilization_totaL_data = res;
                    this.downstream_refinery_performance_utilization_totals = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },





            //downstream TruckOut
            fetchAllTruckOuts(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-truck-outs?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.truck_out_data = res;
                    this.downstream_truck_outs = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchTruckOuts(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-truck-outs'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.truck_out_data = res;
                    this.downstream_truck_outs = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteTruckOut(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Depot Truck Out ?'))
                {
                    fetch(`api/war-downstream/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Depot Truck Out Has Been Deleted Successfully');
                        this.fetchTruckOuts();
                    })
                    .catch(err => console.log(err));
                }
            },

            addTruckOut()
            {
                if(this.edit === false)
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.downstream_truck_out),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearTruckOutForm()
                        toastr.success('Downstream Depot Truck Out Has Been Add Successfully');
                        this.fetchTruckOuts();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addTruckOutModal').trigger('click');

                }
                else
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.downstream_truck_out),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearTruckOutForm();
                        toastr.success('Downstream Depot Truck Out Has Been Updated Successfully');
                        this.fetchTruckOuts();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addTruckOutModal').trigger('click');
                }
            },

            editTruckOut(downstream_truck_out)
            {
                this.edit = true;
                this.downstream_truck_out.id = downstream_truck_out.id;
                this.downstream_truck_out.downstream_truck_out_id = downstream_truck_out.id;
                this.downstream_truck_out.date = downstream_truck_out.date;
                this.downstream_truck_out.week = downstream_truck_out.week;
                this.downstream_truck_out.pms = downstream_truck_out.pms;
                this.downstream_truck_out.hhk = downstream_truck_out.hhk;
                this.downstream_truck_out.ago = downstream_truck_out.ago;
                this.downstream_truck_out.atk = downstream_truck_out.atk;
            },

            clearTruckOutForm()
            {
                this.downstream_truck_out.id = '';
                this.downstream_truck_out.date = '';
                this.downstream_truck_out.week = '';
                this.downstream_truck_out.pms = '';
                this.downstream_truck_out.hhk = '';
                this.downstream_truck_out.ago = '';
                this.downstream_truck_out.atk = '';
            },





            //downstream TruckOutMarketer 
            fetchAllTruckOutMarketers(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-truck-out-marketers?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.market_segment_data = res;
                    this.downstream_truck_out_marketers = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchTruckOutMarketers(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-truck-out-marketers'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.market_segment_data = res;
                    this.downstream_truck_out_marketers = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteTruckOutMarketer(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Depot Truck Out Market Segment ?'))
                {
                    fetch(`api/war-downstream/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Depot Truck Out Market Segment Has Been Deleted Successfully');
                        this.fetchTruckOutMarketers();
                    })
                    .catch(err => console.log(err));
                }
            },

            addTruckOutMarketer()
            {
                if(this.edit === false)
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.downstream_truck_out_marketer),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearTruckOutMarketerForm()
                        toastr.success('Downstream Depot Truck Out Market Segment Has Been Add Successfully');
                        this.fetchTruckOutMarketers();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addTruckOutMarketerModal').trigger('click');

                }
                else
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.downstream_truck_out_marketer),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearTruckOutMarketerForm();
                        toastr.success('Downstream Depot Truck Out Market Segment Has Been Updated Successfully');
                        this.fetchTruckOutMarketers();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addTruckOutMarketerModal').trigger('click');
                }
            },

            editTruckOutMarketer(downstream_truck_out_marketer)
            {
                this.edit = true;
                this.downstream_truck_out_marketer.id = downstream_truck_out_marketer.id;
                this.downstream_truck_out_marketer.downstream_truck_out_marketer_id = downstream_truck_out_marketer.id;
                this.downstream_truck_out_marketer.date = downstream_truck_out_marketer.date;
                this.downstream_truck_out_marketer.week = downstream_truck_out_marketer.week;
                this.downstream_truck_out_marketer.segment_id = downstream_truck_out_marketer.segment_id;
                this.downstream_truck_out_marketer.pms = downstream_truck_out_marketer.pms;
                this.downstream_truck_out_marketer.dpk = downstream_truck_out_marketer.dpk;
                this.downstream_truck_out_marketer.ago = downstream_truck_out_marketer.ago;
            },

            clearTruckOutMarketerForm()
            {
                this.downstream_truck_out_marketer.id = '';
                this.downstream_truck_out_marketer.date = '';
                this.downstream_truck_out_marketer.week = '';
                this.downstream_truck_out_marketer.segment_id = '';
                this.downstream_truck_out_marketer.pms = '';
                this.downstream_truck_out_marketer.dpk = '';
                this.downstream_truck_out_marketer.ago = '';
            },





            //downstream TerminalOperation 
            fetchAllTerminalOperations(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-terminal-operations?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.ops_terminal_data = res;
                    this.downstream_terminal_operations = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchTerminalOperations(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-terminal-operations'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.ops_terminal_data = res;
                    this.downstream_terminal_operations = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteTerminalOperation(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Crude Oil Terminal Operation ?'))
                {
                    fetch(`api/war-downstream/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Crude Oil Terminal Operation Has Been Deleted Successfully');
                        this.fetchTerminalOperations();
                    })
                    .catch(err => console.log(err));
                }
            },

            addTerminalOperation()
            {
                if(this.edit === false)
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.downstream_terminal_operation),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearTerminalOperationForm()
                        toastr.success('Downstream Crude Oil Terminal Operation Has Been Add Successfully');
                        this.fetchTerminalOperations();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addTerminalOperationModal').trigger('click');

                }
                else
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.downstream_terminal_operation),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearTerminalOperationForm();
                        toastr.success('Downstream Crude Oil Terminal Operation Has Been Updated Successfully');
                        this.fetchTerminalOperations();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addTerminalOperationModal').trigger('click');
                }
            },

            editTerminalOperation(downstream_terminal_operation)
            {
                this.edit = true;
                this.downstream_terminal_operation.id = downstream_terminal_operation.id;
                this.downstream_terminal_operation.downstream_terminal_operation_id = downstream_terminal_operation.id;
                this.downstream_terminal_operation.date = downstream_terminal_operation.date;
                this.downstream_terminal_operation.week = downstream_terminal_operation.week;
                this.downstream_terminal_operation.oil_condensate_production = downstream_terminal_operation.oil_condensate_production;
                this.downstream_terminal_operation.oil_condensate_export = downstream_terminal_operation.oil_condensate_export;
                this.downstream_terminal_operation.refinery_supply = downstream_terminal_operation.refinery_supply;
            },

            clearTerminalOperationForm()
            {
                this.downstream_terminal_operation.id = '';
                this.downstream_terminal_operation.date = '';
                this.downstream_terminal_operation.week = '';
                this.downstream_terminal_operation.oil_condensate_production = '';
                this.downstream_terminal_operation.oil_condensate_export = '';
                this.downstream_terminal_operation.refinery_supply = '';
            },





            //downstream TerminalOperationApplication 
            fetchAllTerminalOperationApplications(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-terminal-operation-applications?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.ops_application_data = res;
                    this.downstream_terminal_operation_applications = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchTerminalOperationApplications(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-downstream-terminal-operation-applications'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.ops_application_data = res;
                    this.downstream_terminal_operation_applications = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteTerminalOperationApplication(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Crude Oil Terminal Operation Application ?'))
                {
                    fetch(`api/war-downstream/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Crude Oil Terminal Operation Application Has Been Deleted Successfully');
                        this.fetchTerminalOperationApplications();
                    })
                    .catch(err => console.log(err));
                }
            },

            addTerminalOperationApplication()
            {
                if(this.edit === false)
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.downstream_terminal_operation_application),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearTerminalOperationApplicationForm()
                        toastr.success('Downstream Crude Oil Terminal Operation Application Has Been Add Successfully');
                        this.fetchTerminalOperationApplications();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addTerminalOperationApplicationModal').trigger('click');

                }
                else
                {
                    fetch('api/war-downstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.downstream_terminal_operation_application),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearTerminalOperationApplicationForm();
                        toastr.success('Downstream Crude Oil Terminal Operation Application Has Been Updated Successfully');
                        this.fetchTerminalOperationApplications();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addTerminalOperationApplicationModal').trigger('click');
                }
            },

            editTerminalOperationApplication(downstream_terminal_operation_application)
            {
                this.edit = true;
                this.downstream_terminal_operation_application.id = downstream_terminal_operation_application.id;
                this.downstream_terminal_operation_application.downstream_terminal_operation_application_id = downstream_terminal_operation_application.id;
                this.downstream_terminal_operation_application.date = downstream_terminal_operation_application.date;
                this.downstream_terminal_operation_application.week = downstream_terminal_operation_application.week;
                this.downstream_terminal_operation_application.export_permit_received = downstream_terminal_operation_application.export_permit_received;
                this.downstream_terminal_operation_application.export_permit_approved = downstream_terminal_operation_application.export_permit_approved;
                this.downstream_terminal_operation_application.establishment_received = downstream_terminal_operation_application.establishment_received;
                this.downstream_terminal_operation_application.establishment_approved = downstream_terminal_operation_application.establishment_approved;
                this.downstream_terminal_operation_application.suttle_trucking_received = downstream_terminal_operation_application.suttle_trucking_received;
                this.downstream_terminal_operation_application.suttle_trucking_approved = downstream_terminal_operation_application.suttle_trucking_approved;
                this.downstream_terminal_operation_application.suttle_bargingreceived = downstream_terminal_operation_application.suttle_bargingreceived;
                this.downstream_terminal_operation_application.suttle_bargingapproved = downstream_terminal_operation_application.suttle_bargingapproved;
                this.downstream_terminal_operation_application.tank_calibration_received = downstream_terminal_operation_application.tank_calibration_received;
                this.downstream_terminal_operation_application.tank_calibration_approved = downstream_terminal_operation_application.tank_calibration_approved;
                this.downstream_terminal_operation_application.calibration_proving_received = downstream_terminal_operation_application.calibration_proving_received;
                this.downstream_terminal_operation_application.calibration_proving_approved = downstream_terminal_operation_application.calibration_proving_approved;
                this.downstream_terminal_operation_application.instrument_calibration_received = downstream_terminal_operation_application.instrument_calibration_received;
                this.downstream_terminal_operation_application.instrument_calibration_approved = downstream_terminal_operation_application.instrument_calibration_approved;
            },

            clearTerminalOperationApplicationForm()
            {
                this.downstream_terminal_operation_application.id = '';
                this.downstream_terminal_operation_application.date = '';
                this.downstream_terminal_operation_application.week = '';
                this.downstream_terminal_operation_application.export_permit_received = '';
                this.downstream_terminal_operation_application.export_permit_approved = '';
                this.downstream_terminal_operation_application.establishment_received = '';
                this.downstream_terminal_operation_application.establishment_approved = '';
                this.downstream_terminal_operation_application.suttle_trucking_received = '';
                this.downstream_terminal_operation_application.suttle_trucking_approved = '';
                this.downstream_terminal_operation_application.suttle_bargingreceived = '';
                this.downstream_terminal_operation_application.suttle_bargingapproved = '';
                this.downstream_terminal_operation_application.tank_calibration_received = '';
                this.downstream_terminal_operation_application.tank_calibration_approved = '';
                this.downstream_terminal_operation_application.calibration_proving_received = '';
                this.downstream_terminal_operation_application.calibration_proving_approved = '';
                this.downstream_terminal_operation_application.instrument_calibration_received = '';
                this.downstream_terminal_operation_application.instrument_calibration_approved = '';
            },



















            globalPagination(res) 
            {
                let meta = res.meta;
                let links = res.links;
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },


            uploadDownstreamDataExcel()
            {
                var input = document.querySelector('input[type="file"]')

                var data = new FormData()
                data.append('file', input.files[0])
                // data.append('user', 'hubot')

                fetch('api/war-downstream-uploading/'+this.type, 
                {
                    method: 'post',
                    body: data
                })
                .then(data => {
                if (data.ok)
                    {
                        toastr.success(this.modal_header + ' Uploaded Successfully');

                        this.fetchRomApplications();
                        this.fetchLicenses();
                        this.fetchSurveillances();
                        this.fetchDepotStocks();
                        this.fetchDepotApplications();
                        this.fetchProductImports();
                        this.fetchRefineryKRPCs();
                        this.fetchRefineryWRPCs();
                        this.fetchRefineryPHRCs();
                        this.fetchRefineryPHRCNews();
                        this.fetchRefineryPerformanceUtilizations();
                        this.fetchTruckOuts();
                        this.fetchTruckOutMarketers();
                        this.fetchTerminalOperations();
                        this.fetchTerminalOperationApplications();
                    }
                    else
                    {
                        toastr.error('Error occurred While Uploading ' + this.modal_header + ' : ' + err)
                        .catch(err => console.log(err)); 
                    }
                })    
                $('#filed').val('');            
                $('#uploadModal').trigger('click');
                
            },


            setModaleHeader(modal_header, type)
            {
                this.modal_header = modal_header;
                this.type = type;
            }


        }
        
    };


</script>

