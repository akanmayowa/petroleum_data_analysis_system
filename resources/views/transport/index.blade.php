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
@include('transport.css.styles')



@section('content')





<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">                

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Projects and Transportation Data Upload  </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-justified" role="tablist">   
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_upstream_project') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_upstream_project') )                 
                        <li class="nav-item nav-pad">
                            <a class="nav-link oil_plant" data-toggle="tab" href="#up_proj" role="tab" onclick="displayUpstreamProject()"> Upstream (Oil) projects </a>
                        </li>
                    @endif
                    
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_license_refinery_proj') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_license_refinery_proj') ||
                      Auth::user()->role_obj->permission->contains('constant', 'manage_downstream_project') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_downstream_project') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#down" role="tab"> Refinery & Petrochemical Projects </a>
                        </li>
                    @endif
                    
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_gas_project') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_gas_project') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link plant" data-toggle="tab" href="#gas_proj" role="tab" onclick="displayGasProject()"> Gas Projects </a>
                        </li>
                    @endif
                    
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_pipeline') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_pipeline') ||
                      Auth::user()->role_obj->permission->contains('constant', 'manage_metering') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_metering') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#dist" role="tab"> Transportation </a>
                        </li>
                    @endif
                    
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_technologies') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_technologies') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link technology" data-toggle="tab" href="#tech" role="tab" onclick="displayTechnology()"> Technology </a>
                        </li>
                    @endif
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane p-3" id="up_proj" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="oil_plant">     

                            </div> <!-- end row -->
                        </p>
                    </div> 


                    <div class="tab-pane" id="down" role="tabpanel">
                        <p class="font-14 mb-0" style="padding: 3px 0px">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist"> 
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link license_ref_project" data-toggle="tab" href="#ref_proj" role="tab" onclick="displayLicenseRefineryProject()"> License Refinery Project </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link down_project" data-toggle="tab" href="#down_proj" role="tab" onclick="displayDownstreamProject()"> Petrochemical Plant Projects </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">      
                                <div class="tab-pane p-3" id="ref_proj" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="license_ref_project">     

                                        </div> <!-- end row -->
                                    </p>
                                </div>    

                                <div class="tab-pane p-3" id="down_proj" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="down_project">     

                                        </div> <!-- end row -->
                                    </p>
                                </div>            
                            </div>                            
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="gas_proj" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="plant">     

                            </div> <!-- end row -->
                        </p>
                    </div>


                    <div class="tab-pane" id="dist" role="tabpanel">
                        <p class="font-14 mb-0" style="padding: 3px 0px">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist"> 
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link pipeline" data-toggle="tab" href="#pipe" role="tab" onclick="displayPipeline()"> Pipeline</a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link metering" data-toggle="tab" href="#meter" role="tab" onclick="displayMetering()"> Metering</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">      
                                <div class="tab-pane p-3" id="pipe" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="pipeline">     

                                        </div> <!-- end row -->
                                    </p>
                                </div>    

                                <div class="tab-pane p-3" id="meter" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="metering">     

                                        </div> <!-- end row -->
                                    </p>
                                </div>            
                            </div>                            
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="tech" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="technology">     

                            </div> <!-- end row -->
                        </p>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>

</div>











{{-- INCLUDING MODALS --}}
@include('transport.forms.modals')















@endsection

@section('script')



{{-- INCLUDING SCRIPT --}}
@include('transport.js.script')




@endsection