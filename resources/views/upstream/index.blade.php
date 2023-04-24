@extends('layouts.app')

    @section('search')
    <div class="search-wrap" id="search-wrap">
        <div class="search-bar">          
            <input class="search-input" type="search" id="dynamicsearch" placeholder="Search" autofocus/>
            <a href="#" class="close-search toggle-search" data-target="#search-wrap">  <i class="mdi mdi-close-circle" style="font-size:20px"></i> </a>
        </div>
    </div>
    @endsection


@section('css')



{{-- INCLUDING CSS --}}
@include('upstream.css.styles')





@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Upstream Data Upload  </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-justified" role="tablist">
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_concession') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_concession') ) 
                      <li class="nav-item nav-pad">
                          <a class="nav-link " data-toggle="tab" href="#conc" role="tab" onclick="displayConcession()"> Concession </a>
                      </li>
                    @endif                    

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_up_reserve') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_up_reserve') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_reserve') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_reserve') ||
                        Auth::user()->role_obj->permission->contains('constant', 'manage_well_activities') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_well_activities') ) 
                      <li class="nav-item nav-pad">
                          <a class="nav-link" data-toggle="tab" href="#res" role="tab"> Reserves </a>
                      </li>
                    @endif                    

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_seismic_data') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_seismic_data') ) 
                      <li class="nav-item nav-pad">
                          <a class="nav-link seismic_data" data-toggle="tab" href="#seis" role="tab" onclick="displaySeismicData()"> Geophysical Data  </a>
                      </li>  
                    @endif                    

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_well_activities') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_well_activities') ||
                        Auth::user()->role_obj->permission->contains('constant', 'manage_up_reserve') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_up_reserve') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_reserve') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_reserve') )                 
                      <li class="nav-item nav-pad">
                          <a class="nav-link well" data-toggle="tab" href="#well" role="tab" onclick=""> Well/Field Activity </a>
                      </li>
                    @endif                    

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_prov_crude_prod') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_prov_crude_prod') ) 
                      <li class="nav-item nav-pad">
                          <a class="nav-link" data-toggle="tab" href="#provi" role="tab"> Provisional Crude Production </a>
                      </li>
                    @endif                    

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_oil_facilities') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_oil_facilities') ||
                        Auth::user()->role_obj->permission->contains('constant', 'manage_facilities') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_facilities') ||
                        Auth::user()->role_obj->permission->contains('constant', 'manage_upstream_project') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_upstream_project')) 
                      
                      <li class="nav-item nav-pad">
                          <a class="nav-link oil_facility" data-toggle="tab" href="#gfac" role="tab" onclick="displayFacility()"> Oil Facilities </a>
                      </li>
                    @endif                    
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane" id="conc" role="tabpanel">
                        <p class="font-14 mb-0" style="padding: 3px 0px">

                              <!-- CONCESSION SUB MENU TABS -->
                              <!-- Nav tabs -->
                                <ul class="nav nav-pills" role="tablist"> 
                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link bala_opls" data-toggle="tab" href="#opl" role="tab" onclick="displayOPL()"> OPL </a>
                                    </li>
                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link bala_omls" data-toggle="tab" href="#oml" role="tab" onclick="displayOML()"> OML </a>
                                    </li>
                                    @if(Auth::user()->role_obj->permission->contains('constant', 'access_mfio'))
                                      <li class="nav-item nav-pad nav-pad-sub">
                                          <a class="nav-link bala_field" data-toggle="tab" href="#lmf" role="tab" onclick="displayField()"> Marginal Fields </a>
                                      </li>
                                    @endif                                    
                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link bala_data_ps" data-toggle="tab" href="#dps" role="tab" onclick="displayStatus()"> Multiclient Project </a>
                                    </li>
                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link bala_block" data-toggle="tab" href="#open" role="tab" onclick="displayOpenAcreage()"> Open Acreage </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane p-3" id="opl" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <div class="row" id="bala_opls">     

                                            </div> <!-- end row -->
                                        </p>
                                    </div>

                                    <div class="tab-pane p-3" id="oml" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <div class="row" id="bala_omls">
                                                
                                            </div> <!-- end row -->
                                        </p>
                                    </div>

                                    <div class="tab-pane p-3" id="lmf" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <div class="row" id="bala_field">                                

                                            </div> <!-- end row -->
                                        </p>
                                    </div>

                                    <div class="tab-pane p-3" id="dps" role="tabpanel">
                                        <p class="font-14 mb-0">

                                            <div class="row" id="bala_data_ps">                                

                                            </div> <!-- end row -->

                                        </p>
                                    </div>

                                    <div class="tab-pane p-3" id="open" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <div class="row" id="bala_block">                                

                                            </div> <!-- end row -->
                                        </p>
                                    </div>
                                    
                                </div>

                        </p>
                    </div>

                    <div class="tab-pane" id="res" role="tabpanel">
                        <p class="font-14 mb-0">                            
                            <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist" style="padding: 3px 0px"> 
                              @if(Auth::user()->role_obj->permission->contains('constant', 'manage_up_reserve') ||
                                  Auth::user()->role_obj->permission->contains('constant', 'approve_up_reserve') )
                                  <li class="nav-item nav-pad nav-pad-sub">
                                      <a class="nav-link reserve_oil" data-toggle="tab" href="#res_oil" role="tab" onclick="displayReserveOil()"> Oil Reserves </a>
                                  </li>
                                  <li class="nav-item nav-pad nav-pad-sub">
                                      <a class="nav-link reserve_condensate" data-toggle="tab" href="#res_con" role="tab" onclick="displayReserveCondensate()"> Condensate Reserves </a>
                                  </li>
                                  <li class="nav-item nav-pad nav-pad-sub">
                                      <a class="nav-link reserve_depletion_rate" data-toggle="tab" href="#res_depl" role="tab" onclick="displayReserveDepletionRate()"> Life Index Report </a>
                                  </li>
                                  {{-- <li class="nav-item nav-pad nav-pad-sub">
                                      <a class="nav-link reserve_replacement_rate" data-toggle="tab" href="#res_rate" role="tab" onclick="displayReserveReplacementRate()"> Reserves Replacement Rate </a>
                                  </li> --}}
                              @endif

                              @if(Auth::user()->role_obj->permission->contains('constant', 'manage_gas_reserve') ||
                                  Auth::user()->role_obj->permission->contains('constant', 'approve_gas_reserve') )
                                  <li class="nav-item nav-pad nav-pad-sub">
                                      <a class="nav-link reserve_gas" data-toggle="tab" href="#res_gas" role="tab" onclick="displayAGNAG()"> Gas Reserves </a>
                                  </li>
                                  <li class="nav-item nav-pad nav-pad-sub">
                                      <a class="nav-link gas_reserve_depletion_rate" data-toggle="tab" href="#gas_res_depl" role="tab" onclick="displayGasReserveDepletionRate()"> Gas Life Index Report </a>
                                  </li>
                              @endif
                            </ul>                                    

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane p-3" id="res_oil" role="tabpanel" style="padding: 3px 0px">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="reserve_oil">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="res_con" role="tabpanel" style="padding: 3px 0px">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="reserve_condensate">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="res_depl" role="tabpanel" style="padding: 3px 0px">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="reserve_depletion_rate">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="res_rate" role="tabpanel" style="padding: 3px 0px">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="reserve_replacement_rate">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="res_gas" role="tabpanel" style="padding: 3px 0px">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="reserve_gas">   

                                        </div> <!-- end row -->
                                    </p>
                                </div> 

                                <div class="tab-pane p-3" id="gas_res_depl" role="tabpanel" style="padding: 3px 0px">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="gas_reserve_depletion_rate">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>                                   
                            </div>
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="seis" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="seismic_data">  

                            </div> <!-- end row -->
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="gfac" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="oil_facility">     

                            </div> <!-- end row -->
                        </p>
                    </div>






                    <div class="tab-pane" id="well" role="tabpanel">
                        <p class="font-14 mb-0">                            
                            <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist" style="padding: 3px 0px"> 
                                @if(Auth::user()->role_obj->permission->contains('constant', 'manage_up_reserve') ||
                                    Auth::user()->role_obj->permission->contains('constant', 'approve_up_reserve') )
                                      <li class="nav-item nav-pad nav-pad-sub">
                                          <a class="nav-link crude_prods" data-toggle="tab" href="#well_up" role="tab" 
                                          style="padding-left: 50px; padding-right: 50px"> UPSTREAM </a>
                                      </li>
                                @endif

                                @if(Auth::user()->role_obj->permission->contains('constant', 'manage_gas_reserve') ||
                                    Auth::user()->role_obj->permission->contains('constant', 'approve_gas_reserve') )
                                      <li class="nav-item nav-pad nav-pad-sub">
                                          <a class="nav-link crude_production_deferment" data-toggle="tab" href="#well_gas" role="tab" 
                                          style="padding-left: 50px; padding-right: 50px"> GAS </a>
                                      </li>
                                @endif
                            </ul>                                    

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane" id="well_up" role="tabpanel">
                                    <p class="font-14 mb-0" style="">    

                                          <!-- Nav tabs -->
                                          <ul class="nav nav-pills" role="tablist"> 
                                            <li class="nav-item nav-pad nav-pad-sub">
                                                <a class="nav-link well_activities" data-toggle="tab" href="#well_act" role="tab" onclick="displayWellActivities()"> Drilling </a>
                                            </li> 
                                            <li class="nav-item nav-pad nav-pad-sub">
                                                <a class="nav-link completion" data-toggle="tab" href="#comp" role="tab" onclick="displayCompletion()"> Completion </a>
                                            </li>                    
                                            <li class="nav-item nav-pad nav-pad-sub">
                                                <a class="nav-link workover" data-toggle="tab" href="#work" role="tab" onclick="displayWorkover()"> Workover </a>
                                            </li>           
                                            <li class="nav-item nav-pad nav-pad-sub">
                                                <a class="nav-link plugback_abandonment" data-toggle="tab" href="#plug" role="tab" onclick="displayPlugbackAbandonment()"> Plugback/Abandonment </a>
                                            </li>
                                            <li class="nav-item nav-pad nav-pad-sub">
                                                <a class="nav-link field_development_plan" data-toggle="tab" href="#fdp_" role="tab" onclick="displayFieldDevelopmentPlan()" onmouseup="setUnit('Expected Reserves (MMSTB)')"> FDP </a>
                                            </li>
                                            <li class="nav-item nav-pad nav-pad-sub">
                                                <a class="nav-link field_summary" data-toggle="tab" href="#fsum" role="tab" onclick="displayFieldSummary()"> Field Summary </a>
                                            </li>
                                            <li class="nav-item nav-pad nav-pad-sub">
                                                <a class="nav-link rig_disp" data-toggle="tab" href="#rig" role="tab" onclick="displayRigDisposition()"> Rig Disposition  </a>
                                            </li>
                                          </ul>

                                          <!-- Tab panes -->
                                          <div class="tab-content"> 
                                              <div class="tab-pane p-3" id="well_act" role="tabpanel">
                                                  <p class="font-14 mb-0">
                                                      <div class="row" id="well_activities">   

                                                      </div> <!-- end row -->
                                                  </p>
                                              </div> 

                                              <div class="tab-pane p-3" id="comp" role="tabpanel">
                                                  <p class="font-14 mb-0">
                                                      <div class="row" id="completion">   

                                                      </div> <!-- end row -->
                                                  </p>
                                              </div>               

                                              <div class="tab-pane p-3" id="work" role="tabpanel">
                                                  <p class="font-14 mb-0">
                                                      <div class="row" id="workover">                                  

                                                      </div> <!-- end row -->
                                                  </p>
                                              </div>                

                                              <div class="tab-pane p-3" id="plug" role="tabpanel">
                                                  <p class="font-14 mb-0">
                                                      <div class="row" id="plugback_abandonment">                                  

                                                      </div> <!-- end row -->
                                                  </p>
                                              </div>             

                                              <div class="tab-pane p-3" id="fdp_" role="tabpanel">
                                                  <p class="font-14 mb-0">
                                                      <div class="row" id="field_development_plan">     

                                                      </div> <!-- end row -->
                                                  </p>
                                              </div>                  

                                              <div class="tab-pane p-3" id="fsum" role="tabpanel">
                                                  <p class="font-14 mb-0">
                                                      <div class="row" id="field_summary">     

                                                      </div> <!-- end row -->
                                                  </p>
                                              </div>               

                                              <div class="tab-pane p-3" id="rig" role="tabpanel">
                                                  <p class="font-14 mb-0">
                                                      <div class="row" id="rig_disp">     

                                                      </div> <!-- end row -->
                                                  </p>
                                              </div> 
                                              
                                          </div>

                                    </p>
                                </div>

                                <div class="tab-pane" id="well_gas" role="tabpanel">
                                    <p class="font-14 mb-0" style="">    

                                          <!-- Nav tabs -->
                                          <ul class="nav nav-pills" role="tablist"> 
                                            <li class="nav-item nav-pad nav-pad-sub">
                                                <a class="nav-link drilling_gas" data-toggle="tab" href="#dri_gas" role="tab" onclick="displayDrillingGas()"> Drill Gas Appraisal/ Development </a>
                                            </li>  
                                            <li class="nav-item nav-pad nav-pad-sub">
                                                <a class="nav-link gas_initial_completion" data-toggle="tab" href="#app_gas_comp" role="tab" onclick="displayGasInitialCompletion()"> Approved Gas Initial Completion </a>
                                            </li> 
                                            <li class="nav-item nav-pad nav-pad-sub">
                                                <a class="nav-link approved_gas_development_plan" data-toggle="tab" href="#_gas_fdp" role="tab" onclick="displayApprovedGasDevelopmentPlan()"> Approved Gas Dev Plan  </a>
                                            </li>
                                            <li class="nav-item nav-pad nav-pad-sub">
                                                <a class="nav-link completion_gas" data-toggle="tab" href="#comp_gas" role="tab" onclick="displayCompletionGas()"> Completion </a>
                                            </li>                    
                                            <li class="nav-item nav-pad nav-pad-sub">
                                                <a class="nav-link workover_gas" data-toggle="tab" href="#work_gas" role="tab" onclick="displayWorkoverGas()"> Workover </a>
                                            </li>           
                                            <li class="nav-item nav-pad nav-pad-sub">
                                                <a class="nav-link plugback_abandonment_gas" data-toggle="tab" href="#plug_gas" role="tab" onclick="displayPlugbackAbandonmentGas()"> Plugback/Abandonment </a>
                                            </li>
                                            <li class="nav-item nav-pad nav-pad-sub">
                                                <a class="nav-link field_development_plan_gas" data-toggle="tab" href="#fdp_gas" role="tab" onclick="displayFieldDevelopmentPlanGas()" onmouseup="setUnit('Expected Reserves (BSCF)')"> FDP </a>
                                            </li>
                                            <li class="nav-item nav-pad nav-pad-sub">
                                                <a class="nav-link field_summary_gas" data-toggle="tab" href="#fsum_gas" role="tab" onclick="displayFieldSummaryGas()"> Field Summary </a>
                                            </li>
                                          </ul>

                                          <!-- Tab panes -->
                                          <div class="tab-content"> 
                                              <div class="tab-pane p-3" id="dri_gas" role="tabpanel">
                                                  <p class="font-14 mb-0">
                                                      <div class="row" id="drilling_gas">   

                                                      </div> <!-- end row -->
                                                  </p>
                                              </div> 

                                              <div class="tab-pane p-3" id="app_gas_comp" role="tabpanel">
                                                  <p class="font-14 mb-0">
                                                      <div class="row" id="gas_initial_completion">   

                                                      </div> <!-- end row -->
                                                  </p>
                                              </div>           

                                              <div class="tab-pane p-3" id="_gas_fdp" role="tabpanel">
                                                  <p class="font-14 mb-0">
                                                      <div class="row" id="approved_gas_development_plan">     

                                                      </div> <!-- end row -->
                                                  </p>
                                              </div> 

                                              <div class="tab-pane p-3" id="comp_gas" role="tabpanel">
                                                  <p class="font-14 mb-0">
                                                      <div class="row" id="completion_gas">   

                                                      </div> <!-- end row -->
                                                  </p>
                                              </div>               

                                              <div class="tab-pane p-3" id="work_gas" role="tabpanel">
                                                  <p class="font-14 mb-0">
                                                      <div class="row" id="workover_gas">                                  

                                                      </div> <!-- end row -->
                                                  </p>
                                              </div>                

                                              <div class="tab-pane p-3" id="plug_gas" role="tabpanel">
                                                  <p class="font-14 mb-0">
                                                      <div class="row" id="plugback_abandonment_gas">                                  

                                                      </div> <!-- end row -->
                                                  </p>
                                              </div>             

                                              <div class="tab-pane p-3" id="fdp_gas" role="tabpanel">
                                                  <p class="font-14 mb-0">
                                                      <div class="row" id="field_development_plan_gas">     

                                                      </div> <!-- end row -->
                                                  </p>
                                              </div>             

                                              <div class="tab-pane p-3" id="fsum_gas" role="tabpanel">
                                                  <p class="font-14 mb-0">
                                                      <div class="row" id="field_summary_gas">     

                                                      </div> <!-- end row -->
                                                  </p>
                                              </div> 
                                              
                                          </div>

                                    </p>
                                </div>                                  
                            </div>
                        </p>
                    </div>






                    <div class="tab-pane" id="provi" role="tabpanel">
                        <p class="font-14 mb-0">                            
                            <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist" style="padding: 3px 0px"> 
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link crude_prods" data-toggle="tab" href="#c_prod" role="tab" onclick="displayCrudeProd()"> Provisional Crude Production </a>
                                </li>

                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link crude_production_deferment" data-toggle="tab" href="#prod_def" role="tab" onclick="displayCrudeProdDeferment()"> Provisional Crude Production Deferment </a>
                                </li>
                            </ul>                                    

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane p-3" id="c_prod" role="tabpanel" style="padding: 3px 0px">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="crude_prods">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="prod_def" role="tabpanel" style="padding: 3px 0px">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="crude_production_deferment">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>                                   
                            </div>
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="cwell" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="class_well">       

                            </div> <!-- end row -->
                        </p>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>

</div>
















{{-- INCLUDING MODALS --}}
@include('upstream.forms.modals')










@endsection

@section('script')


{{-- INCLUDING SCRIPT --}}
@include('upstream.js.script')



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