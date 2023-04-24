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





{{-- INCLUDING CSS --}}
@include('downstream.css.styles')



@section('content')





<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Downstream Data Upload  </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_recon_crude_production') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_recon_crude_production') )
                        <li class="nav-item">
                            <a class="nav-link terminal" data-toggle="tab" href="#tsp" role="tab" onclick="displayTerminal()">Reconciled Production </a>
                        </li>
                    @endif
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_crude_export') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_crude_export') ||
                      Auth::user()->role_obj->permission->contains('constant', 'manage_revenue_actual') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_revenue_actual') ||
                      Auth::user()->role_obj->permission->contains('constant', 'manage_revenue_projected') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_revenue_projected') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link crude_export" data-toggle="tab" href="#crude" role="tab"> Crude Export </a>
                        </li>
                    @endif
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_facilities') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_facilities') ||
                      Auth::user()->role_obj->permission->contains('constant', 'manage_gas_facilities') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_gas_facilities')  )
                        <li class="nav-item nav-pad">
                            <a class="nav-link plants" data-toggle="tab" href="#plan" role="tab"> Facilities </a>
                        </li>
                    @endif
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_pet_product_reporting') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_pet_product_reporting') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link p_report" data-toggle="tab" href="#p_rep" role="tab"> Petroleum Product Reporting </a>
                        </li> 
                    @endif
                    
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_product_retail') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_product_retail') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#prod" role="tab"> Product Retail </a>
                        </li> 
                    @endif
                                       
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_product_listing') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_product_listing') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link import_prod" data-toggle="tab" href="#imppro" role="tab" onclick="displayProduct()"> Products Listing </a>
                        </li>
                    @endif
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active p-3" id="tsp" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="terminal">   

                            </div> <!-- end row -->
                        </p>
                    </div>

                    <div class="tab-pane" id="crude" role="tabpanel">
                        <p class="font-14 mb-0">
                          <!-- Nav tabs -->
                            <ul class="nav nav-pills" role="tablist" style="padding: 3px 0px">
                                @if(Auth::user()->role_obj->permission->contains('constant', 'manage_crude_export') ||
                                  Auth::user()->role_obj->permission->contains('constant', 'approve_crude_export') )
                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link export" data-toggle="tab" href="#msce" role="tab" onclick="displayExport()"> Export by Crude Stream </a>
                                    </li>
                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link destination" data-toggle="tab" href="#cebd" role="tab" onclick="displayDestination()"> Crude Export by Destination </a>
                                    </li>
                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link dest_company" data-toggle="tab" href="#cebc" role="tab" onclick="displayDestCompany()"> Crude Export by Company </a>
                                    </li>
                                @endif

                                @if(Auth::user()->role_obj->permission->contains('constant', 'manage_revenue_actual') ||
                                  Auth::user()->role_obj->permission->contains('constant', 'approve_revenue_actual') ||
                                  Auth::user()->role_obj->permission->contains('constant', 'manage_revenue_projected') ||
                                  Auth::user()->role_obj->permission->contains('constant', 'approve_revenue_projected') )
                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link ave_price" data-toggle="tab" href="#price" role="tab" onclick="displayAveragePrice()"> Average Pricing </a>
                                    </li> 
                                @endif
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active p-3" id="msce" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="export">     

                                        </div> <!-- end row -->
                                    </p>
                                </div>
                                

                                <div class="tab-pane p-3" id="cebd" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="destination">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="cebc" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="dest_company">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="price" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="ave_price">                                  

                                        </div> <!-- end row -->
                                    </p>
                                </div>                                            
                            </div>
                        </p>
                    </div>

                    <div class="tab-pane" id="plan" role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" role="tablist" style="padding: 3px 0px"> 
                            <li class="nav-item nav-pad nav-pad-sub">
                                <a class="nav-link" data-toggle="tab" href="#ref" role="tab"> Refinery </a>
                            </li>
                            <li class="nav-item nav-pad nav-pad-sub">
                                <a class="nav-link" data-toggle="tab" href="#pet" role="tab"> Petrochemical</a>
                            </li>
                            <li class="nav-item nav-pad nav-pad-sub">
                                <a class="nav-link plant_depot" data-toggle="tab" href="#plaDep" role="tab" onclick="displayPlantDepot()"> Depot </a>
                            </li>
                            <li class="nav-item nav-pad nav-pad-sub">
                                <a class="nav-link plant_jetty" data-toggle="tab" href="#plaJet" role="tab" onclick="displayPlantJetty()"> Jetty </a>
                            </li>
                            <li class="nav-item nav-pad nav-pad-sub">
                                <a class="nav-link plant_terminal" data-toggle="tab" href="#plaTerm" role="tab" onclick="displayPlantTerminal()"> Terminal </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane" id="ref" role="tabpanel">
                                <!-- Tab panes -->
                                <ul class="nav nav-pills nav-pad" role="tablist" style="padding: 3px 0px"> 
                                    <li class="nav-item nav-pad nav-pad-sub nav-pad-sub-sub">
                                        <a class="nav-link ref_performance" data-toggle="tab" href="#refperf" role="tab" onclick="displayRefinaryPerformance()"> Refinery Details </a>
                                    </li>
                                    <li class="nav-item nav-pad nav-pad-sub nav-pad-sub-sub">
                                        <a class="nav-link ref_capacity" data-toggle="tab" href="#refcap" role="tab" onclick="displayRefinaryCapacity()"> Refinery Crude Processed </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane p-3" id="refcap" role="tabpanel">
                                        <p class="font-14 mb-0" style="padding: 3px 0px">
                                            <div class="row" id="ref_capacity">   

                                            </div> <!-- end row -->
                                        </p>
                                    </div>

                                    <div class="tab-pane p-3" id="refperf" role="tabpanel">
                                        <p class="font-14 mb-0" style="padding: 3px 0px">
                                            <div class="row" id="ref_performance">   

                                            </div> <!-- end row -->
                                        </p>
                                    </div>                                    
                                </div>
                            </div>


                            <div class="tab-pane" id="pet" role="tabpanel">
                                <p class="font-14 mb-0">
                                    <!-- Tab panes -->
                                    <ul class="nav nav-pills nav-pad" role="tablist" style="padding: 3px 0px"> 
                                        <li class="nav-item nav-pad nav-pad-sub-sub">
                                            <a class="nav-link pet_plant" data-toggle="tab" href="#pla" role="tab" onclick="displayPlant()"> Petrochemical Plant Capacity</a>
                                        </li>
                                        {{-- <li class="nav-item nav-pad nav-pad-sub-sub">
                                            <a class="nav-link plant_Performance" data-toggle="tab" href="#plaPerf" role="tab" onclick="displayPlantPeformance()"> Petrochemical Plant Performance </a>
                                        </li> --}}
                                    </ul>                                    

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane p-3" id="pla" role="tabpanel" style="padding: 3px 0px">
                                            <p class="font-14 mb-0">
                                                <div class="row" id="pet_plant">   

                                                </div> <!-- end row -->
                                            </p>
                                        </div>

                                        <div class="tab-pane p-3" id="plaPerf" role="tabpanel" style="padding: 3px 0px">
                                            <p class="font-14 mb-0">
                                                <div class="row" id="plant_Performance">   

                                                </div> <!-- end row -->
                                            </p>
                                        </div>                                    
                                    </div>
                                </p>
                            </div>    

                            <div class="tab-pane p-3" id="plaDep" role="tabpanel">
                                <p class="font-14 mb-0" style="padding: 3px 0px">
                                    <div class="row" id="plant_depot">   

                                    </div> <!-- end row -->
                                </p>
                            </div>

                            <div class="tab-pane p-3" id="plaJet" role="tabpanel">
                                <p class="font-14 mb-0" style="padding: 3px 0px">
                                    <div class="row" id="plant_jetty">   

                                    </div> <!-- end row -->
                                </p>
                            </div>

                            <div class="tab-pane p-3" id="plaTerm" role="tabpanel">
                                <p class="font-14 mb-0" style="padding: 3px 0px">
                                    <div class="row" id="plant_terminal">   

                                    </div> <!-- end row -->
                                </p>
                            </div>                                
                        </div>
                        
                    </div>

                    <div class="tab-pane" id="p_rep" role="tabpanel">
                        <p class="font-14 mb-0">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist" style="padding: 3px 0px"> 
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link ref_volume" data-toggle="tab" href="#rvol" role="tab" onclick="displayRefineryVolume()"> Domestic Production </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link prod_vol_permit_vessel" data-toggle="tab" href="#pvpv" role="tab" onclick="displayProductVolPermitVessel()"> Product Import: Number of Product Vessel </a>
                                </li> 
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link prod_vol_permit" data-toggle="tab" href="#pvp" role="tab" onclick="displayProductVolPermit()"> Import Permit Volume </a>
                                </li>                
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link ref_production" data-toggle="tab" href="#rpro" role="tab" onclick="displayRefineryProd()"> Actual Import Volume </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane p-3" id="rvol" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="ref_volume">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="pvp" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="prod_vol_permit">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="rpro" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="ref_production">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="pvpv" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="prod_vol_permit_vessel">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>
                                
                            </div>
                            
                        </p>
                    </div>

                    <div class="tab-pane" id="prod" role="tabpanel">
                        <p class="font-14 mb-0">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist" style="padding: 3px 0px"> 
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link retail_outlet" data-toggle="tab" href="#out" role="tab" onclick="displayReTailOutlet()"> Retail Outlets Count </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link outlet_capacity" data-toggle="tab" href="#outcap" role="tab" onclick="displayOutletCapacity()"> Retail Outlets Capacity </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link l_marketer" data-toggle="tab" href="#mak" role="tab" onclick="displayLicenseMarketer()"> Lubricant blending plant </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link retail_price" data-toggle="tab" href="#pacpr" role="tab" onclick="displayProductRetailPrice()"> Product Retail Price </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane p-3" id="out" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="retail_outlet">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>  

                                <div class="tab-pane p-3" id="outcap" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="outlet_capacity">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>      

                                <div class="tab-pane p-3" id="mak" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="l_marketer">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>      

                                <div class="tab-pane p-3" id="pacpr" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="retail_price">   

                                        </div> <!-- end row -->
                                    </p>
                                </div>                
                            </div>
                            
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="imppro" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="import_prod">   

                            </div> <!-- end row -->
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


{{-- INCLUDING MODLAS --}}
@include('downstream.forms.modals')


@endsection

@section('script')


{{-- INCLUDING SCRIPT --}}
@include('downstream.js.script')



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



                    
                    
                    
                    
                    
                    
                    
                    
                    
                    