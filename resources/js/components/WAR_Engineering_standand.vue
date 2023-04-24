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
                            <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Weekly Activities For Engineering & Standand Division </h4>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control pull-right m-b-2" placeholder="Search" v-model="search" style="width: 60%;" />
                        </div>
                    </div>
                    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#app_es" role="tab" @click="globalPagination(application_data)">APPLICATIONS </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#per" role="tab" @click="globalPagination(permit_data)">PERMITS </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dev" role="tab" @click="globalPagination(development_data)">DEVELOPMENT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#mai" role="tab" @click="globalPagination(maintenance_data)">MAINTENANCE </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">  
                        <div class="tab-pane p-3" id="app_es" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> Engineering & Standand APPLICATIONS <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload E&S APPLICATIONS" style="background: #202020; color: #fff" @click="setModaleHeader('E&S APPLICATIONS', 'application')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="eng_standand_applications" :file_name="'E_S APPLICATIONS'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>Gas Plant-Received</th>
                                                    <th>Gas Plant-Issued <i class="units"></i></th>
                                                    <th>Pet Refinery Received <i class="units"></i></th>
                                                    <th>Pet Refinery Issued </th>
                                                    <th>Petrochemicals Received <i class="units"></i></th>
                                                    <th>Petrochemicals Issued <i class="units"></i></th>
                                                    <th>Oil Facility-Received </th>
                                                    <th>Oil Facility-Issued <i class="units"></i></th>
                                                    <th>Fert plants-Received <i class="units"></i></th>
                                                    <th>Fert plants-Issued </th>
                                                    <th>Alt fuels-Received <i class="units"></i></th> 
                                                    <th>Alt fuels-Issued <i class="units"></i></th>   
                                                    <th>PTS-Received <i class="units"></i></th> 
                                                    <th>PTS-Issued <i class="units"></i></th>  
                                                    <th>OPLL Received  <i class="units"></i></th>  
                                                    <th>OPLL Issued  <i class="units"></i></th>                                           
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addEngStandandApplicationModal" data-toggle="modal" data-original-title="Enter Gas Engineering Standand Application Activities" @click="clearEngStandandApplicationForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="eng_standand_application in filteredEngStandandApplications" v-bind:key="eng_standand_application.id">
                                                <tr>  
                                                    <th>{{eng_standand_application.date}}</th>
                                                    <th>{{eng_standand_application.week}}</th>
                                                    <th>{{eng_standand_application.processing_plant_received}}</th>
                                                    <th>{{eng_standand_application.processing_plant_issued}}</th>
                                                    <th>{{eng_standand_application.pet_refinery_received}}</th>
                                                    <th>{{eng_standand_application.pet_refinery_issued}}</th> 
                                                    <th>{{eng_standand_application.petrochemical_received}}</th> 
                                                    <th>{{eng_standand_application.petrochemical_issued}}</th> 
                                                    <th>{{eng_standand_application.oil_facility_received}}</th> 
                                                    <th>{{eng_standand_application.oil_facility_issued}}</th> 
                                                    <th>{{eng_standand_application.fert_plant_received}}</th> 
                                                    <th>{{eng_standand_application.fert_plant_issued}}</th> 
                                                    <th>{{eng_standand_application.alternate_fuel_received}}</th> 
                                                    <th>{{eng_standand_application.alternate_fuel_issued}}</th> 
                                                    <th>{{eng_standand_application.pts_received}}</th> 
                                                    <th>{{eng_standand_application.pts_issued}}</th> 
                                                    <th>{{eng_standand_application.opll_received}}</th> 
                                                    <th>{{eng_standand_application.opll_issued}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteEngStandandApplication(eng_standand_application.id, 'eng_standand_application')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addEngStandandApplicationModal" @click="editEngStandandApplication(eng_standand_application)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchEngStandandApplications(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchEngStandandApplications(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="per" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> Engineering & Standand PERMIT <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload E&S PERMIT" style="background: #202020; color: #fff" @click="setModaleHeader('E&S PERMIT', 'permit')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="eng_standand_permits" :file_name="'E_S PERMIT'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>General-Received</th>
                                                    <th>General-Issued <i class="units"></i></th>
                                                    <th>Major Received <i class="units"></i></th>
                                                    <th>Major Issued </th>
                                                    <th>Specialised Received <i class="units"></i></th>
                                                    <th>Specialised Issued <i class="units"></i></th>                                        
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addEngStandandPermitModal" data-toggle="modal" data-original-title="Enter Gas Engineering Standand Permit Activities" @click="clearEngStandandPermitForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="eng_standand_permit in filteredEngStandandPermits" v-bind:key="eng_standand_permit.id">
                                                <tr>  
                                                    <th>{{eng_standand_permit.date}}</th>
                                                    <th>{{eng_standand_permit.week}}</th>
                                                    <th>{{eng_standand_permit.general_received}}</th>
                                                    <th>{{eng_standand_permit.general_issued}}</th>
                                                    <th>{{eng_standand_permit.major_received}}</th>
                                                    <th>{{eng_standand_permit.major_issued}}</th> 
                                                    <th>{{eng_standand_permit.specialised_received}}</th> 
                                                    <th>{{eng_standand_permit.specialised_issued}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteEngStandandPermit(eng_standand_permit.id, 'eng_standand_permit')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addEngStandandPermitModal" @click="editEngStandandPermit(eng_standand_permit)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchEngStandandPermits(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchEngStandandPermits(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="dev" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> Engineering & Standand PROJECTS/FACILITIES DEVELOPMENT <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload PROJECTS/FACILITIES DEVELOPMENT" style="background: #202020; color: #fff" @click="setModaleHeader('PROJECTS/FACILITIES DEVELOPMENT', 'development')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="eng_standand_developments" :file_name="'PROJECTS_FACILITIES DEVELOPMENT'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>No. of Deep offshore Projects</th>
                                                    <th>No. of western Area projects<i class="units"></i></th>
                                                    <th>No. of Eastern Area projects <i class="units"></i></th>
                                                    <th>No. of Pipeline projects </th>                                       
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addEngStandandDevelopmentModal" data-toggle="modal" data-original-title="Enter Gas Engineering Standand Development Activities" @click="clearEngStandandDevelopmentForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="eng_standand_development in filteredEngStandandDevelopments" v-bind:key="eng_standand_development.id">
                                                <tr>  
                                                    <th>{{eng_standand_development.date}}</th>
                                                    <th>{{eng_standand_development.week}}</th>
                                                    <th>{{eng_standand_development.deep_offshore_project}}</th>
                                                    <th>{{eng_standand_development.western_area_project}}</th>
                                                    <th>{{eng_standand_development.eastern_area_project}}</th>
                                                    <th>{{eng_standand_development.pipeline_project}}</th>  
                                                    <th>  
                                                      <a class="pull-right" @click="deleteEngStandandDevelopment(eng_standand_development.id, 'eng_standand_development')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addEngStandandDevelopmentModal" @click="editEngStandandDevelopment(eng_standand_development)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchEngStandandDevelopments(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchEngStandandDevelopments(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="mai" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> Engineering & Standand ICT MAINTENANCE AND SUPPORT <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload E&S MAINTENANCE" style="background: #202020; color: #fff" @click="setModaleHeader('E&S MAINTENANCE', 'maintenance')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="eng_standand_maintenances" :file_name="'E_S MAINTENANCE'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>No of system faillures</th>
                                                    <th>No of system faillures Resolved<i class="units"></i></th>
                                                    <th>No Printer Faillures <i class="units"></i></th>
                                                    <th>No Printer Faillures Resolved </th> 
                                                    <th>No of application Errors </th>                        
                                                    <th>No of application Errors Resolved</th>                     
                                                    <th>No of Adhoc Issues</th>                     
                                                    <th>No of Adhoc Issues Resolved</th>                                   
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addEngStandandMaintenanceModal" data-toggle="modal" data-original-title="Enter Gas Engineering Standand Maintenance Activities" @click="clearEngStandandMaintenanceForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="eng_standand_maintenance in filteredEngStandandMaintenances" v-bind:key="eng_standand_maintenance.id">
                                                <tr>  
                                                    <th>{{eng_standand_maintenance.date}}</th>
                                                    <th>{{eng_standand_maintenance.week}}</th>
                                                    <th>{{eng_standand_maintenance.system_failure}}</th>
                                                    <th>{{eng_standand_maintenance.system_failure_resolved}}</th>
                                                    <th>{{eng_standand_maintenance.printer_failure}}</th>
                                                    <th>{{eng_standand_maintenance.printer_failure_resolved}}</th> 
                                                    <th>{{eng_standand_maintenance.application_error}}</th> 
                                                    <th>{{eng_standand_maintenance.application_error_resolved}}</th> 
                                                    <th>{{eng_standand_maintenance.adhoc_issues}}</th> 
                                                    <th>{{eng_standand_maintenance.adhoc_issues_resolved}}</th>  
                                                    <th>  
                                                      <a class="pull-right" @click="deleteEngStandandMaintenance(eng_standand_maintenance.id, 'eng_standand_maintenance')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addEngStandandMaintenanceModal" @click="editEngStandandMaintenance(eng_standand_maintenance)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchEngStandandMaintenances(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchEngStandandMaintenances(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 
                    </div>

                </div>
            </div>
        </div>











        <!-- Add ENGINEERING STANDAND APPLICATION modal -->
        <form @submit.prevent="addEngStandandApplication" class="form-horizontal">
            <div id="addEngStandandApplicationModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit Engineering & Standand Application':'Add Engineering & Standand Application' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-2 col-form-label"> Week </label>
                        <div class="col-sm-4">
                            <select class="form-control" v-model="eng_standand_application.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="eng_standand_application.type" required>
                        </div>

                        <label for="date" class="col-sm-2 col-form-label"> Date </label>
                        <div class="col-sm-4 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="eng_standand_application.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"> Gas Plant-Received</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" v-model="eng_standand_application.processing_plant_received" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Gas Plant-Issued</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_application.processing_plant_issued" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Pet Refinery Received</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_application.pet_refinery_received" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Pet Refinery Issued</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_application.pet_refinery_issued" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Petrochemicals Received</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_application.petrochemical_received" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Petrochemicals Issued</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_application.petrochemical_issued" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Oil Facility-Received</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_application.oil_facility_received" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Oil Facility-Issued</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_application.oil_facility_issued" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Fert plants-Received</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_application.fert_plant_received" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Fert plants-Issued</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_application.fert_plant_issued" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Alt fuels-Received</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_application.alternate_fuel_received" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Alt fuels-Issued</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_application.alternate_fuel_issued" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">PTS-Received </label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_application.pts_received" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">PTS-Issued</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_application.pts_issued" required>
                        </div>
                      </div>    

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">OPLL Received</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_application.opll_received" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">OPLL Issued</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_application.opll_issued" required>
                        </div>
                      </div>                                  


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add E&S Application' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add ENGINEERING STANDAND PERMIT modal -->
        <form @submit.prevent="addEngStandandPermit" class="form-horizontal">
            <div id="addEngStandandPermitModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit Engineering & Standand Permit':'Add Engineering & Standand Permit' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="eng_standand_permit.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="eng_standand_permit.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="eng_standand_permit.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> General-Received</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="eng_standand_permit.general_received" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">General-Issued</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_permit.general_issued" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Major Received</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_permit.major_received" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Major Issued</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_permit.major_issued" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Specialised Received</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_permit.specialised_received" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Specialised Issued</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_permit.specialised_issued" required>
                        </div>
                      </div> 


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add E&S Permit' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add ENGINEERING STANDAND DEVELOPMENT modal -->
        <form @submit.prevent="addEngStandandDevelopment" class="form-horizontal">
            <div id="addEngStandandDevelopmentModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit Engineering & Standand PROJ/FACI DEVELOPMENT':'Add Engineering & Standand PROJECTS/FACI DEVELOPMENT' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="eng_standand_development.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="eng_standand_development.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="eng_standand_development.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No. of Deep offshore Projects</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="eng_standand_development.deep_offshore_project" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No. of western Area projects</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_development.western_area_project" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No. of Eastern Area projects</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_development.eastern_area_project" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No. of Pipeline projects</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_development.pipeline_project" required>
                        </div>
                      </div> 


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add E&S Development' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add ENGINEERING STANDAND MAINTENANCE modal -->
        <form @submit.prevent="addEngStandandMaintenance" class="form-horizontal">
            <div id="addEngStandandMaintenanceModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit Engineering & Standand ICT MAINTENANCE AND SUPPORT':'Add Engineering & Standand ICT MAINTENANCE AND SUPPORT' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="eng_standand_maintenance.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="eng_standand_maintenance.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="eng_standand_maintenance.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of system faillures</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="eng_standand_maintenance.system_failure" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of system faillures Resolved</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_maintenance.system_failure_resolved" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No Printer Faillures</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_maintenance.printer_failure" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No Printer Faillures Resolved</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_maintenance.printer_failure_resolved" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of application Errors</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_maintenance.application_error" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of application Errors Resolved</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_maintenance.application_error_resolved" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of Adhoc Issues</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_maintenance.adhoc_issues" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of Adhoc Issues Resolved</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="eng_standand_maintenance.adhoc_issues_resolved" required>
                        </div>
                      </div> 


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add E&S Maintenance' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>





        <!-- Upload Enginering Standand modal -->
        <form @submit.prevent="uploadEngStandandDataExcel" class="form-horizontal">
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
                eng_standand_applications: [], 
                eng_standand_application: {
                    id: '',
                    date: '',
                    week: '',
                    processing_plant_received: '',
                    processing_plant_issued: '',
                    pet_refinery_received: '',
                    pet_refinery_issued: '',
                    petrochemical_received: '',
                    petrochemical_issued: '',
                    oil_facility_received: '',
                    oil_facility_issued: '',
                    fert_plant_received: '',
                    fert_plant_issued: '',
                    alternate_fuel_received: '',
                    alternate_fuel_issued: '',
                    pts_received: '',
                    pts_issued: '',
                    opll_received: '',
                    opll_issued: '',
                    type: 'eng_standand_application',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                eng_standand_permits: [], 
                eng_standand_permit: {
                    id: '',
                    date: '',
                    week: '',
                    general_received: '',
                    general_issued: '',
                    major_received: '',
                    major_issued: '',
                    specialised_received: '',
                    specialised_issued: '',
                    type: 'eng_standand_permit',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                eng_standand_developments: [], 
                eng_standand_development: {
                    id: '',
                    date: '',
                    week: '',
                    deep_offshore_project: '',
                    western_area_project: '',
                    eastern_area_project: '',
                    pipeline_project: '',
                    type: 'eng_standand_development',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                eng_standand_maintenances: [], 
                eng_standand_maintenance: {
                    id: '',
                    date: '',
                    week: '',
                    system_failure: '',
                    system_failure_resolved: '',
                    printer_failure: '',
                    printer_failure_resolved: '',
                    application_error: '',
                    application_error_resolved: '',
                    adhoc_issues: '',
                    adhoc_issues_resolved: '',
                    type: 'eng_standand_maintenance',
                    user_id:window.sessionStorage.getItem('user_id')
                },


                eng_standand_application_id: '',
                eng_standand_permit_id: '',
                eng_standand_development_id: '',
                eng_standand_maintenance_id: '',
                pagination: {},
                application_data:{},
                permit_data:{},
                development_data:{},
                maintenance_data:{},
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

            this.fetchAllEngStandandApplications();
            this.fetchEngStandandApplications();
            this.fetchAllEngStandandPermits();
            this.fetchEngStandandPermits();
            this.fetchAllEngStandandDevelopments();
            this.fetchEngStandandDevelopments();
            this.fetchAllEngStandandMaintenances();
            this.fetchEngStandandMaintenances();
        },

        computed: {
            filteredEngStandandApplications: function()
            {
                return this.eng_standand_applications.filter((eng_standand_application) => {
                    return eng_standand_application.date.toLowerCase().match(this.search.toLowerCase()) || 
                           eng_standand_application.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredEngStandandPermits: function()
            {
                return this.eng_standand_permits.filter((eng_standand_permit) => {
                    return eng_standand_permit.date.toLowerCase().match(this.search.toLowerCase()) || 
                           eng_standand_permit.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredEngStandandDevelopments: function()
            {
                return this.eng_standand_developments.filter((eng_standand_development) => {
                    return eng_standand_development.date.toLowerCase().match(this.search.toLowerCase()) || 
                           eng_standand_development.week.toLowerCase().match(this.search.toLowerCase())  
                });
            },

            filteredEngStandandMaintenances: function()
            {
                return this.eng_standand_maintenances.filter((eng_standand_maintenance) => {
                    return eng_standand_maintenance.date.toLowerCase().match(this.search.toLowerCase()) || 
                           eng_standand_maintenance.week.toLowerCase().match(this.search.toLowerCase())  
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







            //downstream Eng Standand Application
            fetchAllEngStandandApplications(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-engineering-standands?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.application_data = res;
                    this.eng_standand_applications = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchEngStandandApplications(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-engineering-standands'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.application_data = res;
                    this.eng_standand_applications = res.data;
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

            deleteEngStandandApplication(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Engineering Standand Application ?'))
                {
                    fetch(`api/war-engineering-standand/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Engineering Standand Application Has Been Deleted Successfully');
                        this.fetchEngStandandApplications();
                    })
                    .catch(err => console.log(err));
                }
            },

            addEngStandandApplication()
            {
                if(this.edit === false)
                {
                    fetch('api/war-engineering-standand', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.eng_standand_application),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearEngStandandApplicationForm()
                        toastr.success('Downstream Engineering Standand Application Has Been Add Successfully');
                        this.fetchEngStandandApplications();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addEngStandandApplicationModal').trigger('click');

                }
                else
                {
                    fetch('api/war-engineering-standand', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.eng_standand_application),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearEngStandandApplicationForm();
                        toastr.success('Downstream Engineering Standand Application Has Been Updated Successfully');
                        this.fetchEngStandandApplications();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addEngStandandApplicationModal').trigger('click');
                }
            },

            editEngStandandApplication(eng_standand_application)
            {
                this.edit = true;
                this.eng_standand_application.id = eng_standand_application.id;
                this.eng_standand_application.eng_standand_application_id = eng_standand_application.id;
                this.eng_standand_application.date = eng_standand_application.date;
                this.eng_standand_application.week = eng_standand_application.week;
                this.eng_standand_application.processing_plant_received = eng_standand_application.processing_plant_received;
                this.eng_standand_application.processing_plant_issued = eng_standand_application.processing_plant_issued;
                this.eng_standand_application.pet_refinery_received = eng_standand_application.pet_refinery_received;
                this.eng_standand_application.pet_refinery_issued = eng_standand_application.pet_refinery_issued;
                this.eng_standand_application.petrochemical_received = eng_standand_application.petrochemical_received;
                this.eng_standand_application.petrochemical_issued = eng_standand_application.petrochemical_issued;
                this.eng_standand_application.oil_facility_received = eng_standand_application.oil_facility_received;
                this.eng_standand_application.oil_facility_issued = eng_standand_application.oil_facility_issued;
                this.eng_standand_application.fert_plant_received = eng_standand_application.fert_plant_received;
                this.eng_standand_application.fert_plant_issued = eng_standand_application.fert_plant_issued;
                this.eng_standand_application.alternate_fuel_received = eng_standand_application.alternate_fuel_received;
                this.eng_standand_application.alternate_fuel_issued = eng_standand_application.alternate_fuel_issued;
                this.eng_standand_application.pts_received = eng_standand_application.pts_received;
                this.eng_standand_application.pts_issued = eng_standand_application.pts_issued;
                this.eng_standand_application.opll_received = eng_standand_application.opll_received;
                this.eng_standand_application.opll_issued = eng_standand_application.opll_issued;
            },

            clearEngStandandApplicationForm()
            {
                this.eng_standand_application.id = '';
                this.eng_standand_application.date = '';
                this.eng_standand_application.week = '';
                this.eng_standand_application.processing_plant_received = '';
                this.eng_standand_application.processing_plant_issued = '';
                this.eng_standand_application.pet_refinery_received = '';
                this.eng_standand_application.pet_refinery_issued = '';
                this.eng_standand_application.petrochemical_received = '';
                this.eng_standand_application.petrochemical_issued = '';
                this.eng_standand_application.oil_facility_received = '';
                this.eng_standand_application.oil_facility_issued = '';
                this.eng_standand_application.fert_plant_received = '';
                this.eng_standand_application.fert_plant_issued = '';
                this.eng_standand_application.alternate_fuel_received = '';
                this.eng_standand_application.alternate_fuel_issued = '';
                this.eng_standand_application.pts_received = '';
                this.eng_standand_application.pts_issued = '';
                this.eng_standand_application.opll_received = '';
                this.eng_standand_application.opll_issued = '';
            },




            //downstream Eng Standand Permit
            fetchAllEngStandandPermits(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-engineering-standand-permits?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.permit_data = res;
                    this.eng_standand_permits = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchEngStandandPermits(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-engineering-standand-permits'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.permit_data = res;
                    this.eng_standand_permits = res.data;
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

            deleteEngStandandPermit(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Engineering Standand Permit ?'))
                {
                    fetch(`api/war-engineering-standand/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Engineering Standand Permit Has Been Deleted Successfully');
                        this.fetchEngStandandPermits();
                    })
                    .catch(err => console.log(err));
                }
            },

            addEngStandandPermit()
            {
                if(this.edit === false)
                {
                    fetch('api/war-engineering-standand', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.eng_standand_permit),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearEngStandandPermitForm()
                        toastr.success('Downstream Engineering Standand Permit Has Been Add Successfully');
                        this.fetchEngStandandPermits();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addEngStandandPermitModal').trigger('click');

                }
                else
                {
                    fetch('api/war-engineering-standand', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.eng_standand_permit),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearEngStandandPermitForm();
                        toastr.success('Downstream Engineering Standand Permit Has Been Updated Successfully');
                        this.fetchEngStandandPermits();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addEngStandandPermitModal').trigger('click');
                }
            },

            editEngStandandPermit(eng_standand_permit)
            {
                this.edit = true;
                this.eng_standand_permit.id = eng_standand_permit.id;
                this.eng_standand_permit.eng_standand_permit_id = eng_standand_permit.id;
                this.eng_standand_permit.date = eng_standand_permit.date;
                this.eng_standand_permit.week = eng_standand_permit.week;
                this.eng_standand_permit.general_received = eng_standand_permit.general_received;
                this.eng_standand_permit.general_issued = eng_standand_permit.general_issued;
                this.eng_standand_permit.major_received = eng_standand_permit.major_received;
                this.eng_standand_permit.major_issued = eng_standand_permit.major_issued;
                this.eng_standand_permit.specialised_received = eng_standand_permit.specialised_received;
                this.eng_standand_permit.specialised_issued = eng_standand_permit.specialised_issued;
            },

            clearEngStandandPermitForm()
            {
                this.eng_standand_permit.id = '';
                this.eng_standand_permit.date = '';
                this.eng_standand_permit.week = '';
                this.eng_standand_permit.general_received = '';
                this.eng_standand_permit.general_issued = '';
                this.eng_standand_permit.major_received = '';
                this.eng_standand_permit.major_issued = '';
                this.eng_standand_permit.specialised_received = '';
                this.eng_standand_permit.specialised_issued = '';
            },





            //downstream Eng Standand Development
            fetchAllEngStandandDevelopments(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-engineering-standand-developments?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.development_data = res;
                    this.eng_standand_developments = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchEngStandandDevelopments(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-engineering-standand-developments'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.development_data = res;
                    this.eng_standand_developments = res.data;
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

            deleteEngStandandDevelopment(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Engineering Standand Development ?'))
                {
                    fetch(`api/war-engineering-standand/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Engineering Standand Development Has Been Deleted Successfully');
                        this.fetchEngStandandDevelopments();
                    })
                    .catch(err => console.log(err));
                }
            },

            addEngStandandDevelopment()
            {
                if(this.edit === false)
                {
                    fetch('api/war-engineering-standand', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.eng_standand_development),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearEngStandandDevelopmentForm()
                        toastr.success('Downstream Engineering Standand Development Has Been Add Successfully');
                        this.fetchEngStandandDevelopments();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addEngStandandDevelopmentModal').trigger('click');

                }
                else
                {
                    fetch('api/war-engineering-standand', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.eng_standand_development),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearEngStandandDevelopmentForm();
                        toastr.success('Downstream Engineering Standand Development Has Been Updated Successfully');
                        this.fetchEngStandandDevelopments();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addEngStandandDevelopmentModal').trigger('click');
                }
            },

            editEngStandandDevelopment(eng_standand_development)
            {
                this.edit = true;
                this.eng_standand_development.id = eng_standand_development.id;
                this.eng_standand_development.eng_standand_development_id = eng_standand_development.id;
                this.eng_standand_development.date = eng_standand_development.date;
                this.eng_standand_development.week = eng_standand_development.week;
                this.eng_standand_development.deep_offshore_project = eng_standand_development.deep_offshore_project;
                this.eng_standand_development.western_area_project = eng_standand_development.western_area_project;
                this.eng_standand_development.eastern_area_project = eng_standand_development.eastern_area_project;
                this.eng_standand_development.pipeline_project = eng_standand_development.pipeline_project;
            },

            clearEngStandandDevelopmentForm()
            {
                this.eng_standand_development.id = '';
                this.eng_standand_development.date = '';
                this.eng_standand_development.week = '';
                this.eng_standand_development.deep_offshore_project = '';
                this.eng_standand_development.western_area_project = '';
                this.eng_standand_development.eastern_area_project = '';
                this.eng_standand_development.pipeline_project = '';
            },





            //downstream Eng Standand Maintenance
            fetchAllEngStandandMaintenances(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-engineering-standand-maintenances?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.maintenance_data = res;
                    this.eng_standand_maintenances = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchEngStandandMaintenances(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-engineering-standand-maintenances'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.maintenance_data = res;
                    this.eng_standand_maintenances = res.data;
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

            deleteEngStandandMaintenance(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Downstream Engineering Standand Maintenance ?'))
                {
                    fetch(`api/war-engineering-standand/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Downstream Engineering Standand Maintenance Has Been Deleted Successfully');
                        this.fetchEngStandandMaintenances();
                    })
                    .catch(err => console.log(err));
                }
            },

            addEngStandandMaintenance()
            {
                if(this.edit === false)
                {
                    fetch('api/war-engineering-standand', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.eng_standand_maintenance),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearEngStandandMaintenanceForm()
                        toastr.success('Downstream Engineering Standand Maintenance Has Been Add Successfully');
                        this.fetchEngStandandMaintenances();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addEngStandandMaintenanceModal').trigger('click');

                }
                else
                {
                    fetch('api/war-engineering-standand', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.eng_standand_maintenance),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearEngStandandMaintenanceForm();
                        toastr.success('Downstream Engineering Standand Maintenance Has Been Updated Successfully');
                        this.fetchEngStandandMaintenances();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addEngStandandMaintenanceModal').trigger('click');
                }
            },

            editEngStandandMaintenance(eng_standand_maintenance)
            {
                this.edit = true;
                this.eng_standand_maintenance.id = eng_standand_maintenance.id;
                this.eng_standand_maintenance.eng_standand_maintenance_id = eng_standand_maintenance.id;
                this.eng_standand_maintenance.date = eng_standand_maintenance.date;
                this.eng_standand_maintenance.week = eng_standand_maintenance.week;
                this.eng_standand_maintenance.system_failure = eng_standand_maintenance.system_failure;
                this.eng_standand_maintenance.system_failure_resolved = eng_standand_maintenance.system_failure_resolved;
                this.eng_standand_maintenance.printer_failure = eng_standand_maintenance.printer_failure;
                this.eng_standand_maintenance.printer_failure_resolved = eng_standand_maintenance.printer_failure_resolved;
                this.eng_standand_maintenance.application_error = eng_standand_maintenance.application_error;
                this.eng_standand_maintenance.application_error_resolved = eng_standand_maintenance.application_error_resolved;
                this.eng_standand_maintenance.adhoc_issues = eng_standand_maintenance.adhoc_issues;
                this.eng_standand_maintenance.adhoc_issues_resolved = eng_standand_maintenance.adhoc_issues_resolved;
            },

            clearEngStandandMaintenanceForm()
            {
                this.eng_standand_maintenance.id = '';
                this.eng_standand_maintenance.date = '';
                this.eng_standand_maintenance.week = '';
                this.eng_standand_maintenance.system_failure = '';
                this.eng_standand_maintenance.system_failure_resolved = '';
                this.eng_standand_maintenance.printer_failure = '';
                this.eng_standand_maintenance.printer_failure_resolved = '';
                this.eng_standand_maintenance.application_error = '';
                this.eng_standand_maintenance.application_error_resolved = '';
                this.eng_standand_maintenance.adhoc_issues = '';
                this.eng_standand_maintenance.adhoc_issues_resolved = '';
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


            uploadEngStandandDataExcel()
            {
                var input = document.querySelector('input[type="file"]')

                var data = new FormData()
                data.append('file', input.files[0])
                // data.append('user', 'hubot')

                fetch('api/war-engineering-standand-uploading/'+this.type, 
                {
                    method: 'post',
                    body: data
                })
                .then(data => {
                if (data.ok)
                    {
                        toastr.success(this.modal_header + ' Uploaded Successfully');

                        this.fetchEngStandandApplications();
                        this.fetchEngStandandPermits();
                        this.fetchEngStandandDevelopments();
                        this.fetchEngStandandMaintenances();
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

