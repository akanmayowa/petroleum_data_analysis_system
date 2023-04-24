
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
                            <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Weekly Activities For Upstream Division </h4>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control pull-right m-b-2" placeholder="Search" v-model="search" style="width: 60%;" />
                        </div>
                    </div>   
                    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#acq" role="tab" @click="globalPagination(acquisition_data)">ACQUISITION </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dri" role="tab" @click="globalPagination(drilling_data)">DRILLING </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#ops" role="tab" @click="globalPagination(entry_data)">RE-ENRTY </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#rig" role="tab" @click="globalPagination(rig_data)">RIG </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#fdp" role="tab" @click="globalPagination(fdp_data)">FDP </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dep" role="tab" @click="globalPagination(depletion_data)">DEPLETION </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cop" role="tab" @click="globalPagination(crude_data)">CRUDE OIL </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#rev" role="tab" @click="globalPagination(revenue_data)">REVENUE </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#unit" role="tab" @click="globalPagination(unit_data)">UNITIZATION </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane p-3" id="acq" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-right: 5px; color: #aaa"> SEISMIC DATA ACQUISITION 
                                        <span class="unit-header"> in 3D(Kms) </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload SEISMIC DATA ACQUISITION" style="background: #202020; color: #fff" @click="setModaleHeader('SEISMIC DATA ACQUISITION', acquisition)">  <i class="fa fa-upload"></i> </button>

                                        <UpstreamExcelExport :data="allAcquisitions" :file_name="'Seismic Data Acquisition'"></UpstreamExcelExport>
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="acquisition_table">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>Siesmic data quantum acquired - 3D Kms</th>
                                                <th>Cumulative Siesmic Acquired - 3D Kms<i class="units"></i></th>
                                                <th>Annual seismic aquisation target - 3D Kms<i class="units"></i></th>
                                                <th>Siesmic data Quantum Processed - 3D Kms<i class="units"></i></th>                                          
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addAcquisitionModal" data-toggle="modal" data-original-title="Enter Upstream Seismic Data Acquisition" @click="clearAcquisitionForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="acquisition in filteredUpstreams" v-bind:key="acquisition.id">
                                                <tr>  
                                                    <th>{{acquisition.date}}</th>
                                                    <th>{{acquisition.week}}</th>
                                                    <th data-toggle="tooltip" title="In 3D Kms">{{acquisition.seismic_data_acquired}}</th>
                                                    <th data-toggle="tooltip" title="In 3D Kms">{{acquisition.cumulative_seismic_acquired}}</th>
                                                    <th data-toggle="tooltip" title="In 3D Kms">{{acquisition.annual_seismic_acquisition}}</th>
                                                    <th data-toggle="tooltip" title="In 3D Kms">{{acquisition.seismic_data_processed}}</th>  
                                                    <th>  
                                                      <a class="pull-right" @click="deleteAcquisition(acquisition.id)"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addAcquisitionModal" @click="editAcquisition(acquisition)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchAcquisitions(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchAcquisitions(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div>                   
                        
                        <div class="tab-pane p-3" id="dri" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> UPSTREAM WELL DRILLING COUNT   <span class="unit-header"></span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload Upstream Well Drilling" style="background: #202020; color: #fff" @click="setModaleHeader('WELL DRILLING COUNT', 'well_drilling')">  <i class="fa fa-upload"></i> </button>
                                        <UpstreamExcelExport :data="well_drillings" :file_name="'Well Drilling Count'"></UpstreamExcelExport> 
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>Exploration Commenced </th>
                                                <th>Exploration Ongoing <i class="units"></i></th>
                                                <th>Exploration Completed <i class="units"></i></th>
                                                <th>Appraisal Commenced </th>
                                                <th>Appraisal Ongoing <i class="units"></i></th>
                                                <th>Appraisal Completed <i class="units"></i></th>
                                                <th>Development Commenced </th>
                                                <th>Development Ongoing <i class="units"></i></th>
                                                <th>Development Completed <i class="units"></i></th>
                                                <th>Well Completion </th>
                                                <th>Well Spudded <i class="units"></i></th>
                                                <th>Drilling Rig  <i class="units"></i></th>                                         
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addDrillingModal" data-toggle="modal" data-original-title="Enter Upstream Well Drilling Count" @click="clearDrillingForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="well_drilling in filteredDrillings" v-bind:key="well_drilling.id">
                                                <tr>  
                                                    <th>{{well_drilling.date}}</th>
                                                    <th>{{well_drilling.week}}</th>
                                                    <th>{{well_drilling.exploration_commenced}}</th>
                                                    <th>{{well_drilling.exploration_ongoing}}</th>
                                                    <th>{{well_drilling.exploration_completed}}</th>
                                                    <th>{{well_drilling.appraisal_commenced}}</th> 
                                                    <th>{{well_drilling.appraisal_ongoing}}</th> 
                                                    <th>{{well_drilling.appraisal_completed}}</th> 
                                                    <th>{{well_drilling.development_commenced}}</th> 
                                                    <th>{{well_drilling.development_ongoing}}</th> 
                                                    <th>{{well_drilling.development_completed}}</th> 
                                                    <th>{{well_drilling.well_completion}}</th> 
                                                    <th>{{well_drilling.well_spudded}}</th> 
                                                    <th>{{well_drilling.drilling_rig}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteDrilling(well_drilling.id)"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addDrillingModal" @click="editDrilling(well_drilling)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchDrillings(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchDrillings(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div>   

                        <div class="tab-pane p-3" id="ops" role="tabpanel">
                            <p class="font-14 mb-0">  
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> UPSTREAM WELL RE ENTRY OPERATIONS <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload Well Re Entry" style="background: #202020; color: #fff" @click="setModaleHeader('WELL RE ENTRY OPERATIONS', 're_entry')">  <i class="fa fa-upload"></i> </button>
                                        <UpstreamExcelExport :data="well_re_entries" :file_name="'Well Re-Entry'"></UpstreamExcelExport> 
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>Re-entry Commenced </th>
                                                <th>Re-entry Ongoing <i class="units"></i></th>
                                                <th>Re-entry Completed <i class="units"></i></th>
                                                <th>Workover Commenced </th>
                                                <th>Workover Ongoing <i class="units"></i></th>
                                                <th>Workover Completed <i class="units"></i></th>
                                                <th>Re-entry Completion </th>
                                                <th>Re-entry Workover <i class="units"></i></th>
                                                <th>Re-entry Addition <i class="units"></i></th>
                                                <th>Expected Rate </th>                                        
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addReEntryModal" data-toggle="modal" data-original-title="Enter Upstream Well Re Entry Count" @click="clearReEntryForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="well_re_entry in filteredReEntries" v-bind:key="well_re_entry.id">
                                                <tr>  
                                                    <th>{{well_re_entry.date}}</th>
                                                    <th>{{well_re_entry.week}}</th>
                                                    <th>{{well_re_entry.re_entry_commenced}}</th>
                                                    <th>{{well_re_entry.re_entry_ongoing}}</th>
                                                    <th>{{well_re_entry.re_entry_completed}}</th>
                                                    <th>{{well_re_entry.workover_commenced}}</th> 
                                                    <th>{{well_re_entry.workover_ongoing}}</th> 
                                                    <th>{{well_re_entry.workover_completed}}</th> 
                                                    <th>{{well_re_entry.re_entry_completion}}</th> 
                                                    <th>{{well_re_entry.re_entry_workover}}</th> 
                                                    <th>{{well_re_entry.re_entry_reserve_addition}}</th> 
                                                    <th>{{well_re_entry.well_expected_rate}}</th>  
                                                    <th>  
                                                      <a class="pull-right" @click="deleteReEntry(well_re_entry.id)"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addReEntryModal" @click="editReEntry(well_re_entry)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchReEntrys(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchReEntrys(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                </div> <!-- end row -->
                            </p>
                        </div>   

                        <div class="tab-pane p-3" id="rig" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> UPSTREAM RIG DISPOSITION <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload RIG DISPOSITION" style="background: #202020; color: #fff" @click="setModaleHeader('RIG DISPOSITION', 'rig_disposition')">  <i class="fa fa-upload"></i> </button>
                                        <UpstreamExcelExport :data="rig_dispositions" :file_name="'Rig Disposition'"></UpstreamExcelExport>                                         
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>Active Rigs </th>
                                                <th>Stacked Rigs <i class="units"></i></th>
                                                <th>Rigs on Standby <i class="units"></i></th>
                                                <th>Total Rigs </th>                                      
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addRigDispositionModal" data-toggle="modal" data-original-title="Enter Upstream Rig Dispositions Count" @click="clearRigDispositionForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="rig_disposition in filteredReDispositions" v-bind:key="rig_disposition.id">
                                                <tr>  
                                                    <th>{{rig_disposition.date}}</th>
                                                    <th>{{rig_disposition.week}}</th>
                                                    <th>{{rig_disposition.active_rig}}</th>
                                                    <th>{{rig_disposition.statcked_rig}}</th>
                                                    <th>{{rig_disposition.rig_on_standby}}</th>
                                                    <th>{{rig_disposition.total_rig}}</th>  
                                                    <th>  
                                                      <a class="pull-right" @click="deleteRigDisposition(rig_disposition.id)"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addRigDispositionModal" @click="editRigDisposition(rig_disposition)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRigDispositions(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRigDispositions(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                </div> <!-- end row -->
                            </p>
                        </div>    

                        <div class="tab-pane p-3" id="fdp" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> UPSTREAM FDP APPLICATION <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="FDP APPLICATION" style="background: #202020; color: #fff" @click="setModaleHeader('FDP APPLICATION', 'fdp_application')">  <i class="fa fa-upload"></i> </button>
                                        <UpstreamExcelExport :data="fdp_applications" :file_name="'FDP Application'"></UpstreamExcelExport> 
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>FDP applications Received</th>
                                                <th>FDP applications Approved<i class="units"></i></th>
                                                <th>Anticipated production Rate(BOPD) <i class="units"></i></th>
                                                <th>Expected Reserve(MMSTB)</th>  
                                                <th>Total cost (MM$)</th>                                     
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addFDPApplicationModal" data-toggle="modal" data-original-title="Enter Upstream FDP Applications Count" @click="clearFDPApplicationForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="fdp_application in filteredFDPApplications" v-bind:key="fdp_application.id">
                                                <tr>  
                                                    <th>{{fdp_application.date}}</th>
                                                    <th>{{fdp_application.week}}</th>
                                                    <th>{{fdp_application.application_received}}</th>
                                                    <th>{{fdp_application.application_approved}}</th>
                                                    <th>{{fdp_application.production_rate}}</th>
                                                    <th>{{fdp_application.expected_reserve}}</th>  
                                                    <th>{{fdp_application.total_cost}}</th>  
                                                    <th>  
                                                      <a class="pull-right" @click="deleteFDPApplication(fdp_application.id)"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addFDPApplicationModal" @click="editFDPApplication(fdp_application)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchFDPApplications(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchFDPApplications(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                </div> <!-- end row -->
                            </p>
                        </div>     

                        <div class="tab-pane p-3" id="dep" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> RESERVE, DEPLETION RATE AND LIFE INDEX <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="RESERVE, DEPLETION RATE AND LIFE INDEX" style="background: #202020; color: #fff" @click="setModaleHeader('RESERVE, DEPLETION RATE AND LIFE INDEX', 'depletion_rate')">  <i class="fa fa-upload"></i> </button>
                                        <UpstreamExcelExport :data="depletion_rates" :file_name="'Depletion Rate, Life Index'"></UpstreamExcelExport> 
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>Est annual production-Oil(MMB)</th>
                                                <th>Est annual production-Condensate(MMB)<i class="units"></i></th>
                                                <th>Depletion Rate-Oil (%)<i class="units"></i></th>
                                                <th>Depletion Rate-Condensate (%)</th>  
                                                <th>Reserves as at {{(new Date).getFullYear()}} Oil(MMB)</th>   
                                                <th>Reserves as at {{(new Date).getFullYear()}} Condensate(MMB)</th>  
                                                <th>Life Index-Oil(Years)</th>  
                                                <th>Life Index-Condensate(Years)</th>                                    
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addDepletionRateModal" data-toggle="modal" data-original-title="Enter Upstream FDP Applications Count" @click="clearDepletionRateForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="depletion_rate in filteredDepletionRates" v-bind:key="depletion_rate.id">
                                                <tr>  
                                                    <th>{{depletion_rate.date}}</th>
                                                    <th>{{depletion_rate.week}}</th>
                                                    <th>{{depletion_rate.annual_production_oil}}</th>
                                                    <th>{{depletion_rate.annual_production_condensate}}</th>
                                                    <th>{{depletion_rate.depletion_rate_oil}}</th>
                                                    <th>{{depletion_rate.depletion_rate_condensate}}</th>  
                                                    <th>{{depletion_rate.year_start_reserve_oil}}</th>   
                                                    <th>{{depletion_rate.year_start_reserve_condensate}}</th>  
                                                    <th>{{depletion_rate.life_index_oil}}</th>  
                                                    <th>{{depletion_rate.life_index_condensate}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteDepletionRate(depletion_rate.id)"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addDepletionRateModal" @click="editDepletionRate(depletion_rate)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchDepletionRates(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchDepletionRates(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                </div> <!-- end row -->
                            </p>
                        </div>    

                        <div class="tab-pane p-3" id="cop" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> CRUDE OIL PRODUCTION <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="CRUDE OIL PRODUCTION" style="background: #202020; color: #fff" @click="setModaleHeader('CRUDE OIL PRODUCTION', 'crude_oil_production')">  <i class="fa fa-upload"></i> </button>
                                        <UpstreamExcelExport :data="crude_oil_productions" :file_name="'Crude Oil Production'"></UpstreamExcelExport> 
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>No of Avg Oil & Condensate Prod(BOPD)</th>
                                                <th>No of Deferment (BOPD)<i class="units"></i></th>
                                                <th>No of Producing Companies<i class="units"></i></th>
                                                <th>No of Producing Fields</th>  
                                                <th>No of Shut-in Fields</th>                                      
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addCrudeOilProductionModal" data-toggle="modal" data-original-title="Enter Upstream FDP Applications Count" @click="clearCrudeOilProductionForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="crude_oil_production in filteredCrudeOilProds" v-bind:key="crude_oil_production.id">
                                                <tr>  
                                                    <th>{{crude_oil_production.date}}</th>
                                                    <th>{{crude_oil_production.week}}</th>
                                                    <th>{{crude_oil_production.avg_oil_condensate_production}}</th>
                                                    <th>{{crude_oil_production.deferment}}</th>
                                                    <th>{{crude_oil_production.producing_companies}}</th>
                                                    <th>{{crude_oil_production.producing_field}}</th>  
                                                    <th>{{crude_oil_production.shut_in_field}}</th>   
                                                    <th>  
                                                      <a class="pull-right" @click="deleteCrudeOilProduction(crude_oil_production.id)"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addCrudeOilProductionModal" @click="editCrudeOilProduction(crude_oil_production)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchCrudeOilProductions(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchCrudeOilProductions(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                </div> <!-- end row -->
                            </p>
                        </div>    

                        <div class="tab-pane p-3" id="rev" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa">REVENUE GENERATED<span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#addre" data-toggle="modal" data-original-title="Upload REVENUE GENERATED" style="background: #202020; color: #fff" @click="setModaleHeader('REVENUE GENERATED', 'revenue_generated')">  <i class="fa fa-upload"></i> </button>
                                        <UpstreamExcelExport :data="revenue_generateds" :file_name="'Revenue Generation'"></UpstreamExcelExport> 
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>Amount of Revenue generated from Proposal/request(N)</th>                                     
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addRevenueGeneratedModal" data-toggle="modal" data-original-title="Enter Upstream Amount of Revenue generated from Proposal/request(N) Count" @click="clearRevenueGeneratedForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="revenue_generated in filteredRevenueGenerateds" v-bind:key="revenue_generated.id">
                                                <tr>  
                                                    <th>{{revenue_generated.date}}</th>
                                                    <th>{{revenue_generated.week}}</th>
                                                    <th>{{revenue_generated.revenue_generated}}</th>   
                                                    <th>  
                                                      <a class="pull-right" @click="deleteRevenueGenerated(revenue_generated.id)"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addRevenueGeneratedModal" @click="editRevenueGenerated(revenue_generated)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRevenueGenerateds(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchRevenueGenerateds(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                </div> <!-- end row -->
                            </p>
                        </div>   

                        <div class="tab-pane p-3" id="unit" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa">Unitization<span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload UNITIZATION" style="background: #202020; color: #fff" @click="setModaleHeader('UNITIZATION', 'unitization')">  <i class="fa fa-upload"></i> </button>
                                        <UpstreamExcelExport :data="unitizations" :file_name="'Unitization'"></UpstreamExcelExport> 
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>No of unitized fields</th>                                     
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addUnitizationModal" data-toggle="modal" data-original-title="Enter Upstream No of unitized fields Count" @click="clearUnitizationForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="unitization in filteredUnitizations" v-bind:key="unitization.id">
                                                <tr>  
                                                    <th>{{unitization.date}}</th>
                                                    <th>{{unitization.week}}</th>
                                                    <th>{{unitization.unitized_field}}</th>   
                                                    <th>  
                                                      <a class="pull-right" @click="deleteUnitization(unitization.id)"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addUnitizationModal" @click="editUnitization(unitization)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchUnitizations(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchUnitizations(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                </div> <!-- end row -->
                            </p>
                        </div>    
                    </div>

                </div>
            </div>
        </div>







        <!-- Add Acquisition modal -->
        <form @submit.prevent="addAcquisition" class="form-horizontal">
            <div id="addAcquisitionModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> Upstream Seismic Date Acquisition </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="acquisition.week" required>
                                <option value=""> Select Acquisition Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="acquisition.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="acquisition.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="seismic_data_acquired" class="col-sm-3 col-form-label"> Siesmic data acquired </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" placeholder="Siesmic data quantum acquired" v-model="acquisition.seismic_data_acquired" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="cumulative_seismic_acquired" class="col-sm-3 col-form-label"> Cumulative Siesmic Acquired </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" placeholder="No of Cumulative Siesmic Acquired" v-model="acquisition.cumulative_seismic_acquired">
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="annual_seismic_acquisition" class="col-sm-3 col-form-label">Annual seismic aquisation</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" placeholder="No of Annual work program seismic aquisation target 3D(km2)" v-model="acquisition.annual_seismic_acquisition">
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="seismic_data_processed" class="col-sm-3 col-form-label">Siesmic data Quantum Processed </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" placeholder="No of Siesmic data Quantum Processed 3D(Km2)" v-model="acquisition.seismic_data_processed">
                        </div>
                      </div> 

                                      


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Acquisition </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add Drilling modal -->
        <form @submit.prevent="addDrilling" class="form-horizontal">
            <div id="addDrillingModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> Upstream Well Drilling Count </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="well_drilling.week" required>
                                <option value=""> Select Drilling Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="well_drilling.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="well_drilling.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="exploration_commenced" class="col-sm-3 col-form-label"> Exploration Drilling Commenced </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_drilling.exploration_commenced" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="exploration_ongoing" class="col-sm-3 col-form-label"> Exploration Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_drilling.exploration_ongoing" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="exploration_completed" class="col-sm-3 col-form-label">Exploration Drilling Completed</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_drilling.exploration_completed" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="appraisal_commenced" class="col-sm-3 col-form-label">Appraisal Drilling Commenced </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_drilling.appraisal_commenced" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="appraisal_ongoing" class="col-sm-3 col-form-label">Appraisal Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_drilling.appraisal_ongoing" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="appraisal_completed" class="col-sm-3 col-form-label">Appraisal Drilling Completed </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_drilling.appraisal_completed" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="development_commenced" class="col-sm-3 col-form-label">Development Drilling Commenced </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_drilling.development_commenced" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="development_ongoing" class="col-sm-3 col-form-label">Development Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_drilling.development_ongoing" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="development_completed" class="col-sm-3 col-form-label">Development Drilling Completed </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_drilling.development_completed" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="well_completion" class="col-sm-3 col-form-label">Well Completion  </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_drilling.well_completion" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="well_spudded" class="col-sm-3 col-form-label">Well Spudded  </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_drilling.well_spudded" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="drilling_rig" class="col-sm-3 col-form-label">Drilling Rig </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_drilling.drilling_rig" required>
                        </div>
                      </div>

                                      


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Well Drilling </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>


        <!-- Add Re Entry modal -->
        <form @submit.prevent="addReEntry" class="form-horizontal">
            <div id="addReEntryModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> Upstream Well Re Entry Count </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="well_re_entry.week" required>
                                <option value=""> Select re_entry Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="well_re_entry.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="well_re_entry.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="re_entry_commenced" class="col-sm-3 col-form-label"> Well re_entry Commenced </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_re_entry.re_entry_commenced" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="re_entry_ongoing" class="col-sm-3 col-form-label"> Well re_entry Ongoing </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_re_entry.re_entry_ongoing" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="re_entry_completed" class="col-sm-3 col-form-label">Well re_entry Completed</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_re_entry.re_entry_completed" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="workover_commenced" class="col-sm-3 col-form-label">Well re_entry Commenced </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_re_entry.workover_commenced" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="workover_ongoing" class="col-sm-3 col-form-label">Well re_entry Ongoing </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_re_entry.workover_ongoing" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="workover_completed" class="col-sm-3 col-form-label">Well re_entry Completed </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_re_entry.workover_completed" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="re_entry_completion" class="col-sm-3 col-form-label">Well re_entry Completion </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_re_entry.re_entry_completion" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="re_entry_workover" class="col-sm-3 col-form-label">Well re_entry Workover </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_re_entry.re_entry_workover" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="re_entry_reserve_addition" class="col-sm-3 col-form-label">Well re_entry Reserve Addition (MMBO) </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_re_entry.re_entry_reserve_addition" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="well_expected_rate" class="col-sm-3 col-form-label">Well Expected Rate (Bopd) </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="well_re_entry.well_expected_rate" required>
                        </div>
                      </div> 

                                      


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Well Re-Entry </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>


        <!-- Add Rig Disposition modal -->
        <form @submit.prevent="addRigDisposition" class="form-horizontal">
            <div id="addRigDispositionModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> Upstream Rig Disposition Count </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="rig_disposition.week" required>
                                <option value=""> Select re_entry Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="rig_disposition.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="rig_disposition.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="active_rig" class="col-sm-3 col-form-label"> No. of Active Rigs </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="rig_disposition.active_rig" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="statcked_rig" class="col-sm-3 col-form-label"> No. of Stacked Rigs </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="rig_disposition.statcked_rig" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="rig_on_standby" class="col-sm-3 col-form-label"> No. of Rigs on Standby</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="rig_disposition.rig_on_standby" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="total_rig" class="col-sm-3 col-form-label">Total no of Rigs </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="rig_disposition.total_rig" required>
                        </div>
                      </div> 

                                      


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Rig Disposition </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>


        <!-- Add FDP Application modal -->
        <form @submit.prevent="addFDPApplication" class="form-horizontal">
            <div id="addFDPApplicationModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> Upstream FDP Application Count </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="fdp_application.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="fdp_application.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="fdp_application.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> FDP applications Received </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="fdp_application.application_received" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> FDP applications Approved </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="fdp_application.application_approved" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Anticipated production Rate(BOPD)</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="fdp_application.production_rate" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Expected Reserve(MMSTB) </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="fdp_application.expected_reserve" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total cost (MM$) </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="fdp_application.total_cost" required>
                        </div>
                      </div> 

                                      


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add FDP Application </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>


        <!-- Add FDP Application modal -->
        <form @submit.prevent="addDepletionRate" class="form-horizontal">
            <div id="addDepletionRateModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> Upstream Depletion Rate Count </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="depletion_rate.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="depletion_rate.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="depletion_rate.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Estimated annual production-Oil(MMB) </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="depletion_rate.annual_production_oil" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Estimated annual production-Condensate(MMB) </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="depletion_rate.annual_production_condensate" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Depletion Rate-Oil (%) </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="depletion_rate.depletion_rate_oil" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Depletion Rate-Condensate (%) </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="depletion_rate.depletion_rate_condensate" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Reserves as at {{(new Date).getFullYear()}} Oil(MMB) </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="depletion_rate.year_start_reserve_oil" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Reserves as at {{(new Date).getFullYear()}} Condensate(MMB) </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="depletion_rate.year_start_reserve_condensate" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Life Index-Oil(Years) </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="depletion_rate.life_index_oil" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Life Index-Condensate(Years) </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="depletion_rate.life_index_condensate" required>
                        </div>
                      </div> 

                                      


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Depletion Rate </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>


        <!-- Add Crude Oil Production modal -->
        <form @submit.prevent="addCrudeOilProduction" class="form-horizontal">
            <div id="addCrudeOilProductionModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> Upstream Crude Oil Production Count </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="crude_oil_production.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="crude_oil_production.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="crude_oil_production.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> No of Avg Oil & Condensate Prod(BOPD) </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="crude_oil_production.avg_oil_condensate_production" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> No of Deferment (BOPD) </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="crude_oil_production.deferment" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> No of Producing Companies </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="crude_oil_production.producing_companies" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of Producing Fields </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="crude_oil_production.producing_field" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of Shut-in Fields </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="crude_oil_production.shut_in_field" required>
                        </div>
                      </div> 
                                      


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Crude Oil Production </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>


        <!-- Add Revenue Generated modal -->
        <form @submit.prevent="addRevenueGenerated" class="form-horizontal">
            <div id="addRevenueGeneratedModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> Revenue generated from Proposal/request(N) </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="revenue_generated.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="revenue_generated.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="revenue_generated.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Amount of Revenue generated from Proposal/request(N) </label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="revenue_generated.revenue_generated" required>
                        </div>
                      </div>         


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Revenue Generated </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>


        <!-- Add Status Of Unitization modal -->
        <form @submit.prevent="addUnitization" class="form-horizontal">
            <div id="addUnitizationModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> STATUS OF UNITIZATION </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="unitization.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="unitization.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="unitization.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> STATUS OF UNITIZATION </label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="unitization.unitized_field" required>
                        </div>
                      </div>         


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Unitization </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Upload Upstream modal -->
        <form @submit.prevent="uploadUpstreamDataExcel" class="form-horizontal">
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
                allAcquisitions: [],
                search: '',
                weeks: [],
                acquisitions: [], 
                acquisition: {
                    id: '',
                    date: '',
                    week: '',
                    seismic_data_acquired: '',
                    cumulative_seismic_acquired: '',
                    annual_seismic_acquisition: '',
                    seismic_data_processed: '',
                    type: 'acquisition',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                well_drillings: [], 
                well_drilling: {
                    id: '',
                    date: '',
                    week: '',
                    exploration_commenced: '',
                    exploration_ongoing: '',
                    exploration_completed: '',
                    appraisal_commenced: '',
                    appraisal_ongoing: '',
                    appraisal_completed: '',
                    development_commenced: '',
                    development_ongoing: '',
                    development_completed: '',
                    well_completion: '',
                    well_spudded: '',
                    drilling_rig: '',
                    type: 'well_drilling',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                well_re_entries: [], 
                well_re_entry: {
                    id: '',
                    date: '',
                    week: '',
                    re_entry_commenced: '',
                    re_entry_ongoing: '',
                    re_entry_completed: '',
                    workover_commenced: '',
                    workover_ongoing: '',
                    workover_completed: '',
                    re_entry_completion: '',
                    re_entry_workover: '',
                    re_entry_reserve_addition: '',
                    well_expected_rate: '',
                    type: 'well_re_entry',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                rig_dispositions: [], 
                rig_disposition: {
                    id: '',
                    date: '',
                    week: '',
                    active_rig: '',
                    statcked_rig: '',
                    rig_on_standby: '',
                    total_rig: '',
                    type: 'rig_disposition',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                fdp_applications: [], 
                fdp_application: {
                    id: '',
                    date: '',
                    week: '',
                    application_received: '',
                    application_approved: '',
                    production_rate: '',
                    expected_reserve: '',
                    total_cost: '',
                    type: 'fdp_application',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                depletion_rates: [], 
                depletion_rate: {
                    id: '',
                    date: '',
                    week: '',
                    annual_production_oil: '',
                    annual_production_condensate: '',
                    depletion_rate_oil: '',
                    depletion_rate_condensate: '',
                    year_start_reserve_oil: '',
                    year_start_reserve_condensate: '',
                    life_index_oil: '',
                    life_index_condensate: '',
                    type: 'depletion_rate',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                crude_oil_productions: [], 
                crude_oil_production: {
                    id: '',
                    date: '',
                    week: '',
                    avg_oil_condensate_production: '',
                    deferment: '',
                    producing_companies: '',
                    producing_field: '',
                    shut_in_field: '',
                    type: 'crude_oil_production',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                revenue_generateds: [], 
                revenue_generated: {
                    id: '',
                    date: '',
                    week: '',
                    revenue_generated: '',
                    type: 'revenue_generated',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                unitizations: [], 
                unitization: {
                    id: '',
                    date: '',
                    week: '',
                    unitized_field: '',
                    type: 'unitization',
                    user_id:window.sessionStorage.getItem('user_id')
                },
                acquisition_id: '',
                well_drilling_id: '',
                well_re_entry_id: '',
                rig_disposition_id: '',
                fdp_application_id: '',
                depletion_rate_id: '',
                crude_oil_production_id: '',
                revenue_generated_id: '',
                unitization_id: '',
                pagination: {},
                acquisition_data:{},
                drilling_data:{},
                entry_data:{},
                rig_data:{},
                fdp_data:{},
                depletion_data:{},
                crude_data:{},
                revenue_data:{},
                unit_data:{},
                modal_header: '',
                type: '',
                edit: false
            }
        },


        created()
        {
            this.fetchWeeks();

            this.fetchAllAcquisitions();
            this.fetchAcquisitions();
            this.fetchAllDrillings();
            this.fetchDrillings();
            this.fetchAllReEntrys();
            this.fetchReEntrys();
            this.fetchAllRigDispositions();
            this.fetchRigDispositions();
            this.fetchAllFDPApplications();
            this.fetchFDPApplications();
            this.fetchAllDepletionRates();
            this.fetchDepletionRates();
            this.fetchAllCrudeOilProductions();
            this.fetchCrudeOilProductions();
            this.fetchAllRevenueGenerateds();
            this.fetchRevenueGenerateds();
            this.fetchAllUnitizations();
            this.fetchUnitizations();
        },

        computed: {
            filteredUpstreams: function()
            {
                return this.acquisitions.filter((acquisition) => {
                    return acquisition.date.toLowerCase().match(this.search.toLowerCase()) || 
                           acquisition.week.toLowerCase().match(this.search.toLowerCase()) || 
                           acquisition.seismic_data_acquired.toString().match(this.search.toString()) || 
                           acquisition.cumulative_seismic_acquired.toString().match(this.search.toString()) || 
                           acquisition.annual_seismic_acquisition.toString().match(this.search.toString()) || 
                           acquisition.seismic_data_processed.toString().match(this.search.toString())  
                });
            },

            filteredDrillings: function()
            {
                return this.well_drillings.filter((well_drilling) => {
                    return well_drilling.date.toLowerCase().match(this.search.toLowerCase()) || 
                           well_drilling.week.toLowerCase().match(this.search.toLowerCase())  || 
                           well_drilling.exploration_commenced.toString().match(this.search.toString()) || 
                           well_drilling.exploration_ongoing.toString().match(this.search.toString()) || 
                           well_drilling.exploration_completed.toString().match(this.search.toString()) || 
                           well_drilling.appraisal_commenced.toString().match(this.search.toString()) || 
                           well_drilling.appraisal_ongoing.toString().match(this.search.toString()) || 
                           well_drilling.appraisal_completed.toString().match(this.search.toString()) || 
                           well_drilling.development_commenced.toString().match(this.search.toString()) || 
                           well_drilling.development_ongoing.toString().match(this.search.toString()) || 
                           well_drilling.development_completed.toString().match(this.search.toString()) || 
                           well_drilling.well_completion.toString().match(this.search.toString()) || 
                           well_drilling.well_spudded.toString().match(this.search.toString()) || 
                           well_drilling.drilling_rig.toString().match(this.search.toString()) 
                });
            },

            filteredReEntries: function()
            {
                return this.well_re_entries.filter((well_re_entry) => {
                    return well_re_entry.date.toLowerCase().match(this.search.toLowerCase()) || 
                           well_re_entry.week.toLowerCase().match(this.search.toLowerCase())  || 
                           well_re_entry.re_entry_commenced.toString().match(this.search.toString()) || 
                           well_re_entry.re_entry_ongoing.toString().match(this.search.toString()) || 
                           well_re_entry.re_entry_completed.toString().match(this.search.toString()) || 
                           well_re_entry.workover_commenced.toString().match(this.search.toString()) || 
                           well_re_entry.workover_ongoing.toString().match(this.search.toString()) || 
                           well_re_entry.workover_completed.toString().match(this.search.toString()) || 
                           well_re_entry.re_entry_completion.toString().match(this.search.toString()) || 
                           well_re_entry.re_entry_workover.toString().match(this.search.toString()) || 
                           well_re_entry.re_entry_reserve_addition.toString().match(this.search.toString()) || 
                           well_re_entry.well_expected_rate.toString().match(this.search.toString()) 
                });
            },

            filteredReDispositions: function()
            {
                return this.rig_dispositions.filter((rig_disposition) => {
                    return rig_disposition.date.toLowerCase().match(this.search.toLowerCase()) || 
                           rig_disposition.week.toLowerCase().match(this.search.toLowerCase())  || 
                           rig_disposition.active_rig.toString().match(this.search.toString()) || 
                           rig_disposition.statcked_rig.toString().match(this.search.toString()) || 
                           rig_disposition.rig_on_standby.toString().match(this.search.toString()) || 
                           rig_disposition.total_rig.toString().match(this.search.toString()) 
                });
            },

            filteredFDPApplications: function()
            {
                return this.fdp_applications.filter((fdp_application) => {
                    return fdp_application.date.toLowerCase().match(this.search.toLowerCase()) || 
                           fdp_application.week.toLowerCase().match(this.search.toLowerCase())  || 
                           fdp_application.application_received.toString().match(this.search.toString()) || 
                           fdp_application.application_approved.toString().match(this.search.toString()) || 
                           fdp_application.production_rate.toString().match(this.search.toString()) || 
                           fdp_application.expected_reserve.toString().match(this.search.toString()) || 
                           fdp_application.total_cost.toString().match(this.search.toString())  
                });
            },

            filteredDepletionRates: function()
            {
                return this.depletion_rates.filter((depletion_rate) => {
                    return depletion_rate.date.toLowerCase().match(this.search.toLowerCase()) || 
                           depletion_rate.week.toLowerCase().match(this.search.toLowerCase())  || 
                           depletion_rate.annual_production_oil.toString().match(this.search.toString()) || 
                           depletion_rate.annual_production_condensate.toString().match(this.search.toString()) || 
                           depletion_rate.depletion_rate_oil.toString().match(this.search.toString()) || 
                           depletion_rate.depletion_rate_condensate.toString().match(this.search.toString()) || 
                           depletion_rate.year_start_reserve_oil.toString().match(this.search.toString()) || 
                           depletion_rate.year_start_reserve_condensate.toString().match(this.search.toString()) || 
                           depletion_rate.life_index_oil.toString().match(this.search.toString()) || 
                           depletion_rate.life_index_condensate.toString().match(this.search.toString())
                });
            },

            filteredCrudeOilProds: function()
            {
                return this.crude_oil_productions.filter((crude_oil_production) => {
                    return crude_oil_production.date.toLowerCase().match(this.search.toLowerCase()) || 
                           crude_oil_production.week.toLowerCase().match(this.search.toLowerCase())  || 
                           crude_oil_production.avg_oil_condensate_production.toString().match(this.search.toString()) || 
                           crude_oil_production.deferment.toString().match(this.search.toString()) || 
                           crude_oil_production.producing_companies.toString().match(this.search.toString()) || 
                           crude_oil_production.producing_field.toString().match(this.search.toString()) || 
                           crude_oil_production.shut_in_field.toString().match(this.search.toString()) 
                });
            },

            filteredRevenueGenerateds: function()
            {
                return this.revenue_generateds.filter((revenue_generated) => {
                    return revenue_generated.date.toLowerCase().match(this.search.toLowerCase()) || 
                           revenue_generated.week.toLowerCase().match(this.search.toLowerCase())  || 
                           revenue_generated.revenue_generated.toString().match(this.search.toString()) 
                });
            },

            filteredUnitizations: function()
            {
                return this.unitizations.filter((unitization) => {
                    return unitization.date.toLowerCase().match(this.search.toLowerCase()) || 
                           unitization.week.toLowerCase().match(this.search.toLowerCase())  || 
                           unitization.unitized_field.toString().match(this.search.toString())
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







            fetchAllAcquisitions(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-upstreams?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.acquisition_data = res;
                    this.allAcquisitions = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchAcquisitions(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-upstreams'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.acquisition_data = res;
                    this.acquisitions = res.data;
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

            deleteAcquisition(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Acquisition ?'))
                {
                    fetch(`api/war-upstream/${id}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Upstream Acquisition Has Been Deleted Successfully');
                        this.fetchAcquisitions();
                    })
                    .catch(err => console.log(err));
                }
            },

            addAcquisition()
            {
                if(this.edit === false)
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.acquisition),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearAcquisitionForm()
                        toastr.success('Upstream Acquisition Has Been Add Successfully');
                        this.fetchAcquisitions();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addAcquisitionModal').trigger('click');

                }
                else
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.acquisition),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearAcquisitionForm();
                        toastr.success('Upstream Acquisition Has Been Updated Successfully');
                        this.fetchAcquisitions();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addAcquisitionModal').trigger('click');
                }
            },

            editAcquisition(acquisition)
            {
                this.edit = true;
                this.acquisition.id = acquisition.id;
                this.acquisition.acquisition_id = acquisition.id;
                this.acquisition.date = acquisition.date;
                this.acquisition.week = acquisition.week;
                this.acquisition.seismic_data_acquired = acquisition.seismic_data_acquired;
                this.acquisition.cumulative_seismic_acquired = acquisition.cumulative_seismic_acquired;
                this.acquisition.annual_seismic_acquisition = acquisition.annual_seismic_acquisition;
                this.acquisition.seismic_data_processed = acquisition.seismic_data_processed;
            },

            clearAcquisitionForm()
            {
                this.acquisition.id = '';
                this.acquisition.date = '';
                this.acquisition.week = '';
                this.acquisition.seismic_data_acquired = '';
                this.acquisition.cumulative_seismic_acquired = '';
                this.acquisition.annual_seismic_acquisition = '';
                this.acquisition.seismic_data_processed = '';
            },




            //DRILLING
            fetchAllDrillings(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-drillings?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.drilling_data = res;
                    this.allDrillings = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchDrillings(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-drillings'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.drilling_data = res;
                    this.well_drillings = res.data;
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

            deleteDrilling(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Well Drilling ?'))
                {
                    fetch(`api/war-upstream/${id}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Upstream Well Drilling Has Been Deleted Successfully');
                        this.fetchDrillings();
                    })
                    .catch(err => console.log(err));
                }
            },

            addDrilling()
            {
                if(this.edit === false)
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.well_drilling),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearDrillingForm()
                        toastr.success('Upstream Well Drilling Has Been Add Successfully');
                        this.fetchDrillings();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addDrillingModal').trigger('click');

                }
                else
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.well_drilling),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearDrillingForm();
                        toastr.success('Upstream Drilling Has Been Updated Successfully');
                        this.fetchDrillings();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addDrillingModal').trigger('click');
                }
            },

            editDrilling(well_drilling)
            {
                this.edit = true;
                this.well_drilling.id = well_drilling.id;
                this.well_drilling.well_drilling_id = well_drilling.id;
                this.well_drilling.date = well_drilling.date;
                this.well_drilling.week = well_drilling.week;
                this.well_drilling.exploration_commenced = well_drilling.exploration_commenced;
                this.well_drilling.exploration_ongoing = well_drilling.exploration_ongoing;
                this.well_drilling.exploration_completed = well_drilling.exploration_completed;
                this.well_drilling.appraisal_commenced = well_drilling.appraisal_commenced;
                this.well_drilling.appraisal_ongoing = well_drilling.appraisal_ongoing;
                this.well_drilling.appraisal_completed = well_drilling.appraisal_completed;
                this.well_drilling.development_commenced = well_drilling.development_commenced;
                this.well_drilling.development_ongoing = well_drilling.development_ongoing;
                this.well_drilling.development_completed = well_drilling.development_completed;
                this.well_drilling.well_completion = well_drilling.well_completion;
                this.well_drilling.well_spudded = well_drilling.well_spudded;
                this.well_drilling.drilling_rig = well_drilling.drilling_rig;
            },

            clearDrillingForm()
            {
                this.well_drilling.id = '';
                this.well_drilling.date = '';
                this.well_drilling.week = '';
                this.well_drilling.exploration_commenced = '';
                this.well_drilling.exploration_ongoing = '';
                this.well_drilling.exploration_completed = '';
                this.well_drilling.appraisal_commenced = '';
                this.well_drilling.appraisal_ongoing = '';
                this.well_drilling.appraisal_completed = '';
                this.well_drilling.development_commenced = '';
                this.well_drilling.development_ongoing = '';
                this.well_drilling.development_completed = '';
                this.well_drilling.well_completion = '';
                this.well_drilling.well_spudded = '';
                this.well_drilling.drilling_rig = '';
            },




            //RE ENTRY
            fetchAllReEntrys(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-re-entries?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.entry_data = res;
                    this.allReEntrys = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchReEntrys(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-re-entries'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.entry_data = res;
                    this.well_re_entries = res.data;
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

            deleteReEntry(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Well Re Entry ?'))
                {
                    fetch(`api/war-upstream/${id}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Upstream Well Re Entry Has Been Deleted Successfully');
                        this.fetchReEntrys();
                    })
                    .catch(err => console.log(err));
                }
            },

            addReEntry()
            {
                if(this.edit === false)
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.well_re_entry),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {

                        // this.clearReEntryForm()
                        $('#addReEntryModal').target.reset();
                        toastr.success('Upstream Well Re Entry Has Been Add Successfully');
                        this.fetchReEntrys();
                        this.edit = false;
                    })
                    .catch(err => console.log(err)); 
                    $('#addReEntryModal').trigger('click');

                }
                else
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.well_re_entry),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        // this.clearReEntryForm();
                        $('#addReEntryModal').target.reset();
                        toastr.success('Upstream Re Entry Has Been Updated Successfully');
                        this.fetchReEntrys();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addReEntryModal').trigger('click');
                }
            },

            editReEntry(well_re_entry)
            {
                this.edit = true;
                this.well_re_entry.id = well_re_entry.id;
                this.well_re_entry.well_re_entry_id = well_re_entry.id;
                this.well_re_entry.date = well_re_entry.date;
                this.well_re_entry.week = well_re_entry.week;
                this.well_re_entry.re_entry_commenced = well_re_entry.re_entry_commenced;
                this.well_re_entry.re_entry_ongoing = well_re_entry.re_entry_ongoing;
                this.well_re_entry.re_entry_completed = well_re_entry.re_entry_completed;
                this.well_re_entry.workover_commenced = well_re_entry.workover_commenced;
                this.well_re_entry.workover_ongoing = well_re_entry.workover_ongoing;
                this.well_re_entry.workover_completed = well_re_entry.workover_completed;
                this.well_re_entry.re_entry_completion = well_re_entry.re_entry_completion;
                this.well_re_entry.re_entry_workover = well_re_entry.re_entry_workover;
                this.well_re_entry.re_entry_reserve_addition = well_re_entry.re_entry_reserve_addition;
                this.well_re_entry.well_expected_rate = well_re_entry.well_expected_rate;
            },

            clearReEntryForm()
            {
                this.well_re_entry.id = '';
                this.well_re_entry.date = '';
                this.well_re_entry.week = '';
                this.well_re_entry.re_entry_commenced = '';
                this.well_re_entry.re_entry_ongoing = '';
                this.well_re_entry.re_entry_completed = '';
                this.well_re_entry.workover_commenced = '';
                this.well_re_entry.workover_ongoing = '';
                this.well_re_entry.workover_completed = '';
                this.well_re_entry.re_entry_completion = '';
                this.well_re_entry.re_entry_workover = '';
                this.well_re_entry.re_entry_reserve_addition = '';
                this.well_re_entry.well_expected_rate = '';
            },




            //RIG DISPOSITION
            fetchAllRigDispositions(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-rig-dispositions?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.rig_data = res;
                    this.allRigDispositions = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchRigDispositions(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-rig-dispositions'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.rig_data = res;
                    this.rig_dispositions = res.data;
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

            deleteRigDisposition(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Well Rig Disposition ?'))
                {
                    fetch(`api/war-upstream/${id}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Upstream Well Rig Disposition Has Been Deleted Successfully');
                        this.fetchRigDispositions();
                    })
                    .catch(err => console.log(err));
                }
            },

            addRigDisposition()
            {
                if(this.edit === false)
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.rig_disposition),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {

                        // this.clearRigDispositionForm()
                        toastr.success('Upstream Well Rig Disposition Has Been Add Successfully');
                        this.fetchRigDispositions();
                        this.edit = false;
                    })
                    .catch(err => console.log(err)); 
                    $('#addRigDispositionModal').trigger('click');
                    this.clearRigDispositionForm()
                }
                else
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.rig_disposition),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        // this.clearRigDispositionForm();
                        toastr.success('Upstream Rig Disposition Has Been Updated Successfully');
                        this.fetchRigDispositions();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addRigDispositionModal').trigger('click');
                    this.clearRigDispositionForm()                }
            },

            editRigDisposition(rig_disposition)
            {
                this.edit = true;
                this.rig_disposition.id = rig_disposition.id;
                this.rig_disposition.rig_disposition_id = rig_disposition.id;
                this.rig_disposition.date = rig_disposition.date;
                this.rig_disposition.week = rig_disposition.week;
                this.rig_disposition.active_rig = rig_disposition.active_rig;
                this.rig_disposition.statcked_rig = rig_disposition.statcked_rig;
                this.rig_disposition.rig_on_standby = rig_disposition.rig_on_standby;
                this.rig_disposition.total_rig = rig_disposition.total_rig;
            },

            clearRigDispositionForm()
            {
                this.rig_disposition.id = '';
                this.rig_disposition.date = '';
                this.rig_disposition.week = '';
                this.rig_disposition.active_rig = '';
                this.rig_disposition.statcked_rig = '';
                this.rig_disposition.rig_on_standby = '';
                this.rig_disposition.total_rig = '';
            },




            //FDP APPLICATION
            fetchAllFDPApplications(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-fdp-applications?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.fdp_data = res;
                    this.allFDPApplications = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchFDPApplications(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-fdp-applications'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.fdp_data = res;
                    this.fdp_applications = res.data;
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

            deleteFDPApplication(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This FDP Application ?'))
                {
                    fetch(`api/war-upstream/${id}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Upstream FDP Application Has Been Deleted Successfully');
                        this.fetchFDPApplications();
                    })
                    .catch(err => console.log(err));
                }
            },

            addFDPApplication()
            {
                if(this.edit === false)
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.fdp_application),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {

                        // this.clearFDPApplicationForm()
                        toastr.success('Upstream FDP Application Has Been Add Successfully');
                        this.fetchFDPApplications();
                        this.edit = false;
                    })
                    .catch(err => console.log(err)); 
                    $('#addFDPApplicationModal').trigger('click');
                    this.clearFDPApplicationForm()
                }
                else
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.fdp_application),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        // this.clearFDPApplicationForm();
                        toastr.success('Upstream FDP Application Has Been Updated Successfully');
                        this.fetchFDPApplications();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addFDPApplicationModal').trigger('click');
                    this.clearFDPApplicationForm()                }
            },

            editFDPApplication(fdp_application)
            {
                this.edit = true;
                this.fdp_application.id = fdp_application.id;
                this.fdp_application.fdp_application_id = fdp_application.id;
                this.fdp_application.date = fdp_application.date;
                this.fdp_application.week = fdp_application.week;
                this.fdp_application.application_received = fdp_application.application_received;
                this.fdp_application.application_approved = fdp_application.application_approved;
                this.fdp_application.production_rate = fdp_application.production_rate;
                this.fdp_application.expected_reserve = fdp_application.expected_reserve;
                this.fdp_application.total_cost = fdp_application.total_cost;
            },

            clearFDPApplicationForm()
            {
                this.fdp_application.id = '';
                this.fdp_application.date = '';
                this.fdp_application.week = '';
                this.fdp_application.application_received = '';
                this.fdp_application.application_approved = '';
                this.fdp_application.production_rate = '';
                this.fdp_application.expected_reserve = '';
                this.fdp_application.total_cost = '';
            },




            //DEPLETION RATE
            fetchAllDepletionRates(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-depletion-rates?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.depletion_data = res;
                    this.allDepletionRates = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchDepletionRates(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-depletion-rates'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.depletion_data = res;
                    this.depletion_rates = res.data;
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

            deleteDepletionRate(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Depletion Rate ?'))
                {
                    fetch(`api/war-upstream/${id}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Upstream Depletion Rate Has Been Deleted Successfully');
                        this.fetchDepletionRates();
                    })
                    .catch(err => console.log(err));
                }
            },

            addDepletionRate()
            {
                if(this.edit === false)
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.depletion_rate),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {

                        // this.clearDepletionRateForm()
                        toastr.success('Upstream Depletion Rate Has Been Add Successfully');
                        this.fetchDepletionRates();
                        this.edit = false;
                    })
                    .catch(err => console.log(err)); 
                    $('#addDepletionRateModal').trigger('click');
                    this.clearDepletionRateForm()
                }
                else
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.depletion_rate),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        // this.clearDepletionRateForm();
                        toastr.success('Upstream Depletion Rate Has Been Updated Successfully');
                        this.fetchDepletionRates();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addDepletionRateModal').trigger('click');
                    this.clearDepletionRateForm()                }
            },

            editDepletionRate(depletion_rate)
            {
                this.edit = true;
                this.depletion_rate.id = depletion_rate.id;
                this.depletion_rate.depletion_rate_id = depletion_rate.id;
                this.depletion_rate.date = depletion_rate.date;
                this.depletion_rate.week = depletion_rate.week;
                this.depletion_rate.annual_production_oil = depletion_rate.annual_production_oil;
                this.depletion_rate.annual_production_condensate = depletion_rate.annual_production_condensate;
                this.depletion_rate.depletion_rate_oil = depletion_rate.depletion_rate_oil;
                this.depletion_rate.depletion_rate_condensate = depletion_rate.depletion_rate_condensate;
                this.depletion_rate.year_start_reserve_oil = depletion_rate.year_start_reserve_oil;
                this.depletion_rate.year_start_reserve_condensate = depletion_rate.year_start_reserve_condensate;
                this.depletion_rate.life_index_oil = depletion_rate.life_index_oil;
                this.depletion_rate.life_index_condensate = depletion_rate.life_index_condensate;
            },

            clearDepletionRateForm()
            {
                this.depletion_rate.id = '';
                this.depletion_rate.date = '';
                this.depletion_rate.week = '';
                this.depletion_rate.annual_production_oil = '';
                this.depletion_rate.annual_production_condensate = '';
                this.depletion_rate.depletion_rate_oil = '';
                this.depletion_rate.depletion_rate_condensate = '';
                this.depletion_rate.year_start_reserve_oil = '';
                this.depletion_rate.year_start_reserve_condensate = '';
                this.depletion_rate.life_index_oil = '';
                this.depletion_rate.life_index_condensate = '';
            },




            //CRUDE OIL PRODUCTION
            fetchAllCrudeOilProductions(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-crude-oil-productions?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.crude_data = res;
                    this.allCrudeOilProductions = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchCrudeOilProductions(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-crude-oil-productions'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.crude_data = res;
                    this.crude_oil_productions = res.data;
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

            deleteCrudeOilProduction(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Crude Oil Production ?'))
                {
                    fetch(`api/war-upstream/${id}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Upstream Crude Oil Production Has Been Deleted Successfully');
                        this.fetchCrudeOilProductions();
                    })
                    .catch(err => console.log(err));
                }
            },

            addCrudeOilProduction()
            {
                if(this.edit === false)
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.crude_oil_production),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {

                        toastr.success('Upstream Crude Oil Production Has Been Add Successfully');
                        this.fetchCrudeOilProductions();
                        this.edit = false;
                    })
                    .catch(err => console.log(err)); 
                    $('#addCrudeOilProductionModal').trigger('click');
                    this.clearCrudeOilProductionForm()
                }
                else
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.crude_oil_production),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Upstream Crude Oil Production Has Been Updated Successfully');
                        this.fetchCrudeOilProductions();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addCrudeOilProductionModal').trigger('click');
                    this.clearCrudeOilProductionForm()                }
            },

            editCrudeOilProduction(crude_oil_production)
            {
                this.edit = true;
                this.crude_oil_production.id = crude_oil_production.id;
                this.crude_oil_production.crude_oil_production_id = crude_oil_production.id;
                this.crude_oil_production.date = crude_oil_production.date;
                this.crude_oil_production.week = crude_oil_production.week;
                this.crude_oil_production.avg_oil_condensate_production = crude_oil_production.avg_oil_condensate_production;
                this.crude_oil_production.deferment = crude_oil_production.deferment;
                this.crude_oil_production.producing_companies = crude_oil_production.producing_companies;
                this.crude_oil_production.producing_field = crude_oil_production.producing_field;
                this.crude_oil_production.shut_in_field = crude_oil_production.shut_in_field;
            },

            clearCrudeOilProductionForm()
            {
                this.crude_oil_production.id = '';
                this.crude_oil_production.date = '';
                this.crude_oil_production.week = '';
                this.crude_oil_production.avg_oil_condensate_production = '';
                this.crude_oil_production.deferment = '';
                this.crude_oil_production.producing_companies = '';
                this.crude_oil_production.producing_field = '';
                this.crude_oil_production.shut_in_field = '';
            },




            //REVENUE GENERATED
            fetchAllRevenueGenerateds(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-revenue-generateds?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.revenue_data = res;
                    this.allRevenueGenerateds = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchRevenueGenerateds(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-revenue-generateds'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.revenue_data = res;
                    this.revenue_generateds = res.data;
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

            deleteRevenueGenerated(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Revenue Generated ?'))
                {
                    fetch(`api/war-upstream/${id}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Upstream Revenue Generated Has Been Deleted Successfully');
                        this.fetchRevenueGenerateds();
                    })
                    .catch(err => console.log(err));
                }
            },

            addRevenueGenerated()
            {
                if(this.edit === false)
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.revenue_generated),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {

                        toastr.success('Upstream Revenue Generated Has Been Add Successfully');
                        this.fetchRevenueGenerateds();
                        this.edit = false;
                    })
                    .catch(err => console.log(err)); 
                    $('#addRevenueGeneratedModal').trigger('click');
                    this.clearRevenueGeneratedForm()
                }
                else
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.revenue_generated),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Upstream Revenue Generated Has Been Updated Successfully');
                        this.fetchRevenueGenerateds();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addRevenueGeneratedModal').trigger('click');
                    this.clearRevenueGeneratedForm()                }
            },

            editRevenueGenerated(revenue_generated)
            {
                this.edit = true;
                this.revenue_generated.id = revenue_generated.id;
                this.revenue_generated.revenue_generated_id = revenue_generated.id;
                this.revenue_generated.date = revenue_generated.date;
                this.revenue_generated.week = revenue_generated.week;
                this.revenue_generated.revenue_generated = revenue_generated.revenue_generated;
            },

            clearRevenueGeneratedForm()
            {
                this.revenue_generated.id = '';
                this.revenue_generated.date = '';
                this.revenue_generated.week = '';
                this.revenue_generated.revenue_generated = '';
            },




            //UNITIZATION 
            fetchAllUnitizations(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-unitizations?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.unit_data = res;
                    this.allUnitizations = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchUnitizations(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-unitizations'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.unit_data = res;
                    this.unitizations = res.data;
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

            deleteUnitization(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Status of Unitization ?'))
                {
                    fetch(`api/war-upstream/${id}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Upstream Status of Unitization Has Been Deleted Successfully');
                        this.fetchUnitizations();
                    })
                    .catch(err => console.log(err));
                }
            },

            addUnitization()
            {
                if(this.edit === false)
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.unitization),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {

                        toastr.success('Upstream Status of Unitization Has Been Add Successfully');
                        this.fetchUnitizations();
                        this.edit = false;
                    })
                    .catch(err => console.log(err)); 
                    $('#addUnitizationModal').trigger('click');
                    this.clearUnitizationForm()
                }
                else
                {
                    fetch('api/war-upstream', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.unitization),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Upstream Status of Unitization Has Been Updated Successfully');
                        this.fetchUnitizations();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addUnitizationModal').trigger('click');
                    this.clearUnitizationForm()                }
            },

            editUnitization(unitization)
            {
                this.edit = true;
                this.unitization.id = unitization.id;
                this.unitization.unitization_id = unitization.id;
                this.unitization.date = unitization.date;
                this.unitization.week = unitization.week;
                this.unitization.unitized_field = unitization.unitized_field;
            },

            clearUnitizationForm()
            {
                this.unitization.id = '';
                this.unitization.date = '';
                this.unitization.week = '';
                this.unitization.unitized_field = '';
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


            uploadUpstreamDataExcel()
            {
                var input = document.querySelector('input[type="file"]')

                var data = new FormData()
                data.append('file', input.files[0])
                // data.append('user', 'hubot')

                fetch('api/war-upstream-uploading/'+this.type, 
                {
                    method: 'post',
                    body: data
                })
                .then(data => {
                if (data.ok)
                    {
                        toastr.success(this.modal_header + ' Uploaded Successfully');

                        this.fetchAcquisitions();
                        this.fetchDrillings();
                        this.fetchReEntrys();
                        this.fetchRigDispositions();
                        this.fetchFDPApplications();
                        this.fetchDepletionRates();
                        this.fetchCrudeOilProductions();
                        this.fetchRevenueGenerateds();
                        this.fetchUnitizations();
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

