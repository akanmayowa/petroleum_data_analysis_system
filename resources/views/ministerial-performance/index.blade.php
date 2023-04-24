@extends('layouts.app')
    @section('search')

        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
              
                <input class="search-input" type="search" id="dynamicsearch" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle" style="font-size:20px"></i>
                </a>
              
            </div>
        </div>

    @endsection
@section('content')




<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Ministerial KPI Data Upload </h4>                
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-pills" role="tablist">
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_ministerial_kpi') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_ministerial_kpi') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link MPM_" data-toggle="tab" href="#mpm" role="tab" title="Monthly Performance Management" onclick="loadAjax('MPM_')">MPM</a>
                        </li> 
                        {{-- <li class="nav-item nav-pad">
                            <a class="nav-link net_cash_flow" data-toggle="tab" href="#net_cash" role="tab" onclick="displayNetCashFlow()">MPM Net Cash Flows</a>
                        </li>  --}}
                    @endif
                    
                    {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'manage_weekly_activity_report') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_weekly_activity_report') ||
                      Auth::user()->role_obj->permission->contains('constant', 'manage_monthly_activity_report') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_monthly_activity_report') )
                        <!-- NEW WAR REPORT ADDED TO PERFORMANCE MANAGEMENT -->
                        <li class="nav-item nav-pad" data-toggle="tooltip" data-original-title="Weekly / Monthly Activity Report">
                            <a class="nav-link" data-toggle="tab" href="#act_rep" role="tab">Activity Report</a>
                        </li>
                    @endif --}}
                    
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_mpm_master_data') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_mpm_master_data') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#master_data" role="tab" title="Monthly Performance Management Master Data">MPM Master Data</a>
                        </li> 
                    @endif
                    <!-- NEW WAR REPORT ADDED TO PERFORMANCE MANAGEMENT -->                    
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane p-3" id="mpm" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="MPM_">                       

                            </div> <!-- end row -->
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="net_cash" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="net_cash_flow">                       

                            </div> <!-- end row -->
                        </p>
                    </div>
                    <!-- NEW WAR REPORT ADDED TO PERFORMANCE MANAGEMENT -->

                        <div class="tab-pane" id="act_rep" role="tabpanel">
                            <p class="font-14 mb-0" style="padding: 3px 0px">

                              <!-- Tab panes -->
                                <ul class="nav nav-pills nav-pad" role="tablist">                                
                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link war_mpm" data-toggle="tab" href="#war" role="tab" onclick="loadAjax('war_mpm')">Weekly Activity Report</a>
                                    </li>
                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link mar_mpm" data-toggle="tab" href="#mar" role="tab" onclick="loadAjax('mar_mpm')">Monthly Activity Report</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">

                                    <div class="tab-pane p-3" id="war" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <div class="row" id="war_mpm">    

                                            </div> <!-- end row -->
                                        </p>
                                    </div>

                                    <div class="tab-pane p-3" id="mar" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <div class="row" id="mar_mpm">  

                                            </div> <!-- end row -->
                                        </p>
                                    </div>
                                    
                                </div>                            
                            </p>
                        </div>

                    <!-- NEW WAR REPORT ADDED TO PERFORMANCE MANAGEMENT -->

                    <div class="tab-pane" id="master_data" role="tabpanel">
                        <p class="font-14 mb-0" style="padding: 3px 0px">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist">                                
                                @if(\Auth::user()->role_obj->role_name == 'DWP Report Manager' || \Auth::user()->role_obj->role_name == 'Admin')
                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link Themic" data-toggle="tab" href="#themic" role="tab" onclick="loadAjax('Themic')">Themic Area</a>
                                    </li>
                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link Result" data-toggle="tab" href="#key_result_area" role="tab" onclick="loadAjax('Result')">Key Result Area</a>
                                    </li>

                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link mpm_kpi" data-toggle="tab" href="#kpi" role="tab" onclick="loadAjax('mpm_kpi')">KPI</a>
                                    </li>

                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link Source" data-toggle="tab" href="#source" role="tab" onclick="loadAjax('Source')">Source</a>
                                    </li>
                                    
                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link Metric" data-toggle="tab" href="#metric" role="tab" onclick="loadAjax('Metric')">Metric</a>
                                    </li>
                                    
                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link frequency_measurement" data-toggle="tab" href="#measure" role="tab" onclick="loadAjax('frequency_measurement')">Measurement</a>
                                    </li>

                                    <li class="nav-item nav-pad nav-pad-sub">
                                        <a class="nav-link Mpm_expenditure" data-toggle="tab" href="#expenditure" role="tab" onclick="loadAjax('Mpm_expenditure')">Expenditure</a>
                                    </li>
                                @endif
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane p-3" id="themic" role="tabpanel">
                                    <p class="font-14 mb-0">
                                         <div class="row" id="Themic">                                  

                                         </div> <!-- end row --> 
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="key_result_area" role="tabpanel">
                                    <p class="font-14 mb-0">                            
                                        <div class="row" id="Result">                                  

                                         </div> <!-- end row -->    
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="kpi" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="mpm_kpi">                                  

                                         </div> <!-- end row --> 
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="source" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="Source">                                  

                                         </div> <!-- end row --> 
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="metric" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="Metric">                                  

                                         </div> <!-- end row --> 
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="measure" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="frequency_measurement">                                  

                                         </div> <!-- end row --> 
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="expenditure" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="Mpm_expenditure">                                  

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















  <!-- Add MPM modal -->
<div id="addmpm" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Ministerial Performance Management </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="mpmForms" action="{{url('/ministerial-performance/')}}" method="POST">
            {{ csrf_field() }}          
            <input type="hidden" name="date_mpm" id="date_mpm" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="addmpm">

          <input type="hidden" name="ajax" value="1">

          <div class="form-group row">
                <label for="year_mpm" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="YEAR - YYYY" name="year" id="year_mpm" readonly="" required>
                </div>

                <label for="frequency_of_measurement_id" class="col-sm-1 col-form-label"> Measurement </label>
                <div class="col-sm-5">
                    <select class="form-control" name="frequency_of_measurement_id" id="frequency_of_measurement_id" required>
                        <option value=""> Select Frequency of Measurement </option>
                        @if($frequency)
                            @foreach($frequency as $frequency)

                                <option value="{{$frequency->id}}"> {{$frequency->frequency_name}} </option>
                                
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>


          <div class="form-group row">
                <label for="themic_area_id" class="col-sm-2 col-form-label"> Themic Area </label>
                <div class="col-sm-10">
                    <select class="form-control" name="themic_area_id" id="themic_area_id" required>
                        
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="key_result_area_id" class="col-sm-2 col-form-label"> Key Result </label>
                <div class="col-sm-10">
                    <select class="form-control" name="key_result_area_id" id="key_result_area_id" required>
                        
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="mpm_kpis_" class="col-sm-2 col-form-label"> KPI </label>
                <div class="col-sm-10">
                    <select class="form-control" name="kpi" id="mpm_kpis_" required>
                        
                    </select>
                </div>
          </div>



          <div class="form-group row">
                <label for="source_id" class="col-sm-2 col-form-label"> Source </label>
                <div class="col-sm-4">
                    <select class="form-control" name="source_id" id="source_id" required>
                        <option value=""> Select A Source </option>
                        @if($sources)
                            @foreach($sources as $sources)

                                <option value="{{$sources->id}}"> {{$sources->source_name}} </option>
                                
                            @endforeach
                        @endif
                    </select>
                </div>
                <label for="metric_id" class="col-sm-1 col-form-label"> Metric </label>
                <div class="col-sm-5">
                    <select class="form-control" name="metric_id" id="metric_id" required>
                        <option value=""> Select Metric </option>
                        @if($metrics)
                            @foreach($metrics as $metrics)

                                <option value="{{$metrics->id}}"> {{$metrics->metric_name}} </option>
                                
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>
          

          <div class="form-group row">               
                <label for="baseline" class="col-sm-2 col-form-label"> Baseline </label>
                <div class="col-sm-4">
                    <input type="number"  step="0.01" class="form-control" placeholder="Baseline" name="baseline" id="baseline"  value="0" onkeyup="checkValue(this)">
                </div>
 
                <label for="year_target" class="col-sm-1 col-form-label"> Target </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01"  class="form-control" placeholder="Year Target" name="year_target" id="year_target"  value="0" onkeyup="checkValue(this)">
                </div>
          </div>

          <div class="form-group row">               
                <label for="january" class="col-sm-2 col-form-label"> January </label>
                <div class="col-sm-4">
                    <input type="number" step="0.01" class="form-control mon" placeholder="January" name="january" id="january"   value="0" onkeyup="checkValue(this)">
                </div>
 
                <label for="february" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control mon" placeholder="February" name="february" id="february"  value="0" onkeyup="checkValue(this)">
                </div>
          </div>

          <div class="form-group row">               
                <label for="march" class="col-sm-2 col-form-label"> March </label>
                <div class="col-sm-4">
                    <input type="number" step="0.01" class="form-control mon" placeholder="March" name="march" id="march"  value="0" onkeyup="checkValue(this)">
                </div>
 
                <label for="april" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control mon" placeholder="April" name="april" id="april"  value="0" onkeyup="checkValue(this)">
                </div>
          </div>

          <div class="form-group row">               
                <label for="may" class="col-sm-2 col-form-label"> May </label>
                <div class="col-sm-4">
                    <input type="number" step="0.01" class="form-control mon" placeholder="May" name="may" id="may"  value="0" onkeyup="checkValue(this)">
                </div>
 
                <label for="june" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control mon" placeholder="June" name="june" id="june"  value="0" onkeyup="checkValue(this)">
                </div>
          </div>

          <div class="form-group row">               
                <label for="july" class="col-sm-2 col-form-label"> July </label>
                <div class="col-sm-4">
                    <input type="number" step="0.01" class="form-control mon" placeholder="July" name="july" id="july"  value="0" onkeyup="checkValue(this)">
                </div>
 
                <label for="august" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control mon" placeholder="August" name="august" id="august"  value="0" onkeyup="checkValue(this)">
                </div>
          </div>

          <div class="form-group row">               
                <label for="september" class="col-sm-2 col-form-label"> September </label>
                <div class="col-sm-4">
                    <input type="number" step="0.01" class="form-control mon" placeholder="September" name="september" id="september"  value="0" onkeyup="checkValue(this)">
                </div>
 
                <label for="october" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control mon" placeholder="October" name="october" id="october"  value="0" onkeyup="checkValue(this)">
                </div>
          </div>

          <div class="form-group row">               
                <label for="november" class="col-sm-2 col-form-label"> November </label>
                <div class="col-sm-4">
                    <input type="number" step="0.01" class="form-control mon" placeholder="November" name="november" id="november"  value="0" onkeyup="checkValue(this)">
                </div>
 
                <label for="december" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control mon" placeholder="December" name="december" id="december"  value="0" onkeyup="checkValue(this)">
                </div>
          </div>

          <div class="form-group row">
                <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
                <div class="col-sm-10">
                    <textarea row="2" class="form-control" placeholder="Remark" name="remark" id="remark"></textarea>
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_mpm_btn" id="add_mpm_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Ministerial KPI </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>

<!-- Edit MPM modal -->
<div id="editmpm" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Ministerial Performance</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_mpm"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload MPM modal -->
<div id="uplmpm" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Ministerial Performance Management Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('ministerial-performance')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="uploadmpm">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/MPM/Sample Monthly Performance Management.xlsx')}}" download="Sample Monthly Performance Management Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Monthly Performance Management Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>

<!-- View MPM modal -->
<div id="view_mpm" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">View Ministerial Performance</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewmpm"></div>
          </div>
    </div>
    </div>  
</div>








<!-- NEW WAR REPORT ADDED TO PERFORMANCE MANAGEMENT HERE -->


<!-- Add Weekly Activity Report modal -->
<div id="addwar" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Weekly Activity Report</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="mpmForm" action="{{url('/ministerial-performance/')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="date_war" id="date_war" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="addwar">

          <div class="form-group row">
                <label for="deliverables" class="col-sm-2 col-form-label"> Deliverables </label>
                <div class="col-sm-10">
                    <textarea type="number" class="form-control" rows="3" placeholder="Report Deliverables" name="deliverables" id="deliverables" required></textarea>
                </div>
          </div>

          <div class="form-group row">
                <label for="department_id" class="col-sm-2 col-form-label"> Department </label>
                <div class="col-sm-10">
                    <select class="form-control" name="department_id" id="department_id" required>
                        <option value=""> Select Department </option>
                        @if($departments)
                            @foreach($departments as $departments)
                                <option value="{{$departments->id}}"> {{$departments->department_name}} </option>                                
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="status_id" class="col-sm-2 col-form-label"> Status </label>
                <div class="col-sm-10">
                    <select class="form-control" name="status_id" id="status_id" required>
                        <option value=""> Select Department </option>
                        @if($sta_cats)
                            @foreach($sta_cats as $sta_cats)
                                <option value="{{$sta_cats->id}}"> {{$sta_cats->status}} </option>                                
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label class="col-sm-2 col-form-label"> Date </label>
                <div class="col-sm-5 input-group date" data-provide="datepicker">
                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="from_date" name="from_date" required>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
                <div class="col-sm-5 input-group date" data-provide="datepicker">
                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="to_date" name="to_date" required>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>

          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_war_btn" id="add_war_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Weekly Activity </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Weekly Activity Report modal -->
<div id="editwarmpm_rep" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Weekly Activity Report</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_war_mpm_rep"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Weekly Activity Report modal -->
<div id="uplwar" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Weekly Activity Report Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('ministerial-performance')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="uploadwar">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/MPM/Sample Weekly Activity Report.xlsx')}}" download="Sample Weekly Activity Report Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Weekly Activity Report Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Weekly Activity Report modal -->
<div id="view_war_mpm_rep" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">View Weekly Activity Report</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewwar_mpm_rep"></div>
          </div>
    </div>
    </div>  
</div>













<!-- Add Themic Area modal -->
<div id="addthemic" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Themic Area</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="themicForm" action="{{url('/ministerial-performance/')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="_date" id="_date" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="addthemic_area">

          <div class="form-group row">
                <label for="year_themic" class="col-sm-2 col-form-label">Year</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_themic" required>
                </div>
          </div>

          <div class="form-group row">
                <label for="themic_area_name" class="col-sm-2 col-form-label"><i class="fa fa-chart">Themic Area Name</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Themic Area Name" name="themic_area_name" id="themic_area_name" required>
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_themic_btn" id="add_themic_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Themic Area</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Themic Area modal -->
<div id="edit_themic" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Themic Area </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editthemic"></div>
          </div>
    </div>
    </div>  
 </div>


<!-- Upload Themic Area  modal -->
<div id="uplthemic" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Themic Area Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('ministerial-performance')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="uploadthemic_area">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/MPM/Sample MPM Themic Area.xlsx')}}" download="Sample MPM Themic Area Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample MPM Themic Area Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>




<!-- Add Key Result Area modal -->
<div id="addkra" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Key Result Area</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="resultForm" action="{{url('/ministerial-performance/')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="_date" id="_date" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="addkey_result_area">

          <div class="form-group row">
                <label for="year_kresult" class="col-sm-2 col-form-label">Year</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_kresult" required>
                </div>
          </div>

          <div class="form-group row">
                <label for="result_area_name" class="col-sm-2 col-form-label"><i class="fa fa-chart">Key Result Area</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Key Result Area" name="result_area_name" id="result_area_name" required>
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_kra_btn" id="add_kra_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Key Result Area</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Key Result Area  modal -->
<div id="edit_result" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Key Result Area </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editresult"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Key Result Area  modal -->
<div id="uplkra" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Key Result Area Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('ministerial-performance')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="uploadkey_result_area">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/MPM/Sample MPM Key Result Area.xlsx')}}" download="Sample MPM Key Result Area Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample MPM Key Result Area Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- Add KPI modal -->
<div id="add_kpi" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add MPM KPI</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="kpiForm" action="{{url('/ministerial-performance/')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="_date" id="_date" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_mpm_kpi">

          <div class="form-group row">
                <label for="year_kpi" class="col-sm-2 col-form-label">Year</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_kpi" required>
                </div>
          </div>

          <div class="form-group row">
                <label for="kpi_name" class="col-sm-2 col-form-label"> KPI Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="KPI Name" name="kpi_name" id="kpi_name" required>
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_kpi_btn" id="add_kpi_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add KPI </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>

@include('ministerial-performance.modals.addExpenditure')
<!-- Edit KPI modal -->
<div id="edit_kpi" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit KPI </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editkpi"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload KPI  modal -->
<div id="upl_kpi" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload KPI Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('ministerial-performance')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_mpm_kpi">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/MPM/Sample MPM Key Performance Index.xlsx')}}" download="Sample MPM Key Performance Index Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample MPM Key Performance Index Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>

<!-- upl_kpi -->
<!-- UPload Expenditure Modal -->
<div id="upl_expenditure" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload MPM Expenditure Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('dwp')}}" id="uploadMPMexpenditure" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file" required>
                    <input type="hidden" name="type" value="uploadExpenditure" name="">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a id="upl_expenditure_link" href="" download="Sample MPM Expenditure Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample MPM Key Performance Index Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
                
                <!-- <button id="uploadMPMexpenditureBtn" class="btn btn-dark pull-left">Upload File</button> -->
        </div>
    </div>
    </div>  
</div>


<!-- Add Source modal -->
<div id="addsource" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add MPM Source</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="sourceForm" action="{{url('/ministerial-performance/')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="_date" id="_date" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="addsource">

          <div class="form-group row">
                <label for="source_name" class="col-sm-2 col-form-label"><i class="fa fa-chart">Source</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Source Name" name="source_name" id="source_name" required>
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_source_btn" id="add_source_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Source </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Source modal -->
<div id="editsource" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Source </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_source"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Source  modal -->
<div id="uplsource" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Source Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('ministerial-performance')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="uploadsource">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/MPM/Sample MPM Source.xlsx')}}" download="Sample MPM Source Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample MPM Source Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>




<!-- Add Metric modal -->
<div id="addmetric" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add MPM Metric</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="metricForm" action="{{url('/ministerial-performance/')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="_date" id="_date" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="addmetric">

          <div class="form-group row">
                <label for="metric_name" class="col-sm-2 col-form-label"><i class="fa fa-chart">Metric</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Metric Name" name="metric_name" id="metric_name" required>
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_metric_btn" id="add_metric_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Metric </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Metric modal -->
<div id="editmetric" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit MPM Metric </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_metric"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Metric  modal -->
<div id="uplmetric" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Metric Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('ministerial-performance')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="uploadmetric">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/MPM/Sample MPM Metric.xlsx')}}" download="Sample MPM Metric Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample MPM Metric Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- Add Frequency of Measurement modal -->
<div id="add_frequency" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Frequency of Measurement</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="fomForm" action="{{url('/ministerial-performance/')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="_date" id="_date" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_frequency_of_measurement">

          <div class="form-group row">
                <label for="frequency_name" class="col-sm-2 col-form-label"> Frequency of Measurement </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Frequency of Measurement Name" name="frequency_name" id="frequency_name" required>
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_fom_btn" id="add_fom_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Frequency of Measurement </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Frequency of Measurement modal -->
<div id="edit_frequency" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header  header_bg">
            <h4 class="modal-title">Edit Frequency of Measurement </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editfrequency"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Frequency of Measurement  modal -->
<div id="upl_frequency" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Frequency of Measurement Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('ministerial-performance')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_frequency_of_measurement">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/MPM/Sample MPM Frequency of Measurement.xlsx')}}" download="Sample MPM Frequency of Measurement Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample MPM Frequency of Measurement Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>













@endsection

@section('script')

<script type="text/javascript">
    
    $(function()
    {
        $('#start_dates').datepicker();

        $('#year_exp').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        });

        $('#month_exp').datepicker(
        {
            autoclose: true,format: "MM",
            viewMode: "months", 
            minViewMode: "months"
        });

        $('#year_themic').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        });

        $('#year_kresult').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        });

        $('#year_kpi').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        });
    });


    function showmodal(modalid)
    {  
        $('#'+modalid+'_link').attr('href',sessionStorage.getItem('url'));
        $('#'+modalid).modal('show');
    }


    $(function()
    {

    $('#dynamicsearch').on('keyup',function(){

    
      name=sessionStorage.getItem('name');

      q=$('#dynamicsearch').val().replace(' ','%20');
       
        loadAjax(name,q);
      
      
    
    })

        //compute TOTAL Retail Outlet      
        $(document).on("input", ".out", function()
        {
            var total_out = 0;
            $('.out').each(function()            
            {
                total_out += parseFloat($(this).val());
            });

            $("#total_out").val(total_out);
            console.log(total_out);                         
       
        });
    });

    

    //setting all values to default 0
    function checkValue(field) 
    {  
        if (field.value == '') 
        {
            var fid = field.id;
            document.getElementById(fid).value = 0;
        }
    }

</script>


<script>   // JAVASCRIPT AJAX FUNCTION

function edi_mpm( year , month , expenditure)
{
    $('#month_exp').val(month);
    $('#year_exp').val(year);
    $('#expenditureField').val(expenditure);
    $('#add_expenditure').modal('show');
}

function appendTable(data, tableId)
{

    if(tableId == 'mpm_table')
    {
        var _date = document.getElementById('date_mpm').value; 
        $('#'+tableId).prepend('<tr> <th> '+data.year+' </th>  <th> '+data.themic_area+' </th>  <th> '+data.result_area+' </th>    <th> '+data.kpi+' </th>  <th> '+data.baseline+' </th>  <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_mpm('+data.id+')" class="btn-sm pull-right" title="View Ministerial Performance Management"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_mpm('+data.id+')" class="btn-sm pull-right" title="Edit Ministerial Performance Management"> <i class="fa fa-pencil"></i>  </a> </th>   </tr>');
    }

    else if(tableId == 'war_table')
    {
        var _date = document.getElementById('date_war').value; 
        $('#'+tableId).prepend('<tr>  <th> '+data.deliverables+' </th> <th> '+data.department+' </th>  <th> '+data.status+' </th> <th> '+data.from_date+' </th>  <th> '+data.to_date+' </th>  <th> '+_date+' </th>    <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_war_mpm_report('+data.id+')" class="btn-sm pull-right" title="View Weekly Activity Report"> <i class="fa fa-eye"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_war_mpm_report('+data.id+')" class="btn-sm pull-right" title="Edit Weekly Activity Report"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>');
    }
    
    
    else if(tableId == 'themic_table')
    {
        var _date = document.getElementById('_date').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.themic_area+' </th>  <th> '+_date+' </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_themic('+data.id+')" class="btn-sm pull-right" title="Edit MPM Themic Area"> <i class="fa fa-pencil"></i>  </a> </th>   </tr>');
    }
    
    else if(tableId == '_kra_table')
    {
        var _date = document.getElementById('_date').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.result_area+' </th>  <th> '+_date+' </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_result_area('+data.id+')" class="btn-sm pull-right" title="Edit Key Result Area"> <i class="fa fa-pencil"></i>  </a> </th>   </tr>');
    }
    
    else if(tableId == 'kpi_table')
    {
        var _date = document.getElementById('_date').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.year+' </th>  <th> '+data.kpi_name+' </th>  <th> '+_date+' </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_kpi('+data.id+')" class="btn-sm pull-right" title="Edit Key Performance Index (KPI)"> <i class="fa fa-pencil"></i>  </a> </th>   </tr>');
    }
    
    else if(tableId == 'source_table')
    {
        var _date = document.getElementById('_date').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.source+' </th>  <th> '+_date+' </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_source('+data.id+')" class="btn-sm pull-right" title="Edit MPM Source"> <i class="fa fa-pencil"></i>  </a> </th>   </tr>');
    }
    
    else if(tableId == 'metric_table')
    {
        var _date = document.getElementById('_date').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.metric+' </th>  <th> '+_date+' </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_metric('+data.id+')" class="btn-sm pull-right" title="Edit MPM Metric"> <i class="fa fa-pencil"></i>  </a> </th>   </tr>');
    }
    
    else if(tableId == 'fom_table')
    {
        var _date = document.getElementById('_date').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.frequency_name+' </th>  <th> '+_date+' </th>  <th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_frequency_of_measurement('+data.id+')" class="btn-sm pull-right" title="Edit Frequency of Measurement"> <i class="fa fa-pencil"></i>  </a> </th>   </tr>');
    }

}

//function to process form data
function processForm(formid, route, tableId, progress, modalid)
{
   formdata= new FormData($('#'+formid)[0]);
   formdata.append('_token','{{csrf_token()}}');
  
    $.ajax(
    {
        // Your server script to process the upload
        url: route,
        type: 'POST',
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data, status, xhr)
        {
            if(data.status=='ok')
            {
                appendTable(data.message,tableId);
                $('#'+modalid).modal('hide');
               
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                toastr.info(data.info, {timeOut:10000});
                return;
            }
           
            return toastr.error(data.info, {timeOut:10000});

        },
        // Custom XMLHttpRequest
        xhr: function() 
        {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) 
            {
                // For handling the progress of the upload
                myXhr.upload.addEventListener('progress', function(e) 
                {
                    if (e.lengthComputable) 
                    {
                        percent=Math.round((e.loaded/e.total)*100,2);
                        $('#'+progress).css('width',percent+'%');
                        $('#'+progress+'_text').text(percent+'%');
                    }
                }, false);
            }
            return myXhr;
        }
    })

}





    $(function()
    { 

        //MPM
        $("#mpmForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('mpmForm', "{{url('/ministerial-performance')}}", 'mpm_table', 'progressMPM', 'addmpm');
        });       

        $('#uploadMPMexpenditure').on('submit',function(e)
        { 
            e.preventDefault();
            processForm('uploadMPMexpenditure', "{{url('dwp')}}", '', 'progressMPM', 'upl_expenditure');
        });  

        //WAR
        $("#mpmForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('mpmForm', "{{url('/ministerial-performance')}}", 'war_table', 'progressMPM', 'addwar');
        }); 
 

        //THEMIC
        $("#themicForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('themicForm', "{{url('/ministerial-performance')}}", 'themic_table', 'progressThemic', 'addthemic');
        }); 

        //KRA
        $("#resultForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('resultForm', "{{url('/ministerial-performance')}}", '_kra_table', 'progressKRA', 'addkra');
        });

        //KPI
        $("#kpiForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('kpiForm', "{{url('/ministerial-performance')}}", 'kpi_table', 'progressKPI', 'add_kpi');
        }); 

        //SOURCE
        $("#sourceForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('sourceForm', "{{url('/ministerial-performance')}}", 'source_table', 'progressSource', 'addsource');
        }); 

        //METRIC
        $("#metricForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('metricForm', "{{url('/ministerial-performance')}}", 'metric_table', 'progressMetric', 'addmetric');
        }); 

        //FREQUENCY OF MEASUREMENT
        $("#fomForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('fomForm', "{{url('/ministerial-performance')}}", 'fom_table', 'progressFOM', 'add_frequency');
        }); 

        // Add Expenditure
         $("#expForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('expForm', "{{url('dwp')}}", 'exp_table', 'progressFOM', 'add_expenditure');
        }); 


    });
</script>



<script type="text/javascript"> //FUNCTIONS TO LOAD EDIT MODALS
    function load_mpm(id)
    {   
        $('#edit_mpm').load("{{url('ministerial-performance')}}/modals_editMPM?id="+id);
        $('#editmpm').modal('show');
    }
    function view_mpm(id)
    {   
        $('#viewmpm').load("{{url('ministerial-performance')}}/view_viewMPM?id="+id);
        $('#view_mpm').modal('show');
    }


    function load_war_mpm_report(id)
    {   
        $('#edit_war_mpm_rep').load("{{url('ministerial-performance')}}/modals_editWARMPM?id="+id);
        $('#editwarmpm_rep').modal('show');
    }
    function view_war_mpm_report(id)
    {   
        $('#viewwar_mpm_rep').load("{{url('ministerial-performance')}}/view_viewWARMPM?id="+id);
        $('#view_war_mpm_rep').modal('show');
    }




    function load_themic(id)
    {   
        $('#editthemic').load("{{url('ministerial-performance')}}/modals_editThemicArea?id="+id);
        $('#edit_themic').modal('show');
    }

    function load_result_area(id)
    {   
        $('#editresult').load("{{url('ministerial-performance')}}/modals_editResultArea?id="+id);
        $('#edit_result').modal('show');
    }

    function load_kpi(id)
    {   
        $('#editkpi').load("{{url('ministerial-performance')}}/modals_editMPMKPI?id="+id);
        $('#edit_kpi').modal('show');
    }

    function load_source(id)
    {   
        $('#edit_source').load("{{url('ministerial-performance')}}/modals_editMPMSource?id="+id);
        $('#editsource').modal('show');
    }

    function load_metric(id)
    {   
        $('#edit_metric').load("{{url('ministerial-performance')}}/modals_editMPMMetric?id="+id);
        $('#editmetric').modal('show');
    }

    function load_frequency_of_measurement(id)
    {   
        $('#editfrequency').load("{{url('ministerial-performance')}}/modals_editFrequencyOfMeasurement?id="+id);
        $('#edit_frequency').modal('show');
    }



    //Hide alert message box
</script>




<script type="text/javascript">

    $(function()
    {        

      $('#year_mpm').datepicker(
      {
        autoclose: true, format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
      });      

      $('#month_mpm').datepicker(
      {
        autoclose: true, format: "MM",
        viewMode: "months", 
        minViewMode: "months"
      });      

      $('#month').datepicker(
      {
        autoclose: true, format: "M, yyyy",
        viewMode: "months", 
        minViewMode: "months"
      });

    })

</script>


<!-- AJAX TO POPULATE TABLES AND PAGINATION -->
<script type="text/javascript">
    function loadAjax(id,q=0)
    {
        $('#'+id).load('{{url('ajax')}}/'+id+'?q='+q); 

        sessionStorage.setItem('url','{{url('ajax')}}/'+id+'?excel=excel');

        sessionStorage.setItem('name', id);
    }


    function resolveLoad()
    {
        // $('.'+sessionStorage.getItem('name')).trigger('click');  
        switch (sessionStorage.getItem('name')) 
        {
           case 'MPM_':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'net_cash_flow':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
        }
    }


    
    function displayNetCashFlow($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/mpm_net_cash_flow?q='+$search+'&excel=excel');
        $('#net_cash_flow').load('{{url('ajax')}}/net_cash_flow?q='+$search);
        sessionStorage.setItem('name','net_cash_flow');
    }
   

    $(function()
    {     
        resolveLoad();                
    });



    //AJAX SCRIPT TO GET DETAILS FOR 
    $(function()
      {
        $('#year_mpm').change(function(e)
        { 
          var year = $(this).val();    

          //THEMATIC AREA
          $('#themic_area_id').empty();
          $.get('{{url('getMPMThematicAreaByYear')}}?year=' +year, function(data)
          {  //success data
            $('#themic_area_id').append('<option value=""> Select Themic Area </option>');
            $.each(data, function(index, thematicAreaObj)
            {                     
              $('#themic_area_id').append('<option value="'+thematicAreaObj.id+'"> '+thematicAreaObj.themic_area_name+' </option>');
            });
          }); 

          //KEY RESULT AREA
          $('#key_result_area_id').empty();
          $.get('{{url('getMPMKeyResultByYear')}}?year=' +year, function(data)
          {  //success data
            $('#key_result_area_id').append('<option value=""> Select Key Result Area </option>');
            $.each(data, function(index, keyResultAreaaObj)
            {                     
              $('#key_result_area_id').append('<option value="'+keyResultAreaaObj.id+'"> '+keyResultAreaaObj.result_area_name+' </option>');
            });
          }); 

          //KPIs
          $('#mpm_kpis_').empty();
          $.get('{{url('getMPMKPIByYear')}}?year=' +year, function(data)
          {  //success data
            $('#mpm_kpis_').append('<option value=""> Select MPM KPIs </option>');
            $.each(data, function(index, kpiObj)
            {                     
              $('#mpm_kpis_').append('<option value="'+kpiObj.id+'"> '+kpiObj.kpi_name+' </option>');
              console.log(kpiObj);
            });
          }); 


        });
      });

</script>





<!-- SERACH FUNCTIONALITY -->
<script type="text/javascript">
    $(function()
    {
         $('#dynamicsearch').on('keyup', function()
         {           
              name = sessionStorage.getItem('name');

              q = $('#dynamicsearch').val().replace(' ','%20');
              
              if(name=='net_cash_flow')
               {
                  displayNetCashFlow(q);
               }

        })
    });
</script>



    @if(Session::has('info'))
        <script type="text/javascript">
            $(function() 
            {
                toastr.success('{{session('info')}}', {timeOut:50000});
            });
        </script>
    @elseif(Session::has('error'))
        <script type="text/javascript">
            $(function() 
            {
                toastr.error('{{session('error')}}', {timeOut:50000});
            });
        </script>
    @endif

@endsection