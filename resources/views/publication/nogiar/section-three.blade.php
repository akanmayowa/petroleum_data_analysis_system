@php
    use \App\Http\Controllers\PublicationController;
    $controllerName = new PublicationController;


    //function to check if a number is even or odd
    function even($i)
    {
        if($i % 2 == 0){ return true; }
    }
@endphp





<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 41) == 0) display: none; @endif">
    @include('publication.partials.tablehead',['t_id'=>41,'yrs'=>$yrs, 'remark'=>' Gas Production and Utilization'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head" style="border: solid thin white;">
                <th class="f-11" style="background: #A3C1AD!important;"><i style="color: transparent;"> Years </i></th>
                <th class="f-11" style="background: #A3C1AD!important;" colspan="3" style="text-align: center; border: color :#fff">
                    <b class="bfont-size">Gas Production</b>
                </th>
                <th class="f-11" style="background: #A3C1AD!important;"><i style="color: transparent;"> Fuel Gas </i></th>
                <th class="f-11" style="background: #A3C1AD!important;"><i style="color: transparent;"> Gas Lift </i></th>
                <th class="f-11" style="background: #A3C1AD!important;"><i style="color: transparent;"> Re-Injection </i></th>
                <th class="f-11" style="background: #A3C1AD!important;"><i style="color: transparent;"> NGL-LPG </i></th>
                <th class="f-11" style="background: #A3C1AD!important;" colspan="2" style="text-align: center; border: color :#fff">
                    <b class="bfont-size">Sales</b>
                </th>
                <th class="f-11" style="background: #A3C1AD!important;"><i style="color: transparent;"> Gas Util </i></th>
                <th class="f-11" style="background: #A3C1AD!important;"><i style="color: transparent;"> % Util </i></th>
                <th class="f-11" style="background: #A3C1AD!important;"><i style="color: transparent;"> Gas Flared </i></th>
                <th class="f-11" style="background: #A3C1AD!important;"><i style="color: transparent;"> % Flared </i></th>
            </tr>
            <tr class="th_head">
                <th class="f-11" style="background: #A3C1AD!important;">Year</th>
                <th class="f-11" style="background: #A3C1AD!important;">AG</th>
                <th class="f-11" style="background: #A3C1AD!important;">NAG</th>
                <th class="f-11" style="background: #A3C1AD!important;">Total</th>
                <th class="f-11" style="background: #A3C1AD!important;">Fuel Gas</th>
                <th class="f-11" style="background: #A3C1AD!important;">Gas Lift</th>
                <th class="f-11" style="background: #A3C1AD!important;">Re-Injection</th>
                <th class="f-11" style="background: #A3C1AD!important;">NGL-LPG</th>
                <th class="f-11" style="background: #A3C1AD!important;">Domestic Sales</th>
                <th class="f-11" style="background: #A3C1AD!important;">NLNG Export</th>
                <th class="f-11" style="background: #A3C1AD!important;">Gas Util</th>
                <th class="f-11" style="background: #A3C1AD!important;">% Util</th>
                <th class="f-11" style="background: #A3C1AD!important;">Gas Flared</th>
                <th class="f-11" style="background: #A3C1AD!important;">% Flared</th>
            </tr>

            <tbody>  @php $i=1; @endphp
            @if($array_year_20)
                @foreach($array_year_20 as $array_year_20s)
                    @php
                        $TOT_PROD = $controllerName->gasYearlyProductionUtilization($array_year_20s, '\App\\gas_summary_of_gas_production', 'total');
                        $T_UTIL = $controllerName->gasYearlyProductionUtilization($array_year_20s, '\App\\gas_summary_of_gas_utilization', 'total_gas_utilized');
                    @endphp
                    @if($TOT_PROD != 0 && $T_UTIL != 0)
                        <tr>
                            <th class="th_h f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$array_year_20s}} </th>
                            <th class="th_h f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format($controllerName->gasYearlyProductionUtilization($array_year_20s, '\App\\gas_summary_of_gas_production', 'ag')/1000, 2)}} </th>
                            <th class="th_h f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format($controllerName->gasYearlyProductionUtilization($array_year_20s, '\App\\gas_summary_of_gas_production', 'nag')/1000, 2)}} </th>
                            <th class="th_h f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format($TOT_PROD/1000, 2)}} </th>
                            <th class="th_h f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format($controllerName->gasYearlyProductionUtilization($array_year_20s, '\App\\gas_summary_of_gas_utilization', 'fuel_gas')/1000, 2)}} </th>
                            <th class="th_h f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format($controllerName->gasYearlyProductionUtilization($array_year_20s, '\App\\gas_summary_of_gas_utilization', 'gas_lift')/1000, 2)}} </th>
                            <th class="th_h f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format($controllerName->gasYearlyProductionUtilization($array_year_20s, '\App\\gas_summary_of_gas_utilization', 're_injection')/1000, 2)}} </th>
                            <th class="th_h f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format($controllerName->gasYearlyProductionUtilization($array_year_20s, '\App\\gas_summary_of_gas_utilization', 'ngl_lpg')/1000, 2)}} </th>
                            <th class="th_h f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{ number_format(($controllerName->gasYearlyProductionUtilization($array_year_20s, '\App\\gas_summary_of_gas_utilization', 'gas_to_nipp') + $controllerName->gasYearlyProductionUtilization($array_year_20s, '\App\\gas_summary_of_gas_utilization', 'local_others') )/1000, 2)}}
                            </th>
                            <th class="th_h f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format($controllerName->gasYearlyProductionUtilization($array_year_20s, '\App\\gas_summary_of_gas_utilization', 'nlng_export')/1000, 2)}} </th>
                            <th class="th_h f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format($T_UTIL/1000, 2)}} </th>
                            <th class="th_h f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php if($TOT_PROD == 0){ $perc_UTIL = 0.0; }
                                    else{ $perc_UTIL = (($T_UTIL * 100) / $TOT_PROD); }
                                @endphp
                                {{number_format($perc_UTIL, 2)}} </th>
                            <th class="th_h f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $g_fla = $controllerName->gasYearlyProductionUtilization($array_year_20s, '\App\\gas_summary_of_gas_utilization', 'total_gas_flared'); @endphp
                                {{number_format($g_fla/1000, 2)}} </th>
                            <th class="th_h f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format((($g_fla * 100) / $TOT_PROD), 2)}}  </th>
                            {{-- {{number_format((100 - $perc_UTIL), 2)}} </th> --}}
                        </tr>   @php $i++; @endphp
                    @endif
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_41">
        @if($controllerName->bottomRemarks(41, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(41, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(41, $yrs)) {!! $controllerName->bottomRemarksTemp(41, $yrs)->remark !!}
        @endif
    </div>

</div>  </div>




{{-- 4 YEARLY GAS PRODUCTION AND UTILIZATION BY COMPANY --}}



{{-- 4 YEARLY GAS PRODUCTION AND UTILIZATION BY COMPANY --}}





<p style="margin-bottom: 20px !important"></p>
{{-- year - 0 --}}
<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 42) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>42,'yrs'=>$yrs, 'remark'=>' Gas Production and Utilization by Company'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head" style="border: solid thin white;">
                <th style="background: #A3C1AD!important;"><i style="color: transparent;">  </i></th>
                <th style="background: #A3C1AD!important;text-align: center; border: color: #fff" colspan="4">
                    <b class="bfont-size">Gas Produced</b>
                </th>
                <th style="background: #A3C1AD!important;"><i style="color: transparent;"> Fuel Gas </i></th>
                <th style="background: #A3C1AD!important;"><i style="color: transparent;"> Gas Lift </i></th>
                <th style="background: #A3C1AD!important;"><i style="color: transparent;"> Re-Injection </i></th>
                <th style="background: #A3C1AD!important;"><i style="color: transparent;"> NGL-LPG </i></th>
                <th style="background: #A3C1AD!important;;text-align: center; border: color: #fff" colspan="3" >
                    <b class="bfont-size">Gas Sold</b>
                </th>
                <th style="background: #A3C1AD!important;"><i style="color: transparent;"> Gas Util </i></th>
                <th style="background: #A3C1AD!important;"><i style="color: transparent;"> % Util </i></th>
                <th style="background: #A3C1AD!important;"><i style="color: transparent;"> Gas Flared </i></th>
                <th style="background: #A3C1AD!important;"><i style="color: transparent;"> % Flared </i></th>
            </tr>
            <tr class="th_head">
                <th class="f-11" style="background: #A3C1AD!important;">#</th>
                <th class="f-11" style="background: #A3C1AD!important;">Company</th>
                <th class="f-11" style="background: #A3C1AD!important;">AG</th>
                <th class="f-11" style="background: #A3C1AD!important;">NAG</th>
                <th class="f-11" style="background: #A3C1AD!important;">Total</th>
                <th class="f-11" style="background: #A3C1AD!important;">Fuel Gas</th>
                <th class="f-11" style="background: #A3C1AD!important;">Gas Lift</th>
                <th class="f-11" style="background: #A3C1AD!important;">Re-Injection</th>
                <th class="f-11" style="background: #A3C1AD!important;">NGL-LPG</th>
                <th class="f-11" style="background: #A3C1AD!important;">Gas To Nipp</th>
                <th class="f-11" style="background: #A3C1AD!important;">Others</th>
                <th class="f-11" style="background: #A3C1AD!important;">NLNG Export</th>
                <th class="f-11" style="background: #A3C1AD!important;">Gas Util</th>
                <th class="f-11" style="background: #A3C1AD!important;">% Util</th>
                <th class="f-11" style="background: #A3C1AD!important;">Gas Flared</th>
                <th class="f-11" style="background: #A3C1AD!important;">% Flared</th>
            </tr>

            <tbody>
            @php
                $gas_company = $controllerName->gasCompany($yrs - 0, '\App\\gas_summary_of_gas_production'); $i=1;
            @endphp
            @if($gas_company)
                @foreach($gas_company as $gas_companies)
                    <tr>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}}</th>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>@if($gas_companies->company) {{substr($gas_companies->company->company_name, 0, 30)}}@endif</th>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($controllerName->gasProductionUtilizationByCompany($yrs - 0, $gas_companies->company_id, '\App\\gas_summary_of_gas_production', 'ag'), 2)}} </th>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($controllerName->gasProductionUtilizationByCompany($yrs - 0, $gas_companies->company_id, '\App\\gas_summary_of_gas_production', 'nag'), 2)}} </th>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php
                                $TOTGASPROD = $controllerName->gasProductionUtilizationByCompany($yrs - 0, $gas_companies->company_id, '\App\\gas_summary_of_gas_production', 'total')
                            @endphp
                            {{number_format($TOTGASPROD, 2)}} </th>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($controllerName->gasProductionUtilizationByCompany($yrs - 0, $gas_companies->company_id, '\App\\gas_summary_of_gas_utilization', 'fuel_gas')/1000, 2)}} </th>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($controllerName->gasProductionUtilizationByCompany($yrs - 0, $gas_companies->company_id, '\App\\gas_summary_of_gas_utilization', 'gas_lift')/1000, 2)}} </th>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($controllerName->gasProductionUtilizationByCompany($yrs - 0, $gas_companies->company_id, '\App\\gas_summary_of_gas_utilization', 're_injection')/1000, 2)}} </th>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($controllerName->gasProductionUtilizationByCompany($yrs - 0, $gas_companies->company_id, '\App\\gas_summary_of_gas_utilization', 'ngl_lpg')/1000, 2)}} </th>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($controllerName->gasProductionUtilizationByCompany($yrs - 0, $gas_companies->company_id, '\App\\gas_summary_of_gas_utilization', 'gas_to_nipp')/1000, 2)}} </th>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($controllerName->gasProductionUtilizationByCompany($yrs - 0, $gas_companies->company_id, '\App\\gas_summary_of_gas_utilization', 'local_others')/1000, 2)}} </th>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($controllerName->gasProductionUtilizationByCompany($yrs - 0, $gas_companies->company_id, '\App\\gas_summary_of_gas_utilization', 'nlng_export')/1000, 2)}} </th>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php
                                $TOTGASUTIL = $controllerName->gasProductionUtilizationByCompany($yrs - 0, $gas_companies->company_id, '\App\\gas_summary_of_gas_utilization', 'total_gas_utilized')
                            @endphp
                            {{number_format($TOTGASUTIL, 2)}} </th>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php
                                if($TOTGASPROD == 0){ $PER_UTIL = 0.0;}
                                else{ $PER_UTIL = (($TOTGASUTIL * 100) / $TOTGASPROD); }
                            @endphp
                            {{number_format($PER_UTIL, 0)}} </th>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($controllerName->gasProductionUtilizationByCompany($yrs - 0, $gas_companies->company_id, '\App\\gas_summary_of_gas_utilization', 'total_gas_flared')/1000, 2)}} </th>
                        <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( (100 - $PER_UTIL), 0)}} </th>
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_42">
        @if($controllerName->bottomRemarks(42, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(42, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(42, $yrs)) {!! $controllerName->bottomRemarksTemp(42, $yrs)->remark !!}
        @endif
    </div>

</div>   </div> <br>

@if(Auth::user()->role_obj->role_name == 'Admin' ||
    $contributors->contains('approver_id', Auth::user()->id) && $contributors->contains('division', 'UPSTREAM') )

    <a data-toggle="tooltip" onclick="showmodal('approve_divisional_article')" onmousedown="setDivision('UPSTREAM')" style="color:#fff; font-size: 12px; margin-left: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right no-print" data-original-title="Approve All Articles for Upstream"> <i class="fa fa-check"></i> Approve Upstream Article </a>

    <a data-toggle="tooltip" onclick="showmodal('add_comment_div')" onmousedown="setDivision('UPSTREAM')" style="color:#fff; font-size: 12px" class="btn btn-danger btn-sm pull-right no-print" data-original-title="Reject Article"> <i class="fa fa-ban"></i> Reject Upstream Article </a>

@endif



{{-- UNKNOWN  FOR TABLE ID 27 --}}



{{-- UNKNOWN  FOR TABLE ID 27 --}}







{{-- MIDSTREAM --}}

<p style="margin-bottom: 500px !important"></p>
<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 43) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>43,'yrs'=>$yrs, 'remark'=>' Crude / Condensate Export by Crude Stream'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Stream</th>
                <th style="background: #A3C1AD!important;">January</th>
                <th style="background: #A3C1AD!important;">February</th>
                <th style="background: #A3C1AD!important;">March</th>
                <th style="background: #A3C1AD!important;">April</th>
                <th style="background: #A3C1AD!important;">May</th>
                <th style="background: #A3C1AD!important;">June</th>
                <th style="background: #A3C1AD!important;">July</th>
                <th style="background: #A3C1AD!important;">August</th>
                <th style="background: #A3C1AD!important;">September</th>
                <th style="background: #A3C1AD!important;">October</th>
                <th style="background: #A3C1AD!important;">November</th>
                <th style="background: #A3C1AD!important;">December</th>
                <th style="background: #A3C1AD!important;">Total</th>
            </tr>


            @php
                $jan_1 = 0; $feb_1 = 0;  $mar_1 = 0;   $apr_1 = 0; $may_1 = 0;  $jun_1 = 0;
                $jul_1 = 0; $aug_1 = 0;  $sep_1 = 0; $oct_1 = 0; $nov_1 = 0;  $dec_1 = 0;
                $jan_2 = 0; $feb_2 = 0;  $mar_2 = 0;   $apr_2 = 0; $may_2 = 0;  $jun_2 = 0;
                $jul_2 = 0; $aug_2 = 0;  $sep_2 = 0; $oct_2 = 0; $nov_2 = 0;  $dec_2 = 0;
                $jan_3 = 0; $feb_3 = 0;  $mar_3 = 0;   $apr_3 = 0; $may_3 = 0;  $jun_3 = 0;
                $jul_3 = 0; $aug_3 = 0;  $sep_3 = 0; $oct_3 = 0; $nov_3 = 0;  $dec_3 = 0;
                $tot_1 = 0; $tot_2 = 0;  $tot_3 = 0; $g_tot_1 = 0; $g_tot_2 = 0;  $g_tot_3 = 0;  $i=1;
            @endphp
            <tbody> {{-- OIL --}}
            <tr><td colspan="14" style="text-align: center; background: #ACE1AF!important"><b class="bfont-size"> Oil </b></td></tr>
            @foreach($crude_export as $crude_exports)
                @if($crude_exports->production_type_id == 1)
                    <tr>
                        <th class="f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$crude_exports->stream?$crude_exports->stream->stream_name:''}}</th>
                        <th class="f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->january, 2)}}</th>
                        <th class="f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->febuary, 2)}}</th>
                        <th class="f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->march, 2)}}</th>
                        <th class="f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->april, 2)}}</th>
                        <th class="f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->may, 2)}}</th>
                        <th class="f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->june, 2)}}</th>
                        <th class="f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->july, 2)}}</th>
                        <th class="f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->august, 2)}}</th>
                        <th class="f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->september, 2)}}</th>
                        <th class="f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->october, 2)}}</th>
                        <th class="f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->november, 2)}}</th>
                        <th class="f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->december, 2)}}</th>
                        <th class="f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->stream_total, 2)}}</th>
                    </tr>
                    @php $jan_1 += $crude_exports->january;   $feb_1 += $crude_exports->febuary;  $mar_1 += $crude_exports->march;   $apr_1 += $crude_exports->april;    $may_1 += $crude_exports->may;   $jun_1 += $crude_exports->june;   $jul_1 += $crude_exports->july;   $aug_1 += $crude_exports->august;   $sep_1 +=   $crude_exports->september;   $oct_1 += $crude_exports->october;   $nov_1 += $crude_exports->november;    $dec_1 += $crude_exports->december;  $i++;
                    @endphp
                @endif
            @endforeach

            <tr style="background: #A3C1AD">
                <th class="f-9" style="background: #A3C1AD!important"><b class="bfont-size"> Sub-Total </b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($jan_1, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($feb_1, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($mar_1, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($apr_1, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($may_1, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($jun_1, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($jul_1, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($aug_1, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($sep_1, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($oct_1, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($nov_1, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($dec_1, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        @php
                            $tot_1 = ($jan_1 + $feb_1 + $mar_1 + $apr_1 + $may_1 + $jun_1 +
                                      $jul_1 + $aug_1 + $sep_1 + $oct_1 + $nov_1 + $dec_1);
                        @endphp     {{number_format($tot_1, 2)}}
                    </b></th>
            </tr>

            <tr style="background: #A3C1AD!important">
                <th class="f-9" style="background: #A3C1AD!important"><b class="bfont-size"> Daily-Average</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($jan_1/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($feb_1/28, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($mar_1/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($apr_1/30, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($may_1/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($jun_1/30, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($jul_1/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($aug_1/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($sep_1/30, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($oct_1/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($nov_1/30, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($dec_1/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($tot_1/365, 2)}}</b></th>
            </tr>
            </tbody>

            <tbody> {{-- Field Condensate --}}
            <tr><td colspan="14" style="text-align: center; background: #A3C1AD!important"><b class="bfont-size"> Field Condensate </b></td></tr>
            @foreach($crude_export as $crude_exports)
                @if($crude_exports->production_type_id == 2)
                    <tr>
                        <th class="f-9" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$crude_exports->stream?$crude_exports->stream->stream_name:''}}</th>
                        <th class="f-9" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->january, 2)}}</th>
                        <th class="f-9" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->febuary, 2)}}</th>
                        <th class="f-9" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->march, 2)}}</th>
                        <th class="f-9" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->april, 2)}}</th>
                        <th class="f-9" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->may, 2)}}</th>
                        <th class="f-9" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->june, 2)}}</th>
                        <th class="f-9" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->july, 2)}}</th>
                        <th class="f-9" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->august, 2)}}</th>
                        <th class="f-9" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->september, 2)}}</th>
                        <th class="f-9" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->october, 2)}}</th>
                        <th class="f-9" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->november, 2)}}</th>
                        <th class="f-9" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->december, 2)}}</th>
                        <th class="f-9" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($crude_exports->stream_total, 2)}}</th>
                    </tr>
                    @php $jan_2 += $crude_exports->january;   $feb_2 += $crude_exports->febuary;  $mar_2 += $crude_exports->march;   $apr_2 += $crude_exports->april;    $may_2 += $crude_exports->may;   $jun_2 += $crude_exports->june;   $jul_2 += $crude_exports->july;   $aug_2 += $crude_exports->august;   $sep_2 +=   $crude_exports->september;   $oct_2 += $crude_exports->october;   $nov_2 += $crude_exports->november;    $dec_2 += $crude_exports->december;  $i++;
                    @endphp
                @endif
            @endforeach

            <tr style="background: #A3C1AD">
                <th class="f-9" style="background: #A3C1AD!important"><b class="bfont-size"> Sub-Total</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($jan_2, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($feb_2, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($mar_2, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($apr_2, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($may_2, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($jun_2, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($jul_2, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($aug_2, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($sep_2, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($oct_2, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($nov_2, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($dec_2, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        @php $tot_2 = ($jan_2 + $feb_2 + $mar_2 + $apr_2 + $may_2 + $jun_2 +
                             $jul_2 + $aug_2 + $sep_2 + $oct_2 + $nov_2 + $dec_2); @endphp
                        {{number_format($tot_2, 2)}}
                    </b></th>
            </tr>

            <tr style="background: #A3C1AD">
                <th class="f-9" style="background: #A3C1AD!important"><b class="bfont-size"> Daily-Average</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($jan_2/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($feb_2/28, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($mar_2/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($apr_2/30, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($may_2/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($jun_2/30, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($jul_2/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($aug_2/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($sep_2/30, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($oct_2/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($nov_2/30, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($dec_2/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">{{number_format($tot_2/365, 2)}}</b></th>
            </tr>
            </tbody>

            <tbody> {{-- Plant Condensate --}}
            <tr><td colspan="14" style="text-align: center; background: #A3C1AD"><b class="bfont-size"> Oil + Condensate</b> </td></tr>

            <tr style="background: #A3C1AD!important">
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">Total Export</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($jan_1 + $jan_2 + $jan_3), 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($feb_1 + $feb_2 + $feb_3), 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($mar_1 + $mar_2 + $mar_3), 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($apr_1 + $apr_2 + $apr_3), 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($may_1 + $may_2 + $may_3), 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($jun_1 + $jun_2 + $jun_3), 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($jul_1 + $jul_2 + $jul_3), 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($aug_1 + $aug_2 + $aug_3), 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($sep_1 + $sep_2 + $sep_3), 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($oct_1 + $oct_2 + $oct_3), 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($nov_1 + $nov_2 + $nov_3), 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($dec_1 + $dec_2 + $dec_3), 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">

                        @php $g_tot_3 = ($jan_1 + $jan_2 + $jan_3 + $feb_1 + $feb_2 + $feb_3 + $mar_1 + $mar_2 + $mar_3 +
                                       $apr_1 + $apr_2 + $apr_3 + $may_1 + $may_2 + $may_3 + $jun_1 + $jun_2 + $jun_3 +
                                       $jul_1 + $jul_2 + $jul_3 + $aug_1 + $aug_2 + $aug_3 + $sep_1 + $sep_2 + $sep_3 +
                                       $oct_1 + $oct_2 + $oct_3 + $nov_1 + $nov_2 + $nov_3 + $dec_1 + $dec_2 + $dec_3);
                        @endphp
                        {{number_format($g_tot_3, 2)}}
                    </b></th>
            </tr>

            <tr style="background: #A3C1AD!important">
                <th class="f-9" style="background: #A3C1AD!important"><b class="bfont-size"> Daily-Average</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($jan_1 + $jan_2 + $jan_3)/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($feb_1 + $feb_2 + $feb_3)/28, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($mar_1 + $mar_2 + $mar_3)/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($apr_1 + $apr_2 + $apr_3)/30, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($may_1 + $may_2 + $may_3)/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($jun_1 + $jun_2 + $jun_3)/30, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($jul_1 + $jul_2 + $jul_3)/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($aug_1 + $aug_2 + $aug_3)/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($sep_1 + $sep_2 + $sep_3)/30, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($oct_1 + $oct_2 + $oct_3)/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($nov_1 + $nov_2 + $nov_3)/30, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format(($dec_1 + $dec_2 + $dec_3)/31, 2)}}</b></th>
                <th class="f-9" style="background: #A3C1AD!important"><b class="f-9">
                        {{number_format($g_tot_3/365, 2)}}</b></th>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_43">
        @if($controllerName->bottomRemarks(43, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(43, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(43, $yrs)) {!! $controllerName->bottomRemarksTemp(43, $yrs)->remark !!}
        @endif
    </div>

</div>  </div>





{{--  Crude / Condensates Local Refinery --}}
@php $tot = '0'; $jan = '0'; $feb = '0'; $mar = '0'; $apr = '0'; $may = '0'; $jun = '0'; $jul = '0'; $aug = '0'; $sep = '0'; $oct = '0'; $nov = '0'; $dec = '0'; @endphp

<p style="margin-bottom: 250px !important"></p>

<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 44) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>44,'yrs'=>$yrs, 'remark'=>' Crude / Condensate Export by Crude Stream'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Products</th>
                <th style="background: #A3C1AD!important;">January</th>
                <th style="background: #A3C1AD!important;">February</th>
                <th style="background: #A3C1AD!important;">March</th>
                <th style="background: #A3C1AD!important;">April</th>
                <th style="background: #A3C1AD!important;">May</th>
                <th style="background: #A3C1AD!important;">June</th>
                <th style="background: #A3C1AD!important;">July</th>
                <th style="background: #A3C1AD!important;">August</th>
                <th style="background: #A3C1AD!important;">September</th>
                <th style="background: #A3C1AD!important;">October</th>
                <th style="background: #A3C1AD!important;">November</th>
                <th style="background: #A3C1AD!important;">December</th>
                <th style="background: #A3C1AD!important;">Total</th>
            </tr>

            <tbody>
            <tr class="th_head">
                <th style="background: #A3C1AD!important; text-align: center" colspan="14">
                    <b class="bfont-size">Warri Refinery (WRPC)</b></th>
            </tr>
            @php
                $refJAN = ''; $refFEB = ''; $refMAR = ''; $refAPR = ''; $refMAY = ''; $refJUN= '';
                $refJUL = ''; $refAUG = ''; $refSEP = ''; $refOCT = ''; $refNOV = ''; $refDEC = ''; $refTOT1 = '';  $i = 1;
            @endphp
            @forelse($refinery_products as $product)
                @if($controllerName->getRefineryStream($yrs, 1, $product->product_id, 'total') > 0)
                    <tr>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$product->product?$product->product->product_name:''}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refJAN = $controllerName->getRefineryStream($yrs, 1, $product->product_id, 'january'); @endphp
                            {{number_format($refJAN, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refFEB = $controllerName->getRefineryStream($yrs, 1, $product->product_id, 'febuary'); @endphp
                            {{number_format($refFEB, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refMAR = $controllerName->getRefineryStream($yrs, 1, $product->product_id, 'march'); @endphp
                            {{number_format($refMAR, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refAPR = $controllerName->getRefineryStream($yrs, 1, $product->product_id, 'april'); @endphp
                            {{number_format($refAPR, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refMAY = $controllerName->getRefineryStream($yrs, 1, $product->product_id, 'may'); @endphp
                            {{number_format($refMAY, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refJUN = $controllerName->getRefineryStream($yrs, 1, $product->product_id, 'june'); @endphp
                            {{number_format($refJUN, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refJUL = $controllerName->getRefineryStream($yrs, 1, $product->product_id, 'july'); @endphp
                            {{number_format($refJUL, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refAUG = $controllerName->getRefineryStream($yrs, 1, $product->product_id, 'august'); @endphp
                            {{number_format($refAUG, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refSEP = $controllerName->getRefineryStream($yrs, 1, $product->product_id, 'september'); @endphp
                            {{number_format($refSEP, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refOCT = $controllerName->getRefineryStream($yrs, 1, $product->product_id, 'october'); @endphp
                            {{number_format($refOCT, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refNOV = $controllerName->getRefineryStream($yrs, 1, $product->product_id, 'november'); @endphp
                            {{number_format($refNOV, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refDEC = $controllerName->getRefineryStream($yrs, 1, $product->product_id, 'december'); @endphp
                            {{number_format($refDEC, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refTOT1 = ($refJAN + $refFEB + $refMAR + $refAPR + $refMAY + $refJUN + $refJUL + $refAUG + $refSEP + $refOCT + $refNOV + $refDEC); @endphp
                            {{number_format($refTOT1, 2)}}</th>
                    </tr>  @php $i++; @endphp
                @endif
            @empty
            @endforelse

            <tr class="th_head">
                <th style="background: #A3C1AD!important; text-align: center" colspan="14">
                    <b class="bfont-size">Kaduna Refinery (KRPC)</b></th>
            </tr>
            @php
                $refJAN = ''; $refFEB = ''; $refMAR = ''; $refAPR = ''; $refMAY = ''; $refJUN = '';
                $refJUL = ''; $refAUG = ''; $refSEP = ''; $refOCT = ''; $refNOV = ''; $refDEC = '';
                $refJAN2 = ''; $refFEB2 = ''; $refMAR2 = ''; $refAPR2 = ''; $refMAY2 = ''; $refJUN2 = '';
                $refJUL2 = ''; $refAUG2 = ''; $refSEP2 = ''; $refOCT2 = ''; $refNOV2 = ''; $refDEC2 = ''; $refTOT1 = '';  $i = 1;
            @endphp
            @forelse($refinery_products as $product)
                @if($controllerName->getRefineryStream($yrs, 2, $product->product_id, 'total') > 0)
                    <tr>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$product->product?$product->product->product_name:''}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refJAN = $controllerName->getRefineryStream($yrs, 2, $product->product_id, 'january'); @endphp
                            {{number_format($refJAN, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refFEB = $controllerName->getRefineryStream($yrs, 2, $product->product_id, 'febuary'); @endphp
                            {{number_format($refFEB, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refMAR = $controllerName->getRefineryStream($yrs, 2, $product->product_id, 'march'); @endphp
                            {{number_format($refMAR, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refAPR = $controllerName->getRefineryStream($yrs, 2, $product->product_id, 'april'); @endphp
                            {{number_format($refAPR, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refMAY = $controllerName->getRefineryStream($yrs, 2, $product->product_id, 'may'); @endphp
                            {{number_format($refMAY, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refJUN = $controllerName->getRefineryStream($yrs, 2, $product->product_id, 'june'); @endphp
                            {{number_format($refJUN, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refJUL = $controllerName->getRefineryStream($yrs, 2, $product->product_id, 'july'); @endphp
                            {{number_format($refJUL, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refAUG = $controllerName->getRefineryStream($yrs, 2, $product->product_id, 'august'); @endphp
                            {{number_format($refAUG, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refSEP = $controllerName->getRefineryStream($yrs, 2, $product->product_id, 'september'); @endphp
                            {{number_format($refSEP, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refOCT = $controllerName->getRefineryStream($yrs, 2, $product->product_id, 'october'); @endphp
                            {{number_format($refOCT, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refNOV = $controllerName->getRefineryStream($yrs, 2, $product->product_id, 'november'); @endphp
                            {{number_format($refNOV, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refDEC = $controllerName->getRefineryStream($yrs, 2, $product->product_id, 'december'); @endphp
                            {{number_format($refDEC, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refTOT1 = ($refJAN + $refFEB + $refMAR + $refAPR + $refMAY + $refJUN + $refJUL + $refAUG + $refSEP + $refOCT + $refNOV + $refDEC); @endphp
                            {{number_format($refTOT1, 2)}}</th>
                    </tr>  @php $i++; @endphp
                @endif
            @empty
            @endforelse

            <tr class="th_head">
                <th style="background: #A3C1AD!important; text-align: center" colspan="14">
                    <b class="bfont-size">Port Harcourt (PHRC)</b></th>
            </tr>
            @php
                $refJAN = ''; $refFEB = ''; $refMAR = ''; $refAPR = ''; $refMAY = ''; $refJUN= '';
                $refJUL = ''; $refAUG = ''; $refSEP = ''; $refOCT = ''; $refNOV = ''; $refDEC = ''; $refTOT1 = '';  $i = 1;
            @endphp
            @forelse($refinery_products as $product)
                @if($controllerName->getRefineryStream($yrs, 3, $product->product_id, 'total') > 0 ||
                    $controllerName->getRefineryStream($yrs, 5, $product->product_id, 'total') > 0)
                    <tr>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$product->product?$product->product->product_name:''}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php
                                $refJAN = $controllerName->getRefineryStream($yrs, 3, $product->product_id, 'january');
                                $refJAN2 = $controllerName->getRefineryStream($yrs, 5, $product->product_id, 'january');
                            @endphp
                            {{number_format(($refJAN + $refJAN2), 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refFEB = $controllerName->getRefineryStream($yrs, 3, $product->product_id, 'febuary');
                                        $refFEB2 = $controllerName->getRefineryStream($yrs, 5, $product->product_id, 'febuary');  @endphp
                            {{number_format(($refFEB + $refFEB2), 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refMAR = $controllerName->getRefineryStream($yrs, 3, $product->product_id, 'march');
                                        $refMAR2 = $controllerName->getRefineryStream($yrs, 5, $product->product_id, 'march');  @endphp
                            {{number_format(($refMAR + $refMAR2), 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refAPR = $controllerName->getRefineryStream($yrs, 3, $product->product_id, 'april');
                                        $refAPR2 = $controllerName->getRefineryStream($yrs, 5, $product->product_id, 'april');  @endphp
                            {{number_format(($refAPR + $refAPR2), 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refMAY = $controllerName->getRefineryStream($yrs, 3, $product->product_id, 'may');
                                        $refMAY2 = $controllerName->getRefineryStream($yrs, 5, $product->product_id, 'may');  @endphp
                            {{number_format(($refMAY + $refMAY2), 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refJUN = $controllerName->getRefineryStream($yrs, 3, $product->product_id, 'june');
                                        $refJUN2 = $controllerName->getRefineryStream($yrs, 5, $product->product_id, 'june');  @endphp
                            {{number_format(($refJUN + $refJUN2), 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refJUL = $controllerName->getRefineryStream($yrs, 3, $product->product_id, 'july');
                                        $refJUL2 = $controllerName->getRefineryStream($yrs, 5, $product->product_id, 'july');  @endphp
                            {{number_format(($refJUL + $refJUL2), 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refAUG = $controllerName->getRefineryStream($yrs, 3, $product->product_id, 'august');
                                        $refAUG2 = $controllerName->getRefineryStream($yrs, 5, $product->product_id, 'august');  @endphp
                            {{number_format(($refAUG + $refAUG2), 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refSEP = $controllerName->getRefineryStream($yrs, 3, $product->product_id, 'september');
                                        $refSEP2 = $controllerName->getRefineryStream($yrs, 5, $product->product_id, 'september');  @endphp
                            {{number_format(($refSEP + $refSEP2), 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refOCT = $controllerName->getRefineryStream($yrs, 3, $product->product_id, 'october');
                                        $refOCT2 = $controllerName->getRefineryStream($yrs, 5, $product->product_id, 'october');  @endphp
                            {{number_format(($refOCT + $refOCT2), 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refNOV = $controllerName->getRefineryStream($yrs, 3, $product->product_id, 'november');
                                        $refNOV2 = $controllerName->getRefineryStream($yrs, 5, $product->product_id, 'november');  @endphp
                            {{number_format(($refNOV + $refNOV2), 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refDEC = $controllerName->getRefineryStream($yrs, 3, $product->product_id, 'december');
                                        $refDEC2 = $controllerName->getRefineryStream($yrs, 5, $product->product_id, 'december');  @endphp
                            {{number_format(($refDEC + $refDEC2), 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php
                                $refTOT1 = ($refJAN + $refFEB + $refMAR + $refAPR + $refMAY + $refJUN + $refJUL + $refAUG + $refSEP + $refOCT + $refNOV + $refDEC + $refJAN2 + $refFEB2 + $refMAR2 + $refAPR2 + $refMAY2 + $refJUN2 + $refJUL2 + $refAUG2 + $refSEP2 + $refOCT2 + $refNOV2 + $refDEC2);
                            @endphp
                            {{number_format($refTOT1, 2)}}</th>
                    </tr>  @php $i++; @endphp
                @endif
            @empty
            @endforelse

            <tr class="th_head">
                <th style="background: #A3C1AD!important; text-align: center" colspan="14">
                    <b class="bfont-size">Niger Delta Pet Res (NDPR)</b></th>
            </tr>
            @php
                $refJAN = ''; $refFEB = ''; $refMAR = ''; $refAPR = ''; $refMAY = ''; $refJUN= '';
                $refJUL = ''; $refAUG = ''; $refSEP = ''; $refOCT = ''; $refNOV = ''; $refDEC = ''; $refTOT1 = '';  $i = 1;
            @endphp
            @forelse($refinery_products as $product)
                @if($controllerName->getRefineryStream($yrs, 4, $product->product_id, 'total') > 0)
                    <tr>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$product->product?$product->product->product_name:''}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refJAN = $controllerName->getRefineryStream($yrs, 4, $product->product_id, 'january'); @endphp
                            {{number_format($refJAN, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refFEB = $controllerName->getRefineryStream($yrs, 4, $product->product_id, 'febuary'); @endphp
                            {{number_format($refFEB, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refMAR = $controllerName->getRefineryStream($yrs, 4, $product->product_id, 'march'); @endphp
                            {{number_format($refMAR, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refAPR = $controllerName->getRefineryStream($yrs, 4, $product->product_id, 'april'); @endphp
                            {{number_format($refAPR, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refMAY = $controllerName->getRefineryStream($yrs, 4, $product->product_id, 'may'); @endphp
                            {{number_format($refMAY, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refJUN = $controllerName->getRefineryStream($yrs, 4, $product->product_id, 'june'); @endphp
                            {{number_format($refJUN, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refJUL = $controllerName->getRefineryStream($yrs, 4, $product->product_id, 'july'); @endphp
                            {{number_format($refJUL, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refAUG = $controllerName->getRefineryStream($yrs, 4, $product->product_id, 'august'); @endphp
                            {{number_format($refAUG, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refSEP = $controllerName->getRefineryStream($yrs, 4, $product->product_id, 'september'); @endphp
                            {{number_format($refSEP, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refOCT = $controllerName->getRefineryStream($yrs, 4, $product->product_id, 'october'); @endphp
                            {{number_format($refOCT, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refNOV = $controllerName->getRefineryStream($yrs, 4, $product->product_id, 'november'); @endphp
                            {{number_format($refNOV, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refDEC = $controllerName->getRefineryStream($yrs, 4, $product->product_id, 'december'); @endphp
                            {{number_format($refDEC, 2)}}</th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $refTOT1 = ($refJAN + $refFEB + $refMAR + $refAPR + $refMAY + $refJUN + $refJUL + $refAUG + $refSEP + $refOCT + $refNOV + $refDEC); @endphp
                            {{number_format($refTOT1, 2)}}</th>
                    </tr>  @php $i++; @endphp
                @endif
            @empty
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_44">
        @if($controllerName->bottomRemarks(44, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(44, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(44, $yrs)) {!! $controllerName->bottomRemarksTemp(44, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>



@php
    $jan = $controllerName->crudeExportMonthly($yrs, 'january');  $feb = $controllerName->crudeExportMonthly($yrs, 'febuary');
    $mar = $controllerName->crudeExportMonthly($yrs, 'march');
    $apr = $controllerName->crudeExportMonthly($yrs, 'april');  $may = $controllerName->crudeExportMonthly($yrs, 'may');
    $jun = $controllerName->crudeExportMonthly($yrs, 'june');
    $jul = $controllerName->crudeExportMonthly($yrs, 'july');   $aug = $controllerName->crudeExportMonthly($yrs, 'august');
    $sep = $controllerName->crudeExportMonthly($yrs, 'september');
    $oct = $controllerName->crudeExportMonthly($yrs, 'october'); $nov = $controllerName->crudeExportMonthly($yrs, 'november');
    $dec = $controllerName->crudeExportMonthly($yrs, 'december');

    $jan_arr = ['jan' => $jan];    $feb_arr = ['feb' => $feb];
    $mar_arr = ['mar' => $mar];    $apr_arr = ['apr' => $apr];
    $may_arr = ['may' => $may];    $jun_arr = ['jun' => $jun];
    $jul_arr = ['jul' => $jul];    $aug_arr = ['aug' => $aug];
    $sep_arr = ['sep' => $sep];    $oct_arr = ['oct' => $oct];
    $nov_arr = ['nov' => $nov];    $dec_arr = ['dec' => $dec];

    $export_month = array_merge($jan_arr, $feb_arr, $mar_arr, $apr_arr, $may_arr, $jun_arr,
        $jul_arr, $aug_arr, $sep_arr, $oct_arr, $nov_arr, $dec_arr);

    $months = ['jan' => 'January', 'feb' => 'February', 'mar' => 'March', 'apr' => 'April', 'may' => 'May', 'jun' => 'June', 'jul' => 'July', 'aug' => 'August', 'sep' => 'September', 'oct' => 'October', 'nov' => 'November', 'dec' => 'December'];


    $jan_ = $controllerName->crudeExportYearly($yrs - '9');    $feb_ = $controllerName->crudeExportYearly($yrs - '8');      $mar_ = $controllerName->crudeExportYearly($yrs - '7');
    $apr_ = $controllerName->crudeExportYearly($yrs - '6');     $may_ = $controllerName->crudeExportYearly($yrs - '5');           $jun_ = $controllerName->crudeExportYearly($yrs - '4');
    $jul_ = $controllerName->crudeExportYearly($yrs - '3');      $aug_ = $controllerName->crudeExportYearly($yrs - '2');        $sep_ = $controllerName->crudeExportYearly($yrs - '1');
    $oct_ = $controllerName->crudeExportYearly($yrs - '0');

    $jan_arr_ = ['jan' => $jan_];    $feb_arr_ = ['feb' => $feb_];    $mar_arr_ = ['mar' => $mar_];    $apr_arr_ = ['apr' => $apr_];
    $may_arr_ = ['may' => $may_];    $jun_arr_ = ['jun' => $jun_];    $jul_arr_ = ['jul' => $jul_];    $aug_arr_ = ['aug' => $aug_];
    $sep_arr_ = ['sep' => $sep_];    $oct_arr_ = ['oct' => $oct_];

    $export_year = array_merge($jan_arr_, $feb_arr_, $mar_arr_, $apr_arr_, $may_arr_, $jun_arr_, $jul_arr_, $aug_arr_, $sep_arr_, $oct_arr_);

    $yearly = ['y_9' => $yrs - '9', 'y_8' => $yrs - '8', 'y_7' => $yrs - '7', 'y_6' => $yrs - '6', 'y_5' => $yrs - '5', 'y_4' => $yrs - '4', 'y_3' => $yrs - '3',
              'y_2' => $yrs - '2', 'y_1' => $yrs - '1', 'y_0' => $yrs - '0'];
@endphp




<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 45) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>45,'yrs'=>$yrs, 'remark'=>' Summary of Crude / Condensates Export'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Stream/Blend</th>
                <th style="background: #A3C1AD!important;">{{$yrs - 9}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs - 8}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs - 7}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs - 6}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs - 5}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs - 4}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs - 3}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs - 2}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs - 1}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs}}</th>
            </tr>


            <tbody>
            @php
                $tot1_9 = '0'; $tot1_8 = '0'; $tot1_7 = '0'; $tot1_6 = '0'; $tot1_5 = '0';
                $tot1_4 = '0'; $tot1_3 = '0'; $tot1_2 = '0'; $tot1_1 = '0'; $tot1_0 = '0';
                $tot2_9 = '0'; $tot2_8 = '0'; $tot2_7 = '0'; $tot2_6 = '0'; $tot2_5 = '0';
                $tot2_4 = '0'; $tot2_3 = '0'; $tot2_2 = '0'; $tot2_1 = '0'; $tot2_0 = '0';
                $tot3_9 = '0'; $tot3_8 = '0'; $tot3_7 = '0'; $tot3_6 = '0'; $tot3_5 = '0';
                $tot3_4 = '0'; $tot3_3 = '0'; $tot3_2 = '0'; $tot3_1 = '0'; $tot3_0 = '0';
            @endphp

            <tr class="">  <th colspan="14" style="text-align: center; background: #A3C1AD!important;"><b class="bfont-size">Crude Oil</b></th> </tr>
            @php $i=1; @endphp
            @forelse($crude_export_oil as $crude_exp)
                <tr>
                    <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$crude_exp->stream?$crude_exp->stream->stream_name:''}} </th>
                    <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot1_9 += $TOT1_9 = $controllerName->crudeExportByProductionType($yrs - 9, 1, $crude_exp->stream_id); @endphp
                        {{number_format($TOT1_9, 2)}}
                    </th>
                    <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot1_8 += $TOT1_8 = $controllerName->crudeExportByProductionType($yrs - 8, 1, $crude_exp->stream_id); @endphp
                        {{number_format($TOT1_8, 2)}}
                    </th>
                    <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot1_7 += $TOT1_7 = $controllerName->crudeExportByProductionType($yrs - 7, 1, $crude_exp->stream_id); @endphp
                        {{number_format($TOT1_7, 2)}}
                    </th>
                    <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot1_6 += $TOT1_6 = $controllerName->crudeExportByProductionType($yrs - 6, 1, $crude_exp->stream_id); @endphp
                        {{number_format($TOT1_6, 2)}}
                    </th>
                    <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot1_5 += $TOT1_5 = $controllerName->crudeExportByProductionType($yrs - 5, 1, $crude_exp->stream_id); @endphp
                        {{number_format($TOT1_5, 2)}}
                    </th>
                    <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot1_4 += $TOT1_4 = $controllerName->crudeExportByProductionType($yrs - 4, 1, $crude_exp->stream_id); @endphp
                        {{number_format($TOT1_4, 2)}}
                    </th>
                    <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot1_3 += $TOT1_3 = $controllerName->crudeExportByProductionType($yrs - 3, 1, $crude_exp->stream_id); @endphp
                        {{number_format($TOT1_3, 2)}}
                    </th>
                    <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot1_2 += $TOT1_2 = $controllerName->crudeExportByProductionType($yrs - 2, 1, $crude_exp->stream_id); @endphp
                        {{number_format($TOT1_2, 2)}}
                    </th>
                    <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot1_1 += $TOT1_1 = $controllerName->crudeExportByProductionType($yrs - 1, 1, $crude_exp->stream_id); @endphp
                        {{number_format($TOT1_1, 2)}}
                    </th>
                    <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot1_0 += $TOT1_0 = $controllerName->crudeExportByProductionType($yrs - 0, 1, $crude_exp->stream_id); @endphp
                        {{number_format($TOT1_0, 2)}}
                    </th>
                </tr> @php $i++; @endphp
            @empty
            @endforelse

            @php
                $tot1_9_arr = ['tot1_9' => $tot1_9];      $tot1_8_arr = ['tot1_8' => $tot1_8];     $tot1_7_arr = ['tot1_7' => $tot1_7];     $tot1_6_arr = ['tot1_6' => $tot1_6];
                $tot1_5_arr = ['tot1_5' => $tot1_5];      $tot1_4_arr = ['tot1_4' => $tot1_4];     $tot1_3_arr = ['tot1_3' => $tot1_3];     $tot1_2_arr = ['tot1_2' => $tot1_2];
                $tot1_1_arr = ['tot1_1' => $tot1_1];      $tot1_arr = ['tot1_0' => $tot1_0];
                $crud_oil_cond_array =  array_merge($tot1_9_arr, $tot1_8_arr, $tot1_7_arr, $tot1_6_arr, $tot1_5_arr, $tot1_4_arr, $tot1_3_arr, $tot1_2_arr, $tot1_1_arr, $tot1_arr);
                $oil_crude_legends = ['$yrs - 9' => $yrs - '9', '$yrs - 8' => $yrs - '8', '$yrs - 7' => $yrs - '7', '$yrs - 6' => $yrs - '6', '$yrs - 5' => $yrs - '5', '$yrs - 4' => $yrs - '4', '$yrs - 3' => $yrs - '3', '$yrs - 2' => $yrs - '2', '$yrs - 1' => $yrs - '1', '$yrs - 0' => $yrs - '0'];
            @endphp

            <tr>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> Sub Total</b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot1_9, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot1_8, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot1_7, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot1_6, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot1_5, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot1_4, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot1_3, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot1_2, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot1_1, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot1_0, 2)}} </b></th>
            </tr>
            <tr>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> Daily Average</b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_9 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_8 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_7 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_6 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_5 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_4 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_3 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_2 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_1 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_0 / $yr), 2)}} </b></th>
            </tr>

            <tr class="">  <th colspan="14" style="text-align: center; background: #ACE1AF !important;"><b class="bfont-size">
                        Field Condensate</b></th> </tr>
            @php $i=1; @endphp
            @forelse($crude_export_fcond as $crude_exp)
                <tr>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$crude_exp->stream?$crude_exp->stream->stream_name:''}} </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot2_9 += $TOT2_9 = $controllerName->crudeExportByProductionType($yrs - 9, 2, $crude_exp->stream_id); @endphp
                        {{number_format($TOT2_9, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot2_8 += $TOT2_8 = $controllerName->crudeExportByProductionType($yrs - 8, 2, $crude_exp->stream_id); @endphp
                        {{number_format($TOT2_8, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot2_7 += $TOT2_7 = $controllerName->crudeExportByProductionType($yrs - 7, 2, $crude_exp->stream_id); @endphp
                        {{number_format($TOT2_7, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot2_6 += $TOT2_6 = $controllerName->crudeExportByProductionType($yrs - 6, 2, $crude_exp->stream_id); @endphp
                        {{number_format($TOT2_6, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot2_5 += $TOT2_5 = $controllerName->crudeExportByProductionType($yrs - 5, 2, $crude_exp->stream_id); @endphp
                        {{number_format($TOT2_5, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot2_4 += $TOT2_4 = $controllerName->crudeExportByProductionType($yrs - 4, 2, $crude_exp->stream_id); @endphp
                        {{number_format($TOT2_4, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot2_3 += $TOT2_3 = $controllerName->crudeExportByProductionType($yrs - 3, 2, $crude_exp->stream_id); @endphp
                        {{number_format($TOT2_3, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot2_2 += $TOT2_2 = $controllerName->crudeExportByProductionType($yrs - 2, 2, $crude_exp->stream_id); @endphp
                        {{number_format($TOT2_2, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot2_1 += $TOT2_1 = $controllerName->crudeExportByProductionType($yrs - 1, 2, $crude_exp->stream_id); @endphp
                        {{number_format($TOT2_1, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot2_0 += $TOT2_0 = $controllerName->crudeExportByProductionType($yrs - 0, 2, $crude_exp->stream_id); @endphp
                        {{number_format($TOT2_0, 2)}}
                    </th>
                </tr>  @php $i++; @endphp
            @empty
            @endforelse

            @php
                $tot2_9_arr = ['tot2_9' => $tot2_9];      $tot2_8_arr = ['tot2_8' => $tot2_8];     $tot2_7_arr = ['tot2_7' => $tot2_7];     $tot2_6_arr = ['tot2_6' => $tot2_6];
                $tot2_5_arr = ['tot2_5' => $tot2_5];      $tot2_4_arr = ['tot2_4' => $tot2_4];     $tot2_3_arr = ['tot2_3' => $tot2_3];     $tot2_2_arr = ['tot2_2' => $tot2_2];
                $tot2_1_arr = ['tot2_1' => $tot2_1];      $tot2_arr = ['tot2_0' => $tot2_0];
                $crud_oil_cond_array =  array_merge($tot2_9_arr, $tot2_8_arr, $tot2_7_arr, $tot2_6_arr, $tot2_5_arr, $tot2_4_arr, $tot2_3_arr, $tot2_2_arr, $tot2_1_arr, $tot2_arr);
                $oil_crude_legends = ['$yrs - 9' => $yrs - '9', '$yrs - 8' => $yrs - '8', '$yrs - 7' => $yrs - '7', '$yrs - 6' => $yrs - '6', '$yrs - 5' => $yrs - '5', '$yrs - 4' => $yrs - '4', '$yrs - 3' => $yrs - '3', '$yrs - 2' => $yrs - '2', '$yrs - 1' => $yrs - '1', '$yrs - 0' => $yrs - '0'];
            @endphp

            <tr>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> Sub Total</b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot2_9, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot2_8, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot2_7, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot2_6, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot2_5, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot2_4, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot2_3, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot2_2, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot2_1, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot2_0, 2)}} </b></th>
            </tr>
            <tr>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> Daily Average</b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot2_9 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot2_8 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot2_7 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot2_6 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot2_5 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot2_4 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot2_3 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot2_2 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot2_1 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot2_0 / $yr), 2)}} </b></th>
            </tr>

            <tr class="">  <th colspan="14" style="text-align: center; background: #ACE1AF !important;"><b class="bfont-size">Plant Condensate</b></th> </tr>
            @php $i=1; @endphp
            @forelse($crude_export_pcond as $crude_exp)
                <tr>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$crude_exp->stream?$crude_exp->stream->stream_name:''}} </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot3_9 += $TOT3_9 = $controllerName->crudeExportByProductionType($yrs - 9, 3, $crude_exp->stream_id); @endphp
                        {{number_format($TOT3_9, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot3_8 += $TOT3_8 = $controllerName->crudeExportByProductionType($yrs - 8, 3, $crude_exp->stream_id); @endphp
                        {{number_format($TOT3_8, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot3_7 += $TOT3_7 = $controllerName->crudeExportByProductionType($yrs - 7, 3, $crude_exp->stream_id); @endphp
                        {{number_format($TOT3_7, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot3_6 += $TOT3_6 = $controllerName->crudeExportByProductionType($yrs - 6, 3, $crude_exp->stream_id); @endphp
                        {{number_format($TOT3_6, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot3_5 += $TOT3_5 = $controllerName->crudeExportByProductionType($yrs - 5, 3, $crude_exp->stream_id); @endphp
                        {{number_format($TOT3_5, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot3_4 += $TOT3_4 = $controllerName->crudeExportByProductionType($yrs - 4, 3, $crude_exp->stream_id); @endphp
                        {{number_format($TOT3_4, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot3_3 += $TOT3_3 = $controllerName->crudeExportByProductionType($yrs - 3, 3, $crude_exp->stream_id); @endphp
                        {{number_format($TOT3_3, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot3_2 += $TOT3_2 = $controllerName->crudeExportByProductionType($yrs - 2, 3, $crude_exp->stream_id); @endphp
                        {{number_format($TOT3_2, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot3_1 += $TOT3_1 = $controllerName->crudeExportByProductionType($yrs - 1, 3, $crude_exp->stream_id); @endphp
                        {{number_format($TOT3_1, 2)}}
                    </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot3_0 += $TOT3_0 = $controllerName->crudeExportByProductionType($yrs - 0, 3, $crude_exp->stream_id); @endphp
                        {{number_format($TOT3_0, 2)}}
                    </th>
                </tr> @php $i++; @endphp
            @empty
            @endforelse

            @php
                $tot3_9_arr = ['tot3_9' => $tot3_9];      $tot3_8_arr = ['tot3_8' => $tot3_8];
                $tot3_7_arr = ['tot3_7' => $tot3_7];     $tot3_6_arr = ['tot3_6' => $tot3_6];
                $tot3_5_arr = ['tot3_5' => $tot3_5];      $tot3_4_arr = ['tot3_4' => $tot3_4];
                $tot3_3_arr = ['tot3_3' => $tot3_3];     $tot3_2_arr = ['tot3_2' => $tot3_2];
                $tot3_1_arr = ['tot3_1' => $tot3_1];      $tot3_arr = ['tot3_0' => $tot3_0];
                $crud_oil_cond_array =  array_merge($tot3_9_arr, $tot3_8_arr, $tot3_7_arr, $tot3_6_arr, $tot3_5_arr, $tot3_4_arr, $tot3_3_arr, $tot3_2_arr, $tot3_1_arr, $tot3_arr);
                $oil_crude_legends = ['$yrs - 9' => $yrs - '9', '$yrs - 8' => $yrs - '8', '$yrs - 7' => $yrs - '7', '$yrs - 6' => $yrs - '6', '$yrs - 5' => $yrs - '5', '$yrs - 4' => $yrs - '4', '$yrs - 3' => $yrs - '3', '$yrs - 2' => $yrs - '2', '$yrs - 1' => $yrs - '1', '$yrs - 0' => $yrs - '0'];
            @endphp

            <tr>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> Grand Total</b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot3_9, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot3_8, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot3_7, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot3_6, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot3_5, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot3_4, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot3_3, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot3_2, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot3_1, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($tot3_0, 2)}} </b></th>
            </tr>
            <tr>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> Daily Average</b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot3_9 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot3_8 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot3_7 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot3_6 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot3_5 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot3_4 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot3_3 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot3_2 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot3_1 / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot3_0 / $yr), 2)}} </b></th>
            </tr>
            <tr class="">  <th colspan="14" style="text-align: center; background: #A3C1AD !important;"><b class="bfont-size">Oil + Condensate</b></th> </tr>

            <tr>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> Grand Total</b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_9 + $tot2_9 + $tot3_9), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_8 + $tot2_8 + $tot3_8), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_7 + $tot2_7 + $tot3_7), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_6 + $tot2_6 + $tot3_6), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_5 + $tot2_5 + $tot3_5), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_4 + $tot2_4 + $tot3_4), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_3 + $tot2_3 + $tot3_3), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_2 + $tot2_2 + $tot3_2), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_1 + $tot2_1 + $tot3_1), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($tot1_0 + $tot2_0 + $tot3_0), 2)}} </b></th>
            </tr>
            <tr>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> Daily Average</b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format((($tot1_9 + $tot2_9 + $tot3_9) / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format((($tot1_8 + $tot2_8 + $tot3_8) / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format((($tot1_7 + $tot2_7 + $tot3_7) / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format((($tot1_6 + $tot2_6 + $tot3_6) / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format((($tot1_5 + $tot2_5 + $tot3_5) / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format((($tot1_4 + $tot2_4 + $tot3_4) / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format((($tot1_3 + $tot2_3 + $tot3_3) / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format((($tot1_2 + $tot2_2 + $tot3_2) / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format((($tot1_1 + $tot2_1 + $tot3_1) / $yr), 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format((($tot1_0 + $tot2_0 + $tot3_0) / $yr), 2)}} </b></th>
            </tr>

            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_45">
        @if($controllerName->bottomRemarks(45, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(45, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(45, $yrs)) {!! $controllerName->bottomRemarksTemp(45, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>




<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 46) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>46,'yrs'=>$yrs, 'remark'=>' Crude Export Destination'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Stream</th>
                @if($destinations)
                    @foreach($destinations as $destination)
                        <th style="background: #A3C1AD!important;"> {{$destination->name}} </th>
                    @endforeach
                @endif
            </tr>


            <tbody>
            @php  $tot_77 = '0'; $tot_66 = '0'; $tot_55 = '0'; $tot_44 = '0'; $tot_33 = '0'; $tot_22 = '0'; $tot_11 = '0'; $i=1; @endphp

            @if($down_crude_export_by_destination)
                @foreach($down_crude_export_by_destination as $destination)
                    <tr>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$destination->stream_name}}
                        </th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $tot_11 += $t_11 = $destination->export_by_destination_total($yrs, 1); @endphp
                            {{number_format($t_11, 2)}}
                        </th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $tot_22 += $t_22 = $destination->export_by_destination_total($yrs, 2); @endphp
                            {{number_format($t_22, 2)}}
                        </th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $tot_33 += $t_33 = $destination->export_by_destination_total($yrs, 3); @endphp
                            {{number_format($t_33, 2)}}
                        </th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $tot_66 += $t_66 = $destination->export_by_destination_total($yrs, 6); @endphp
                            {{number_format($t_66, 2)}}
                        </th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $tot_44 += $t_44 = $destination->export_by_destination_total($yrs, 4); @endphp
                            {{number_format($t_44, 2)}}
                        </th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $tot_77 += $t_77 = $destination->export_by_destination_total($yrs, 7); @endphp
                            {{number_format($t_77, 2)}}
                        </th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php  $tot_55 += $t_55 = $destination->export_by_destination_total($yrs, 5); $i++; @endphp
                            {{number_format($t_55, 2)}}
                        </th>
                    </tr>

                @endforeach
            @endif

            <tr style="background: #A3C1AD; font-weight: bolder;">
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> Total</b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format($tot_11, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format($tot_22, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format($tot_33, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format($tot_66, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format($tot_44, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format($tot_77, 2)}} </b></th>
                <th class="th_h bold-label" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format($tot_55, 2)}} </b></th>
            </tr>

            @php
                $tot_66_arr = ['tot_66' => $tot_66];     $tot_55_arr = ['tot_55' => $tot_55];      $tot_44_arr = ['tot_44' => $tot_44];
                $tot_33_arr = ['tot_33' => $tot_33];     $tot_22_arr = ['tot_22' => $tot_22];      $tot_11_arr = ['tot_11' => $tot_11];
                $export_dest_array =  array_merge($tot_66_arr, $tot_55_arr, $tot_44_arr, $tot_33_arr, $tot_22_arr, $tot_11_arr);
                // $export_dest_legends = ['$yrs - 6' => $yrs - '6', '$yrs - 5' => $yrs - '5', '$yrs - 4' => $yrs - '4', '$yrs - 3' => $yrs - '3', '$yrs - 2' => $yrs - '2', '$yrs - 1' => $yrs - '1'];
            @endphp

            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_46">
        @if($controllerName->bottomRemarks(46, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(46, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(46, $yrs)) {!! $controllerName->bottomRemarksTemp(46, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>




<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 47) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>47,'yrs'=>$yrs, 'remark'=>' Crude Export Destination History'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Region</th>
                <th style="background: #A3C1AD!important;">{{$yrs - 4}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs - 3}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs - 2}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs - 1}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs}}</th>
            </tr>


            <tbody>
            @php
                $i=1;
                $yr_4 = $controllerName->yearlyTotCrudeExport($yrs - 4); if($yr_4 == 0){  }
                $yr_3 = $controllerName->yearlyTotCrudeExport($yrs - 3); if($yr_3 == 0){  }
                $yr_2 = $controllerName->yearlyTotCrudeExport($yrs - 2); if($yr_2 == 0){  }
                $yr_1 = $controllerName->yearlyTotCrudeExport($yrs - 1); if($yr_1 == 0){  }
                $yr_0 = $controllerName->yearlyTotCrudeExport($yrs - 0); if($yr_0 == 0){  }
            @endphp
            @forelse($destinations as $destination)
                <tr>
                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}} </th>
                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$destination->name}} </th>
                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @if($yr_4 > 0)
                            {{number_format( (( $controllerName->crudeExportPercent($yrs - 4, $destination->id) * 100) / $yr_4), 1)}}%
                        @else  00.0%  @endif
                    </th>
                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @if($yr_3 > 0)
                            {{number_format( (( $controllerName->crudeExportPercent($yrs - 3, $destination->id) * 100) / $yr_3), 1)}}%
                        @else  00.0%  @endif
                    </th>
                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @if($yr_2 > 0)
                            {{number_format( (( $controllerName->crudeExportPercent($yrs - 2, $destination->id) * 100) / $yr_2), 1)}}%
                        @else  00.0%  @endif
                    </th>
                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @if($yr_1 > 0)
                            {{number_format( (( $controllerName->crudeExportPercent($yrs - 1, $destination->id) * 100) / $yr_1), 1)}}%
                        @else  00.0%  @endif
                    </th>
                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @if($yr_0 > 0)
                            {{number_format( (( $controllerName->crudeExportPercent($yrs - 0, $destination->id) * 100) / $yr_0), 1)}}%
                        @else  00.0%  @endif
                    </th>
                </tr> @php $i++; @endphp
            @empty
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_47">
        @if($controllerName->bottomRemarks(47, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(47, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(47, $yrs)) {!! $controllerName->bottomRemarksTemp(47, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>




<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 48) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>48,'yrs'=>$yrs, 'remark'=>' Ave Price of Nigerian Crude, Quoted by Platts in USD'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;"> Year</th> @php $stream_id_arr = [2, 6, 8, 9, 10, 11, 13, 29]; @endphp
                @forelse($ave_price_stream as $ave_price_stream)
                    @if(in_array($ave_price_stream->stream_id, $stream_id_arr))
                        <th style="background: #A3C1AD!important;"> @if($ave_price_stream->stream)
                                {{$ave_price_stream->stream->stream_name}} @endif
                        </th>
                    @endif
                @empty
                @endforelse
            </tr>

            <tbody>  @php $i++; $Priceyears[] = 0;@endphp
            @if($price_legend)
                @foreach($price_legend as $i => $year)
                    @php
                        $stream_2 = $controllerName->aveCrudePriceByStream($year, 2);
                        $stream_6 = $controllerName->aveCrudePriceByStream($year, 6);
                        $stream_8 = $controllerName->aveCrudePriceByStream($year, 8);
                        $stream_9 = $controllerName->aveCrudePriceByStream($year, 9);
                        $stream_10 = $controllerName->aveCrudePriceByStream($year, 10);
                        $stream_11 = $controllerName->aveCrudePriceByStream($year, 11);
                        $stream_13 = $controllerName->aveCrudePriceByStream($year, 13);
                        $stream_29 = $controllerName->aveCrudePriceByStream($year, 29);

                        $total = ($stream_29 + $stream_2 + $stream_6 + $stream_8 + $stream_9 + $stream_10 + $stream_11 + $stream_13);
                    @endphp
                    @if($total != 0)
                        <tr>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$year}} </th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($stream_2, 2)}} </th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($stream_6, 2)}} </th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($stream_8, 2)}} </th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($stream_9, 2)}} </th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($stream_10, 2)}} </th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($stream_11, 2)}} </th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($stream_13, 2)}} </th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($stream_29, 2)}} </th>
                        </tr>  @php $i++; $Priceyears[$i] = $year; @endphp

                        @php
                            $str_price_2[$i] = $stream_2;
                            $str_price_6[$i] = $stream_6;
                            $str_price_8[$i] = $stream_8;
                            $str_price_9[$i] = $stream_9;
                            $str_price_10[$i] = $stream_10;
                            $str_price_11[$i] = $stream_11;
                            $str_price_13[$i] = $stream_13;
                            $str_price_29[$i] = $stream_29;
                        @endphp
                    @endif
                @endforeach

                @php
                    foreach($Priceyears as $key => $value)
                    {
                        if($value != ""){ $ArrayYear[$key] = $value; }
                    }
                     \array_splice($Priceyears, 0, 1);
                    // dd($str_price_2);
                @endphp
            @endif
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_48">
        @if($controllerName->bottomRemarks(48, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(48, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(48, $yrs)) {!! $controllerName->bottomRemarksTemp(48, $yrs)->remark !!}
        @endif
    </div>
    <br>

    <div class="row">
        <div class="col-md-7 chart-pad">
            <i class="pull-left" style="font-size: 10px"> </i>

            <div class="frame" style="">
                <canvas id="avePriceLineChart"></canvas>
            </div>

            <div class="fig1_48 figure">
                @if($controllerName->getFigure(48, $yrs)) Figure {!! $controllerName->getFigure(48, $yrs)->figure_no_1 !!} :
                {!! $controllerName->getFigure(48, $yrs)->figure_title_1 !!}
                @elseif($controllerName->getFigure(48, $yrs-1)) Figure {!! $controllerName->getFigure(48, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(48, $yrs-1)->figure_title_1 !!}
                @endif
            </div>
        </div>
        <div class="col-md-5">  </div>
    </div>

</div>   </div>




<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 49) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>49,'yrs'=>$yrs, 'remark'=>' Refinery Activities'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Process Unit</th>
                <th style="background: #A3C1AD!important;">KRPC</th>
                <th style="background: #A3C1AD!important;">PHRC (New)</th>
                <th style="background: #A3C1AD!important;">PHRC (Old)</th>
                <th style="background: #A3C1AD!important;">WRPC</th>
                <th style="background: #A3C1AD!important;">NDPR</th>
                <th style="background: #A3C1AD!important;">TOTAL</th>
            </tr>


            <tbody>  @php $i=1; @endphp
            @forelse($ref_details as $refinery_detail)   {{-- @php dd($ref_details); @endphp --}}
            <tr>
                @php
                    $krpc = 0.0;   $phnw = 0.0;   $phod = 0.0;   $wrpc = 0.0;   $ndpr = 0.0;
                    $krpc = $controllerName->getRefDetails($yrs, 2, 'Crude distillation', 'value');
                    $phnw = $controllerName->getRefDetails($yrs, 3, 'Crude distillation', 'value');
                    $phod = $controllerName->getRefDetails($yrs, 5, 'Crude distillation', 'value');
                    $wrpc = $controllerName->getRefDetails($yrs, 1, 'Crude distillation', 'value');
                    $ndpr = $controllerName->getRefDetails($yrs, 4, 'Crude distillation', 'value');

                    $krpc_ref = $controllerName->getRefDetails($yrs, 2, $refinery_detail->processing_unit, 'value');
                    $phnw_ref = $controllerName->getRefDetails($yrs, 3, $refinery_detail->processing_unit, 'value');
                    $phod_ref = $controllerName->getRefDetails($yrs, 5, $refinery_detail->processing_unit, 'value');
                    $wrpc_ref = $controllerName->getRefDetails($yrs, 1, $refinery_detail->processing_unit, 'value');
                    $ndpr_ref = $controllerName->getRefDetails($yrs, 4, $refinery_detail->processing_unit, 'value');
                @endphp
                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                    {{$refinery_detail->processing_unit}}</th>
                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                    @php $A = $krpc @endphp     @forelse($krpc_ref as $_krpc)  {{$_krpc->value}} @empty @endforelse
                </th>
                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                    @php $B = $phnw @endphp     @forelse($phnw_ref as $_phnw)  {{$_phnw->value}} @empty @endforelse
                </th>
                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                    @php $C = $phod @endphp     @forelse($phod_ref as $_phod)  {{$_phod->value}} @empty @endforelse
                </th>
                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                    @php $D = $wrpc @endphp     @forelse($wrpc_ref as $_wrpc)  {{$_wrpc->value}} @empty @endforelse
                </th>
                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                    @php $E = $ndpr @endphp     @forelse($ndpr_ref as $_ndpr)  {{$_ndpr->value}} @empty @endforelse
                </th>
                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                    @if(is_numeric($A) && is_numeric($B) && is_numeric($C) && is_numeric($D) && is_numeric($E))
                        {{number_format(($A + $B + $C + $D + $E), 2)}}
                    @else NA
                    @endif
                </th>
            </tr>  @php $i++; @endphp
            @empty
            @endforelse

            {{-- REFINERY INTAKE --}}

            <tr>
                <th class="th_h" style="text-align: center; background: #A3C1AD!important;" colspan="7"><b class="bfont-size">
                        Refinery Intake </b></th>
            </tr>
            <tr>
                <th class="th_h" style=""><b class="bfont-size">Crude Oil (b/d)</b></th>
                <th class="th_h" style="">  </th>
                <th class="th_h" style="">  </th>
                <th class="th_h" style="">  </th>
                <th class="th_h" style="">  </th>
                <th class="th_h" style="">  </th>
                <th class="th_h" style="">  </th>
            </tr>
            @php
                $krp_1 = $controllerName->refineryIntake($yrs, 2, 'q1');
                $phn_1 = $controllerName->refineryIntake($yrs, 3, 'q1');
                $pho_1 = $controllerName->refineryIntake($yrs, 5, 'q1');
                $wrp_1 = $controllerName->refineryIntake($yrs, 1, 'q1');
                $ndp_1 = $controllerName->refineryIntake($yrs, 4, 'q1');
                $refTot_1 = $krp_1 + $phn_1 + $pho_1 + $wrp_1 + $ndp_1;

                $krp_2 = $controllerName->refineryIntake($yrs, 2, 'q2');
                $phn_2 = $controllerName->refineryIntake($yrs, 3, 'q2');
                $pho_2 = $controllerName->refineryIntake($yrs, 5, 'q2');
                $wrp_2 = $controllerName->refineryIntake($yrs, 1, 'q2');
                $ndp_2 = $controllerName->refineryIntake($yrs, 4, 'q2');
                $refTot_2 = $krp_2 + $phn_2 + $pho_2 + $wrp_2 + $ndp_2;

                $krp_3 = $controllerName->refineryIntake($yrs, 2, 'q3');
                $phn_3 = $controllerName->refineryIntake($yrs, 3, 'q3');
                $pho_3 = $controllerName->refineryIntake($yrs, 5, 'q3');
                $wrp_3 = $controllerName->refineryIntake($yrs, 1, 'q3');
                $ndp_3 = $controllerName->refineryIntake($yrs, 4, 'q3');
                $refTot_3 = $krp_3 + $phn_3 + $pho_3 + $wrp_3 + $ndp_3;

                $krp_4 = $controllerName->refineryIntake($yrs, 2, 'q4');
                $phn_4 = $controllerName->refineryIntake($yrs, 3, 'q4');
                $pho_4 = $controllerName->refineryIntake($yrs, 5, 'q4');
                $wrp_4 = $controllerName->refineryIntake($yrs, 1, 'q4');
                $ndp_4 = $controllerName->refineryIntake($yrs, 4, 'q4');
                $refTot_4 = $krp_4 + $phn_4 + $pho_4 + $wrp_4 + $ndp_4;

                $all_tot = $refTot_1 + $refTot_2 + $refTot_3 + $refTot_4;
            @endphp
            <tr>
                <th class="th_h" style="background: #ACE1AF!important;">Q1</th>
                <th class="th_h" style="background: #ACE1AF!important;">{{number_format(($krp_1 * 0.159), 2)}}</th>
                <th class="th_h" style="background: #ACE1AF!important;">{{number_format(($phn_1 * 0.159), 2)}}</th>
                <th class="th_h" style="background: #ACE1AF!important;">{{number_format(($pho_1 * 0.159), 2)}}</th>
                <th class="th_h" style="background: #ACE1AF!important;">{{number_format(($wrp_1 * 0.159), 2)}}</th>
                <th class="th_h" style="background: #ACE1AF!important;">{{number_format(($ndp_1 * 0.159), 2)}}</th>
                <th class="th_h" style="background: #ACE1AF!important;">{{number_format(($refTot_1 * 0.159), 2)}}</th>
            </tr>
            <tr>
                <th class="th_h" style="">Q2</th>
                <th class="th_h" style="">{{number_format(($krp_2 * 0.159), 2)}}</th>
                <th class="th_h" style="">{{number_format(($phn_2 * 0.159), 2)}}</th>
                <th class="th_h" style="">{{number_format(($pho_2 * 0.159), 2)}}</th>
                <th class="th_h" style="">{{number_format(($wrp_2 * 0.159), 2)}}</th>
                <th class="th_h" style="">{{number_format(($ndp_2 * 0.159), 2)}}</th>
                <th class="th_h" style="">{{number_format(($refTot_2 * 0.159), 2)}}</th>
            </tr>
            <tr>
                <th class="th_h" style="background: #ACE1AF!important;">Q3</th>
                <th class="th_h" style="background: #ACE1AF!important;">{{number_format(($krp_3 * 0.159), 2)}}</th>
                <th class="th_h" style="background: #ACE1AF!important;">{{number_format(($phn_3 * 0.159), 2)}}</th>
                <th class="th_h" style="background: #ACE1AF!important;">{{number_format(($pho_3 * 0.159), 2)}}</th>
                <th class="th_h" style="background: #ACE1AF!important;">{{number_format(($wrp_3 * 0.159), 2)}}</th>
                <th class="th_h" style="background: #ACE1AF!important;">{{number_format(($ndp_3 * 0.159), 2)}}</th>
                <th class="th_h" style="background: #ACE1AF!important;">{{number_format(($refTot_3 * 0.159), 2)}}</th>
            </tr>
            <tr>
                <th class="th_h" style="">Q4</th>
                <th class="th_h" style="">{{number_format(($krp_4 * 0.159), 2)}}</th>
                <th class="th_h" style="">{{number_format(($phn_4 * 0.159), 2)}}</th>
                <th class="th_h" style="">{{number_format(($pho_4 * 0.159), 2)}}</th>
                <th class="th_h" style="">{{number_format(($wrp_4 * 0.159), 2)}}</th>
                <th class="th_h" style="">{{number_format(($ndp_4 * 0.159), 2)}}</th>
                <th class="th_h" style="">{{number_format(($refTot_4 * 0.159), 2)}}</th>
            </tr>
            <tr>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$yrs}}</b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format((( ($krp_1 * 0.159) + ($krp_2 * 0.159) + ($krp_3 * 0.159) + ($krp_4 * 0.159)) / 4), 2)}}
                    </b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format((( ($phn_1 * 0.159)  + ($phn_2 * 0.159) + ($phn_3 * 0.159) + ($phn_4 * 0.159)) / 4), 2)}}
                    </b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format((( ($pho_1 * 0.159)  + ($pho_2 * 0.159) + ($pho_3 * 0.159) + ($pho_4 * 0.159)) / 4), 2)}}
                    </b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format((( ($wrp_1 * 0.159)  + ($wrp_2 * 0.159) + ($wrp_3 * 0.159) + ($wrp_4 * 0.159)) / 4), 2)}}
                    </b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format((( ($ndp_1 * 0.159)  + ($ndp_2 * 0.159) + ($ndp_3 * 0.159) + ($ndp_4 * 0.159)) / 4), 2)}}
                    </b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format((( ($refTot_1 * 0.159) + ($refTot_2 * 0.159) + ($refTot_3 * 0.159) + ($refTot_4 * 0.159)) / 4), 2)}}
                    </b></th>
            </tr>

            <tr>
                <th class="th_h" style=""><b class="bfont-size">Utilization Rate(%)</b></th>
                <th class="th_h" style="">  </th>
                <th class="th_h" style="">  </th>
                <th class="th_h" style="">  </th>
                <th class="th_h" style="">  </th>
                <th class="th_h" style="">  </th>
                <th class="th_h" style="">  </th>
            </tr>
            @php
                $KRP = $controllerName->refineryDesignCapacities($yrs, 2, 'Crude distillation', 'value');
                $PHN = $controllerName->refineryDesignCapacities($yrs, 3, 'Crude distillation', 'value');
                $PHO = $controllerName->refineryDesignCapacities($yrs, 5, 'Crude distillation', 'value');
                $WRP = $controllerName->refineryDesignCapacities($yrs, 1, 'Crude distillation', 'value');
                $NDP = $controllerName->refineryDesignCapacities($yrs, 4, 'Crude distillation', 'value');
                $TOTAL = $KRP + $PHN + $PHO + $WRP + $NDP;

                Session::put('KRP', $KRP);  Session::put('PHN', $PHN);  Session::put('PHO', $PHO);
                Session::put('WRP', $WRP);  Session::put('NDP', $NDP);  Session::put('TOTAL', $TOTAL);
            @endphp
            <tr>
                <th class="th_h" style="background: #ACE1AF!important;">Q1</th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    @if($KRP > 0) {{number_format((( ($krp_1 * 0.159) * 100) / $KRP), 2)}}% @endif </th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    @if($PHN > 0) {{number_format((( ($phn_1 * 0.159) * 100) / $PHN), 2)}}% @endif </th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    @if($PHO > 0) {{number_format((( ($pho_1 * 0.159) * 100) / $PHO), 2)}}% @endif </th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    @if($WRP > 0) {{number_format((( ($wrp_1 * 0.159) * 100) / $WRP), 2)}}% @endif </th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    @if($NDP > 0) {{number_format((( ($ndp_1 * 0.159) * 100) / $NDP), 2)}}% @endif </th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    @if($TOTAL > 0) {{number_format((( ($refTot_1 * 0.159) * 100) / $TOTAL), 2)}}% @endif </th>
            </tr>
            <tr>
                <th class="th_h" style="">Q2</th>
                <th class="th_h">@if($KRP > 0) {{number_format((( ($krp_2 * 0.159) * 100) / $KRP), 2)}}% @endif </th>
                <th class="th_h">@if($PHN > 0) {{number_format((( ($phn_2 * 0.159) * 100) / $PHN), 2)}}% @endif </th>
                <th class="th_h">@if($PHO > 0) {{number_format((( ($pho_2 * 0.159) * 100) / $PHO), 2)}}% @endif </th>
                <th class="th_h">@if($WRP > 0) {{number_format((( ($wrp_2 * 0.159) * 100) / $WRP), 2)}}% @endif </th>
                <th class="th_h">@if($NDP > 0) {{number_format((( ($ndp_2 * 0.159) * 100) / $NDP), 2)}}% @endif </th>
                <th class="th_h">@if($TOTAL > 0) {{number_format((( ($refTot_2 * 0.159) * 100) / $TOTAL), 2)}}% @endif </th>
            </tr>
            <tr>
                <th class="th_h" style="background: #ACE1AF!important;">Q3</th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    @if($KRP > 0) {{number_format((( ($krp_3 * 0.159) * 100) / $KRP), 2)}}% @endif </th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    @if($PHN > 0) {{number_format((( ($phn_3 * 0.159) * 100) / $PHN), 2)}}% @endif </th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    @if($PHO > 0) {{number_format((( ($pho_3 * 0.159) * 100) / $PHO), 2)}}% @endif </th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    @if($WRP > 0) {{number_format((( ($wrp_3 * 0.159) * 100) / $WRP), 2)}}% @endif </th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    @if($NDP > 0) {{number_format((( ($ndp_3 * 0.159) * 100) / $NDP), 2)}}% @endif </th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    @if($TOTAL > 0) {{number_format((( ($refTot_3 * 0.159) * 100) / $TOTAL), 2)}}% @endif </th>
            </tr>
            <tr>
                <th class="th_h" style="">Q4</th>
                <th class="th_h">@if($KRP > 0) {{number_format((( ($krp_4 * 0.159) * 100) / $KRP), 2)}}% @endif </th>
                <th class="th_h">@if($PHN > 0) {{number_format((( ($phn_4 * 0.159) * 100) / $PHN), 2)}}% @endif </th>
                <th class="th_h">@if($PHO > 0) {{number_format((( ($pho_4 * 0.159) * 100) / $PHO), 2)}}% @endif </th>
                <th class="th_h">@if($WRP > 0) {{number_format((( ($wrp_4 * 0.159) * 100) / $WRP), 2)}}% @endif </th>
                <th class="th_h">@if($NDP > 0) {{number_format((( ($ndp_4 * 0.159) * 100) / $NDP), 2)}}% @endif </th>
                <th class="th_h">@if($TOTAL > 0) {{number_format((( ($refTot_4 * 0.159) * 100) / $TOTAL), 2)}}% @endif </th>
            </tr>
            <tr>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$yrs}}</b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        @if($KRP > 0)
                            {{number_format(
                                ( (( ($krp_1  * 0.159)* 100) / $KRP) + (( ($krp_2 * 0.159) * 100) / $KRP) +
                                 (( ($krp_3 * 0.159) * 100) / $KRP) + (( ($krp_4 * 0.159) * 100) / $KRP) / 4)
                                , 2)}}
                        @endif
                    </b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        @if($PHN > 0)
                            {{number_format(
                                ( (( ($phn_1 * 0.159) * 100) / $PHN) + (( ($phn_2 * 0.159) * 100) / $PHN) +
                                 (( ($phn_3 * 0.159) * 100) / $PHN) + (( ($phn_4 * 0.159) * 100) / $PHN) / 4)
                                , 2)}}
                        @endif
                    </b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        @if($PHO > 0)
                            {{number_format(
                                ( (( ($pho_1 * 0.159) * 100) / $PHO) + (( ($pho_2 * 0.159) * 100) / $PHO) +
                                 (( ($pho_3 * 0.159) * 100) / $PHO) + (( ($pho_4 * 0.159) * 100) / $PHO) / 4)
                                , 2)}}
                        @endif
                    </b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        @if($WRP > 0)
                            {{number_format(
                                ( (( ($wrp_1 * 0.159) * 100) / $WRP) + (( ($wrp_2 * 0.159) * 100) / $WRP) +
                                 (( ($wrp_3 * 0.159) * 100) / $WRP) + (( ($wrp_4 * 0.159) * 100) / $WRP) / 4)
                                , 2)}}
                        @endif
                    </b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        @if($NDP > 0)
                            {{number_format(
                                ( (( ($ndp_1 * 0.159) * 100) / $NDP) + (( ($ndp_2 * 0.159) * 100) / $NDP) +
                                 (( ($ndp_3 * 0.159) * 100) / $NDP) + (( ($ndp_4 * 0.159) * 100) / $NDP) / 4)
                                , 2)}}
                        @endif
                    </b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        @if($KRP > 0)
                            {{number_format((
                                ( ( ($refTot_1 * 0.159) * 100) / $TOTAL) + (( ($refTot_2 * 0.159) * 100) / $TOTAL) +
                                 (( ($refTot_3 * 0.159) * 100) / $TOTAL) + (( ($refTot_4 * 0.159) * 100) / $TOTAL) / 4)
                                , 2)}}
                        @endif
                    </b></th>
            </tr>

            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_49">
        @if($controllerName->bottomRemarks(49, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(49, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(49, $yrs)) {!! $controllerName->bottomRemarksTemp(49, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>


@php
    $ref_perf = \App\down_plant_location::get();  $tot_cap = 1;
    $t_pms = '0'; $t_ago = '0'; $t_dpk = '0'; $t_atk = '0'; $t_lpf = '0'; $t_bas = '0'; $t_bit = '0';
    $krpc_cap = '0'; $pnew_cap = '0'; $pold_cap = '0'; $wrpc_cap = '0'; $ndpr_cap = '0'; $tot_cap = '0';

    $refi_caps = $controllerName->refineryDesignCapacities($yrs, 2, 'Crude distillation', 'value'); $i=1;
@endphp



<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 50) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>50,'yrs'=>$yrs, 'remark'=>' Refinery Performance'])

    <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

        <tr class="th_head">
            <th style="background: #A3C1AD!important;">Year</th>
            <th style="background: #A3C1AD!important;"></th>
            <th style="background: #A3C1AD!important;">KRPC</th>
            <th style="background: #A3C1AD!important;">PHRC (New)</th>
            <th style="background: #A3C1AD!important;">PHRC (Old)</th>
            <th style="background: #A3C1AD!important;">WRPC</th>
            <th style="background: #A3C1AD!important;">NDPR</th>
            <th style="background: #A3C1AD!important;">Total</th>
            {{-- <th style="background: #A3C1AD!important;">Capacity Utilization %</th> --}}
        </tr>

        @if($refi_caps)
            @php
                $krpc_cap += $refi_caps;
                // $krpc_cap += $kaduna = $controllerName->refineryDesignCapacities($yrs, 2, 'Crude distillation', 'value');
                $pnew_cap += $ph_new = $controllerName->refineryDesignCapacities($yrs, 3, 'Crude distillation', 'value');
                $pold_cap += $ph_old = $controllerName->refineryDesignCapacities($yrs, 5, 'Crude distillation', 'value');
                $wrpc_cap += $warri =  $controllerName->refineryDesignCapacities($yrs, 1, 'Crude distillation', 'value');
                $ndpr_cap += $ndpr = $controllerName->refineryDesignCapacities($yrs, 4, 'Crude distillation', 'value');
                $total = ($krpc_cap +  $pnew_cap +  $pold_cap +  $wrpc_cap +  $ndpr_cap);
            @endphp
            @if($total != 0)
                <tr class="th_h">
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>Designed Capacity, BPSD</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($refi_caps, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($ph_new, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($ph_old, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($warri, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($ndpr, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{ number_format($total, 2) }}</th>
                    @php
                        $tot_capacity = $total;  if($tot_capacity == 0){ $tot_capacity = 1; }
                    @endphp
                    {{-- <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif></th> --}}
                </tr>  @php $i++; @endphp
            @endif

            <tbody>
            @php
                $i=0; $j = 0;     //$krpc = 0;    $p_new = 0;    $p_old = 0;    $wrpc = 0;    $ndpr = 0;
            @endphp
            @for($year = ($yrs-10); $year<=$yrs ; $year++)
                @php
                    $year_total_2 = $controllerName->refPerfYearTotal($year, 2);
                    $year_total_3 = $controllerName->refPerfYearTotal($year, 3);
                    $year_total_5 = $controllerName->refPerfYearTotal($year, 5);
                    $year_total_1 = $controllerName->refPerfYearTotal($year, 1);
                    $year_total_4 = $controllerName->refPerfYearTotal($year, 4);
                    $total = ($year_total_1 + $year_total_2 + $year_total_3 + $year_total_4 + $year_total_5);
                @endphp
                @if($total != 0)
                    <tr>
                        @if($year == ($yrs-9)) <th class="th_h" style="background: #ACE1AF!important;"rowspan="10">
                            Crude Oil Processed, BPSD </th> @endif
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif> {{$year}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($year_total_2), 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($year_total_3), 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($year_total_5), 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($year_total_1), 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($year_total_4), 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($total), 2)}}</th>
                        {{-- <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            @if($tot_cap != 0)
                            {{
                                ( ($year_total_1 + $year_total_2 + $year_total_3 + $year_total_4 + $year_total_5 * 100) /
                                  ($tot_cap) )
                            }}
                            @endif

                        </th> --}}
                    </tr>
                @endif
                @php $i++ @endphp
            @endfor

            </tbody>
        @endif
    </table>

    <div class="row col-md-12 remark-div" id="bottomTab_50">
        @if($controllerName->bottomRemarks(50, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(50, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(50, $yrs)) {!! $controllerName->bottomRemarksTemp(50, $yrs)->remark !!}
        @endif
    </div>
    {{-- <div class="col-md-12 chart-pad">
        <i class="pull-left" style="font-size: 10px"> Local Refinery Capacity </i>
        <div class="frame" style=""><canvas id="refCapPieChart"></canvas></div>
    </div> --}}

</div>   </div>



<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 51) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>51,'yrs'=>$yrs, 'remark'=>' Refinery Performance (Capacity Utilization), Percentage'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Year</th>
                <th style="background: #A3C1AD!important;">KRPC</th>
                <th style="background: #A3C1AD!important;">PHRC (New)</th>
                <th style="background: #A3C1AD!important;">PHRC (Old)</th>
                <th style="background: #A3C1AD!important;">WRPC</th>
                <th style="background: #A3C1AD!important;">NDPR</th>
                <th style="background: #A3C1AD!important;">Total</th>
            </tr>


            <tbody>
            @php  $i = 0; $j=1;   $RefchartYear[] = '';  @endphp

            @if($refi_caps && $krpc_cap > 0)
                @for($year = ($yrs-10); $year<=$yrs; $year++)
                    @php
                        $KRPC_CAP = ( ($controllerName->refPerfYearTotal($year, 2) * 100) / $krpc_cap);
                        $PNEW_CAP = ( ($controllerName->refPerfYearTotal($year, 3) * 100) / $krpc_cap);
                        $POLD_CAP = ( ($controllerName->refPerfYearTotal($year, 5) * 100) / $krpc_cap);
                        $WRPC_CAP = ( ($controllerName->refPerfYearTotal($year, 1) * 100) / $krpc_cap);
                        $NDPR_CAP = ( ($controllerName->refPerfYearTotal($year, 4) * 100) / $krpc_cap);
                        $TOTAL = ($KRPC_CAP + $PNEW_CAP + $POLD_CAP + $WRPC_CAP + $NDPR_CAP);

                        if(Session::get('TOTAL') != 0)
                        {
                            $TOT_REF_PERC = ( ($controllerName->refYearTotal($year) * 100) / Session::get('TOTAL'));
                        }
                    @endphp
                    @if($TOTAL != 0)
                        <tr>
                            @if($i==0)  @endif
                            <th class="th_h"  @if(even($j) == true) style="background: #ACE1AF!important;" @endif>
                                {{$year}}</th>
                            <th class="th_h"  @if(even($j) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format($KRPC_CAP, 2)}}%
                            </th>
                            <th class="th_h"  @if(even($j) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format($PNEW_CAP, 2)}}%
                            </th>
                            <th class="th_h"  @if(even($j) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format($POLD_CAP, 2)}}%
                            </th>
                            <th class="th_h"  @if(even($j) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format($WRPC_CAP, 2)}}%
                            </th>
                            <th class="th_h"  @if(even($j) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format($NDPR_CAP, 2)}}%
                            </th>
                            <th class="th_h"  @if(even($j) == true) style="background: #ACE1AF!important;" @endif>
                                @php
                                    $TOTA_CAP = ($KRPC_CAP + $PNEW_CAP + $POLD_CAP + $WRPC_CAP + $NDPR_CAP);
                                @endphp
                                {{-- @if($tot_capacity != 0)@php  $TOTA_CAP = (($TOTAL * 100) / $tot_capacity);  @endphp @endif --}}
                                {{number_format($TOT_REF_PERC, 2) }}%
                            </th>
                            @php
                                $krpc_per[$i] = $KRPC_CAP;    $pnew_per[$i] = $PNEW_CAP;    $pold_per[$i] = $POLD_CAP;
                                $wrpc_per[$i] = $WRPC_CAP;    $ndpr_per[$i] = $NDPR_CAP;    $RefchartYear[$i] = $year;
                            @endphp
                            @php $i++; $j++; @endphp
                        </tr>
                    @endif
                @endfor
            @endif
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_51">
        @if($controllerName->bottomRemarks(51, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(51, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(51, $yrs)) {!! $controllerName->bottomRemarksTemp(51, $yrs)->remark !!}
        @endif
    </div>
    <br>


    <div class="row">
        <div class="col-md-7 chart-pad">
            <i class="pull-left" style="font-size: 10px"> </i>
            <div class="frame" style="">
                <canvas id="percByRefChart"></canvas>
            </div>

            <div class="fig1_51 figure">
                @if($controllerName->getFigure(51, $yrs)) Figure {!! $controllerName->getFigure(51, $yrs)->figure_no_1 !!} :
                {!! $controllerName->getFigure(51, $yrs)->figure_title_1 !!}
                @elseif($controllerName->getFigure(51, $yrs-1)) Figure {!! $controllerName->getFigure(51, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(51, $yrs-1)->figure_title_1 !!}
                @endif
            </div>
        </div>
    </div>

</div>   </div>



<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 52) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>52,'yrs'=>$yrs, 'remark'=>' Status of Licensed Refinery Projects'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">company</th>
                <th style="background: #A3C1AD!important;">Project Type</th>
                <th style="background: #A3C1AD!important;">License </th>
                <th style="background: #A3C1AD!important;">Capacity <i class="units">(BSPD)</i></th>
                <th style="background: #A3C1AD!important;">Location</th>
                {{-- <th style="background: #A3C1AD!important;">License Granted</th> --}}
                <th style="background: #A3C1AD!important;">Planned Commission Date</th>
                {{-- <th style="background: #A3C1AD!important;">License Validity</th> --}}
            </tr>

            <tbody> @php $i=1; @endphp
            @forelse($license_ref_projects as $license_ref_project)
                <tr class="">
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$i}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$license_ref_project->project_name}}
                    </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$license_ref_project->refinery_type}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$license_ref_project->license_granted}}
                    </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif
                    data-toggle="tooltip" title="In BSPD">{{number_format($license_ref_project->capacity, 2)}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$license_ref_project->field_id}}
                    </th>
                    {{-- <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$license_ref_project->license_granted}}</th> --}}
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$license_ref_project->estimated_completion}}</th>
                    {{-- <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @if($license_ref_project->validity)
                            @if($license_ref_project->validity->status_name == 'Valid')
                                <span class="badge badge-success"
                                      style="width:100%">{{$license_ref_project->validity->status_name}} </span>
                            @elseif($license_ref_project->validity->status_name == 'Expired')
                                <span class="badge badge-danger"
                                      style="width:100%">{{$license_ref_project->validity->status_name}} </span>
                            @endif
                        @endif
                    </th> --}}
                </tr>  @php $i++; @endphp
            @empty

            @endforelse
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_52">
        @if($controllerName->bottomRemarks(52, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(52, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(52, $yrs)) {!! $controllerName->bottomRemarksTemp(52, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>



<p style="margin-bottom: 550px !important"></p>
<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 53) == 0) display: none; @endif">
    @include('publication.partials.tablehead',['t_id'=>53,'yrs'=>$yrs, 'remark'=>' Domestic Gas Obligation (DGSO)'])
    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Company / Gas Producers</th>
                <th style="background: #A3C1AD!important;">{{$yrs + 1}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs + 2}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs + 3}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs + 4}}</th>
                <th style="background: #A3C1AD!important;">{{$yrs + 5}}</th>
                @php
                    $yearArr = [$yrs+1, $yrs+2, $yrs+3, $yrs+4, $yrs+5, $yrs+6];
                @endphp
            </tr>
            <tbody>  @php $i=1; @endphp
            @if($gas_obligations)
                @foreach($gas_obligations as $gas_obligation)
                    @php $gas_ob = $controllerName->domGasObligation($gas_obligation->company_id);  @endphp
                    <tr>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @if($gas_obligation->company) {{$gas_obligation->company->company_name}} @endif
                        </th>
                        @forelse($gas_ob as $gas_obli)
                            @if($gas_obli->company_id != 0 && in_array($gas_obli->year, $yearArr))
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($gas_obli->performance_obligation, 2)}}
                                </th>
                            @endif
                        @empty
                        @endforelse
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif
            <tr>
                <th class="th_h" style="background: #A3C1AD!important;" colspan="2"><b class="bfont-size">Total Gas</b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{$controllerName->domGasObligationTotal($yrs + 1)}}</b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{$controllerName->domGasObligationTotal($yrs + 2)}}</b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{$controllerName->domGasObligationTotal($yrs + 3)}}</b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{$controllerName->domGasObligationTotal($yrs + 4)}}</b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{$controllerName->domGasObligationTotal($yrs + 5)}}</b></th>
            </tr>
            <tr>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">DSO</b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"></b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"></b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"></b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"></b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"></b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"></b></th>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_53">
        @if($controllerName->bottomRemarks(53, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(53, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(53, $yrs)) {!! $controllerName->bottomRemarksTemp(53, $yrs)->remark !!}
        @endif
    </div>
  </div>
</div>

<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 54) == 0) display: none; @endif">
    @include('publication.partials.tablehead',['t_id'=>54,'yrs'=>$yrs, 'remark'=>' Allocation vs Supply Performance'])
    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Company</th>
                <th style="background: #A3C1AD!important;">Supply Oblig (MMscf/d)</th>
                <th style="background: #A3C1AD!important;">Actual Supply (MMscf/d)</th>
                <th style="background: #A3C1AD!important;">% Performance</th>
                {{-- <th style="background: #A3C1AD!important;">Remark</th> --}}
            </tr>

            <tbody>
            @php   $tot_ob = ''; $i=1;  @endphp
            @forelse($gas_obls as $gas_obl)
                <tr>
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}}</th>
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$gas_obl->company?$gas_obl->company->company_name:''}}
                    </th>
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($gas_obl->performance_obligation, 2)}}
                    </th>
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $tot_ob = $controllerName->domGasSupplyTotal($yrs, $gas_obl->company_id); @endphp
                        {{number_format(($tot_ob), 2)}}
                    </th>
                    @php
                        if($gas_obl->performance_obligation == 0){ $AVE_SUP = 0.0; }
                        else{ $AVE_SUP = ((($tot_ob /$gas_obl->performance_obligation ))); }
                    @endphp
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($AVE_SUP * 100, 2)}}
                    </th>
                    {{-- <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif></th> --}}
                </tr>  @php $i++; @endphp
            @empty
            @endforelse
            <tr>
                {{-- <th class="th_h">Total Gas</th>
                <th class="th_h"></th>
                <th class="th_h">{{$controllerName->domGasSupplyTotal($yrs, 'average_supply')}}</th>
                <th class="th_h">{{$controllerName->domGasSupplyTotal($yrs, 'performance_percent')}}</th>
                <th class="th_h"></th>  --}}
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_54">
        @if($controllerName->bottomRemarks(54, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(54, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(54, $yrs)) {!! $controllerName->bottomRemarksTemp(54, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>



@php
    $tot_obl_9 = 0; $tot_sup_9 = 0; $tot_per_9 = 0;    $tot_obl_8 = 0; $tot_sup_8 = 0; $tot_per_8 = 0;
    $tot_obl_7 = 0; $tot_sup_7 = 0; $tot_per_7 = 0;    $tot_obl_6 = 0; $tot_sup_6 = 0; $tot_per_6 = 0;
    $tot_obl_5 = 0; $tot_sup_5 = 0; $tot_per_5 = 0;    $tot_obl_4 = 0; $tot_sup_4 = 0; $tot_per_4 = 0;
    $tot_obl_3 = 0; $tot_sup_3 = 0; $tot_per_3 = 0;    $tot_obl_2 = 0; $tot_sup_2 = 0; $tot_per_2 = 0;
    $tot_obl_1 = 0; $tot_sup_1 = 0; $tot_per_1 = 0;    $tot_obl_0 = 0; $tot_sup_0 = 0; $tot_per_0 = 0;


    $tt_obl_9 = 0; $tt_sup_9 = 0;   $tt_obl_8 = 0; $tt_sup_8 = 0;   $tt_obl_7 = 0; $tt_sup_7 = 0;   $tt_obl_6 = 0; $tt_sup_6 = 0;
    $tt_obl_5 = 0; $tt_sup_5 = 0;   $tt_obl_4 = 0; $tt_sup_4 = 0;   $tt_obl_3 = 0; $tt_sup_3 = 0;   $tt_obl_2 = 0; $tt_sup_2 = 0;
    $tt_obl_1 = 0; $tt_sup_1 = 0;   $tt_obl_0 = 0; $tt_sup_0 = 0;
@endphp

<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 55) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>55,'yrs'=>$yrs, 'remark'=>' Summary of Domestics Gas'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th class="th_h" style="background: #A3C1AD!important;" style="font-size: 10px">Year</th>
                <th class="th_h" style="background: #A3C1AD!important;" style="font-size: 10px">Perf</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_companies)
                        <th style="font-size: 10px; background: #A3C1AD !important;">@if($gas_supply_companies->company)
                                {{substr($gas_supply_companies->company->company_name, 0, 15)}} @endif
                        </th>
                    @endforeach
                @endif
                <th class="th_h" style="background: #A3C1AD!important;" style="font-size: 10px">Total</th>
            </tr>



            <tbody> <!-- year - 9 -->
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px">{{$yrs - 9}}</th>
                <th class="th_h" style="font-size: 10px">Oblication</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px">@if($gas_supply_comp->company)
                                @php $tot_obl_9 += $obl_9 = $controllerName->obligationSummary($yrs - 9, $gas_supply_comp->company_id); @endphp
                                {{number_format($obl_9, 1)}} @endif
                        </th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px">{{number_format($tot_obl_9, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{$yrs - 9}}</th>
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">Supply</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $k=>$gas_supply_comp)
                        <th style="font-size: 10px; background: #ACE1AF!important;">@if($gas_supply_comp->company)
                                @php $tot_sup_9 += $sup_9 = $controllerName->supplySummary($yrs - 9, $gas_supply_comp->company_id); @endphp {{number_format($sup_9, 1)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{number_format($tot_sup_9, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px">{{$yrs - 9}}</th>
                <th class="th_h" style="font-size: 10px">% Perf</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $k => $gas_supply_comp)
                        <th style="font-size: 10px;">@if($gas_supply_comp->company)
                                @php $tt_obl_9 += $oblg_9 = $controllerName->obligationSummary($yrs - 9, $gas_supply_comp->company_id); @endphp
                                @php $tt_sup_9 += $supp_9 = $controllerName->supplySummary($yrs - 9, $gas_supply_comp->company_id); @endphp
                                @php
                                    if($oblg_9 == 0){ $tot_per_9 += $t_per_9 = 0.0; }
                                    else{ $tot_per_9 += $t_per_9 = (($supp_9 * 100) / $oblg_9); }
                                    if($obl_9 == 0){ $tot_per_9 = $sup_9 = 0.0; } else{ $tot_per_9 = (($supp_9 * 100) / $obl_9); }

                                    //total
                                     if($tt_obl_9 == 0){ $tot_per_9 = 0.0; }else{ $tot_per_9 = (($tt_sup_9 * 100) / $tt_obl_9); }
                                @endphp
                                {{number_format($t_per_9, 1)}}% @endif</th>
                    @endforeach
                @endif

                <th class="th_h" style="font-size: 10px">{{number_format($tot_per_9, 1)}}%</th>
            </tr>

            <!-- year - 8 -->

            <tr class="th_h">
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{$yrs - 8}}</th>
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">Oblication</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px; background: #ACE1AF!important;">@if($gas_supply_comp->company)
                                @php $tot_obl_8 += $t_obl_8 = $controllerName->obligationSummary($yrs - 8, $gas_supply_comp->company_id); @endphp     {{number_format($t_obl_8, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{number_format($tot_obl_8, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px">{{$yrs - 8}}</th>
                <th class="th_h" style="font-size: 10px">Supply</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px;">@if($gas_supply_comp->company)
                                @php $tot_sup_8 += $t_sup_8 = $controllerName->supplySummary($yrs - 8, $gas_supply_comp->company_id); @endphp
                                {{number_format($t_sup_8, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px">{{number_format($tot_sup_8, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{$yrs - 8}}</th>
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">% Perf</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $k => $gas_supply_comp)
                        <th style="font-size: 10px; background: #ACE1AF!important;">@if($gas_supply_comp->company)
                                @php $tt_obl_8 += $oblg_8 = $controllerName->obligationSummary($yrs - 8, $gas_supply_comp->company_id); @endphp
                                @php $tt_sup_8 += $supp_8 = $controllerName->supplySummary($yrs - 8, $gas_supply_comp->company_id); @endphp
                                @php
                                    if($oblg_8 == 0){ $tot_per_8 += $t_per_8 = 0.0; }
                                    else{ $tot_per_8 += $t_per_8 = (($supp_8 * 100) / $oblg_8); }
                                    if($t_obl_8 == 0){ $tot_per_8 = $t_sup_8 = 0.0; } else{ $tot_per_8 = (($supp_8 * 100) / $t_obl_8); }
                                @endphp
                                {{number_format($t_per_8, 1)}}% @endif</th>
                    @endforeach
                @endif
                @php
                    //total
                    if($tt_obl_8 == 0){ $tot_per_8 = 0.0; }else{ $tot_per_8 = (($tt_sup_8 * 100) / $tt_obl_8); }
                @endphp
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{number_format($tot_per_8, 1)}}%</th>
            </tr>
            <!-- year - 7 -->
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px">{{$yrs - 7}}</th>
                <th class="th_h" style="font-size: 10px">Oblication</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px">@if($gas_supply_comp->company)
                                @php $tot_obl_7 += $t_obl_7 = $controllerName->obligationSummary($yrs - 7, $gas_supply_comp->company_id); @endphp     {{number_format($t_obl_7, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px">{{number_format($tot_obl_7, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{$yrs - 7}}</th>
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">Supply</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px; background: #ACE1AF!important;">@if($gas_supply_comp->company)
                                @php $tot_sup_7 += $t_sup_7 = $controllerName->supplySummary($yrs - 7, $gas_supply_comp->company_id); @endphp
                                {{number_format($t_sup_7, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{number_format($tot_sup_7, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px">{{$yrs - 7}}</th>
                <th class="th_h" style="font-size: 10px">% Perf</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $k => $gas_supply_comp)
                        <th style="font-size: 10px;">@if($gas_supply_comp->company)
                                @php $tt_obl_7 += $oblg_7 = $controllerName->obligationSummary($yrs - 7, $gas_supply_comp->company_id); @endphp
                                @php $tt_sup_7 += $supp_7 = $controllerName->supplySummary($yrs - 7, $gas_supply_comp->company_id); @endphp
                                @php
                                    if($oblg_7 == 0){ $tot_per_7 += $t_per_7 = 0.0; }
                                    else{ $tot_per_7 += $t_per_7 = (($supp_7 * 100) / $oblg_7); }
                                    if($t_obl_7 == 0){ $tot_per_7 = $t_sup_7 = 0.0; } else{ $tot_per_7 = (($supp_7 * 100) / $t_obl_7); }
                                @endphp
                                {{number_format($t_per_7, 1)}}% @endif</th>
                    @endforeach
                @endif
                @php
                    //total
                    if($tt_obl_7 == 0){ $tot_per_7 = 0.0; }else{ $tot_per_7 = (($tt_sup_7 * 100) / $tt_obl_7); }
                @endphp

                <th class="th_h" style="font-size: 10px">{{number_format($tot_per_7, 1)}}%</th>
            </tr>

            <!-- year - 9 -->

            <tr class="th_h">
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{$yrs - 6}}</th>
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">Oblication</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px; background: #ACE1AF!important;">@if($gas_supply_comp->company)
                                @php $tot_obl_6 += $t_obl_6 = $controllerName->obligationSummary($yrs - 6, $gas_supply_comp->company_id); @endphp
                                {{number_format($t_obl_6, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{number_format($tot_obl_6, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px">{{$yrs - 6}}</th>
                <th class="th_h" style="font-size: 10px">Supply</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px">@if($gas_supply_comp->company)
                                @php $tot_sup_6 += $t_sup_6 = $controllerName->supplySummary($yrs - 6, $gas_supply_comp->company_id); @endphp
                                {{number_format($t_sup_6, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px">{{number_format($tot_sup_6, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{$yrs - 6}}</th>
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">% Perf</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $k => $gas_supply_comp)
                        <th style="font-size: 10px; background: #ACE1AF!important;">@if($gas_supply_comp->company)
                                @php $tt_obl_6 += $oblg_6 = $controllerName->obligationSummary($yrs - 6, $gas_supply_comp->company_id); @endphp
                                @php $tt_sup_6 += $supp_6 = $controllerName->supplySummary($yrs - 6, $gas_supply_comp->company_id); @endphp
                                @php
                                    if($oblg_6 == 0){ $tot_per_6 += $t_per_6 = 0.0; }
                                    else{ $tot_per_6 += $t_per_6 = (($supp_6 * 100) / $oblg_6); }
                                    if($t_obl_6 == 0){ $tot_per_6 = $t_sup_6 = 0.0; } else{ $tot_per_6 = (($supp_6 * 100) / $t_obl_6); }
                                @endphp
                                {{number_format($t_per_6, 1)}}% @endif</th>
                    @endforeach
                @endif
                @php
                    //total
                    if($tt_obl_6 == 0){ $tot_per_6 = 0.0; }else{ $tot_per_6 = (($tt_sup_6 * 100) / $tt_obl_6); }
                @endphp

                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{number_format($tot_per_6, 1)}}%</th>
            </tr>
            <!-- year - 9 -->

            <tr class="th_h">
                <th class="th_h" style="font-size: 10px">{{$yrs - 5}}</th>
                <th class="th_h" style="font-size: 10px">Oblication</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px">@if($gas_supply_comp->company)
                                @php $tot_obl_5 += $t_obl_5 = $controllerName->obligationSummary($yrs - 5, $gas_supply_comp->company_id); @endphp
                                {{number_format($t_obl_5, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px">{{number_format($tot_obl_5, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{$yrs - 5}}</th>
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">Supply</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px; background: #ACE1AF!important;">@if($gas_supply_comp->company)
                                @php $tot_sup_5 += $t_sup_5 = $controllerName->supplySummary($yrs - 5, $gas_supply_comp->company_id); @endphp
                                {{number_format($t_sup_5, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{number_format($tot_sup_5, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px;">{{$yrs - 5}}</th>
                <th class="th_h" style="font-size: 10px;">% Perf</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $k => $gas_supply_comp)
                        <th style="font-size: 10px;">@if($gas_supply_comp->company)
                                @php $tt_obl_5 += $oblg_5 = $controllerName->obligationSummary($yrs - 5, $gas_supply_comp->company_id); @endphp
                                @php $tt_sup_5 += $supp_5 = $controllerName->supplySummary($yrs - 5, $gas_supply_comp->company_id); @endphp
                                @php
                                    if($oblg_5 == 0){ $tot_per_5 += $t_per_5 = 0.0; }
                                    else{ $tot_per_5 += $t_per_5 = (($supp_5 * 100) / $oblg_5); }
                                    if($t_obl_5 == 0){ $tot_per_5 = $t_sup_5 = 0.0; } else{ $tot_per_5 = (($supp_5 * 100) / $t_obl_5); }
                                @endphp
                                {{number_format($t_per_5, 1)}}% @endif</th>
                    @endforeach
                @endif
                @php
                    //total
                    if($tt_obl_5 == 0){ $tot_per_5 = 0.0; }else{ $tot_per_5 = (($tt_sup_5 * 100) / $tt_obl_5); }
                @endphp

                <th class="th_h" style="font-size: 10px;">{{number_format($tot_per_5, 1)}}%</th>
            </tr>
            <!-- year - 9 -->

            <tr class="th_h">
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{$yrs - 4}}</th>
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">Oblication</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px; background: #ACE1AF!important;">@if($gas_supply_comp->company)
                                @php $tot_obl_4 += $t_obl_4 = $controllerName->obligationSummary($yrs - 4, $gas_supply_comp->company_id); @endphp
                                {{number_format($t_obl_4, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{number_format($tot_obl_4, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px">{{$yrs - 4}}</th>
                <th class="th_h" style="font-size: 10px">Supply</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px">@if($gas_supply_comp->company)
                                @php $tot_sup_4 += $t_sup_4 = $controllerName->supplySummary($yrs - 4, $gas_supply_comp->company_id); @endphp
                                {{number_format($t_sup_4, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px">{{number_format($tot_sup_4, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{$yrs - 4}}</th>
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">% Perf</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $k => $gas_supply_comp)
                        <th style="font-size: 10px; background: #ACE1AF!important;">@if($gas_supply_comp->company)
                                @php $tt_obl_4 += $oblg_4 = $controllerName->obligationSummary($yrs - 4, $gas_supply_comp->company_id); @endphp
                                @php $tt_sup_4 += $supp_4 = $controllerName->supplySummary($yrs - 4, $gas_supply_comp->company_id); @endphp
                                @php
                                    if($oblg_4 == 0){ $tot_per_4 += $t_per_4 = 0.0; }
                                    else{ $tot_per_4 += $t_per_4 = (($supp_4 * 100) / $oblg_4); }
                                    if($t_obl_4 == 0){ $tot_per_4 = $t_sup_4 = 0.0; } else{ $tot_per_4 = (($supp_4 * 100) / $t_obl_4); }
                                @endphp
                                {{number_format($t_per_4, 1)}}% @endif</th>
                    @endforeach
                @endif
                @php
                    //total
                    if($tt_obl_4 == 0){ $tot_per_4 = 0.0; }else{ $tot_per_4 = (($tt_sup_4 * 100) / $tt_obl_4); }
                @endphp

                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{number_format($tot_per_4, 1)}}%</th>
            </tr>

            <!-- year - 3 -->

            <tr class="th_h">
                <th class="th_h" style="font-size: 10px">{{$yrs - 3}}</th>
                <th class="th_h" style="font-size: 10px">Oblication</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px">@if($gas_supply_comp->company)
                                @php $tot_obl_3 += $t_obl_3 = $controllerName->obligationSummary($yrs - 3, $gas_supply_comp->company_id); @endphp
                                {{number_format($t_obl_3, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px">{{number_format($tot_obl_3, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{$yrs - 3}}</th>
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">Supply</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px; background: #ACE1AF!important;">@if($gas_supply_comp->company)
                                @php $tot_sup_3 += $t_sup_3 = $controllerName->supplySummary($yrs - 3, $gas_supply_comp->company_id); @endphp
                                {{number_format($t_sup_3, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{number_format($tot_sup_3, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px;">{{$yrs - 3}}</th>
                <th class="th_h" style="font-size: 10px;">% Perf</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $k => $gas_supply_comp)
                        <th style="font-size: 10px;">@if($gas_supply_comp->company)
                                @php $tt_obl_3 += $oblg_3 = $controllerName->obligationSummary($yrs - 3, $gas_supply_comp->company_id); @endphp
                                @php $tt_obl_3 += $supp_3 = $controllerName->supplySummary($yrs - 3, $gas_supply_comp->company_id); @endphp
                                @php
                                    if($oblg_3 == 0){ $tot_per_3 += $t_per_3 = 0.0; }
                                    else{ $tot_per_3 += $t_per_3 = (($supp_3 * 100) / $oblg_3); }
                                    if($t_obl_3 == 0){ $tot_per_3 = $t_sup_3 = 0.0; } else{ $tot_per_3 = (($supp_3 * 100) / $t_obl_3); }
                                @endphp
                                {{number_format($t_per_3, 1)}}% @endif</th>
                    @endforeach
                @endif
                @php
                    //total
                    if($tt_obl_3 == 0){ $tot_per_3 = 0.0; }else{ $tot_per_3 = (($tt_sup_3 * 100) / $tt_obl_3); }
                @endphp

                <th class="th_h" style="font-size: 10px;">{{number_format($tot_per_3, 1)}}%</th>
            </tr>

            <!-- year - 2 -->

            <tr class="th_h">
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{$yrs - 2}}</th>
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">Oblication</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px; background: #ACE1AF!important;">@if($gas_supply_comp->company)
                                @php $tot_obl_2 += $t_obl_2 = $controllerName->obligationSummary($yrs - 2, $gas_supply_comp->company_id); @endphp
                                {{number_format($t_obl_2, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{number_format($tot_obl_2, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px">{{$yrs - 2}}</th>
                <th class="th_h" style="font-size: 10px">Supply</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px">@if($gas_supply_comp->company)
                                @php $tot_sup_2 += $t_sup_2 = $controllerName->supplySummary($yrs - 2, $gas_supply_comp->company_id); @endphp
                                {{number_format($t_sup_2, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px">{{number_format($tot_sup_2, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{$yrs - 2}}</th>
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">% Perf</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $k => $gas_supply_comp)
                        <th style="font-size: 10px; background: #ACE1AF!important;">@if($gas_supply_comp->company)
                                @php $tt_obl_2 += $oblg_2 = $controllerName->obligationSummary($yrs - 2, $gas_supply_comp->company_id); @endphp
                                @php $tt_sup_2 += $supp_2 = $controllerName->supplySummary($yrs - 2, $gas_supply_comp->company_id); @endphp
                                @php
                                    if($oblg_2 == 0){ $tot_per_2 += $t_per_2 = 0.0; }
                                    else{ $tot_per_2 += $t_per_2 = (($supp_2 * 100) / $oblg_2); }
                                    if($t_obl_2 == 0){ $tot_per_2 = $t_sup_2 = 0.0; } else{ $tot_per_2 = (($supp_2 * 100) / $t_obl_2); }
                                @endphp
                                {{number_format($t_per_2, 1)}}% @endif</th>
                    @endforeach
                @endif
                @php
                    //total
                    if($tt_obl_2 == 0){ $tot_per_2 = 0.0; }else{ $tot_per_2 = (($tt_sup_2 * 100) / $tt_obl_2); }
                @endphp

                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{number_format($tot_per_2, 1)}}%</th>
            </tr>

            <!-- year - 1 -->

            <tr class="th_h">
                <th class="th_h" style="font-size: 10px">{{$yrs - 1}}</th>
                <th class="th_h" style="font-size: 10px">Oblication</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px">@if($gas_supply_comp->company)
                                @php $tot_obl_1 += $t_obl_1 = $controllerName->obligationSummary($yrs - 1, $gas_supply_comp->company_id); @endphp
                                {{number_format($t_obl_1, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px">{{number_format($tot_obl_1, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{$yrs - 1}}</th>
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">Supply</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px; background: #ACE1AF!important;">@if($gas_supply_comp->company)
                                @php $tot_sup_1 += $t_sup_1 = $controllerName->supplySummary($yrs - 1, $gas_supply_comp->company_id); @endphp
                                {{number_format($t_sup_1, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{number_format($tot_sup_1, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px;">{{$yrs - 1}}</th>
                <th class="th_h" style="font-size: 10px;">% Perf</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $k => $gas_supply_comp)
                        <th style="font-size: 10px;">@if($gas_supply_comp->company)
                                @php $tt_obl_1 += $oblg_1 = $controllerName->obligationSummary($yrs - 1, $gas_supply_comp->company_id); @endphp
                                @php $tt_sup_1 += $supp_1 = $controllerName->supplySummary($yrs - 1, $gas_supply_comp->company_id); @endphp
                                @php
                                    if($oblg_1 == 0){ $tot_per_1 += $t_per_1 = 0.0; }else{ $tot_per_1 += $t_per_1 = (($supp_1 * 100) / $oblg_1); }
                                    if($t_obl_1 == 0){ $tot_per_1 = $t_sup_1 = 0.0; } else{ $tot_per_1 = (($supp_1 * 100) / $t_obl_1); }
                                @endphp
                                {{number_format($t_per_1, 1)}}% @endif</th>
                    @endforeach
                @endif
                @php
                    //total
                    if($tt_obl_1 == 0){ $tot_per_1 = 0.0; }else{ $tot_per_1 = (($tt_sup_1 * 100) / $tt_obl_1); }
                @endphp

                <th class="th_h" style="font-size: 10px;">{{number_format($tot_per_1, 1)}}%</th>
            </tr>

            <!-- year - 0 -->

            <tr class="th_h">
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{$yrs - 0}}</th>
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">Oblication</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px; background: #ACE1AF!important;">@if($gas_supply_comp->company)
                                @php $tot_obl_0 += $t_obl_0 = $controllerName->obligationSummary($yrs - 0, $gas_supply_comp->company_id); @endphp
                                {{number_format($t_obl_0, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{number_format($tot_obl_0, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px">{{$yrs - 0}}</th>
                <th class="th_h" style="font-size: 10px">Supply</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $gas_supply_comp)
                        <th style="font-size: 10px">@if($gas_supply_comp->company)
                                @php $tot_sup_0 += $t_sup_0 = ($controllerName->supplySummary($yrs - 0, $gas_supply_comp->company_id) / 365); @endphp {{number_format($t_sup_0, 2)}} @endif</th>
                    @endforeach
                @endif
                <th class="th_h" style="font-size: 10px">{{number_format($tot_sup_0, 2)}}</th>
            </tr>
            <tr class="th_h">
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{$yrs - 0}}</th>
                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">% Perf</th>
                @if($gas_supply_company)
                    @foreach($gas_supply_company as $k => $gas_supply_comp)
                        <th style="font-size: 10px; background: #ACE1AF!important;">@if($gas_supply_comp->company)
                                @php $tt_obl_0 += $oblg_0 = $controllerName->obligationSummary($yrs - 0, $gas_supply_comp->company_id); @endphp
                                @php $tt_sup_0 += $supp_0 = ($controllerName->supplySummary($yrs - 0, $gas_supply_comp->company_id) / 365); @endphp
                                @php
                                    if($oblg_0 == 0){ $t_per_0 = 0.0; } else{ $t_per_0 = (($supp_0 * 100) / $oblg_0); }
                                    if($t_obl_0 == 0){ $tot_per_0 = $t_sup_0 = 0.0; } else{ $tot_per_0 = (($supp_0 * 100) / $t_obl_0); }
                                @endphp
                                {{number_format($t_per_0, 1)}}% @endif</th>
                    @endforeach
                @endif
                @php
                    //total
                    if($tt_obl_0 == 0){ $tot_per_0 = 0.0; }else{ $tot_per_0 = (($tt_sup_0 * 100) / $tt_obl_0); }
                @endphp

                <th class="th_h" style="font-size: 10px; background: #ACE1AF!important;">{{number_format($tot_per_0, 1)}}%</th>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_55">
        @if($controllerName->bottomRemarks(55, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(55, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(55, $yrs)) {!! $controllerName->bottomRemarksTemp(55, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>



<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 56) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>56,'yrs'=>$yrs, 'remark'=>' Approved Gas Supply Structure for the Textile Industry'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Sector</th>
                <th style="background: #A3C1AD!important;">{{$text_year->year}}</th>
                <th style="background: #A3C1AD!important;">{{$text_year->year + 1}}</th>
            </tr>

            <tbody> @php $total_yr1 = 0;  $total_yr2 = 0; $i=1; @endphp
            @forelse($textile_ind as $text_ind)
                <tr>
                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$text_ind->sector}} ($/Mcf)</th>
                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$controllerName->TextileIndustry($text_ind->year, $text_ind->sector, 'value')}}</th>
                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$controllerName->TextileIndustry($text_ind->year + 1, $text_ind->sector, 'value')}}</th>
                </tr>
                @php
                    $total_yr1 += $controllerName->TextileIndustry($yrs, $text_ind->sector, 'value');
                    $total_yr2 += $controllerName->TextileIndustry($yrs + 1, $text_ind->sector, 'value'); $i++;
                @endphp
            @empty
            @endforelse
            <tr>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">Total ($/Mcf)</b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$total_yr1}}</b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$total_yr2}}</b></th>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_56">
        @if($controllerName->bottomRemarks(56, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(56, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(56, $yrs)) {!! $controllerName->bottomRemarksTemp(56, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>



<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 57) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>57,'yrs'=>$yrs, 'remark'=>' Major Gas Facilities'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Company</th>
                <th style="background: #A3C1AD!important;">Facility</th>
                <th style="background: #A3C1AD!important;">Facility Type</th>
                <th style="background: #A3C1AD!important;">Location</th>
                <th style="background: #A3C1AD!important;">Design Capacity <i class="units">Mmscf/D</i></th>
                <th style="background: #A3C1AD!important;">Design Life</th>
                <th style="background: #A3C1AD!important;">Date of Commissioning</th>
            </tr>

            <tbody> @php $i=1; @endphp
            @if($gas_facility)
                @foreach($gas_facility as $key => $gas_facility)
                    <tr>
                        <th class="f-12"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$i}}</th>
                        <th class="f-12"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{ $gas_facility->company?$gas_facility->company->company_name:'N/A'}}</th>
                        <th class="f-12"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$gas_facility->facility?$gas_facility->facility->facility_name:'N/A'}}</th>
                        <th class="f-12"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$gas_facility->facility_type?$gas_facility->facility_type->facility_type_name:'N/A'}}</th>
                        <th class="f-12"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$gas_facility->location?$gas_facility->location->location_name:'N/A'}}</th>
                        <th class="f-12"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$gas_facility->design_capacity}}</th>
                        <th class="f-12"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$gas_facility->facility_design_life}}</th>
                        <th class="f-12"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$gas_facility->date_of_commissioning}}</th>
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_57">
        @if($controllerName->bottomRemarks(57, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(57, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(57, $yrs)) {!! $controllerName->bottomRemarksTemp(57, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>



<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 58) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>58,'yrs'=>$yrs, 'remark'=>' Major Gas Plant Projects'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Project Title</th>
                <th style="background: #A3C1AD!important;">Company</th>
                <th style="background: #A3C1AD!important;">Project Objective</th>
                <th style="background: #A3C1AD!important;">Capacity <i class="units">Mmscf/d</i></th>
                <th style="background: #A3C1AD!important;">Location</th>
                <th style="background: #A3C1AD!important;">Expected Completion Date</th>
            </tr>

            <tbody> @php $i=1; @endphp
            @if($gas_plant)
                @foreach($gas_plant as $gas_plant)
                    <tr>
                        <th class="f-12"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$i}}</th>
                        <th class="f-12"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$gas_plant->project_title}}</th>
                        <th class="f-12"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$gas_plant->company?$gas_plant->company->company_name:''}}</th>
                        <th class="f-12"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$gas_plant->project_objective}}</th>
                        <th class="f-12"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$gas_plant->petrochemical}}</th>
                        <th class="f-12"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$gas_plant->location_id}}</th>
                        <th class="f-12"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$gas_plant->end_date}}</th>
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_58">
        @if($controllerName->bottomRemarks(58, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(58, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(58, $yrs)) {!! $controllerName->bottomRemarksTemp(58, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>



<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 59) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>59,'yrs'=>$yrs, 'remark'=>' Major Petrochemical Plants'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                {{-- <th>State</th> --}}
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Location</th>
                <th style="background: #A3C1AD!important;">Ownership</th>
                <th style="background: #A3C1AD!important;">Processing Plant Type</th>
                <th style="background: #A3C1AD!important;">Capacity <i class="units">MTPA</i></th>
                <th style="background: #A3C1AD!important;">Feedstock</th>
                <th style="background: #A3C1AD!important;">product</th>
            </tr>

            <tbody> @php $i=1; @endphp
            @if($down_pet_plants)
                @foreach($down_pet_plants as $down_pet_plant)
                    <tr>
                        {{-- <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @if($down_pet_plant->state) {{$down_pet_plant->state->state_name}} @endif</th> --}}
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$i}} </th>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$down_pet_plant->location}} </th>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @if($down_pet_plant->ownerships) {{$down_pet_plant->ownerships->ownership_name}} @endif</th>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @if($down_pet_plant->plant_types) {{$down_pet_plant->plant_types->plant_type_name}} @endif</th>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif
                        data-toggle="tooltip"
                             title="Capacity In MTPA">{{number_format($down_pet_plant->plant_capacity, 2)}}</th>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @if($down_pet_plant->feedstocks) {{$down_pet_plant->feedstocks->feedstock_name}} @endif</th>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @if($down_pet_plant->product) {{$down_pet_plant->product->product_name}} @endif</th>
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_59">
        @if($controllerName->bottomRemarks(59, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(59, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(59, $yrs)) {!! $controllerName->bottomRemarksTemp(59, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>



<p style="margin-bottom: 220px !important"></p>

<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 60) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>60,'yrs'=>$yrs, 'remark'=>' Major Petrochemical Plant Projects'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                {{-- <th style="background: #A3C1AD!important;">State</th> --}}
                {{-- <th style="background: #A3C1AD!important;">Plant Location</th> --}}
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Plant Name</th>
                <th style="background: #A3C1AD!important;">Plant Type</th>
                <th style="background: #A3C1AD!important;">Capacity by Unit <i class="units"></i></th>
                <th style="background: #A3C1AD!important;">Output By Unit</th>
                <th style="background: #A3C1AD!important;">Status</th>
                <th style="background: #A3C1AD!important;">Start Year</th>
                <th style="background: #A3C1AD!important;">Estimated Completion</th>
            </tr>

            <tbody>  @php $i=1; @endphp
            @if($down_pet_project)
                @foreach($down_pet_project as $down_pet_project)
                    <tr>
                        {{-- <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$down_pet_project->state?$down_pet_project->state->state_name:''}}</th> --}}
                        {{-- <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$down_pet_project->location}} </th> --}}
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$i}}</th>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$down_pet_project->plant_name}}</th>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$down_pet_project->plant_type}} </th>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif
                        data-toggle="tooltip"
                             title="Capacity In ">{{$down_pet_project->capacity_by_unit}}</th>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$down_pet_project->output_yield}} </th>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$down_pet_project->status}} </th>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$down_pet_project->start_year}} </th>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$down_pet_project->estimated_completion}} </th>
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_60">
        @if($controllerName->bottomRemarks(60, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(60, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(60, $yrs)) {!! $controllerName->bottomRemarksTemp(60, $yrs)->remark !!}
        @endif
    </div>

    <button type="button" id="load_four" class="btn btn-default pull-right" onclick="loadFour()">Load More</button>
</div>  </div>




<div id="section_four">
</div>




<!-- INCLUDING CHARTS chart js-->
@include('publication.partials.chartThree')
