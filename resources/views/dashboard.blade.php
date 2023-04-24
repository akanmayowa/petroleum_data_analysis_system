@extends('layouts.app')

@section('content')


<style>
    *
    {
        font-size: 13px;
    }


    .frame 
    {
        margin-top: 5px;
        margin-bottom: 30px;
        -moz-border-radius: 12px;
        -webkit-border-radius: 12px;
        border-radius: 5px;
        -moz-box-shadow: 0px 1px 1px 1px #fff;
        -webkit-box-shadow: 0px 1px 1px 1px #fff;
        box-shadow: 0px 1px 1px 1px #fff;
        -moz-transform:rotate(0deg);
        -webkit-transform:rotate(0deg);
        -o-transform:rotate(0deg);
        -ms-transform:rotate(0deg);
        filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=.0);
    }

    .th_head
    {
        background: #c0c0c0;
    }


    .card-size
    {
        /*height: 600px!important;*/
    }

    .b-text
    {
        font-weight: bolder !important;
        color: #202020 !important;
    }

    .year
    {
        font-size: 18px;
    }
    .dash
    {
        font-size: 14px; color: #3B444B;
    }

    .table th, .table
    {
        border-top: 1px solid #fff!important;
        padding: 0px 0px;
    }
    .mini-stat
    {
        padding: 10px 20px; border-radius: 3px;
    }
    .fa-col
    {
        color: red;
    }

    .blue
    {
        color: #0097a7;
    }
</style>

{{-- @forelse(contracts() as $contract) {{$contract->Bala_oml->count()}} @empty @endforelse --}}

@php   

    $yrs = date('Y'); $y = $yrs - '2';  
    // dd($crude_exp_0 = \App\down_monthly_summary_crude_export::where('year', $yrs-2)->sum('stream_total') );

    $price_legend = ['$yrs - 5' => $yrs - '5', '$yrs - 4' => $yrs - '4', '$yrs - 3' => $yrs - '3', '$yrs - 2' => $yrs - '2', '$yrs - 1' => $yrs - '1', '$yrs - 0' => $yrs - '0'];

    $month_arr = ['1' => 'January', '2' => 'Febuary', '3' => 'march', '4' => 'april', '5' => 'may', '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'];
    

    function gasProductionUtilization($year, $month, $model_name, $total)
    {
        $gas_prod_util = $model_name::where('year', $year)->where('month', $month)->sum($total); 
        return $gas_prod_util;
    }


    function yearlyAccidentUpstream($year, $model_name, $column_name)
    {
        $acc_ = $model_name::where('year', $year)->sum($column_name); 
        return $acc_;
    }
    
@endphp



<div class="row">   <!-- CARDS -->
    {{-- @php dd(contracts()); @endphp --}}

    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix" style="background-color: #fff; color: #ddd; min-height: 160px!important">
            <span class="mini-stat-icon bg-light"><i class="fa fa-globe text-info"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter text-muted"> Concession </span> 
                <div class="year"> {{$y}} </div>
                {{-- <div class="">  Basinal Assessment : @if(gas_res()) {{number_format(gas_res(), 2)}} @endif </div> --}}
            </div>

            <p class="mb-0 m-t-10 text-muted">
                <table class="table table-sm">
                    <tr>
                        <th class="dash" style="width: 40%; text-align: left">OPL 
                            <i class="fa fa-caret-right m-r-5 fa-col"></i>  @if(OPL_total()) {{OPL_total()}} @else 0 @endif 
                        </th>
                        <th class="dash" style="width: 60%; text-align: right">Marginal Fields 
                            <i class="fa fa-caret-right m-r-5 fa-col"></i>  @if(MARG_total()) {{MARG_total()}} @else 0 @endif 
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="width: 40%; text-align: left">OML 
                            <i class="fa fa-caret-right m-r-5 fa-col"></i> @if(OML_total()) {{OML_total()}} @else 0 @endif
                        </th>
                        <th class="dash" style="width: 60%; text-align: right">Open Blocks 
                            <i class="fa fa-caret-right m-r-5 fa-col"></i>  @if(Unlisted_total()) {{Unlisted_total()}} @else 0 @endif
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="text-align: left">Allocated </th>
                        <th class="dash" style="text-align: right">   <i class="fa fa-caret-right m-r-5 fa-col"></i>
                            @if(OPL_total() && OML_total()) {{OPL_total() + OML_total()}} @else 0 @endif
                        </th>
                    </tr>
                </table> 
            </p>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix" style="background-color: #fff; min-height: 160px!important">
            <span class="mini-stat-icon bg-light"><i class="fa fa-ship text-info"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter text-muted">Reserves </span>
                <div class="year"> @if(res_year()) {{res_year()->year}} @endif </div>
            </div> 

            <p class="mb-0 m-t-10 text-muted">
                <table class="table table-sm">
                    <tr>
                        <th class="dash" style="text-align: left">Oil </th>
                        <th class="dash" style="text-align: right">  <i class="fa fa-caret-right m-r-5 fa-col"></i> 
                            @if(oil_res()) {{number_format(oil_res(), 2)}} MMbbls @else N/A @endif
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="text-align: left">Condensate</th>
                        <th class="dash" style="text-align: right">   <i class="fa fa-caret-right m-r-5 fa-col"></i>
                            @if(cond_res()) {{number_format(cond_res(), 2)}} MMbbls @else N/A @endif
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="text-align: left">AG + NAG </th>
                        <th class="dash" style="text-align: right">   <i class="fa fa-caret-right m-r-5 fa-col"></i>
                            @if(ag_nag()) {{number_format((ag_nag() / 1000), 2)}} Tcf @else N/A @endif
                        </th>
                    </tr>
                </table> 
            </p>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix" style="background-color: #fff; color: #ddd; min-height: 160px!important">
            <span class="mini-stat-icon bg-light"><i class="fa fa-tint text-info"></i></span> <!-- mdi mdi-engine cup-water -->
            <div class="mini-stat-info text-right text-muted">
                <span class="counter text-muted">Crude Oil </span>
                <div class="year"> @if(crude_year()) {{crude_year()}} @endif </div>
            </div>

            <p class="mb-0 m-t-10 text-muted">
                <table class="table table-sm">
                    <tr>
                        <th class="dash" style="text-align: left"> Production </th>
                        <th class="dash" style="text-align: right">  <i class="fa fa-caret-right m-r-5 fa-col"></i> 
                            @if(recon_crude()) {{number_format((recon_crude()/1000000), 2)}} MMbbls @else N/A @endif
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="text-align: left"> Export</th>
                        <th class="dash" style="text-align: right">   <i class="fa fa-caret-right m-r-5 fa-col"></i>
                            @if(crude_export()) {{number_format((crude_export()/1000000), 2)}} MMbbls @else N/A @endif
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="text-align: left"> Import </th>
                        <th class="dash" style="text-align: right">   <i class="fa fa-caret-right m-r-5 fa-col"></i>
                            0.00 
                        </th>
                    </tr>
                </table> 
            </p>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix" style="background-color: #fff; color: #ddd; min-height: 160px!important">
            <span class="mini-stat-icon bg-light"><i class="fa fa-fire text-info"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter text-muted">Gas</span>
                <div class="year"> @if(gas_year()) {{gas_year()->year}} @else @endif </div>
            </div> 

            <p class="mb-0 m-t-10 text-muted">
                <table class="table table-sm">
                    <tr>
                        <th class="dash" style="text-align: left"> Production </th>
                        <th class="dash" style="text-align: right">  <i class="fa fa-caret-right m-r-5 fa-col"></i> 
                            @if(gas_prods()) {{number_format(gas_prods(), 2)}} Mscf @else N/A @endif
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="text-align: left"> Utilization</th>
                        <th class="dash" style="text-align: right">   <i class="fa fa-caret-right m-r-5 fa-col"></i>
                            @if(gas_utils()) {{number_format(gas_utils(), 2)}} Mscf @else N/A @endif
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="text-align: left"> Flared  </th>
                        <th class="dash" style="text-align: right">   <i class="fa fa-caret-right m-r-5 fa-col"></i>
                            @php
                                if(gas_prods() == 0){ $gas_prods = 1; }else{ $gas_prods = gas_prods(); }
                                if(gas_utils() == 0){ $gas_utils = 1; }else{ $gas_utils = gas_utils(); }
                            @endphp
                            {{number_format( ((($gas_prods - $gas_utils) * 100 ) / $gas_prods), 2)}} % 
                        </th>
                    </tr>
                </table> 
            </p>
        </div>
    </div>
</div>









<div class="row">   <!-- CARDS -->
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix" style="background-color: #fff; color: #ddd; min-height: 160px !important">
            <span class="mini-stat-icon bg-light"><i class="mdi mdi-radioactive text-info"></i></span>{{-- fa fa-medkit --}}
            <div class="mini-stat-info text-right text-muted">
                <span class="counter text-muted">HSE</span>
                <div class="year"> @if(hse_year()) {{hse_year()->year}} @else @endif </div>
            </div>

            <p class="mb-0 m-t-10 text-muted">
                <table class="table table-sm">
                    <tr>
                        <th class="dash" style="text-align: left"> Volume Spilled </th>
                        <th class="dash" style="text-align: right">  <i class="fa fa-caret-right m-r-5 fa-col"></i> 
                            @if(spill()) {{number_format(spill(), 2)}} Bbl @else N/A @endif
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="text-align: left"> Incident</th>
                        <th class="dash" style="text-align: right">   <i class="fa fa-caret-right m-r-5 fa-col"></i>
                            @if(incident()) {{incident()}} @else N/A @endif
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="text-align: left"> Fatality </th>
                        <th class="dash" style="text-align: right">   <i class="fa fa-caret-right m-r-5 fa-col"></i>
                            @if(fatality()) {{fatality()}} @else N/A @endif
                        </th>
                    </tr>
                </table> 
            </p>
        </div>
    </div>


    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix card-size" style="background-color: #fff; color: #ddd; min-height: 160px !important">
            <span class="mini-stat-icon bg-light"><i class="mdi mdi-factory text-info"></i></span> <!-- cup-water -->
            <div class="mini-stat-info text-right text-muted">
                <span class="counter text-muted"> Refining Cap.</span>
                <div class="year"> @if(ref_year()) {{ref_year()->year}} @else {{date('Y')}} @endif MMscf </div>
            </div>

            <p class="mb-0 m-t-10 text-muted">
                <table class="table table-sm">
                    <tr>
                        <th class="dash" style="width: 50%; text-align: left">WRPC 
                            <i class="fa fa-caret-right m-r-5 fa-col"></i>  @if(wrpc()) {{number_format(wrpc(), 2)}} @else N/A @endif
                        </th>
                        <th class="dash" style="width: 50%; text-align: right">KRPC 
                            <i class="fa fa-caret-right m-r-5 fa-col"></i>  @if(krpc()) {{number_format(krpc(), 2)}} @else N/A @endif 
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="width: 50%; text-align: left">PHRC 
                            <i class="fa fa-caret-right m-r-5 fa-col"></i> @if(phrc()) {{number_format(phrc(), 2)}} @else N/A @endif
                        </th>
                        <th class="dash" style="width: 50%; text-align: right">NDPR 
                            <i class="fa fa-caret-right m-r-5 fa-col"></i> @if(ndpr()) {{number_format(ndpr(), 2)}} @else N/A @endif
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="text-align: left">Total Capacity </th>
                        <th class="dash" style="text-align: right">   <i class="fa fa-caret-right m-r-5 fa-col"></i>
                            @if(tot_dom_prod()) {{number_format(tot_dom_prod(), 2)}} @else N/A @endif 
                        </th>
                    </tr>
                </table> 
            </p>
        </div>
    </div>


    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix card-size" style="background-color: #fff">
            <span class="mini-stat-icon bg-light"><i class="mdi mdi-gas-station text-info"></i></span> <!-- engine-outline -->
            <div class="mini-stat-info text-right text-muted">
                <span class="counter text-muted">Product Import </span>
                <div class="year">   

                    @if(prod_imp_yr()) {{prod_imp_yr()->year}} @elseif(imp_year()) {{imp_year()->year}} @else {{date('Y')}} @endif 
                </div>
            </div>

            <p class="mb-0 m-t-10 text-muted">
                <table class="table table-sm">
                    <tr>
                        <th class="dash" style="text-align: left"> Dom Production </th>
                        <th class="dash" style="text-align: right">  <i class="fa fa-caret-right m-r-5 fa-col"></i> 
                            @if(dom_prod()) {{number_format((dom_prod() / 1000000), 2)}} M,Ltrs @else N/A @endif
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="text-align: left"> Import Permit</th>
                        <th class="dash" style="text-align: right">   <i class="fa fa-caret-right m-r-5 fa-col"></i>
                            @if(imp_permit()) {{number_format((imp_permit() / 1000000), 2)}} M,Ltrs @else N/A @endif
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="text-align: left"> Actual Import </th>
                        <th class="dash" style="text-align: right">   <i class="fa fa-caret-right m-r-5 fa-col"></i>
                            @if(act_import()) {{number_format((act_import() / 1000000), 2)}} M,Ltrs @else N/A @endif
                        </th>
                    </tr>
                </table> 
            </p>
        </div>
    </div>


    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix card-size" style="background-color: #fff">
            <span class="mini-stat-icon bg-light"><i class="mdi mdi-engine-outline text-info"></i></span> <!-- engine-outline -->
            <div class="mini-stat-info text-right text-muted">
                <span class="counter text-muted">Facilities </span>
                <div class="year"> @if(es_up_year()) {{es_up_year()->year}} @else {{date('Y')}} @endif </div>
            </div>

            <p class="mb-0 m-t-10 text-muted">
                <table class="table table-sm">
                    <tr>
                        <th class="dash" style="text-align: left"> Upstream Projects </th>
                        <th class="dash" style="text-align: right">  <i class="fa fa-caret-right m-r-5 fa-col"></i>
                            @if(up_project()) {{up_project()}}  @else N/A @endif
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="text-align: left"> Downstream Projects</th>
                        <th class="dash" style="text-align: right">   <i class="fa fa-caret-right m-r-5 fa-col"></i>
                            @if(down_project()) {{down_project()}}  @else N/A @endif
                        </th>
                    </tr>
                    <tr>
                        <th class="dash" style="text-align: left"> Gas Projects </th>
                        <th class="dash" style="text-align: right">   <i class="fa fa-caret-right m-r-5 fa-col"></i>
                            @if(gas_project()) {{gas_project()}}  @else N/A @endif
                        </th>
                    </tr>
                </table> 
            </p>
        </div>
    </div>

</div>



<!-- REV, BLOCK & CRUDE TREND -->

<div class="row">
    <div class="col-xl-4">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title"> Revenue Performance <i class="pull-right blue">Billion Naira</i> </h4>
                <div class="frame" style=""><canvas id="RevChart"></canvas></div> 
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title"> Concession Distribution by Contract </h4>
                <div class="frame" style=""><canvas id="oplPieChart"></canvas></div>  
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title"> (Crude) Production vs Export <i class="pull-right blue"> Million Barrels</i> </h4>
                <div class="frame" style=""><canvas id="prodExportChart"></canvas></div> 
            </div>
        </div>
    </div>
</div>


<!-- GAS TREND -->
<div class="row"> 
    
    <div class="col-xl-4" style="padding: 5px 0px">
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title"> Gas Balance <i class="pull-right blue"> Million Cubic Feet</i> </h4>
                    <div class="frame" style="">  <canvas id="GasProdUtilChart"></canvas></div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title"> HSE Incidents </h4>
                <div class="frame" style=""><canvas id="HSEReportChart"></canvas></div> 
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title"> Reserves </h4>
                <div class="frame" style=""><canvas id="oilCondGasChart"></canvas></div> 
            </div>
        </div>
    </div>
</div>




{{-- 


<div class="row">
    <div class="col-xl-6">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title"> Top 5 Petrochemical Plants</h4>
                <div class="frame" style=""><canvas id="plantChart"></canvas></div> 

            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title"> DWP Projects</h4>
                <div class="frame" style=""><canvas id="dwp_Chart"></canvas></div> 

            </div>
        </div>
    </div>
</div> --}}









{{-- <div class="row">

   

    <div class="col-xl-6">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title"> Number of Wells drilled By Year From {{$yrs - 4}} To {{$yrs}} </h4>
                <div class="frame" style=""><canvas id="wellContBarChart"></canvas></div> 
            </div>
        </div>
    </div>
</div> --}}

































@endsection
@section('morris')

<script>       


  $(function()
  { 
       $( "#blockYear" ).on( "change", function() 
       {
            //console.log( $( this ).val() );
            var year=$( this ).val();
            $( "#blockDiv" ).load( "{{url('home/loadreport/')}}"+"/"+year );
       });

       $( "#terrain" ).on( "change", function() 
       {
            var terrain_id = $( this ).val();
            $( "#blockDiv" ).load( "{{url('home/loadterrain/')}}"+"/"+terrain_id );
       });

       $( "#terrain_id" ).on( "change", function() 
       {
            var terrain_id = $( this ).val();
            $( "#reportDiv" ).load( "{{url('home/load_blocks/')}}"+"/"+terrain_id );
       });
  });  
</script>





<script>

    //TOP 5 PETROCHEMICAL PLANT 
    var ctx = document.getElementById('RevChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: 
        {
            labels: [@forelse(rev_legend() as $year)"{{$year}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Oil Sales", 
                    // backgroundColor: ['#007FFF'],  
                    fill: false,
                    borderColor: '#00CC99',
                    data: [@forelse(revenue_oil() as $revOil) "{{$revOil}}", @empty @endforelse],
                },        
                {
                    label: "Gas Sales", 
                    // backgroundColor: ['#007FFF'], 
                    fill: false, 
                    borderColor: '#007FFF',
                    data: [@forelse(revenue_gas() as $revGas) "{{$revGas}}", @empty @endforelse],
                },          
           ]
        },


        // Configuration options go here
        options: {}
    });



    var ctx = document.getElementById('prodExportChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        @php $yrs2 = date('Y'); $y2 = $yrs2 - '2';   $yrs3 = date('Y'); $y3 = $yrs3 - '3';  @endphp
        type: 'line',

        // The data for our dataset
        data: 
        {
            labels: [@forelse(crude_leg() as $year)"{{$year}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Production", 
                    // backgroundColor: ['#007FFF'],  
                    fill: false,
                    borderColor: ['#006B3C'],
                    data: [@forelse(crude_oil_prod() as $crude_oil_prod) "{{$crude_oil_prod}}", @empty @endforelse],
                },        
                {
                    label: "Export", 
                    // backgroundColor: ['#007FFF'], 
                    fill: false, 
                    borderColor: ['#5B92E5'],
                    data: [@forelse(crude_oil_export() as $crude_oil_export) "{{$crude_oil_export}}", @empty @endforelse],
                    // type: 'bar'
                },          
           ]
        },

        // Configuration options go here
        options: {}
    });


    var ctx = document.getElementById('GasProdUtilChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [ @if(count(gas_legend())>0) @foreach(gas_legend() as $year)"{{$year}}", @endforeach @endif],
            datasets: 
            [          
                {
                    label: "Produced", 
                    backgroundColor: '#007FFF',  
                    fill: false,
                    // backgroundColor: ['#006B3C', '#006B3C', '#006B3C', '#006B3C', '#006B3C'],
                    data: [@if(gas_production()) @foreach(gas_production() as $gas_production) "{{$gas_production}}", @endforeach @endif],
                },        
                {
                    label: "Utilized", 
                    backgroundColor: '#CC4E5C', 
                    fill: false, 
                    // backgroundColor: ['#CC4E5C', '#CC4E5C', '#CC4E5C', '#CC4E5C', '#CC4E5C'],
                    data: [@if(gas_utilized()) @foreach(gas_utilized() as $gas_utilized) "{{$gas_utilized}}", @endforeach @endif],
                    // type: 'bar'
                },          
           ]
        },

        // Configuration options go here
        options: {}
    });



    //HSE Incident & Fatality 
    var ctx = document.getElementById('HSEReportChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [ @if(count(hse_legend())>0) @foreach(hse_legend() as $year)"{{$year}}", @endforeach @endif],
            datasets: 
            [          
                {
                    label: "Upstream Incident", 
                    backgroundColor: '#ED872D', 
                    borderColor: '#ED872D', 
                    fill: true,
                    // backgroundColor: ['#006B3C', '#006B3C', '#006B3C', '#006B3C', '#006B3C'],
                    data: [@if(up_incidences()) @foreach(up_incidences() as $up_incidences) "{{$up_incidences}}", @endforeach @endif],
                },        
                {
                    label: "Downstream Incident", 
                    backgroundColor: '#4B5320', 
                    borderColor: '#4B5320', 
                    fill: true, 
                    // backgroundColor: ['#CC4E5C', '#CC4E5C', '#CC4E5C', '#CC4E5C', '#CC4E5C'],
                    data: [@if(down_incidences()) @foreach(down_incidences() as $down_incidences) "{{$down_incidences}}", @endforeach @endif],
                },       
                {
                    label: "Upstream Fatality", 
                    backgroundColor: '#E52B50', 
                    borderColor: '#E52B50', 
                    fill: false, 
                    // backgroundColor: ['#CC4E5C', '#CC4E5C', '#CC4E5C', '#CC4E5C', '#CC4E5C'],
                    data: [@if(up_fatality()) @foreach(up_fatality() as $up_fatality) "{{$up_fatality}}", @endforeach @endif],
                    type: 'line'
                },     
                {
                    label: "Downstream Fatality", 
                    backgroundColor: '#6495ED', 
                    borderColor: '#6495ED', 
                    fill: true, 
                    // backgroundColor: ['#CC4E5C', '#CC4E5C', '#CC4E5C', '#CC4E5C', '#CC4E5C'],
                    data: [@if(down_fatality()) @foreach(down_fatality() as $down_fatality) "{{$down_fatality}}", @endforeach @endif],
                    type: 'line'
                },         
           ]
        },

        // Configuration options go here
        options: {}
    });



    //Oil Condensate & Gas
    var ctx = document.getElementById('oilCondGasChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: 
        {
            labels: [ @if(count(reserve_legend())>0) @foreach(reserve_legend() as $year)"{{$year}}", @endforeach @endif],
            datasets: 
            [          
                {
                    label: "Oil - MMbbls", 
                    backgroundColor: '#08E8DE', 
                    borderColor: '#08E8DE', 
                    fill: false,
                    // backgroundColor: ['#006B3C', '#006B3C', '#006B3C', '#006B3C', '#006B3C'],
                    data: [@if(reserve_oil()) @foreach(reserve_oil() as $reserve_oil) "{{$reserve_oil}}", @endforeach @endif],
                },        
                {
                    label: "Condensate - MMbbls", 
                    backgroundColor: '#BF94E4', 
                    borderColor: '#BF94E4', 
                    fill: false, 
                    // backgroundColor: ['#CC4E5C', '#CC4E5C', '#CC4E5C', '#CC4E5C', '#CC4E5C'],
                    data: [@if(reserve_cond()) @foreach(reserve_cond() as $reserve_cond) "{{$reserve_cond}}", @endforeach @endif],
                },       
                {
                    label: "Gas - Bcf", 
                    backgroundColor: '#007FFF', 
                    borderColor: '#007FFF', 
                    fill: false, 
                    // backgroundColor: ['#CC4E5C', '#CC4E5C', '#CC4E5C', '#CC4E5C', '#CC4E5C'],
                    data: [@if(reserve_gas()) @foreach(reserve_gas() as $reserve_gas) "{{$reserve_gas}}", @endforeach @endif],
                    // type: 'line'
                },          
           ]
        },

        // Configuration options go here
        options: {}
    });





    //OPL BY LEASE
    var ctx = document.getElementById('oplPieChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: 
        {
            labels: [ @if(count(contracts())>0) @foreach(contracts() as $contract)"{{$contract->contract_name}}", @endforeach @endif],
            datasets: 
            [          
                {
                    label: "OML", 
                    backgroundColor: ['#202020', '#BF94E4', '#CD7F32', '#f32f53', '#67a8e4', '#5D8AA8', '#85BB65', '#FF7F50', '#FC8EAC', '#FCF75E'],  /* '#77c949', '#FFC1CC', '#ffbb44', '#f32f53', '#67a8e4' */
                    borderColor: '#ffffff',
                    data: [@if(contracts()) @foreach(contracts() as $contract) "{{$contract->Bala_oml->count()}}", @endforeach @endif],
                },    
                {
                    label: "OPL", 
                    backgroundColor: ['#202020', '#BF94E4', '#CD7F32', '#f32f53', '#67a8e4', '#5D8AA8', '#85BB65', '#FF7F50', '#FC8EAC', '#FCF75E'],  /* '#77c949', '#FFC1CC', '#ffbb44', '#f32f53', '#67a8e4' */
                    borderColor: '#ffffff',
                    data: [@if(contracts()) @foreach(contracts() as $contract) "{{$contract->Bala_opl->count()}}", @endforeach @endif],
                },            
           ]
        },

        // Configuration options go here
        options: {}
    });

</script>











@endsection  