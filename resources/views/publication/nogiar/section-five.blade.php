@php 
    use \App\Http\Controllers\PublicationController; 
    $controllerName = new PublicationController;


    //function to check if a number is even or odd
    function even($i)
    {
        if($i % 2 == 0){ return true; }
    }
@endphp

            




    <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 81) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>81,'yrs'=>$yrs, 'remark'=>' Yearly Accident Report - Downstream'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Year</th>
                <th style="background: #A3C1AD!important;">Incidents</th>
                <th style="background: #A3C1AD!important;">Work Related</th>
                <th style="background: #A3C1AD!important;">Non Work Related</th>
                <th style="background: #A3C1AD!important;">Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Non Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Work Related Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Non Work Related Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Fatality</th>
            </tr>
            
            <tbody> @php $i=1; @endphp
            @if($array_year_10)
                @foreach($array_year_10 as $year_arr_10)
                    <tr>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$year_arr_10}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'incidents')}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'work_related')}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'non_work_related')}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'fatal_incident')}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'non_fatal_incident')}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'work_related_fatal_incident')}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'non_work_related_fatal_incident')}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'fatality')}}</th>
                    </tr> @php $i++; @endphp
                @endforeach
            @endif
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_81"> 
        @if($controllerName->bottomRemarks(81, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(81, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(81, $yrs)) {!! $controllerName->bottomRemarksTemp(81, $yrs)->remark !!}
        @endif
        </div>
        <br>


        <div class="col-md-7 chart-pad"><br> <br>
        <i class="pull-left" style="font-size: 10px"> </i>
        <div class="frame" style="">
            <canvas id="downVSupLineChart"></canvas>
        </div>

        <div class="fig1_81 figure">
            @if($controllerName->getFigure(81, $yrs)) Figure {!! $controllerName->getFigure(81, $yrs)->figure_no_1 !!} : 
                   {!! $controllerName->getFigure(81, $yrs)->figure_title_1 !!} 
            @elseif($controllerName->getFigure(81, $yrs-1)) Figure {!! $controllerName->getFigure(81, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(81, $yrs-1)->figure_title_1 !!} 
            @endif
        </div>
        </div>

    </div>   </div>



        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 82) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>82,'yrs'=>$yrs, 'remark'=>' Yearly Accident Report - Industry Wide'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Year</th>
                <th style="background: #A3C1AD!important;">Incidents</th>
                <th style="background: #A3C1AD!important;">Work Related</th>
                <th style="background: #A3C1AD!important;">Non Work Related</th>
                <th style="background: #A3C1AD!important;">Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Non Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Work Related Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Non Work Related Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Fatality</th>
            </tr>
            
            <tbody> @php $i=1; @endphp
            @if($array_year_10)
                @foreach($array_year_10 as $year_arr_10)
                    <tr>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$year_arr_10}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'incidents') +
                                         $controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'incidents')}}
                        </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'work_related') +
                                          $controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'work_related')}}
                        </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'non_work_related') +
                                          $controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'non_work_related')}}
                        </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'fatal_incident') +
                                          $controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'fatal_incident')}}
                        </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'non_fatal_incident') +
                                          $controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'non_fatal_incident')}}
                        </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'work_related_fatal_incident') +
                                          $controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'work_related_fatal_incident')}}
                        </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'non_work_related_fatal_incident') +
                                          $controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'non_work_related_fatal_incident')}}
                        </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'fatality') +
                                          $controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_downstream', 'fatality')}}
                        </th>
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_82"> 
        @if($controllerName->bottomRemarks(82, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(82, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(82, $yrs)) {!! $controllerName->bottomRemarksTemp(82, $yrs)->remark !!}
        @endif
        </div>
        <br>


        <div class="col-md-7 chart-pad"><br> <br>
        <div class="frame" style="">
            <canvas id="incSafeBarChart"></canvas>
        </div>

        <div class="fig1_82 figure">
            @if($controllerName->getFigure(82, $yrs)) Figure {!! $controllerName->getFigure(82, $yrs)->figure_no_1 !!} : 
                   {!! $controllerName->getFigure(82, $yrs)->figure_title_1 !!} 
            @elseif($controllerName->getFigure(82, $yrs-1)) Figure {!! $controllerName->getFigure(82, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(82, $yrs-1)->figure_title_1 !!} 
            @endif
        </div>
        </div>

        </div>   </div>


        <p style="margin-top: 60px !important"></p>


        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 83) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>83,'yrs'=>$yrs, 'remark'=>' Spill Incidents'])

        <div class="table-responsive">
            <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;">Month</th>
                    <th style="background: #A3C1AD!important;">Natural Accident</th>
                    <th style="background: #A3C1AD!important;">Corrosion</th>
                    <th style="background: #A3C1AD!important;">Equipment Failure</th>
                    <th style="background: #A3C1AD!important;">Sabotage</th>
                    <th style="background: #A3C1AD!important;">Human Error</th>
                    <th style="background: #A3C1AD!important;">YTBD</th>
                    <th style="background: #A3C1AD!important;">Mystery</th>
                    <th style="background: #A3C1AD!important;">Total Spill</th>
                    <th style="background: #A3C1AD!important;">Volume Spill</th>
                </tr>
                
                <tbody> @php $na = 0; $co = 0; $ef = 0; $sa = 0; $he = 0; $yt = 0; $my = 0; $to = 0; $vo = 0; $i=1; @endphp
                @if($spill)
                    @foreach($spill as $spill)
                        <tr>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$spill->month}}</th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$spill->natural_accident}}       @php $na += $spill->natural_accident @endphp </th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$spill->corrosion}}              @php $co += $spill->corrosion @endphp</th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$spill->equipment_failure}}      @php $ef += $spill->equipment_failure @endphp</th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$spill->sabotage}}               @php $sa += $spill->sabotage @endphp</th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$spill->human_error}}            @php $he += $spill->human_error @endphp</th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$spill->ytbd}}                   @php $yt += $spill->ytbd @endphp</th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$spill->mystery}}                @php $my += $spill->mystery @endphp</th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{$spill->total_no_of_spills}}     @php $to += $spill->total_no_of_spills @endphp</th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                {{number_format($spill->volume_spilled, 2)}}         @php $vo += $spill->volume_spilled @endphp</th>
                        </tr> @php $i++; @endphp
                    @endforeach
                @endif
                <tr style="background: #A3C1AD">
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">Total</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($na, 2)}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($co, 2)}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($ef, 2)}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($sa, 2)}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($he, 2)}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($yt, 2)}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($my, 2)}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($to, 2)}}</b></th>
                    <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($vo, 2)}}</b></th>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_83"> 
        @if($controllerName->bottomRemarks(83, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(83, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(83, $yrs)) {!! $controllerName->bottomRemarksTemp(83, $yrs)->remark !!}
        @endif 
        </div>
        <br>

        <div class="col-md-8 col-md-offset-2 chart-pad"><br> <br>

        <div class="frame" style="">
            <canvas id="spillPieChart"></canvas>
        </div>

        <div class="fig1_83 figure">
            @if($controllerName->getFigure(83, $yrs)) Figure {!! $controllerName->getFigure(83, $yrs)->figure_no_1 !!} : 
                   {!! $controllerName->getFigure(83, $yrs)->figure_title_1 !!} 
            @elseif($controllerName->getFigure(83, $yrs-1)) Figure {!! $controllerName->getFigure(83, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(83, $yrs-1)->figure_title_1 !!} 
            @endif
        </div>
        </div>

        </div>   </div>



        <p style="margin-top: 60px !important"></p>

        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 84) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>84,'yrs'=>$yrs, 'remark'=>' Spill Incidence Summary'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Year</th>
                <th style="background: #A3C1AD!important;">Number of Spills</th>
                <th style="background: #A3C1AD!important;">Quantity Spilled (Barrels))</th>
            </tr>
            

            <tbody>  @php $i=1; @endphp
            @if($array_year_10)
                @foreach($array_year_10 as $arr_year_10)
                @php
                    $t_spill = $controllerName->yearlySpills($arr_year_10, 'total_no_of_spills');
                    $v_spill = $controllerName->yearlySpills($arr_year_10, 'volume_spilled');
                    $total = ($t_spill + $v_spill);
                @endphp
                    @if($total != 0)
                    <tr style="">
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$arr_year_10}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($t_spill, 0)}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($v_spill, 2)}}</th>
                        @php $i++; @endphp
                    </tr>
                    @endif
                @endforeach
            @endif
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_84"> 
        @if($controllerName->bottomRemarks(84, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(84, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(84, $yrs)) {!! $controllerName->bottomRemarksTemp(84, $yrs)->remark !!}
        @endif 
        </div>

        </div>   </div>



        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 85) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>85,'yrs'=>$yrs, 'remark'=>' Produced Water Volumes Generated'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Company</th>
                <th style="background: #A3C1AD!important;">Facility</th>
                <th style="background: #A3C1AD!important;">Terrain</th>
                <th style="background: #A3C1AD!important;">Contract</th>
                <th style="background: #A3C1AD!important;">Volume/Day (Bbls)</th>
            </tr>
            
            <tbody>  @php $i=1; @endphp
            @if($water_volume)
                @foreach($water_volume as $water_volume)
                    <tr>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$i}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$water_volume->company?$water_volume->company->company_name:''}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$water_volume->facility_id}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$water_volume->terrain}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$water_volume->concession_id}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($water_volume->volume, 0)}}</th>
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_85"> 
        @if($controllerName->bottomRemarks(85, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(85, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(85, $yrs)) {!! $controllerName->bottomRemarksTemp(85, $yrs)->remark !!}
        @endif 
        </div>
        <br>

        </div>   </div>



        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 86) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>86,'yrs'=>$yrs, 'remark'=>' Produced Water Volumes Generated'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">  @php $wbmc = 0; $obmc = 0; $wbm = 0; $obm = 0;  $i=1;  @endphp
                <th style="background: #A3C1AD!important;">Month</th>
                <th style="background: #A3C1AD!important;">Sum of WBMC (Mt)</th>
                <th style="background: #A3C1AD!important;">Sum of OBMC (Mt)</th>
                <th style="background: #A3C1AD!important;">Sum of Spent WBM (Mt)</th>
                <th style="background: #A3C1AD!important;">Sum of Spent OBM (Mt)</th>
            </tr>
            
            <tbody>
            @if($waste_volume)
                @foreach($waste_volume as $waste_volume)
                    <tr>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$waste_volume->month}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($waste_volume->sum_of_wbmc, 2)}}    @php $wbmc += $waste_volume->sum_of_wbmc @endphp </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($waste_volume->sum_of_obmc, 2)}}    @php $obmc += $waste_volume->sum_of_obmc @endphp </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($waste_volume->sum_of_spent_wbm, 2)}} @php $wbm += $waste_volume->sum_of_spent_wbm @endphp </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($waste_volume->sum_of_spent_obm, 2)}} @php $obm += $waste_volume->sum_of_spent_obm @endphp </th>
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif
            <tr style="background: #A3C1AD">
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">Grand Total</b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($wbmc, 2)}}</b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($obmc, 2)}}</b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($wbm, 2)}}</b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($obm, 2)}}</b></th>
            </tr>
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_86"> 
        @if($controllerName->bottomRemarks(86, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(86, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(86, $yrs)) {!! $controllerName->bottomRemarksTemp(86, $yrs)->remark !!}
        @endif
        </div>

        </div>   </div>



        <p style="margin-top: 60px !important"></p>

        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 87) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>87,'yrs'=>$yrs, 'remark'=>' Accredited Waste Managers'])

        <div class="table-responsive">
        <table class="table table-condensed table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Company</th>
                <th style="background: #A3C1AD!important;">Type of Facility</th>
                <th style="background: #A3C1AD!important;">Location Area</th>
                <th style="background: #A3C1AD!important;">Operational Status</th>
            </tr>
            
            <tbody>  @php $i=1; @endphp
            @if($acc_waste_manager)
                @foreach($acc_waste_manager as $acc_waste_mgt)
                    <tr>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$i}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$acc_waste_mgt->company?$acc_waste_mgt->company->company_name:''}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @if($acc_waste_mgt->type_of_facility)
                                {{$acc_waste_mgt->type_of_facility->facility_type_name.' : '.$acc_waste_mgt->facility_description}}
                            @endif
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$acc_waste_mgt->state_id}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$acc_waste_mgt->operational_status_id}}</th>
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_87"> 
        @if($controllerName->bottomRemarks(87, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(87, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(87, $yrs)) {!! $controllerName->bottomRemarksTemp(87, $yrs)->remark !!}
        @endif
        </div>

        </div>   </div>



        <p style="margin-top: 100px !important"></p>

        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 88) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>88,'yrs'=>$yrs, 'remark'=>' Summary of Waste Management Facilities'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Type of Facility</th>
                <th style="background: #A3C1AD!important;">Operational Permit</th>
            </tr>
            
            <tbody>  @php $i=1; @endphp
            @if($type_fac_types)     {{-- contigencies --}}
                @foreach($type_fac_types as $type_fac_type)
                    <tr>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$i}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$type_fac_type->facility_type_name}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->countManagementFacility($type_fac_type->id)}}</th>
                    </tr> @php $i++; @endphp
                @endforeach
            @endif
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_88"> 
        @if($controllerName->bottomRemarks(88, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(88, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(88, $yrs)) {!! $controllerName->bottomRemarksTemp(88, $yrs)->remark !!}
        @endif
        </div>

        </div>   </div>



        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 89) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>89,'yrs'=>$yrs, 'remark'=>' Oil Spill Contingency Plan Activation Exercises'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Location</th>
                <th style="background: #A3C1AD!important;">Terrain</th>
                <th style="background: #A3C1AD!important;">Nos of Companies for Oscp/Fi</th>
                <th style="background: #A3C1AD!important;">Actual Nos of Companies Audited</th>
            </tr>
            
            <tbody> @php $i=1; @endphp
            @forelse($contigencies as $contigency)
                <tr>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$i}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$contigency->type?$contigency->type->type_name:''}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$contigency->terrain?$contigency->terrain->terrain_name:''}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$contigency->no_of_company}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$contigency->actual_no_of_company}}</th>
                </tr>  @php $i++; @endphp
            @empty
            @endforelse
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_89"> 
        @if($controllerName->bottomRemarks(89, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(89, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(89, $yrs)) {!! $controllerName->bottomRemarksTemp(89, $yrs)->remark !!}
        @endif
        </div>

        </div>   </div>


        {{-- <p style="margin-top: 100px !important"></p> --}}

        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 90) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>90,'yrs'=>$yrs, 'remark'=>' Number Of Petitions Received'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Petitioner</th>
                <th style="background: #A3C1AD!important;">Petitionee</th>
                <th style="background: #A3C1AD!important;">Category</th>
                <th style="background: #A3C1AD!important;">Action Taken</th>
                <th style="background: #A3C1AD!important;">Status</th>
            </tr>
            
            <tbody>    @php $i=1; @endphp
                @forelse($pettitions as $pettition)
                    <tr> 
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$i}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$pettition->petitioner}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$pettition->petitionee}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$pettition->category?$pettition->category->category_name:''}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$pettition->action?$pettition->action->action_name:''}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$pettition->status?$pettition->status->status_name:''}}</th>
                    </tr>    @php $i++; @endphp
                @empty
                @endforelse
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_90"> 
        @if($controllerName->bottomRemarks(90, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(90, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(90, $yrs)) {!! $controllerName->bottomRemarksTemp(90, $yrs)->remark !!}
        @endif
        </div>

        </div>   </div>


        <p style="margin-top: 160px !important"></p>

        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 91) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>91,'yrs'=>$yrs, 'remark'=>' Request For Approvals – Chemicals'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                {{-- <th style="background: #A3C1AD!important;">#</th> --}}
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Chemical Type</th>
                <th style="background: #A3C1AD!important;">January</th>
                <th style="background: #A3C1AD!important;">Feruary</th>
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
            </tr>
            
            <tbody> @php $i=1; @endphp
                @forelse($drill_chemicals as $chemical)
                    <tr>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$chemical->chemical_type}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->approvedChem($yrs, 'January', $chemical->chemical_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->approvedChem($yrs, 'Febuary', $chemical->chemical_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->approvedChem($yrs, 'March', $chemical->chemical_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->approvedChem($yrs, 'April', $chemical->chemical_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->approvedChem($yrs, 'May', $chemical->chemical_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->approvedChem($yrs, 'June', $chemical->chemical_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->approvedChem($yrs, 'July', $chemical->chemical_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->approvedChem($yrs, 'August', $chemical->chemical_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->approvedChem($yrs, 'September', $chemical->chemical_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->approvedChem($yrs, 'October', $chemical->chemical_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->approvedChem($yrs, 'November', $chemical->chemical_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->approvedChem($yrs, 'December', $chemical->chemical_type)}}
                        </th>
                    </tr>  @php $i++; @endphp
                @empty
                @endforelse

                <tr class="th_head">
                    {{-- <th style="background: #A3C1AD!important;">#</th> --}}
                    <th style="background: #A3C1AD!important;">#</th>
                    <th style="background: #A3C1AD!important;">Status</th>
                    <th style="background: #A3C1AD!important;">January</th>
                    <th style="background: #A3C1AD!important;">Feruary</th>
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
                </tr>

                @php $i=1; @endphp
                @forelse($chem_status as $status)
                    <tr>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$status->status_id}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->chemicalStatus($yrs, 'January', $status->status_id)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->chemicalStatus($yrs, 'Febuary', $status->status_id)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->chemicalStatus($yrs, 'March', $status->status_id)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->chemicalStatus($yrs, 'April', $status->status_id)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->chemicalStatus($yrs, 'May', $status->status_id)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->chemicalStatus($yrs, 'June', $status->status_id)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->chemicalStatus($yrs, 'July', $status->status_id)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->chemicalStatus($yrs, 'August', $status->status_id)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->chemicalStatus($yrs, 'September', $status->status_id)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->chemicalStatus($yrs, 'October', $status->status_id)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->chemicalStatus($yrs, 'November', $status->status_id)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->chemicalStatus($yrs, 'December', $status->status_id)}}
                        </th>
                    </tr>  @php $i++; @endphp
                @empty
                @endforelse
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_91"> 
        @if($controllerName->bottomRemarks(91, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(91, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(91, $yrs)) {!! $controllerName->bottomRemarksTemp(91, $yrs)->remark !!}
        @endif
        </div>

        </div>   </div>


        <p style="margin-top: 100px !important"></p>

        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 92) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>92,'yrs'=>$yrs, 'remark'=>' Request For Accredited Laboratories'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Laboratory Service</th>
                <th style="background: #A3C1AD!important;">Lagos Zone</th>
                <th style="background: #A3C1AD!important;">Port Harcourt Zone</th>
                <th style="background: #A3C1AD!important;">Warri Zone</th>
                <th style="background: #A3C1AD!important;">Total</th>
            </tr>
            
            <tbody>
            @php
                $lag = 0; $phc = 0; $war = 0; $total = 0;  $lag_ = 0; $phc_ = 0; $war_ = 0; $total_ = 0;  $i=1;
            @endphp
            @forelse($accr_laboratories as $accr_lab)
                <tr>
                    @php
                        $lag_ = $controllerName->accreditedLabs($accr_lab->laboratory_services, 3);
                        $phc_ = $controllerName->accreditedLabs($accr_lab->laboratory_services, 4);
                        $war_ = $controllerName->accreditedLabs($accr_lab->laboratory_services, 6);

                        $lag += $lag_;    $phc += $phc_;    $war += $war_;
                    @endphp
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$i}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$accr_lab->laboratory_services}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$lag_}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$phc_}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$war_}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$lag_ + $phc_ + $war_}} </th>
                </tr> @php $i++; @endphp
            @empty
            @endforelse
            <tr>
                <th style="background: #A3C1AD!important;" colspan="2"><b class="bfont-size"> Total </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{$lag}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{$phc}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{$war}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{$lag + $phc + $war}} </b></th>
            </tr>
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_92"> 
        @if($controllerName->bottomRemarks(92, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(92, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(92, $yrs)) {!! $controllerName->bottomRemarksTemp(92, $yrs)->remark !!}
        @endif 
        </div>

        </div>   </div>



        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 93) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>93,'yrs'=>$yrs, 'remark'=>' Radiation Safety Permit'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Well Type</th>
                <th style="background: #A3C1AD!important;">January</th>
                <th style="background: #A3C1AD!important;">Feruary</th>
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
            </tr>
            
            <tbody> @php $i=1; @endphp
                @forelse($rad_well_types as $well)
                    <tr>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$well->well_type}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->radiationSafetyPermit($yrs, 'January', $well->well_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->radiationSafetyPermit($yrs, 'Febuary', $well->well_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->radiationSafetyPermit($yrs, 'March', $well->well_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->radiationSafetyPermit($yrs, 'April', $well->well_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->radiationSafetyPermit($yrs, 'May', $well->well_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->radiationSafetyPermit($yrs, 'June', $well->well_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->radiationSafetyPermit($yrs, 'July', $well->well_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->radiationSafetyPermit($yrs, 'August', $well->well_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->radiationSafetyPermit($yrs, 'September', $well->well_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->radiationSafetyPermit($yrs, 'October', $well->well_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->radiationSafetyPermit($yrs, 'November', $well->well_type)}}
                        </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->radiationSafetyPermit($yrs, 'December', $well->well_type)}}
                        </th>
                    </tr>  @php $i++; @endphp
                @empty
                @endforelse
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_93"> 
        @if($controllerName->bottomRemarks(93, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(93, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(93, $yrs)) {!! $controllerName->bottomRemarksTemp(93, $yrs)->remark !!}
        @endif
        </div>

        </div>   </div>



        <p style="margin-top: 100px !important"></p>

        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 94) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>94,'yrs'=>$yrs, 'remark'=>' Summary of Effluent Waste Discharge'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Company</th>
                <th style="background: #A3C1AD!important;">Well Name</th>
                <th style="background: #A3C1AD!important;">Spent WBM</th>
                <th style="background: #A3C1AD!important;">Spent OBM</th>
                <th style="background: #A3C1AD!important;">WBM Cuttings Generated</th>
                <th style="background: #A3C1AD!important;">OBM Cuttings Generated</th>
                <th style="background: #A3C1AD!important;">Waste Managers</th>
            </tr>
            
            <tbody> @php $i = 1; @endphp
                @forelse($effluents as $effluent)
                    <tr>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$effluent->company?$effluent->company->company_name:''}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$effluent->well_name}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$effluent->spent_wbm}}</th> 
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$effluent->spent_obm}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$effluent->wbm_generated}}</th> 
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$effluent->obm_generated}}</th> 
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$effluent->waste_manager}}</th> 
                    </tr> @php $i++; @endphp
                @empty
                @endforelse
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_94"> 
        @if($controllerName->bottomRemarks(94, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(94, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(94, $yrs)) {!! $controllerName->bottomRemarksTemp(94, $yrs)->remark !!}
        @endif
        </div>

        </div>   </div>



        <p style="margin-top: 100px !important"></p>

        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 95) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>95,'yrs'=>$yrs, 'remark'=>' Environmental Restoration Services'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Service</th>
                <th style="background: #A3C1AD!important;">Approval Status</th>
                <th style="background: #A3C1AD!important;">Approval (New)</th>
                <th style="background: #A3C1AD!important;">Approval (Renewal)</th>
                <th style="background: #A3C1AD!important;">Total</th>
            </tr>
            
            @php $new = 0; $ren = 0; $tot = 0;  $i=1; @endphp
            <tbody>
            @forelse($env_restorations as $env_restoration)
                <tr>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$i}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$env_restoration->service}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @if($env_restoration->status){{$env_restoration->status->status_name}}@endif</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$env_restoration->new}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$env_restoration->renew}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$env_restoration->total}}</th>
                    @php
                        $new += $env_restoration->new;    $ren += $env_restoration->renew;
                        $tot += ($env_restoration->total);  $i++;
                    @endphp
                </tr>
            @empty
            @endforelse
            <tr>
                <th style="background: #A3C1AD!important;" colspan="3"><b class="bfont-size"> Total </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{$new}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{$ren}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{$tot}} </b></th>
            </tr>
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_95"> 
        @if($controllerName->bottomRemarks(95, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(95, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(95, $yrs)) {!! $controllerName->bottomRemarksTemp(95, $yrs)->remark !!}
        @endif
        </div>

        </div>   </div>



        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 96) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>96,'yrs'=>$yrs, 'remark'=>' Environmental Studies'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Month</th>
                @forelse($env_studies as $env_study)
                    <th style="background: #A3C1AD!important;">{{$env_study->type_name}}</th>
                @empty
                @endforelse
                <th style="background: #A3C1AD!important;">Total</th>
            </tr>
            
            @php
                $jan = 0; $feb = 0; $mar = 0; $apr = 0; $may = 0; $jun = 0; $jul = 0;
                $aug = 0; $sep = 0; $oct = 0; $nov = 0; $dec = 0; $tot = 0; $i=1;  $stu_typ = 0;
            @endphp
            <tbody>
                <tr>  
                    <th>January</th>
                        @forelse($env_studies as $type)
                            <th>
                                @php
                                    $jan += $stu_typ = $controllerName->environmentalStudies($yrs, 'JANUARY', $type->id);
                                @endphp
                                {{$stu_typ}}
                            </th>
                        @empty
                        @endforelse
                    <th>{{$jan}}</th>
                </tr>

                <tr>  
                    <th style="background: #ACE1AF!important;">February</th>
                        @forelse($env_studies as $type)
                            <th style="background: #ACE1AF!important;">
                                @php
                                    $feb += $stu_typ = $controllerName->environmentalStudies($yrs, 'FEBUARY', $type->id);
                                @endphp
                                {{$stu_typ}}
                            </th>
                        @empty
                        @endforelse
                    <th style="background: #ACE1AF!important;">{{$feb}}</th>
                </tr>

                <tr>  
                    <th>March</th>
                        @forelse($env_studies as $type)
                            <th>
                                @php
                                    $mar += $stu_typ = $controllerName->environmentalStudies($yrs, 'MARCH', $type->id);
                                @endphp
                                {{$stu_typ}}
                            </th>
                        @empty
                        @endforelse
                    <th>{{$mar}}</th>
                </tr>

                <tr>  
                    <th style="background: #ACE1AF!important;">April</th>
                        @forelse($env_studies as $type)
                            <th style="background: #ACE1AF!important;">
                                @php
                                    $apr += $stu_typ = $controllerName->environmentalStudies($yrs, 'APRIL', $type->id);
                                @endphp
                                {{$stu_typ}}
                            </th>
                        @empty
                        @endforelse
                    <th style="background: #ACE1AF!important;">{{$apr}}</th>
                </tr>

                <tr>  
                    <th>May</th>
                        @forelse($env_studies as $type)
                            <th>
                                @php
                                    $may += $stu_typ = $controllerName->environmentalStudies($yrs, 'MAY', $type->id);
                                @endphp
                                {{$stu_typ}}
                            </th>
                        @empty
                        @endforelse
                    <th>{{$may}}</th>
                </tr>

                <tr>  
                    <th style="background: #ACE1AF!important;">June</th>
                        @forelse($env_studies as $type)
                            <th style="background: #ACE1AF!important;">
                                @php
                                    $jun += $stu_typ = $controllerName->environmentalStudies($yrs, 'JUNE', $type->id);
                                @endphp
                                {{$stu_typ}}
                            </th>
                        @empty
                        @endforelse
                    <th style="background: #ACE1AF!important;">{{$jun}}</th>
                </tr>

                <tr>  
                    <th>July</th>
                        @forelse($env_studies as $type)
                            <th>
                                @php
                                    $jul += $stu_typ = $controllerName->environmentalStudies($yrs, 'JULY', $type->id);
                                @endphp
                                {{$stu_typ}}
                            </th>
                        @empty
                        @endforelse
                    <th>{{$jul}}</th>
                </tr>

                <tr>  
                    <th style="background: #ACE1AF!important;">August</th>
                        @forelse($env_studies as $type)
                            <th style="background: #ACE1AF!important;">
                                @php
                                    $aug += $stu_typ = $controllerName->environmentalStudies($yrs, 'AUGUST', $type->id);
                                @endphp
                                {{$stu_typ}}
                            </th>
                        @empty
                        @endforelse
                    <th style="background: #ACE1AF!important;">{{$aug}}</th>
                </tr>

                <tr>  
                    <th>September</th>
                        @forelse($env_studies as $type)
                            <th>
                                @php
                                    $sep += $stu_typ = $controllerName->environmentalStudies($yrs, 'SEPTEMBER', $type->id);
                                @endphp
                                {{$stu_typ}}
                            </th>
                        @empty
                        @endforelse
                    <th>{{$sep}}</th>
                </tr>

                <tr>  
                    <th style="background: #ACE1AF!important;">October</th>
                        @forelse($env_studies as $type)
                            <th style="background: #ACE1AF!important;">
                                @php
                                    $oct += $stu_typ = $controllerName->environmentalStudies($yrs, 'OCTOBER', $type->id);
                                @endphp
                                {{$stu_typ}}
                            </th>
                        @empty
                        @endforelse
                    <th style="background: #ACE1AF!important;">{{$oct}}</th>
                </tr>

                <tr>  
                    <th>November</th>
                        @forelse($env_studies as $type)
                            <th>
                                @php
                                    $nov += $stu_typ = $controllerName->environmentalStudies($yrs, 'NOVEMBER', $type->id);
                                @endphp
                                {{$stu_typ}}
                            </th>
                        @empty
                        @endforelse
                    <th>{{$nov}}</th>
                </tr>

                <tr>  
                    <th style="background: #ACE1AF!important;">December</th>
                        @forelse($env_studies as $type)
                            <th style="background: #ACE1AF!important;">
                                @php
                                    $dec += $stu_typ = $controllerName->environmentalStudies($yrs, 'DECEMBER', $type->id);
                                @endphp
                                {{$stu_typ}}
                            </th>
                        @empty
                        @endforelse
                    <th style="background: #ACE1AF!important;">{{$dec}}</th>
                </tr>
            <tr>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> Total </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">  </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">  </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">  </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">  </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">  </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">  </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">  </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">  </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">  </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">  </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">  </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">  </b></th>
            </tr>
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_96"> 
        @if($controllerName->bottomRemarks(96, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(96, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(96, $yrs)) {!! $controllerName->bottomRemarksTemp(96, $yrs)->remark !!}
        @endif
        </div>

        </div>   </div>



        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 97) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>97,'yrs'=>$yrs, 'remark'=>' Offshore Safety Permit (OSP) Summary'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Year</th>
                <th style="background: #A3C1AD!important;">PERSONNEL REGISTERED</th>
                <th style="background: #A3C1AD!important;">PERSONNEL CAPTURED</th>
                <th style="background: #A3C1AD!important;">PERMITS ISSUED</th>
            </tr>
            
            <tbody>  @php $i=1; @endphp
            @if($safety_permit)
                @foreach($safety_permit as $safety_permits)
                    <tr>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$safety_permits->year}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$safety_permits->personnel_registered}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$safety_permits->personnel_captured}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$safety_permits->permits_issued}}</th>
                    </tr> @php $i++; @endphp
                @endforeach
            @endif
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_97"> 
        @if($controllerName->bottomRemarks(97, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(97, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(97, $yrs)) {!! $controllerName->bottomRemarksTemp(97, $yrs)->remark !!}
        @endif 
        </div>
        <br>

        </div>   </div>



        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 98) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>98,'yrs'=>$yrs, 'remark'=>' Medical Emergency Training Centres'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Company</th>
                <th style="background: #A3C1AD!important;">Facility Location Address</th>
                <th style="background: #A3C1AD!important;">Approved Courses</th>
            </tr>
            
            <tbody>  @php $i=1; @endphp
            @forelse($med_centers as $med_center)
                <tr>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$med_center->companies}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$med_center->facility_address}}</th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$med_center->approved_courses}}</th>
                </tr> @php $i++; @endphp
            @empty
            @endforelse
            </tbody>
        </table>
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_98"> 
        @if($controllerName->bottomRemarks(98, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(98, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(98, $yrs)) {!! $controllerName->bottomRemarksTemp(98, $yrs)->remark !!}
        @endif
        </div>

        </div>   </div>

        @if(Auth::user()->role_obj->role_name == 'Admin' || 
        $contributors->contains('approver_id', Auth::user()->id) && $contributors->contains('division', 'HSE') )

        <div class="row"> <div class="col-md-12" style="text-align-right"> <br>
        <a data-toggle="tooltip" onclick="showmodal('approve_divisional_article')" onmousedown="setDivision('HSE')" style="color:#fff; font-size: 12px; margin-left: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right no-print" data-original-title="Approve All Articles for HSE"> <i class="fa fa-check"></i> Approve HSE Article </a>

        <a data-toggle="tooltip" onclick="showmodal('add_comment_div')" onmousedown="setDivision('HSE')" style="color:#fff; font-size: 12px" class="btn btn-danger btn-sm pull-right no-print" data-original-title="Reject Article"> <i class="fa fa-ban"></i> Reject HSE Article </a>
        </div> </div>

        @endif




        <!-- REVENUE --> 
        
        <p style=""></p>

        <div class="row" id="" style="padding: 0px;margin-top: 2130px !important; @if($controllerName->showHideTable($yrs, 99) == 0) display: none; @endif">

        @include('publication.partials.tablehead',['t_id'=>99,'yrs'=>$yrs, 'remark'=>' Actual Revenue Performance Summary'])

        <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Year</th>
                <th style="background: #A3C1AD!important;">Oil Royalty <i class="units">&#8358;</i></th>
                <th style="background: #A3C1AD!important;">Gas Sales Royalty <i class="units">&#8358;</i></th>
                <th style="background: #A3C1AD!important;">Gas Flare Penalty <i class="units">&#8358;</i></th>
                <th style="background: #A3C1AD!important;">Concession Rentals <i class="units">&#8358;</i></th>
                <th style="background: #A3C1AD!important;">MOR <i class="units">&#8358;</i></th>
                {{-- <th style="background: #A3C1AD!important;">Signature Bonus <i class="units">&#8358;</i></th> --}}
                <th style="background: #A3C1AD!important;">Total Revenue <i class="units">&#8358;</i></th>
            </tr>
            
            @php 
                $oil = 0; $gas = 0; $fla = 0; $con = 0; $mis = 0; $sig = 0; $tot = 0; $actual[] = '';
                $oil_y[] = ''; $gas_y[] = ''; $fla_y[] = ''; $con_y[] = ''; $mis_y[] = ''; $sig_y[] = '';  $i=1; 
            @endphp
            <tbody>
                @foreach($price_legend as $k => $year)
                    @php 
                        $oil += $OIL = $controllerName->revenueActual($year, 'oil_actual'); 
                        $fla += $FLA = $controllerName->revenueActual($year, 'gas_flare_actual');
                        $con += $CON = $controllerName->revenueActual($year, 'concession_actual');
                        $gas += $GAS = $controllerName->revenueActual($year, 'gas_actual');
                        $mis += $MIS = $controllerName->revenueActual($year, 'misc_actual');
                        // $sig += $SIG = $controllerName->revenueActual($year, 'signature_bonus');
                        $tot += $TOT = $controllerName->revenueActual($year, 'total_actual');

                        $oil_y[$k] = $OIL;    $gas_y[$k] = $GAS;     $fla_y[$k] = $FLA; 
                        $con_y[$k] = $CON;    $mis_y[$k] = $MIS;  $i++;     //$sig_y[$k] = $SIG;
                    @endphp
                    @if($tot != 0)
                    <tr>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$year}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($OIL, 2)}} </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($GAS, 2)}} </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($FLA, 2)}} </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($CON, 2)}} </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($MIS, 2)}} </th>
                        {{-- <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($SIG, 2)}} </th> --}}
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($TOT, 2)}} </th>
                    </tr>
                    @endif
                @endforeach
                    @if($TOT != 0)
                        <tr>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">Total</b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($oil, 2)}}</b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($gas, 2)}}</b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($fla, 2)}}</b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($con, 2)}}</b></th>
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($mis, 2)}}</b></th>
                            {{-- <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($sig, 2)}}</b></th> --}}
                            <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($tot, 2)}}</b></th>
                        </tr>
                    @endif
            </tbody>
        </table>

        @php
            $actual_legend =  ['Oil Royalty', 'Gas Sales Royalty', 'Gas Flare', 'Concession Rental', 'MOR'];

            $actual[0] = $controllerName->revenueActual($yrs, 'oil_actual');
            $actual[1] = $controllerName->revenueActual($yrs, 'gas_actual'); 
            $actual[2] = $controllerName->revenueActual($yrs, 'gas_flare_actual'); 
            $actual[3] = $controllerName->revenueActual($yrs, 'concession_actual'); 
            $actual[4] = $controllerName->revenueActual($yrs, 'misc_actual'); 
            // $actual[5] = $controllerName->revenueActual($yrs, 'signature_bonus');

            $totRev = ($actual[0] + $actual[1] + $actual[2] + $actual[3] + $actual[4]); //+ $actual[5]);
            //dd($oil_y); 
        @endphp
        </div>

        <div class="row col-md-12 remark-div" id="bottomTab_99"> 
        @if($controllerName->bottomRemarks(99, $yrs) && $table_of_contents) 
            {!! $controllerName->bottomRemarks(99, $yrs)->remark !!} 
        @elseif($controllerName->bottomRemarksTemp(99, $yrs)) {!! $controllerName->bottomRemarksTemp(99, $yrs)->remark !!}
        @endif 
        </div>
        <br>

        <div class="row chart-pad" id="">
        <div class="col-md-6 canvas-pad-right">  <i class="pull-left" style="font-size: 10px"> </i>
            <div class="frame" style="">
                <canvas id="revaPieChart"></canvas>
            </div>
            
            <div class="fig1_99 figure">
                @if($controllerName->getFigure(99, $yrs)) Figure {!! $controllerName->getFigure(99, $yrs)->figure_no_1 !!} : 
                       {!! $controllerName->getFigure(99, $yrs)->figure_title_1 !!} 
                @elseif($controllerName->getFigure(99, $yrs-1)) Figure {!! $controllerName->getFigure(99, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(99, $yrs-1)->figure_title_1 !!} 
                @endif
            </div>
        </div>

        <div class="col-md-6 canvas-pad-left">
            <div class="frame" style="">
                <canvas id="revaLineChart"></canvas>
            </div>
            
            <div class="fig99_99 figure">
                @if($controllerName->getFigure(99, $yrs)) Figure {!! $controllerName->getFigure(99, $yrs)->figure_no_2 !!} : 
                       {!! $controllerName->getFigure(99, $yrs)->figure_title_2 !!} 
                @elseif($controllerName->getFigure(99, $yrs-1)) Figure {!! $controllerName->getFigure(99, $yrs-1)->figure_no_2 !!} : {!! $controllerName->getFigure(99, $yrs-1)->figure_title_2 !!} 
                @endif
            </div>
        </div>
        </div>

        </div>   </div>

        @if(Auth::user()->role_obj->role_name == 'Admin' || 
        $contributors->contains('approver_id', Auth::user()->id) && $contributors->contains('division', 'REVENUE') )

        <div class="row"> <div class="col-md-12" style="text-align-right"> <br>
        <a data-toggle="tooltip" onclick="showmodal('approve_divisional_article')" onmousedown="setDivision('REVENUE')" style="color:#fff; font-size: 12px; margin-left: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right no-print" data-original-title="Approve All Articles for Revenue"> <i class="fa fa-check"></i> Approve Revenue Article </a>

        <a data-toggle="tooltip" onclick="showmodal('add_comment_div')" onmousedown="setDivision('REVENUE')" style="color:#fff; font-size: 12px" class="btn btn-danger btn-sm pull-right no-print" data-original-title="Reject Article"> <i class="fa fa-ban"></i> Reject Revenue Article </a>
        </div> </div>

        @endif

        </div>
        <br>


        {{-- <textarea rows="10" class="summernote" name="complete" id="complete">{{$director_remark->content}}</textarea>

                <a href="#" id="testBtn" onclick="return false" class="btn btn-success btn-xs pull-right no-print" style="margin-left: 5px; margin-right: 25px">
                    <i class="fa fa-download"></i> Download </a> --}}




        {{-- GLOSSARY --}}
        <div class="table-responsive col-md-12" style="-webkit-print-color-adjust: exact!important;">
            <div style="width: 100%; text-align: center; font-size: 20px; background: #A3C1AD!important;"> 5.0 GLOSSARY ITEMS </div>
            @if($glossaries)
                <div style=""> {!!  $glossaries->content !!} </div>  @php $i++; @endphp 
            @endif     

            
        </div>



        {{-- <div class="table-responsive col-md-10 col-md-offset-1" style="font-size: 16px"><br> <br> <br>
        @if($glossaries)
        <h3>  </h3>

        {!!  $glossaries->content !!}
        @endif
        <br>
        </div> --}}

        @if(\Auth::user()->role_obj->role_name == 'Admin' || $pub_stages->contains('user_id', \Auth::user()->id))
        <div class="row" style="text-align: right;">

        {{-- AUTHENTICATION FOR REVIEWING AND APPROVING NOGIAR PUBLICATION --}}
        {{-- @if($review_approve)
        @if($review_approve->status == 0 && $review_stage->user_id == \Auth::user()->id)
        <button id="rev_btn" class="btn btn-primary pull-right no-print"
            style="font-size: 13px; padding: 2px 4px; margin-right: 10px; margin-bottom: 10px; margin-left: 10px"
            data-toggle="tooltip" onclick="showmodal('add_review')"
            title="Marked Publiction As Reviewed">Review
        </button>
        @elseif($review_approve->status == 1 && $approve_stage->user_id == \Auth::user()->id)
        <button id="appv_btn" class="btn btn-info pull-right no-print"
            style="font-size: 13px; padding: 2px 4px; margin-right: 10px; margin-bottom: 10px; margin-left: 10px"
            data-toggle="tooltip" onclick="showmodal('add_approval')" title="Approve This Publication">
        Approve
        </button>
        @endif
        @endif --}}

        <div class="col-xl-12 col-md-12 col-sm-12" style="position: fixed; bottom: 10px; left: 1px;">
        <button type="button" id="topBtn" class="btn btn-outline-dark waves-effect waves-light pull-left no-print" 
        onclick="topFunction()" style="margin-right: 5px; border-radius: 50%;"> <i class="fa fa-arrow-up"></i>
        </button>

        @if($stage->stage_id == 0)  {{-- CHECKING IF THE PDF HAS BEEN UPLOADED & ONLY THE INITIATOR CAN GENERATE TABLE HEADERS --}}
            {{-- @if(\Auth::user()->id == $stage->user_id || \Auth::user()->role_obj->role_name == 'Admin' && 
            $stage->save_upload >= 2) --}}
            <button type="button" id="genTabBtn" class="btn btn-info waves-effect waves-light pull-left no-print" 
            data-toggle="modal" data-target="#gen_tab_head" style="margin-right: 5px;">Generate Table Headers
            </button>
            {{-- @endif --}}
        @endif

        {{-- BUTTON TO ENABLE RESAVING AND UPLOADING TEMPORARY NOGIAR PDF --}}
        {{-- @if(\Auth::user()->id == $stage->user_id || \Auth::user()->role_obj->role_name == 'Admin' && 
        $stage->save_upload == 2) --}}
        {{-- @if(\Auth::user()->role_obj->role_name == 'Admin')
        <button type="button" id="saveUpBtn" class="btn btn-danger waves-effect waves-light pull-left no-print" 
        data-toggle="modal" data-target="#enable_save_uploadModal" style="margin-right: 5px; display: none;">Reset Process
        </button>
        @endif --}}
        {{-- @endif --}}

        @if($stage->stage_id == 3)
            @if(\Auth::user()->role_obj->role_name == 'Admin' || 
            ($pub_stages->contains('user_id', \Auth::user()->id) && $pub_stages->contains('position', 2)))
            <button type="button" id="sendToManager" class="btn btn-info waves-effect waves-light pull-left no-print"  
                data-toggle="modal" data-target="#sendNotifyModal" style="margin-right: 5px;" 
                onmousedown="setType('Initiator')">  <i class="fa fa-envelope-open"></i> Notify Manager 
            </button>
            @endif
        @endif

        @if($stage->stage_id == 4)
            @if($pub_stages->contains('user_id', \Auth::user()->id) && $pub_stages->contains('position', 3))
            <div id="man_div" style="">
                <button type="button" id="sendToBSP" class="btn btn-info waves-effect waves-light pull-left no-print"  
                    data-toggle="modal" data-target="#sendNotifyModal" style="margin-right: 5px;"
                    onmousedown="setType('Publication Manager')"> <i class="fa fa-check"></i> Send to B&SP
                </button>

                <button type="button" id="decToBSP" class="btn btn-danger waves-effect waves-light pull-left no-print"  
                    data-toggle="modal" data-target="#dec_appr_modal" style="margin-right: 5px;" 
                    onmousedown="setType('Publication Manager')"> <i class="fa fa-ban"></i> Decline {{$yrs}} Publication
                </button>
            </div>
            @endif
        @endif


        {{-- @if(\Auth::user()->id == 10 && $review_approve->status == 0) --}}
        {{-- button to send for approve by Head of Planning HP --}}
        {{-- @if($stage->stage_id == 3) --}}

        @if($stage->stage_id == 5)
            @if($pub_stages->contains('user_id', \Auth::user()->id) && $pub_stages->contains('position', 4))
            <div id="bsp_div" style="">
                <button type="button" id="sendToHP" class="btn btn-info waves-effect waves-light pull-left no-print"  
                data-toggle="modal" data-target="#sendNotifyModal" style="margin-right: 5px;" onmousedown="setType('B&SP - Budget & Strategic Planning')"> <i class="fa fa-check"></i> Send to HP
                </button>

                <button type="button" id="decToHP" class="btn btn-danger waves-effect waves-light pull-left no-print"  
                data-toggle="modal" data-target="#dec_appr_modal" style="margin-right: 5px;" onmousedown="setType('B&SP - Budget & Strategic Planning')"> <i class="fa fa-ban"></i> Decline {{$yrs}} Publication
                </button>
            </div>
            @endif
        @endif
        {{-- 
        @elseif($stage->stage_id == 5) --}}

        @if($stage->stage_id == 6)
            @if($pub_stages->contains('user_id', \Auth::user()->id) && $pub_stages->contains('position', 5))
            <div id="hp_div" style="">
                <button type="button" id="sendToDir" class="btn btn-info waves-effect waves-light pull-left no-print"  
                data-toggle="modal" data-target="#sendNotifyModal" style="margin-right: 5px;" 
                onmousedown="setType('HP - Head of Planning')"> <i class="fa fa-check"></i> Send to Director
                </button>

                <button type="button" id="decToDir" class="btn btn-danger waves-effect waves-light pull-left no-print"  
                data-toggle="modal" data-target="#dec_appr_modal" style="margin-right: 5px;" 
                onmousedown="setType('HP - Head of Planning')"> <i class="fa fa-ban"></i> Decline {{$yrs}} Publication
                </button>
            </div>
            @endif
        @endif
        {{-- 
        @elseif($stage->stage_id == 5) --}}
        @if($stage->stage_id == 7 && \Auth::user()->role_obj->role_name == 'Director')
            <div id="dir_div" style="">
                <button type="button" id="sendToPublish" class="btn btn-info waves-effect waves-light pull-left no-print"  
                data-toggle="modal" data-target="#sendNotifyModal" style="margin-right: 5px;" 
                onmousedown="setType('Director')"> <i class="fa fa-check"></i> Approve For Publishing
                </button>

                <button type="button" id="decToPublish" class="btn btn-danger waves-effect waves-light pull-left no-print"  
                data-toggle="modal" data-target="#dec_appr_modal" style="margin-right: 5px;" 
                onmousedown="setType('Director')"> <i class="fa fa-ban"></i> Decline For Publishing
                </button>
            </div>
        @endif

        {{-- @if(\Auth::user()->id == 10 && $review_approve->status == 0)
        @elseif($stage->stage_id == 6) --}}
        @if(\Auth::user()->role_obj->role_name == 'Admin')
        <button type="button" id="publishBtn" class="btn btn-info waves-effect waves-light pull-left printBtn no-print" 
        onclick="window.print();return false;" onmouseup="hideSaveAndUploadFinal()" style="margin-right: 5px;" onmousedown="setType('Director')"><i class="fa fa-print"></i> Publish Final Copy
        </button>
        @endif

        @if(\Auth::user()->role_obj->role_name == 'Admin')
        <button type="button" id="uploadFinalBtn" class="btn btn-dark waves-effect waves-light pull-left upBtn no-print" data-toggle="modal" data-target="#upl_final_pub" style="margin-right: 5px; display: none;"><i class="fa fa-upload"></i> Upload Final Copy
        </button>
        @endif
        {{-- @endif --}}
        </div>


        </div>
        @endif



                 

        <!-- INCLUDING CHARTS chart js-->
        @include('publication.partials.chartFive')