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
                            <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Weekly Activities For CORPORATE SERVICES Division
                            </h4>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control pull-right m-b-2" placeholder="Search" v-model="search" style="width: 60%;" />
                        </div>
                    </div>                    
                    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-pad nav-justified" role="tablist" style="">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#sta" role="tab" @click="globalPagination(staff_data)">STAFF </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#med" role="tab" @click="globalPagination(medical_data)">MEDICAL SERVICES </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dis" role="tab" @click="globalPagination(disease_data)">DISEASE PATTERN </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#log" role="tab" @click="globalPagination(logistics_data)">LOGISTICS </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">  
                        <div class="tab-pane active p-3" id="sta" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> CORPORATE SERVICES - STAFF DISPOSITION/MATTERS <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload STAFF DISPOSITION/MATTERS" style="background: #202020; color: #fff" @click="setModaleHeader('STAFF DISPOSITION/MATTERS', 'staff_matter')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="staff_matters" :file_name="'STAFF DISPOSITION_MATTERS'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>Staff Strength</th>
                                                    <th>Retired <i class="units"></i></th>
                                                    <th>Deceased <i class="units"></i></th>
                                                    <th>Commence Annual Leave</th>
                                                    <th>Resumed Annual Leave<i class="units"></i></th>
                                                    <th>Disciplinary Cases<i class="units"></i></th>
                                                    <th>Contractors  Registered </th>
                                                    <th>Local Training <i class="units"></i></th>
                                                    <th>Overseas Training<i class="units"></i></th>                                           
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addStaffMatterModal" data-toggle="modal" data-original-title="Enter Application Activities" @click="clearStaffMatterForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="staff_matter in filteredStaffMatters" v-bind:key="staff_matter.id">
                                                <tr>  
                                                    <th>{{staff_matter.date}}</th>
                                                    <th>{{staff_matter.week}}</th>
                                                    <th>{{staff_matter.staff_strength}}</th>
                                                    <th>{{staff_matter.retired}}</th>
                                                    <th>{{staff_matter.deceased}}</th>
                                                    <th>{{staff_matter.commence_annual_leave}}</th> 
                                                    <th>{{staff_matter.resumed_annaul_leave}}</th> 
                                                    <th>{{staff_matter.new_disiplinary_case}}</th> 
                                                    <th>{{staff_matter.contractor_registered}}</th> 
                                                    <th>{{staff_matter.local_training}}</th> 
                                                    <th>{{staff_matter.overseas_training}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteStaffMatter(staff_matter.id, 'staff_matter')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addStaffMatterModal" @click="editStaffMatter(staff_matter)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchStaffMatters(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchStaffMatters(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="med" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> CORPORATE SERVICES - MEDICAL SERVICES <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload MEDICAL SERVICES" style="background: #202020; color: #fff" @click="setModaleHeader('MEDICAL SERVICES', 'medical_service')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="medical_services" :file_name="'MEDICAL SERVICES'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>Patient Attendance/Clinic Visits</th>
                                                    <th>Referrals <i class="units"></i></th>
                                                    <th>Sick Leave <i class="units"></i></th>
                                                    <th>Maternity Leave <i class="units"></i></th>
                                                    <th>YTD on Health Talk </th>
                                                    <th>YTD on Health Walk <i class="units"></i></th>
                                                    <th>YTD on Immunization <i class="units"></i></th>
                                                    <th>YTD on Canteen Visits </th>                                          
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addMedicalServiceModal" data-toggle="modal" data-original-title="Enter MEDICAL SERVICES" @click="clearMedicalServiceForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="medical_service in filteredMedicalServices" v-bind:key="medical_service.id">
                                                <tr>  
                                                    <th>{{medical_service.date}}</th>
                                                    <th>{{medical_service.week}}</th>
                                                    <th>{{medical_service.clinic_visit}}</th>
                                                    <th>{{medical_service.referral}}</th>
                                                    <th>{{medical_service.sick_leave_case}}</th>
                                                    <th>{{medical_service.maternity_leave}}</th> 
                                                    <th>{{medical_service.health_talk}}</th> 
                                                    <th>{{medical_service.health_walk}}</th> 
                                                    <th>{{medical_service.immunization}}</th> 
                                                    <th>{{medical_service.canteen_visit}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteMedicalService(medical_service.id, 'medical_service')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addMedicalServiceModal" @click="editMedicalService(medical_service)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchMedicalServices(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchMedicalServices(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="dis" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> CORPORATE SERVICES - DISEASE PATTERN <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload DISEASE PATTERN" style="background: #202020; color: #fff" @click="setModaleHeader('DISEASE PATTERN', 'disease_pattern')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="disease_patterns" :file_name="'DISEASE PATTERN'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>Arthritis</th>
                                                    <th>Malaria<i class="units"></i></th>
                                                    <th>URTI <i class="units"></i></th>
                                                    <th>Diabetes <i class="units"></i></th>
                                                    <th>Hypertension </th>
                                                    <th>Viral Syndrome<i class="units"></i></th>                                         
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addDiseasePatternModal" data-toggle="modal" data-original-title="Enter DISEASE PATTERNS" @click="clearDiseasePatternForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="disease_pattern in filteredDiseasePatterns" v-bind:key="disease_pattern.id">
                                                <tr>  
                                                    <th>{{disease_pattern.date}}</th>
                                                    <th>{{disease_pattern.week}}</th>
                                                    <th>{{disease_pattern.arthritis}}</th>
                                                    <th>{{disease_pattern.malaria}}</th>
                                                    <th>{{disease_pattern.urti}}</th>
                                                    <th>{{disease_pattern.diabetes}}</th> 
                                                    <th>{{disease_pattern.hypertension}}</th> 
                                                    <th>{{disease_pattern.viral_syndrome}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteDiseasePattern(disease_pattern.id, 'disease_pattern')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addDiseasePatternModal" @click="editDiseasePattern(disease_pattern)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchDiseasePatterns(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchDiseasePatterns(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div>

                        <div class="tab-pane p-3" id="log" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> CORPORATE SERVICES - LOGISTICS <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload CORPORATE SERVICES - LOGISTICS" style="background: #202020; color: #fff" @click="setModaleHeader('CORPORATE SERVICES - LOGISTICS', 'logistic')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="staff_matters" :file_name="'Logistics'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>New Vehicles</th>
                                                    <th>Util-Total Fleet<i class="units"></i></th>
                                                    <th>Coaster buses <i class="units"></i></th>
                                                    <th>Hilux <i class="units"></i></th>
                                                    <th>Cars </th>
                                                    <th>Peugeot buses<i class="units"></i></th> 
                                                    <th>Mits p/up van </th>
                                                    <th>land cruisers </th>
                                                    <th>Prado Jeep </th>
                                                    <th>Hiace buses </th>
                                                    <th>Ambulance </th>                                        
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addLogisticModal" data-toggle="modal" data-original-title="Enter DISEASE PATTERNS" @click="clearLogisticForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="logistic in filteredLogistics" v-bind:key="logistic.id">
                                                <tr>  
                                                    <th>{{logistic.date}}</th>
                                                    <th>{{logistic.week}}</th>
                                                    <th>{{logistic.newly_received_vehicle}}</th>
                                                    <th>{{logistic.fleet_utilization}}</th>
                                                    <th>{{logistic.coaster_bus}}</th>
                                                    <th>{{logistic.hilux}}</th> 
                                                    <th>{{logistic.cars}}</th> 
                                                    <th>{{logistic.peugeot_bus}}</th> 
                                                    <th>{{logistic.mits_p_up_van}}</th> 
                                                    <th>{{logistic.land_cruiser}}</th> 
                                                    <th>{{logistic.prado_suv}}</th> 
                                                    <th>{{logistic.hiace_bus}}</th> 
                                                    <th>{{logistic.ambulance}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteLogistic(logistic.id, 'logistic')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addLogisticModal" @click="editLogistic(logistic)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchLogistics(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchLogistics(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div>  

                    </div>

                </div>
            </div>
        </div>














        <!-- Add STAFF MATTERS modal -->
        <form @submit.prevent="addStaffMatter" class="form-horizontal">
            <div id="addStaffMatterModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit Staff Matters':'Add Staff Matters' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="staff_matter.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="staff_matter.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="text" class="form-control" id="date" data-plugin="datepicker" v-model="staff_matter.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Staff Strength</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="staff_matter.staff_strength" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Retired</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="staff_matter.retired" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Deceased</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="staff_matter.deceased" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Commence Annual Leave</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="staff_matter.commence_annual_leave" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Resumed Annual Leave</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="staff_matter.resumed_annaul_leave" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Disciplinary Cases</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="staff_matter.new_disiplinary_case" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Contractors  Registered</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="staff_matter.contractor_registered" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Local Training</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="staff_matter.local_training" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Overseas Training</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="staff_matter.overseas_training" required>
                        </div>
                      </div>  


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Staff Matter' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>


        <!-- Add Medical Service modal -->
        <form @submit.prevent="addMedicalService" class="form-horizontal">
            <div id="addMedicalServiceModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit Medical Services':'Add Medical Services' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="medical_service.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="medical_service.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="medical_service.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Patient Attendance/Clinic Visits</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="medical_service.clinic_visit" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Referrals</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="medical_service.referral" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sick Leave</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="medical_service.sick_leave_case" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Maternity Leave</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="medical_service.maternity_leave" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">YTD on Health Talk</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="medical_service.health_talk" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">YTD on Health Walk</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="medical_service.health_walk" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">YTD on Immunization</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="medical_service.immunization" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">YTD on Canteen Visits</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="medical_service.canteen_visit" required>
                        </div>
                      </div>   


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Medical Service' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>


        <!-- Add Disease Pattern modal -->
        <form @submit.prevent="addDiseasePattern" class="form-horizontal">
            <div id="addDiseasePatternModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit Disease Patterns':'Add Disease Patterns' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="disease_pattern.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="disease_pattern.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="disease_pattern.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Patient Attendance/Clinic Visits</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="disease_pattern.arthritis" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Referrals</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="disease_pattern.malaria" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sick Leave</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="disease_pattern.urti" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Maternity Leave</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="disease_pattern.diabetes" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">YTD on Health Talk</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="disease_pattern.hypertension" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">YTD on Health Walk</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="disease_pattern.viral_syndrome" required>
                        </div>
                      </div>    


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Disease Pattern' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>


        <!-- Add Logistic modal -->
        <form @submit.prevent="addLogistic" class="form-horizontal">
            <div id="addLogisticModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit Logistics':'Add Logistics' }} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="logistic.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="logistic.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="logistic.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">New Vehicles</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="logistic.newly_received_vehicle" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Util-Total Fleet</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="logistic.fleet_utilization" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Coaster buses</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="logistic.coaster_bus" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Hilux</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="logistic.hilux" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Cars</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="logistic.cars" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Peugeot buses</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="logistic.peugeot_bus" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Mits p/up van</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="logistic.mits_p_up_van" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">land cruisers</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="logistic.land_cruiser" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Prado SUV</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="logistic.prado_suv" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Hiace buses</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="logistic.hiace_bus" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Ambulance</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="logistic.ambulance" required>
                        </div>
                      </div>   


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Logistic' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>





        <!-- Upload Corporate Services modal -->
        <form @submit.prevent="uploadCorporateServiceDataExcel" class="form-horizontal">
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
                staff_matters: [], 
                staff_matter: {
                    id: '',
                    date: '',
                    week: '',
                    staff_strength: '',
                    retired: '',
                    deceased: '',
                    commence_annual_leave: '',
                    resumed_annaul_leave: '',
                    new_disiplinary_case: '',
                    contractor_registered: '',
                    local_training: '',
                    overseas_training: '',
                    type: 'staff_matter',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                medical_services: [], 
                medical_service: {
                    id: '',
                    date: '',
                    week: '',
                    clinic_visit: '',
                    referral: '',
                    sick_leave_case: '',
                    maternity_leave: '',
                    health_talk: '',
                    health_walk: '',
                    immunization: '',
                    canteen_visit: '',
                    type: 'medical_service',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                disease_patterns: [], 
                disease_pattern: {
                    id: '',
                    date: '',
                    week: '',
                    arthritis: '',
                    malaria: '',
                    urti: '',
                    diabetes: '',
                    hypertension: '',
                    viral_syndrome: '',
                    type: 'disease_pattern',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                logistics: [], 
                logistic: {
                    id: '',
                    date: '',
                    week: '',
                    newly_received_vehicle: '',
                    fleet_utilization: '',
                    coaster_bus: '',
                    hilux: '',
                    cars: '',
                    peugeot_bus: '',
                    mits_p_up_van: '',
                    land_cruiser: '',
                    prado_suv: '',
                    hiace_bus: '',
                    ambulance: '',
                    type: 'logistic',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                staff_matter_id: '',
                medical_service_id: '',
                disease_pattern_id: '',
                logistic_id: '',
                pagination: {},
                staff_data: {},
                medical_data: {},
                disease_data: {},
                logistics_data: {},
                modal_header: '',
                type: '',
                edit: false
            }
        },


        created()
        {
            this.fetchWeeks();

            this.fetchAllStaffMatters();
            this.fetchStaffMatters();
            this.fetchAllMedicalServices();
            this.fetchMedicalServices();
            this.fetchAllDiseasePatterns();
            this.fetchDiseasePatterns();
            this.fetchAllLogistics();
            this.fetchLogistics();
        },

        computed: {
            filteredStaffMatters: function()
            {
                return this.staff_matters.filter((staff_matter) => {
                    return staff_matter.date.toLowerCase().match(this.search.toLowerCase()) || 
                           staff_matter.week.toLowerCase().match(this.search.toLowerCase()) || 
                           staff_matter.staff_strength.toString().match(this.search.toString()) || 
                           staff_matter.retired.toString().match(this.search.toString()) || 
                           staff_matter.deceased.toString().match(this.search.toString()) || 
                           staff_matter.commence_annual_leave.toString().match(this.search.toString()) || 
                           staff_matter.resumed_annaul_leave.toString().match(this.search.toString()) || 
                           staff_matter.new_disiplinary_case.toString().match(this.search.toString()) || 
                           staff_matter.contractor_registered.toString().match(this.search.toString()) || 
                           staff_matter.local_training.toString().match(this.search.toString()) || 
                           staff_matter.overseas_training.toString().match(this.search.toString())    
                });
            },

            filteredMedicalServices: function()
            {
                return this.medical_services.filter((medical_service) => {
                    return medical_service.date.toLowerCase().match(this.search.toLowerCase()) || 
                           medical_service.week.toLowerCase().match(this.search.toLowerCase()) || 
                           medical_service.clinic_visit.toString().match(this.search.toString()) || 
                           medical_service.referral.toString().match(this.search.toString()) || 
                           medical_service.sick_leave_case.toString().match(this.search.toString()) || 
                           medical_service.maternity_leave.toString().match(this.search.toString()) || 
                           medical_service.health_talk.toString().match(this.search.toString()) || 
                           medical_service.health_walk.toString().match(this.search.toString()) || 
                           medical_service.immunization.toString().match(this.search.toString()) || 
                           medical_service.canteen_visit.toString().match(this.search.toString())  
                });
            },

            filteredDiseasePatterns: function()
            {
                return this.disease_patterns.filter((disease_pattern) => {
                    return disease_pattern.date.toLowerCase().match(this.search.toLowerCase()) || 
                           disease_pattern.week.toLowerCase().match(this.search.toLowerCase()) || 
                           disease_pattern.arthritis.toString().match(this.search.toString()) || 
                           disease_pattern.malaria.toString().match(this.search.toString()) || 
                           disease_pattern.urti.toString().match(this.search.toString()) || 
                           disease_pattern.diabetes.toString().match(this.search.toString()) || 
                           disease_pattern.hypertension.toString().match(this.search.toString()) || 
                           disease_pattern.viral_syndrome.toString().match(this.search.toString()) 
                });
            },

            filteredLogistics: function()
            {
                return this.logistics.filter((logistic) => {
                    return logistic.date.toLowerCase().match(this.search.toLowerCase()) || 
                           logistic.week.toLowerCase().match(this.search.toLowerCase()) || 
                           logistic.newly_received_vehicle.toString().match(this.search.toString()) || 
                           logistic.fleet_utilization.toString().match(this.search.toString()) || 
                           logistic.coaster_bus.toString().match(this.search.toString()) || 
                           logistic.hilux.toString().match(this.search.toString()) || 
                           logistic.cars.toString().match(this.search.toString()) || 
                           logistic.peugeot_bus.toString().match(this.search.toString())  || 
                           logistic.mits_p_up_van.toString().match(this.search.toString()) || 
                           logistic.land_cruiser.toString().match(this.search.toString()) || 
                           logistic.prado_suv.toString().match(this.search.toString()) || 
                           logistic.hiace_bus.toString().match(this.search.toString()) || 
                           logistic.ambulance.toString().match(this.search.toString())
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






            //Shec Staff Matters
            fetchAllStaffMatters(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-corporate-services?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.staff_data = res;
                    this.staff_matters = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchStaffMatters(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-corporate-services'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.staff_data = res;
                    this.staff_matters = res.data;
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

            deleteStaffMatter(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Corporate Services Staff Matter ?'))
                {
                    fetch(`api/war-corporate-service/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Corporate Services Staff Matter Has Been Deleted Successfully');
                        this.fetchStaffMatters();
                    })
                    .catch(err => console.log(err));
                }
            },

            addStaffMatter()
            {
                if(this.edit === false)
                {
                    fetch('api/war-corporate-service', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.staff_matter),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearStaffMatterForm()
                        toastr.success('Corporate Services Staff Matter Has Been Add Successfully');
                        this.fetchStaffMatters();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addStaffMatterModal').trigger('click');

                }
                else
                {
                    fetch('api/war-corporate-service', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.staff_matter),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearStaffMatterForm();
                        toastr.success('Corporate Services Staff Matter Has Been Updated Successfully');
                        this.fetchStaffMatters();
                        this.edit = false;

                    }) 
                    .catch(err => console.log(err));
                    $('#addStaffMatterModal').trigger('click');
                }
            },

            editStaffMatter(staff_matter)
            {
                this.edit = true;
                this.staff_matter.id = staff_matter.id;
                this.staff_matter.staff_matter_id = staff_matter.id;
                this.staff_matter.date = staff_matter.date;
                this.staff_matter.week = staff_matter.week;
                this.staff_matter.staff_strength = staff_matter.staff_strength;
                this.staff_matter.retired = staff_matter.retired;
                this.staff_matter.deceased = staff_matter.deceased;
                this.staff_matter.commence_annual_leave = staff_matter.commence_annual_leave;
                this.staff_matter.resumed_annaul_leave = staff_matter.resumed_annaul_leave;
                this.staff_matter.new_disiplinary_case = staff_matter.new_disiplinary_case;
                this.staff_matter.contractor_registered = staff_matter.contractor_registered;
                this.staff_matter.local_training = staff_matter.local_training;
                this.staff_matter.overseas_training = staff_matter.overseas_training;
            },

            clearStaffMatterForm()
            {
                this.staff_matter.id = '';
                this.staff_matter.date = '';
                this.staff_matter.week = '';
                this.staff_matter.staff_strength = '';
                this.staff_matter.retired = '';
                this.staff_matter.deceased = '';
                this.staff_matter.commence_annual_leave = '';
                this.staff_matter.resumed_annaul_leave = '';
                this.staff_matter.new_disiplinary_case = '';
                this.staff_matter.contractor_registered = '';
                this.staff_matter.local_training = '';
                this.staff_matter.overseas_training = '';
            },






            //Medical Services
            fetchAllMedicalServices(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-corporate-service-medical-services?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.medical_data = res;
                    this.medical_services = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchMedicalServices(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-corporate-service-medical-services'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.medical_data = res;
                    this.medical_services = res.data;
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

            deleteMedicalService(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Corporate Services Medical Services ?'))
                {
                    fetch(`api/war-corporate-service/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Corporate Services Medical Services Has Been Deleted Successfully');
                        this.fetchMedicalServices();
                    })
                    .catch(err => console.log(err));
                }
            },

            addMedicalService()
            {
                if(this.edit === false)
                {
                    fetch('api/war-corporate-service', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.medical_service),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearMedicalServiceForm()
                        toastr.success('Corporate Services Medical Services Has Been Add Successfully');
                        this.fetchMedicalServices();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addMedicalServiceModal').trigger('click');

                }
                else
                {
                    fetch('api/war-corporate-service', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.medical_service),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearMedicalServiceForm();
                        toastr.success('Corporate Services Medical Services Has Been Updated Successfully');
                        this.fetchMedicalServices();
                        this.edit = false;

                    }) 
                    .catch(err => console.log(err));
                    $('#addMedicalServiceModal').trigger('click');
                }
            },

            editMedicalService(medical_service)
            {
                this.edit = true;
                this.medical_service.id = medical_service.id;
                this.medical_service.medical_service_id = medical_service.id;
                this.medical_service.date = medical_service.date;
                this.medical_service.week = medical_service.week;
                this.medical_service.clinic_visit = medical_service.clinic_visit;
                this.medical_service.referral = medical_service.referral;
                this.medical_service.sick_leave_case = medical_service.sick_leave_case;
                this.medical_service.maternity_leave = medical_service.maternity_leave;
                this.medical_service.health_talk = medical_service.health_talk;
                this.medical_service.health_walk = medical_service.health_walk;
                this.medical_service.immunization = medical_service.immunization;
                this.medical_service.canteen_visit = medical_service.canteen_visit;
            },

            clearMedicalServiceForm()
            {
                this.medical_service.id = '';
                this.medical_service.date = '';
                this.medical_service.week = '';
                this.medical_service.clinic_visit = '';
                this.medical_service.referral = '';
                this.medical_service.sick_leave_case = '';
                this.medical_service.maternity_leave = '';
                this.medical_service.health_talk = '';
                this.medical_service.health_walk = '';
                this.medical_service.immunization = '';
                this.medical_service.canteen_visit = '';
            },






            //Disease Pattern
            fetchAllDiseasePatterns(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-corporate-service-disease-patterns?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.disease_data = res;
                    this.disease_patterns = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchDiseasePatterns(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-corporate-service-disease-patterns'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.disease_data = res;
                    this.disease_patterns = res.data;
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

            deleteDiseasePattern(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Corporate Services Disease Pattern ?'))
                {
                    fetch(`api/war-corporate-service/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Corporate Services Disease Pattern Has Been Deleted Successfully');
                        this.fetchDiseasePatterns();
                    })
                    .catch(err => console.log(err));
                }
            },

            addDiseasePattern()
            {
                if(this.edit === false)
                {
                    fetch('api/war-corporate-service', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.disease_pattern),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearDiseasePatternForm()
                        toastr.success('Corporate Services Disease Pattern Has Been Add Successfully');
                        this.fetchDiseasePatterns();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addDiseasePatternModal').trigger('click');

                }
                else
                {
                    fetch('api/war-corporate-service', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.disease_pattern),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearDiseasePatternForm();
                        toastr.success('Corporate Services Disease Pattern Has Been Updated Successfully');
                        this.fetchDiseasePatterns();
                        this.edit = false;

                    }) 
                    .catch(err => console.log(err));
                    $('#addDiseasePatternModal').trigger('click');
                }
            },

            editDiseasePattern(disease_pattern)
            {
                this.edit = true;
                this.disease_pattern.id = disease_pattern.id;
                this.disease_pattern.disease_pattern_id = disease_pattern.id;
                this.disease_pattern.date = disease_pattern.date;
                this.disease_pattern.week = disease_pattern.week;
                this.disease_pattern.arthritis = disease_pattern.arthritis;
                this.disease_pattern.malaria = disease_pattern.malaria;
                this.disease_pattern.urti = disease_pattern.urti;
                this.disease_pattern.diabetes = disease_pattern.diabetes;
                this.disease_pattern.hypertension = disease_pattern.hypertension;
                this.disease_pattern.viral_syndrome = disease_pattern.viral_syndrome;
            },

            clearDiseasePatternForm()
            {
                this.disease_pattern.id = '';
                this.disease_pattern.date = '';
                this.disease_pattern.week = '';
                this.disease_pattern.arthritis = '';
                this.disease_pattern.malaria = '';
                this.disease_pattern.urti = '';
                this.disease_pattern.diabetes = '';
                this.disease_pattern.hypertension = '';
                this.disease_pattern.viral_syndrome = '';
            },





            //Logistic
            fetchAllLogistics(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-corporate-service-logistics?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.logistics_data = res;
                    this.logistics = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchLogistics(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-corporate-service-logistics'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.logistics_data = res;
                    this.logistics = res.data;
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

            deleteLogistic(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Corporate Services Logistic ?'))
                {
                    fetch(`api/war-corporate-service/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Corporate Services Logistic Has Been Deleted Successfully');
                        this.fetchLogistics();
                    })
                    .catch(err => console.log(err));
                }
            },

            addLogistic()
            {
                if(this.edit === false)
                {
                    fetch('api/war-corporate-service', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.logistic),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearLogisticForm()
                        toastr.success('Corporate Services Logistic Has Been Add Successfully');
                        this.fetchLogistics();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addLogisticModal').trigger('click');

                }
                else
                {
                    fetch('api/war-corporate-service', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.logistic),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearLogisticForm();
                        toastr.success('Corporate Services Logistic Has Been Updated Successfully');
                        this.fetchLogistics();
                        this.edit = false;

                    }) 
                    .catch(err => console.log(err));
                    $('#addLogisticModal').trigger('click');
                }
            },

            editLogistic(logistic)
            {
                this.edit = true;
                this.logistic.id = logistic.id;
                this.logistic.logistic_id = logistic.id;
                this.logistic.date = logistic.date;
                this.logistic.week = logistic.week;
                this.logistic.newly_received_vehicle = logistic.newly_received_vehicle;
                this.logistic.fleet_utilization = logistic.fleet_utilization;
                this.logistic.coaster_bus = logistic.coaster_bus;
                this.logistic.hilux = logistic.hilux;
                this.logistic.cars = logistic.cars;
                this.logistic.peugeot_bus = logistic.peugeot_bus;
                this.logistic.mits_p_up_van = logistic.mits_p_up_van;
                this.logistic.land_cruiser = logistic.land_cruiser;
                this.logistic.prado_suv = logistic.prado_suv;
                this.logistic.hiace_bus = logistic.hiace_bus;
                this.logistic.ambulance = logistic.ambulance;
            },

            clearLogisticForm()
            {
                this.logistic.id = '';
                this.logistic.date = '';
                this.logistic.week = '';
                this.logistic.newly_received_vehicle = '';
                this.logistic.fleet_utilization = '';
                this.logistic.coaster_bus = '';
                this.logistic.hilux = '';
                this.logistic.cars = '';
                this.logistic.peugeot_bus = '';
                this.logistic.mits_p_up_van = '';
                this.logistic.land_cruiser = '';
                this.logistic.prado_suv = '';
                this.logistic.hiace_bus = '';
                this.logistic.ambulance = '';
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


            uploadCorporateServiceDataExcel()
            {
                var input = document.querySelector('input[type="file"]')

                var data = new FormData()
                data.append('file', input.files[0])
                // data.append('user', 'hubot')

                fetch('api/war-corporate-service-uploading/'+this.type, 
                {
                    method: 'post',
                    body: data
                })
                .then(data => {
                if (data.ok)
                    {
                        toastr.success(this.modal_header + ' Uploaded Successfully');

                        this.fetchStaffMatters();
                        this.fetchMedicalServices();
                        this.fetchDiseasePatterns();
                        this.fetchLogistics();
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

    $(function()
    {
        $("#date").datepicker(
        {
            format: " yyyy",  autoclose: true,// Notice the Extra space at the beginning
            viewMode: "years",
            minViewMode: "years"
        });
    });


</script>

