
@extends('layouts.app')   

@section('search')
    <div class="search-wrap" id="search-wrap">
        <div class="search-bar">          
            <input class="search-input" type="search" id="dynamicsearch" placeholder="Search" />
            <a href="#" class="close-search toggle-search" data-target="#search-wrap">  <i class="mdi mdi-close-circle" style="font-size:20px"></i> </a>
        </div>
    </div>
@endsection


@section('css')



{{-- INCLUDING STYLES --}}
@include('she-accident-report.css.styles')



@section('content')




<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Health Safety & Environment (HSE) Upload </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-justified" role="tablist">                    
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_safety_permit') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_safety_permit') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#lab" role="tab"> Laboratories </a>
                        </li>
                    @endif
                    
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_safety_permit') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_safety_permit') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#safe" role="tab"> Safety </a>
                        </li>
                    @endif
                    
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_safety_permit') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_safety_permit') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#env_ass" role="tab"> Environmental Assessment </a>
                        </li>
                    @endif
                    
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_waste_mgt_facilities') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_waste_mgt_facilities') ||
                      Auth::user()->role_obj->permission->contains('constant', 'manage_accredited_waste_mgr') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_accredited_waste_mgr') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#waste" role="tab"> Waste Management </a>
                        </li>
                    @endif
                    
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_waste_mgt_facilities') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_waste_mgt_facilities') ||
                      Auth::user()->role_obj->permission->contains('constant', 'manage_accredited_waste_mgr') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_accredited_waste_mgr') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#poll" role="tab"> Pollution control </a>
                        </li>
                    @endif
                </ul>

                <!-- Tab panes -->
                <div class="tab-content"> 

                    <div class="tab-pane" id="lab" role="tabpanel">
                        <p class="font-14 mb-0" style="padding: 3px 0px">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist">                     
                                {{-- <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link drilling_chemical" data-toggle="tab" href="#dri_chem" role="tab" onclick="displayDrillingChemical()"> Drilling Chemical </a>
                                </li>   --}}                           
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link chemical_certification" data-toggle="tab" href="#app_chem" role="tab" onclick="displayChemicalCertification()">Chemical Certifications</a>
                                </li>                             
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link accredited_laboratories" data-toggle="tab" href="#acc_lab" role="tab" onclick="displayAccreditedLaboratories()"> Accreditated Laboratories </a>
                                </li>  

                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link environmental_compliance" data-toggle="tab" href="#env_comp" role="tab" onclick="displayEnvironmentalComplianceMonitoring()"> Environmental Compliance Monitoring </a>
                                </li>    
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane p-3" id="app_chem" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="chemical_certification">    

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="acc_lab" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="accredited_laboratories">    

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="env_comp" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="environmental_compliance">    

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                {{-- <div class="tab-pane p-3" id="chemInv" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="chemical_inventory">    

                                        </div>
                                    </p>
                                </div> --}}

                                {{-- <div class="tab-pane p-3" id="dri_chem" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="drilling_chemical">    

                                        </div>
                                    </p>
                                </div> --}}

                                
                            </div>                            
                        </p>
                    </div> 


                    <div class="tab-pane" id="safe" role="tabpanel">
                        <p class="font-14 mb-0" style="padding: 3px 0px">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist">                     
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link safety_permit" data-toggle="tab" href="#safe_perm" role="tab" 
                                    onclick="displaySafetyPermit()"> Offshore Safety Permit (OSP) </a>
                                </li>                    
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link radiation_safety_permit" data-toggle="tab" href="#rad_safe_perm" role="tab" 
                                    onclick="displayRadiationSafetyPermit()"> Radiation Safety Permits </a>
                                </li>        
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link medical_training_center" data-toggle="tab" href="#med_cen" role="tab" onclick="displayMedicalTrainingCenter()"> Safety Training Centers </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link she_upstream" data-toggle="tab" href="#up" role="tab" onclick="displayUpstream()"> Upstream Incidence </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link she_downstream" data-toggle="tab" href="#down" role="tab" onclick="displayDownstream()"> Downstream Incidence </a>
                                </li>   
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane p-3" id="safe_perm" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="safety_permit">    

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="rad_safe_perm" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="radiation_safety_permit">    

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="med_cen" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="medical_training_center">    

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="up" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="she_upstream">    

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="down" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="she_downstream">    

                                        </div> <!-- end row -->
                                    </p>
                                </div>
                                
                            </div>                            
                        </p>
                    </div>


                    <div class="tab-pane" id="env_ass" role="tabpanel">
                        <p class="font-14 mb-0" style="padding: 3px 0px">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist">                     
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link environmental_studies" data-toggle="tab" href="#env_stu" role="tab" onclick="displayEnvironmentalStudies()"> Environmental Studies </a>
                                </li>   
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane p-3" id="env_stu" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="environmental_studies">    

                                        </div> <!-- end row -->
                                    </p>
                                </div>
                                
                            </div>                            
                        </p>
                    </div>

                    <div class="tab-pane" id="waste" role="tabpanel">
                        <p class="font-14 mb-0" style="padding: 3px 0px">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist">  
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link waste_vol" data-toggle="tab" href="#waste_v" role="tab" onclick="displayWasteVol()"> Drilling Waste </a>
                                </li> 

                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link effluent_waste_discharged" data-toggle="tab" href="#effluent" role="tab" onclick="displayEffluentWasteDischarged()"> Effluent Waste Discharged </a>
                                </li> 

                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link water_vol" data-toggle="tab" href="#water_v" role="tab" onclick="displayWaterVol()"> Produced Water </a>
                                </li>

                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link waste_mgt_facilities" data-toggle="tab" href="#waste_fac" role="tab" onclick="displayWasteFacility()"> Waste Management Facilities </a>
                                </li>

                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link waste_manager" data-toggle="tab" href="#waste_man" role="tab" onclick="displayWasteManagers()"> Accredited Waste Managers </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane p-3" id="waste_v" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="waste_vol">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="effluent" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="effluent_waste_discharged">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="water_v" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="water_vol">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="waste_fac" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="waste_mgt_facilities">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="waste_man" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="waste_manager">    

                                        </div> <!-- end row -->
                                    </p>
                                </div>
                                
                            </div>                            
                        </p>
                    </div>

                    <div class="tab-pane" id="poll" role="tabpanel">
                        <p class="font-14 mb-0" style="padding: 3px 0px">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist">  
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link oil_spill_contingency" data-toggle="tab" href="#conti" role="tab" onclick="displayOilSpillContingency()"> Oil Spill Contingency Plan Activation </a>
                                </li>

                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link pettitions_receieved" data-toggle="tab" href="#pett_rece" role="tab" onclick="displayPettitionReceived()"> Petitions </a>
                                </li> 

                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link environmental_restoration" data-toggle="tab" href="#env_res" role="tab" onclick="displayEnvironmentalRestoration()"> Environmental Restoration </a>
                                </li> 

                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link spill" data-toggle="tab" href="#spi" role="tab" onclick="displaySpill()"> Spills </a>
                                </li> 
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane p-3" id="conti" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="oil_spill_contingency">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="pett_rece" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="pettitions_receieved">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="env_res" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="environmental_restoration">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="spi" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="spill">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>
                                
                            </div>                            
                        </p>
                    </div>

                    
                    
                </div>

            </div>
        </div>
    </div>

</div>










{{-- INCLUDING MODALS --}}
@include('she-accident-report.forms.modals')













@endsection

@section('script')



{{-- INCLUDING SCRIPT --}}
@include('she-accident-report.js.script')




    @if(Session::has('info'))
        <script>
            $(function() 
            {
                toastr.success('{{session('info')}}', {timeOut:50000});
            });
        </script>
    @elseif(Session::has('error'))
        <script>
            $(function() 
            {
                toastr.error('{{session('error')}}', {timeOut:50000});
            });
        </script>
    @endif


@endsection












