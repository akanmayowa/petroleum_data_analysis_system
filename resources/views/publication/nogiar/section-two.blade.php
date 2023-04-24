@php 
    use \App\Http\Controllers\PublicationController; 
    $controllerName = new PublicationController;


    //function to check if a number is even or odd
    function even($i)
    {
        if($i % 2 == 0){ return true; }
    }
@endphp





    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 20) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>20,'yrs'=>$yrs, 'remark'=>' Approved (NAG) Development Plans'])

        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;">#</th>
                    <th style="background: #A3C1AD!important;">Company</th>
                    <th style="background: #A3C1AD!important;">Block</th>
                    <th style="background: #A3C1AD!important;">FDP</th>
                    <th style="background: #A3C1AD!important;">Gas Reserves (BSCF)</th>
                    <th style="background: #A3C1AD!important;">Condensate(MMSTB)</th>
                    <th style="background: #A3C1AD!important;">Gas Off-Take Rate (MMSCFD)</th>
                </tr>
                
                <tbody>  @php $i = 1;  $nag_count[] = ''; @endphp
                @forelse($app_gas_fdps as $app_gas_fdp)
                    @if($app_gas_fdp->off_take_rate != 0)
                        <tr>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$app_gas_fdp->company?$app_gas_fdp->company->company_name:''}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$app_gas_fdp->concession?$app_gas_fdp->concession->concession_name:''}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$app_gas_fdp->field?$app_gas_fdp->field->field_name:''}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$app_gas_fdp->gas_reserve}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$app_gas_fdp->condensate}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$app_gas_fdp->off_take_rate}}</th>
                        </tr> @php $i++; @endphp
                    @endif
                @empty
                @endforelse

                @foreach($array_year_10 as $k => $arr_year)
                    @php $nag_count[$k] = $controllerName->approveNAGCount($arr_year, 2); @endphp
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_20"> 
            @if($controllerName->bottomRemarks(20, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(20, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(20, $yrs)) {!! $controllerName->bottomRemarksTemp(20, $yrs)->remark !!}
            @endif 
        </div>
    </div>
</div>

                

    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 21) == 0) display: none; @endif">
                       
        @include('publication.partials.tablehead',['t_id'=>21,'yrs'=>$yrs, 'remark'=>' Approved (AG) Development Plans'])

        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head" style="page-break-inside: avoid !important;">
                    <th style="background: #A3C1AD!important;">#</th>
                    <th style="background: #A3C1AD!important;">Company</th>
                    <th style="background: #A3C1AD!important;">Block</th>
                    <th style="background: #A3C1AD!important;">FDP</th>
                    <th style="background: #A3C1AD!important;">AG Reserves, Bscf</th>
                    <th style="background: #A3C1AD!important;">Gas Off-Take Rate (MMSCFD)</th>
                </tr>
                
                <tbody>  @php $i = 1; $companies[] = ''; $ag_count[] = ''; @endphp
                @forelse($app_gas_fdps as $app_gas_fdp)
                    @if($app_gas_fdp->ag_reserve != 0)
                        <tr style="page-break-inside: avoid !important;">
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$app_gas_fdp->company?$app_gas_fdp->company->company_name:''}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$app_gas_fdp->concession?$app_gas_fdp->concession->concession_name:''}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                {{$app_gas_fdp->field?$app_gas_fdp->field->field_name:''}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$app_gas_fdp->ag_reserve}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$app_gas_fdp->off_take_rate}}</th>
                        </tr>  @php $i++; @endphp
                    @endif
                @empty
                @endforelse

                @php $companies = $controllerName->getCompanyList($yrs); @endphp

                @foreach($companies as $k => $company)
                    @php $ag_count[$k] = $controllerName->approveAGCount($yrs, 1, $company->company_id); @endphp
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_21"> 
            @if($controllerName->bottomRemarks(21, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(21, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(21, $yrs)) {!! $controllerName->bottomRemarksTemp(21, $yrs)->remark !!}
            @endif 
        </div>

        {{-- <div class="row chart-pad">  
            <div class="col-md-6 canvas-pad-right"><br> <br>
                <div class="frame" style="">
                    <canvas id="appNAGFDPChart"></canvas>
                </div>
                
                <div class="fig1_21">
                    @if($controllerName->getFigure(21, $yrs)) Figure {!! $controllerName->getFigure(21, $yrs)->figure_no_1 !!} : 
                           {!! $controllerName->getFigure(21, $yrs)->figure_title_1 !!} 
                    @elseif($controllerName->getFigure(21, $yrs-1)) Figure {!! $controllerName->getFigure(21, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(21, $yrs-1)->figure_title_1 !!} 
                    @endif
                </div>
            </div>

            <div class="col-md-6 canvas-pad-left"><br> <br>
                <div class="frame" style="">
                    <canvas id="appAGFDPChart"></canvas>
                </div>
                
                <div class="fig2_21">
                    @if($controllerName->getFigure(21, $yrs)) Figure {!! $controllerName->getFigure(21, $yrs)->figure_no_2 !!} : 
                           {!! $controllerName->getFigure(21, $yrs)->figure_title_2 !!} 
                    @elseif($controllerName->getFigure(21, $yrs-1)) Figure {!! $controllerName->getFigure(21, $yrs-1)->figure_no_2 !!} : {!! $controllerName->getFigure(21, $yrs-1)->figure_title_2 !!} 
                    @endif
                </div>
            </div>
        </div> --}}

    </div>  </div>



    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 22) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>22,'yrs'=>$yrs, 'remark'=>' Drill Gas Appraisal/ Development Wells'])

        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;">#</th>
                    <th style="background: #A3C1AD!important;">Company</th>
                    <th style="background: #A3C1AD!important;">Block/Field</th>
                    <th style="background: #A3C1AD!important;">Wellname/Status</th>
                    <th style="background: #A3C1AD!important;">Terrain</th>
                    <th style="background: #A3C1AD!important;">Reserves, Bscf</th>
                    <th style="background: #A3C1AD!important;">Off-Take (MMScf/d)</th>
                </tr>
                
                <tbody> @php $i = 1; @endphp
                @forelse($drill_gas_wells as $drill_gas_well)
                    @if($drill_gas_well->type_id == 1)
                        <tr>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$drill_gas_well->company?$drill_gas_well->company->company_name:''}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$drill_gas_well->concession?$drill_gas_well->concession->concession_name:''}}
                                /{{$drill_gas_well->field?$drill_gas_well->field->field_name:''}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$drill_gas_well->well}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$drill_gas_well->terrain?$drill_gas_well->terrain->terrain_name:''}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$drill_gas_well->reserves}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$drill_gas_well->off_take}}</th>
                        </tr> @php $i++; @endphp
                    @endif
                @empty
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_22"> 
            @if($controllerName->bottomRemarks(22, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(22, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(22, $yrs)) {!! $controllerName->bottomRemarksTemp(22, $yrs)->remark !!}
            @endif  
        </div>

    </div>  </div>



    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 23) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>23,'yrs'=>$yrs, 'remark'=>' Gas Well Initial Completion'])

        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;">#</th>
                    <th style="background: #A3C1AD!important;">Company</th>
                    <th style="background: #A3C1AD!important;">Block/Field</th>
                    <th style="background: #A3C1AD!important;">Well/Status</th>
                    <th style="background: #A3C1AD!important;">Reserves, Bscf</th>
                    <th style="background: #A3C1AD!important;">Off-Take (MMScf/d)</th>
                    <th style="background: #A3C1AD!important;">Processing Facility</th>
                </tr>
                
                <tbody>  @php $i=1; @endphp
                @forelse($drill_gas_wells as $drill_gas_well)
                    @if($drill_gas_well->type_id == 2)
                        <tr>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$i}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @if($drill_gas_well->company) {{$drill_gas_well->company->company_name}}@else N/A @endif
                            </th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @if($drill_gas_well->concession)
                                    {{$drill_gas_well->concession->concession_name}}@else N/A @endif
                                /@if($drill_gas_well->field)
                                    {{$drill_gas_well->field->field_name}}@else N/A @endif
                            </th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$drill_gas_well->well}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$drill_gas_well->reserves}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$drill_gas_well->off_take}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @if($drill_gas_well->facility) {{$drill_gas_well->facility->facility_name}}@else N/A @endif
                            </th>
                        </tr>  @php $i++; @endphp
                    @endif 
                @empty
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_23"> 
            @if($controllerName->bottomRemarks(23, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(23, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(23, $yrs)) {!! $controllerName->bottomRemarksTemp(23, $yrs)->remark !!}
            @endif 
        </div>

    </div>  </div>



    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 24) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>24,'yrs'=>$yrs, 'remark'=>' Gas Wells Work-Over Operations'])

        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;">#</th>
                    <th style="background: #A3C1AD!important;">Company</th>
                    <th style="background: #A3C1AD!important;">Block</th>
                    <th style="background: #A3C1AD!important;">Well Name</th>
                    <th style="background: #A3C1AD!important;">Processing Facility</th>
                </tr>
                
                <tbody> @php $i=1; @endphp
                @forelse($gas_well_workovers as $gas_well_workover)
                    @if($gas_well_workover->type_id == 2)
                        <tr>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$i}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @if($gas_well_workover->company) {{$gas_well_workover->company->company_name}}@else N/A @endif
                            </th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @if($gas_well_workover->concession) {{$gas_well_workover->concession->concession_name}}@else N/A @endif
                            </th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$gas_well_workover->well}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @if($gas_well_workover->facility) {{$gas_well_workover->facility->facility_name}}@else N/A @endif
                            </th>
                        </tr>  @php $i++; @endphp
                    @endif
                @empty
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_24"> 
            @if($controllerName->bottomRemarks(24, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(24, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(24, $yrs)) {!! $controllerName->bottomRemarksTemp(24, $yrs)->remark !!}
            @endif 
        </div>

    </div>  </div>

    <br>

    @php
        $jan_rig = 0; $feb_rig = 0;$mar_rig = 0; $apr_rig = 0; $may_rig = 0; $jun_rig = 0;
        $jul_rig = 0; $aug_rig = 0; $sep_rig = 0; $oct_rig = 0; $nov_rig = 0; $dec_rig = 0;
    @endphp
    <br>



    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 25) == 0) display: none; @endif">
        @include('publication.partials.tablehead',['t_id'=>25,'yrs'=>$yrs, 'remark'=>' Monthly Rig Disposition'])
        <div class="table-responsive" style="">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                <tr class="th_head">
                    <th style="width: 25%; background: #A3C1AD!important;">Terrain</th>
                    <th style="width: 6.25%; background: #A3C1AD!important;">Jan<i style="font-size: 11px"></i></th>
                    <th style="width: 6.25%; background: #A3C1AD!important;">Feb<i style="font-size: 11px"></i></th>
                    <th style="width: 6.25%; background: #A3C1AD!important;">Mar<i style="font-size: 11px"></i></th>
                    <th style="width: 6.25%; background: #A3C1AD!important;">Apr<i style="font-size: 11px"></i></th>
                    <th style="width: 6.25%; background: #A3C1AD!important;">May<i style="font-size: 11px"></i></th>
                    <th style="width: 6.25%; background: #A3C1AD!important;">Jun<i style="font-size: 11px"></i></th>
                    <th style="width: 6.25%; background: #A3C1AD!important;">Jul<i style="font-size: 11px"></i></th>
                    <th style="width: 6.25%; background: #A3C1AD!important;">Aug<i style="font-size: 11px"></i></th>
                    <th style="width: 6.25%; background: #A3C1AD!important;">Sep<i style="font-size: 11px"></i></th>
                    <th style="width: 6.25%; background: #A3C1AD!important;">Oct<i style="font-size: 11px"></i></th>
                    <th style="width: 6.25%; background: #A3C1AD!important;">Nov<i style="font-size: 11px"></i></th>
                    <th style="width: 6.25%; background: #A3C1AD!important;">Dec<i style="font-size: 11px"></i></th>
                </tr>

                
                <tbody>  @php $i=1; @endphp
                @if($rig_disposition_year)
                    @foreach($rig_disposition_year as $rig_disposition_years)
                        <tr>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$rig_disposition_years?$rig_disposition_years->terrain->terrain_name:''}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$rig_disposition_years->january}}    @php $jan_rig += $rig_disposition_years->january; @endphp </th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$rig_disposition_years->febuary}}    @php $feb_rig += $rig_disposition_years->febuary; @endphp</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$rig_disposition_years->march}}      @php $mar_rig += $rig_disposition_years->march; @endphp</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$rig_disposition_years->april}}      @php $apr_rig += $rig_disposition_years->april; @endphp</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$rig_disposition_years->may}}        @php $may_rig += $rig_disposition_years->may; @endphp</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$rig_disposition_years->june}}       @php $jun_rig += $rig_disposition_years->june; @endphp</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$rig_disposition_years->july}}       @php $jul_rig += $rig_disposition_years->july; @endphp</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$rig_disposition_years->august}}     @php $aug_rig += $rig_disposition_years->august; @endphp</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$rig_disposition_years->september}}  @php $sep_rig += $rig_disposition_years->september; @endphp</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$rig_disposition_years->october}}    @php $oct_rig += $rig_disposition_years->october; @endphp</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$rig_disposition_years->november}}   @php $nov_rig += $rig_disposition_years->november; @endphp</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$rig_disposition_years->december}}   @php $dec_rig += $rig_disposition_years->december; @endphp</th>
                        </tr>  @php $i++; @endphp
                    @endforeach
                @endif
                <tr>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"> Total</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$jan_rig}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$feb_rig}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$mar_rig}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$apr_rig}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$may_rig}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$jun_rig}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$jul_rig}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$aug_rig}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$sep_rig}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$oct_rig}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$nov_rig}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{$dec_rig}}</b></th>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_25"> 
            @if($controllerName->bottomRemarks(25, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(25, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(25, $yrs)) {!! $controllerName->bottomRemarksTemp(25, $yrs)->remark !!}
            @endif 
        </div>

    </div>  </div>



    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 26) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>26,'yrs'=>$yrs, 'remark'=>' Active Rigs by Terrain'])

        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;">Year</th>
                    <th style="background: #A3C1AD!important;">Land / Swamp</th>
                    <th style="background: #A3C1AD!important;">Shallow Offshore</th>
                    <th style="background: #A3C1AD!important;">Deep Offshore</th>
                    <th style="background: #A3C1AD!important;"><b class="bfont-size">Total</b></th>
                </tr>
                
                <tbody> 
                    @php $i=1; @endphp
                    @forelse($price_legend as $year)
                    @php 
                        $rig_1 = ($controllerName->yearlyRig($year, 1));    $rig_2 = ($controllerName->yearlyRig($year, 2));
                        $rig_3 = ($controllerName->yearlyRig($year, 3));    $rig_4 = ($controllerName->yearlyRig($year, 4));
                        $TOTAL = ($rig_1 + $rig_4 + $rig_2 + $rig_3);
                    @endphp
                    @if($TOTAL != 0)
                        <tr>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$year}} </th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{($rig_1) + ($rig_4)}}</th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$rig_2}} </th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$rig_3}} </th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                <b class="bfont-size"> {{$TOTAL}} </b>
                            </th>
                        </tr>  @php $i++; @endphp
                    @endif
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_26"> 
            @if($controllerName->bottomRemarks(26, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(26, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(26, $yrs)) {!! $controllerName->bottomRemarksTemp(26, $yrs)->remark !!}
            @endif 
        </div>

    </div>  </div>



    {{-- PRINT PAGE BREAK --}}    
    <p style="margin-bottom: 535px !important"></p>

    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 27) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>27,'yrs'=>$yrs, 'remark'=>' Field Summary'])

        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;">#</th>
                    <th style="background: #A3C1AD!important;">Company</th>
                    <th style="background: #A3C1AD!important;">Contract Type</th>
                    <th style="background: #A3C1AD!important;">Producing Field</th>
                    <th style="background: #A3C1AD!important;">Number of Well Name</th>
                    <th style="background: #A3C1AD!important;">Number of String Name</th>
                </tr>
                
                <tbody> @php $i=1; @endphp
                @forelse($field_summaries as $field_summary)
                    <tr>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$i}}</th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$field_summary->company?$field_summary->company->company_name:'N/A'}}</th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$field_summary->contract?$field_summary->contract->contract_name:'N/A'}}</th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$field_summary->producing_field}}</th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$field_summary->well}}</th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$field_summary->string}}</th>
                    </tr> @php $i++; @endphp
                @empty
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_27"> 
            @if($controllerName->bottomRemarks(27, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(27, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(27, $yrs)) {!! $controllerName->bottomRemarksTemp(27, $yrs)->remark !!}
            @endif  
        </div>

    </div>  </div>



    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 28) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>28,'yrs'=>$yrs, 'remark'=>' Provisional Crude Production'])

        <div class=" table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;">#</th>
                    <th style="background: #A3C1AD!important;">Company</th>
                    {{-- <th style="background: #A3C1AD!important;">Field</th> --}}
                    <th style="background: #A3C1AD!important;">Contract</th>
                    <th style="background: #A3C1AD!important;">Terrain</th>
                    <th style="background: #A3C1AD!important;">Annual Prod (Bbls)</th>
                    <th style="background: #A3C1AD!important;">Daily Ave (Bopd)</th>
                    <th style="background: #A3C1AD!important; text-align: right">% Prod</th>
                </tr>

                <tbody>
                  @php $prov_companies = $controllerName->provCrudeProdByCompany($yrs);  @endphp
                    @php 
                        $total_perc_prod = '0';   $i=1;   $comp_prod_arr[] = '';
                        $tot_crude_prod = $controllerName->provisionalCrudeProd($yrs, 'company_total');
                        $tot_ave_prod = $controllerName->provisionalCrudeProd($yrs, 'average_production');
                        if($tot_crude_prod == 0) { $tot_prod = 1; }else{ $tot_prod = $tot_crude_prod; }
                        if($tot_ave_prod == 0) { $tot_ave = 1; }else{ $tot_ave = $tot_crude_prod; }
                    @endphp
                    @forelse($prov_companies as $k => $company)
                            <tr> 
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$i}}</th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$company->company?$company->company->company_name:''}}</th>
                                {{-- <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$company->field?$company->field->field_name:''}}</th> --}}
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @forelse($controllerName->crudeProdContract($yrs, $company->company_id) as $contract)
                                    {{ $contract->contract?$contract->contract->contract_name:'' }} @empty @endforelse
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{ $controllerName->crudeProdTerrain($yrs, $company->company_id)}}</th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php $comp_prod_arr[$k] = $c_tot = $controllerName->crudeProdTotal($yrs, $company->company_id, 'company_total'); @endphp  {{number_format($c_tot, 2)}} 
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php $a_prod = $controllerName->crudeProdTotal($yrs, $company->company_id, 'average_production'); @endphp     {{number_format($a_prod, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important; text-align: right" @endif style="text-align: right">{{number_format( (($c_tot * 100) / $tot_prod), 2)}}</th>
                            </tr>
                        @php $total_perc_prod += (($c_tot * '100') / $tot_prod);   $i++; @endphp
                    @empty
                    @endforelse
                <tr>
                    <th class="th_h" colspan="4" style="text-align: left; background: #A3C1AD!important;"><b class="bfont-size">Total</b></th>
                    <th class="th_h" style="text-align: left; background: #A3C1AD!important;"><b class="bfont-size">
                    {{number_format($tot_prod, 2)}}</b></th>
                    <th class="th_h" style="text-align: left; background: #A3C1AD!important;"><b class="bfont-size">
                    {{number_format(($tot_prod / $yr), 2)}}</b></th>
                    <th class="th_h" style="text-align: right; background: #A3C1AD!important;"><b class="bfont-size">
                    {{number_format($total_perc_prod, 1)}}%</b></th>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_28"> 
            @if($controllerName->bottomRemarks(28, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(28, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(28, $yrs)) {!! $controllerName->bottomRemarksTemp(28, $yrs)->remark !!}
            @endif 
        </div>




          
        <p style="margin-bottom: 50px !important"></p>

        <div class="row">
            <div class="col-md-8">
                <div class="frame" style=""><canvas id="oilCondProdByCompanyBarChart"></canvas></div>

                <div class="fig1_28 figure"> 
                    @if($controllerName->getFigure(28, $yrs)) Figure {!! $controllerName->getFigure(28, $yrs)->figure_no_1 !!} : 
                            {{$yrs}} {!! $controllerName->getFigure(28, $yrs)->figure_title_1 !!} 
                    @elseif($controllerName->getFigure(28, $yrs-1)) Figure {!! $controllerName->getFigure(28, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(28, $yrs-1)->figure_title_1 !!} 
                    @endif
                </div>
            </div>
        </div>

    </div>  </div>



    <p class="no-print" style="color: #fff">
        @php 
            // for ($i=0; $i < 12; $i++)
            // {
            //     $monthlyProvChart[$i] = $controllerName->getAveDailyProduction($yrs, $nov);
            // }
            $ja_tot = $controllerName->provisionalCrudeProd($yrs, 'january');
            $ja = $controllerName->getAveDailyProduction($yrs, $ja_tot); 
            $fe_tot = $controllerName->provisionalCrudeProd($yrs, 'febuary');
            $fe = $controllerName->getAveDailyProduction($yrs, $fe_tot);
            $mr_tot = $controllerName->provisionalCrudeProd($yrs, 'march'); 
            $mr = $controllerName->getAveDailyProduction($yrs, $mr_tot);
            $ap_tot = $controllerName->provisionalCrudeProd($yrs, 'april');
            $ap = $controllerName->getAveDailyProduction($yrs, $ap_tot);
            $ma_tot = $controllerName->provisionalCrudeProd($yrs, 'may');
            $ma = $controllerName->getAveDailyProduction($yrs, $ma_tot);
            $ju_tot = $controllerName->provisionalCrudeProd($yrs, 'june');
            $ju = $controllerName->getAveDailyProduction($yrs, $ju_tot);
            $jl_tot = $controllerName->provisionalCrudeProd($yrs, 'july');
            $jl = $controllerName->getAveDailyProduction($yrs, $jl_tot);
            $au_tot = $controllerName->provisionalCrudeProd($yrs, 'august');
            $au = $controllerName->getAveDailyProduction($yrs, $au_tot);
            $se_tot = $controllerName->provisionalCrudeProd($yrs, 'september');
            $se = $controllerName->getAveDailyProduction($yrs, $se_tot);
            $oc_tot = $controllerName->provisionalCrudeProd($yrs, 'october');
            $oc = $controllerName->getAveDailyProduction($yrs, $oc_tot);
            $no_tot = $controllerName->provisionalCrudeProd($yrs, 'november');
            $no = $controllerName->getAveDailyProduction($yrs, $no_tot);
            $de_tot = $controllerName->provisionalCrudeProd($yrs, 'december');
            $de = $controllerName->getAveDailyProduction($yrs, $de_tot);
            $i = 1;
        @endphp
    </p>

    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 29) == 0) display: none; @endif">
        @include('publication.partials.tablehead',['t_id'=>29,'yrs'=>$yrs, 'remark'=>' Monthly Production'])

        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;">Month</th>
                    <th style="background: #A3C1AD!important;">Production (Bbls)</th>
                    <th style="background: #A3C1AD!important; text-align: right">Average Daily Production (Bopd)</th>
                </tr>
                    {{-- SETTING UP VALUE FOR MONTHLY PRODUCTION (PROVISIONAL) --}}                                
                
                <tbody>
                <tr>
                    <th class="th_h">January</th>
                    <th class="th_h">{{number_format($ja_tot, 2)}}</th>
                    <th class="th_h" style="text-align: right;">
                        @php $Jan = ($ja_tot / cal_days_in_month(CAL_GREGORIAN, 1, $yrs)); @endphp {{number_format($Jan, 2)}}
                    </th>
                </tr>
                <tr>
                    <th class="th_h" style="background: #ACE1AF!important;">Febuary</th>
                    <th class="th_h" style="background: #ACE1AF!important;">{{number_format($fe_tot, 2)}}</th>
                    <th class="th_h" style="background: #ACE1AF!important; text-align: right;">
                        @php $Feb = ($fe_tot / cal_days_in_month(CAL_GREGORIAN, 2, $yrs)); @endphp {{number_format($Feb, 2)}}
                    </th>
                </tr>
                <tr>
                    <th class="th_h">March</th>
                    <th class="th_h">{{number_format($mr_tot, 2)}}</th>
                    <th class="th_h" style="text-align: right;">
                        @php $Mar = ($mr_tot / cal_days_in_month(CAL_GREGORIAN, 3, $yrs)); @endphp {{number_format($Mar, 2)}}
                    </th>
                </tr>
                <tr>
                    <th class="th_h" style="background: #ACE1AF!important;">April</th>
                    <th class="th_h" style="background: #ACE1AF!important;">{{number_format($ap_tot, 2)}}</th>
                    <th class="th_h" style="background: #ACE1AF!important; text-align: right;">
                        @php $Apr = ($ap_tot / cal_days_in_month(CAL_GREGORIAN, 4, $yrs)); @endphp {{number_format($Apr, 2)}}
                    </th>
                </tr>
                <tr>
                    <th class="th_h">May</th>
                    <th class="th_h">{{number_format($ma_tot, 2)}}</th>
                    <th class="th_h" style="text-align: right;">
                        @php $May = ($ma_tot / cal_days_in_month(CAL_GREGORIAN, 5, $yrs)); @endphp {{number_format($May, 2)}}
                    </th>
                </tr>
                <tr>
                    <th class="th_h" style="background: #ACE1AF!important;">June</th>
                    <th class="th_h" style="background: #ACE1AF!important;">{{number_format($ju_tot, 2)}}</th>
                    <th class="th_h" style="background: #ACE1AF!important; text-align: right;">
                        @php $Jun = ($ju_tot / cal_days_in_month(CAL_GREGORIAN, 6, $yrs)); @endphp {{number_format($Jun, 2)}}
                    </th>
                </tr>
                <tr>
                    <th class="th_h">July</th>
                    <th class="th_h">{{number_format($jl_tot, 2)}}</th>
                    <th class="th_h" style="text-align: right;">
                        @php $Jul = ($jl_tot / cal_days_in_month(CAL_GREGORIAN, 7, $yrs)); @endphp {{number_format($Jul, 2)}}
                    </th>
                </tr>
                <tr>
                    <th class="th_h" style="background: #ACE1AF!important;">August</th>
                    <th class="th_h" style="background: #ACE1AF!important;">{{number_format($au_tot, 2)}}</th>
                    <th class="th_h" style="background: #ACE1AF!important; text-align: right;">
                        @php $Aug = ($au_tot / cal_days_in_month(CAL_GREGORIAN, 8, $yrs)); @endphp {{number_format($Aug, 2)}}
                    </th>
                </tr>
                <tr>
                    <th class="th_h">September</th>
                    <th class="th_h">{{number_format($se_tot, 2)}}</th>
                    <th class="th_h" style="text-align: right;">
                        @php $Sep = ($se_tot / cal_days_in_month(CAL_GREGORIAN, 9, $yrs)); @endphp {{number_format($Sep, 2)}}
                    </th>
                </tr>
                <tr>
                    <th class="th_h" style="background: #ACE1AF!important;">October</th>
                    <th class="th_h" style="background: #ACE1AF!important;">{{number_format($oc_tot, 2)}}</th>
                    <th class="th_h" style="background: #ACE1AF!important; text-align: right;">
                        @php $Oct = ($oc_tot / cal_days_in_month(CAL_GREGORIAN, 10, $yrs)); @endphp {{number_format($Oct, 2)}}
                    </th>
                </tr>
                <tr>
                    <th class="th_h">November</th>
                    <th class="th_h">{{number_format($no_tot, 2)}}</th>
                    <th class="th_h" style="text-align: right;">
                        @php $Nov = ($no_tot / cal_days_in_month(CAL_GREGORIAN, 11, $yrs)); @endphp {{number_format($Nov, 2)}}
                    </th>
                </tr>
                <tr>
                    <th class="th_h" style="background: #ACE1AF!important;">December</th>
                    <th class="th_h" style="background: #ACE1AF!important;">{{number_format($de_tot, 2)}}</th>
                    <th class="th_h" style="background: #ACE1AF!important; text-align: right;">
                        @php $Dec = ($de_tot / cal_days_in_month(CAL_GREGORIAN, 12, $yrs)); @endphp {{number_format($Dec, 2)}}
                    </th>
                </tr>
                <tr>
                    <th class="th_h" style="font-weight: bolder; text-align: left; background: #A3C1AD!important">Total Annual Production
                        (Bbls)
                    </th>
                    <th class="th_h" colspan="2"
                        style="text-align: right; font-weight: bolder; text-align: left; background: #A3C1AD!important">
                        {{number_format($ja_tot + $fe_tot + $mr_tot + $ap_tot + $ma_tot + $ju_tot + 
                                        $jl_tot + $au_tot + $se_tot + $oc_tot + $no_tot + $de_tot, 2)}}
                    </th>
                </tr>
                <tr>
                    <th class="th_h" style="font-weight: bolder; background: #A3C1AD!important">Average Annual Daily Production (bopd)</th>
                    <th class="th_h" colspan="2"
                        style="text-align: right; font-weight: bolder; text-align: right; background: #A3C1AD!important">
                        {{number_format($controllerName->provisionalCrudeProd($yrs, 'average_production'), 0)}}
                    </th>
                </tr>
                @php                                
                    $noOfDays = $controllerName->getTheNumberOfDaysInAYear($yrs);
                    $monthlyProvChart = 
                    [
                        'January' => $Jan, 
                        'February' => $Feb, 
                        'March' => $Mar, 
                        'April' => $Apr, 
                        'May' => $May, 
                        'June' => $Jun, 
                        'July' => $Jul, 
                        'August' => $Aug, 
                        'September' => $Sep, 
                        'October' => $Oct, 
                        'November' => $Nov, 
                        'December' => $Dec
                    ];  //dd($monthlyProvChart);
                @endphp
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_29"> 
            @if($controllerName->bottomRemarks(29, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(29, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(29, $yrs)) {!! $controllerName->bottomRemarksTemp(29, $yrs)->remark !!}
            @endif 
        </div>


        <div class="row">
            <div class="col-md-8 col-md-offset-2 chart-pad">
                <div class="frame" style=""><canvas id="monthlyProductionBarChart"></canvas></div>

                <div class="fig1_29 figure">
                    @if($controllerName->getFigure(29, $yrs)) Figure {!! $controllerName->getFigure(29, $yrs)->figure_no_1 !!} : 
                           {{$yrs}} {!! $controllerName->getFigure(29, $yrs)->figure_title_1 !!} 
                    @elseif($controllerName->getFigure(29, $yrs-1)) Figure {!! $controllerName->getFigure(29, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(29, $yrs-1)->figure_title_1 !!} 
                    @endif
                </div>
            </div>
        </div>

    </div>  </div>



    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 30) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>30,'yrs'=>$yrs, 'remark'=>' Production by Contract'])

        @if($controllerName->provisionalCrudeProd($yrs, 'company_total'))
        <div class=" table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;" style="background: #A3C1AD!important;">Contract Type</th>
                    <th style="background: #A3C1AD!important;" style="background: #A3C1AD!important;">Production, Bbls</th>
                    <th style="background: #A3C1AD!important;" style="background: #A3C1AD!important;">Average Production, Bopd</th>
                    <th style="background: #A3C1AD!important;" style="background: #A3C1AD!important;">Production Percentage, %</th>
                </tr>
                
                <tbody>
                <tr>
                    <th class="th_h"> Joint Venture, JV</th>
                    <th class="th_h">{{number_format($controllerName->crudeProdByContract($yrs, 4, 'company_total'), 2)}}</th>
                    <th class="th_h">{{number_format($controllerName->crudeProdByContract($yrs, 4, 'average_production'), 2)}}</th>
                    <th class="th_h">
                        @php
                            $tot_cont_prod_jv = $controllerName->crudeProdByContract($yrs, '4', 'company_total');
                            $tot_cont_prod_psc = $controllerName->crudeProdByContract($yrs, '5', 'company_total');
                            $tot_cont_prod_sr = $controllerName->crudeProdByContract($yrs, '2', 'company_total');
                            $tot_cont_prod_mf = $controllerName->crudeProdByContract($yrs, '3', 'company_total');
                            $tot_cont_prod_sc = $controllerName->crudeProdByContract($yrs, '1', 'company_total');
                            $total_contprod = $tot_cont_prod_jv + $tot_cont_prod_psc + $tot_cont_prod_sr + $tot_cont_prod_mf + $tot_cont_prod_sc;
                            if($total_contprod == 0){ $total_contprod = 1; }
                            $JVarr = number_format(($tot_cont_prod_jv * 100) / $total_contprod );
                            $PSCarr = number_format(($tot_cont_prod_psc * 100) / $total_contprod );
                            $SRarr = number_format(($tot_cont_prod_sr * 100) / $total_contprod );
                            $MFarr = number_format(($tot_cont_prod_mf * 100) / $total_contprod );
                            $SCarr = number_format(($tot_cont_prod_sc * 100) / $total_contprod );
                        @endphp
                        {{ $JVarr}} %
                </tr>
                <tr>
                    <th class="th_h" style="background: #ACE1AF!important;"> Production Sharing Contract, PSC</th>
                    <th class="th_h" style="background: #ACE1AF!important;">{{number_format($controllerName->crudeProdByContract($yrs, 5, 'company_total'), 2)}}</th>
                    <th class="th_h" style="background: #ACE1AF!important;">{{number_format($controllerName->crudeProdByContract($yrs, 5, 'average_production'), 2)}}</th>
                    <th class="th_h" style="background: #ACE1AF!important;">  
                        {{ $PSCarr}} %
                    </th>
                </tr>
                <tr>
                    <th class="th_h"> Sole Risk, SR</th>
                    <th class="th_h">{{number_format($controllerName->crudeProdByContract($yrs, 2, 'company_total'), 2)}}</th>
                    <th class="th_h">{{number_format($controllerName->crudeProdByContract($yrs, 2, 'average_production'), 2)}}</th>
                    <th class="th_h">
                        {{ $SRarr}} %
                    </th>
                </tr> {{--  MARGINAL FIELD SWAPPED WITH SERVICE CONTRACT --}}
                {{-- <tr>
                    <th class="th_h" style="background: #ACE1AF!important;"> Service Contract</th>
                    <th class="th_h" style="background: #ACE1AF!important;">{{number_format($controllerName->crudeProdByContract($yrs, 3, 'company_total'), 2)}}</th>
                    <th class="th_h" style="background: #ACE1AF!important;">{{number_format($controllerName->crudeProdByContract($yrs, 3, 'average_production'), 2)}}</th>
                    <th class="th_h" style="background: #ACE1AF!important;"> 
                        {{ $MFarr}} %
                    </th>
                </tr> --}}
                <tr> {{--  MARGINAL FIELD SWAPPED WITH SERVICE CONTRACT --}}
                    <th class="th_h" style="background: #ACE1AF!important;"> Marginal Field Operators, MF</th>
                    <th class="th_h" style="background: #ACE1AF!important;">{{number_format($controllerName->crudeProdByContract($yrs, 3, 'company_total'), 2)}}</th>
                    <th class="th_h" style="background: #ACE1AF!important;">{{number_format($controllerName->crudeProdByContract($yrs, 3, 'average_production'), 2)}}</th>
                    <th class="th_h" style="background: #ACE1AF!important;"> 
                        {{ $SCarr}} %
                    </th>
                </tr>
                </tbody>
            </table>
        </div>

        @php
            $jv_array = number_format(($tot_cont_prod_jv * 100) / $controllerName->provisionalCrudeProd($yrs, 'company_total'));   
            $psc_array = number_format(($tot_cont_prod_psc * 100) / $controllerName->provisionalCrudeProd($yrs, 'company_total'));                        
            $sr_array = number_format(($tot_cont_prod_sr * 100) / $controllerName->provisionalCrudeProd($yrs, 'company_total'));   
            $mf_array = number_format(($tot_cont_prod_mf * 100) / $controllerName->provisionalCrudeProd($yrs, 'company_total'));
            $sc_array = number_format(($tot_cont_prod_sc * 100) / $controllerName->provisionalCrudeProd($yrs, 'company_total'));

            $contract_array = ['jv_array' => $jv_array, 'psc_array' => $psc_array, 'sr_array' => $sr_array, 'mf_array' => $mf_array, 'sc_array' => $sc_array];
            $jv_arr = ['jv_array' => $JVarr];        $psc_arr = ['psc_array' => $PSCarr];   $sr_arr = ['sr_array' => $SRarr];
            $mf_arr = ['mf_array' => $MFarr];        $sc_arr = ['sc_array' => $SCarr];

            $perc_array=  array_merge($jv_arr, $sc_arr, $psc_arr, $sr_arr, $mf_arr);
            $perc_prod = ['jv' => 'JV', 'mf' => 'MF', 'psc' => 'PSC', 'sr' => 'SR', 'sc' => 'SC']; 
            // MARGINAL FIELD SWAPPED WITH SERVICE CONTRACT

            //$perc_prod = ['legends' => 'Percentage Distribution By Contract'];
        @endphp
        @endif

        <div class="row col-md-12 remark-div" id="bottomTab_30"> 
            @if($controllerName->bottomRemarks(30, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(30, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(30, $yrs)) {!! $controllerName->bottomRemarksTemp(30, $yrs)->remark !!}
            @endif 
        </div>

         <p class="page-break"></p>
         
        <div class="row page-break">

            <div class="col-md-2 chart-pad"> </div>
            <div class="col-md-8 chart-pad">
                <div class="frame" style="">
                    <canvas id="percProdPieChart"></canvas>
                </div>
                
                <div class="fig1_30 figure">
                    @if($controllerName->getFigure(30, $yrs)) Figure {!! $controllerName->getFigure(30, $yrs)->figure_no_1 !!} : 
                           {!! $controllerName->getFigure(30, $yrs)->figure_title_1 !!} 
                    @elseif($controllerName->getFigure(30, $yrs-1)) Figure {!! $controllerName->getFigure(30, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(30, $yrs-1)->figure_title_1 !!} 
                    @endif
                </div>
            </div>
            <div class="col-md-2 chart-pad"> </div>
        </div>

    </div>  </div>




    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 31) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>31,'yrs'=>$yrs, 'remark'=>' Summary of Production Deferments'])

        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th colspan="3" style="background: #A3C1AD!important; text-align: center;">Deferments</th>
                </tr>
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;">Month</th>
                    <th style="background: #A3C1AD!important;">Cumulative Production (Bbls)</th>
                    <th style="background: #A3C1AD!important;">Daily Production (Bopd)</th>
                </tr>

                
                <tbody> @php $ave_tot = 0; $i=1; @endphp
                @forelse($month_arr as $month)
                    <tr>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$month}}</th>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($controllerName->defermentMonthly($yrs, $month, 'value'), 0)}}</th>
                        <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $av = $controllerName->defermentMonthly($yrs, $month, 'average_daily_production'); @endphp
                            {{number_format($controllerName->defermentMonthly($yrs, $month, 'average_daily_production'), 2)}}</th>
                        @php $ave_tot += $av;  $i++; @endphp
                    </tr>
                @empty
                @endforelse
                <tr>
                    <th style="background: #A3C1AD!important;"><b class="bfont-size">Total Deferment (BBLS)</b></th>
                    <th style="background: #A3C1AD!important;"><b class="bfont-size"></b></th>
                    <th style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($ave_tot, 2)}}</b></th>
                </tr>
                <tr>
                    <th style="background: #A3C1AD!important;"><b class="bfont-size">Average Daily Deferment (BOPD)</b></th>
                    <th style="background: #A3C1AD!important;"><b class="bfont-size"></b></th>
                    <th style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($ave_tot / 12, 2)}}</b></th>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_31"> 
            @if($controllerName->bottomRemarks(31, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(31, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(31, $yrs)) {!! $controllerName->bottomRemarksTemp(31, $yrs)->remark !!}
            @endif
        </div>

    </div>  </div>
    <br><br><br>

    {{-- CHART --}}
    <br>



    <!-- TEN YEAR CRUDE RECONCILED CRUDE PRODUCTION -->



    <!-- TEN YEAR CRUDE RECONCILED CRUDE PRODUCTION -->




    @php
        $t_stream_prod_crude_7 = $controllerName->reconcileProd($yrs - 0, '1');
        $tot_ = '0'; $jan_ = '0'; $feb_ = '0'; $mar_ = '0'; $apr_ = '0'; $may_ = '0';$jun_ = '0';
        $jul_ = '0'; $aug_ = '0'; $sep_ = '0'; $oct_= '0'; $nov_ = '0'; $dec_ = '0';
        $tot = '0'; $jan = '0'; $feb = '0'; $mar = '0'; $apr = '0'; $may = '0';$jun = '0';
        $jul = '0'; $aug = '0'; $sep = '0'; $oct = '0'; $nov = '0'; $dec = '0';
    @endphp


    {{-- PRINT PAGE BREAK --}}
    <p class="page-break"></p>

    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 32) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>32,'yrs'=>$yrs, 'remark'=>' Stabilized Crude / Condensates Volumes by Streams (All Units in Barrels)'])
        @if(count($t_stream_prod_crude_7)>0)

            <div class="col-md-12">
                <table class="table table-condensed table-sm mb-1" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head-sm">
                        <th class="f-11" style="background: #A3C1AD!important;">Stream</th>
                        <th class="f-11" style="background: #A3C1AD!important;">January</th>
                        <th class="f-11" style="background: #A3C1AD!important;">February</th>
                        <th class="f-11" style="background: #A3C1AD!important;">March</th>
                        <th class="f-11" style="background: #A3C1AD!important;">April</th> 
                        <th class="f-11" style="background: #A3C1AD!important;">May</th>
                        <th class="f-11" style="background: #A3C1AD!important;">June</th>
                        <th class="f-11" style="background: #A3C1AD!important;">July</th>
                        <th class="f-11" style="background: #A3C1AD!important;">August</th>
                        <th class="f-11" style="background: #A3C1AD!important;">September</th>
                        <th class="f-11" style="background: #A3C1AD!important;">October</th>
                        <th class="f-11" style="background: #A3C1AD!important;">November</th>
                        <th class="f-11" style="background: #A3C1AD!important;">December</th>
                        <th class="f-11" style="background: #A3C1AD!important;">Total</th>
                    </tr>
                    <tr class="">
                        <th colspan="14" style="text-align: center; background: #A3C1AD !important;"><b class="bfont-size-sm">Crude Oil</b></th>
                    </tr>

                    
                    <tbody>  @php $i=1; @endphp
                        @forelse($crude_EX_oil as $k => $stream) 
                            <tr>
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$stream->stream?$stream->stream->stream_name:''}} 
                                </th>   
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                @php 
                                    $jan += $jan_ = $controllerName->reconcileTotalByCompany($yrs, 'january', $stream->stream_id, 1); 
                                @endphp    {{number_format($jan_, 2)}}
                                </th> 
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                @php 
                                    $feb += $feb_ = $controllerName->reconcileTotalByCompany($yrs, 'febuary', $stream->stream_id, 1); 
                                @endphp    {{number_format($feb_, 2)}}
                                </th>   
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                @php 
                                    $mar += $mar_ = $controllerName->reconcileTotalByCompany($yrs, 'march', $stream->stream_id, 1); 
                                @endphp    {{number_format($mar_, 2)}}
                                </th> 
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                @php 
                                    $apr += $apr_ = $controllerName->reconcileTotalByCompany($yrs, 'april', $stream->stream_id, 1); 
                                @endphp    {{number_format($apr_, 2)}}
                                </th> 
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                @php 
                                    $may += $may_ = $controllerName->reconcileTotalByCompany($yrs, 'may', $stream->stream_id, 1); 
                                @endphp    {{number_format($may_, 2)}}
                                </th> 
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                @php 
                                    $jun += $jun_ = $controllerName->reconcileTotalByCompany($yrs, 'june', $stream->stream_id, 1); 
                                @endphp    {{number_format($jun_, 2)}}
                                </th> 
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                @php 
                                    $jul += $jul_ = $controllerName->reconcileTotalByCompany($yrs, 'july', $stream->stream_id, 1); 
                                @endphp    {{number_format($jul_, 2)}}
                                </th> 
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                @php 
                                    $aug += $aug_ = $controllerName->reconcileTotalByCompany($yrs, 'august', $stream->stream_id, 1); 
                                @endphp    {{number_format($aug_, 2)}}
                                </th> 
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                @php 
                                    $sep += $sep_ = $controllerName->reconcileTotalByCompany($yrs, 'september', $stream->stream_id, 1); 
                                @endphp    {{number_format($sep_, 2)}}
                                </th> 
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                @php 
                                    $oct += $oct_ = $controllerName->reconcileTotalByCompany($yrs, 'october', $stream->stream_id, 1); 
                                @endphp    {{number_format($oct_, 2)}}
                                </th> 
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                @php 
                                    $nov += $nov_ = $controllerName->reconcileTotalByCompany($yrs, 'november', $stream->stream_id, 1); 
                                @endphp    {{number_format($nov_, 2)}}
                                </th> 
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                @php 
                                    $dec += $dec_ = $controllerName->reconcileTotalByCompany($yrs, 'december', $stream->stream_id, 1); 
                                @endphp    {{number_format($dec_, 2)}}
                                </th> 
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                @php 
                                    $tot += $tot_ = $controllerName->reconcileTotalByCompany($yrs, 'stream_total', $stream->stream_id, 1); 
                                @endphp    {{number_format($tot_, 2)}}
                                </th> 
                            </tr>  @php $i++; @endphp
                        @empty
                        @endforelse 

                        


                    <tr style="background: #A3C1AD">
                        <th class=" bold-label" style="background: #A3C1AD!important;"><b class="f-11"> Sub-Total</b></th>
                        <th class=" bold-label" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jan, 2)}}  @php $oil_jan_7 = $jan;  @endphp </b></th>
                        <th class=" bold-label" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($feb, 2)}}  @php $oil_feb_7 = $feb;  @endphp </b></th>
                        <th class=" bold-label" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($mar, 2)}}  @php $oil_mar_7 = $mar;  @endphp </b></th>
                        <th class=" bold-label" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($apr, 2)}}  @php $oil_apr_7 = $apr;  @endphp </b></th>
                        <th class=" bold-label" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($may, 2)}}  @php $oil_may_7 = $may;  @endphp </b></th>
                        <th class=" bold-label" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jun, 2)}}  @php $oil_jun_7 = $jun;  @endphp </b></th>
                        <th class=" bold-label" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jul, 2)}}  @php $oil_jul_7 = $jul;  @endphp </b></th>
                        <th class=" bold-label" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($aug, 2)}}  @php $oil_aug_7 = $aug;  @endphp </b></th>
                        <th class=" bold-label" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($sep, 2)}}  @php $oil_sep_7 = $sep;  @endphp </b></th>
                        <th class=" bold-label" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($oct, 2)}}  @php $oil_oct_7 = $oct;  @endphp </b></th>
                        <th class=" bold-label" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($nov, 2)}}  @php $oil_nov_7 = $nov;  @endphp </b></th>
                        <th class=" bold-label" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($dec, 2)}}  @php $oil_dec_7 = $dec;  @endphp </b></th>
                        <th class=" bold-label" style="background: #A3C1AD!important;" style="bacf-111AD"><b class="f-11">{{number_format($tot, 2)}}</b></th>
                    </tr>

                    <tr style="background: #A3C1AD">
                        <th class=" bold-label f-11" style="background: #A3C1AD!important"><b class="f-11"> Daily-Average</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jan/31, 2)}}  @php $oil_ave_jan_7 = ($jan/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format(($feb / cal_days_in_month(CAL_GREGORIAN, 2, $yrs)), 2)}}  
                        @php $oil_ave_feb_7 = ($feb / cal_days_in_month(CAL_GREGORIAN, 2, $yrs));  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($mar/31, 2)}}  @php $oil_ave_mar_7 = ($mar/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($apr/30, 2)}}  @php $oil_ave_apr_7 = ($apr/'30');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($may/31, 2)}}  @php $oil_ave_may_7 = ($may/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jun/30, 2)}}  @php $oil_ave_jun_7 = ($jun/'30');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jul/31, 2)}}  @php $oil_ave_jul_7 = ($jul/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($aug/31, 2)}}  @php $oil_ave_aug_7 = ($aug/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($sep/30, 2)}}  @php $oil_ave_sep_7 = ($sep/'30');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($oct/31, 2)}}  @php $oil_ave_oct_7 = ($oct/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($nov/30, 2)}}  @php $oil_ave_nov_7 = ($nov/'30');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($dec/31, 2)}}  @php $oil_ave_dec_7 = ($dec/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($tot/365, 2)}}</b></th>
                        @php
                            $noOfDays = $controllerName->getTheNumberOfDaysInAYear($yrs); 
                            $oil_tot_7 = $tot;    $oil_ave_tot_7 = ($tot / $noOfDays); 
                        @endphp
                    </tr>
                    </tbody>
                    <tr class="">
                        <th colspan="14" style="background: #A3C1AD!important; text-align: center;"><b class="f-11">Condensates</b></th>
                    </tr>
                    <tr class="">
                        <th colspan="14" style="background: #A3C1AD!important; text-align: center;"><b class="f-11">Field Condensates</b></th>
                    </tr>

                    
                    <tbody> @php $t_stream_prod_cond = $controllerName->reconcileProd($yrs, '2'); @endphp
                    @php $tot = '0'; $jan = '0'; $feb = '0'; $mar = '0'; $apr = '0'; $may = '0'; $jun = '0'; $jul = '0'; $aug = '0'; $sep = '0'; $oct = '0'; $nov = '0'; $dec = '0'; $i=1; @endphp
                    @if($t_stream_prod_cond)
                        @foreach($t_stream_prod_cond as $t_stream_prod_conds)
                            <tr>
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @if($t_stream_prod_conds->stream) {{$t_stream_prod_conds->stream->stream_name}} @endif </th>
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->january, 2)}}</th> @php $jan += $t_stream_prod_conds->january; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->febuary, 2)}}</th> @php $feb += $t_stream_prod_conds->febuary; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->march, 2)}}</th> @php $mar += $t_stream_prod_conds->march; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->april, 2)}}</th> @php $apr += $t_stream_prod_conds->april; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->may, 2)}}</th> @php $may += $t_stream_prod_conds->may; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->june, 2)}}</th> @php $jun += $t_stream_prod_conds->june; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->july, 2)}}</th> @php $jul += $t_stream_prod_conds->july; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->august, 2)}}</th> @php $aug += $t_stream_prod_conds->august; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->september, 2)}}</th> @php $sep += $t_stream_prod_conds->september; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->october, 2)}}</th> @php $oct += $t_stream_prod_conds->october; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->november, 2)}}</th> @php $nov += $t_stream_prod_conds->november; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->december, 2)}}</th> @php $dec += $t_stream_prod_conds->december; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->stream_total, 2)}}</th> @php $tot += $t_stream_prod_conds->stream_total;  $i++; @endphp
                            </tr>
                        @endforeach
                    @endif

                    <tr style="background: #A3C1AD">
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11"> Sub-Total</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jan, 2)}}  @php $fie_jan_7 = $jan;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($feb, 2)}}  @php $fie_feb_7 = $feb;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($mar, 2)}}  @php $fie_mar_7 = $mar;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($apr, 2)}}  @php $fie_apr_7 = $apr;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($may, 2)}}  @php $fie_may_7 = $may;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jun, 2)}}  @php $fie_jun_7 = $jun;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jul, 2)}}  @php $fie_jul_7 = $jul;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($aug, 2)}}  @php $fie_aug_7 = $aug;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($sep, 2)}}  @php $fie_sep_7 = $sep;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($oct, 2)}}  @php $fie_oct_7 = $oct;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($nov, 2)}}  @php $fie_nov_7 = $nov;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($dec, 2)}}  @php $fie_dec_7 = $dec;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"
                            style="background: #A3C1AD"><b class="f-11">{{number_format($tot, 2)}}</b></th>
                    </tr>

                    <tr style="background: #A3C1AD">
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11"> Daily-Average</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jan/31, 2)}}  @php $fie_ave_jan_7 = ($jan/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($feb / cal_days_in_month(CAL_GREGORIAN, 2, $yrs), 2)}}  
                        @php $fie_ave_feb_7 = ($feb / cal_days_in_month(CAL_GREGORIAN, 2, $yrs));  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($mar/31, 2)}}  @php $fie_ave_mar_7 = ($mar/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($apr/30, 2)}}  @php $fie_ave_apr_7 = ($apr/'30');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($may/31, 2)}}  @php $fie_ave_may_7 = ($may/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jun/30, 2)}}  @php $fie_ave_jun_7 = ($jun/'30');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jul/31, 2)}}  @php $fie_ave_jul_7 = ($jul/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($aug/31, 2)}}  @php $fie_ave_aug_7 = ($aug/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($sep/30, 2)}}  @php $fie_ave_sep_7 = ($sep/'30');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($oct/31, 2)}}  @php $fie_ave_oct_7 = ($oct/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($nov/30, 2)}}  @php $fie_ave_nov_7 = ($nov/'30');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($dec/31, 2)}}  @php $fie_ave_dec_7 = ($dec/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($tot/365, 2)}}</b></th>
                        @php $fie_tot_7 = $tot;    $fie_ave_tot_7 = ($tot / '365'); @endphp
                    </tr>
                    </tbody>
                    <tr class="">
                        <th colspan="14" style="background: #A3C1AD!important; text-align: center;"><b class="f-11">Plant Condensates</b></th>
                    </tr>

                    
                    <tbody> @php $t_stream_prod_plant = $controllerName->reconcileProd($yrs, '3'); @endphp
                    @php $tot = '0'; $jan = '0'; $feb = '0'; $mar = '0'; $apr = '0'; $may = '0'; $jun = '0'; $jul = '0'; $aug = '0'; $sep = '0'; $oct = '0'; $nov = '0'; $dec = '0';  $i=1; @endphp
                    @if($t_stream_prod_plant)
                        @foreach($t_stream_prod_plant as $t_stream_prod_conds)
                            <tr>
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @if($t_stream_prod_conds->stream) {{$t_stream_prod_conds->stream->stream_name}} @endif </th>
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->january, 2)}}</th> @php $jan += $t_stream_prod_conds->january; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->febuary, 2)}}</th> @php $feb += $t_stream_prod_conds->febuary; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->march, 2)}}</th> @php $mar += $t_stream_prod_conds->march; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->april, 2)}}</th> @php $apr += $t_stream_prod_conds->april; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->may, 2)}}</th> @php $may += $t_stream_prod_conds->may; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->june, 2)}}</th> @php $jun += $t_stream_prod_conds->june; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->july, 2)}}</th> @php $jul += $t_stream_prod_conds->july; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->august, 2)}}</th> @php $aug += $t_stream_prod_conds->august; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->september, 2)}}</th> @php $sep += $t_stream_prod_conds->september; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->october, 2)}}</th> @php $oct += $t_stream_prod_conds->october; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->november, 2)}}</th> @php $nov += $t_stream_prod_conds->november; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->december, 2)}}</th> @php $dec += $t_stream_prod_conds->december; @endphp
                                <th class=" f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($t_stream_prod_conds->stream_total, 2)}}</th> @php $tot += $t_stream_prod_conds->stream_total;  $i++; @endphp
                            </tr>
                        @endforeach
                    @endif

                    <tr style="background: #A3C1AD">
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11"> Sub-Total</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jan, 2)}}  @php $pla_jan_7 = $jan;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($feb, 2)}}  @php $pla_feb_7 = $feb;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($mar, 2)}}  @php $pla_mar_7 = $mar;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($apr, 2)}}  @php $pla_apr_7 = $apr;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($may, 2)}}  @php $pla_may_7 = $may;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jun, 2)}}  @php $pla_jun_7 = $jun;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jul, 2)}}  @php $pla_jul_7 = $jul;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($aug, 2)}}  @php $pla_aug_7 = $aug;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($sep, 2)}}  @php $pla_sep_7 = $sep;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($oct, 2)}}  @php $pla_oct_7 = $oct;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($nov, 2)}}  @php $pla_nov_7 = $nov;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($dec, 2)}}  @php $pla_dec_7 = $dec;  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"
                            style="background: #A3C1AD"><b class="f-11">{{number_format($tot, 2)}}</b></th>
                    </tr>

                    <tr style="background: #A3C1AD">
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11"> Daily-Average</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jan/31, 2)}}  @php $pla_ave_jan_7 = ($jan/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">
                        {{number_format($feb / cal_days_in_month(CAL_GREGORIAN, 2, $yrs), 2)}}  @php $pla_ave_feb_7 = ($feb / cal_days_in_month(CAL_GREGORIAN, 2, $yrs));  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($mar/31, 2)}}  @php $pla_ave_mar_7 = ($mar/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($apr/30, 2)}}  @php $pla_ave_apr_7 = ($apr/'30');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($may/31, 2)}}  @php $pla_ave_may_7 = ($may/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jun/30, 2)}}  @php $pla_ave_jun_7 = ($jun/'30');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($jul/31, 2)}}  @php $pla_ave_jul_7 = ($jul/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($aug/31, 2)}}  @php $pla_ave_aug_7 = ($aug/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($sep/30, 2)}}  @php $pla_ave_sep_7 = ($sep/'30');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($oct/31, 2)}}  @php $pla_ave_oct_7 = ($oct/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($nov/30, 2)}}  @php $pla_ave_nov_7 = ($nov/'30');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($dec/31, 2)}}  @php $pla_ave_dec_7 = ($dec/'31');  @endphp </b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format($tot/365, 2)}}</b></th>
                        @php $pla_tot_7 = $tot;    $pla_ave_tot_7 = ($tot / '365'); @endphp
                    </tr>

                    <tr>
                        <td></td>
                    </tr>

                    <!-- condensate total -->
                    <tr style="background: #A3C1AD">
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11"> Sub-Total Condensates</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_jan_7 + $pla_jan_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_feb_7 + $pla_feb_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_mar_7 + $pla_mar_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_apr_7 + $pla_apr_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_may_7 + $pla_may_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_jun_7 + $pla_jun_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_jul_7 + $pla_jul_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_aug_7 + $pla_aug_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_sep_7 + $pla_sep_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_oct_7 + $pla_oct_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_nov_7 + $pla_nov_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_dec_7 + $pla_dec_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"
                            style="background: #A3C1AD"><b class="f-11">{{number_format(($fie_tot_7 + $pla_tot_7), 2)}}</b></th>
                    </tr>

                    <tr style="background: #A3C1AD">
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11"> Daily-Ave Condensate</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_ave_jan_7 + $pla_ave_jan_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_ave_feb_7 + $pla_ave_feb_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_ave_mar_7 + $pla_ave_mar_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_ave_apr_7 + $pla_ave_apr_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_ave_may_7 + $pla_ave_may_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_ave_jun_7 + $pla_ave_jun_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_ave_jul_7 + $pla_ave_jul_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_ave_aug_7 + $pla_ave_aug_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_ave_sep_7 + $pla_ave_sep_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_ave_oct_7 + $pla_ave_oct_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_ave_nov_7 + $pla_ave_nov_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_ave_dec_7 + $pla_ave_dec_7), 2)}}</b></th>
                        @php $pla_tot_7 = $tot;    $pla_ave_tot_7 = ($tot / '365'); @endphp
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($fie_ave_tot_7 + $pla_ave_tot_7), 2)}}</b></th>

                    </tr>

                    <tr>
                        <td colspan="14" style="text-align: center; background: #A3C1AD !important;"><b class="f-11>"> Crude + Condensates</b></td>
                    </tr>

                    <!-- condensate total -->
                    <tr style="background: #A3C1AD">
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11"> Grand Total</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_jan_7 + $fie_jan_7 + $pla_jan_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_feb_7 + $fie_feb_7 + $pla_feb_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_mar_7 + $fie_mar_7 + $fie_mar_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_apr_7 + $fie_apr_7 + $pla_apr_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_may_7 + $fie_may_7 + $pla_may_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_jun_7 + $fie_jun_7 + $pla_jun_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_jul_7 + $fie_jul_7 + $pla_jul_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_aug_7 + $fie_aug_7 + $pla_aug_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_sep_7 + $fie_sep_7 + $pla_sep_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_oct_7 + $fie_oct_7 + $pla_oct_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_nov_7 + $fie_nov_7 + $pla_nov_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_dec_7 + $fie_dec_7 + $pla_dec_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"
                            style="background: #A3C1AD"><b class="f-11">{{number_format(($oil_tot_7 + $fie_tot_7 + $pla_tot_7), 2)}}</b></th>
                    </tr>

                    <tr style="background: #A3C1AD">
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11"> Daily-Average</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_ave_jan_7 + $fie_ave_jan_7 + $pla_ave_jan_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_ave_feb_7 + $fie_ave_feb_7 + $pla_ave_feb_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_ave_mar_7 + $fie_ave_mar_7 + $pla_ave_mar_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_ave_apr_7 + $fie_ave_apr_7 + $pla_ave_apr_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_ave_may_7 + $fie_ave_may_7 + $pla_ave_may_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_ave_jun_7 + $fie_ave_jun_7 + $pla_ave_jun_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_ave_jul_7 + $fie_ave_jul_7 + $pla_ave_jul_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_ave_aug_7 + $fie_ave_aug_7 + $pla_ave_aug_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_ave_sep_7 + $fie_ave_sep_7 + $pla_ave_sep_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_ave_oct_7 + $fie_ave_oct_7 + $pla_ave_oct_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_ave_nov_7 + $fie_ave_nov_7 + $pla_ave_nov_7), 2)}}</b></th>
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_ave_dec_7 + $fie_ave_dec_7 + $pla_ave_dec_7), 2)}}</b></th>
                        @php $pla_tot_7 = $tot;    $pla_ave_tot_7 = ($tot / '365'); @endphp
                        <th class=" bold-label f-11" style="background: #A3C1AD!important;"><b class="f-11">{{number_format(($oil_ave_tot_7 + $fie_ave_tot_7 + $pla_ave_tot_7), 2)}}</b></th>

                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="row col-md-12 remark-div" id="bottomTab_32"> 
            @if($controllerName->bottomRemarks(32, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(32, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(32, $yrs)) {!! $controllerName->bottomRemarksTemp(32, $yrs)->remark !!}
            @endif
        </div>
        @endif

    </div>  </div>



    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 33) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>33,'yrs'=>$yrs, 'remark'=>' Monthly Export Details by Crude Stream Export'])

        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;">Stream</th>
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
                <tr class="">
                    <th colspan="14" style="text-align: center; background: #A3C1AD!important;"><b class="bfont-size"> Crude Oil </b></th>
                </tr>

                
                <tbody>
                @php $tot_9 = '0'; $tot_8 = '0'; $tot_7 = '0'; $tot_6 = '0'; $tot_5 = '0'; $tot_4 = '0'; $tot_3 = '0'; $tot_2 = '0'; $tot_1 = '0'; $tot_0 = '0';   $i=1; @endphp

                    @forelse($crude_EX_oil as $OIL_Export)   
                        <tr>
                            <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                {{$OIL_Export->stream?$OIL_Export->stream->stream_name:''}} </th>
                            <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $tot_9 += $TOT_9 = $controllerName->reconcileTotalByCompany($yrs - 9, 'stream_total', $OIL_Export->stream_id, 1); @endphp
                                {{number_format($TOT_9, 2)}}
                            </th>
                            <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $tot_8 += $TOT_8 = $controllerName->reconcileTotalByCompany($yrs - 8, 'stream_total', $OIL_Export->stream_id, 1); @endphp
                                {{number_format($TOT_8, 2)}}
                            </th>
                            <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $tot_7 += $TOT_7 = $controllerName->reconcileTotalByCompany($yrs - 7, 'stream_total', $OIL_Export->stream_id, 1); @endphp
                                {{number_format($TOT_7, 2)}}
                            </th>
                            <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $tot_6 += $TOT_6 = $controllerName->reconcileTotalByCompany($yrs - 6, 'stream_total', $OIL_Export->stream_id, 1); @endphp
                                {{number_format($TOT_6, 2)}}
                            </th>
                            <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $tot_5 += $TOT_5 = $controllerName->reconcileTotalByCompany($yrs - 5, 'stream_total', $OIL_Export->stream_id, 1); @endphp
                                {{number_format($TOT_5, 2)}}
                            </th>
                            <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $tot_4 += $TOT_4 = $controllerName->reconcileTotalByCompany($yrs - 4, 'stream_total', $OIL_Export->stream_id, 1); @endphp
                                {{number_format($TOT_4, 2)}}
                            </th>
                            <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $tot_3 += $TOT_3 = $controllerName->reconcileTotalByCompany($yrs - 3, 'stream_total', $OIL_Export->stream_id, 1); @endphp
                                {{number_format($TOT_3, 2)}}
                            </th>
                            <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $tot_2 += $TOT_2 = $controllerName->reconcileTotalByCompany($yrs - 2, 'stream_total', $OIL_Export->stream_id, 1); @endphp
                                {{number_format($TOT_2, 2)}}
                            </th>
                            <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $tot_1 += $TOT_1 = $controllerName->reconcileTotalByCompany($yrs - 1, 'stream_total', $OIL_Export->stream_id, 1); @endphp
                                {{number_format($TOT_1, 2)}}
                            </th>
                            <th class="f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $tot_0 += $TOT_0 = $controllerName->reconcileTotalByCompany($yrs - 0, 'stream_total', $OIL_Export->stream_id, 1); @endphp
                                {{number_format($TOT_0, 2)}}
                            </th>
                        </tr>  @php $i++; @endphp

                    @empty
                    @endforelse

                @php
                    $tot_9_arr = ['tot_9' => $tot_9];      $tot_8_arr = ['tot_8' => $tot_8];     $tot_7_arr = ['tot_7' => $tot_7];     $tot_6_arr = ['tot_6' => $tot_6];
                    $tot_5_arr = ['tot_5' => $tot_5];      $tot_4_arr = ['tot_4' => $tot_4];     $tot_3_arr = ['tot_3' => $tot_3];     $tot_2_arr = ['tot_2' => $tot_2];
                    $tot_1_arr = ['tot_1' => $tot_1];      $tot_arr = ['tot_0' => $tot_0];
                    $crud_oil_array =  array_merge($tot_9_arr, $tot_8_arr, $tot_7_arr, $tot_6_arr, $tot_5_arr, $tot_4_arr, $tot_3_arr, $tot_2_arr, $tot_1_arr, $tot_arr);
                    $oil_crude_legends = ['$yrs - 9' => $yrs - '9', '$yrs - 8' => $yrs - '8', '$yrs - 7' => $yrs - '7', '$yrs - 6' => $yrs - '6', '$yrs - 5' => $yrs - '5', '$yrs - 4' => $yrs - '4', '$yrs - 3' => $yrs - '3', '$yrs - 2' => $yrs - '2', '$yrs - 1' => $yrs - '1', '$yrs - 0' => $yrs - '0'];
                    // dd($crud_oil_cond_array);
                @endphp

                <tr style="background: #A3C1AD">
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size">Sub Total</b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format($tot_9, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format($tot_8, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format($tot_7, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format($tot_6, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format($tot_5, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format($tot_4, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format($tot_3, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format($tot_2, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format($tot_1, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format($tot_0, 2)}} </b></th>
                </tr>
                <tr style="background: #A3C1AD">
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        Daily Average</b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format(($tot_9 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format(($tot_8 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format(($tot_7 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format(($tot_6 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format(($tot_5 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format(($tot_4 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format(($tot_3 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format(($tot_2 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format(($tot_1 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                        {{number_format(($tot_0 / $yr), 2)}} </b></th>
                </tr>

                <tr class="">
                    <th colspan="14" style="text-align: center; background: #ACE1AF!important"><b class="bfont-size">Condensate</b></th>
                </tr>
                <tr class="">
                    <th colspan="14" style="text-align: center; background: #ACE1AF!important"><b class="bfont-size">Field Condensate</b></th>
                </tr>

                @php $tcon_9 = '0'; $tcon_8 = '0'; $tcon_7 = '0'; $tcon_6 = '0'; $tcon_5 = '0'; $tcon_4 = '0'; $tcon_3 = '0'; $tcon_2 = '0'; $tcon_1 = '0'; $tcon_0 = '0';  $i=1; @endphp

                @if($down_terminal_stream_prod)
                    @foreach($down_terminal_stream_prod as $down_terminal_stream_prods)
                        @if( $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 9, 2) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 8, 2) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 7, 2) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 6, 2) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 5, 2) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 4, 2) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 3, 2) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 2, 2) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 1, 2) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 0, 2) != 0)
                            <tr>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$down_terminal_stream_prods->stream_name}} </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_9 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 9, 2); 
                                    @endphp
                                    {{number_format($year_9, 2)}}   @php $tcon_9 += $year_9; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_8 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 8, 2); 
                                    @endphp
                                    {{number_format($year_8, 2)}}  @php $tcon_8 += $year_8; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_7 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 7, 2); 
                                    @endphp
                                    {{number_format($year_7, 2)}}  @php $tcon_7 += $year_7; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_6 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 6, 2); 
                                    @endphp
                                    {{number_format($year_6, 2)}}  @php $tcon_6 += $year_6; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_5 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 5, 2); 
                                    @endphp
                                    {{number_format($year_5, 2)}}  @php $tcon_5 += $year_5; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_4 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 4, 2); 
                                    @endphp
                                    {{number_format($year_4, 2)}}  @php $tcon_4 += $year_4; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_3 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 3, 2); 
                                    @endphp
                                    {{number_format($year_3, 2)}}  @php $tcon_3 += $year_3; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_2 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 2, 2); 
                                    @endphp
                                    {{number_format($year_2, 2)}}  @php $tcon_2 += $year_2; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_1 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 1, 2); 
                                    @endphp
                                    {{number_format($year_1, 2)}}  @php $tcon_1 += $year_1; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_0 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 0, 2); 
                                    @endphp
                                    {{number_format($year_0, 2)}}  @php $tcon_0 += $year_0;  $i++; @endphp
                                </th>
                            </tr>
                        @endif
                    @endforeach
                @endif

                @php
                    $tcon_9_arr = ['tcon_9' => $tcon_9];      $tcon_8_arr = ['tcon_8' => $tcon_8];     $tcon_7_arr = ['tcon_7' => $tcon_7];     $tcon_6_arr = ['tcon_6' => $tcon_6];
                    $tcon_5_arr = ['tcon_5' => $tcon_5];      $tcon_4_arr = ['tcon_4' => $tcon_4];     $tcon_3_arr = ['tcon_3' => $tcon_3];     $tcon_2_arr = ['tcon_2' => $tcon_2];
                    $tcon_1_arr = ['tcon_1' => $tcon_1];      $tcon_arr = ['tcon_0' => $tcon_0];

                    $crud_PF_cond_array =  array_merge($tcon_9_arr, $tcon_8_arr, $tcon_7_arr, $tcon_6_arr, $tcon_5_arr, $tcon_4_arr, $tcon_3_arr, $tcon_2_arr, $tcon_1_arr, $tcon_arr);
                // dd($crud_cond_array);
                @endphp


                <tr style="background: #A3C1AD">
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> Sub Total</b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format($tcon_9, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format($tcon_8, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format($tcon_7, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format($tcon_6, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format($tcon_5, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format($tcon_4, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format($tcon_3, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format($tcon_2, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format($tcon_1, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format($tcon_0, 2)}} </b></th>
                </tr>
                <tr style="background: #A3C1AD">
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> Daily Average</b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format(($tcon_9 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format(($tcon_8 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format(($tcon_7 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format(($tcon_6 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format(($tcon_5 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format(($tcon_4 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format(($tcon_3 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format(($tcon_2 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format(($tcon_1 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b> {{number_format(($tcon_0 / $yr), 2)}} </b></th>
                </tr>


                <tr class="">
                    <th colspan="14" style="text-align: center; background: #ACE1AF"><b class="bfont-size">Plant Condensate</b></th>
                </tr>

                @php $tplt_9 = '0'; $tplt_8 = '0'; $tplt_7 = '0'; $tplt_6 = '0'; $tplt_5 = '0'; $tplt_4 = '0'; $tplt_3 = '0'; $tplt_2 = '0'; $tplt_1 = '0'; $tplt_0 = '0'; @endphp

                @if($down_terminal_stream_prod)
                    @foreach($down_terminal_stream_prod as $down_terminal_stream_prods)
                        @if( $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 9, 3) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 8, 3) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 7, 3) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 6, 3) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 5, 3) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 4, 3) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 3, 3) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 2, 3) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 1, 3) + $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 0, 3) != 0)
                            <tr>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$down_terminal_stream_prods->stream_name}} </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_9 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 9, 3); 
                                    @endphp
                                    {{number_format($year_9, 2)}}  @php $tplt_9 += $year_9; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_8 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 8, 3); 
                                    @endphp
                                    {{number_format($year_8, 2)}}  @php $tplt_8 += $year_8; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_7 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 7, 3); 
                                    @endphp
                                    {{number_format($year_7, 2)}}  @php $tplt_7 += $year_7; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_6 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 6, 3); 
                                    @endphp
                                    {{number_format($year_6, 2)}}  @php $tplt_6 += $year_6; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_5 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 5, 3); 
                                    @endphp
                                    {{number_format($year_5, 2)}}  @php $tplt_5 += $year_5; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_4 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 4, 3); 
                                    @endphp
                                    {{number_format($year_4, 2)}}  @php $tplt_4 += $year_4; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_3 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 3, 3); 
                                    @endphp
                                    {{number_format($year_3, 2)}}  @php $tplt_3 += $year_3; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_2 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 2, 3); 
                                    @endphp
                                    {{number_format($year_2, 2)}}  @php $tplt_2 += $year_2; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_1 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 1, 3); 
                                    @endphp
                                    {{number_format($year_1, 2)}}  @php $tplt_1 += $year_1; @endphp
                                </th>
                                <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $year_0 = $down_terminal_stream_prods->down_terminal_stream_prod_total($yrs - 0, 3); 
                                    @endphp
                                    {{number_format($year_0, 2)}}  @php $tplt_0 += $year_0; @endphp
                                </th>
                            </tr> @php $i++; @endphp
                        @endif
                    @endforeach
                @endif

                <tr style="background: #A3C1AD">
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> Sub Total</b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tplt_9, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tplt_8, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tplt_7, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tplt_6, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tplt_5, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tplt_4, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tplt_3, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tplt_2, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tplt_1, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tplt_0, 2)}} </b></th>
                </tr>
                <tr style="background: #A3C1AD">
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> Daily Average</b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($tplt_9 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($tplt_8 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($tplt_7 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($tplt_6 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($tplt_5 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($tplt_4 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($tplt_3 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($tplt_2 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($tplt_1 / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($tplt_0 / $yr), 2)}} </b></th>
                </tr>

                <tr class="">
                    <th colspan="14" style="text-align: center;"></th>
                </tr>

                <tr style="background: #A3C1AD">
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> Sub Total - Condensate</b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tcon_9 + $tplt_9, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tcon_8 + $tplt_8, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tcon_7 + $tplt_7, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tcon_6 + $tplt_6, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tcon_5 + $tplt_5, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tcon_4 + $tplt_4, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tcon_3 + $tplt_3, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tcon_2 + $tplt_2, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tcon_1 + $tplt_1, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tcon_0 + $tplt_0, 2)}} </b></th>
                </tr>
                <tr style="background: #A3C1AD">
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> Daily Average</b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tcon_9 + $tplt_9) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tcon_8 + $tplt_8) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tcon_7 + $tplt_7) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tcon_6 + $tplt_6) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tcon_5 + $tplt_5) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tcon_4 + $tplt_4) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tcon_3 + $tplt_3) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tcon_2 + $tplt_2) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tcon_1 + $tplt_1) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tcon_0 + $tplt_0) / $yr), 2)}} </b></th>
                </tr>

                <tr class="">
                    <th colspan="14" style="text-align: center; background: #A3C1AD!important"><b class="bfont-size">Crude + Condensate</b></th>
                </tr>

                <tr style="background: #A3C1AD">
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> Grand Total</b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tot_9 + $tcon_9 + $tplt_9, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tot_8 + $tcon_8 + $tplt_8, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tot_7 + $tcon_7 + $tplt_7, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tot_6 + $tcon_6 + $tplt_6, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tot_5 + $tcon_5 + $tplt_5, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tot_4 + $tcon_4 + $tplt_4, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tot_3 + $tcon_3 + $tplt_3, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tot_2 + $tcon_2 + $tplt_2, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tot_1 + $tcon_1 + $tplt_1, 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tot_0 + $tcon_0 + $tplt_0, 2)}} </b></th>
                </tr>
                <tr style="background: #A3C1AD">
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> Daily Average</b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tot_9 + $tcon_9 + $tplt_9) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tot_8 + $tcon_8 + $tplt_8) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tot_7 + $tcon_7 + $tplt_7) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tot_6 + $tcon_6 + $tplt_6) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tot_5 + $tcon_5 + $tplt_5) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tot_4 + $tcon_4 + $tplt_4) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tot_3 + $tcon_3 + $tplt_3) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tot_2 + $tcon_2 + $tplt_2) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tot_1 + $tcon_1 + $tplt_1) / $yr), 2)}} </b></th>
                    <th class="f-11 bold-label" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format((($tot_0 + $tcon_0 + $tplt_0) / $yr), 2)}} </b></th>
                </tr>

                </tbody>
            </table>
        </div>

        @php
            $tot_9_arr = ['tot_9' => ($tot_9 + $tcon_9 + $tplt_9)];      $tot_8_arr = ['tot_8' => ($tot_8 + $tcon_8 + $tplt_8)];     $tot_7_arr = ['tot_7' => ($tot_7 + $tcon_7 + $tplt_7)];     $tot_6_arr = ['tot_6' => ($tot_6 + $tcon_6 + $tplt_6)];
            $tot_5_arr = ['tot_5' => ($tot_5 + $tcon_5 + $tplt_5)];      $tot_4_arr = ['tot_4' => ($tot_4 + $tcon_4 + $tplt_4)];     $tot_3_arr = ['tot_3' => ($tot_3 + $tcon_3 + $tplt_3)];     $tot_2_arr = ['tot_2' => ($tot_2 + $tcon_2 + $tplt_2)];
            $tot_1_arr = ['tot_1' => ($tot_1 + $tcon_1 + $tplt_1)];      $tot_arr = ['tot_0' => ($tot_0 + $tcon_0 + $tplt_0)];

            $tot_cru_array =  array_merge($tot_9_arr, $tot_8_arr, $tot_7_arr, $tot_6_arr, $tot_5_arr, $tot_4_arr, $tot_3_arr, $tot_2_arr, $tot_1_arr, $tot_arr);
        // dd($crud_cond_array);
        @endphp

        <div class="row col-md-12 remark-div" id="bottomTab_33"> 
            @if($controllerName->bottomRemarks(33, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(33, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(33, $yrs)) {!! $controllerName->bottomRemarksTemp(33, $yrs)->remark !!}
            @endif
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 chart-pad">

                <div class="frame" style="">
                    <canvas id="oilCondLineChart"></canvas>
                </div>
                
                <div class="fig1_33 figure">
                    @if($controllerName->getFigure(33, $yrs)) Figure {!! $controllerName->getFigure(33, $yrs)->figure_no_1 !!} : 
                           {!! $controllerName->getFigure(33, $yrs)->figure_title_1 !!} 
                    @elseif($controllerName->getFigure(33, $yrs-1)) Figure {!! $controllerName->getFigure(33, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(33, $yrs-1)->figure_title_1 !!} 
                    @endif
                </div>
            </div> <!-- end col -->
        </div>

    </div>  </div>



    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 34) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>34,'yrs'=>$yrs, 'remark'=>' Major Oil Production (Addition)'])

        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th class="th_h" style="background: #A3C1AD!important;">#</th>
                    <th class="th_h" style="background: #A3C1AD!important;">Project</th>
                    <th class="th_h" style="background: #A3C1AD!important;">Company</th>
                    <th class="th_h" style="background: #A3C1AD!important;">Location</th>
                    <th class="th_h" style="background: #A3C1AD!important;">Addition <i class="units">(Mbopd)</i></th>
                    <th class="th_h" style="background: #A3C1AD!important;">Development</th>
                    <th class="th_h" style="background: #A3C1AD!important;">Completion Year</th>
                    <th class="th_h" style="background: #A3C1AD!important;">Status</th>
                    {{-- <th>OML</th>  --}}
                </tr>
                
                <tbody>  @php $i=1; @endphp
                @if($oil_plants)
                    @foreach($oil_plants as $oil_plant)
                        <tr>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$oil_plant->project}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>@if($oil_plant->company) {{$oil_plant->company->company_name}} @endif</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$oil_plant->location}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif data-toggle="tooltip" title="Capacity In (Mbopd)">{{$oil_plant->expected_oil}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$oil_plant->development_type}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$oil_plant->completion_date}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$oil_plant->status_id}}</th>
                            {{-- <th>@if($oil_plant->concession){{$oil_plant->concession->concession_name}} @endif</th>  --}}
                        </tr>   @php $i++;  @endphp
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_34"> 
            @if($controllerName->bottomRemarks(34, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(34, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(34, $yrs)) {!! $controllerName->bottomRemarksTemp(34, $yrs)->remark !!}
            @endif
        </div>   <p style="margin-bottom: 100px !important"></p>

    </div>  </div>



    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 35) == 0) display: none; @endif">
        @include('publication.partials.tablehead',['t_id'=>35,'yrs'=>$yrs, 'remark'=>' Gas Production Volumes'])
        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;">Month</th>
                    <th style="background: #A3C1AD!important;">AG</th>
                    <th style="background: #A3C1AD!important;">NAG</th>
                    <th style="background: #A3C1AD!important;">Total Gas Produced</th>
                </tr>
                
                <tbody> @php $totAG = 0; $totNAG = 0; $totAGNAG = 0;   $i=1;  @endphp
                @if($month_arr)
                    @foreach($month_arr as $month_array)
                        <tr>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$month_array}} </th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php
                                    $prod_ag = $controllerName->gasProductionUtilization($yrs, $month_array,
                                                '\App\\gas_summary_of_gas_production', 'ag');
                                @endphp
                                {{number_format(($prod_ag / 1000), 2)}}     @php $totAG += $prod_ag @endphp
                            </th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php
                                    $prod_nag = $controllerName->gasProductionUtilization($yrs, $month_array,
                                                '\App\\gas_summary_of_gas_production', 'nag');
                                @endphp
                                {{number_format(($prod_nag / 1000), 2)}}     @php $totNAG += $prod_nag @endphp
                            </th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php
                                    $prod_ttotal = $controllerName->gasProductionUtilization($yrs, $month_array,
                                                '\App\\gas_summary_of_gas_production', 'total');
                                @endphp
                                {{number_format(($prod_ttotal / 1000),2 )}}     @php $totAGNAG += $prod_ttotal @endphp
                            </th>
                        </tr>  @php $i++; @endphp
                    @endforeach
                @endif
                <tr>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"> Total</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($totAG / 1000), 2)}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($totNAG / 1000), 2)}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($totAGNAG / 1000), 2)}}</b></th>
                </tr>
                @php
                    $gas_util_legend = ['1'=>'AG', '2'=>'NAG', '3'=>'Tot (AG+NAG)', '4'=>'Fuel Gas', '5'=>'Gas Lift', '6'=>'Re-Injection', '7'=>'NGL-LPG', '8'=>'Gas-NIPP', '9'=>'Others', '10'=>'NLNG Export', '11'=>'Gas Util', '12'=>'Perc Util', '13'=>'Gas Flared', '14'=>'Perc Flared'];
                @endphp
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_35"> 
            @if($controllerName->bottomRemarks(35, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(35, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(35, $yrs)) {!! $controllerName->bottomRemarksTemp(35, $yrs)->remark !!}
            @endif
        </div>

    </div>  </div>



    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 36) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>36,'yrs'=>$yrs, 'remark'=>' Gas Production'])

        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;">Year</th>
                    <th style="background: #A3C1AD!important;">AG</th>
                    <th style="background: #A3C1AD!important;">NAG</th>
                    <th style="background: #A3C1AD!important;">Total</th>
                </tr>
                
                <tbody> 
                    @php $ag = 0; $tot_ag_yrs[] = '';  $nag = 0; $tot_nag_yrs[] = ''; $i = 1; $AG_NAGyears[] = '';  @endphp
                    @forelse($array_year_20 as $k => $year)
                    @php 
                        $ag = $controllerName->gasYearlyProductionUtilization($year, '\App\\gas_summary_of_gas_production', 'ag');    $tot_ag_yrs[$k] = $ag;
                        $nag = $controllerName->gasYearlyProductionUtilization($year, '\App\\gas_summary_of_gas_production', 'nag');    $tot_nag_yrs[$k] = $nag;
                        $an_nag = ($ag + $nag);
                    @endphp
                    @if($an_nag != 0)
                        <tr> 
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$year}} </th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format(($ag/1000), 2)}}
                            </th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format(($nag/1000), 2)}}
                            </th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format(($ag + $nag)/1000, 2)}} </th>
                        </tr>   @php $i++; $AG_NAGyears[$k] = $year; @endphp
                    @endif
                    @empty
                    @endforelse 
                    @php
                        foreach($AG_NAGyears as $key => $value){ if($value != ""){ $ArrayYear[$key] = $value; }  }   
                        foreach($tot_ag_yrs as $key => $value){ if($value != ""){ $tot_AG_yrs[$key] = $value; }  }   
                        foreach($tot_nag_yrs as $key => $value){ if($value != ""){ $tot_NAG_yrs[$key] = $value; }  }   
                        //dd($ArrayYear);  
                    @endphp
                </tbody> 
            </table> 

        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_36"> 
            @if($controllerName->bottomRemarks(36, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(36, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(36, $yrs)) {!! $controllerName->bottomRemarksTemp(36, $yrs)->remark !!}
            @endif
        </div>

        <p style="margin-bottom: 160px !important">

        <div class="col-md-7 chart-pad">
            <i class="pull-left" style="font-size: 10px"> </i>
            <div class="frame" style="">
                <canvas id="AgNagBarChart"></canvas>
            </div>
            
            <div class="fig1_36 figure">
                @if($controllerName->getFigure(36, $yrs)) Figure {!! $controllerName->getFigure(36, $yrs)->figure_no_1 !!} : 
                       {!! $controllerName->getFigure(36, $yrs)->figure_title_1 !!} 
                @elseif($controllerName->getFigure(36, $yrs-1)) Figure {!! $controllerName->getFigure(36, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(36, $yrs-1)->figure_title_1 !!} 
                @endif
            </div>
        </div>

        <div class="col-md-5">   </div>

    </div>  </div>


    @php
        $gas_sum = $controllerName->gasYearlyProductionUtilization($yrs, '\App\\gas_summary_of_gas_utilization', 'total_gas_utilized');
    @endphp



    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 37) == 0) display: none; @endif">
        @include('publication.partials.tablehead',['t_id'=>37,'yrs'=>$yrs, 'remark'=>' Summary of Gas Production and Utilization'])
        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;">Gas Utilization</th>
                    <th style="background: #A3C1AD!important;">Volume (MMcf)</th>
                    <th style="background: #A3C1AD!important;">Utilization Factor (%)</th>
                </tr>
                
                @php
                    $fuel_gas = 0;    $gas_lift = 0;    $re_injection = 0;    $ngl_lpg = 0;    
                    $nipp = 0;    $local = 0;    $nlng = 0;    $total_gas = 0;    $gas_breakdown[] = '';  $i=1;
                @endphp
                @if($gas_sum)
                    <tbody>
                    <tr>
                        <th class="th_h">Fuel Gas</th>
                        @php 
                            $f_gas = $controllerName->gasYearlyProductionUtilization($yrs, '\App\\gas_summary_of_gas_utilization', 'fuel_gas');
                            $tot_g_util = $controllerName->gasYearlyProductionUtilization($yrs, '\App\\gas_summary_of_gas_utilization', 'total_gas_utilized'); 
                        @endphp
                        <th class="th_h"> {{number_format($f_gas/1000, 2)}} </th>
                        <th class="th_h">
                            @php   $fuel_gas = number_format(($f_gas * 100 ) / $tot_g_util, 2);  @endphp             
                            {{ $fuel_gas  }}
                        </th>
                    </tr>
                    <tr>
                        @php
                            $g_lift = $controllerName->gasYearlyProductionUtilization($yrs, '\App\\gas_summary_of_gas_utilization', 'gas_lift');
                        @endphp
                        <th class="th_h" style="background: #ACE1AF!important;">Gas Lift make-up</th>
                        <th class="th_h" style="background: #ACE1AF!important;">{{number_format($g_lift/1000, 2)}} </th>
                        <th class="th_h" style="background: #ACE1AF!important;">
                            @php   $gas_lift = number_format(($g_lift * 100 ) / $tot_g_util, 2);   @endphp             
                            {{ $gas_lift  }}
                        </th>
                    </tr>
                    <tr>
                        @php
                            $re_inj = $controllerName->gasYearlyProductionUtilization($yrs, '\App\\gas_summary_of_gas_utilization', 're_injection');
                        @endphp
                        <th class="th_h">Gas Re-injection</th>
                        <th class="th_h">{{number_format($re_inj/1000, 2)}} </th>
                        <th class="th_h">
                            @php   $re_injection = number_format(($re_inj * 100 ) / $tot_g_util, 2);    @endphp             
                            {{ $re_injection  }}
                        </th>
                    </tr>
                    <tr>
                        @php
                            $n_lpg = $controllerName->gasYearlyProductionUtilization($yrs, '\App\\gas_summary_of_gas_utilization', 'ngl_lpg');
                        @endphp
                        <th class="th_h" style="background: #ACE1AF!important;">NGL/LPG Feed Gas</th>
                        <th class="th_h" style="background: #ACE1AF!important;">{{number_format($n_lpg/1000, 2)}} </th>
                        <th class="th_h" style="background: #ACE1AF!important;">
                            @php   $ngl_lpg = number_format(($n_lpg * 100 ) / $tot_g_util, 2);    @endphp             
                            {{ $ngl_lpg  }}
                        </th>
                    </tr>
                    <tr>
                        @php
                            $g_nipp = $controllerName->gasYearlyProductionUtilization($yrs, '\App\\gas_summary_of_gas_utilization', 'gas_to_nipp');
                        @endphp
                        <th class="th_h">Local Supply (Power)</th>
                        <th class="th_h">{{number_format($g_nipp/1000, 2)}} </th>
                        <th class="th_h">
                            @php   $nipp = number_format(($g_nipp * 100 ) / $tot_g_util, 2);   @endphp             
                            {{ $nipp }}
                        </th>
                    </tr>
                    <tr>
                        @php
                            $others = $controllerName->gasYearlyProductionUtilization($yrs, '\App\\gas_summary_of_gas_utilization', 'local_others');
                        @endphp
                        <th class="th_h" style="background: #ACE1AF!important;">Local Supply (Others)</th>
                        <th class="th_h" style="background: #ACE1AF!important;">{{number_format($others/1000, 2)}} </th>
                        <th class="th_h" style="background: #ACE1AF!important;">
                            @php   $local = number_format(($others * 100 ) / $tot_g_util, 2);   @endphp             
                            {{ $local  }}
                        </th>
                    </tr>
                    <tr>
                        @php
                            $n_export = $controllerName->gasYearlyProductionUtilization($yrs, '\App\\gas_summary_of_gas_utilization', 'nlng_export');
                        @endphp
                        <th class="th_h">Gas Export</th>
                        <th class="th_h">{{number_format($n_export/1000, 2)}} </th>
                        <th class="th_h">
                            @php    $nlng = number_format(($n_export * 100 ) / $tot_g_util, 2);   @endphp             
                            {{ $nlng }}
                        </th>
                    </tr>
{{--                    <tr>--}}
{{--                        <th class="th_h" style="background: #ACE1AF!important;">Total Gas Utilised</th>--}}
{{--                        <th class="th_h" style="background: #ACE1AF!important;">--}}
{{--                            {{number_format( ($f_gas + $g_lift + $re_inj + $n_lpg + $g_nipp + $others + $n_export / 1), 2)}} --}}
{{--                        </th>--}}
{{--                        <th class="th_h" style="background: #ACE1AF!important;">--}}
{{--                            @php --}}
{{--                                $total_gas = ($fuel_gas + $gas_lift + $re_injection + $ngl_lpg + $nipp + $local + $nlng); --}}
{{--                            @endphp--}}
{{--                           {{number_format($total_gas, 2)}}        --}}
{{--                        </th>--}}
{{--                    </tr>--}}
                    @php
                        $gas_util_legend = ['1'=>'Fuel Gas', '2'=>'Gas Lift', '3'=>'Re-Injection', '4'=>'NGL/LPG', '5'=>'Local Supply (Power)', '6'=>'Local Supply (Others)', '7'=>'Gas Export'];

                        $gas_breakdown[0] = $fuel_gas;
                        $gas_breakdown[1] = $gas_lift;
                        $gas_breakdown[2] = $re_injection;
                        $gas_breakdown[3] = $ngl_lpg;
                        $gas_breakdown[4] = $nipp;
                        $gas_breakdown[5] = $local;
                        $gas_breakdown[6] = $nlng;
                        // $gas_breakdown[7] = (100 - $total_gas);                                    
                    @endphp
                    </tbody>
                @endif
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_37"> 
            @if($controllerName->bottomRemarks(37, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(37, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(37, $yrs)) {!! $controllerName->bottomRemarksTemp(37, $yrs)->remark !!}
            @endif
        </div>


        <div class="col-md-10 col-md-offset-1 chart-pad">
            <i class="pull-left" style="font-size: 10px"> </i>
            <div class="frame" style="">
                <canvas id="gasUtilFactorPieChart"></canvas>
            </div>
            
            <div class="fig1_36 figure">
                @if($controllerName->getFigure(37, $yrs)) Figure {!! $controllerName->getFigure(37, $yrs)->figure_no_1 !!} : 
                       {!! $controllerName->getFigure(37, $yrs)->figure_title_1 !!} 
                @elseif($controllerName->getFigure(37, $yrs-1)) Figure {!! $controllerName->getFigure(37, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(37, $yrs-1)->figure_title_1 !!} 
                @endif
            </div>
        </div>

    </div>  </div>



    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 38) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>38,'yrs'=>$yrs, 'remark'=>' Gas Prodution and Utilization Summary'])

        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;">Month</th>
                    <th style="background: #A3C1AD!important;">Total Gas Produced</th>
                    <th style="background: #A3C1AD!important;">Total Gas Utilised</th>
                    <th style="background: #A3C1AD!important;">Total Gas Flared</th>
                    <th style="background: #A3C1AD!important;">% Flared</th>
                </tr>
                
                <tbody>
                @php
                    $prod_tot = 0;   $tot_util = 0;   $tot_fla = 0;   $per_fla = 0;   $i=1;
                    $prod_tot_g = 0;   $tot_util_g = 0;   $tot_fla_g = 0;   $per_fla_g = 0;   $i=1;
                @endphp
                @forelse($m_arr as $month)
                    <tr>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$month}}</th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php
                                $prod_tot = $controllerName->gasProductionUtilization($yrs, $month, '\App\\gas_summary_of_gas_production', 'total');   $prod_tot_g += $prod_tot;
                            @endphp {{number_format($prod_tot/1000, 2)}}
                        </th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php
                                $tot_util = $controllerName->gasProductionUtilization($yrs, $month, '\App\\gas_summary_of_gas_utilization', 'total_gas_utilized');   $tot_util_g += $tot_util;
                            @endphp {{number_format($tot_util/1000, 2)}}
                        </th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php
                                $tot_fla = $tot_util = $controllerName->gasProductionUtilization($yrs, $month, '\App\\gas_summary_of_gas_utilization', 'total_gas_flared');   $tot_fla_g += $tot_fla;
                            @endphp {{number_format($tot_fla/1000, 2)}}
                        </th>
                        <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php
                                if($prod_tot == 0){ $per_fla = 0.0; $per_fla_g += 0.0;}
                                else{   $per_fla = (($tot_fla * 100) / $prod_tot);       $per_fla_g += $per_fla; }  
                                
                            @endphp {{number_format($per_fla, 2)}} </th>
                    </tr>   @php $i++; @endphp
                @empty
                @endforelse

                <tr>
                    <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size">TOTAL</th>
                    <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size">
                    {{number_format(($prod_tot_g/1000),2)}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size">
                    {{number_format(($tot_util_g/1000),2)}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size">
                    {{number_format(($tot_fla_g/1000),2)}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size">
                    {{ number_format(($tot_fla_g * 100) / $prod_tot_g, 2) }}</b></th>
                    {{-- {{number_format(($per_fla_g / 12), 2)}}</b></th> --}}
                </tr>
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_38"> 
            @if($controllerName->bottomRemarks(38, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(38, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(38, $yrs)) {!! $controllerName->bottomRemarksTemp(38, $yrs)->remark !!}
            @endif
        </div>
        <br>

    </div>  </div>


    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 39) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>39,'yrs'=>$yrs, 'remark'=>' Flare Volume as a percentage of AG Production'])

        <div class="table-responsive">
            <div class="pull-left col-md-12" style="padding-left: 0px">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">Year</th>
                        <th style="background: #A3C1AD!important;">Total Produced MMscf</th>
                        <th style="background: #A3C1AD!important;">Total Gas Flared MMscf</th>
                        <th style="background: #A3C1AD!important;">% Flared</th>
                    </tr>
                    
                    <tbody>
                    @php
                        $gflaredChart[] = 0; $gasProdChart[] = 0; $gasUtilChart[] = 0; $gasFlarChart[] = 0; 
                        $tot_u = 0;  $tot_f = 0;  $p_flar = 0;  $chartYear[] = '';    $i=1;
                    @endphp
                    @forelse($array_year_10 as $k=>$year)
                        @php
                            $t_ag = $controllerName->gasYearlyProductionUtilization($year, '\App\\gas_summary_of_gas_production', 'ag');
                            $t_ag_nag = $controllerName->gasYearlyProductionUtilization($year, '\App\\gas_summary_of_gas_production', 'total');
                            $tot_u = $controllerName->gasYearlyProductionUtilization($year, '\App\\gas_summary_of_gas_utilization', 'total_gas_utilized');
                            $tot_f = $controllerName->gasYearlyProductionUtilization($year, '\App\\gas_summary_of_gas_utilization', 'total_gas_flared');
                            $total = ($t_ag + $tot_f);
                        @endphp 
                        @if($total != 0)
                            <tr>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$year}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                    {{number_format($t_ag_nag/1000, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($tot_f/1000, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>

                                    @php   
                                        if($t_ag == 0){ $p_flar = 0.0; }


                                        else{ $p_flar = ((($tot_f * 100) / $t_ag_nag)); }
                                    @endphp    {{number_format($p_flar, 2)}} 
                                </th>
                                @php
                                    $gflaredChart[$k] = $p_flar;

                                    // GAS Production, Gas Utilization, Gas Flared
                                    $gasProdChart[$k] = $t_ag;

                                    $gasUtilChart[$k] = $tot_u;

                                    $gasFlarChart[$k] = $tot_f;
                                    $chartYear[$i] = $year;   $i++;
                                @endphp
                            </tr>
                        @endif
                    @empty
                    @endforelse   {{-- @php  \array_splice($chartYear, 0, 2);     @endphp --}}

                    </tbody>
                </table>
            </div>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_39"> 
            @if($controllerName->bottomRemarks(39, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(39, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(39, $yrs)) {!! $controllerName->bottomRemarksTemp(39, $yrs)->remark !!}
            @endif
        </div>
        <br>

        <p style="margin-bottom: 200px !important"></p>

        <div class="row">
            <div class="col-md-6 canvas-pad-right">  <i class="pull-left" style="font-size: 10px"> </i>
                <div class="frame" style="">
                    <canvas id="AgFlaredChart"></canvas>
                </div>
                
                <div class="fig1_39 figure">
                    @if($controllerName->getFigure(39, $yrs)) Figure {!! $controllerName->getFigure(39, $yrs)->figure_no_1 !!} : 
                           {!! $controllerName->getFigure(39, $yrs)->figure_title_1 !!} 
                    @elseif($controllerName->getFigure(39, $yrs-1)) Figure {!! $controllerName->getFigure(39, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(39, $yrs-1)->figure_title_1 !!} 
                    @endif
                </div>
            </div>

            <div class="col-md-6 canvas-pad-left">
                <div class="frame" style="">
                    <canvas id="gasProdUtilFlarChart"></canvas>
                </div>
                
                <div class="fig39_39 figure">
                    @if($controllerName->getFigure(39, $yrs)) Figure {!! $controllerName->getFigure(39, $yrs)->figure_no_2 !!} : 
                           {!! $controllerName->getFigure(39, $yrs)->figure_title_2 !!} 
                    @elseif($controllerName->getFigure(39, $yrs-1)) Figure {!! $controllerName->getFigure(39, $yrs-1)->figure_no_2 !!} : {!! $controllerName->getFigure(39, $yrs-1)->figure_title_2 !!} 
                    @endif
                </div>
            </div>
            
        </div>
        <br>

    </div>  </div>




    <p style="margin-bottom: 300px !important"></p>

    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 40) == 0) display: none; @endif">
           
        @include('publication.partials.tablehead',['t_id'=>40,'yrs'=>$yrs, 'remark'=>' Summary of Gas Production and Utilization'])

        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th style="font-size: 12px; background: #A3C1AD !important;"><i style="color: transparent;">Years</i></th>
                    <th class="bfont-size" style="font-size: 12px; background: #A3C1AD !important;" colspan="3" style="text-align: center; border-right: thin dotted #fff">Production</th>
                    <th style="font-size: 12px; background: #A3C1AD !important;"><i style="color: transparent;">Fuel Gas</i></th>
                    <th style="font-size: 12px; background: #A3C1AD !important;"><i style="color: transparent;">Gas Lift</i></th>
                    <th style="font-size: 12px; background: #A3C1AD !important;"><i style="color: transparent;">Re-Injection</i></th>
                    <th style="font-size: 12px; background: #A3C1AD !important;"><i style="color: transparent;">NGL-LPG</i></th>
                    <th class="bfont-size" style="font-size: 12px; background: #A3C1AD !important;" colspan="3" style="text-align: center; border-right: thin dotted #fff">Sales</th>
                    <th style="font-size: 12px; background: #A3C1AD !important;"><i style="color: transparent;">Gas Util</i></th>
                    <th style="font-size: 12px; background: #A3C1AD !important;"><i style="color: transparent;">% Util</i></th>
                    <th style="font-size: 12px; background: #A3C1AD !important;"><i style="color: transparent;">Gas Flared</i></th>
                    <th style="font-size: 12px; background: #A3C1AD !important;"><i style="color: transparent;">% Flared</i></th>
                </tr>
                <tr class="th_head">
                    <th style="font-size: 12px; background: #A3C1AD !important;">Month</th>
                    <th style="font-size: 12px; background: #A3C1AD !important;">AG</th>
                    <th style="font-size: 12px; background: #A3C1AD !important;">NAG</th>
                    <th style="font-size: 12px; background: #A3C1AD !important;">Total</th>
                    <th style="font-size: 12px; background: #A3C1AD !important;">Fuel Gas</th>
                    <th style="font-size: 12px; background: #A3C1AD !important;">Gas Lift</th>
                    <th style="font-size: 12px; background: #A3C1AD !important;">Re-Injection</th>
                    <th style="font-size: 12px; background: #A3C1AD !important;">NGL-LPG</th>
                    <th style="font-size: 12px; background: #A3C1AD !important;">Gas To Nipp</th>
                    <th style="font-size: 12px; background: #A3C1AD !important;">Others</th>
{{--                    <th style="font-size: 12px; background: #A3C1AD !important;">NLNG Export</th>--}}
                    <th style="font-size: 12px; background: #A3C1AD !important;">Export</th>
                    <th style="font-size: 12px; background: #A3C1AD !important;">Gas Util</th>
                    <th style="font-size: 12px; background: #A3C1AD !important;">% Util</th>
                    <th style="font-size: 12px; background: #A3C1AD !important;">Gas Flared</th>
                    <th style="font-size: 12px; background: #A3C1AD !important;">% Flared</th>
                </tr>
                
                <tbody>
                    @php
                        $ag = 0; $nag = 0; $total = 0; $fuel_gas = 0; $gas_lift = 0; $re_injection = 0;
                        $ngl_lpg = 0; $gas_to_nipp = 0; $local_others = 0;  $nlng_export = 0;
                        $total_gas_utilized = 0; $percent_utilized = 0; $total_gas_flared = 0; $percent_flared = 0; 
                        $tot_perc_util = 0; $total_percent_flared = 0;   $i=1;
                    @endphp
                @if($month_arr)
                    @foreach($month_arr as $month_array)
                        <tr>
                            <th class="th_h f-11"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$month_array}} </th>
                            <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $ag += $AG = $controllerName->gasProductionUtilization($yrs, $month_array, '\App\\gas_summary_of_gas_production', 'ag'); @endphp     {{number_format($AG/1000, 2)}}
                            </th>
                            <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $nag += $NAG = $controllerName->gasProductionUtilization($yrs, $month_array, '\App\\gas_summary_of_gas_production', 'nag'); @endphp   {{number_format($NAG/1000, 2)}}
                            </th>
                            <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $total += $TOTAL = $controllerName->gasProductionUtilization($yrs, $month_array, '\App\\gas_summary_of_gas_production', 'total'); @endphp    {{number_format($TOTAL/1000, 2)}}
                            </th>
                            <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $fuel_gas += $F_GAS = $controllerName->gasProductionUtilization($yrs, $month_array, '\App\\gas_summary_of_gas_utilization', 'fuel_gas'); @endphp    {{number_format($F_GAS/1000, 2)}}
                            </th>
                            <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $gas_lift += $G_LIFT = $controllerName->gasProductionUtilization($yrs, $month_array, '\App\\gas_summary_of_gas_utilization', 'gas_lift'); @endphp   {{number_format($G_LIFT/1000, 2)}}
                            </th>
                            <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $re_injection += $RE_INJ = $controllerName->gasProductionUtilization($yrs, $month_array, '\App\\gas_summary_of_gas_utilization', 're_injection'); @endphp   {{number_format($RE_INJ/1000, 2)}}
                            </th>
                            <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $ngl_lpg += $L_LPG = $controllerName->gasProductionUtilization($yrs, $month_array, '\App\\gas_summary_of_gas_utilization', 'ngl_lpg'); @endphp   {{number_format($L_LPG/1000, 2)}}
                            </th>
                            <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $gas_to_nipp += $NIPP = $controllerName->gasProductionUtilization($yrs, $month_array, '\App\\gas_summary_of_gas_utilization', 'gas_to_nipp'); @endphp     {{number_format($NIPP/1000, 2)}}
                            </th>
                            <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $local_others += $OTHERS = $controllerName->gasProductionUtilization($yrs, $month_array, '\App\\gas_summary_of_gas_utilization', 'local_others'); @endphp   {{number_format($OTHERS/1000, 2)}}
                            </th>
                            <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $nlng_export += $EXPORT = $controllerName->gasProductionUtilization($yrs, $month_array, '\App\\gas_summary_of_gas_utilization', 'nlng_export'); @endphp    {{number_format($EXPORT/1000, 2)}}
                            </th>
                            <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $total_gas_utilized  += $UTIL = $controllerName->gasProductionUtilization($yrs, $month_array, '\App\\gas_summary_of_gas_utilization', 'total_gas_utilized'); @endphp  {{number_format($UTIL/1000, 2)}}
                            </th>
                            <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                @php  
                                if($TOTAL == 0){ $percent_utilized = 0.0; }else{ $percent_utilized = (($UTIL * 100) / $TOTAL); }
                                //for total
                                if($total == 0){ $tot_perc_util = 0.0; }else{ $tot_perc_util = (($total_gas_utilized * 100) / $total); }

                                @endphp   {{number_format($percent_utilized, 2)}}
                            </th>
                            <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                @php $total_gas_flared += $T_FLAR = $controllerName->gasProductionUtilization($yrs, $month_array, '\App\\gas_summary_of_gas_utilization', 'total_gas_flared'); @endphp  {{number_format($T_FLAR, 2)}}
                            </th>
                            <th class="th_h f-9"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                @php $percent_flared = (100 - $percent_utilized); $total_percent_flared = (100 - $tot_perc_util); @endphp
                                {{number_format($percent_flared, 2)}}
                            </th>  @php $i++; @endphp
                        </tr>
                    @endforeach
                        <tr>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">Total </b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="f-9">
                            {{number_format($ag/1000, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="f-9">
                            {{number_format($nag/1000, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="f-9">
                            {{number_format($total/1000, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="f-9">
                            {{number_format($fuel_gas/1000, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="f-9">
                            {{number_format($gas_lift/1000, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="f-9">
                            {{number_format($re_injection/1000, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="f-9">
                            {{number_format($ngl_lpg/1000, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="f-9">
                            {{number_format($gas_to_nipp/1000, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="f-9">
                            {{number_format($local_others/1000, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="f-9">
                            {{number_format($nlng_export/1000, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="f-9">
                            {{number_format($total_gas_utilized/1000, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="f-9">
                            {{number_format($tot_perc_util/1000, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="f-9">
                            {{number_format($total_gas_flared/1000, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="f-9">
                                {{number_format((($total_gas_flared * 100) / $total), 2)}}  </b></th>  
                           {{--  {{number_format($total_percent_flared, 2)}} </b></th>   --}}                                      
                        </tr>
                @endif
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_40"> 
            @if($controllerName->bottomRemarks(40, $yrs) && $table_of_contents) 
                {!! $controllerName->bottomRemarks(40, $yrs)->remark !!} 
            @elseif($controllerName->bottomRemarksTemp(40, $yrs)) {!! $controllerName->bottomRemarksTemp(40, $yrs)->remark !!}
            @endif
        </div>

        <button type="button" id="load_three" class="btn btn-default pull-right" onclick="loadThree()">Load More</button>
    </div>  </div> 




    <div id="section_three"> 
    </div>


             

<!-- INCLUDING CHARTS chart js-->
@include('publication.partials.chartTwo')



