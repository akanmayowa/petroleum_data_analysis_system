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
                            <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Weekly Activities For SHEC OPERATIONS Division </h4>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control pull-right m-b-2" placeholder="Search" v-model="search" style="width: 60%;" />
                        </div>
                    </div>
                    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#apps" role="tab" @click="globalPagination(application_data)">APPLICATIONS </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#osp" role="tab" @click="globalPagination(registration_data)">OSP REGISTRATION </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#mgt" role="tab" @click="globalPagination(incidence_mgt_data)">INCIDENCE MGT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#spi" role="tab" @click="globalPagination(spill_mgt_data)">SPILL INCIDENCE MGT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#was" role="tab" @click="globalPagination(waste_mgt_data)">WASTE MGT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#rep" role="tab" @click="globalPagination(other_data)">OTHER REPORT </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">  
                        <div class="tab-pane p-3" id="apps" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> SHEC OPERATIONS APPLICATIONS <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload SHEC OPERATIONS APPLICATIONS" style="background: #202020; color: #fff" @click="setModaleHeader('SHEC OPERATIONS APPLICATIONS', 'application_shec')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="shec_applications" :file_name="'SHEC Application'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>Env Studies Received</th>
                                                    <th>Env Studies issued <i class="units"></i></th>
                                                    <th>Discharge Permits Received <i class="units"></i></th>
                                                    <th>Discharge Permits Issued</th>
                                                    <th>Radiation Permits Received <i class="units"></i></th>
                                                    <th>Radiation Permits Issued<i class="units"></i></th>
                                                    <th>Safety Cases Received </th>
                                                    <th>Safety Cases Issued <i class="units"></i></th>
                                                    <th>Lab Accreditatiod Received <i class="units"></i></th>
                                                    <th>Lab Accreditatiod Issued </th>
                                                    <th>Oil Field Received <i class="units"></i></th> 
                                                    <th>Oil Field Issued <i class="units"></i></th>   
                                                    <th>Point Sour Reg Received <i class="units"></i></th> 
                                                    <th>Point Sour Reg issued <i class="units"></i></th>                                            
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addShecApplicationModal" data-toggle="modal" data-original-title="Enter Application Activities" @click="clearShecApplicationForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="shec_application in filteredShecApplications" v-bind:key="shec_application.id">
                                                <tr>  
                                                    <th>{{shec_application.date}}</th>
                                                    <th>{{shec_application.week}}</th>
                                                    <th>{{shec_application.environment_application_receiced}}</th>
                                                    <th>{{shec_application.environment_application_issued}}</th>
                                                    <th>{{shec_application.discharge_permit_receiced}}</th>
                                                    <th>{{shec_application.discharge_permit_issued}}</th> 
                                                    <th>{{shec_application.radiation_safety_permit_receiced}}</th> 
                                                    <th>{{shec_application.radiation_safety_permit_issued}}</th> 
                                                    <th>{{shec_application.safety_case_permit_receiced}}</th> 
                                                    <th>{{shec_application.safety_case_permit_issued}}</th> 
                                                    <th>{{shec_application.lab_accredition_receiced}}</th> 
                                                    <th>{{shec_application.lab_accredition_issued}}</th> 
                                                    <th>{{shec_application.chemical_application_receiced}}</th> 
                                                    <th>{{shec_application.chemical_application_issued}}</th> 
                                                    <th>{{shec_application.registration_application_received}}</th> 
                                                    <th>{{shec_application.registration_application_issued}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteShecApplication(shec_application.id, 'shec_application')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addShecApplicationModal" @click="editShecApplication(shec_application)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchShecApplications(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchShecApplications(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="osp" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> SHEC OSP REGISTRATION <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload SHEC OSP REGISTRATION " style="background: #202020; color: #fff" @click="setModaleHeader('SHEC OSP REGISTRATION ', 'osp_registration')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="shec_osp_registrations" :file_name="'SHEC Registration'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>Personnel Registered</th>
                                                    <th>Image Captured <i class="units"></i></th>
                                                    <th>Permit issued <i class="units"></i></th>                                           
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addShecOspRegistrationModal" data-toggle="modal" data-original-title="Enter Osp Registration Activities" @click="clearShecOspRegistrationForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="shec_osp_registration in filteredShecOspRegistrations" v-bind:key="shec_osp_registration.id">
                                                <tr>  
                                                    <th>{{shec_osp_registration.date}}</th>
                                                    <th>{{shec_osp_registration.week}}</th>
                                                    <th>{{shec_osp_registration.personel_captured}}</th>
                                                    <th>{{shec_osp_registration.image_captured}}</th>
                                                    <th>{{shec_osp_registration.permit_issued}}</th>
                                                    <th>  
                                                      <a class="pull-right" @click="deleteShecOspRegistration(shec_osp_registration.id, 'shec_osp_registration')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addShecOspRegistrationModal" @click="editShecOspRegistration(shec_osp_registration)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchShecOspRegistrations(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchShecOspRegistrations(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="mgt" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> SHEC INCIDENCE MANAGEMENT <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload SHEC INCIDENCE MANAGEMENT" style="background: #202020; color: #fff" @click="setModaleHeader('SHEC INCIDENCE MANAGEMENT', 'incidence')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="shec_incidence_mgts" :file_name="'SHEC Incidents Mgt'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>Incidents/Accidents </th>
                                                    <th>Fatal Incidents  <i class="units"></i></th>
                                                    <th>Fatalities <i class="units"></i></th>
                                                    <th>Work Related <i class="units"></i></th> 
                                                    <th>Non-Work Related  <i class="units"></i></th>                                            
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addShecIncidenceMgtModal" data-toggle="modal" data-original-title="Enter Incidents Management" @click="clearShecIncidenceMgtForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="shec_incidence_mgt in filteredShecIncidenceMgts" v-bind:key="shec_incidence_mgt.id">
                                                <tr>  
                                                    <th>{{shec_incidence_mgt.date}}</th>
                                                    <th>{{shec_incidence_mgt.week}}</th>
                                                    <th>{{shec_incidence_mgt.incidence_accident}}</th>
                                                    <th>{{shec_incidence_mgt.fatal_incidence}}</th>
                                                    <th>{{shec_incidence_mgt.fatalities}}</th>
                                                    <th>{{shec_incidence_mgt.work_related}}</th>
                                                    <th>{{shec_incidence_mgt.non_work_related}}</th>
                                                    <th>  
                                                      <a class="pull-right" @click="deleteShecIncidenceMgt(shec_incidence_mgt.id, 'shec_incidence_mgt')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addShecIncidenceMgtModal" @click="editShecIncidenceMgt(shec_incidence_mgt)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchShecIncidenceMgts(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchShecIncidenceMgts(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="spi" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> SHEC SPILL INCIDENCE MANAGEMENT <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload SPILL INCIDENCE MANAGEMENT" style="background: #202020; color: #fff" @click="setModaleHeader('SPILL INCIDENCE MANAGEMENT', 'spill_incidence')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="shec_spill_incidence_mgts" :file_name="'SHEC Spill Mgt'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>Spill Number</th>
                                                    <th>Spill Volume (bbls) <i class="units"></i></th>
                                                    <th>Quantity Recovered(bbls) <i class="units"></i></th>
                                                    <th>No. of JIV Conducted<i class="units"></i></th> 
                                                    <th>No. of Community Issues<i class="units"></i></th>                                            
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addShecSpillIncidenceMgtModal" data-toggle="modal" data-original-title="Enter Spill Incidents Management" @click="clearShecSpillIncidenceMgtForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="shec_spill_incidence_mgt in filteredShecSpillIncidenceMgts" v-bind:key="shec_spill_incidence_mgt.id">
                                                <tr>  
                                                    <th>{{shec_spill_incidence_mgt.date}}</th>
                                                    <th>{{shec_spill_incidence_mgt.week}}</th>
                                                    <th>{{shec_spill_incidence_mgt.spill_number}}</th>
                                                    <th>{{shec_spill_incidence_mgt.spill_volume}}</th>
                                                    <th>{{shec_spill_incidence_mgt.quantity_recoverd}}</th>
                                                    <th>{{shec_spill_incidence_mgt.jiv_conducted}}</th>
                                                    <th>{{shec_spill_incidence_mgt.community_issued}}</th>
                                                    <th>  
                                                      <a class="pull-right" @click="deleteShecSpillIncidenceMgt(shec_spill_incidence_mgt.id, 'shec_spill_incidence_mgt')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addShecSpillIncidenceMgtModal" @click="editShecSpillIncidenceMgt(shec_spill_incidence_mgt)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchShecSpillIncidenceMgts(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchShecSpillIncidenceMgts(pagination.next_page_url)">Next</a></li> 
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="was" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> SHEC WASTE MANAGEMENT <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload SHEC WASTE MANAGEMENT" style="background: #202020; color: #fff" @click="setModaleHeader('SHEC WASTE MANAGEMENT', 'waste_management')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="shec_waste_managements" :file_name="'SHEC Waste Mgt'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>TDU-Application</th>
                                                    <th>TDU-Appr Granted<i class="units"></i></th>
                                                    <th>Incinerator Application <i class="units"></i></th>
                                                    <th>Incinerator Appr Granted<i class="units"></i></th> 
                                                    <th>WBM Application<i class="units"></i></th>  
                                                    <th>WBM Appr Granted</th>
                                                    <th>Tank Cln Application</th>
                                                    <th>Tank Cln Appr Granted</th>
                                                    <th>Solid Ctrl Application</th>
                                                    <th>Solid Ctrl Appr Granted</th>
                                                    <th>Spill Clean up Application</th>
                                                    <th>Spill Clean up Appr Granted</th>
                                                    <th>Remediation Application</th>
                                                    <th>Remediation Appr Granted</th>
                                                    <th>Prod Water Application</th>
                                                    <th>Prod Water Appr Granted</th>
                                                    <th>Waste Water/Slop Application</th>
                                                    <th>Waste Water/Slop Appr Granted</th>                                          
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addShecWasteManagementModal" data-toggle="modal" data-original-title="Enter Waste Management" @click="clearShecWasteManagementForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="shec_waste_management in filteredShecWasteManagements" v-bind:key="shec_waste_management.id">
                                                <tr>  
                                                    <th>{{shec_waste_management.date}}</th>
                                                    <th>{{shec_waste_management.week}}</th>
                                                    <th>{{shec_waste_management.tdu_new_application}}</th>
                                                    <th>{{shec_waste_management.tdu_approval_granted}}</th>
                                                    <th>{{shec_waste_management.incinerator_new_application}}</th>
                                                    <th>{{shec_waste_management.incinerator_approval_granted}}</th>
                                                    <th>{{shec_waste_management.wbm_new_application}}</th>
                                                    <th>{{shec_waste_management.wbm_approval_granted}}</th>
                                                    <th>{{shec_waste_management.tank_cleaning_new_application}}</th>
                                                    <th>{{shec_waste_management.tank_cleaning_approval_granted}}</th>
                                                    <th>{{shec_waste_management.solid_control_new_application}}</th>
                                                    <th>{{shec_waste_management.solid_control_approval_granted}}</th>
                                                    <th>{{shec_waste_management.spill_clean_up_new_application}}</th>
                                                    <th>{{shec_waste_management.spill_clean_up_approval_granted}}</th>
                                                    <th>{{shec_waste_management.remediation_new_application}}</th>
                                                    <th>{{shec_waste_management.remediation_approval_granted}}</th>
                                                    <th>{{shec_waste_management.produced_water_new_application}}</th>
                                                    <th>{{shec_waste_management.produced_water_approval_granted}}</th>
                                                    <th>{{shec_waste_management.waste_slop_new_application}}</th>
                                                    <th>{{shec_waste_management.waste_slop_approval_granted}}</th>
                                                    <th>  
                                                      <a class="pull-right" @click="deleteShecWasteManagement(shec_waste_management.id, 'shec_waste_management')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addShecWasteManagementModal" @click="editShecWasteManagement(shec_waste_management)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchShecWasteManagements(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchShecWasteManagements(pagination.next_page_url)">Next</a></li> 
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="rep" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> SHEC OTHER REPORT <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload SHEC OTHER REPORT" style="background: #202020; color: #fff" @click="setModaleHeader('SHEC OTHER REPORT', 'others')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="shec_other_reports" :file_name="'SHEC Other Reports'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>HAZOP</th>
                                                    <th>RBI<i class="units"></i></th>
                                                    <th>PSV Cert <i class="units"></i></th>
                                                    <th>Leak Test<i class="units"></i></th> 
                                                    <th>Rig inspection<i class="units"></i></th>  
                                                    <th>Vessel Inspection</th>
                                                    <th>New Tech</th>
                                                    <th>Compliance monitoring</th>
                                                    <th>Proj monitoring </th>
                                                    <th>Facility Insp Audit</th>
                                                    <th>Safety Training</th>
                                                    <th>Permit withd case</th>                                        
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addShecOtherReportModal" data-toggle="modal" data-original-title="Enter HSC Other Report" @click="clearShecOtherReportForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="shec_other_report in filteredShecOtherReports" v-bind:key="shec_other_report.id">
                                                <tr>  
                                                    <th>{{shec_other_report.date}}</th>
                                                    <th>{{shec_other_report.week}}</th>
                                                    <th>{{shec_other_report.hazop}}</th>
                                                    <th>{{shec_other_report.rbi}}</th>
                                                    <th>{{shec_other_report.psv_certification}}</th>
                                                    <th>{{shec_other_report.leak_test}}</th>
                                                    <th>{{shec_other_report.rig_inspection}}</th>
                                                    <th>{{shec_other_report.vessel_inspection}}</th>
                                                    <th>{{shec_other_report.new_technologies}}</th>
                                                    <th>{{shec_other_report.conpliance_monitoring}}</th>
                                                    <th>{{shec_other_report.project_monitoring_activities}}</th>
                                                    <th>{{shec_other_report.facility_inspection_audit}}</th>
                                                    <th>{{shec_other_report.safety_training}}</th>
                                                    <th>{{shec_other_report.permit_withdrawal_cases}}</th>
                                                    <th>  
                                                      <a class="pull-right" @click="deleteShecOtherReport(shec_other_report.id, 'shec_other_report')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addShecOtherReportModal" @click="editShecOtherReport(shec_other_report)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchShecOtherReports(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchShecOtherReports(pagination.next_page_url)">Next</a></li> 
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 

                    </div>

                </div>
            </div>
        </div>











        <!-- Add SHEC APPLICATION modal -->
        <form @submit.prevent="addShecApplication" class="form-horizontal">
            <div id="addShecApplicationModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit SHEC Operations - Application':'Add SHEC Operations - Application' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-2 col-form-label"> Week </label>
                        <div class="col-sm-4">
                            <select class="form-control" v-model="shec_application.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="shec_application.type" required>
                        </div>

                        <label for="date" class="col-sm-2 col-form-label"> Date </label>
                        <div class="col-sm-4 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="shec_application.date" required>
                        </div>
                      </div> 
                      
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Env Studies Received</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_application.environment_application_receiced" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Env Studies issued</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_application.environment_application_issued" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Discharge Permits Received</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_application.discharge_permit_receiced" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Discharge Permits Issued</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_application.discharge_permit_issued" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Radiation Permits Received</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_application.radiation_safety_permit_receiced" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Radiation Permits Issued</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_application.radiation_safety_permit_issued" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Safety Cases Received</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_application.safety_case_permit_receiced" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Safety Cases Issued</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_application.safety_case_permit_issued" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Lab Accreditatiod Received</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_application.lab_accredition_receiced" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Lab Accreditatiod Issued</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_application.lab_accredition_issued" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Oil Field Received</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_application.chemical_application_receiced" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Oil Field Issued</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_application.chemical_application_issued" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Point Sour Reg Received </label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_application.registration_application_received" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Point Sour Reg issued</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_application.registration_application_issued" required>
                        </div>
                      </div>                                    


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add SHEC Application' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add SHEC OSP REGISTRATION modal -->
        <form @submit.prevent="addShecOspRegistration" class="form-horizontal">
            <div id="addShecOspRegistrationModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit SHEC Operations - OSP Registration':'Add SHEC Operations - OSP Registration' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="shec_osp_registration.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="shec_osp_registration.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="shec_osp_registration.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Personnel Registered</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="shec_osp_registration.personel_captured" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Image Captured</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="shec_osp_registration.image_captured" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Permit issued</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="shec_osp_registration.permit_issued" required>
                        </div>
                      </div>                                 


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add SHEC OSP Registration' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add SHEC INCIDENCE MANAGEMENT modal -->
        <form @submit.prevent="addShecIncidenceMgt" class="form-horizontal">
            <div id="addShecIncidenceMgtModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit SHEC Operations - Incidence Management':'Add SHEC Operations - Incidence Management' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="shec_incidence_mgt.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="shec_incidence_mgt.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="shec_incidence_mgt.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Incidents/Accidents</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="shec_incidence_mgt.incidence_accident" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Fatal Incidents</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="shec_incidence_mgt.fatal_incidence" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Fatalities</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="shec_incidence_mgt.fatalities" required>
                        </div>
                      </div>   

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Work Related</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="shec_incidence_mgt.work_related" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Non-Work Related</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="shec_incidence_mgt.non_work_related" required>
                        </div>
                      </div>                                


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Incidence Mgt' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add SHEC SPILL INCIDENCE MANAGEMENT modal -->
        <form @submit.prevent="addShecSpillIncidenceMgt" class="form-horizontal">
            <div id="addShecSpillIncidenceMgtModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit SHEC Operations - Spill Incidence Management':'Add SHEC Operations - Spill Incidence Management' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="shec_spill_incidence_mgt.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="shec_spill_incidence_mgt.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="shec_spill_incidence_mgt.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Spill Number</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="shec_spill_incidence_mgt.spill_number" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Spill Volume (bbls)</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="shec_spill_incidence_mgt.spill_volume" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Quantity recovered(bbls)</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="shec_spill_incidence_mgt.quantity_recoverd" required>
                        </div>
                      </div>   

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No. of JIV conducted</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="shec_spill_incidence_mgt.jiv_conducted" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No. of Community issues</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="shec_spill_incidence_mgt.community_issued" required>
                        </div>
                      </div>                                


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Spill Incidence Mgt' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add SHEC WASTE MANAGEMENT modal -->
        <form @submit.prevent="addShecWasteManagement" class="form-horizontal">
            <div id="addShecWasteManagementModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit SHEC Operations - Waste Management':'Add SHEC Operations - Waste Management' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="shec_waste_management.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="shec_waste_management.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="shec_waste_management.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">TDU-Application</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="shec_waste_management.tdu_new_application" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">TDU-Appr Granted</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.tdu_approval_granted" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Incinerator Application</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.incinerator_new_application" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Incinerator Appr Granted</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.incinerator_approval_granted" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">WBM Application</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.wbm_new_application" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">WBM Appr Granted</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.wbm_approval_granted" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Tank Cln Application</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.tank_cleaning_new_application" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Tank Cln Appr Granted</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.tank_cleaning_approval_granted" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Solid Ctrl Application</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.solid_control_new_application" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Solid Ctrl Appr Granted</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.solid_control_approval_granted" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Spill Clean up Application</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.spill_clean_up_new_application" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Spill Clean up Appr Granted</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.spill_clean_up_approval_granted" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Remediation Application</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.remediation_new_application" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Remediation Appr Granted</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.remediation_approval_granted" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Prod Water Application</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.produced_water_new_application" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Prod Water Appr Granted</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.produced_water_approval_granted" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Waste Water/Slop Application</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.waste_slop_new_application" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Waste Water/Slop Appr Granted</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" class="form-control" v-model="shec_waste_management.waste_slop_approval_granted" required>
                        </div>
                      </div>                              


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Waste Management' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add SHEC OTHER REPORT modal -->
        <form @submit.prevent="addShecOtherReport" class="form-horizontal">
            <div id="addShecOtherReportModal" class="modal fade" role="dialog" @click="edit = false">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit SHEC Operations - Other Report':'Add SHEC Operations - Other Report' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-2 col-form-label"> Week </label>
                        <div class="col-sm-4">
                            <select class="form-control" v-model="shec_other_report.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="shec_other_report.type" required>
                        </div>

                        <label for="date" class="col-sm-2 col-form-label"> Date </label>
                        <div class="col-sm-4 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="shec_other_report.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">HAZOP</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" v-model="shec_other_report.hazop" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">RBI</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_other_report.rbi" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">PSV Certification</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_other_report.psv_certification" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Leak Test</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_other_report.leak_test" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Rig inspection</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_other_report.rig_inspection" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Vessel Inspection</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_other_report.vessel_inspection" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">New Technologies</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_other_report.new_technologies" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Compliance monitoring</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_other_report.conpliance_monitoring" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Project monitoring activities</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_other_report.project_monitoring_activities" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Facility Inspection/HSC Audit</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_other_report.facility_inspection_audit" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Safety/HSE Training</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_other_report.safety_training" required>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Permit withdrawal cases</label>
                        <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" v-model="shec_other_report.permit_withdrawal_cases" required>
                        </div>
                      </div>                             


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Other Report' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>





        <!-- Upload SHEC modal -->
        <form @submit.prevent="uploadSHECDataExcel" class="form-horizontal">
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
                shec_applications: [], 
                shec_application: {
                    id: '',
                    date: '',
                    week: '',
                    environment_application_receiced: '',
                    environment_application_issued: '',
                    discharge_permit_receiced: '',
                    discharge_permit_issued: '',
                    radiation_safety_permit_receiced: '',
                    radiation_safety_permit_issued: '',
                    safety_case_permit_receiced: '',
                    safety_case_permit_issued: '',
                    lab_accredition_receiced: '',
                    lab_accredition_issued: '',
                    chemical_application_receiced: '',
                    chemical_application_issued: '',
                    registration_application_received: '',
                    registration_application_issued: '',
                    type: 'shec_application',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                shec_osp_registrations: [], 
                shec_osp_registration: {
                    id: '',
                    date: '',
                    week: '',
                    personel_captured: '',
                    image_captured: '',
                    permit_issued: '',
                    type: 'shec_osp_registration',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                shec_incidence_mgts: [], 
                shec_incidence_mgt: {
                    id: '',
                    date: '',
                    week: '',
                    incidence_accident: '',
                    fatal_incidence: '',
                    fatalities: '',
                    work_related: '',
                    non_work_related: '',
                    type: 'shec_incidence_mgt',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                shec_spill_incidence_mgts: [], 
                shec_spill_incidence_mgt: {
                    id: '',
                    date: '',
                    week: '',
                    spill_number: '',
                    spill_volume: '',
                    quantity_recoverd: '',
                    jiv_conducted: '',
                    community_issued: '',
                    type: 'shec_spill_incidence_mgt',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                shec_waste_managements: [], 
                shec_waste_management: {
                    id: '',
                    date: '',
                    week: '',
                    tdu_new_application: '',
                    tdu_approval_granted: '',
                    incinerator_new_application: '',
                    incinerator_approval_granted: '',
                    wbm_new_application: '',
                    wbm_approval_granted: '',
                    tank_cleaning_new_application: '',
                    tank_cleaning_approval_granted: '',
                    solid_control_new_application: '',
                    solid_control_approval_granted: '',
                    spill_clean_up_new_application: '',
                    spill_clean_up_approval_granted: '',
                    remediation_new_application: '',
                    remediation_approval_granted: '',
                    produced_water_new_application: '',
                    produced_water_approval_granted: '',
                    waste_slop_new_application: '',
                    waste_slop_approval_granted: '',
                    type: 'shec_waste_management',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                shec_other_reports: [], 
                shec_other_report: {
                    id: '',
                    date: '',
                    week: '',
                    hazop: '',
                    rbi: '',
                    psv_certification: '',
                    leak_test: '',
                    rig_inspection: '',
                    vessel_inspection: '',
                    new_technologies: '',
                    conpliance_monitoring: '',
                    project_monitoring_activities: '',
                    facility_inspection_audit: '',
                    safety_training: '',
                    permit_withdrawal_cases: '',
                    type: 'shec_other_report',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                shec_application_id: '',
                shec_osp_registration_id: '',
                shec_incidence_mgt_id: '',
                shec_spill_incidence_mgt_id: '',
                shec_waste_management_id: '',
                shec_other_report_id: '',
                pagination: {},
                application_data:{},
                registration_data:{},
                incidence_mgt_data:{},
                spill_mgt_data:{},
                waste_mgt_data:{},
                other_data:{},
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

            this.fetchAllShecApplications();
            this.fetchShecApplications();
            this.fetchAllShecOspRegistrations();
            this.fetchShecOspRegistrations();
            this.fetchAllShecIncidenceMgts();
            this.fetchShecIncidenceMgts();
            this.fetchAllShecSpillIncidenceMgts();
            this.fetchShecSpillIncidenceMgts();
            this.fetchAllShecWasteManagements();
            this.fetchShecWasteManagements();
            this.fetchAllShecOtherReports();
            this.fetchShecOtherReports();
        },

        computed: {
            filteredShecApplications: function()
            {
                return this.shec_applications.filter((shec_application) => {
                    return shec_application.date.toLowerCase().match(this.search.toLowerCase()) || 
                           shec_application.week.toLowerCase().match(this.search.toLowerCase())     || 
                           shec_application.environment_application_receiced.toString().match(this.search.toString())    || 
                           shec_application.environment_application_issued.toString().match(this.search.toString())    || 
                           shec_application.discharge_permit_receiced.toString().match(this.search.toString())    || 
                           shec_application.discharge_permit_issued.toString().match(this.search.toString())    || 
                           shec_application.radiation_safety_permit_receiced.toString().match(this.search.toString())    || 
                           shec_application.radiation_safety_permit_issued.toString().match(this.search.toString())    || 
                           shec_application.safety_case_permit_receiced.toString().match(this.search.toString())    || 
                           shec_application.safety_case_permit_issued.toString().match(this.search.toString())    || 
                           shec_application.lab_accredition_receiced.toString().match(this.search.toString())    || 
                           shec_application.lab_accredition_issued.toString().match(this.search.toString())    || 
                           shec_application.chemical_application_receiced.toString().match(this.search.toString())    || 
                           shec_application.chemical_application_issued.toString().match(this.search.toString())    || 
                           shec_application.registration_application_received.toString().match(this.search.toString())    || 
                           shec_application.registration_application_issued.toString().match(this.search.toString()) 
                });
            },

            filteredShecOspRegistrations: function()
            {
                return this.shec_osp_registrations.filter((shec_osp_registration) => {
                    return shec_osp_registration.date.toLowerCase().match(this.search.toLowerCase()) || 
                           shec_osp_registration.week.toLowerCase().match(this.search.toLowerCase())  || 
                           shec_osp_registration.personel_captured.toString().match(this.search.toString())   || 
                           shec_osp_registration.image_captured.toString().match(this.search.toString())   || 
                           shec_osp_registration.permit_issued.toString().match(this.search.toString()) 
                });
            },

            filteredShecIncidenceMgts: function()
            {
                return this.shec_incidence_mgts.filter((shec_incidence_mgt) => {
                    return shec_incidence_mgt.date.toLowerCase().match(this.search.toLowerCase()) || 
                           shec_incidence_mgt.week.toLowerCase().match(this.search.toLowerCase())  || 
                           shec_incidence_mgt.incidence_accident.toString().match(this.search.toString())   || 
                           shec_incidence_mgt.fatal_incidence.toString().match(this.search.toString())   || 
                           shec_incidence_mgt.fatalities.toString().match(this.search.toString())   || 
                           shec_incidence_mgt.work_related.toString().match(this.search.toString())   || 
                           shec_incidence_mgt.non_work_related.toString().match(this.search.toString()) 
                });
            },

            filteredShecSpillIncidenceMgts: function()
            {
                return this.shec_spill_incidence_mgts.filter((shec_spill_incidence_mgt) => {
                    return shec_spill_incidence_mgt.date.toLowerCase().match(this.search.toLowerCase()) || 
                           shec_spill_incidence_mgt.week.toLowerCase().match(this.search.toLowerCase())  || 
                           shec_spill_incidence_mgt.spill_number.toString().match(this.search.toString())   || 
                           shec_spill_incidence_mgt.spill_volume.toString().match(this.search.toString())   || 
                           shec_spill_incidence_mgt.quantity_recoverd.toString().match(this.search.toString())   || 
                           shec_spill_incidence_mgt.jiv_conducted.toString().match(this.search.toString())   || 
                           shec_spill_incidence_mgt.community_issued.toString().match(this.search.toString()) 
                });
            },

            filteredShecWasteManagements: function()
            {
                return this.shec_waste_managements.filter((shec_waste_management) => {
                    return shec_waste_management.date.toLowerCase().match(this.search.toLowerCase()) || 
                           shec_waste_management.week.toLowerCase().match(this.search.toLowerCase())  || 
                           shec_waste_management.tdu_new_application.toString().match(this.search.toString())   || 
                           shec_waste_management.tdu_approval_granted.toString().match(this.search.toString())   || 
                           shec_waste_management.incinerator_new_application.toString().match(this.search.toString())   || 
                           shec_waste_management.incinerator_approval_granted.toString().match(this.search.toString())   || 
                           shec_waste_management.wbm_new_application.toString().match(this.search.toString())   || 
                           shec_waste_management.wbm_approval_granted.toString().match(this.search.toString())   || 
                           shec_waste_management.tank_cleaning_new_application.toString().match(this.search.toString())   || 
                           shec_waste_management.tank_cleaning_approval_granted.toString().match(this.search.toString())   || 
                           shec_waste_management.solid_control_new_application.toString().match(this.search.toString())   || 
                           shec_waste_management.solid_control_approval_granted.toString().match(this.search.toString())   || 
                           shec_waste_management.spill_clean_up_new_application.toString().match(this.search.toString())   || 
                           shec_waste_management.spill_clean_up_approval_granted.toString().match(this.search.toString())   || 
                           shec_waste_management.remediation_new_application.toString().match(this.search.toString())   || 
                           shec_waste_management.remediation_approval_granted.toString().match(this.search.toString())   || 
                           shec_waste_management.produced_water_new_application.toString().match(this.search.toString())   || 
                           shec_waste_management.produced_water_approval_granted.toString().match(this.search.toString())   || 
                           shec_waste_management.waste_slop_new_application.toString().match(this.search.toString())   || 
                           shec_waste_management.waste_slop_approval_granted.toString().match(this.search.toString()) 
                });
            },

            filteredShecOtherReports: function()
            {
                return this.shec_other_reports.filter((shec_other_report) => {
                    return shec_other_report.date.toLowerCase().match(this.search.toLowerCase()) || 
                           shec_other_report.week.toLowerCase().match(this.search.toLowerCase())  || 
                           shec_other_report.hazop.toString().match(this.search.toString())   || 
                           shec_other_report.rbi.toString().match(this.search.toString())   || 
                           shec_other_report.psv_certification.toString().match(this.search.toString())   || 
                           shec_other_report.leak_test.toString().match(this.search.toString())   || 
                           shec_other_report.rig_inspection.toString().match(this.search.toString())   || 
                           shec_other_report.vessel_inspection.toString().match(this.search.toString())   || 
                           shec_other_report.new_technologies.toString().match(this.search.toString())   || 
                           shec_other_report.conpliance_monitoring.toString().match(this.search.toString())   || 
                           shec_other_report.project_monitoring_activities.toString().match(this.search.toString())   || 
                           shec_other_report.facility_inspection_audit.toString().match(this.search.toString())   || 
                           shec_other_report.safety_training.toString().match(this.search.toString())   || 
                           shec_other_report.permit_withdrawal_cases.toString().match(this.search.toString()) 
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







            //Shec Application
            fetchAllShecApplications(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-shecs?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.application_data = res;
                    this.shec_applications = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchShecApplications(page_url)
            {
                let vm = this;
                page_url = page_url || '/api/war-shecs'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.application_data = res;
                    this.shec_applications = res.data;
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

            deleteShecApplication(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Shec Operations Application ?'))
                {
                    fetch(`api/war-shec/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Shec Operations Application Has Been Deleted Successfully');
                        this.fetchShecApplications();
                    })
                    .catch(err => console.log(err));
                }
            },

            addShecApplication()
            {
                if(this.edit === false)
                {
                    fetch('api/war-shec', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.shec_application),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearShecApplicationForm()
                        toastr.success('Shec Operations Application Has Been Add Successfully');
                        this.fetchShecApplications();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addShecApplicationModal').trigger('click');

                }
                else
                {
                    fetch('api/war-shec', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.shec_application),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearShecApplicationForm();
                        toastr.success('Shec Operations Application Has Been Updated Successfully');
                        this.fetchShecApplications();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addShecApplicationModal').trigger('click');
                }
            },

            editShecApplication(shec_application)
            {
                this.edit = true;
                this.shec_application.id = shec_application.id;
                this.shec_application.shec_application_id = shec_application.id;
                this.shec_application.date = shec_application.date;
                this.shec_application.week = shec_application.week;
                this.shec_application.environment_application_receiced = shec_application.environment_application_receiced;
                this.shec_application.environment_application_issued = shec_application.environment_application_issued;
                this.shec_application.discharge_permit_receiced = shec_application.discharge_permit_receiced;
                this.shec_application.discharge_permit_issued = shec_application.discharge_permit_issued;
                this.shec_application.radiation_safety_permit_receiced = shec_application.radiation_safety_permit_receiced;
                this.shec_application.radiation_safety_permit_issued = shec_application.radiation_safety_permit_issued;
                this.shec_application.safety_case_permit_receiced = shec_application.safety_case_permit_receiced;
                this.shec_application.safety_case_permit_issued = shec_application.safety_case_permit_issued;
                this.shec_application.lab_accredition_receiced = shec_application.lab_accredition_receiced;
                this.shec_application.lab_accredition_issued = shec_application.lab_accredition_issued;
                this.shec_application.chemical_application_receiced = shec_application.chemical_application_receiced;
                this.shec_application.chemical_application_issued = shec_application.chemical_application_issued;
                this.shec_application.registration_application_received = shec_application.registration_application_received;
                this.shec_application.registration_application_issued = shec_application.registration_application_issued;
            },

            clearShecApplicationForm()
            {
                this.shec_application.id = '';
                this.shec_application.date = '';
                this.shec_application.week = '';
                this.shec_application.environment_application_receiced = '';
                this.shec_application.environment_application_issued = '';
                this.shec_application.discharge_permit_receiced = '';
                this.shec_application.discharge_permit_issued = '';
                this.shec_application.radiation_safety_permit_receiced = '';
                this.shec_application.radiation_safety_permit_issued = '';
                this.shec_application.safety_case_permit_receiced = '';
                this.shec_application.safety_case_permit_issued = '';
                this.shec_application.lab_accredition_receiced = '';
                this.shec_application.lab_accredition_issued = '';
                this.shec_application.chemical_application_receiced = '';
                this.shec_application.chemical_application_issued = '';
                this.shec_application.registration_application_received = '';
                this.shec_application.registration_application_issued = '';
            },



            //Shec OspRegistration
            fetchAllShecOspRegistrations(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-shec-registrations?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.registration_data = res;
                    this.shec_osp_registrations = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchShecOspRegistrations(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-shec-registrations'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.registration_data = res;
                    this.shec_osp_registrations = res.data;
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

            deleteShecOspRegistration(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Shec Operations Osp Registration ?'))
                {
                    fetch(`api/war-shec/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Shec Operations Osp Registration Has Been Deleted Successfully');
                        this.fetchShecOspRegistrations();
                    })
                    .catch(err => console.log(err));
                }
            },

            addShecOspRegistration()
            {
                if(this.edit === false)
                {
                    fetch('api/war-shec', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.shec_osp_registration),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearShecOspRegistrationForm()
                        toastr.success('Shec Operations Osp Registration Has Been Add Successfully');
                        this.fetchShecOspRegistrations();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addShecOspRegistrationModal').trigger('click');

                }
                else
                {
                    fetch('api/war-shec', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.shec_osp_registration),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearShecOspRegistrationForm();
                        toastr.success('Shec Operations Osp Registration Has Been Updated Successfully');
                        this.fetchShecOspRegistrations();
                        this.edit = true;
                    }) 
                    .catch(err => console.log(err));
                    $('#addShecOspRegistrationModal').trigger('click');
                }
            },

            editShecOspRegistration(shec_osp_registration)
            {
                this.edit = true;
                this.shec_osp_registration.id = shec_osp_registration.id;
                this.shec_osp_registration.shec_osp_registration_id = shec_osp_registration.id;
                this.shec_osp_registration.date = shec_osp_registration.date;
                this.shec_osp_registration.week = shec_osp_registration.week;
                this.shec_osp_registration.personel_captured = shec_osp_registration.personel_captured;
                this.shec_osp_registration.image_captured = shec_osp_registration.image_captured;
                this.shec_osp_registration.permit_issued = shec_osp_registration.permit_issued;
            },

            clearShecOspRegistrationForm()
            {
                this.shec_osp_registration.id = '';
                this.shec_osp_registration.date = '';
                this.shec_osp_registration.week = '';
                this.shec_osp_registration.personel_captured = '';
                this.shec_osp_registration.image_captured = '';
                this.shec_osp_registration.permit_issued = '';
            },



            //Shec IncidenceMgt
            fetchAllShecIncidenceMgts(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-shec-incidence-managements?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.incidence_mgt_data = res;
                    this.shec_incidence_mgts = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchShecIncidenceMgts(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-shec-incidence-managements'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.incidence_mgt_data = res;
                    this.shec_incidence_mgts = res.data;
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

            deleteShecIncidenceMgt(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Shec Operations Incidence Management ?'))
                {
                    fetch(`api/war-shec/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Shec Operations Incidence Management Has Been Deleted Successfully');
                        this.fetchShecIncidenceMgts();
                    })
                    .catch(err => console.log(err));
                }
            },

            addShecIncidenceMgt()
            {
                if(this.edit === false)
                {
                    fetch('api/war-shec', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.shec_incidence_mgt),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearShecIncidenceMgtForm()
                        toastr.success('Shec Operations Incidence Management Has Been Add Successfully');
                        this.fetchShecIncidenceMgts();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addShecIncidenceMgtModal').trigger('click');

                }
                else
                {
                    fetch('api/war-shec', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.shec_incidence_mgt),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearShecIncidenceMgtForm();
                        toastr.success('Shec Operations Incidence Management Has Been Updated Successfully');
                        this.fetchShecIncidenceMgts();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addShecIncidenceMgtModal').trigger('click');
                }
            },

            editShecIncidenceMgt(shec_incidence_mgt)
            {
                this.edit = true;
                this.shec_incidence_mgt.id = shec_incidence_mgt.id;
                this.shec_incidence_mgt.shec_incidence_mgt_id = shec_incidence_mgt.id;
                this.shec_incidence_mgt.date = shec_incidence_mgt.date;
                this.shec_incidence_mgt.week = shec_incidence_mgt.week;
                this.shec_incidence_mgt.incidence_accident = shec_incidence_mgt.incidence_accident;
                this.shec_incidence_mgt.fatal_incidence = shec_incidence_mgt.fatal_incidence;
                this.shec_incidence_mgt.fatalities = shec_incidence_mgt.fatalities;
                this.shec_incidence_mgt.work_related = shec_incidence_mgt.work_related;
                this.shec_incidence_mgt.non_work_related = shec_incidence_mgt.non_work_related;
            },

            clearShecIncidenceMgtForm()
            {
                this.shec_incidence_mgt.id = '';
                this.shec_incidence_mgt.date = '';
                this.shec_incidence_mgt.week = '';
                this.shec_incidence_mgt.incidence_accident = '';
                this.shec_incidence_mgt.fatal_incidence = '';
                this.shec_incidence_mgt.fatalities = '';
                this.shec_incidence_mgt.work_related = '';
                this.shec_incidence_mgt.non_work_related = '';
            },



            //Shec SpillIncidenceMgt
            fetchAllShecSpillIncidenceMgts(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-shec-spill-incidence-managements?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.spill_mgt_data = res;
                    this.shec_spill_incidence_mgts = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchShecSpillIncidenceMgts(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-shec-spill-incidence-managements'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.spill_mgt_data = res;
                    this.shec_spill_incidence_mgts = res.data;
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

            deleteShecSpillIncidenceMgt(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Shec Operations Spill Incidence Management ?'))
                {
                    fetch(`api/war-shec/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Shec Operations Spill Incidence Management Has Been Deleted Successfully');
                        this.fetchShecSpillIncidenceMgts();
                    })
                    .catch(err => console.log(err));
                }
            },

            addShecSpillIncidenceMgt()
            {
                if(this.edit === false)
                {
                    fetch('api/war-shec', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.shec_spill_incidence_mgt),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearShecSpillIncidenceMgtForm()
                        toastr.success('Shec Operations Spill Incidence Management Has Been Add Successfully');
                        this.fetchShecSpillIncidenceMgts();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addShecSpillIncidenceMgtModal').trigger('click');

                }
                else
                {
                    fetch('api/war-shec', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.shec_spill_incidence_mgt),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearShecSpillIncidenceMgtForm();
                        toastr.success('Shec Operations Spill Incidence Management Has Been Updated Successfully');
                        this.fetchShecSpillIncidenceMgts();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addShecSpillIncidenceMgtModal').trigger('click');
                }
            },

            editShecSpillIncidenceMgt(shec_spill_incidence_mgt)
            {
                this.edit = true;
                this.shec_spill_incidence_mgt.id = shec_spill_incidence_mgt.id;
                this.shec_spill_incidence_mgt.shec_spill_incidence_mgt_id = shec_spill_incidence_mgt.id;
                this.shec_spill_incidence_mgt.date = shec_spill_incidence_mgt.date;
                this.shec_spill_incidence_mgt.week = shec_spill_incidence_mgt.week;
                this.shec_spill_incidence_mgt.spill_number = shec_spill_incidence_mgt.spill_number;
                this.shec_spill_incidence_mgt.spill_volume = shec_spill_incidence_mgt.spill_volume;
                this.shec_spill_incidence_mgt.quantity_recoverd = shec_spill_incidence_mgt.quantity_recoverd;
                this.shec_spill_incidence_mgt.jiv_conducted = shec_spill_incidence_mgt.jiv_conducted;
                this.shec_spill_incidence_mgt.community_issued = shec_spill_incidence_mgt.community_issued;
            },

            clearShecSpillIncidenceMgtForm()
            {
                this.shec_spill_incidence_mgt.id = '';
                this.shec_spill_incidence_mgt.date = '';
                this.shec_spill_incidence_mgt.week = '';
                this.shec_spill_incidence_mgt.spill_number = '';
                this.shec_spill_incidence_mgt.spill_volume = '';
                this.shec_spill_incidence_mgt.quantity_recoverd = '';
                this.shec_spill_incidence_mgt.jiv_conducted = '';
                this.shec_spill_incidence_mgt.community_issued = '';
            },



            //Shec WasteManagement
            fetchAllShecWasteManagements(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-shec-waste-managements?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.waste_mgt_data = res;
                    this.shec_waste_managements = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchShecWasteManagements(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-shec-waste-managements'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.waste_mgt_data = res;
                    this.shec_waste_managements = res.data;
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

            deleteShecWasteManagement(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Shec Operations Waste Management ?'))
                {
                    fetch(`api/war-shec/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Shec Operations Waste Management Has Been Deleted Successfully');
                        this.fetchShecWasteManagements();
                    })
                    .catch(err => console.log(err));
                }
            },

            addShecWasteManagement()
            {
                if(this.edit === false)
                {
                    fetch('api/war-shec', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.shec_waste_management),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearShecWasteManagementForm()
                        toastr.success('Shec Operations Waste Management Has Been Add Successfully');
                        this.fetchShecWasteManagements();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addShecWasteManagementModal').trigger('click');

                }
                else
                {
                    fetch('api/war-shec', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.shec_waste_management),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearShecWasteManagementForm();
                        toastr.success('Shec Operations Waste Management Has Been Updated Successfully');
                        this.fetchShecWasteManagements();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addShecWasteManagementModal').trigger('click');
                }
            },

            editShecWasteManagement(shec_waste_management)
            {
                this.edit = true;
                this.shec_waste_management.id = shec_waste_management.id;
                this.shec_waste_management.shec_waste_management_id = shec_waste_management.id;
                this.shec_waste_management.date = shec_waste_management.date;
                this.shec_waste_management.week = shec_waste_management.week;
                this.shec_waste_management.tdu_new_application = shec_waste_management.tdu_new_application;
                this.shec_waste_management.tdu_approval_granted = shec_waste_management.tdu_approval_granted;
                this.shec_waste_management.incinerator_new_application = shec_waste_management.incinerator_new_application;
                this.shec_waste_management.incinerator_approval_granted = shec_waste_management.incinerator_approval_granted;
                this.shec_waste_management.wbm_new_application = shec_waste_management.wbm_new_application;
                this.shec_waste_management.wbm_approval_granted = shec_waste_management.wbm_approval_granted;
                this.shec_waste_management.tank_cleaning_new_application = shec_waste_management.tank_cleaning_new_application;
                this.shec_waste_management.tank_cleaning_approval_granted = shec_waste_management.tank_cleaning_approval_granted;
                this.shec_waste_management.solid_control_new_application = shec_waste_management.solid_control_new_application;
                this.shec_waste_management.solid_control_approval_granted = shec_waste_management.solid_control_approval_granted;
                this.shec_waste_management.spill_clean_up_new_application = shec_waste_management.spill_clean_up_new_application;
                this.shec_waste_management.spill_clean_up_approval_granted = shec_waste_management.spill_clean_up_approval_granted;
                this.shec_waste_management.remediation_new_application = shec_waste_management.remediation_new_application;
                this.shec_waste_management.remediation_approval_granted = shec_waste_management.remediation_approval_granted;
                this.shec_waste_management.produced_water_new_application = shec_waste_management.produced_water_new_application;
                this.shec_waste_management.produced_water_approval_granted = shec_waste_management.produced_water_approval_granted;
                this.shec_waste_management.waste_slop_new_application = shec_waste_management.waste_slop_new_application;
                this.shec_waste_management.waste_slop_approval_granted = shec_waste_management.waste_slop_approval_granted;
            },

            clearShecWasteManagementForm()
            {
                this.shec_waste_management.id = '';
                this.shec_waste_management.date = '';
                this.shec_waste_management.week = '';
                this.shec_waste_management.tdu_new_application = '';
                this.shec_waste_management.tdu_approval_granted = '';
                this.shec_waste_management.incinerator_new_application = '';
                this.shec_waste_management.incinerator_approval_granted = '';
                this.shec_waste_management.wbm_new_application = '';
                this.shec_waste_management.wbm_approval_granted = '';
                this.shec_waste_management.tank_cleaning_new_application = '';
                this.shec_waste_management.tank_cleaning_approval_granted = '';
                this.shec_waste_management.solid_control_new_application = '';
                this.shec_waste_management.solid_control_approval_granted = '';
                this.shec_waste_management.spill_clean_up_new_application = '';
                this.shec_waste_management.spill_clean_up_approval_granted = '';
                this.shec_waste_management.remediation_new_application = '';
                this.shec_waste_management.remediation_approval_granted = '';
                this.shec_waste_management.produced_water_new_application = '';
                this.shec_waste_management.produced_water_approval_granted = '';
                this.shec_waste_management.waste_slop_new_application = '';
                this.shec_waste_management.waste_slop_approval_granted = '';
            },



            //Shec OtherReport
            fetchAllShecOtherReports(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-shec-other-reports?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.other_data = res;
                    this.shec_other_reports = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchShecOtherReports(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-shec-other-reports'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.other_data = res;
                    this.shec_other_reports = res.data;
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

            deleteShecOtherReport(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Shec Operations Other Report ?'))
                {
                    fetch(`api/war-shec/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Shec Operations Other Report Has Been Deleted Successfully');
                        this.fetchShecOtherReports();
                    })
                    .catch(err => console.log(err));
                }
            },

            addShecOtherReport()
            {
                if(this.edit === false)
                {
                    fetch('api/war-shec', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.shec_other_report),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearShecOtherReportForm()
                        toastr.success('Shec Operations Other Report Has Been Add Successfully');
                        this.fetchShecOtherReports();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addShecOtherReportModal').trigger('click');

                }
                else
                {
                    fetch('api/war-shec', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.shec_other_report),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearShecOtherReportForm();
                        toastr.success('Shec Operations Other Report Has Been Updated Successfully');
                        this.fetchShecOtherReports();
                        this.edit = false;

                    }) 
                    .catch(err => console.log(err));
                    $('#addShecOtherReportModal').trigger('click');
                }
            },

            editShecOtherReport(shec_other_report)
            {
                this.edit = true;
                this.shec_other_report.id = shec_other_report.id;
                this.shec_other_report.shec_other_report_id = shec_other_report.id;
                this.shec_other_report.date = shec_other_report.date;
                this.shec_other_report.week = shec_other_report.week;
                this.shec_other_report.hazop = shec_other_report.hazop;
                this.shec_other_report.rbi = shec_other_report.rbi;
                this.shec_other_report.psv_certification = shec_other_report.psv_certification;
                this.shec_other_report.leak_test = shec_other_report.leak_test;
                this.shec_other_report.rig_inspection = shec_other_report.rig_inspection;
                this.shec_other_report.vessel_inspection = shec_other_report.vessel_inspection;
                this.shec_other_report.new_technologies = shec_other_report.new_technologies;
                this.shec_other_report.conpliance_monitoring = shec_other_report.conpliance_monitoring;
                this.shec_other_report.project_monitoring_activities = shec_other_report.project_monitoring_activities;
                this.shec_other_report.facility_inspection_audit = shec_other_report.facility_inspection_audit;
                this.shec_other_report.safety_training = shec_other_report.safety_training;
                this.shec_other_report.permit_withdrawal_cases = shec_other_report.permit_withdrawal_cases;
            },

            clearShecOtherReportForm()
            {
                this.shec_other_report.id = '';
                this.shec_other_report.date = '';
                this.shec_other_report.week = '';
                this.shec_other_report.hazop = '';
                this.shec_other_report.rbi = '';
                this.shec_other_report.psv_certification = '';
                this.shec_other_report.leak_test = '';
                this.shec_other_report.rig_inspection = '';
                this.shec_other_report.vessel_inspection = '';
                this.shec_other_report.new_technologies = '';
                this.shec_other_report.conpliance_monitoring = '';
                this.shec_other_report.project_monitoring_activities = '';
                this.shec_other_report.facility_inspection_audit = '';
                this.shec_other_report.safety_training = '';
                this.shec_other_report.permit_withdrawal_cases = '';
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


            uploadSHECDataExcel()
            {
                var input = document.querySelector('input[type="file"]')

                var data = new FormData()
                data.append('file', input.files[0])
                // data.append('user', 'hubot')

                fetch('api/war-shec-uploading/'+this.type, 
                {
                    method: 'post',
                    body: data
                })
                .then(data => {
                if (data.ok)
                    {
                        toastr.success(this.modal_header + ' Uploaded Successfully');

                        this.fetchShecApplications();
                        this.fetchShecOspRegistrations();
                        this.fetchShecIncidenceMgts();
                        this.fetchShecSpillIncidenceMgts();
                        this.fetchShecWasteManagements();
                        this.fetchShecOtherReports();
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

