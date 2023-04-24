@extends('layouts.app')

    @section('search')
    <div class="search-wrap" id="search-wrap">
        <div class="search-bar">          
            <input class="search-input" type="search" id="dynamicsearch" name="search" placeholder="Search" />
            <a href="#" class="close-search toggle-search" data-target="#search-wrap">  <i class="mdi mdi-close-circle" style="font-size:20px"></i> </a>
        </div>
    </div>
    @endsection


@section('css')



{{-- INCLUDING CSS --}}
@include('gas.css.styles')



@section('content')




<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Gas Data Upload  </h4>
                {{-- <button type="button" class="btn btn-dark" onclick="named()">Name</button> --}}
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-justified" role="tablist"> 
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_gas_reserve') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_gas_reserve') ||
                      Auth::user()->role_obj->permission->contains('constant', 'manage_up_reserve') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_up_reserve') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tooltip" title="Add Gas Reserve & Well Activities in Upstream"
                               href="{{route('upstream.index')}}" role="tab"> Gas Reserves & Well Activities </a>
                        </li>
                    @endif

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_dom_gas_obligation') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_dom_gas_obligation') ||
                      Auth::user()->role_obj->permission->contains('constant', 'manage_gas_supply') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_gas_supply') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#dom_gas" role="tab"> Domestic Gas Obligation </a>
                        </li>
                    @endif                    

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_gas_balance_prod') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_gas_balance_prod') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_gas_balance_Util') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_gas_balance_Util') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#balance" role="tab"> Gas Balance</a>
                        </li>
                    @endif                    

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_gas_facilities') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_gas_facilities') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link facility" data-toggle="tab" href="#gfac" role="tab" onclick="displayFacility()"> Gas Facilities </a>
                        </li>
                    @endif                   

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_gas_product_reporting') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_gas_product_reporting') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#preport" role="tab">Gas Product Reporting</a>
                        </li>
                    @endif                   

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_gas_lpg/cng') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_gas_lpg/cng') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#gas_pro" role="tab"> Gas Products </a>
                        </li>
                    @endif 
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane" id="dom_gas" role="tabpanel">
                        <p class="font-14 mb-0">
                          <!-- Nav tabs -->
                            <ul class="nav nav-pills" role="tablist" style="padding: 3px 0px"> 
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link sub-lk obligation" data-toggle="tab" href="#obli" role="tab" onclick="displayObligation()"> Gas Obligation </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link supply" data-toggle="tab" href="#actual" role="tab" onclick="displayActualSupply()"> Actual Gas Supply </a>
                                </li>
                                {{-- <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link gas_supply_textile_industry" data-toggle="tab" href="#text_ind" role="tab" onclick="displayGasSupplyTextileIndustry()">Gas Supply Textile Industry </a>
                                </li> --}}
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane p-3" id="obli" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="obligation">     

                                        </div> <!-- end row -->
                                    </p>
                                </div>                                

                                <div class="tab-pane p-3" id="actual" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="supply">  

                                        </div> <!-- end row -->
                                    </p>
                                </div> 

                                <div class="tab-pane p-3" id="text_ind" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="gas_supply_textile_industry">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>  
                            </div>
                        </p>
                    </div>

                    <div class="tab-pane" id="balance" role="tabpanel">
                        <p class="font-14 mb-0">
                          <!-- Nav tabs -->
                            <ul class="nav nav-pills" role="tablist" style="padding: 3px 0px"> 
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link summary" data-toggle="tab" href="#sgpu" role="tab" onclick="displayProduction()"> Gas Production </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link utilization" data-toggle="tab" href="#util" role="tab" onclick="displayUtilization()"> Gas Utilization </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link gas_balance" data-toggle="tab" href="#perform" role="tab" onclick="displayPerformance()"> Gas Performance </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane p-3" id="sgpu" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="summary">     

                                        </div> <!-- end row -->
                                    </p>
                                </div>                                

                                <div class="tab-pane p-3" id="util" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="utilization">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>  

                                <div class="tab-pane p-3" id="perform" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="gas_balance">  

                                        </div> <!-- end row -->
                                    </p>
                                </div> 
                            </div>
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="gfac" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="facility">     

                            </div> <!-- end row -->
                        </p>
                    </div>   

                    <div class="tab-pane" id="gas_pro" role="tabpanel">
                        <p class="font-14 mb-0" style="padding: 3px 0px">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist"> 
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link gas_product_lpg" data-toggle="tab" href="#lpg" role="tab" 
                                    onclick="displayGasProductLPG()" onmouseup="showLPG()"> LPG Products </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link gas_product_cng" data-toggle="tab" href="#cng" role="tab" 
                                    onclick="displayGasProductCNG()" onmouseup="showCNG()"> CNG Products </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link gas_product_lng" data-toggle="tab" href="#lng" role="tab" 
                                    onclick="displayProductLNG()" onmouseup="showLNG()"> LNG Products </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link gas_product_propane" data-toggle="tab" href="#prop" role="tab" 
                                    onclick="displayGasProductPROPANE()" onmouseup="showPROPANE()"> Propane </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">                              

                                <div class="tab-pane p-3" id="lpg" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="gas_product_lpg">     

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="cng" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="gas_product_cng">     

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="lng" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="gas_product_lng">     

                                        </div> <!-- end row -->
                                    </p>
                                </div> 

                                <div class="tab-pane p-3" id="prop" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="gas_product_propane">     

                                        </div> <!-- end row -->
                                    </p>
                                </div>              
                            </div>
                            
                        </p>
                    </div>  

                    <div class="tab-pane" id="preport" role="tabpanel">
                        <p class="font-14 mb-0">                          

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist" style="padding: 3px 0px"> 
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link gas_prod_vol_permit" data-toggle="tab" href="#pvp" role="tab" onclick="displayProductVolPermit()"> Import Permit Volume </a>
                                </li>                
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link gas_actual_production" data-toggle="tab" href="#gact" role="tab" onclick="displayGasActualProd()"> Actual Gas Import Volume </a> 
                                </li>              
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link gas_ref_production" data-toggle="tab" href="#rpro" role="tab" onclick="displayRefineryProd()"> LPG Consumption </a> {{-- Actual Import Volume --}}
                                </li>         
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link gas_export" data-toggle="tab" href="#exp_vol" role="tab" onclick="displayGasExport()">Export </a>
                                </li>
                            </ul>


                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane p-3" id="pvp" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="gas_prod_vol_permit">     

                                        </div> <!-- end row -->
                                    </p>
                                </div>
                                

                                <div class="tab-pane p-3" id="gact" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="gas_actual_production">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>
                                

                                <div class="tab-pane p-3" id="rpro" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="gas_ref_production">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>
                                

                                <div class="tab-pane p-3" id="exp_vol" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="gas_export">  

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

{{-- INCLUDING FORM --}}
@include('gas.forms.modals')

@endsection

@section('script')


{{-- INCLUDING SCRIPT --}}
@include('gas.js.script')


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












