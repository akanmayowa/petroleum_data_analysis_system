@php 
    use \App\Http\Controllers\PublicationController; 
    $controllerName = new PublicationController;


    //function to check if a number is even or odd
    function even($i)
    {
        if($i % 2 == 0){ return true; }
    }
@endphp



{{-- INCLUDING NOGIAR CSS --}}
@include('publication.partials.publicationCSS')


<style>   

    tr { page-break-inside: avoid !important; }
    /*thead { display: table-header-group; }
    tbody { display: table-row-group; }

    table, tr, td, th, tbody, thead, tbody, td div 
    {
        page-break-inside: avoid !important;
    }*/

    .figure
    {
        font-size: 18px!important;
    }

</style>



@php
   
    if(!isset($perc_prod)){ $perc_prod = 0.0; }
    //SET NOGIAR PDF FILE PATH
    $pdf_name = 'NOGIAR '.$yrs.'.pdf';
    $dir = scandir('assets/images/publications/');
    $dir = array_diff($dir, array('.', '..', 'FINAL COPY', 'phpF0A5.tmp'));
    
    $file = 'assets/images/publications/'.$pdf_name.'/'.$pdf_name;



    // ###### for previous year ##### //
    //SET NOGIAR PDF FILE PATH
    $yrs_1 = $yrs - 1;
    $pdf_name_1 = 'NOGIAR '.$yrs_1.'.pdf';
    $dir_1 = scandir('assets/images/publications/');
    $dir_1 = array_diff($dir_1, array('.', '..', 'FINAL COPY', 'phpF0A5.tmp'));
    
    $file_1 = 'assets/images/publications/'.$pdf_name_1.'/'.$pdf_name_1;
    // ###### for previous year ##### //



    // dd(public_path($file));

    function getAbsoluteFile($year, $yrs_1)
    {
        $dir = scandir('assets/images/publications/');
        $dir = array_diff($dir, array('.', '..', 'FINAL COPY', 'phpF0A5.tmp'));
        $found = false;
        $file = '';
        // $yrs_1 = $yrs - 1;
        foreach ($dir as $k=>$v)
        {
          $t = explode($year, $v);  $t_1 = explode($yrs_1, $v);
          if(count($t) > 1){  $found = true; $file = $v;    break;  }
          elseif(count($t_1) > 1){ $found = true; $file = $v;    break; }
        }

        if ($found)
        {

           $dir = scandir('assets/images/publications/' . $file);
           $dir = array_diff($dir, array('.', '..', 'FINAL COPY', 'phpF0A5.tmp'));
           // dd($dir);
           foreach ($dir as $k=>$v){}
           // return 'assets/images/publications/' . $file . '/' . $dir[$k];
            return 'assets/images/publications/NOGIAR 2012.pdf/NOGIAR 2012.pdf';
        }
        else
        { 
            $dir = scandir('assets/images/publications/' . $file);
            $dir = array_diff($dir, array('.', '..', 'FINAL COPY', 'phpF0A5.tmp'));
            // dd($dir);
            foreach ($dir as $k=>$v){}
            // return 'assets/images/publications/' . $file . '/' . $dir[$k];     
            return 'assets/images/publications/NOGIAR 2012.pdf/NOGIAR 2012.pdf';       
        } 

     }

    function test($file, $file_1)
    {
        $r = [];    //dd($file);         

        // Parse pdf file and build necessary objects.
        $parser = new \Smalot\PdfParser\Parser();
        
        // dd(($file_1));

        if(file_exists($file))
        {   $pdf = $parser->parseFile($file);   }else{   $pdf = $parser->parseFile($file_1);   }      
           
        // Retrieve all pages from the pdf file.
        $pages  = $pdf->getPages();

        // Loop over each page to extract text.
        foreach ($pages as $k=>$page)
        {
            // echo $page->getText() . '<hr /><br />';
            $r[] = ['data'=>utf8_decode($page->getText()), 'page'=>($k + 1) ];             
        }  //$rrr = json_encode($r);  dd($rrr);
        return $r;            

    }

       
     // echo $file;  

    $file = getAbsoluteFile($yrs, $yrs_1);

    $file = public_path($file);

    // test($file, $file_1);

    if(file_exists($file) )
    {
        $r = test($file, $file_1); 
    }else{   $r = [];    } 

@endphp
      



{{-- INCLUDING NOGIAR FLOATING BUTTONS --}}
@include('publication.partials.publicationButtons')





{{-- INCLUDING NOGIAR CSS --}}
@include('publication.partials.tableOfContent')


{{-- PRINT PAGE BREAK --}}
<p class="page-break"></p>








<!-- PUBLICATION  -->

{{-- @php $remarks = \App\NOGIARpublicationRemark::where('year', $yrs)->get(); @endphp --}}

<!-- CHECKING IF THERE IS PUBLICATION FOR THE SELECTED TO SHOW BASE DATA AND CHARTS -->
@php   $tableID = [];    $year = $yrs;  $remark = ''; @endphp


{{-- <div class="row" @if(isset($review_approve->content) &&  $review_approve->status !=3) @else style="display:none" @endif> --}}
<div class="row" @if(isset($stage)) @else style="display:none" @endif>
    <div class="col-md-12">

        {{-- UPSTREAM --}}
        
        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 1) == 0) display: none; @endif">
       
            @include('publication.partials.tablehead',['t_id'=>1,'yrs'=>$yrs, 'remark'=>' Multi-client Projects'])

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">#</th>
                        <th style="background: #A3C1AD!important;">Company</th>
                        <th style="background: #A3C1AD!important;">Survey Name</th>
                        <th style="background: #A3C1AD!important;">Geological Province</th>
                        <th style="background: #A3C1AD!important;">Type of Survey</th>
                        <th style="background: #A3C1AD!important;">Quantum of Survey(Km/Km1)</th>
                        <th style="background: #A3C1AD!important;">Remarks</th>
                    </tr>
                    
                    <tbody>
                    @if($multi_clients) @php $i = 1; @endphp
                        @foreach($multi_clients as $multi_client)
                            <tr>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}}</th>
                                <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>@if($multi_client->company) {{$multi_client->company->company_name}} @endif</th>
                                <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$multi_client->survey_name}}</th>
                                <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>@if($multi_client->area_of_survey) {{$multi_client->area_of_survey->area_of_survey_name}} @endif</th>
                                <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>@if($multi_client->type_of_survey) {{$multi_client->type_of_survey->type_of_survey_name}} @endif</th>
                                <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$multi_client->quantum_of_survey}}</th>
                                <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$multi_client->remark}}</th>
                            </tr> @php $i++; @endphp
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

           
            <div class="row col-md-12 remark-div" id="bottomTab_1">
                @if($controllerName->bottomRemarks(1, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(1, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(1, $yrs)) {!! $controllerName->bottomRemarksTemp(1, $yrs)->remark !!}
                @endif 
            </div>
           

        </div> </div>


        

        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 2) == 0) display: none; @endif">
           
            @include('publication.partials.tablehead',['t_id'=>2,'yrs'=>$yrs, 'remark'=>' Oil Mining Leases - OMLs'])

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">#</th>
                        <th style="background: #A3C1AD!important;">Concession</th>
                        <th style="background: #A3C1AD!important;">Contract Type</th>
                        <th style="background: #A3C1AD!important;">Area (Sq.km)</th>
                        <th style="background: #A3C1AD!important;">Equity Distribution</th>
                        <th style="background: #A3C1AD!important;">Basin/Terrain</th>
                        <th style="background: #A3C1AD!important;">Operator</th>
                        <th style="background: #A3C1AD!important;">Date of Grant</th>
                        <th style="background: #A3C1AD!important;">License Expiration</th>
                    </tr>
                    
                    <tbody>
                    @if($oml) @php $i = 1; @endphp
                        @foreach($oml as $bala_oml)
                            <tr>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}}</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @if($bala_oml->concession) {{$bala_oml->concession->concession_name}}@endif</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @if($bala_oml->contract) {{$bala_oml->contract->contract_name}}@endif</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$bala_oml->area}}</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$bala_oml->equity_distribution}}</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @if($bala_oml->terrain) {{$bala_oml->terrain->terrain_name}}@endif</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @if($bala_oml->company) {{$bala_oml->company->company_name}}@endif</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$bala_oml->date_of_grant}}</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$bala_oml->license_expire_date}}</th>
                            </tr>   @php $i++; @endphp
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="row col-md-12 remark-div" id="bottomTab_2"> 
                @if($controllerName->bottomRemarks(2, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(2, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(2, $yrs)) {!! $controllerName->bottomRemarksTemp(2, $yrs)->remark !!}
                @endif  
            </div>

            <div class="row chart-pad" style="padding:0px">
                <div class="col-md-8 col-sm-12 canvas-pad-right">

                    <div class="frame" style="">
                        <canvas id="omlPieChart" style=""></canvas>
                    </div>
                    <div class="fig1_2 figure">
                        @if($controllerName->getFigure(2, $yrs)) Figure {!! $controllerName->getFigure(2, $yrs)->figure_no_1 !!} : 
                               {!! $controllerName->getFigure(2, $yrs)->figure_title_1 !!} 
                        @elseif($controllerName->getFigure(2, $yrs-1)) Figure {!! $controllerName->getFigure(2, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(2, $yrs-1)->figure_title_1 !!} 
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 canvas-pad-left" style="display: none;">
                    <div class="frame" style="">
                        <canvas id="omlTBarChart"></canvas>
                    </div>
                   
                    <div class="fig2_2 figure">
                        @if($controllerName->getFigure(2, $yrs)) {!! $controllerName->getFigure(2, $yrs)->figure_no_2 !!}  
                               {!! $controllerName->getFigure(2, $yrs)->figure_title_2 !!} 
                        @elseif($controllerName->getFigure(2, $yrs-1)) {!! $controllerName->getFigure(2, $yrs-1)->figure_title_2 !!} 
                        @endif
                    </div>
                </div>
            </div>

        </div>  </div>




        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 3) == 0) display: none; @endif">
               
            @include('publication.partials.tablehead',['t_id'=>3,'yrs'=>$yrs, 'remark'=>' OPL Concession - OPLs'])

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">#</th>
                        <th style="background: #A3C1AD!important;">Concession</th>
                        <th style="background: #A3C1AD!important;">Contract Type</th>
                        <th style="background: #A3C1AD!important;">Area (Sq.km)</th>
                        <th style="background: #A3C1AD!important;">Equity Distribution</th>
                        <th style="background: #A3C1AD!important;">Basin/Terrain</th>
                        <th style="background: #A3C1AD!important;">Operator</th>
                        <th style="background: #A3C1AD!important;">Date of Grant</th>
                        <th style="background: #A3C1AD!important;">License Expiration</th>
                    </tr>
                    
                    <tbody>
                    @if($opl) @php $i = 1; @endphp
                        @foreach($opl as $_bala_opls)
                            <tr>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$i}}</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @if($_bala_opls->concession) {{$_bala_opls->concession->concession_name}} @endif</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @if($_bala_opls->contract) {{$_bala_opls->contract->contract_name}} @endif</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$_bala_opls->area}}</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$_bala_opls->equity_distribution}}</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @if($_bala_opls->terrain) {{$_bala_opls->terrain->terrain_name}} @endif</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @if($_bala_opls->company) {{$_bala_opls->company->company_name}} @endif</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$_bala_opls->year_of_award}}</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$_bala_opls->license_expire_date}}</th>
                            </tr> @php $i++; @endphp
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>


            <div class="row col-md-12 remark-div" id="bottomTab_3"> 
                @if($controllerName->bottomRemarks(3, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(3, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(3, $yrs)) {!! $controllerName->bottomRemarksTemp(3, $yrs)->remark !!}
                @endif 
            </div>


            <div class="row chart-pad" style="padding:0px">
                <div class="col-md-8 canvas-pad-right">
                    <div class="frame" style="">
                        <canvas id="oplPieChart"></canvas>
                    </div>
                    <div class="fig1_3 figure">
                        @if($controllerName->getFigure(3, $yrs)) Figure {!! $controllerName->getFigure(3, $yrs)->figure_no_1 !!} : 
                               {!! $controllerName->getFigure(3, $yrs)->figure_title_1 !!} 
                        @elseif($controllerName->getFigure(3, $yrs-1)) Figure {!! $controllerName->getFigure(3, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(3, $yrs-1)->figure_title_1 !!} 
                        @endif
                    </div>
                </div>
                <div class="col-md-4 canvas-pad-left" style="display: none;">
                    <i class="pull-left" style="font-size: 10px"> </i>
                    <div class="frame" style="">
                        <canvas id="oplTBarChart"></canvas>
                    </div>
                    
                    <div class="fig2_3 figure">
                        @if($controllerName->getFigure(3, $yrs)) {!! $controllerName->getFigure(3, $yrs)->figure_no_2 !!} 
                               {!! $controllerName->getFigure(3, $yrs)->figure_title_2 !!} 
                        @elseif($controllerName->getFigure(3, $yrs-1)) {!! $controllerName->getFigure(3, $yrs-1)->figure_title_2 !!} 
                        @endif
                    </div>
                </div> 
            </div> 

        </div> </div>





        {{-- PRINT PAGE BREAK --}}    
        <p class="page-break"></p>
        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 4) == 0) display: none; @endif">
               
            @include('publication.partials.tablehead', ['t_id'=>4,'yrs'=>$yrs, 'remark'=>' Acreage Situation Concession'])

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">#</th>
                        <th style="background: #A3C1AD!important;">Basin</th>
                        <th style="background: #A3C1AD!important;">No of OPL Blocks Allocated</th>
                        <th style="background: #A3C1AD!important;">No of OML Blocks Allocated</th>
                        <th style="background: #A3C1AD!important;">No of Open Blocks</th>
                        <th style="background: #A3C1AD!important;">Total No of Blocks</th>
                    </tr>
                    
                    <tbody>
                        @php $OML = 0; $OPL = 0; $OPEN = 0; $TOT = 0; @endphp
                    @if($block) @php $i = 1; @endphp
                        @foreach($block as $_bala_aops)
                            <tr>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$i}}</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @if($_bala_aops->basin) {{$_bala_aops->basin->basin_name}} @endif</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php $OPL += $opl = $_bala_aops->opl_blocks_allocated;  @endphp {{$opl}}
                                </th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php $OML += $oml = $_bala_aops->oml_blocks_allocated;  @endphp {{$oml}}
                                </th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php $OPEN += $open = $_bala_aops->blocks_open;  @endphp {{$open}}
                                </th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php $TOT += $tot = $_bala_aops->total_block;  @endphp {{$tot}}
                                </th>
                            </tr> @php $i++; @endphp
                        @endforeach
                    @endif

                    <!-- TOTAL -->
                    <tr>
                        <th style="background: #A3C1AD!important;" colspan="2"><b class="bfont-size">TOTAL</b></th>
                        <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$OPL}}</b></th>
                        <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$OML}}</b></th>
                        <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$OPEN}}</b></th>
                        <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$TOT}}</b></th>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="row col-md-12 remark-div" id="bottomTab_4" style="margin-bottom: 100px !important">
                @if($controllerName->bottomRemarks(4, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(4, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(4, $yrs)) {!! $controllerName->bottomRemarksTemp(4, $yrs)->remark !!}
                @endif                         
            </div>

            {{-- 
                <div class="col-md-6 canvas-pad-right chart-pad">
                    <div class="frame" style="">
                        <canvas id="blockPieChart"></canvas>
                    </div>
                    
                    <div class="fig1_4"> @if($controllerName->tableTitles(4, 2012)->table_title) 
                        Figure {{$controllerName->tableTitles(4, 2012)->figure_no_1}} : {{$controllerName->tableTitles(4, 2012)->table_title}} @endif
                        
                    </div>
                </div>

                <div class="col-md-6 canvas-pad-left chart-pad">
                    <a id="block_line" data-toggle="tooltip" style="color:#fff;"
                       class="btn blue-btn btn-sm pull-right" title="View In Line Chart"> <i
                                class="mdi mdi-chart-line"></i> </a>
                    <a id="block_bar" data-toggle="tooltip" style="color:#fff;"
                       class="btn green-btn btn-sm pull-right" title="View In Bar Chart"> <i
                                class="mdi mdi-poll"></i> </a>

                    <div class="frame" style="">
                        <canvas id="blockBarChart"></canvas>
                    </div>
                    <div class="frame" style="">
                        <canvas id="blockLineChart"></canvas>
                    </div>
                    Figure <div class="fig2_3"> @if($controllerName->getFigure(4, 2012)) {{$controllerName->getFigure(4, $yrs)->figure_no_2}} : @endif  Summary of Acreage Situation</div>  
                </div> --}}

        </div> </div>




        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 5) == 0) display: none; @endif">
               
            @include('publication.partials.tablehead',['t_id'=>5,'yrs'=>$yrs, 'remark'=>' Marginal Fields'])

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">#</th>
                        <th style="background: #A3C1AD!important;">Field Name</th>
                        <th style="background: #A3C1AD!important;">Company Name</th>
                        <th style="background: #A3C1AD!important;">Block</th>
                    </tr>
                    
                    <tbody>
                    @if($m_field) @php $i = 1;  @endphp
                        @foreach($m_field as $_bala_marg_fields)
                            <tr>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$i}} </th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @if($_bala_marg_fields->field) {{$_bala_marg_fields->field->field_name}} @endif</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @if($_bala_marg_fields->company) {{$_bala_marg_fields->company->company_name}} @endif</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    OML {{$_bala_marg_fields->blocks}}</th>
                            </tr> @php $i++; @endphp
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="row chart-pad" style="padding:0px">
                <div class="col-md-1"></div>
                <div class="col-md-10 canvas-pad-right">
                    <div class="frame" style="">
                        <canvas id="concessionChart"></canvas>
                    </div>
                    <div class="fig1_5 figure">
                        @if($controllerName->getFigure(5, $yrs)) Figure {!! $controllerName->getFigure(5, $yrs)->figure_no_1 !!} : 
                               {!! $controllerName->getFigure(5, $yrs)->figure_title_1 !!} 
                        @elseif($controllerName->getFigure(5, $yrs-1)) Figure {!! $controllerName->getFigure(5, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(5, $yrs-1)->figure_title_1 !!} 
                        @endif
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div> 

        </div> </div>

        @php  //merging all reserves tables
            $con = \App\up_reserves_report::where('year', '<=', $yrs)->where('year', '>=', $yrs - 9)->orderBy('year', 'desc')->limit(10)->get()->toArray();
            $oil = \App\up_reserves_oil::where('year', '<=', $yrs)->where('year', '>=', $yrs - 9)->orderBy('year', 'desc')->limit(10)->get()->toArray();
            // dd($con, $oil);
            if($con && $oil)
            {
                foreach($con as $key => $rese_oil)
                {
                   $rese_con = $oil[$key];
                   $total_res[] = ($rese_oil['condensate_reserves'] + $rese_con['oil_reserves']);
                }
            }
            else { $total_res[] = '0'; }


            //for Rig Disposition


            // function getReserve()
            // {       
            //     for ($i=5; $i < 0; $i++)
            //     {
            //         $reserveCharts[$i] = (ChartReserve('\App\up_reserves_oil', $yrs, 'terrain_id', $i) + ChartReserve('\App\up_reserves_report', $yrs, 'terrain_id', $i));   
            //     } 
            //     dd($reserveCharts);
            // }
            //for Rig Disposition for this year
        @endphp




        <!-- RESERVE -->
        {{-- PRINT PAGE BREAK --}}    
        <p class="page-break"></p>

        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 6) == 0) display: none; @endif"> 
               
            @include('publication.partials.tablehead',['t_id'=>6,'yrs'=>$yrs, 'remark'=>' Oil, Gas Reserves Upstream'])

            {{-- <div class="row" style="padding: 15px 0px"> --}}
                {{-- <div class="col-md-12" style="padding: 0px"> --}}
                    <div class="table-responsive">
                        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                            
                            <tr class="th_head">
                                <th style="background: #A3C1AD!important;">Year</th>
                                <th style="background: #A3C1AD!important;">Oil <i style="font-size: 9px">(MMbbls)</i></th>
                                <th style="background: #A3C1AD!important;">Condensate <i style="font-size: 9px">(MMbbls)</i></th>
                                <th style="background: #A3C1AD!important;">(Oil + Condensate) <i style="font-size: 9px">(MMbbls)</i></th>
                            </tr>

                            
                            <tbody> 
                                @php 
                                    $i = 1; $oil_total[] = 0; $oil = 0; $res_oil_charts[] = 0;  
                                    $condensate_total[] = 0; $condensate = 0; $res_cond_charts[] = 0;
                                @endphp
                                @forelse($price_legend as $k => $year)
                                    @php
                                        $oil = $oil_total[$k] = $res_oil_charts[$k] = $controllerName->reserveYearly('\App\\up_reserves_oil', $year, 'oil_reserves');

                                        $condensate = $condensate_total[$k] = $res_cond_charts[$k] = $controllerName->reserveYearly('\App\\up_reserves_report', $year, 'condensate_reserves');
                                        $TOTAL = ($oil + $condensate);

                                        $oil = $oil_total[$k] = $res_oil_charts[$k] = $controllerName->reserveYearly('\App\\up_reserves_oil', $year, 'oil_reserves');

                                        $condensate = $condensate_total[$k] = $res_cond_charts[$k] = $controllerName->reserveYearly('\App\\up_reserves_report', $year, 'condensate_reserves');
                                        $TOTAL = ($oil + $condensate);

                                        $oil = $oil_total[$k] = $res_oil_charts[$k] = $controllerName->reserveYearly('\App\\up_reserves_oil', $year, 'oil_reserves');

                                        $condensate = $condensate_total[$k] = $res_cond_charts[$k] = $controllerName->reserveYearly('\App\\up_reserves_report', $year, 'condensate_reserves');
                                        $TOTAL = ($oil + $condensate);
                                    @endphp
                                    @if($TOTAL != 0)
                                    <tr>
                                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                        {{$year}}</th>
                                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                            {{number_format($oil, 2)}}
                                        </th>
                                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                            {{number_format($condensate, 2)}}
                                        </th>
                                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                        {{number_format(($oil_total[$k] + $condensate_total[$k]), 2)}}</th>
                                    </tr> @php $i++; @endphp
                                    @endif
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                {{-- </div> --}}

                {{-- <div class="col-md-3" style="padding: 0px">
                    <div class="table-responsive">
                        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                            
                            <tr class="th_head">
                                <th style="background: #A3C1AD!important;">Condensate <i style="font-size: 9px">(MMbbls)</i></th>
                            </tr>

                            
                            <tbody> @php $i = 1; $condensate_total[] = 0; $condensate = 0; $res_cond_charts[] = 0; @endphp
                                @forelse($price_legend as $k => $year)
                                    @php
                                        $oil = $oil_total[$k] = $res_oil_charts[$k] = $controllerName->reserveYearly('\App\\up_reserves_oil', $year, 'oil_reserves');

                                        $condensate = $condensate_total[$k] = $res_cond_charts[$k] = $controllerName->reserveYearly('\App\\up_reserves_report', $year, 'condensate_reserves');
                                        $TOTAL = ($oil + $condensate);
                                    @endphp
                                    @if($TOTAL != 0)
                                    <tr>
                                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                            {{number_format($condensate, 2)}}
                                        </th>
                                    </tr> @php $i++; @endphp
                                    @endif
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-3" style="padding: 0px">
                    <div class="table-responsive">
                        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                            
                            <tr class="th_head">
                                <th style="background: #A3C1AD!important;">(Oil + Condensate) <i style="font-size: 9px">(MMbbls)</i></th>
                            </tr>
                            
                            <tbody> @php $i = 1; @endphp
                                @forelse($price_legend as $k => $year)
                                    @php
                                        $oil = $oil_total[$k] = $res_oil_charts[$k] = $controllerName->reserveYearly('\App\\up_reserves_oil', $year, 'oil_reserves');

                                        $condensate = $condensate_total[$k] = $res_cond_charts[$k] = $controllerName->reserveYearly('\App\\up_reserves_report', $year, 'condensate_reserves');
                                        $TOTAL = ($oil + $condensate);
                                    @endphp
                                    @if($TOTAL != 0)
                                    <tr>
                                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                        {{number_format(($oil_total[$k] + $condensate_total[$k]), 2)}}</th>
                                    </tr> @php $i++; @endphp
                                    @endif
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            {{-- </div> --}}
            <br>
            <br>

            <div class="row col-md-12 remark-div" id="bottomTab_6" style="font-size: 20px !important">
                @if($controllerName->bottomRemarks(6, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(6, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(6, $yrs)) {!! $controllerName->bottomRemarksTemp(6, $yrs)->remark !!}
                @endif  
            </div>

            <div class="row chart-pad">
                <div class="col-md-8 col-md-offset-2">
                    <i class="pull-left" style="font-size: 10px"> </i>
                    <div class="frame" style="">
                        <canvas id="reserveOilLineChart"></canvas>
                    </div>

                    <div class="fig1_6 figure">
                        @if($controllerName->getFigure(6, $yrs)) Figure {!! $controllerName->getFigure(6, $yrs)->figure_no_1 !!} : 
                               {!! $controllerName->getFigure(6, $yrs)->figure_title_1 !!} 
                        @elseif($controllerName->getFigure(6, $yrs-1)) Figure {!! $controllerName->getFigure(6, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(6, $yrs-1)->figure_title_1 !!} 
                        @endif
                    </div>
                </div>
            </div> 
        </div>  </div>



        {{-- PRINT PAGE BREAK --}}    
        <p class="page-break"></p>

        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 7) == 0) display: none; @endif">
               
            @include('publication.partials.tablehead',['t_id'=>7,'yrs'=>$yrs, 'remark'=>' Condensate Reserves Distribution on Contract Basis'])

            {{-- <div class="row" style="padding:15px 0px"> --}}
                @php
                    $tot_oil = 0;  $tot_cond = 0; $grand_total_contract = 0;  $con[] = 0;    $grand_total_cont[] = ''; $resCount = [];
                @endphp


                
                {{-- <div class="col-md-12" style="padding: 0px"> --}}
                    <div class="table-responsive">
                        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                            
                            <tr class="th_head">
                                <th style="background: #A3C1AD!important;">Contract Type</th>
                                <th style="background: #A3C1AD!important;">Oil <i style="font-size: 9px">(MMbbls)</i></th>
                                <th style="background: #A3C1AD!important;">Condensate <i style="font-size: 9px">(MMbbls)</i></th>
                                <th style="background: #A3C1AD!important;">Total <i style="font-size: 9px">(MMbbls)</i></th>
                            </tr>
                            
                            <tbody> @php $i = 1; @endphp
                            @forelse($contract_2to5 as $i=>$contract)
                            @if($contract->id != 1)
                                <tr>
                                    @php  
                                        $i++; 
                                        $tot_oil += $controllerName->reserveByContract('\App\\up_reserves_oil', $yrs, $contract->id, 'oil_reserves');

                                        $tot_cond += $controllerName->reserveByContract('\App\\up_reserves_report', $yrs, $contract->id, 'condensate_reserves');

                                        $grand_total_cont[$i] = $g_total_cont = ($controllerName->reserveByContract('\App\\up_reserves_oil', $yrs, $contract->id, 'oil_reserves') + $controllerName->reserveByContract('\App\\up_reserves_report', $yrs, $contract->id, 'condensate_reserves'));   $grand_total_contract += $g_total_cont;
                                        // MINUS - FROM THE LAST CONTRACT Type
                                        if($i == 4)
                                        {
                                            $resCount[$i] = number_format(((($g_total_cont * 100) / $oil_cond_count)-1), 0);
                                        }
                                        else
                                        { 
                                            $resCount[$i] = number_format((($g_total_cont * 100) / $oil_cond_count), 0); 
                                        }
                                    @endphp

                                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$contract->contract_name}}</th>
                                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                        {{number_format($controllerName->reserveByContract('\App\\up_reserves_oil', $yrs, $contract->id, 'oil_reserves'), 2)}}
                                    </th>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                        {{number_format($controllerName->reserveByContract('\App\\up_reserves_report', $yrs, $contract->id, 'condensate_reserves'), 2)}}
                                    </th>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                         {{number_format($g_total_cont, 2)}}
                                    </th>
                                </tr> @php $i++; @endphp
                                @endif
                            @empty
                            @endforelse
                            <tr>
                                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">Total</b></th>
                                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tot_oil, 2)}} </b>
                                </th>
                                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($tot_cond, 2)}}</b>
                                </th>
                                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($grand_total_contract, 2)}}</b>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                {{-- </div> --}}

                {{-- <div class="col-md-3" style="padding: 0px">
                    <div class="table-responsive">
                        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                            
                            <tr class="th_head">
                                <th style="background: #A3C1AD!important;">Condensate <i style="font-size: 9px">(MMbbls)</i></th>
                            </tr>
                            
                            <tbody> @php $i = 1; @endphp
                            @forelse($contracts as $i=>$contract)
                            @if($contract->id != 1)
                                <tr>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                        {{number_format($controllerName->reserveByContract('\App\\up_reserves_report', $yrs, $contract->id, 'condensate_reserves'), 2)}}
                                    </th>
                                    @php  
                                        $i++; 
                                        $tot_cond += $controllerName->reserveByContract('\App\\up_reserves_report', $yrs, $contract->id, 'condensate_reserves');
                                    @endphp
                                </tr> @php $i++; @endphp
                                @endif
                            @empty
                            @endforelse
                            <tr>
                                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($tot_cond, 2)}}</b></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div> --}}

                

            {{-- </div> --}}

            <div class="row col-md-12 remark-div" id="bottomTab_7"> 
                @if($controllerName->bottomRemarks(7, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(7, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(7, $yrs)) {!! $controllerName->bottomRemarksTemp(7, $yrs)->remark !!}
                @endif 
            </div>

        </div>  </div>




        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 8) == 0) display: none; @endif">
               
            @include('publication.partials.tablehead',['t_id'=>8,'yrs'=>$yrs, 'remark'=>' Condensate Reserves Distribution on Terrain Basis'])

            {{-- <div class="row" style="padding:15px 0px"> --}}
                @php
                    $tot_oil = 0;  $tot_cond = 0; $grand_total_terrain = 0; $grand_total_terr[] = ''; $totResByTerr = [];
                @endphp
                {{-- <div class="col-md-12" style="padding: 0px"> --}}
                    <div class="table-responsive">
                        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                            
                            <tr class="th_head">
                                <th style="background: #A3C1AD!important;">Terrain</th>
                                <th style="background: #A3C1AD!important;">Oil <i style="font-size: 9px">(MMbbls)</i></th>
                                <th style="background: #A3C1AD!important;">Condensate <i style="font-size: 9px">(MMbbls)</i></th>
                                <th style="background: #A3C1AD!important;">Total <i style="font-size: 9px">(MMbbls)</i></th>
                            </tr>
                            
                            <tbody> @php $i=1; @endphp
                            @forelse($terrain as $i=>$_terrain)
                            @if($_terrain->id != 4)
                                <tr>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$_terrain->terrain_name}}</th>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                        {{number_format($controllerName->reserveByTerrain('\App\\up_reserves_oil', $yrs, $_terrain->id, 'oil_reserves'), 2)}}
                                    </th>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                        {{number_format($controllerName->reserveByTerrain('\App\\up_reserves_report', $yrs, $_terrain->id, 'condensate_reserves'), 2)}}
                                    </th>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                        {{number_format($controllerName->reserveByTerrain('\App\\up_reserves_oil', $yrs, $_terrain->id, 'oil_reserves') + $controllerName->reserveByTerrain('\App\\up_reserves_report', $yrs, $_terrain->id, 'condensate_reserves'), 2)}}
                                    </th>
                                    @php  
                                        $i++; 
                                        $tot_oil += $controllerName->reserveByTerrain('\App\\up_reserves_oil', $yrs, $_terrain->id, 'oil_reserves');
                                        $tot_cond += $controllerName->reserveByTerrain('\App\\up_reserves_report', $yrs, $_terrain->id, 'condensate_reserves');
                                        $grand_total_terrain += $grand_total_terr[$i] = ($controllerName->reserveByTerrain('\App\\up_reserves_oil', $yrs, $_terrain->id, 'oil_reserves') + $controllerName->reserveByTerrain('\App\\up_reserves_report', $yrs, $_terrain->id, 'condensate_reserves'));
                                        // MINUS - FROM THE LAST CONTRACT Type
                                       if($i == 1)
                                        {    
                                            $totResByTerr[$i] = number_format((((($grand_total_terr[$i] * 100) / $oil_cond_count)) ), 0);   
                                        }else
                                        {
                                            $totResByTerr[$i] = number_format(((($grand_total_terr[$i] * 100) / $oil_cond_count)), 0); 
                                        }
                                    @endphp
                                </tr> @php $i++; @endphp
                            @else  {{-- for empty terrain to substituite swamp--}}
                                <tr>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$_terrain->terrain_name}}</th>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                        {{number_format($controllerName->reserveByTerrainOthers('\App\\up_reserves_oil', $yrs, $_terrain->id, 'oil_reserves'), 2)}}
                                    </th>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                        {{number_format($controllerName->reserveByTerrainOthers('\App\\up_reserves_report', $yrs, $_terrain->id, 'condensate_reserves'), 2)}}
                                    </th>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                        {{number_format($controllerName->reserveByTerrainOthers('\App\\up_reserves_oil', $yrs, $_terrain->id, 'oil_reserves') + $controllerName->reserveByTerrainOthers('\App\\up_reserves_report', $yrs, $_terrain->id, 'condensate_reserves'), 2)}}
                                    </th>
                                    @php  
                                        $i++; 
                                        $tot_oil += $controllerName->reserveByTerrainOthers('\App\\up_reserves_oil', $yrs, $_terrain->id, 'oil_reserves');
                                        $tot_cond += $controllerName->reserveByTerrainOthers('\App\\up_reserves_report', $yrs, $_terrain->id, 'condensate_reserves');
                                        $grand_total_terrain += $grand_total_terr[$i] = ($controllerName->reserveByTerrainOthers('\App\\up_reserves_oil', $yrs, $_terrain->id, 'oil_reserves') + $controllerName->reserveByTerrainOthers('\App\\up_reserves_report', $yrs, $_terrain->id, 'condensate_reserves'));
                                        // MINUS - FROM THE LAST CONTRACT Type
                                       if($i == 1)
                                        {    
                                            $totResByTerr[$i] = number_format((((($grand_total_terr[$i] * 100) / $oil_cond_count)) ), 0);   
                                        }else
                                        {
                                            $totResByTerr[$i] = number_format((((($grand_total_terr[$i] * 100) / $oil_cond_count))+1), 0); 
                                        }
                                        // $totResByTerr[$i] = number_format((((($grand_total_terr[$i] * 100) / $oil_cond_count))+1), 0);
                                    @endphp
                                </tr> @php $i++; @endphp
                            @endif
                            @empty
                            @endforelse
                            <tr>
                                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">Total</b></th>
                                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($tot_oil, 2)}}</b>
                                </th>
                                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($tot_cond, 2)}}</b>
                                </th>
                                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">{{number_format($grand_total_terrain, 2)}}</b>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                {{-- </div> --}}

            {{-- </div> --}}

            <div class="row col-md-12 remark-div" id="bottomTab_8"> 
                @if($controllerName->bottomRemarks(8, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(8, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(8, $yrs)) {!! $controllerName->bottomRemarksTemp(8, $yrs)->remark !!}
                @endif 
            </div>


            <div class="row">
                <div class="col-md-6 pull-left canvas-pad-right chart-pad" style="text-align: center;">
                    <div class="frame" style="">
                        <canvas id="reserveContractChart"></canvas>
                    </div>
                    <div class="fig1_8 figure">
                        @if($controllerName->getFigure(8, $yrs)) Figure {!! $controllerName->getFigure(8, $yrs)->figure_no_1 !!} : 
                               {!! $controllerName->getFigure(8, $yrs)->figure_title_1 !!} 
                        @elseif($controllerName->getFigure(8, $yrs-1)) Figure {!! $controllerName->getFigure(8, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(8, $yrs-1)->figure_title_1 !!} 
                        @endif
                    </div>
                </div>

                <div class="col-md-6 pull-left canvas-pad-left chart-pad" style="text-align: center;">
                    <div class="frame" style="">
                        <canvas id="reserveTerrChart"></canvas>
                    </div>
                    <div class="fig2_8 figure">
                        @if($controllerName->getFigure(8, $yrs)) Figure {!! $controllerName->getFigure(8, $yrs)->figure_no_2 !!} : 
                               {!! $controllerName->getFigure(8, $yrs)->figure_title_2 !!} 
                        @elseif($controllerName->getFigure(8, $yrs-1)) Figure {!! $controllerName->getFigure(8, $yrs-1)->figure_no_2 !!} : {!! $controllerName->getFigure(8, $yrs-1)->figure_title_2 !!} 
                        @endif
                    </div>
                </div>
            </div>

        </div>    </div>




        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 9) == 0) display: none; @endif">
               
            @include('publication.partials.tablehead',['t_id'=>9,'yrs'=>$yrs, 'remark'=>' Oil Reserves Net Addition, Depletion Rate and Life Index on Contract Basis'])

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">Contract Type</th>
                        <th style="background: #A3C1AD!important;">Prev Year Reserve</th>
                        <th style="background: #A3C1AD!important;">Curr Year Reserve</th>
                        <th style="background: #A3C1AD!important;">Production, Million Barrels</th>
                        <th style="background: #A3C1AD!important;">Net Addition (Crude Oil), Million Barrels</th>
                        <th style="background: #A3C1AD!important;">% Net Addition</th>
                        <th style="background: #A3C1AD!important;">Depletion Rate, %</th>
                        <th style="background: #A3C1AD!important;">Life Index, Years</th>
                    </tr>
                    
                    <tbody>  @php $i=1; @endphp
                    @php 
                        $prev_res = 0; $curr_res = 0; $prod = 0;  $net = 0; $perc = 0; $dep = 0; $life = 0; 
                         $prev_total = 0;  $curr_total = 0;  $prod_total = 0;  $net_total = 0; $perc_total = 0; $dep_total = 0; $life_total = 0; 
                    @endphp
                    @forelse($contracts as $contract)
                        @if($contract->id > 1)
                            @php 
                                $reserv_prev = ($controllerName->reserveByContract('\App\\up_reserves_oil', $yrs-1, $contract->id, 'oil_reserves') + 
                                    $controllerName->reserveByContract('\App\\up_reserves_report', $yrs-1, $contract->id, 'condensate_reserves'));    $prev_total += $prev_res = $reserv_prev; 
                                
                                $reserv_curr = ($controllerName->reserveByContract('\App\\up_reserves_oil', $yrs, $contract->id, 'oil_reserves') + 
                                    $controllerName->reserveByContract('\App\\up_reserves_report', $yrs, $contract->id, 'condensate_reserves'));    $curr_total += $curr_res = $reserv_curr;  

                                $production = 
                                $controllerName->reserveByContract('\App\\up_reserve_addition_depletion_rate', $yrs, $contract->id, 'production'); 

                                $prod_total += $production;

                                 $net_total += $net_addition = ($reserv_curr - $reserv_prev); 
                                if($reserv_curr == 0)
                                {  $dep_total += $depletion_rate = 0;  }
                                else{ $dep_total += $depletion_rate = (($production * 100) / $reserv_curr);  } 
                                if($reserv_curr == 0)
                                { $perc_total += $percent_net_addition = 0; }
                                else{ $perc_total += $percent_net_addition = (($net_addition * 100) / $reserv_curr); } 
                                if($production == 0){  $life_index = 0;  }
                                else{ $life_index = ($reserv_curr / $production);  } 
                                if($prod_total != 0){ $life_total = ($curr_total / $prod_total); }
                                else{ $life_total = 0; }

                            @endphp

                            <tr>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                    {{$contract->contract_name}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                    {{number_format($prev_res, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($curr_res, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                    {{number_format($production, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                  {{number_format($net_addition, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($percent_net_addition, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($depletion_rate, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($life_index, 2)}}
                                </th>
                            </tr> @php $i++; @endphp
                        @endif
                    @empty
                    @endforelse
                    <tr>
                        <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> Total </b></th>
                        <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($prev_total,2)}} </b></th>
                        <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($curr_total,2)}} </b></th>
                        <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($prod_total,2)}} </b></th>
                        <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($net_total,2)}} </b></th>
                        <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($perc_total,2)}} </b></th>
                        <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($dep_total,2)}} </b></th>
                        <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($life_total,2)}} </b></th>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="row col-md-12 remark-div" id="bottomTab_9"> 
                @if($controllerName->bottomRemarks(9, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(9, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(9, $yrs)) {!! $controllerName->bottomRemarksTemp(9, $yrs)->remark !!}
                @endif 
            </div>

        </div>    </div>




        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 10) == 0) display: none; @endif">
               
            @include('publication.partials.tablehead',['t_id'=>10,'yrs'=>$yrs, 'remark'=>' Reserves Replacement Rate (RRR) on Contract Basis'])

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">Contract Type</th>
                        <th style="background: #A3C1AD!important;">Oil & Condensates Reserves as at 1/1 {{$yrs + 1}}</th>
                        <th style="background: #A3C1AD!important;">Oil & Condensates Reserves as at 1/1 {{$yrs}}</th>
                        <th style="background: #A3C1AD!important;">{{$yrs}} Oil & Condensates Production, MMB</th>
                        <th style="background: #A3C1AD!important;">Net Addition to Oil & Condensate Reserves, MMB</th>
                        <th style="background: #A3C1AD!important;">Reserves Replacement Rate, %</th>
                    </tr>
                    
                    <tbody>
                        @php 
                            $PREV = 0;  $CURR = 0; $PROD = 0; $NET = 0; $RATE = 0;  $PROD_CHART[] = '';  $rate_CHART[] = '';  
                            $prev = 0;  $curr = 0; $prod = 0; $net = 0; $rate = 0;  $NET_ADD_CHART[] = '';   $i=1;
                        @endphp

                        @forelse($contracts as $i=>$contract)
                            @if($contract->id > 1)
                                @php                                    
                                    //CURRENT YEAR RESERVE
                                    $CURR = ($controllerName->reserveByContract('\App\\up_reserves_oil', $yrs, $contract->id, 'oil_reserves') + 
                                        $controllerName->reserveByContract('\App\\up_reserves_report', $yrs, $contract->id, 'condensate_reserves'));
                                    //PREVIOUS YEAR RESERVE
                                    $PREV = ($controllerName->reserveByContract('\App\\up_reserves_oil', $yrs-1, $contract->id, 'oil_reserves') + 
                                        $controllerName->reserveByContract('\App\\up_reserves_report', $yrs-1, $contract->id, 'condensate_reserves'));

                                    //PREVIOUS YEAR PRODUCTION
                                    $PROD = $controllerName->reserveByContract('\App\\up_reserve_addition_depletion_rate', $yrs, $contract->id, 'production');
                                    $PROD_CHART[$i] = $PROD;
                                    $NET = ($CURR - $PREV);
                                    if($PROD != 0){ $RATE = ( ($NET * 100) / $PROD); }else{ $RATE = 0; }
                                    $NET_ADD_CHART[$i] = ($CURR - $PREV);    $rate_CHART[$i] = $RATE;


                                    //CURRENT YEAR RESERVE
                                    $curr += $CURR;
                                    //PREVIOUS YEAR RESERVE
                                    $prev += $PREV;
                                    //PREVIOUS YEAR PRODUCTION
                                    $prod += $PROD;
                                    $net += ($curr - $prev);
                                    if($prod != 0){ $rate = ( ($net * 100) / $prod); }else{ $rate = 0; }
                                @endphp
                                <tr>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$contract->contract_name}}</th>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($CURR, 2)}} </th>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($PREV, 2)}} </th>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($PROD, 2)}} </th>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($NET, 2)}} </th>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($RATE, 2)}} </th>
                                </tr>  @php $i++; @endphp
                            @endif
                        @empty
                        @endforelse
                        @php Session::put('rate', $rate); \array_splice($rate_CHART, 0, 1);   @endphp
                        <tr>
                            <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> Total (National) </b></th>
                            <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($curr, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($prev, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($prod, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($net, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($rate, 2)}} </b></th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row col-md-12 remark-div" id="bottomTab_10"> 
                @if($controllerName->bottomRemarks(10, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(10, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(10, $yrs)) {!! $controllerName->bottomRemarksTemp(10, $yrs)->remark !!}
                @endif 
            </div>


            <div class="row chart-pad">
                <div class="col-md-8" style="text-align: center;">
                    <div class="frame">
                        <canvas id="reserveReplaceRateChart"></canvas>
                        
                        <div class="fig1_10 figure">
                            @if($controllerName->getFigure(10, $yrs)) Figure {!! $controllerName->getFigure(10, $yrs)->figure_no_1 !!} : 
                                   {!! $controllerName->getFigure(10, $yrs)->figure_title_1 !!} 
                            @elseif($controllerName->getFigure(10, $yrs-1)) Figure {!! $controllerName->getFigure(10, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(10, $yrs-1)->figure_title_1 !!} 
                            @endif
                        </div>
                    </div>
                </div>

               {{--  <div class="col-md-8" style="text-align: center;">
                    <div class="frame" style="">
                        <canvas id="reserveNetAdditionChart"></canvas>
                    </div>

                    <div class="fig2_10 figure">
                        @if($controllerName->getFigure(10, $yrs)) 
                        {!! $controllerName->getFigure(10, $yrs)->figure_title_2 !!}
                        @elseif($controllerName->getFigure(10, $yrs-1)) {!! $controllerName->getFigure(10, $yrs-1)->figure_title_2 !!}
                        @endif

                    </div>
                </div> --}}

            </div> 
        </div>    </div>




        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 11) == 0) display: none; @endif">
               
            @include('publication.partials.tablehead',['t_id'=>11,'yrs'=>$yrs, 'remark'=>' Nigeria’s Reserves Replacement Rate (RRR) - Ten Year Trend'])

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">Year</th>
                        <th style="background: #A3C1AD!important;">Oil & Condensate Production, MMB</th>
                        <th style="background: #A3C1AD!important;">Reserves Replacement Rate, % Barrels</th>
                    </tr>
                    
                    <tbody>
                        @php   
                            $PREV = 0;  $CURR = 0; $PROD = 0; $NET = 0; $RATE = 0; $prodChart[] = ''; $rateChart[] = ''; $i=1; 
                            $NET_TOT[] = 0;

                            // Manual Array
                            $prodArr = [921.27, 910.77, 925.50, 851.63, 808.68, 867.03, 801.43, 733.98, 754.62];
                            $rateArr = [25.76, 2.79, 68.13, 17.70, 46.79, -44.54, -40.29, 31.71, 4.00];
                        @endphp



                            {{-- MANUALLING INPUTED --}}
                            <tr>
                                <th class="th_h" style="background: #ACE1AF!important;"> 01/Jan/2011 </th>
                                <th class="th_h" style="background: #ACE1AF!important;"> 921.27 </th>
                                <th class="th_h" style="background: #ACE1AF!important;"> 25.76% </th>
                            </tr> 
                            <tr>
                                <th class="th_h"> 01/Jan/2012</th>
                                <th class="th_h"> 910.77 </th>
                                <th class="th_h"> 2.79% </th>
                            </tr> 
                            <tr>
                                <th class="th_h" style="background: #ACE1AF!important;"> 01/Jan/2013 </th>
                                <th class="th_h" style="background: #ACE1AF!important;"> 925.50 </th>
                                <th class="th_h" style="background: #ACE1AF!important;"> 68.13% </th>
                            </tr> 
                            <tr>
                                <th class="th_h"> 01/Jan/2014 </th>
                                <th class="th_h"> 851.63 </th>
                                <th class="th_h"> 17.70% </th>
                            </tr> 
                            <tr>
                                <th class="th_h" style="background: #ACE1AF!important;"> 01/Jan/2015 </th>
                                <th class="th_h" style="background: #ACE1AF!important;"> 808.68 </th>
                                <th class="th_h" style="background: #ACE1AF!important;"> 46.79% </th>
                            </tr> 
                            <tr>
                                <th class="th_h"> 01/Jan/2016 </th>
                                <th class="th_h"> 867.03 </th>
                                <th class="th_h"> -44.54% </th>
                            </tr> 
                            <tr>
                                <th class="th_h" style="background: #ACE1AF!important;"> 01/Jan/2017 </th>
                                <th class="th_h" style="background: #ACE1AF!important;"> 801.43 </th>
                                <th class="th_h" style="background: #ACE1AF!important;"> -40.29% </th>
                            </tr> 
                            <tr>
                                <th class="th_h"> 01/Jan/2018 </th>
                                <th class="th_h"> 733.98 </th>
                                <th class="th_h"> 31.71% </th>
                            </tr> 
                            <tr>
                                <th class="th_h" style="background: #ACE1AF!important;"> 01/Jan/2019 </th>
                                <th class="th_h" style="background: #ACE1AF!important;"> 754.62 </th>
                                <th class="th_h" style="background: #ACE1AF!important;"> 4.00% </th>
                            </tr> 
                            {{-- MANUALLING INPUTED --}}

                        @forelse($price_legend as $i=> $year)
                            @php                                    
                                //CURRENT YEAR RESERVE
                                $CURR = ($controllerName->reserveByAllContract('\App\\up_reserves_oil', $year, 'oil_reserves') + 
                                    $controllerName->reserveByAllContract('\App\\up_reserves_report', $year, 'condensate_reserves'));
                                //PREVIOUS YEAR RESERVE
                                $PREV = ($controllerName->reserveByAllContract('\App\\up_reserves_oil', $year-1, 'oil_reserves') + 
                                    $controllerName->reserveByAllContract('\App\\up_reserves_report', $year-1, 'condensate_reserves'));
                                //PREVIOUS YEAR PRODUCTION
                                $PROD = $controllerName->reserveByAllContract('\App\\up_reserve_addition_depletion_rate', $year, 'production');


                                $NET_TOT[$i] = $NET = ($CURR - $PREV);
                                if($i == 0){ $NET_TOT[$i] = 0; }
                                if($PROD != 0){ $RATE = ( ($NET * 100) / $PROD); }else{ $RATE = 0; }


                                $TOTAL = ($PROD != 0 && $RATE);

                            @endphp

                            @if($TOTAL != 0)
                                <tr>  @php $rrr =  Session::get('rate'); @endphp
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                        @php $res_year = $year + 1; @endphp 01/Jan/{{$year+1}} </th>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                    {{number_format($PROD, 2)}} </th>
                                    <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                    {{number_format($rrr, 2)}}% </th>  
                                </tr>  
                                @php  
                                    array_push($prodArr, $PROD);      array_push($rateArr, $rrr);  $NET_ADD_CHART[$i]=0;
                                    //$rateChart[$i] = $rrr;  $NET_ADD_CHART[$i] = ($CURR - $PREV);  $PROD_CHART[$i] = $PROD;    
                                    $i++; 
                                @endphp
                            @endif
                        @empty
                        @endforelse    
                    </tbody>
                </table>
            </div>

            <div class="row col-md-12 remark-div" id="bottomTab_11"> 
                @if($controllerName->bottomRemarks(11, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(11, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(11, $yrs)) {!! $controllerName->bottomRemarksTemp(11, $yrs)->remark !!}
                @endif 
            </div>


            <div class="row chart-pad">
                <div class="col-md-8" style="text-align: center;">
                    <div class="frame" style="">
                        <canvas id="yearlyRRRChart"></canvas>
                    </div>
                    
                    <div class="fig1_11 figure"> 
                        @if($controllerName->getFigure(11, $yrs)) Figure {!! $controllerName->getFigure(11, $yrs)->figure_no_1 !!} : 
                               {!! $controllerName->getFigure(11, $yrs)->figure_title_1 !!} 
                        @elseif($controllerName->getFigure(11, $yrs-1)) Figure {!! $controllerName->getFigure(11, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(11, $yrs-1)->figure_title_1 !!} 
                        @endif
                    </div>
                </div>

                {{-- <div class="col-md-6" style="text-align: center;">
                    <div class="frame" style="">
                        <canvas id="yearlyNETAdditionChart"></canvas>
                    </div>
                </div> --}}
            </div>

        </div>    </div>  



        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 12) == 0) display: none; @endif">
               
            @include('publication.partials.tablehead',['t_id'=>12,'yrs'=>$yrs, 'remark'=>' Gas Reserves '])

            {{-- <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">Year</th>
                        <th style="background: #A3C1AD!important;">Associated Gas <i style="font-size: 11px">
                            (TCF), as at Dec {{$yrs}}</i></th>
                        <th style="background: #A3C1AD!important;">Non Associated Gas <i style="font-size: 11px">
                            (TCF), as at Dec {{$yrs}}</i></th>
                        <th style="background: #A3C1AD!important;">Total Gas <i style="font-size: 11px">
                            (TCF), as at Dec {{$yrs}}</i></th>
                    </tr>

                    
                    <tbody>
                        @php $ag = ''; $nag = ''; $reserve_year[] = '';  $reserve_total_chart[] = '';  $i=1; $ag_year[] = ''; 
                            $nag_year[] = ''; $ag_nag[]=''; $adNagYearLegend[] = ''; 
                        @endphp
                        @forelse($price_legend as $k => $year)
                        @php 
                            $ag = $controllerName->reserveYearly('\App\\up_reserves_gas', $year, 'associated_gas');
                            $ag_year[$k] = $ag;
                            $nag = $controllerName->reserveYearly('\App\\up_reserves_gas', $year, 'non_associated_gas');
                            $nag_year[$k] = $nag;
                            $agNag =  ($ag + $nag);  $ag_nag[$k] = $agNag;
                        @endphp
                        @if($agNag != 0 && $year == $)
                            <tr>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$year}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                {{number_format($ag, 2)}} </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                {{number_format($nag, 2)}}</th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                {{number_format($agNag, 2)}}</th>

                                @php $adNagYearLegend[$k] = $year; @endphp
                            </tr>
                            @php  $i++;
                                if($year >= $yrs-1){ $reserve_year[$k] = $year; }
                                if($year >= $yrs-1){ $reserve_total_chart[$k] = $agNag; }
                            @endphp
                        @endif
                        @empty
                        @endforelse  
                    </tbody>  
                </table>
            </div> --}}

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">Contract Type</th>
                        <th style="background: #A3C1AD!important;">Prev Reserve (Bscf)</th>
                        <th style="background: #A3C1AD!important;">Curr Reserve (Bscf)</th>
                        <th style="background: #A3C1AD!important;">Production (Bscf)</th>
                        <th style="background: #A3C1AD!important;">Net Addition - Gas Reserve (Bscf)</th>
                        <th style="background: #A3C1AD!important;">% Net Addition</th>
                        <th style="background: #A3C1AD!important;">Depletion Rate, %</th>
                        <th style="background: #A3C1AD!important;">Life Index, Years</th>
                    </tr>
                    
                    <tbody> 
                        @php $i=1;  $prod = 0;  $net = 0; $perc = 0; $dep = 0; $life = 0; 
                             $prod_total = 1;  $net_total = 0; $perc_total = 0; $dep_total = 0; $life_total = 0; @endphp

                                                           

                        @forelse($contracts as $contract)
                        {{-- HIDDING ALL SERVICE CONTRACT (CONTRACT ID 1) --}}
                        @if($contract->id > 1)
                            <tr>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                    {{$contract->contract_name}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $resv_prev = $controllerName->reserveByContract('\App\\up_reserves_gas', $yrs-1, $contract->id, 'total_gas');
                                    @endphp  {{number_format($resv_prev, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $resv_curr = $controllerName->reserveByContract('\App\\up_reserves_gas', $yrs, $contract->id, 'total_gas');
                                    @endphp  {{number_format($resv_curr, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    @php 
                                        $productn = $controllerName->reserveByContract('\App\\gas_summary_of_gas_production', $yrs, $contract->id, 'total');

                                        $prod = ($productn / 100000);

                                         $net_addition = ($resv_curr - $resv_prev); 
                                        if($resv_curr == 0){  $depletion_rate = 0;  }else{ $depletion_rate = (($prod * 100) / $resv_curr);  } 
                                        if($resv_curr == 0){ $percent_net_addition = 0; }else{ $percent_net_addition = (($net_addition * 100) / $resv_curr); } 
                                        if($prod == 0){  $life_index = 0;  }else{ $life_index = ($resv_curr / $prod);  } 
                                        // if($prod_total != 0){  $life_total = ($curr_total / $prod_total); }else{  $life_total = 0; }

                                    @endphp  {{number_format($prod, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                    {{number_format($net_addition, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($percent_net_addition, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($depletion_rate, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{number_format($life_index, 2)}}
                                </th>
                            </tr> @php $i++; @endphp
                        @endif
                        @empty
                        @endforelse
                            @php 
                                $prev_total = $controllerName->reserveProduction('\App\\up_reserves_gas', $yrs-1, 'total_gas');
                                $curr_total = \App\up_reserves_gas::where('year', $yrs)->sum('total_gas');
                                $productn = $controllerName->reserveProduction('\App\\gas_summary_of_gas_production', $yrs, 'total');

                                $prod_total = ($productn / 1000000);

                                 $net_total = ($curr_total - $prev_total); 
                                if($curr_total == 0)
                                {  $dep_total = 0;  }
                                else{ $dep_total = (($prod_total * 100) / $curr_total);  } 
                                if($curr_total == 0){ $perc_total = 0; }else{ $perc_total = (($net_total * 100) / $curr_total); } 
                                if($prod_total != 0){  $life_total = ($curr_total / $prod_total); }else{  $life_total = 0; }

                            @endphp 
                        <tr>
                            <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> Total </b></th>
                            <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($prev_total, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($curr_total, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($prod_total, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($net_total, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($perc_total, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($dep_total, 2)}} </b></th>
                            <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($life_total, 2)}} </b></th>
                        </tr>
                    </tbody>
                </table>

                {{-- <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">Contract Type</th>
                        <th style="background: #A3C1AD!important;">Gas Reserves as at 1/1 {{$yrs + 1}}</th>
                        <th style="background: #A3C1AD!important;">Gas Reserves as at 1/1 {{$yrs}}</th>
                        <th style="background: #A3C1AD!important;">{{$yrs}} Gas Production, (Bscf)</th>
                        <th style="background: #A3C1AD!important;">Net Addition to Gas Reserves, (Bscf)</th>
                        <th style="background: #A3C1AD!important;">Reserves Replacement Rate, %</th>
                    </tr>
                    
                    <tbody>
                    @php 
                        $PREV = 0;  $CURR = 0; $PROD = 0; $NET = 0; $RATE = 0;  $PROD_CHART[] = ''; 
                        $prev = 0;  $curr = 0; $prod = 0; $net = 0; $rate = 0;  $NET_ADD_CHART[] = '';   $i=1;
                    @endphp

                    @forelse($contracts as $i=>$contract)
                        @php                                    
                            //CURRENT YEAR RESERVE
                            $CURR = $controllerName->reserveByContract('\App\\up_reserves_gas', $yrs, $contract->id, 'total_gas');
                            //PREVIOUS YEAR RESERVE
                            $PREV = $controllerName->reserveByContract('\App\\up_reserves_gas', $yrs - 1, $contract->id, 'total_gas');
                            //PREVIOUS YEAR PRODUCTION
                            $PROD = $controllerName->reserveByContract('\App\\up_gas_reserve_addition_depletion_rate', $yrs, $contract->id, 'production');
                            $PROD_CHART[$i] = $PROD;
                            $NET = ($CURR - $PREV);
                            if($PROD != 0){ $RATE = ( ($NET * 100) / $PROD); }else{ $RATE = 0; }
                            $NET_ADD_CHART[$i] = ($CURR - $PREV);


                            //CURRENT YEAR RESERVE
                            $curr += $CURR;
                            //PREVIOUS YEAR RESERVE
                            $prev += $PREV;
                            //PREVIOUS YEAR PRODUCTION
                            $prod += $PROD;
                            $net += ($curr - $prev);
                            if($prod != 0){ $rate = ( ($net * 100) / $prod); }else{ $rate = 0; }
                        @endphp
                        <tr>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                {{$contract->contract_name}}</th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                            {{number_format($CURR, 2)}} </th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                            {{number_format($PREV, 2)}} </th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                            {{number_format($PROD, 2)}} </th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                            {{number_format($NET, 2)}} </th>
                            <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                            {{number_format($RATE, 2)}} </th>
                        </tr>  @php $i++; @endphp
                    @empty
                    @endforelse
                    <tr>
                        <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> Total </b></th>
                        <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($curr, 2)}} </b></th>
                        <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($prev, 2)}} </b></th>
                        <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($prod, 2)}} </b></th>
                        <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($net, 2)}} </b></th>
                        <th class="th_h" style="background: #A3C1AD!important"><b class="bfont-size"> {{number_format($rate, 2)}} </b></th>
                    </tr>
                    </tbody>
                </table> --}}
            </div>

            <div class="row col-md-12 remark-div" id="bottomTab_12"> 
                @if($controllerName->bottomRemarks(12, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(12, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(12, $yrs)) {!! $controllerName->bottomRemarksTemp(12, $yrs)->remark !!}
                @endif  
            </div>

        </div>   </div>



        {{-- PRINT PAGE BREAK --}}    
        <p class="page-break"></p>

        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 13) == 0) display: none; @endif">
               
            @include('publication.partials.tablehead',['t_id'=>13,'yrs'=>$yrs, 'remark'=>' Yearly AG & NAG Reserves'])

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">Year</th>
                        <th style="background: #A3C1AD!important;">Associated Gas <i style="font-size: 11px">
                            (Bcf), as at Dec {{$yrs}}</i></th>
                        <th style="background: #A3C1AD!important;">Non Associated Gas <i style="font-size: 11px">
                            (Bcf), as at Dec {{$yrs}}</i></th>
                        <th style="background: #A3C1AD!important;">Total Gas <i style="font-size: 11px">
                            (Bcf), as at Dec {{$yrs}}</i></th>
                    </tr>
                    
                    <tbody>
                        @php $ag = ''; $nag = ''; $reserve_year[] = '';  $reserve_total_chart[] = 0;  $i=1; $ag_year[] = ''; 
                            $nag_year[] = ''; $ag_nag[]=''; $adNagYearLegend[] = ''; 
                        @endphp
                        @forelse($price_legend as $k => $year)
                        @php 
                            $ag = $controllerName->reserveYearly('\App\\up_reserves_gas', $year, 'associated_gas');
                            $ag_year[$k] = $ag;
                            $nag = $controllerName->reserveYearly('\App\\up_reserves_gas', $year, 'non_associated_gas');
                            $nag_year[$k] = $nag;
                            $agNag =  ($ag + $nag);  $ag_nag[$k] = $agNag;
                        @endphp
                        @if($agNag != 0)
                            <tr>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$year}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                {{number_format($ag, 2)}} </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                {{number_format($nag, 2)}}</th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                {{number_format($agNag, 2)}}</th>

                                @php $adNagYearLegend[$k] = $year; @endphp
                            </tr>
                            @php  $i++;
                                if($year >= $yrs-1){ $reserve_year[$k] = $year; }
                                if($year >= $yrs-1){ $reserve_total_chart[$k] = $agNag; }
                            @endphp
                        @endif
                        @empty
                        @endforelse  
                    </tbody>  
                </table>
            </div>

            <div class="row col-md-12 remark-div" id="bottomTab_13"> 
                @if($controllerName->bottomRemarks(13, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(13, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(13, $yrs)) {!! $controllerName->bottomRemarksTemp(13, $yrs)->remark !!}
                @endif  
            </div>

            <div class="row chart-pad">
                <div class="col-md-5 canvas-pad-right">
                    {{-- <i class="pull-left" style="font-size: 10px"> Total Gas Reserves as at 1-Jan-{{$yrs}} vs 1-Jan-{{$yrs+1}} </i> --}}
                    <div class="frame" style="">
                        <canvas id="naturalGasreserveBarChart"></canvas>
                    </div>
                    
                    <div class="fig1_13 figure">
                        @if($controllerName->getFigure(13, $yrs)) Figure {!! $controllerName->getFigure(13, $yrs)->figure_no_1 !!} : 
                               {!! $controllerName->getFigure(13, $yrs)->figure_title_1 !!} 
                        @elseif($controllerName->getFigure(13, $yrs-1)) Figure {!! $controllerName->getFigure(13, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(13, $yrs-1)->figure_title_1 !!} 
                        @endif
                    </div>
                </div>                    

                <div class="col-md-7 canvas-pad-left">
                    <i class="pull-left" style="font-size: 10px"> Natural Gas Reserves </i>
                    <div class="frame" style="">
                        <canvas id="naturalGasreserveLineChart"></canvas>
                    </div>
                    
                    <div class="fig2_13 figure">
                        @if($controllerName->getFigure(13, $yrs)) Figure {!! $controllerName->getFigure(13, $yrs)->figure_no_2 !!} : 
                               {!! $controllerName->getFigure(13, $yrs)->figure_title_2 !!} 
                        @elseif($controllerName->getFigure(13, $yrs-1)) Figure {!! $controllerName->getFigure(13, $yrs-1)->figure_no_2 !!} : {!! $controllerName->getFigure(13, $yrs-1)->figure_title_2 !!} 
                        @endif
                    </div>
                </div>
            </div>

            {{-- PRINT PAGE BREAK --}}    
            <p class="page-break"></p>

        </div>    </div>




        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 14) == 0) display: none; @endif">
               
            @include('publication.partials.tablehead',['t_id'=>14,'yrs'=>$yrs, 'remark'=>' Geophysical Data'])

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="seismic_data_table" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">Year</th>
                        <th style="background: #A3C1AD!important;">Type</th>
                        <th style="background: #A3C1AD!important;">Land</th>
                        <th style="background: #A3C1AD!important;">Shallow offshore</th>
                        <th style="background: #A3C1AD!important;">Deep offshore</th>
                        <th style="background: #A3C1AD!important;">Total</th>
                    </tr>

                    
                    <tbody> @php $seismicTotal[] = '';  $i=1; $j = 10; @endphp
                    @if($array_year_10)
                        @foreach($array_year_10 as $key=>$year)
                            @php 
                                $terrain_1 = $controllerName->yearlySeismicData($year, 1); 
                                $terrain_4 = $controllerName->yearlySeismicData($year, 4);
                                $terrain_2 = $controllerName->yearlySeismicData($year, 2);
                                $terrain_3 = $controllerName->yearlySeismicData($year, 3);
                                $total = ( $terrain_1  + $terrain_2 + $terrain_3 + $terrain_4 );
                            @endphp
                            @if($total != 0)
                            <tr>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$year}}</th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>3-D, Sq.Km</th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>  
                                    {{number_format($terrain_1 + $terrain_4, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($terrain_2, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($terrain_3, 2)}}
                                </th>
                                <th class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{ number_format($total, 2) }}
                                </th>
                                {{-- @php $seismicTotal[$key] = 
                                    ( $terrain_1  + $terrain_2 + $terrain_3 )
                                @endphp --}}
                            </tr>  @php $i++; $j--; @endphp
                            @endif
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>

            <div class="row col-md-12 remark-div" id="bottomTab_14"> 
                @if($controllerName->bottomRemarks(14, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(14, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(14, $yrs)) {!! $controllerName->bottomRemarksTemp(14, $yrs)->remark !!}
                @endif 
            </div>

            {{-- <div class="row">
                <div class="col-md-8 col-md-offset-2 chart-pad">
                    <i class="pull-left" style="font-size: 10px"> </i>

                    <div class="frame" style="">
                        <canvas id="seismicLineChart"></canvas>
                    </div>
                    
                    <div class="fig1_14 figure">
                        @if($controllerName->getFigure(14, $yrs)) Figure {!! $controllerName->getFigure(14, $yrs)->figure_no_1 !!} : 
                               {!! $controllerName->getFigure(14, $yrs)->figure_title_1 !!} 
                        @elseif($controllerName->getFigure(14, $yrs-1)) Figure {!! $controllerName->getFigure(14, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(14, $yrs-1)->figure_title_1 !!} 
                        @endif
                    </div>
                </div>
            </div> --}}

        </div>   </div>



        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 15) == 0) display: none; @endif">
               
            @include('publication.partials.tablehead',['t_id'=>15,'yrs'=>$yrs, 'remark'=>' Field Development Plan'])

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head" style="page-break-inside: avoid !important;">
                        <th style="background: #A3C1AD!important;">#</th>
                        <th style="background: #A3C1AD!important;">Company</th>
                        <th style="background: #A3C1AD!important;">Field</th>
                        <th style="background: #A3C1AD!important;">Anticipated Production Rate (Bopd/MMscf/d)</th>
                        <th style="background: #A3C1AD!important;">Expected Reserves (MMSTB/BSCF)</th>
                        <th style="background: #A3C1AD!important;">Commencement Date</th>
                        <th style="background: #A3C1AD!important;">Remarks/Status</th>
                    </tr>
                    
                    <tbody>   @php $i=1; @endphp
                    @forelse($fdps as $key=>$fdp)
                        <tr style="page-break-inside: avoid !important;">
                            <td class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$i}} </td>
                            <td class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                {{$fdp->company?$fdp->company->company_name:''}} </td>
                            <td class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                {{$fdp->field?$fdp->field->field_name:''}} </td>
                            <td class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                {{$fdp->production_rate}} </td>
                            <td class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                {{$fdp->expected_reserves}} </td>
                            <td class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                {{$fdp->commencement_date}} </td>
                            <td class="th_h"  @if(even($i) == true) style="background: #ACE1AF!important;" @endif> 
                                {{$fdp->remark}} </td>
                        </tr>  @php $i++; @endphp
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="row col-md-12 remark-div" id="bottomTab_15"> 
                @if($controllerName->bottomRemarks(15, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(15, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(15, $yrs)) {!! $controllerName->bottomRemarksTemp(15, $yrs)->remark !!}
                @endif 
            </div>

        {{-- PRINT PAGE BREAK --}}    
        <p class="page-break"></p>
        </div>  </div>





        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 16) == 0) display: none; @endif">
               
            @include('publication.partials.tablehead',['t_id'=>16,'yrs'=>$yrs, 'remark'=>' Number of Wells drilled by Terrain'])

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">Year</th>
                        <th style="background: #A3C1AD!important;">Land / Swamp</th>
                        <th style="background: #A3C1AD!important;">Shallow offshore</th>
                        <th style="background: #A3C1AD!important;">Deep offshore</th>
                        <th style="background: #A3C1AD!important;">Total</th>
                    </tr>

                    
                    <tbody> @php $i = 1; @endphp
                    @forelse($array_year_10 as $k => $year)
                        @php
                            $terr_1 = $controllerName->getWellTotal($year, 1); $terr_2 = $controllerName->getWellTotal($year, 2);
                            $terr_3 = $controllerName->getWellTotal($year, 3); $terr_4 = $controllerName->getWellTotal($year, 4);
                            $total = ($terr_1 + $terr_2 + $terr_3 + $terr_4);
                        @endphp
                        @if($total != 0)
                        <tr>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif><b>{{$year}}</b></th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$terr_1 + $terr_4}}</th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$terr_2}}</th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$terr_3}}</th>
                            <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{ $terr_1 + $terr_2 + $terr_3 + $terr_4 }} </th>
                        </tr>  @php $i++; @endphp
                        @endif
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="row col-md-12 remark-div" id="bottomTab_16"> 
                @if($controllerName->bottomRemarks(16, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(16, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(16, $yrs)) {!! $controllerName->bottomRemarksTemp(16, $yrs)->remark !!}
                @endif  
            </div>

        </div>  </div>



        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 17) == 0) display: none; @endif">
            @php
                $cla_1_con_1 = 0;    $cla_2_con_1 = 0;    $cla_3_con_1 = 0;    $cla_4_con_1 = 0;    $cla_5_con_1 = 0;
                $cla_1_con_2 = 0;    $cla_2_con_2 = 0;    $cla_3_con_2 = 0;    $cla_4_con_2 = 0;    $cla_5_con_2 = 0;
                $cla_1_con_3 = 0;    $cla_2_con_3 = 0;    $cla_3_con_3 = 0;    $cla_4_con_3 = 0;    $cla_5_con_3 = 0;
                $cla_1_con_4 = 0;    $cla_2_con_4 = 0;    $cla_3_con_4 = 0;    $cla_4_con_4 = 0;    $cla_5_con_4 = 0;
                $cla_1_con_5 = 0;    $cla_2_con_5 = 0;    $cla_3_con_5 = 0;    $cla_4_con_5 = 0;    $cla_5_con_5 = 0;
            @endphp
               
            @include('publication.partials.tablehead',['t_id'=>17,'yrs'=>$yrs, 'remark'=>' Wells Drilled by Contract and Class'])

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">Contract</th>
                        <th style="background: #A3C1AD!important;">Exploratory</th>
                        <th style="background: #A3C1AD!important;">Appraisal(1st & 2nd)</th>
                        <th style="background: #A3C1AD!important;">Ordinary Appraisal</th>
                        <th style="background: #A3C1AD!important;">Development</th>
                        <th style="background: #A3C1AD!important;">Total</th>
                    </tr>

                    
                    <tbody>
                    <tr>
                        @php
                            $cla_1_con_1 = $controllerName->getContract($yrs, 1, 1);
                            $cla_2_con_1 = $controllerName->getContract($yrs, 2, 1);
                            $cla_3_con_1 = $controllerName->getContract($yrs, 3, 1);
                            $cla_4_con_1 = $controllerName->getContract($yrs, 4, 1);
                            $cla_5_con_1 = $controllerName->getContract($yrs, 5, 1);
                        @endphp
                        <th class="th_h"><b>SC</b></th>
                        <th class="th_h">{{$cla_1_con_1}}</th>
                        <th class="th_h">{{$cla_2_con_1 + $cla_3_con_1}}</th>
                        <th class="th_h">{{$cla_4_con_1}}</th>
                        <th class="th_h">{{$cla_5_con_1}}</th>
                        <th class="th_h">
                            @php  $tot_sc = $cla_1_con_1 + $cla_2_con_1 + $cla_3_con_1 + $cla_4_con_1 + $cla_5_con_1; @endphp   
                            {{$tot_sc}}
                        </th>
                    </tr>
                    <tr>
                        @php
                            $cla_1_con_2 = $controllerName->getContract($yrs, 1, 2);
                            $cla_2_con_2 = $controllerName->getContract($yrs, 2, 2);
                            $cla_3_con_2 = $controllerName->getContract($yrs, 3, 2);
                            $cla_4_con_2 = $controllerName->getContract($yrs, 4, 2);
                            $cla_5_con_2 = $controllerName->getContract($yrs, 5, 2);
                        @endphp
                        <th class="th_h" style="background: #ACE1AF!important;"><b>SR</b></th>
                        <th class="th_h" style="background: #ACE1AF!important;">{{$cla_1_con_2}}</th>
                        <th class="th_h" style="background: #ACE1AF!important;">{{$cla_2_con_2 + $cla_3_con_2}}</th>
                        <th class="th_h" style="background: #ACE1AF!important;">{{$cla_4_con_2}}</th>
                        <th class="th_h" style="background: #ACE1AF!important;">{{$cla_5_con_2}}</th>
                        <th class="th_h" style="background: #ACE1AF!important;">
                            @php $tot_sr = $cla_1_con_2 + $cla_2_con_2 + $cla_3_con_2 + $cla_4_con_2 + $cla_5_con_2; @endphp      
                            {{$tot_sr}}
                        </th>
                    </tr>
                    <tr>
                        @php
                            $cla_1_con_3 = $controllerName->getContract($yrs, 1, 3);
                            $cla_2_con_3 = $controllerName->getContract($yrs, 2, 3);
                            $cla_3_con_3 = $controllerName->getContract($yrs, 3, 3);
                            $cla_4_con_3 = $controllerName->getContract($yrs, 4, 3);
                            $cla_5_con_3 = $controllerName->getContract($yrs, 5, 3);
                        @endphp
                        <th class="th_h"><b>MF</b></th>
                        <th class="th_h">{{$cla_1_con_3}}</th>
                        <th class="th_h">{{$cla_2_con_3 + $cla_3_con_3}}</th>
                        <th class="th_h">{{$cla_4_con_3}}</th>
                        <th class="th_h">{{$cla_5_con_3}}</th>
                        <th class="th_h">
                            @php $tot_mf = $cla_1_con_3 + $cla_2_con_3 + $cla_3_con_3 + $cla_4_con_3 + $cla_5_con_3; @endphp 
                            {{$tot_mf}}
                        </th>
                    </tr>
                    <tr>
                        @php
                            $cla_1_con_4 = $controllerName->getContract($yrs, 1, 4);
                            $cla_2_con_4 = $controllerName->getContract($yrs, 2, 4);
                            $cla_3_con_4 = $controllerName->getContract($yrs, 3, 4);
                            $cla_4_con_4 = $controllerName->getContract($yrs, 4, 4);
                            $cla_5_con_4 = $controllerName->getContract($yrs, 5, 4);
                        @endphp
                        <th class="th_h" style="background: #ACE1AF!important;"><b>JV</b></th>
                        <th class="th_h" style="background: #ACE1AF!important;">{{$cla_1_con_4}}</th>
                        <th class="th_h" style="background: #ACE1AF!important;">{{$cla_2_con_4 + $cla_3_con_4}}</th>
                        <th class="th_h" style="background: #ACE1AF!important;">{{$cla_4_con_4}}</th>
                        <th class="th_h" style="background: #ACE1AF!important;">{{$cla_5_con_4}}</th>
                        <th class="th_h" style="background: #ACE1AF!important;">
                            @php $tot_jv = $cla_1_con_4 + $cla_2_con_4 + $cla_3_con_4 + $cla_4_con_4 + $cla_5_con_4; @endphp        
                            {{$tot_jv}}
                        </th>
                    </tr>
                    <tr>
                        @php
                            $cla_1_con_5 = $controllerName->getContract($yrs, 1, 5);
                            $cla_2_con_5 = $controllerName->getContract($yrs, 2, 5);
                            $cla_3_con_5 = $controllerName->getContract($yrs, 3, 5);
                            $cla_4_con_5 = $controllerName->getContract($yrs, 4, 5);
                            $cla_5_con_5 = $controllerName->getContract($yrs, 5, 5);
                        @endphp
                        <th class="th_h"><b>PSC</b></th>
                        <th class="th_h">{{$cla_1_con_5}}</th>
                        <th class="th_h">{{$cla_2_con_5 + $cla_3_con_5}}</th>
                        <th class="th_h">{{$cla_4_con_5}}</th>
                        <th class="th_h">{{$cla_5_con_5}}</th>
                        <th class="th_h">
                            @php $tot_psc = $cla_1_con_5 + $cla_2_con_5 + $cla_3_con_5 + $cla_4_con_5 + $cla_5_con_5; @endphp        {{$tot_psc}}
                        </th>
                    </tr>
                    @php   
                        $contr_arr[1] = $tot_jv;   $contr_arr[2] = $tot_sc;  $contr_arr[3] = $tot_sr;  $contr_arr[4] = $tot_psc;  $contr_arr[5] = $tot_mf; 
                    @endphp

                    <tr>
                        <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size">Total</b></th>
                        <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                            {{$cla_1_con_1 + $cla_1_con_2 + $cla_1_con_3 + $cla_1_con_4 + $cla_1_con_5}}</b> 
                        </th>
                        <th class="th_h" style="background: #A3C1AD!important;"> <b class="bfont-size"> 
                            {{
                                $cla_2_con_1 + $cla_2_con_2 + $cla_2_con_3 + $cla_2_con_4 + $cla_2_con_5 + 
                                $cla_3_con_1 + $cla_3_con_2 + $cla_3_con_3 + $cla_3_con_4 + $cla_3_con_5
                            }}  </b>
                        </th>
                        <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                            {{$cla_4_con_1 + $cla_4_con_2 + $cla_4_con_3 + $cla_4_con_4 + $cla_4_con_5}} </b> 
                        </th>
                        <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                            {{$cla_5_con_1 + $cla_5_con_2 + $cla_5_con_3 + $cla_5_con_4 + $cla_5_con_5}}</b> 
                        </th>
                        <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"> 
                            {{$tot_sc + $tot_sr + $tot_mf + $tot_jv + $tot_psc}}</b> 
                        </th>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="row col-md-12 remark-div" id="bottomTab_17"> 
                @if($controllerName->bottomRemarks(17, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(17, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(17, $yrs)) {!! $controllerName->bottomRemarksTemp(17, $yrs)->remark !!}
                @endif 
            </div>

        </div>  </div>




        {{-- PRINT PAGE BREAK --}}    
        <p class="page-break"></p>

        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 18) == 0) display: none; @endif">
               
            @include('publication.partials.tablehead',['t_id'=>18,'yrs'=>$yrs, 'remark'=>' Wells Drilled by Class'])

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;" style="background: #A3C1AD!important;">Year</th>
                        <th style="background: #A3C1AD!important;" style="background: #A3C1AD!important;">Exploratory</th>
                        <th style="background: #A3C1AD!important;" style="background: #A3C1AD!important;">Appraisal(1st & 2nd)</th>
                        <th style="background: #A3C1AD!important;" style="background: #A3C1AD!important;">Ordinary Appraisal</th>
                        <th style="background: #A3C1AD!important;" style="background: #A3C1AD!important;">Development</th>
                        <th style="background: #A3C1AD!important;" style="background: #A3C1AD!important;">Total</th>
                    </tr>
                    
                    <tbody>@php $i = 1; @endphp
                        @forelse($array_year_10 as $k => $year)
                        @php
                            $class_1 = $controllerName->getYearTotal($year, 1);  
                            $class_2 = $controllerName->getYearTotal($year, 2);
                            $class_3 = $controllerName->getYearTotal($year, 3);
                            $class_4 = $controllerName->getYearTotal($year, 4);
                            $class_5 = $controllerName->getYearTotal($year, 5);

                            $total = ($class_1 + $class_2 + $class_3 + $class_4 + $class_5);
                        @endphp
                        @if($total != 0)
                            <tr>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif><b>{{$year}}</b></th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$class_1}}</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$class_2 + $class_3}}</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$class_4}}</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$class_5}}</th>
                                <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$class_1 + $class_2 + $class_3 + $class_4 + $class_5}}</th>
                            </tr>@php $i++; @endphp
                        @endif
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="row col-md-12 remark-div" id="bottomTab_18"> 
                @if($controllerName->bottomRemarks(18, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(18, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(18, $yrs)) {!! $controllerName->bottomRemarksTemp(18, $yrs)->remark !!}
                @endif 
            </div>

        </div>  </div>

        <br>
        <br>
        
        <br>



        <div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 19) == 0) display: none; @endif">
               
            @include('publication.partials.tablehead',['t_id'=>19,'yrs'=>$yrs, 'remark'=>' Number of Wells Completed'])

            <div class="table-responsive">
                <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
                    
                    <tr class="th_head">
                        <th style="background: #A3C1AD!important;">Type of Contract</th>
                        <th style="background: #A3C1AD!important;">Total</th>
                        {{-- <th style="background: #A3C1AD!important;">By Terrain</th> --}}
                    </tr>
                    
                    <tbody> @php $tot = 0;  $i=1; @endphp
                        @forelse($contracts as $contract)
                        {{-- HIDDING ALL SERVICE CONTRACT (CONTRACT ID 1) --}}
                        @if($contract->id > 1)
                            <tr>
                                <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$contract->contract_name}}</th>
                                <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                                    {{$controllerName->completionByContractTerrain($year, 'contract_id', $contract->id, 'number_of_well')}}
                                    @php 
                                        $tot += $controllerName->completionByContractTerrain($year, 'contract_id', $contract->id, 'number_of_well'); 
                                    @endphp
                                </th>
                                {{-- <th  @if(even($i) == true) style="background: #ACE1AF!important;" @endif></th> --}}
                            </tr> @php $i++; @endphp
                        @endif
                        @empty
                        @endforelse
                            <tr>
                                <th style="background: #A3C1AD!important;"><b class="bfont-size">Total</b></th>
                                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$tot}}</b></th>
                           {{-- <th style="background: #A3C1AD!important;"><b class="bfont-size"></b></th> </tr> --}}
                    </tbody>
                </table>
            </div>

            <div class="row col-md-12 remark-div" id="bottomTab_19"> 
                @if($controllerName->bottomRemarks(19, $yrs) && $table_of_contents) 
                    {!! $controllerName->bottomRemarks(19, $yrs)->remark !!} 
                @elseif($controllerName->bottomRemarksTemp(19, $yrs)) {!! $controllerName->bottomRemarksTemp(19, $yrs)->remark !!}
                @endif  
            </div>

            <button type="button" id="load_two" class="btn btn-default pull-right no-print" onclick="loadTwo()">Load More</button>

        </div>  </div>





        <div id="section_two"> 
        </div>

    </div>
</div>







<!-- INCLUDING MODALS -->
@include('publication.partials.publicationModals')


<!-- INCLUDING JAVASCRIPT -->
@include('publication.partials.publicationJScript')



<!-- INCLUDING CHARTS chart js-->
@include('publication.partials.chartOne')
