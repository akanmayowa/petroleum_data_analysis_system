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
                            <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Weekly Activities For Gas Division </h4>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control pull-right m-b-2" placeholder="Search" v-model="search" style="width: 60%;" />
                        </div>
                    </div>
                    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#drill" role="tab" @click="globalPagination(drilling_data)">DRILLING </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#re" role="tab" @click="globalPagination(re_entry_data)">RE ENTRY </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#fdp" role="tab" @click="globalPagination(fdp_data)">FDP </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dep" role="tab" @click="globalPagination(depletion_data)">DEPLETION </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#puf" role="tab" @click="globalPagination(production_data)">PRODUCTION </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#util" role="tab" @click="globalPagination(utilization_data)">UTILIZATION </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#fla" role="tab" @click="globalPagination(flared_data)">FLARED </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dom" role="tab" @click="globalPagination(dgso_data)">DGSO </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#exp" role="tab">GAS EXPORT </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">  
                        <div class="tab-pane p-3" id="drill" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> GAS DRILLING ACTIVITIES (APPROVALS)  <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload GAS DRILLING ACTIVITIES" style="background: #202020; color: #fff" @click="setModaleHeader('GAS DRILLING ACTIVITIES', 'drilling')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="gas_drillings" :file_name="'GAS DRILLING'"></UpstreamExcelExport>
                                        
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
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addDrillingModal" data-toggle="modal" data-original-title="Enter Gas Drilling Activities" @click="clearDrillingForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="gas_drilling in filteredDrillings" v-bind:key="gas_drilling.id">
                                                <tr>  
                                                    <th>{{gas_drilling.date}}</th>
                                                    <th>{{gas_drilling.week}}</th>
                                                    <th>{{gas_drilling.exploration_commenced}}</th>
                                                    <th>{{gas_drilling.exploration_ongoing}}</th>
                                                    <th>{{gas_drilling.exploration_completed}}</th>
                                                    <th>{{gas_drilling.appraisal_commenced}}</th> 
                                                    <th>{{gas_drilling.appraisal_ongoing}}</th> 
                                                    <th>{{gas_drilling.appraisal_completed}}</th> 
                                                    <th>{{gas_drilling.development_commenced}}</th> 
                                                    <th>{{gas_drilling.development_ongoing}}</th> 
                                                    <th>{{gas_drilling.development_completed}}</th> 
                                                    <th>{{gas_drilling.well_completion}}</th> 
                                                    <th>{{gas_drilling.well_spudded}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteDrilling(gas_drilling.id, 'gas_drilling')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addDrillingModal" @click="editDrilling(gas_drilling)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
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

                        <div class="tab-pane p-3" id="re" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> GAS WEll RE-ENTRY OPERATIONS <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload WEll RE-ENTRY" style="background: #202020; color: #fff" @click="setModaleHeader('WEll RE-ENTRY', 're_entry')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="gas_re_entries" :file_name="'Well re_entry'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>Completion </th>
                                                <th>Workover <i class="units"></i></th>
                                                <th>Total Reserve addition(Bscf)<i class="units"></i></th>
                                                <th>Expected Rate(MMscf/d) </th>                                        
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addReEntryModal" data-toggle="modal" data-original-title="Enter Gas Re Entry Activities" @click="clearReEntryForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="gas_re_entry in filteredReEntries" v-bind:key="gas_re_entry.id">
                                                <tr>  
                                                    <th>{{gas_re_entry.date}}</th>
                                                    <th>{{gas_re_entry.week}}</th>
                                                    <th>{{gas_re_entry.completion}}</th>
                                                    <th>{{gas_re_entry.workover}}</th>
                                                    <th>{{gas_re_entry.total_reserve_addition}}</th>
                                                    <th>{{gas_re_entry.expected_rate}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteReEntry(gas_re_entry.id, 'gas_re_entry')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addReEntryModal" @click="editReEntry(gas_re_entry)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchReEntries(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchReEntries(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="fdp" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> GAS FIELD DEV. PLAN APPROVALS <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload FIELD DEV. PLAN" style="background: #202020; color: #fff" @click="setModaleHeader('FIELD DEV. PLAN', 'fdp')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="gas_fdps" :file_name="'FIELD DEV PLAN'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>No. of FDP application Received </th>
                                                <th>No. of FDP application Approved <i class="units"></i></th>
                                                <th>Reserves(BSCF)<i class="units"></i></th>                                      
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addFDPModal" data-toggle="modal" data-original-title="Enter FIELD DEV. PLAN APPROVALS" @click="clearFDPForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="gas_fdp in filteredFDPs" v-bind:key="gas_fdp.id">
                                                <tr>  
                                                    <th>{{gas_fdp.date}}</th>
                                                    <th>{{gas_fdp.week}}</th>
                                                    <th>{{gas_fdp.application_received}}</th>
                                                    <th>{{gas_fdp.application_approved}}</th>
                                                    <th>{{gas_fdp.reserves}}</th>
                                                    <th>  
                                                      <a class="pull-right" @click="deleteFDP(gas_fdp.id, 'gas_fdp')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addFDPModal" @click="editFDP(gas_fdp)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchFDPs(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchFDPs(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="dep" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> RESERVE, DEPLETION RATE AND LIFE INDEX <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload RESERVE, DEPLETION RATE AND LIFE INDEX" style="background: #202020; color: #fff" @click="setModaleHeader('RESERVE, DEPLETION RATE AND LIFE INDEX', 'depletion')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="gas_depletion_rates" :file_name="'Depletion Rate'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>AG. Reserve(TSCF) </th>
                                                <th>NAG. Reserve(TSCF)<i class="units"></i></th>
                                                <th>AG. Depletion rate(%)<i class="units"></i></th>    
                                                <th>NAG. Depletion rate(%)<i class="units"></i></th> 
                                                <th>AG life index(Years)<i class="units"></i></th> 
                                                <th>NAG life index(Years)<i class="units"></i></th>                                   
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addDepletionRateModal" data-toggle="modal" data-original-title="Enter FIELD DEV. PLAN APPROVALS" @click="clearDepletionRateForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="gas_depletion_rate in filteredDepletionRates" v-bind:key="gas_depletion_rate.id">
                                                <tr>  
                                                    <th>{{gas_depletion_rate.date}}</th>
                                                    <th>{{gas_depletion_rate.week}}</th>
                                                    <th>{{gas_depletion_rate.ag_reserves}}</th>
                                                    <th>{{gas_depletion_rate.nag_reserves}}</th>
                                                    <th>{{gas_depletion_rate.ag_depletion}}</th>
                                                    <th>{{gas_depletion_rate.nag_depletion}}</th>
                                                    <th>{{gas_depletion_rate.ag_life_year}}</th>
                                                    <th>{{gas_depletion_rate.nag_life_year}}</th>
                                                    <th>  
                                                      <a class="pull-right" @click="deleteDepletionRate(gas_depletion_rate.id, 'gas_depletion_rate')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addDepletionRateModal" @click="editDepletionRate(gas_depletion_rate)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
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

                                    </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="puf" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> GAS PRODUCTION, UTILIZATION AND FLARE <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload PRODUCTION, UTILIZATION AND FLARE" style="background: #202020; color: #fff" @click="setModaleHeader('PRODUCTION, UTILIZATION AND FLARE', 'production')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="gas_production_utilization_flares" :file_name="'Prod Util Flare'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>AG produced(Mscf)</th>
                                                <th>NAG produced(Mscf)<i class="units"></i></th>
                                                <th>Gas production(Mscf)<i class="units"></i></th>    
                                                <th>Gas Utilized(Mscf)<i class="units"></i></th> 
                                                <th>Gas Flared(Mscf)<i class="units"></i></th> 
                                                <th>Percent Gas Flared % <i class="units"></i></th>                                   
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addProductionUtilizationFlareModal" data-toggle="modal" data-original-title="Enter FIELD DEV. PLAN APPROVALS" @click="clearProductionUtilizationFlareForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="gas_production_utilization_flare in filteredProductionUtilizationFlares" v-bind:key="gas_production_utilization_flare.id">
                                                <tr>  
                                                    <th>{{gas_production_utilization_flare.date}}</th>
                                                    <th>{{gas_production_utilization_flare.week}}</th>
                                                    <th>{{gas_production_utilization_flare.ag_produced}}</th>
                                                    <th>{{gas_production_utilization_flare.nag_produced}}</th>
                                                    <th>{{gas_production_utilization_flare.gas_production}}</th>
                                                    <th>{{gas_production_utilization_flare.gas_utilization}}</th>
                                                    <th>{{gas_production_utilization_flare.gas_flared}}</th>
                                                    <th>{{gas_production_utilization_flare.gas_flared_perc}}</th>
                                                    <th>  
                                                      <a class="pull-right" @click="deleteProductionUtilizationFlare(gas_production_utilization_flare.id, 'gas_production_utilization_flare')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addProductionUtilizationFlareModal" @click="editProductionUtilizationFlare(gas_production_utilization_flare)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchProductionUtilizationFlares(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchProductionUtilizationFlares(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="util" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> GAS UTILIZATION DETAILS <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload GAS UTILIZATION" style="background: #202020; color: #fff" @click="setModaleHeader('GAS UTILIZATION', 'utilization')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="gas_utilizations" :file_name="'Gas Utilized'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>Fuel Gas(Mscf)</th>
                                                <th>Gas lift make-up(Mscf)<i class="units"></i></th>   
                                                <th>Gas re-injection(Mscf)<i class="units"></i></th> 
                                                <th>NGL/LPG Feed Gas(Mscf)<i class="units"></i></th> 
                                                <th>Gas to IPP(Mscf)<i class="units"></i></th>  
                                                <th>Local supply(Mscf)<i class="units"></i></th> 
                                                <th>Gas Export(Mscf)<i class="units"></i></th>                                    
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addUtilizationModal" data-toggle="modal" data-original-title="Enter FIELD DEV. PLAN APPROVALS" @click="clearUtilizationForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="gas_utilization in filteredUtilizations" v-bind:key="gas_utilization.id">
                                                <tr>  
                                                    <th>{{gas_utilization.date}}</th>
                                                    <th>{{gas_utilization.week}}</th>
                                                    <th>{{gas_utilization.fuel_gas}}</th>
                                                    <th>{{gas_utilization.gas_lift}}</th>
                                                    <th>{{gas_utilization.gas_reinjection}}</th>
                                                    <th>{{gas_utilization.ngl_lpg}}</th>
                                                    <th>{{gas_utilization.gas_to_ipp}}</th>
                                                    <th>{{gas_utilization.local_supply}}</th>
                                                    <th>{{gas_utilization.gas_export}}</th>
                                                    <th>  
                                                      <a class="pull-right" @click="deleteUtilization(gas_utilization.id, 'gas_utilization')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addUtilizationModal" @click="editUtilization(gas_utilization)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchUtilizations(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchUtilizations(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="fla" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> GAS FLARE MANAGEMENT OPERATIONS <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload GAS FLARE MANAGEMENT" style="background: #202020; color: #fff" @click="setModaleHeader('GAS FLARE MANAGEMENT', 'flared')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="gas_flares" :file_name="'GAS FLARE MANAGEMENT'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>No of Permit to flared</th>
                                                <th>Quantity -Approved<i class="units"></i></th>   
                                                <th>Quantity- Under review<i class="units"></i></th>                                    
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addFlareModal" data-toggle="modal" data-original-title="Enter FIELD DEV. PLAN APPROVALS" @click="clearFlareForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="gas_flare in filteredFlares" v-bind:key="gas_flare.id">
                                                <tr>  
                                                    <th>{{gas_flare.date}}</th>
                                                    <th>{{gas_flare.week}}</th>
                                                    <th>{{gas_flare.permit_to_flare}}</th>
                                                    <th>{{gas_flare.quantity_approved}}</th>
                                                    <th>{{gas_flare.quantity_under_review}}</th>
                                                    <th>  
                                                      <a class="pull-right" @click="deleteFlare(gas_flare.id, 'gas_flare')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addFlareModal" @click="editFlare(gas_flare)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchFlares(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchFlares(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="dom" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> DOMESTIC GAS SUPPLY OBLIGATION <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload DOMESTIC GAS SUPPLY OBLIGATION" style="background: #202020; color: #fff" @click="setModaleHeader('DOMESTIC GAS SUPPLY OBLIGATION', 'dgso')">  <i class="fa fa-upload"></i> </button>
                                        <UpstreamExcelExport :data="gas_supply_obligations" :file_name="'DGSO'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                            <tr style="background-color: #202020; color: #fff">
                                                <th>Date</th>
                                                <th>Week</th>
                                                <th>Total allocated  DGSO (MMscf/D)</th>
                                                <th>Dom. Gas Supply (MMscf/D)<i class="units"></i></th>   
                                                <th>DGSO Performance(%)<i class="units"></i></th>                                    
                                                <th style="text-align: right"> 
                                                    <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addSupplyObligationModal" data-toggle="modal" data-original-title="Enter DOMESTIC GAS SUPPLY OBLIGATION" @click="clearSupplyObligationForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody v-for="gas_supply_obligation in filteredSupplyObligations" v-bind:key="gas_supply_obligation.id">
                                                <tr>  
                                                    <th>{{gas_supply_obligation.date}}</th>
                                                    <th>{{gas_supply_obligation.week}}</th>
                                                    <th>{{gas_supply_obligation.allocated_dgso}}</th>
                                                    <th>{{gas_supply_obligation.dom_gas_supply}}</th>
                                                    <th>{{gas_supply_obligation.dgso_performance}}</th>
                                                    <th>  
                                                      <a class="pull-right" @click="deleteSupplyObligation(gas_supply_obligation.id, 'gas_supply_obligation')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addSupplyObligationModal" @click="editSupplyObligation(gas_supply_obligation)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchSupplyObligations(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchSupplyObligations(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="exp" role="tabpanel" style="">
                            
                                <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#bonny" role="tab" @click="globalPagination(bonny_data)">Bonny River Terminal </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#nlng" role="tab" @click="globalPagination(nlng_data)">NLNG </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#esc" role="tab" @click="globalPagination(escravos_data)">Escravos </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#ops" role="tab" @click="globalPagination(operation_data)">GAS OPERATION-DOWNSTREAM </a>
                                    </li>
                                </ul>

                                <div class="tab-content">  
                                    <div class="tab-pane p-3" id="bonny" role="tabpanel">
                                        <p class="font-14 mb-0">
                                        <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> Bonny River Terminal <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload Bonny River Terminal" style="background: #202020; color: #fff" @click="setModaleHeader('Bonny River Terminal', 'bonny')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="gas_export_bonnies" :file_name="'Bonny River Terminal'"></UpstreamExcelExport>
                                                
                                            </h5> 
                                                <table class="table table-striped table-sm mb-0" id="">
                                                    <thead>
                                                        <tr style="background-color: #202020; color: #fff">
                                                            <th>Date</th>
                                                            <th>Week</th>
                                                            <th>Propane MT</th>
                                                            <th>Butane MT<i class="units"></i></th>   
                                                            <th>Pentane MT<i class="units"></i></th>   
                                                            <th>Total No. of Vessels<i class="units"></i></th>                                  
                                                            <th style="text-align: right"> 
                                                                <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addExportBonnyModal" data-toggle="modal" data-original-title="Enter Bonny River Terminal" @click="clearExportBonnyForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                            </th>
                                                        </tr>

                                                        </thead>
                                                        <tbody v-for="gas_export_bonny in filteredExportBonnies" v-bind:key="gas_export_bonny.id">
                                                            <tr>  
                                                                <th>{{gas_export_bonny.date}}</th>
                                                                <th>{{gas_export_bonny.week}}</th>
                                                                <th>{{gas_export_bonny.propane}}</th>
                                                                <th>{{gas_export_bonny.butane}}</th>
                                                                <th>{{gas_export_bonny.pentane}}</th>
                                                                <th>{{gas_export_bonny.total_no_vessel}}</th>
                                                                <th>  
                                                                  <a class="pull-right" @click="deleteExportBonny(gas_export_bonny.id, 'gas_export_bonny')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                                  </a>
                                                                  <a class="pull-right" data-toggle="modal" data-target="#addExportBonnyModal" @click="editExportBonny(gas_export_bonny)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                                  </a>
                                                                </th>  
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                      <nav aria-label="Page navigation example pull-right">
                                                          <ul class="pagination pagination-sm">
                                                            <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchExportBonnies(pagination.prev_page_url)">Prev</a></li>
                                                            <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                            <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchExportBonnies(pagination.next_page_url)">Next</a></li>
                                                          </ul>
                                                      </nav>

                                                </div> <!-- end col -->
                                        </p>
                                    </div>  

                                    <div class="tab-pane p-3" id="nlng" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> NLNG Terminal <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload NLNG Terminal" style="background: #202020; color: #fff" @click="setModaleHeader('NLNG Terminal', 'nlng')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="gas_export_nlngs" :file_name="'NLNG Terminal'"></UpstreamExcelExport>
                                                
                                            </h5> 
                                                <table class="table table-striped table-sm mb-0" id="">
                                                    <thead>
                                                        <tr style="background-color: #202020; color: #fff">
                                                            <th>Date</th>
                                                            <th>Week</th>
                                                            <th>Propane MT</th>
                                                            <th>Butane MT<i class="units"></i></th>   
                                                            <th>Condensate MT<i class="units"></i></th> 
                                                            <th>LNG MT<i class="units"></i></th>   
                                                            <th>Total No. of Vessels<i class="units"></i></th>                                  
                                                            <th style="text-align: right"> 
                                                                <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addExportNlngModal" data-toggle="modal" data-original-title="Enter Nlng Terminal" @click="clearExportNlngForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                            </th>
                                                        </tr>

                                                        </thead>
                                                        <tbody v-for="gas_export_nlng in filteredExportNlngs" v-bind:key="gas_export_nlng.id">
                                                            <tr>  
                                                                <th>{{gas_export_nlng.date}}</th>
                                                                <th>{{gas_export_nlng.week}}</th>
                                                                <th>{{gas_export_nlng.propane}}</th>
                                                                <th>{{gas_export_nlng.butane}}</th>
                                                                <th>{{gas_export_nlng.condensate}}</th>
                                                                <th>{{gas_export_nlng.lng}}</th>
                                                                <th>{{gas_export_nlng.total_no_vessel}}</th>
                                                                <th>  
                                                                  <a class="pull-right" @click="deleteExportNlng(gas_export_nlng.id, 'gas_export_nlng')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                                  </a>
                                                                  <a class="pull-right" data-toggle="modal" data-target="#addExportNlngModal" @click="editExportNlng(gas_export_nlng)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                                  </a>
                                                                </th>  
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                      <nav aria-label="Page navigation example pull-right">
                                                          <ul class="pagination pagination-sm">
                                                            <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchExportNlngs(pagination.prev_page_url)">Prev</a></li>
                                                            <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                            <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchExportNlngs(pagination.next_page_url)">Next</a></li>
                                                          </ul>
                                                      </nav>

                                                </div> <!-- end col -->
                                        </p>
                                    </div>

                                    <div class="tab-pane p-3" id="esc" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> Escravos Terminal <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload Escravos Terminal" style="background: #202020; color: #fff" @click="setModaleHeader('Escravos Terminal', 'escravos')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="gas_export_escravoses" :file_name="'Escravos Terminal'"></UpstreamExcelExport>
                                                
                                            </h5> 
                                                <table class="table table-striped table-sm mb-0" id="">
                                                    <thead>
                                                        <tr style="background-color: #202020; color: #fff">
                                                            <th>Date</th>
                                                            <th>Week</th>
                                                            <th>LPG MT</th>  
                                                            <th>Condensate MT<i class="units"></i></th> 
                                                            <th>Transmix MT<i class="units"></i></th>   
                                                            <th>Total No. of Vessels<i class="units"></i></th>                                  
                                                            <th style="text-align: right"> 
                                                                <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addExportEscravosModal" data-toggle="modal" data-original-title="Enter Escravos Terminal" @click="clearExportEscravosForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                            </th>
                                                        </tr>

                                                        </thead>
                                                        <tbody v-for="gas_export_escravos in filteredExportEscravoses" v-bind:key="gas_export_escravos.id">
                                                            <tr>  
                                                                <th>{{gas_export_escravos.date}}</th>
                                                                <th>{{gas_export_escravos.week}}</th>
                                                                <th>{{gas_export_escravos.lpg}}</th>
                                                                <th>{{gas_export_escravos.condensate}}</th>
                                                                <th>{{gas_export_escravos.transmix}}</th>
                                                                <th>{{gas_export_escravos.total_no_vessel}}</th>
                                                                <th>  
                                                                  <a class="pull-right" @click="deleteExportEscravos(gas_export_escravos.id, 'gas_export_escravos')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                                  </a>
                                                                  <a class="pull-right" data-toggle="modal" data-target="#addExportEscravosModal" @click="editExportEscravos(gas_export_escravos)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                                  </a>
                                                                </th>  
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                      <nav aria-label="Page navigation example pull-right">
                                                          <ul class="pagination pagination-sm">
                                                            <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchExportEscravoses(pagination.prev_page_url)">Prev</a></li>
                                                            <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                            <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchExportEscravoses(pagination.next_page_url)">Next</a></li>
                                                          </ul>
                                                      </nav>

                                                </div> <!-- end col -->
                                        </p>
                                    </div>

                                    <div class="tab-pane p-3" id="ops" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <div class="table-responsive">   
                                            <h5 style="margin-left: 5px; color: #aaa"> GAS OPERATION-DOWNSTREAM <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload GAS OPERATION" style="background: #202020; color: #fff" @click="setModaleHeader('GAS OPERATION', 'gas_operation')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="gas_export_operations" :file_name="'GAS OPERATION'"></UpstreamExcelExport>
                                                
                                            </h5> 
                                                <table class="table table-striped table-sm mb-0" id="">
                                                    <thead>
                                                        <tr style="background-color: #202020; color: #fff">
                                                            <th>Date</th>
                                                            <th>Week</th>
                                                            <th>App Received</th>  
                                                            <th>App Approved<i class="units"></i></th> 
                                                            <th>App Querried<i class="units"></i></th>  
                                                            <th>Site Verif<i class="units"></i></th> 
                                                            <th>Appr CNG <i class="units"></i></th> 
                                                            <th>Appr LPG Refilling<i class="units"></i></th> 
                                                            <th>Appr LPG Bulk Stg<i class="units"></i></th> 
                                                            <th>Appr LPG Addon<i class="units"></i></th> 
                                                            <th>Lice CNG<i class="units"></i></th> 
                                                            <th>Lice LPG Refilling<i class="units"></i></th> 
                                                            <th>Lice LPG Bulk Stg<i class="units"></i></th> 
                                                            <th>Lice LPG Addon<i class="units"></i></th> 
                                                            <th>Lice LPG Reseller<i class="units"></i></th> 
                                                            <th>Inspection Conducted<i class="units"></i></th>                                  
                                                            <th style="text-align: right"> 
                                                                <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addExportOperationModal" data-toggle="modal" data-original-title="Enter GAS OPERATION-DOWNSTREAM" @click="clearExportOperationForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                            </th>
                                                        </tr>

                                                        </thead>
                                                        <tbody v-for="gas_export_operation in filteredExportOperations" v-bind:key="gas_export_operation.id">
                                                            <tr>  
                                                                <th>{{gas_export_operation.date}}</th>
                                                                <th>{{gas_export_operation.week}}</th>
                                                                <th>{{gas_export_operation.application_received}}</th>
                                                                <th>{{gas_export_operation.application_approved}}</th>
                                                                <th>{{gas_export_operation.application_querried}}</th>
                                                                <th>{{gas_export_operation.site_verification}}</th>
                                                                <th>{{gas_export_operation.approval_for_cng_downloading}}</th>
                                                                <th>{{gas_export_operation.approval_for_lpg_refilling}}</th>
                                                                <th>{{gas_export_operation.approval_for_lpg_bulk}}</th>
                                                                <th>{{gas_export_operation.approval_for_lpg_addon}}</th>
                                                                <th>{{gas_export_operation.license_for_cng_downloading}}</th>
                                                                <th>{{gas_export_operation.license_for_lpg_refilling}}</th>
                                                                <th>{{gas_export_operation.license_for_lpg_bulk}}</th>
                                                                <th>{{gas_export_operation.license_for_lpg_addon}}</th>
                                                                <th>{{gas_export_operation.license_for_lpg_reseller}}</th>
                                                                <th>{{gas_export_operation.facility_inspection_conducted}}</th>
                                                                <th>  
                                                                  <a class="pull-right" @click="deleteExportOperation(gas_export_operation.id, 'gas_export_operation')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                                  </a>
                                                                  <a class="pull-right" data-toggle="modal" data-target="#addExportOperationModal" @click="editExportOperation(gas_export_operation)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                                  </a>
                                                                </th>  
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                      <nav aria-label="Page navigation example pull-right">
                                                          <ul class="pagination pagination-sm">
                                                            <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchExportOperations(pagination.prev_page_url)">Prev</a></li>
                                                            <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                            <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchExportOperations(pagination.next_page_url)">Next</a></li>
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







        <!-- Add Drilling modal -->
        <form @submit.prevent="addDrilling" class="form-horizontal">
            <div id="addDrillingModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit Gas Drilling Activities (Approvals)' : 'Add Gas Drilling Activities (Approvals)' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="gas_drilling.week" required>
                                <option value=""> Select Drilling Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="gas_drilling.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_drilling.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="exploration_commenced" class="col-sm-3 col-form-label"> Exploration Drilling Commenced </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_drilling.exploration_commenced" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="exploration_ongoing" class="col-sm-3 col-form-label"> Exploration Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_drilling.exploration_ongoing" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="exploration_completed" class="col-sm-3 col-form-label">Exploration Drilling Completed</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_drilling.exploration_completed" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="appraisal_commenced" class="col-sm-3 col-form-label">Appraisal Drilling Commenced </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_drilling.appraisal_commenced" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="appraisal_ongoing" class="col-sm-3 col-form-label">Appraisal Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_drilling.appraisal_ongoing" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="appraisal_completed" class="col-sm-3 col-form-label">Appraisal Drilling Completed </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_drilling.appraisal_completed" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="development_commenced" class="col-sm-3 col-form-label">Development Drilling Commenced </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_drilling.development_commenced" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="development_ongoing" class="col-sm-3 col-form-label">Development Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_drilling.development_ongoing" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="development_completed" class="col-sm-3 col-form-label">Development Drilling Completed </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_drilling.development_completed" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="well_completion" class="col-sm-3 col-form-label">Well Completion  </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_drilling.well_completion" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="well_spudded" class="col-sm-3 col-form-label">Well Spudded  </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_drilling.well_spudded" required>
                        </div>
                      </div>

                                      


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i>{{ edit? 'Save Changes' : 'Add Add Drilling Activities' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add ReEntry modal -->
        <form @submit.prevent="addReEntry" class="form-horizontal">
            <div id="addReEntryModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title">{{ edit? 'Edit Gas Re Entry Operation' : 'Add Gas Re Entry Operation' }} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="gas_re_entry.week" required>
                                <option value=""> Select Re Entry Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="gas_re_entry.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_re_entry.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Exploration Drilling Commenced </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_re_entry.completion" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Exploration Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_re_entry.workover" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Exploration Drilling Completed</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_re_entry.total_reserve_addition" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Appraisal Drilling Commenced </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_re_entry.expected_rate" required>
                        </div>
                      </div> 
                                      


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i>{{ edit? 'Save Changes' : 'Add Gas Re Entry' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add FIELDS DEV PLAN modal -->
        <form @submit.prevent="addFDP" class="form-horizontal">
            <div id="addFDPModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title">{{ edit? 'Edit GAS FIELD DEV. PLAN APPROVALS' : 'Add GAS FIELD DEV. PLAN APPROVALS' }} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="gas_fdp.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="gas_fdp.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_fdp.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Exploration Drilling Commenced </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_fdp.application_received" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Exploration Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_fdp.application_approved" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Exploration Drilling Completed</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_fdp.reserves" required>
                        </div>
                      </div>                                       


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i>{{ edit? 'Save Changes' : 'Add Field Dev. Plan' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add DEPLETION RATE modal -->
        <form @submit.prevent="addDepletionRate" class="form-horizontal">
            <div id="addDepletionRateModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title">{{ edit? 'Edit GAS RESERVES DEPLETION RATE' : 'Add GAS RESERVES DEPLETION RATE' }} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="gas_depletion_rate.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="gas_depletion_rate.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_depletion_rate.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> AG. Reserve (TSCF)  </label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_depletion_rate.ag_reserves" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> NAG. Reserve (TSCF) </label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_depletion_rate.nag_reserves" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AG. Depletion rate (%)</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_depletion_rate.ag_depletion" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">NAG. Depletion rate (%)</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_depletion_rate.nag_depletion" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AG life index (Years)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Years" v-model="gas_depletion_rate.ag_life_year" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">NAG life index (Years)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Years" v-model="gas_depletion_rate.nag_life_year" required>
                        </div>
                      </div>                                      


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i>{{ edit? 'Save Changes' : 'Add Depletion Rate' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add GAS PRODUCTION UTILIZATION and FLARED modal -->
        <form @submit.prevent="addProductionUtilizationFlare" class="form-horizontal">
            <div id="addProductionUtilizationFlareModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title">{{ edit? 'Edit GAS PRODUCTION UTILIZATION and FLARED' : 'Add GAS PRODUCTION UTILIZATION and FLARED' }} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="gas_production_utilization_flare.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="gas_production_utilization_flare.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_production_utilization_flare.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> AG produced(Mscf) </label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_production_utilization_flare.ag_produced" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> NAG produced(Mscf) </label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_production_utilization_flare.nag_produced" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Gas production(Mscf)</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_production_utilization_flare.gas_production" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Gas Utilized(Mscf)</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_production_utilization_flare.gas_utilization" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Gas Flared(Mscf)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Years" v-model="gas_production_utilization_flare.gas_flared" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Percent Gas Flared %</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Years" v-model="gas_production_utilization_flare.gas_flared_perc" required>
                        </div>
                      </div>                                      


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i>{{ edit? 'Save Changes' : 'Add Gas Prod, Util and Flared' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add GAS UTILIZATION modal -->
        <form @submit.prevent="addUtilization" class="form-horizontal">
            <div id="addUtilizationModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title">{{ edit? 'Edit GAS UTILIZATION' : 'Add GAS UTILIZATION' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="gas_utilization.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="gas_utilization.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_utilization.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> AG produced(Mscf) </label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_utilization.fuel_gas" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> NAG produced(Mscf) </label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_utilization.gas_lift" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Gas production(Mscf)</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_utilization.gas_reinjection" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Gas Utilized(Mscf)</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_utilization.ngl_lpg" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Gas Flared(Mscf)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" v-model="gas_utilization.gas_to_ipp" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Percent Gas Flared %</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" v-model="gas_utilization.local_supply" required>
                        </div>
                      </div>   

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Percent Gas Flared %</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" v-model="gas_utilization.gas_export" required>
                        </div>
                      </div>                                    


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i>{{ edit? 'Save Changes' : 'Add Gas Utilization' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add GAS FLARE modal -->
        <form @submit.prevent="addFlare" class="form-horizontal">
            <div id="addFlareModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title">{{ edit? 'Edit GAS FLARE' : 'Add GAS FLARE' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="gas_flare.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="gas_flare.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_flare.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> No of Permit to flare</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_flare.permit_to_flare" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Quantity -Approved </label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_flare.quantity_approved" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Quantity- Under review</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_flare.quantity_under_review" required>
                        </div>
                      </div>                                    


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i>{{ edit? 'Save Changes' : 'Add Gas Flared' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add GAS SUPPLY OBLIGATION modal -->
        <form @submit.prevent="addSupplyObligation" class="form-horizontal">
            <div id="addSupplyObligationModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title">{{ edit? 'Edit GAS SUPPLY OBLIGATION' : 'Add GAS SUPPLY OBLIGATION' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="gas_supply_obligation.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="gas_supply_obligation.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_supply_obligation.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Total allocated DGSO (MMscf/D)</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_supply_obligation.allocated_dgso" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Dom. Gas Supply (MMscf/D) </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_supply_obligation.dom_gas_supply" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">DGSO Performance (%)</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_supply_obligation.dgso_performance" required>
                        </div>
                      </div>                                    


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i>{{ edit? 'Save Changes' : 'Add Gas Supply Obligation' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add GAS Export Bonny Terminal modal -->
        <form @submit.prevent="addExportBonny" class="form-horizontal">
            <div id="addExportBonnyModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title">{{ edit? 'Edit GAS Export Bonny Terminal' : 'Add GAS Export Bonny Terminal' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="gas_export_bonny.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="gas_export_bonny.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_export_bonny.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Propane MT</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_export_bonny.propane" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Butane MT </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_export_bonny.butane" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Pentane MT</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_bonny.pentane" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total No. of Vessels</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_bonny.total_no_vessel" required>
                        </div>
                      </div>                                    


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i>{{ edit? 'Save Changes' : 'Add Gas Export Bonny' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add GAS Export Nlng Terminal modal -->
        <form @submit.prevent="addExportNlng" class="form-horizontal">
            <div id="addExportNlngModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title">{{ edit? 'Edit GAS Export Nlng Terminal' : 'Add GAS Export Nlng Terminal' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="gas_export_nlng.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="gas_export_nlng.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_export_nlng.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Propane MT</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_export_nlng.propane" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Butane MT </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_export_nlng.butane" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Condensate MT</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_nlng.condensate" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">LNG MT</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_nlng.lng" required>
                        </div>
                      </div>   

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total No. of Vessels</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_nlng.total_no_vessel" required>
                        </div>
                      </div>                                   


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i>{{ edit? 'Save Changes' : 'Add Gas Export NLNG' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add GAS Export Escravos Terminal modal -->
        <form @submit.prevent="addExportEscravos" class="form-horizontal">
            <div id="addExportEscravosModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title">{{ edit? 'Edit GAS Export Escravos Terminal' : 'Add GAS Export Escravos Terminal' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="gas_export_escravos.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="gas_export_escravos.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_export_escravos.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> LPG MT</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="gas_export_escravos.lpg" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Condensate MT</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_escravos.condensate" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Transmix MT</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_escravos.transmix" required>
                        </div>
                      </div>   

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total No. of Vessels</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_escravos.total_no_vessel" required>
                        </div>
                      </div>                                   


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i>{{ edit? 'Save Changes' : 'Add Gas Export Escravos' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add GAS OPERATION-DOWNSTREAM Terminal modal -->
        <form @submit.prevent="addExportOperation" class="form-horizontal">
            <div id="addExportOperationModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit GAS OPERATION-DOWNSTREAM Terminal':'Add GAS OPERATION-DOWNSTREAM Terminal' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="gas_export_operation.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="gas_export_operation.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_export_operation.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> App Received</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="gas_export_operation.application_received" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">App Approved</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_operation.application_approved" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">App Querried</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_operation.application_querried" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Site Verification</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_operation.site_verification" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Appr CNG</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_operation.approval_for_cng_downloading" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Appr LPG Refilling</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_operation.approval_for_lpg_refilling" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Appr LPG Bulk Stg</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_operation.approval_for_lpg_bulk" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Appr LPG Addon</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_operation.approval_for_lpg_addon" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Lice CNG</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_operation.license_for_cng_downloading" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Lice LPG Refilling</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_operation.license_for_lpg_refilling" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Lice LPG Bulk Stg</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_operation.license_for_lpg_bulk" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Lice LPG Addon</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_operation.license_for_lpg_addon" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Lice LPG Reseller</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_operation.license_for_lpg_reseller" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Inspection Conducted</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="gas_export_operation.facility_inspection_conducted" required>
                        </div>
                      </div>                                   


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Gas Export Operation' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>





        <!-- Upload Downstream modal -->
        <form @submit.prevent="uploadGasDataExcel" class="form-horizontal">
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
                gas_drillings: [], 
                gas_drilling: {
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
                    type: 'gas_drilling',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                gas_re_entries: [], 
                gas_re_entry: {
                    id: '',
                    date: '',
                    week: '',
                    completion: '',
                    workover: '',
                    total_reserve_addition: '',
                    expected_rate: '',
                    type: 'gas_re_entry',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                gas_fdps: [], 
                gas_fdp: {
                    id: '',
                    date: '',
                    week: '',
                    application_received: '',
                    application_approved: '',
                    reserves: '',
                    type: 'gas_fdp',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                gas_depletion_rates: [], 
                gas_depletion_rate: {
                    id: '',
                    date: '',
                    week: '',
                    ag_reserves: '',
                    nag_reserves: '',
                    ag_depletion: '',
                    nag_depletion: '',
                    ag_life_year: '',
                    nag_life_year: '',
                    type: 'gas_depletion_rate',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                gas_production_utilization_flares: [], 
                gas_production_utilization_flare: {
                    id: '',
                    date: '',
                    week: '',
                    ag_reserves: '',
                    nag_reserves: '',
                    ag_depletion: '',
                    nag_depletion: '',
                    ag_life_year: '',
                    nag_life_year: '',
                    type: 'gas_production_utilization_flare',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                gas_utilizations: [], 
                gas_utilization: {
                    id: '',
                    date: '',
                    week: '',
                    fuel_gas: '',
                    gas_lift: '',
                    gas_reinjection: '',
                    ngl_lpg: '',
                    gas_to_ipp: '',
                    local_supply: '',
                    gas_export: '',
                    type: 'gas_utilization',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                gas_flares: [], 
                gas_flare: {
                    id: '',
                    date: '',
                    week: '',
                    permit_to_flare: '',
                    quantity_approved: '',
                    quantity_under_review: '',
                    type: 'gas_flare',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                gas_supply_obligations: [], 
                gas_supply_obligation: {
                    id: '',
                    date: '',
                    week: '',
                    allocated_dgso: '',
                    dom_gas_supply: '',
                    dgso_performance: '',
                    type: 'gas_supply_obligation',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                gas_export_bonnies: [], 
                gas_export_bonny: {
                    id: '',
                    date: '',
                    week: '',
                    propane: '',
                    butane: '',
                    pentane: '',
                    total_no_vessel: '',
                    type: 'gas_export_bonny',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                gas_export_nlngs: [], 
                gas_export_nlng: {
                    id: '',
                    date: '',
                    week: '',
                    propane: '',
                    butane: '',
                    condensate: '',
                    lng: '',
                    total_no_vessel: '',
                    type: 'gas_export_nlng',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                gas_export_escravoses: [], 
                gas_export_escravos: {
                    id: '',
                    date: '',
                    week: '',
                    lpg: '',
                    condensate: '',
                    transmix: '',
                    total_no_vessel: '',
                    type: 'gas_export_escravos',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                gas_export_operations: [], 
                gas_export_operation: {
                    id: '',
                    date: '',
                    week: '',
                    application_received: '',
                    application_approved: '',
                    application_querried: '',
                    site_verification: '',
                    approval_for_cng_downloading: '',
                    approval_for_lpg_refilling: '',
                    approval_for_lpg_bulk: '',
                    approval_for_lpg_addon: '',
                    license_for_cng_downloading: '',
                    license_for_lpg_refilling: '',
                    license_for_lpg_bulk: '',
                    license_for_lpg_addon: '',
                    license_for_lpg_reseller: '',
                    facility_inspection_conducted: '',
                    type: 'gas_export_operation',
                    user_id:window.sessionStorage.getItem('user_id')
                },


                gas_drilling_id: '',
                gas_re_entry_id: '',
                gas_fdp_id: '',
                gas_depletion_rate_id: '',
                gas_production_utilization_flare_id: '',
                gas_utilization_id: '',
                gas_flare_id: '',
                gas_supply_obligation_id: '',
                gas_export_bonny_id: '',
                gas_export_nlng_id: '',
                gas_export_escravos_id: '',
                gas_export_operation_id: '',
                pagination: {},
                drilling_data:{},
                re_entry_data:{},
                fdp_data:{},
                depletion_data:{},
                production_data:{},
                utilization_data:{},
                flared_data:{},
                dgso_data:{},
                bonny_data:{},
                nlng_data:{},
                escravos_data:{},
                operation_data:{},
                modal_header: '',
                type: '',
                edit: false
            }
        },


        created()
        {
            this.fetchWeeks();

            this.fetchAllDrillings();
            this.fetchDrillings();
            this.fetchAllReEntries();
            this.fetchReEntries();
            this.fetchAllFDPs();
            this.fetchFDPs();
            this.fetchAllDepletionRates();
            this.fetchDepletionRates();
            this.fetchAllProductionUtilizationFlares();
            this.fetchProductionUtilizationFlares();
            this.fetchAllUtilizations();
            this.fetchUtilizations();
            this.fetchAllFlares();
            this.fetchFlares();
            this.fetchAllSupplyObligations();
            this.fetchSupplyObligations();
            this.fetchAllExportBonnies();
            this.fetchExportBonnies();
            this.fetchAllExportNlngs();
            this.fetchExportNlngs();
            this.fetchAllExportEscravoses();
            this.fetchExportEscravoses();
            this.fetchAllExportOperations();
            this.fetchExportOperations();
        },

        computed: {
            filteredDrillings: function()
            {
                return this.gas_drillings.filter((gas_drilling) => {
                    return gas_drilling.date.toLowerCase().match(this.search.toLowerCase()) || 
                           gas_drilling.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredReEntries: function()
            {
                return this.gas_re_entries.filter((gas_re_entry) => {
                    return gas_re_entry.date.toLowerCase().match(this.search.toLowerCase()) || 
                           gas_re_entry.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredFDPs: function()
            {
                return this.gas_fdps.filter((gas_fdp) => {
                    return gas_fdp.date.toLowerCase().match(this.search.toLowerCase()) || 
                           gas_fdp.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredDepletionRates: function()
            {
                return this.gas_depletion_rates.filter((gas_depletion_rate) => {
                    return gas_depletion_rate.date.toLowerCase().match(this.search.toLowerCase()) || 
                           gas_depletion_rate.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredProductionUtilizationFlares: function()
            {
                return this.gas_production_utilization_flares.filter((gas_production_utilization_flare) => {
                    return gas_production_utilization_flare.date.toLowerCase().match(this.search.toLowerCase()) || 
                           gas_production_utilization_flare.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredUtilizations: function()
            {
                return this.gas_utilizations.filter((gas_utilization) => {
                    return gas_utilization.date.toLowerCase().match(this.search.toLowerCase()) || 
                          gas_utilization.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredFlares: function()
            {
                return this.gas_flares.filter((gas_flare) => {
                    return gas_flare.date.toLowerCase().match(this.search.toLowerCase()) || 
                          gas_flare.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredSupplyObligations: function()
            {
                return this.gas_supply_obligations.filter((gas_supply_obligation) => {
                    return gas_supply_obligation.date.toLowerCase().match(this.search.toLowerCase()) || 
                          gas_supply_obligation.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredExportBonnies: function()
            {
                return this.gas_export_bonnies.filter((gas_export_bonny) => {
                    return gas_export_bonny.date.toLowerCase().match(this.search.toLowerCase()) || 
                          gas_export_bonny.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredExportNlngs: function()
            {
                return this.gas_export_nlngs.filter((gas_export_nlng) => {
                    return gas_export_nlng.date.toLowerCase().match(this.search.toLowerCase()) || 
                          gas_export_nlng.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredExportEscravoses: function()
            {
                return this.gas_export_escravoses.filter((gas_export_escravos) => {
                    return gas_export_escravos.date.toLowerCase().match(this.search.toLowerCase()) || 
                          gas_export_escravos.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredExportOperations: function()
            {
                return this.gas_export_operations.filter((gas_export_operation) => {
                    return gas_export_operation.date.toLowerCase().match(this.search.toLowerCase()) || 
                          gas_export_operation.week.toLowerCase().match(this.search.toLowerCase())  
                });
            }
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






            //DRILLING
            fetchAllDrillings(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gases?all=1'
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
                page_url = page_url || '/api/war-gases'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.drilling_data = res;
                    this.gas_drillings = res.data;
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
                if(confirm('Are You Sure You Want To Delete This Drilling Activities ?'))
                {
                    fetch(`api/war-gas/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Gas Drilling Activities Has Been Deleted Successfully');
                        this.fetchDrillings();
                    })
                    .catch(err => console.log(err));
                }
            },

            addDrilling()
            {
                if(this.edit === false)
                {
                    fetch('api/war-gas', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.gas_drilling),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearDrillingForm()
                        toastr.success('Gas Drilling Activities Has Been Add Successfully');
                        this.fetchDrillings();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addDrillingModal').trigger('click');

                }
                else
                {
                    fetch('api/war-gas', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.gas_drilling),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearDrillingForm();
                        toastr.success('Gas Drilling Has Been Updated Successfully');
                        this.fetchDrillings();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addDrillingModal').trigger('click');
                }
            },

            editDrilling(gas_drilling)
            {
                this.edit = true;
                this.gas_drilling.id = gas_drilling.id;
                this.gas_drilling.gas_drilling_id = gas_drilling.id;
                this.gas_drilling.date = gas_drilling.date;
                this.gas_drilling.week = gas_drilling.week;
                this.gas_drilling.exploration_commenced = gas_drilling.exploration_commenced;
                this.gas_drilling.exploration_ongoing = gas_drilling.exploration_ongoing;
                this.gas_drilling.exploration_completed = gas_drilling.exploration_completed;
                this.gas_drilling.appraisal_commenced = gas_drilling.appraisal_commenced;
                this.gas_drilling.appraisal_ongoing = gas_drilling.appraisal_ongoing;
                this.gas_drilling.appraisal_completed = gas_drilling.appraisal_completed;
                this.gas_drilling.development_commenced = gas_drilling.development_commenced;
                this.gas_drilling.development_ongoing = gas_drilling.development_ongoing;
                this.gas_drilling.development_completed = gas_drilling.development_completed;
                this.gas_drilling.well_completion = gas_drilling.well_completion;
                this.gas_drilling.well_spudded = gas_drilling.well_spudded;
            },

            clearDrillingForm()
            {
                this.gas_drilling.id = '';
                this.gas_drilling.date = '';
                this.gas_drilling.week = '';
                this.gas_drilling.exploration_commenced = '';
                this.gas_drilling.exploration_ongoing = '';
                this.gas_drilling.exploration_completed = '';
                this.gas_drilling.appraisal_commenced = '';
                this.gas_drilling.appraisal_ongoing = '';
                this.gas_drilling.appraisal_completed = '';
                this.gas_drilling.development_commenced = '';
                this.gas_drilling.development_ongoing = '';
                this.gas_drilling.development_completed = '';
                this.gas_drilling.well_completion = '';
                this.gas_drilling.well_spudded = '';
            },





            //RE ENTRY
            fetchAllReEntries(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-re-entries?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.re_entry_data = res;
                    this.allReEntries = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchReEntries(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-re-entries'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.re_entry_data = res;
                    this.gas_re_entries = res.data;
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
                if(confirm('Are You Sure You Want To Delete This Re Entry Activities ?'))
                {
                    fetch(`api/war-gas/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Gas Re Entry Activities Has Been Deleted Successfully');
                        this.fetchReEntries();
                    })
                    .catch(err => console.log(err));
                }
            },

            addReEntry()
            {
                if(this.edit === false)
                {
                    fetch('api/war-gas', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.gas_re_entry),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearReEntryForm()
                        toastr.success('Gas Re Entry Activities Has Been Add Successfully');
                        this.fetchReEntries();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addReEntryModal').trigger('click');

                }
                else
                {
                    fetch('api/war-gas', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.gas_re_entry),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearReEntryForm();
                        toastr.success('Gas Re Entry Has Been Updated Successfully');
                        this.fetchReEntries();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addReEntryModal').trigger('click');
                }
            },

            editReEntry(gas_re_entry)
            {
                this.edit = true;
                this.gas_re_entry.id = gas_re_entry.id;
                this.gas_re_entry.gas_re_entry_id = gas_re_entry.id;
                this.gas_re_entry.date = gas_re_entry.date;
                this.gas_re_entry.week = gas_re_entry.week;
                this.gas_re_entry.completion = gas_re_entry.completion;
                this.gas_re_entry.workover = gas_re_entry.workover;
                this.gas_re_entry.total_reserve_addition = gas_re_entry.total_reserve_addition;
                this.gas_re_entry.expected_rate = gas_re_entry.expected_rate;
            },

            clearReEntryForm()
            {
                this.gas_re_entry.id = '';
                this.gas_re_entry.date = '';
                this.gas_re_entry.week = '';
                this.gas_re_entry.completion = '';
                this.gas_re_entry.workover = '';
                this.gas_re_entry.total_reserve_addition = '';
                this.gas_re_entry.expected_rate = '';
            },





            //FDP
            fetchAllFDPs(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-fdps?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.fdp_data = res;
                    this.gas_fdps = res.data;
                })
                .catch(err => console.log(err));
            },


            fetchFDPs(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-fdps'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.fdp_data = res;
                    this.gas_fdps = res.data;
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

            deleteFDP(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Field Dev Plan ?'))
                {
                    fetch(`api/war-gas/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Gas Field Dev Plan Has Been Deleted Successfully');
                        this.fetchFDPs();
                    })
                    .catch(err => console.log(err));
                }
            },

            addFDP()
            {
                if(this.edit === false)
                {
                    fetch('api/war-gas', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.gas_fdp),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearFDPForm()
                        toastr.success('Gas Field Dev Plan Has Been Add Successfully');
                        this.fetchFDPs();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addFDPModal').trigger('click');

                }
                else
                {
                    fetch('api/war-gas', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.gas_fdp),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearFDPForm();
                        toastr.success('Gas Field Dev Plan Has Been Updated Successfully');
                        this.fetchFDPs();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addFDPModal').trigger('click');
                }
            },

            editFDP(gas_fdp)
            {
                this.edit = true;
                this.gas_fdp.id = gas_fdp.id;
                this.gas_fdp.gas_fdp_id = gas_fdp.id;
                this.gas_fdp.date = gas_fdp.date;
                this.gas_fdp.week = gas_fdp.week;
                this.gas_fdp.application_received = gas_fdp.application_received;
                this.gas_fdp.application_approved = gas_fdp.application_approved;
                this.gas_fdp.reserves = gas_fdp.reserves;
            },

            clearFDPForm()
            {
                this.gas_fdp.id = '';
                this.gas_fdp.date = '';
                this.gas_fdp.week = '';
                this.gas_fdp.application_received = '';
                this.gas_fdp.application_approved = '';
                this.gas_fdp.reserves = '';
            },





            //DEPLETION RATE
            fetchAllDepletionRates(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-depletion-rates?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.depletion_data = res;
                    this.gas_depletion_rates = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchDepletionRates(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-depletion-rates'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.depletion_data = res;
                    this.gas_depletion_rates = res.data;
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
                    fetch(`api/war-gas/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Gas Depletion Rate Has Been Deleted Successfully');
                        this.fetchDepletionRates();
                    })
                    .catch(err => console.log(err));
                }
            },

            addDepletionRate()
            {
                if(this.edit === false)
                {
                    fetch('api/war-gas', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.gas_depletion_rate),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearDepletionRateForm()
                        toastr.success('Gas Depletion Rate Has Been Add Successfully');
                        this.fetchDepletionRates();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addDepletionRateModal').trigger('click');

                }
                else
                {
                    fetch('api/war-gas', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.gas_depletion_rate),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearDepletionRateForm();
                        toastr.success('Gas Depletion Rate Has Been Updated Successfully');
                        this.fetchDepletionRates();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addDepletionRateModal').trigger('click');
                }
            },

            editDepletionRate(gas_depletion_rate)
            {
                this.edit = true;
                this.gas_depletion_rate.id = gas_depletion_rate.id;
                this.gas_depletion_rate.gas_depletion_rate_id = gas_depletion_rate.id;
                this.gas_depletion_rate.date = gas_depletion_rate.date;
                this.gas_depletion_rate.week = gas_depletion_rate.week;
                this.gas_depletion_rate.ag_reserves = gas_depletion_rate.ag_reserves;
                this.gas_depletion_rate.nag_reserves = gas_depletion_rate.nag_reserves;
                this.gas_depletion_rate.ag_depletion = gas_depletion_rate.ag_depletion;
                this.gas_depletion_rate.nag_depletion = gas_depletion_rate.nag_depletion;
                this.gas_depletion_rate.ag_life_year = gas_depletion_rate.ag_life_year;
                this.gas_depletion_rate.nag_life_year = gas_depletion_rate.nag_life_year;
            },

            clearDepletionRateForm()
            {
                this.gas_depletion_rate.id = '';
                this.gas_depletion_rate.date = '';
                this.gas_depletion_rate.week = '';
                this.gas_depletion_rate.ag_reserves = '';
                this.gas_depletion_rate.nag_reserves = '';
                this.gas_depletion_rate.ag_depletion = '';
                this.gas_depletion_rate.nag_depletion = '';
                this.gas_depletion_rate.ag_life_year = '';
                this.gas_depletion_rate.nag_life_year = '';
            },





            //GAS PROD UTIL FLARED
            fetchAllProductionUtilizationFlares(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-prodution-utilization-flares?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.utilization_data = res;
                    this.gas_production_utilization_flares = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchProductionUtilizationFlares(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-prodution-utilization-flares'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.utilization_data = res;
                    this.gas_production_utilization_flares = res.data;
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

            deleteProductionUtilizationFlare(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Production Utilization and Flared ?'))
                {
                    fetch(`api/war-gas/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Gas Production Utilization and Flared Has Been Deleted Successfully');
                        this.fetchProductionUtilizationFlares();
                    })
                    .catch(err => console.log(err));
                }
            },

            addProductionUtilizationFlare()
            {
                if(this.edit === false)
                {
                    fetch('api/war-gas', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.gas_production_utilization_flare),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearProductionUtilizationFlareForm()
                        toastr.success('Gas Production Utilization and Flared Has Been Add Successfully');
                        this.fetchProductionUtilizationFlares();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addProductionUtilizationFlareModal').trigger('click');

                }
                else
                {
                    fetch('api/war-gas', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.gas_production_utilization_flare),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearProductionUtilizationFlareForm();
                        toastr.success('Gas Production Utilization and Flared Has Been Updated Successfully');
                        this.fetchProductionUtilizationFlares();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addProductionUtilizationFlareModal').trigger('click');
                }
            },

            editProductionUtilizationFlare(gas_production_utilization_flare)
            {
                this.edit = true;
                this.gas_production_utilization_flare.id = gas_production_utilization_flare.id;
                this.gas_production_utilization_flare.gas_production_utilization_flare_id = gas_production_utilization_flare.id;
                this.gas_production_utilization_flare.date = gas_production_utilization_flare.date;
                this.gas_production_utilization_flare.week = gas_production_utilization_flare.week;
                this.gas_production_utilization_flare.ag_produced = gas_production_utilization_flare.ag_produced;
                this.gas_production_utilization_flare.nag_produced = gas_production_utilization_flare.nag_produced;
                this.gas_production_utilization_flare.gas_production = gas_production_utilization_flare.gas_production;
                this.gas_production_utilization_flare.gas_utilization = gas_production_utilization_flare.gas_utilization;
                this.gas_production_utilization_flare.gas_flared = gas_production_utilization_flare.gas_flared;
                this.gas_production_utilization_flare.gas_flared_perc = gas_production_utilization_flare.gas_flared_perc;
            },

            clearProductionUtilizationFlareForm()
            {
                this.gas_production_utilization_flare.id = '';
                this.gas_production_utilization_flare.date = '';
                this.gas_production_utilization_flare.week = '';
                this.gas_production_utilization_flare.ag_produced = '';
                this.gas_production_utilization_flare.nag_produced = '';
                this.gas_production_utilization_flare.gas_production = '';
                this.gas_production_utilization_flare.gas_utilization = '';
                this.gas_production_utilization_flare.gas_flared = '';
                this.gas_production_utilization_flare.gas_flared_perc = '';
            },





            //GAS UTILIZATION
            fetchAllUtilizations(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-utilizations?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.utilization_data = res;
                    this.gas_utilizations = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchUtilizations(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-utilizations'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.utilization_data = res;
                    this.gas_utilizations = res.data;
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

            deleteUtilization(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Utilization ?'))
                {
                    fetch(`api/war-gas/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Gas Utilization Has Been Deleted Successfully');
                        this.fetchUtilizations();
                    })
                    .catch(err => console.log(err));
                }
            },

            addUtilization()
            {
                if(this.edit === false)
                {
                    fetch('api/war-gas', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.gas_utilization),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearUtilizationForm()
                        toastr.success('Gas Utilization Has Been Add Successfully');
                        this.fetchUtilizations();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addUtilizationModal').trigger('click');

                }
                else
                {
                    fetch('api/war-gas', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.gas_utilization),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearUtilizationForm();
                        toastr.success('Gas Utilization Has Been Updated Successfully');
                        this.fetchUtilizations();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addUtilizationModal').trigger('click');
                }
            },

            editUtilization(gas_utilization)
            {
                this.edit = true;
                this.gas_utilization.id = gas_utilization.id;
                this.gas_utilization.gas_utilization_id = gas_utilization.id;
                this.gas_utilization.date = gas_utilization.date;
                this.gas_utilization.week = gas_utilization.week;
                this.gas_utilization.fuel_gas = gas_utilization.fuel_gas;
                this.gas_utilization.gas_lift = gas_utilization.gas_lift;
                this.gas_utilization.gas_reinjection = gas_utilization.gas_reinjection;
                this.gas_utilization.ngl_lpg = gas_utilization.ngl_lpg;
                this.gas_utilization.gas_to_ipp = gas_utilization.gas_to_ipp;
                this.gas_utilization.local_supply = gas_utilization.local_supply;
                this.gas_utilization.gas_export = gas_utilization.gas_export;
            },

            clearUtilizationForm()
            {
                this.gas_utilization.id = '';
                this.gas_utilization.date = '';
                this.gas_utilization.week = '';
                this.gas_utilization.fuel_gas = '';
                this.gas_utilization.gas_lift = '';
                this.gas_utilization.gas_reinjection = '';
                this.gas_utilization.ngl_lpg = '';
                this.gas_utilization.gas_to_ipp = '';
                this.gas_utilization.local_supply = '';
                this.gas_utilization.gas_export = '';
            },





            //GAS FLARED
            fetchAllFlares(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-flares?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.flared_data = res;
                    this.gas_flares = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchFlares(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-flares'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.flared_data = res;
                    this.gas_flares = res.data;
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

            deleteFlare(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Flare ?'))
                {
                    fetch(`api/war-gas/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Gas Flare Has Been Deleted Successfully');
                        this.fetchFlares();
                    })
                    .catch(err => console.log(err));
                }
            },

            addFlare()
            {
                if(this.edit === false)
                {
                    fetch('api/war-gas', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.gas_flare),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearFlareForm()
                        toastr.success('Gas Flare Has Been Add Successfully');
                        this.fetchFlares();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addFlareModal').trigger('click');

                }
                else
                {
                    fetch('api/war-gas', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.gas_flare),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearFlareForm();
                        toastr.success('Gas Flare Has Been Updated Successfully');
                        this.fetchFlares();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addFlareModal').trigger('click');
                }
            },

            editFlare(gas_flare)
            {
                this.edit = true;
                this.gas_flare.id = gas_flare.id;
                this.gas_flare.gas_flare_id = gas_flare.id;
                this.gas_flare.date = gas_flare.date;
                this.gas_flare.week = gas_flare.week;
                this.gas_flare.permit_to_flare = gas_flare.permit_to_flare;
                this.gas_flare.quantity_approved = gas_flare.quantity_approved;
                this.gas_flare.quantity_under_review = gas_flare.quantity_under_review;
            },

            clearFlareForm()
            {
                this.gas_flare.id = '';
                this.gas_flare.date = '';
                this.gas_flare.week = '';
                this.gas_flare.permit_to_flare = '';
                this.gas_flare.quantity_approved = '';
                this.gas_flare.quantity_under_review = '';
            },





            //GAS GAS SUPPLY OBLIGATION
            fetchAllSupplyObligations(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-supply-obligations?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.dgso_data = res;
                    this.gas_supply_obligations = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchSupplyObligations(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-supply-obligations'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.dgso_data = res;
                    this.gas_supply_obligations = res.data;
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

            deleteSupplyObligation(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Supply Obligation ?'))
                {
                    fetch(`api/war-gas/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Gas Supply Obligation Has Been Deleted Successfully');
                        this.fetchSupplyObligations();
                    })
                    .catch(err => console.log(err));
                }
            },

            addSupplyObligation()
            {
                if(this.edit === false)
                {
                    fetch('api/war-gas', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.gas_supply_obligation),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearSupplyObligationForm()
                        toastr.success('Gas Supply Obligation Has Been Add Successfully');
                        this.fetchSupplyObligations();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addSupplyObligationModal').trigger('click');

                }
                else
                {
                    fetch('api/war-gas', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.gas_supply_obligation),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearSupplyObligationForm();
                        toastr.success('Gas Supply Obligation Has Been Updated Successfully');
                        this.fetchSupplyObligations();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addSupplyObligationModal').trigger('click');
                }
            },

            editSupplyObligation(gas_supply_obligation)
            {
                this.edit = true;
                this.gas_supply_obligation.id = gas_supply_obligation.id;
                this.gas_supply_obligation.gas_supply_obligation_id = gas_supply_obligation.id;
                this.gas_supply_obligation.date = gas_supply_obligation.date;
                this.gas_supply_obligation.week = gas_supply_obligation.week;
                this.gas_supply_obligation.allocated_dgso = gas_supply_obligation.allocated_dgso;
                this.gas_supply_obligation.dom_gas_supply = gas_supply_obligation.dom_gas_supply;
                this.gas_supply_obligation.dgso_performance = gas_supply_obligation.dgso_performance;
            },

            clearSupplyObligationForm()
            {
                this.gas_supply_obligation.id = '';
                this.gas_supply_obligation.date = '';
                this.gas_supply_obligation.week = '';
                this.gas_supply_obligation.allocated_dgso = '';
                this.gas_supply_obligation.dom_gas_supply = '';
                this.gas_supply_obligation.dgso_performance = '';
            },





            //GAS GAS EXPORT BONNY
            fetchAllExportBonnies(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-export-bonnies?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.bonny_data = res;
                    this.gas_export_bonnies = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchExportBonnies(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-export-bonnies'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.bonny_data = res;
                    this.gas_export_bonnies = res.data;
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

            deleteExportBonny(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Export Bonny Terminal ?'))
                {
                    fetch(`api/war-gas/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Gas Export Bonny Terminal Has Been Deleted Successfully');
                        this.fetchExportBonnies();
                    })
                    .catch(err => console.log(err));
                }
            },

            addExportBonny()
            {
                if(this.edit === false)
                {
                    fetch('api/war-gas', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.gas_export_bonny),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearExportBonnyForm()
                        toastr.success('Gas Export Bonny Terminal Has Been Add Successfully');
                        this.fetchExportBonnies();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addExportBonnyModal').trigger('click');

                }
                else
                {
                    fetch('api/war-gas', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.gas_export_bonny),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearExportBonnyForm();
                        toastr.success('Gas Export Bonny Terminal Has Been Updated Successfully');
                        this.fetchExportBonnies();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addExportBonnyModal').trigger('click');
                }
            },

            editExportBonny(gas_export_bonny)
            {
                this.edit = true;
                this.gas_export_bonny.id = gas_export_bonny.id;
                this.gas_export_bonny.gas_export_bonny_id = gas_export_bonny.id;
                this.gas_export_bonny.date = gas_export_bonny.date;
                this.gas_export_bonny.week = gas_export_bonny.week;
                this.gas_export_bonny.propane = gas_export_bonny.propane;
                this.gas_export_bonny.butane = gas_export_bonny.butane;
                this.gas_export_bonny.pentane = gas_export_bonny.pentane;
                this.gas_export_bonny.total_no_vessel = gas_export_bonny.total_no_vessel;
            },

            clearExportBonnyForm()
            {
                this.gas_export_bonny.id = '';
                this.gas_export_bonny.date = '';
                this.gas_export_bonny.week = '';
                this.gas_export_bonny.propane = '';
                this.gas_export_bonny.butane = '';
                this.gas_export_bonny.pentane = '';
                this.gas_export_bonny.total_no_vessel = '';
            },





            //GAS EXPORT NLNG
            fetchAllExportNlngs(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-export-nlngs?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.nlng_data = res;
                    this.gas_export_nlngs = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchExportNlngs(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-export-nlngs'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.nlng_data = res;
                    this.gas_export_nlngs = res.data;
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

            deleteExportNlng(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Export Nlng Terminal ?'))
                {
                    fetch(`api/war-gas/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Gas Export Nlng Terminal Has Been Deleted Successfully');
                        this.fetchExportNlngs();
                    })
                    .catch(err => console.log(err));
                }
            },

            addExportNlng()
            {
                if(this.edit === false)
                {
                    fetch('api/war-gas', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.gas_export_nlng),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearExportNlngForm()
                        toastr.success('Gas Export Nlng Terminal Has Been Add Successfully');
                        this.fetchExportNlngs();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addExportNlngModal').trigger('click');

                }
                else
                {
                    fetch('api/war-gas', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.gas_export_nlng),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearExportNlngForm();
                        toastr.success('Gas Export Nlng Terminal Has Been Updated Successfully');
                        this.fetchExportNlngs();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addExportNlngModal').trigger('click');
                }
            },

            editExportNlng(gas_export_nlng)
            {
                this.edit = true;
                this.gas_export_nlng.id = gas_export_nlng.id;
                this.gas_export_nlng.gas_export_nlng_id = gas_export_nlng.id;
                this.gas_export_nlng.date = gas_export_nlng.date;
                this.gas_export_nlng.week = gas_export_nlng.week;
                this.gas_export_nlng.propane = gas_export_nlng.propane;
                this.gas_export_nlng.butane = gas_export_nlng.butane;
                this.gas_export_nlng.condensate = gas_export_nlng.condensate;
                this.gas_export_nlng.lng = gas_export_nlng.lng;
                this.gas_export_nlng.total_no_vessel = gas_export_nlng.total_no_vessel;
            },

            clearExportNlngForm()
            {
                this.gas_export_nlng.id = '';
                this.gas_export_nlng.date = '';
                this.gas_export_nlng.week = '';
                this.gas_export_nlng.propane = '';
                this.gas_export_nlng.butane = '';
                this.gas_export_nlng.condensate = '';
                this.gas_export_nlng.lng = '';
                this.gas_export_nlng.total_no_vessel = '';
            },





            //GAS EXPORT ESCRAVOS
            fetchAllExportEscravoses(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-export-escravoses?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.escravos_data = res;
                    this.gas_export_escravoses = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchExportEscravoses(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-export-escravoses'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.escravos_data = res;
                    this.gas_export_escravoses = res.data;
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

            deleteExportEscravos(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Export Escravos Terminal ?'))
                {
                    fetch(`api/war-gas/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Gas Export Escravos Terminal Has Been Deleted Successfully');
                        this.fetchExportEscravoses();
                    })
                    .catch(err => console.log(err));
                }
            },

            addExportEscravos()
            {
                if(this.edit === false)
                {
                    fetch('api/war-gas', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.gas_export_escravos),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearExportEscravosForm()
                        toastr.success('Gas Export Escravos Terminal Has Been Add Successfully');
                        this.fetchExportEscravoses();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addExportEscravosModal').trigger('click');

                }
                else
                {
                    fetch('api/war-gas', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.gas_export_escravos),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearExportEscravosForm();
                        toastr.success('Gas Export Escravos Terminal Has Been Updated Successfully');
                        this.fetchExportEscravoses();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addExportEscravosModal').trigger('click');
                }
            },

            editExportEscravos(gas_export_escravos)
            {
                this.edit = true;
                this.gas_export_escravos.id = gas_export_escravos.id;
                this.gas_export_escravos.gas_export_escravos_id = gas_export_escravos.id;
                this.gas_export_escravos.date = gas_export_escravos.date;
                this.gas_export_escravos.week = gas_export_escravos.week;
                this.gas_export_escravos.lpg = gas_export_escravos.lpg;
                this.gas_export_escravos.condensate = gas_export_escravos.condensate;
                this.gas_export_escravos.transmix = gas_export_escravos.transmix;
                this.gas_export_escravos.total_no_vessel = gas_export_escravos.total_no_vessel;
            },

            clearExportEscravosForm()
            {
                this.gas_export_escravos.id = '';
                this.gas_export_escravos.date = '';
                this.gas_export_escravos.week = '';
                this.gas_export_escravos.lpg = '';
                this.gas_export_escravos.condensate = '';
                this.gas_export_escravos.transmix = '';
                this.gas_export_escravos.total_no_vessel = '';
            },





            //GAS EXPORT OPERATION
            fetchAllExportOperations(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-export-operations?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.operation_data = res;
                    this.gas_export_operations = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchExportOperations(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-gas-export-operations'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.operation_data = res;
                    this.gas_export_operations = res.data;
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

            deleteExportOperation(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Export Operation Terminal ?'))
                {
                    fetch(`api/war-gas/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Gas Export Operation Terminal Has Been Deleted Successfully');
                        this.fetchExportOperations();
                    })
                    .catch(err => console.log(err));
                }
            },

            addExportOperation()
            {
                if(this.edit === false)
                {
                    fetch('api/war-gas', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.gas_export_operation),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearExportOperationForm()
                        toastr.success('Gas Export Operation Terminal Has Been Add Successfully');
                        this.fetchExportOperations();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addExportOperationModal').trigger('click');

                }
                else
                {
                    fetch('api/war-gas', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.gas_export_operation),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearExportOperationForm();
                        toastr.success('Gas Export Operation Terminal Has Been Updated Successfully');
                        this.fetchExportOperations();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addExportOperationModal').trigger('click');
                }
            },

            editExportOperation(gas_export_operation)
            {
                this.edit = true;
                this.gas_export_operation.id = gas_export_operation.id;
                this.gas_export_operation.gas_export_operation_id = gas_export_operation.id;
                this.gas_export_operation.date = gas_export_operation.date;
                this.gas_export_operation.week = gas_export_operation.week;
                this.gas_export_operation.application_received = gas_export_operation.application_received;
                this.gas_export_operation.application_approved = gas_export_operation.application_approved;
                this.gas_export_operation.application_querried = gas_export_operation.application_querried;
                this.gas_export_operation.site_verification = gas_export_operation.site_verification;
                this.gas_export_operation.approval_for_cng_downloading = gas_export_operation.approval_for_cng_downloading;
                this.gas_export_operation.approval_for_lpg_refilling = gas_export_operation.approval_for_lpg_refilling;
                this.gas_export_operation.approval_for_lpg_bulk = gas_export_operation.approval_for_lpg_bulk;
                this.gas_export_operation.approval_for_lpg_addon = gas_export_operation.approval_for_lpg_addon;
                this.gas_export_operation.license_for_cng_downloading = gas_export_operation.license_for_cng_downloading;
                this.gas_export_operation.license_for_lpg_refilling = gas_export_operation.license_for_lpg_refilling;
                this.gas_export_operation.license_for_lpg_bulk = gas_export_operation.license_for_lpg_bulk;
                this.gas_export_operation.license_for_lpg_addon = gas_export_operation.license_for_lpg_addon;
                this.gas_export_operation.license_for_lpg_reseller = gas_export_operation.license_for_lpg_reseller;
                this.gas_export_operation.facility_inspection_conducted = gas_export_operation.facility_inspection_conducted;
            },

            clearExportOperationForm()
            {
                this.gas_export_operation.id = '';
                this.gas_export_operation.date = '';
                this.gas_export_operation.week = '';
                this.gas_export_operation.application_received = '';
                this.gas_export_operation.application_approved = '';
                this.gas_export_operation.application_querried = '';
                this.gas_export_operation.site_verification = '';
                this.gas_export_operation.approval_for_cng_downloading = '';
                this.gas_export_operation.approval_for_lpg_refilling = '';
                this.gas_export_operation.approval_for_lpg_bulk = '';
                this.gas_export_operation.approval_for_lpg_addon = '';
                this.gas_export_operation.license_for_cng_downloading = '';
                this.gas_export_operation.license_for_lpg_refilling = '';
                this.gas_export_operation.license_for_lpg_bulk = '';
                this.gas_export_operation.license_for_lpg_addon = '';
                this.gas_export_operation.license_for_lpg_reseller = '';
                this.gas_export_operation.facility_inspection_conducted = '';
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


            uploadGasDataExcel()
            {
                var input = document.querySelector('input[type="file"]')

                var data = new FormData()
                data.append('file', input.files[0])
                // data.append('user', 'hubot')

                fetch('api/war-gas-uploading/'+this.type, 
                {
                    method: 'post',
                    body: data
                })
                .then(data => {
                if (data.ok)
                    {
                        toastr.success(this.modal_header + ' Uploaded Successfully');

                        this.fetchDrillings();
                        this.fetchReEntries();
                        this.fetchFDPs();
                        this.fetchDepletionRates();
                        this.fetchProductionUtilizationFlares();
                        this.fetchUtilizations();
                        this.fetchFlares();
                        this.fetchSupplyObligations();
                        this.fetchExportBonnies();
                        this.fetchExportNlngs();
                        this.fetchExportEscravoses();
                        this.fetchExportOperations();
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

