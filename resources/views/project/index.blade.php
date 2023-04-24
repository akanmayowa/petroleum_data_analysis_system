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
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> DWP Project Data Upload </h4>                
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-pills" role="tablist">
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_dpr_work_plan') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_dpr_work_plan') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link ind_project" data-toggle="tab" href="#project" role="tab" onclick="displayProjects()" style="padding: 5px 35px">Project Work Plan</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link c_matrix" data-toggle="tab" href="#matrix" role="tab" onclick="displayCriticalMilestone()">Milestone Matrix</a>
                        </li> -->
                    @endif
                    
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_dwp_master_data') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_dwp_master_data') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#master_data" role="tab" style="padding: 5px 35px">DWP Master Data</a>
                        </li>
                    @endif
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active p-3" id="project" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="ind_project">

                                <form id="" action="{{url('/project/assign_report_to')}}" method="POST">
                                    {{ csrf_field() }} 
                                </form>

                            </div>
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="matrix" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="c_matrix">
                                
                            </div>
                        </p>
                    </div> 

                    <div class="tab-pane" id="master_data" role="tabpanel">
                        <p class="font-14 mb-0" style="padding: 3px 0px">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-justified" role="tablist">                                
                                 <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link ind_alignment" data-toggle="tab" href="#alignment" role="tab" onclick="displayAllignment()" style="padding: 3px 0px">Alignment</a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link program_priority" data-toggle="tab" href="#program_p" role="tab" onclick="displayProgramPriority()" style="padding: 3px 0px">P Priority</a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link task_target" data-toggle="tab" href="#task" role="tab" onclick="displayTaskTarget()" style="padding: 3px 0px">Task & Target</a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link kpi_targets" data-toggle="tab" href="#kpi" role="tab" onclick="displayKpiTarget()" style="padding: 3px 0px">KPI</a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link tt_crit_milestone" data-toggle="tab" href="#mile" role="tab" onclick="displayTTCMilestone()" style="padding: 3px 0px">Milestones</a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link timeline" data-toggle="tab" href="#time" role="tab" onclick="displayTimeline()" style="padding: 3px 0px">Frequency</a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link achieve_status" data-toggle="tab" href="#achieve" role="tab" onclick="displayAchievement()" style="padding: 3px 0px">Achievement</a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link restrict_factor" data-toggle="tab" href="#factor" role="tab" onclick="displayFactor()" style="padding: 3px 0px">Restricting Factor</a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link ind_division" data-toggle="tab" href="#division" role="tab" onclick="displayDivision()" style="padding: 3px 0px">Division</a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link recovery_plan" data-toggle="tab" href="#plan" role="tab" onclick="displayRecoveryPlan()" style="padding: 3px 0px">Recovery</a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link ind_status_cat" data-toggle="tab" href="#category" role="tab" onclick="displayStatus()" style="padding: 3px 0px">Status</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane p-3" id="alignment" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="ind_alignment">    

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="program_p" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="program_priority">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="task" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="task_target">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="kpi" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="kpi_targets">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="mile" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="tt_crit_milestone">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="time" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="timeline">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="achieve" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="achieve_status">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="factor" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="restrict_factor">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="division" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="ind_division">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="plan" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="recovery_plan">  

                                        </div> <!-- end row -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="category" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="row" id="ind_status_cat">  

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










@include('modals.addDWPProject')


<!-- Edit project modal -->
<div id="editproj" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit DWP Project</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_proj">  </div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Project modal -->
<div id="uplproj" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Project Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('project')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="uploadproject">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a  download="Sample DPR Work Plan Excel Template" class="btn btn-sm pull-right text-muted" id="dwpTemplate" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample DPR Work Plan Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View project modal -->
<div id="view_proj" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">View DWP Project</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewproj">  </div>
          </div>
    </div>
    </div>  
</div>





<!-- Add Critical Milestone Matri modal -->
<div id="add_crit_mile" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Critical Milestone Matrix</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>

          <div class="modal-body">
          <form id="mileForm" action="{{url('/project/')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="date_dwp" id="date_mile" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_critical_milestone">


          <div class="form-group row">
            <label for="year_mile" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_mile" required="">
            </div>
          </div>


          <div class="form-group row">
                <label for="division_id" class="col-sm-2 col-form-label"> Responsible Unit </label>
                <div class="col-sm-9">
                    <select class="form-control" name="division_id" id="division_id" required>
                        <option value="">Select Responsible Unit</option>
                            @if($divisions)
                                @foreach($divisions as $div)
                                    <option value="{{$div->id}}"> {{$div->division_name}} </option>                            
                                @endforeach
                            @endif
                    </select>
                </div>
                <div class="col-sm-1">
                    <a data-toggle="tooltip" onclick="showmodal('')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" 
                    class="btn btn-dark btn-sm pull-right" data-original-title="Create New Response Unit Here">  <i class="fa fa-plus"></i> </a>
                </div>
          </div>

          <div class="form-group row">
                <label for="dpr_work_plan" class="col-sm-2 col-form-label"> DPR PP Milestones </label>
                <div class="col-sm-10">
                   <input type="number" class="form-control" placeholder="DPR PP Milestones" name="dpr_pp_milestones" id="dpr_pp_milestones"> 
                </div>
          </div>

          <div class="form-group row">
                <label for="priority_milestone" class="col-sm-2 col-form-label"> Priority Milestones </label>
                <div class="col-sm-10">
                   <input type="number" class="form-control" placeholder="Priority Milestones" name="priority_milestone" id="priority_milestone"> 
                </div>
          </div>

          <div class="form-group row">
                <label for="critical_milestones_count" class="col-sm-2 col-form-label"> Milestone Count </label>
                <div class="col-sm-10">
                   <input type="number" class="form-control" placeholder=" Milestone Count" name="critical_milestones_count" id="critical_milestones_count"> 
                </div>
          </div>

          


          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_dwp_btn" id="add_dwp_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Milestone</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Critical Milestone Matri modal -->
<div id="edit_crit_mile" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Critical Milestone Matri</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editcrit_mile">  </div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Critical Milestone Matri modal -->
<div id="upload_crit_mile" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Critical Milestone Matri Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('project')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_critical_milestone">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/DWP/Sample DWP Critical Milestone Matrix.xlsx')}}" download="Sample DWP Critical Milestone Matrix Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample DWP Critical Milestone Matrix Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Critical Milestone Matri modal -->
<div id="view_crit_mile" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">View Critical Milestone Matri</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewcrit_mile">  </div>
          </div>
    </div>
    </div>  
</div>






  <!-- Add alignment modal -->
<div id="addalign" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add DWP Alignment</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="alignForm" action="{{url('/project/')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="date_ali" id="date_ali" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="addalignment">


          <div class="form-group row">
                <label for="alignment_name" class="col-sm-2 col-form-label"> Alignment </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Alignment Name" name="alignment_name" id="alignment_name">
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_align_btn" id="add_align_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Alignment</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit alignment modal -->
<div id="editalign" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add DWP Alignment</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_align"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload alignment modal -->
<div id="uplalign" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload alignment Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('project')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="uploadalignment">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/DWP/Sample DWP Alignment.xlsx')}}" download="Sample DWP Alignment Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample DWP Alignment Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>





  <!-- Add program_priority modal -->
<div id="add_programpriority" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Program Priority</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="ppForm" action="{{url('/project/')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="date_wp" id="date_wp" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_program_priority">


          <div class="form-group row">
                <label for="program_priority_name" class="col-sm-2 col-form-label"> Program Priority </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Work Program Priority" name="program_priority_name" id="program_priority_name" required="">
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_work_btn" id="add_work_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Program Priority</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit program_priority modal -->
<div id="edit_programpriority" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Program Priority</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editprogrampriority"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload program_priorityn modal -->
<div id="upl_programpriority" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Program Priority Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('project')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_program_priority">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/DWP/Sample DWP Program Priority.xlsx')}}" download="Sample DWP Program Priority Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample DWP Program Priority Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



  <!-- Add Task and Target modal -->
<div id="add_tasktarget" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Task and Target</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="taskForm" action="{{url('/project/')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="date_tt" id="date_tt" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_task_target">


          <div class="form-group row">
                <label for="task_target_name" class="col-sm-2 col-form-label"> Task and Target </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Task and Target" name="task_target_name" id="task_target_name" required="">
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_task_btn" id="add_task_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Task and Target</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Task and Target modal -->
<div id="edit_tasktarget" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Task and Target</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edittasktarget"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Task and Target modal -->
<div id="upl_tasktarget" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Task and Target Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('project')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_task_target">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/DWP/Sample DWP Task Target.xlsx')}}" download="Sample DWP Task Target Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample DWP Task Target Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



  <!-- Add KPI and Target modal -->
<div id="add_kpi" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add KPI and Target</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="kpiForm" action="{{url('/project/')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="date_as" id="date_kpi" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_kpi_target">


          <div class="form-group row">
                <label for="kpi_name" class="col-sm-2 col-form-label"> KPI Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="KPI Name" name="kpi_name" id="kpi_name" required="">
                </div>
          </div>

        <div class="form-group row">
              <label for="kpi_target" class="col-sm-2 col-form-label"> KPI Target </label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="KPI Target" name="kpi_target" id="kpi_target" value="" required="">
              </div>
        </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_kpi_btn" id="add_kpi_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add KPI Target</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit KPI and Target modal -->
<div id="edit_kpi" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add KPI and Target</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editkpi"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload KPI and Target modal -->
<div id="upl_kpi" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload KPI and Target Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('project')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_kpi_target">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/DWP/Sample DWP KPI Target.xlsx')}}" download="Sample DWP KPI Target Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample DWP KPI Target Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



  <!-- Add Task Critical Milestone modal -->
<div id="add_tt_crit_milestone" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Task Critical Milestone</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="c_mileForm" action="{{url('/project/')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="date_tt" id="date_ttcm" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_task_critical_milestone">


          <div class="form-group row">
                <label for="critical_milestone_name" class="col-sm-2 col-form-label"> Critical Milestone </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Task Critical Milestone" name="critical_milestone_name" id="critical_milestone_name" required="">
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_mile_btn" id="add_mile_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Critical Milestone</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Task Critical Milestone modal -->
<div id="edittt_crit_milestone" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Task Critical Milestone</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editttcrit_milestone"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Task Critical Milestone modal -->
<div id="upl_tt_crit_milestone" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Task Critical Milestone Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('project')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_task_critical_milestone">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/DWP/Sample DWP Task critical Milestone.xlsx')}}" download="Sample DWP Task critical Milestone Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample DWP Task critical Milestone Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



  <!-- Add Timeline modal -->
<div id="add_timeline" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Timeline</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="timeForm" action="{{url('/project/')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="date_tm" id="date_tm" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_task_timeline">


          <div class="form-group row">
                <label for="timeline_name" class="col-sm-2 col-form-label"> Timeline </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Task Timeline" name="timeline_name" id="timeline_name" required="">
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_time_btn" id="add_time_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Timeline</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Timelinee modal -->
<div id="edit_timeline" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Task Timeline</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edittimeline"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Task Timeline modal -->
<div id="upl_timeline" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Task Timeline Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('project')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_task_timeline">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/DWP/Sample DWP Task Timeline.xlsx')}}" download="Sample DWP Task Timeline Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample DWP Task Timeline Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



  <!-- Add Achievement Status modal -->
<div id="add_ach_status" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Achievement Status</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="achForm" action="{{url('/project/')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="date_as" id="date_as" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_achievement_status">


          <div class="form-group row">
                <label for="achievement_status_name" class="col-sm-2 col-form-label"> Achievement Status </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Achievement Status" name="achievement_status_name" id="achievement_status_name" required="">
                </div>
          </div>

        <div class="form-group row">
              <label for="statuses" class="col-sm-2 col-form-label"> Status </label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Status Valaue" name="status" id="statuses" value="" required="">
              </div>
        </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_stat_btn" id="add_stat_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Achievement Status</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Achievement Status modal -->
<div id="edit_ach_status" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Achievement Status</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editach_status"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Achievement Status modal -->
<div id="upl_ach_status" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Achievement Status Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('project')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_achievement_status">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/DWP/Sample DWP Achievement Status.xlsx')}}" download="Sample DWP Achievement Status Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample DWP Achievement Status Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



  <!-- Add Restricting Factor modal -->
<div id="add_rest_factor" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Restricting Factor</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="factForm" action="{{url('/project/')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="date_rf" id="date_rf" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_restricting_factor">


          <div class="form-group row">
                <label for="restricting_factor_name" class="col-sm-2 col-form-label"> Restricting Factor </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Restricting Factor" name="restricting_factor_name" id="restricting_factor_name" required="">
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_fact_btn" id="add_fact_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Restricting Factor</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Restricting Factor modal -->
<div id="edit_rest_factor" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Restricting Factor</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editrest_factor"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Restricting Factor modal -->
<div id="upl_rest_factor" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Restricting Factor Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('project')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_restricting_factor">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/DWP/Sample DWP Restricting Factor.xlsx')}}" download="Sample DWP Restricting Factor Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample DWP Restricting Factor Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



  <!-- Add division modal -->
<div id="adddiv" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add DWP Division</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="divForm" action="{{url('/project/')}}" method="POST">
            <input type="hidden" name="date_div" id="date_div" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            {{ csrf_field() }} 
            <input type="hidden" class="form-control" name="type" id="" value="adddivision">
            

          <div class="form-group row">
                <label for="division_name" class="col-sm-2 col-form-label"> Division </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Division Name" name="division_name" id="division_name">
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_division_btn" id="add_division_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Division</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit division modal -->
<div id="editdiv" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Division</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_div"></div>
          </div>
    </div>
    </div>  
  </div>


<!-- Upload division modal -->
<div id="upldiv" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload division Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('project')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="uploaddivision">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/DWP/Sample DWP Division.xlsx')}}" download="Sample DWP Division Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample DWP Division Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



  <!-- Add Key Recovery Plan modal -->
<div id="add_recovery_plan" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Key Recovery Plan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="planForm" action="{{url('/project/')}}" method="POST">
            <input type="hidden" name="date_pl" id="date_pl" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            {{ csrf_field() }} 
            <input type="hidden" class="form-control" name="type" id="" value="add_key_recovery_plan">
            

          <div class="form-group row">
                <label for="key_recovery_plan_name" class="col-sm-2 col-form-label"> Recovery </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Key Recovery Plan" name="key_recovery_plan_name" id="key_recovery_plan_name">
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_plan_btn" id="add_plan_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Recovery Plan</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Key Recovery Plan modal -->
<div id="edit_recovery_plan" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Key Recovery Plan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editrecovery_plan"></div>
          </div>
    </div>
    </div>  
  </div>


<!-- Upload Key Recovery Plan modal -->
<div id="upl_recovery_plan" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Key Recovery Plan Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('project')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_key_recovery_plan">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{asset('/assets/excel/Templates/DWP/Sample DWP key Recovery Plan.xlsx')}}" download="Sample DWP key Recovery Plan Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample DWP key Recovery Plan Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>





<!-- Add status modal -->
<div id="addstatus" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Status</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="staCatForm" action="{{url('/project/')}}" method="POST">
            {{ csrf_field() }} 
            <input type="hidden" name="_date" id="_date" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="addstatus">

          <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label"> Status </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Status Category Name" name="status" id="_status" 
                    required>
                </div>
          </div>

          <div class="form-group row">
                <label for="score" class="col-sm-2 col-form-label"> Score </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="Score Name" name="score" id="score" required>
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_status_btn" id="add_status_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Status</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit project modal -->
<div id="editstatus" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Status</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_status"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload status modal -->
<div id="uplstatus" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload status Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('project')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="uploadstatus">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />
                    <input type="button" value="Download Excel Template" class="btn btn-default pull-right" />
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
    });


    function showmodal(modalid,url=0)
    {
      
        if(url!=0){
        $('#dwpTemplate').attr('href',url);
        }

        $('#'+modalid).modal('show');

    }

</script>





<script>   // JAVASCRIPT AJAX FUNCTION

function appendTable(data, tableId)
{

    if(tableId == 'project_table')
    {   
        $('#'+tableId).prepend('<tr>  <td>'+data.id+' </td>  <td>'+data.month+' </td> <td>'+data.program_priority+' </td>  <td>'+data.division+' </td>  <td>'+data.critical_milestone+' </td>  <td> '+data.achievement_status+' </td>  <td> '+data.timeline+' </td>  <td> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_dwp_projects('+data.id+')" class="btn-sm pull-right" title="View Project"> <i class="fa fa-eye"></i>    </a> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_dwp_projects('+data.id+')" class="btn-sm pull-right" title="Edit DWP Project"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>'); 
    }

    else if(tableId == 'matrix_table')
    {   
        var date_ = document.getElementById('date_mile').value; 
        $('#'+tableId).prepend('<tr>   <td>'+data.id+' </td>  <td>'+data.year+' </td>  <td>'+data.responsible_unit_id+' </td>  <td>'+data.dpr_pp_milestones+' </td>  <td>'+data.priority_milestone+' </td>  <td>'+data.critical_milestones_count+' </td>  <td>'+date_+' </td>   <td>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_critical_milestone('+data.id+')" class="btn-sm pull-right" title="View Critical Milestone Matrix"> <i class="fa fa-eye"></i>   </a>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="edit_critical_milestone('+data.id+')" class="btn-sm pull-right" title="Edit Critical Milestone Matrix"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>'); 
    }

    else if(tableId == 'alignment_table')
    { 
        var date_ = document.getElementById('date_ali').value;  
        $('#'+tableId).prepend('<tr>   <td>'+data.id+' </td>  <td>'+data.alignment+' </td>  <td>'+date_+' </td>  <td>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_dwp_alignment('+data.id+')" class="btn-sm pull-right" title="Edit DWP Alignment"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>'); 
    }

    else if(tableId == 'pp_table')
    { 
        var date_ = document.getElementById('date_wp').value;  
        $('#'+tableId).prepend('<tr>   <td>'+data.id+' </td>  <td>'+data.program_priority_name+' </td>  <td>'+date_+' </td>  <td>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_program_priority('+data.id+')" class="btn-sm pull-right" title="Edit Program Priority"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>'); 
    }

    else if(tableId == 'task_table')
    { 
        var date_ = document.getElementById('date_tt').value;  
        $('#'+tableId).prepend('<tr>   <td>'+data.id+' </td>  <td>'+data.task_target_name+' </td>  <td>'+date_+' </td>  <td>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_task_target('+data.id+')" class="btn-sm pull-right" title="Edit Task and Target"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>'); 
    }

    else if(tableId == 'kpi_table')
    { 
        var date_ = document.getElementById('date_kpi').value;  
        $('#'+tableId).prepend('<tr>   <td>'+data.id+' </td>  <td>'+data.kpi_name+' </td>  <td>'+data.kpi_target+' </td>  <td>'+date_+' </td>  <td>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_kpi_target('+data.id+')" class="btn-sm pull-right" title="Edit KPI and Target"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>'); 
    }

    else if(tableId == 'mile_table')
    { 
        var date_ = document.getElementById('date_ttcm').value;  
        $('#'+tableId).prepend('<tr>   <td>'+data.id+' </td>  <td>'+data.critical_milestone_name+' </td>  <td>'+date_+' </td>  <td>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_tt_critical_milestone('+data.id+')" class="btn-sm pull-right" title="Edit Task Critical Milestone"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>'); 
    }

    else if(tableId == 'time_table')
    { 
        var date_ = document.getElementById('date_tm').value;  
        $('#'+tableId).prepend('<tr>   <td>'+data.id+' </td>  <td>'+data.timeline_name+' </td>  <td>'+date_+' </td>  <td>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_timeline('+data.id+')" class="btn-sm pull-right" title="Edit Task Timeline"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>'); 
    }

    else if(tableId == 'ach_table')
    { 
        var date_ = document.getElementById('date_as').value;  
        $('#'+tableId).prepend('<tr>   <td>'+data.id+' </td>  <td>'+data.achievement_status+' </td>  <td>'+data.status+' </td>  <td>'+date_+' </td>  <td>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_achievement_status('+data.id+')" class="btn-sm pull-right" title="Edit Achievement Status"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>'); 
    }

    else if(tableId == 'fact_table')
    { 
        var date_ = document.getElementById('date_rf').value;  
        $('#'+tableId).prepend('<tr>   <td>'+data.id+' </td>  <td>'+data.restricting_factor+' </td>  <td>'+date_+' </td>  <td>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_restricting_factor('+data.id+')" class="btn-sm pull-right" title="Edit Restricting Factor"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>'); 
    }

    else if(tableId == 'division_table')
    { 
        var date_ = document.getElementById('date_div').value;  
        $('#'+tableId).prepend('<tr>   <td>'+data.id+' </td>  <td>'+data.division+' </td>  <td>'+date_+' </td>  <td>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_dwp_division('+data.id+')" class="btn-sm pull-right" title="Edit DWP Division"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>'); 
    }

    else if(tableId == 'plan_table')
    { 
        var date_ = document.getElementById('date_pl').value;  
        $('#'+tableId).prepend('<tr>   <td>'+data.id+' </td>  <td>'+data.key_recovery_plan+' </td>  <td>'+date_+' </td>  <td>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_key_recovery_plan('+data.id+')" class="btn-sm pull-right" title="Edit Key Recovery Plan"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>'); 
    }

    else if(tableId == 'status_table')
    { 
        var date_ = document.getElementById('_date').value;  
        $('#'+tableId).prepend('<tr>   <td>'+data.id+' </td>  <td>'+data.status+' </td>  <td>'+data.score+' </td>  <td>'+date_+' </td>  <td>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_dwp_statue_category('+data.id+')" class="btn-sm pull-right" title="Edit DWP Status"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>'); 
    }
}

//function to process form data
function processForm(formid, route, tableId, progress, modalid)
{

   formdata= new FormData($('#'+formid)[0]);
   formdata.append('_token', '{{csrf_token()}}');
  
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
                toastr.success(data.info, {timeOut:10000});
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
        //DWP Project
        $("#dwpProForm").on('submit', function(e)
        { 
            e.preventDefault(e);
            processForm('dwpProForm', "{{url('/project')}}", 'project_table', 'progressDWPPROJ', 'addproj');
        });

        //DWP Critical Milestone Matrix
        $("#mileForm").on('submit', function(e)
        { 
            e.preventDefault(e);
            processForm('mileForm', "{{url('/project')}}", 'matrix_table', 'progressMile', 'add_crit_mile');
        });

        //DWP Alignment
        $("#alignForms").on('submit', function(e)
        { 
            e.preventDefault(e);
            processForm('alignForms', "{{url('/project')}}", 'alignment_table', 'progressAlign', 'addalign');
        });

        //DWP Work Plan
        $("#ppForm").on('submit', function(e)
        { 
            e.preventDefault(e);
            processForm('ppForm', "{{url('/project')}}", 'pp_table', 'progressPP', 'add_programpriority');
        });

        //DWP Task
        $("#taskForm").on('submit', function(e)
        { 
            e.preventDefault(e);
            processForm('taskForm', "{{url('/project')}}", 'task_table', 'progressTT', 'add_tasktarget');
        });

        //DWP KPI
        $("#kpiForm").on('submit', function(e)
        { 
            e.preventDefault(e);
            processForm('kpiForm', "{{url('/project')}}", 'kpi_table', 'progressKPI', 'add_kpi');
        });

        //DWP Milestone
        $("#c_mileForm").on('submit', function(e)
        { 
            e.preventDefault(e);
            processForm('c_mileForm', "{{url('/project')}}", 'mile_table', 'progressTTCM', 'add_tt_crit_milestone');
        });

        //DWP timeline
        $("#timeForm").on('submit', function(e)
        { 
            e.preventDefault(e);
            processForm('timeForm', "{{url('/project')}}", 'time_table', 'progressTime', 'add_timeline');
        });

        //DWP status
        $("#achForm").on('submit', function(e)
        { 
            e.preventDefault(e);
            processForm('achForm', "{{url('/project')}}", 'ach_table', 'progressAch', 'add_ach_status');
        });

        //DWP factor
        $("#factForm").on('submit', function(e)
        { 
            e.preventDefault(e);
            processForm('factForm', "{{url('/project')}}", 'fact_table', 'progressFact', 'add_rest_factor');
        });

        //DWP Division
        $("#divForms").on('submit', function(e)
        { 
            e.preventDefault(e);
            processForm('divForms', "{{url('/project')}}", 'division_table', 'progressDIV', 'adddiv');
        });

        //DWP Recovery
        $("#planForm").on('submit', function(e)
        { 
            e.preventDefault(e);
            processForm('planForm', "{{url('/project')}}", 'plan_table', 'progressPlan', 'add_recovery_plan');
        });

        //DWP Zones
        $("#staCatForms").on('submit', function(e)
        { 
            e.preventDefault(e);
            processForm('staCatForms', "{{url('/project')}}", 'status_table', 'progressStaCat', 'addstatus');
        });



    });
</script>


<script>   // JAVASCRIPT FUNCTION TO ADD NEW STATUS CATEGORY
    $(function()
    {     
        //STATUS
        $("#add_status_btn").click(function()
        { 
              var status = $("#_status").val();
              var score = $("#score").val();
              var token = $("#token").val();

              $.ajax(
                  {                  
                      type: "post",
                      data: "status=" + status + "&score=" + score + "&_token=" + token,
                      url: "{{url('/project/addstatus')}}",
                      success:function(data)
                      {  
                          alert('Saved');

                          var tot = document.getElementById('_tot').value;
                          var _date = document.getElementById('_date').value;    

                          $('#status_table').prepend('<tr>  <td> '+tot+' </td>  <td> '+status+' </td> <td> '+score+' </td>  <td> '+_date+' </td>     </tr>');
                          $('#general_status_id').append('<option value="'+tot+'"> '+status+' </option>');
                      }    
                  }
              )
              $('#addstatus').modal('hide');
            return false;
          
        });
    });
</script>



<script type="text/javascript">

    $(function()
    {
        //$(":submit").attr("disabled", true);
        //$(":submit").css('background-color','#ccc');

        $(".select_status").change(function()
        {            
            var st = $("#update_status"+this.id).val(); 
            var r = confirm("Are You Sure You Want To Update This Project?\nYes or No.");
            if (r == true) 
            {
                
                //alert("Yes! " + this.value);      
                $('#pp').val(this.value); 
                var str = this.id;
                var _id = str.replace("update_status", "");
                $('#idd').val(_id);  
                $('#id'+_id).attr("disabled", false);  
                $('#id'+_id).css('background-color','#396');   

            } 
            else {     $(this).attr('selected', false);    }

        });
    });




    $(function()
    {

 $('#dynamicsearch').on('keyup',function()
 {
   
      name=sessionStorage.getItem('name');

      q=$('#dynamicsearch').val().replace(' ','%20');
      
                  if(name=='ind_project'){
                    displayProjects(q);
                }
               else if(name=='ind_alignment'){
                    displayAllignment(q);
                }
               else if(name=='program_priority'){
                  displayProgramPriority(q);
              }
            else  if(name=='task_target'){
                displayTaskTarget(q);
            }
          else  if(name=='kpi_targets'){
                displayKpiTarget(q);
            }
          else  if(name=='tt_crit_milestone'){
                displayTTCMilestone(q);
            }
          else  if(name=='timeline'){
                displayTimeline(q);
            }
          else  if(name=='achieve_status'){
                displayAchievement(q);
            }
         else   if(name=='restrict_factor'){
                displayFactor(q);
            }
          else  if(name=='ind_division'){
                displayDivision(q);
            }
          else  if(name=='recovery_plan'){
                displayRecoveryPlan(q);
            }

          else  if(name=='ind_status_cat')
          {
            displayStatus(q);
        }

   })

        $('#year_dwp').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        });

        $('#month_dwp').datepicker(
        {
            format: "MM",
            viewMode: "months", 
            minViewMode: "months"
        });

        $('#year_mile').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        });



        $('#selectall').on('change', function()
        {
             if(this.checked) // if changed state is "CHECKED"
            {
                $('.checkbox1').each(function() 
                {
                    this.checked = true;
                });
            }
             else// if changed state is "UN CHECKED"
            {
                $('.checkbox1').each(function() 
                {
                    this.checked = false;
                });
            }
        });

    });


</script>





<script type="text/javascript"> //FUNCTIONS TO LOAD EDIT MODALS
    function load_dwp_projects(id)
    {
        $('#edit_proj').load("{{url('project')}}/modals_editDWPProject?id="+id);
        $('#editproj').modal('show');
    }
    function view_dwp_projects(id)
    {   
        $('#viewproj').load("{{url('project')}}/view_viewDWPProject?id="+id);
        $('#view_proj').modal('show');
    }

    function edit_critical_mile(id)
    {   
        $('#editcrit_mile').load("{{url('project')}}/modals_editCriticalMilestone?id="+id);
        $('#edit_crit_mile').modal('show');
    }
    function view_critical_mile(id)
    {   
        $('#viewcrit_mile').load("{{url('project')}}/view_viewCriticalMilestone?id="+id);
        $('#view_crit_mile').modal('show');
    }

    function load_dwp_alignment(id)
    {   
        $('#edit_align').load("{{url('project')}}/modals_editAlignment?id="+id);
        $('#editalign').modal('show');
    }

    function load_program_priority(id)
    {   
        $('#editprogrampriority').load("{{url('project')}}/modals_editProgramPriority?id="+id);
        $('#edit_programpriority').modal('show');
    }

    function load_task_target(id)
    {   
        $('#edittasktarget').load("{{url('project')}}/modals_editTaskTarget?id="+id);
        $('#edit_tasktarget').modal('show');
    }

    function load_kpi_target(id)
    {   
        $('#editkpi').load("{{url('project')}}/modals_editKpiTarget?id="+id);
        $('#edit_kpi').modal('show');
    }

    function load_tt_crit_milestone(id)
    {   
        $('#editttcrit_milestone').load("{{url('project')}}/modals_editTaskCriticalMilestone?id="+id);
        $('#edittt_crit_milestone').modal('show');
    }

    function load_timeline(id)
    {   
        $('#edittimeline').load("{{url('project')}}/modals_editTimeline?id="+id);
        $('#edit_timeline').modal('show');
    }

    function load_achievement_status(id)
    {   
        $('#editach_status').load("{{url('project')}}/modals_editAchievementStatus?id="+id);
        $('#edit_ach_status').modal('show');
    }

    function load_restricting_factor(id)
    {   
        $('#editrest_factor').load("{{url('project')}}/modals_editRestrictingFactor?id="+id);
        $('#edit_rest_factor').modal('show');
    }

    function load_dwp_division(id)
    {   
        $('#edit_div').load("{{url('project')}}/modals_editDivision?id="+id);
        $('#editdiv').modal('show');
    }

    function load_key_recovery_plan(id)
    {   
        $('#editrecovery_plan').load("{{url('project')}}/modals_editKeyRecoveryPlan?id="+id);
        $('#edit_recovery_plan').modal('show');
    }

    function load_dwp_statue_category(id)
    {   
        $('#edit_status').load("{{url('project')}}/modals_editStatusCategory?id="+id);
        $('#editstatus').modal('show');
    }

</script>


<script type="text/javascript">
    $(function()
    { 
        $('[data-toggle="tooltip"]').tooltip();         

        //setting all values to default 0
        function checkValue(field) 
        {  
            if (field.value == '') 
            {
                var fid = field.id;
                document.getElementById(fid).value = 0;
                //$('.amount').val(0);
            }
        }

    });

</script> 





<!-- AJAX TO POPULATE TABLES AND PAGINATION -->
<script type="text/javascript">
    function displayProjects($search=0)
    {  
            sessionStorage.setItem('url','{{url('ajax')}}/ind_project?q='+$search+'&excel=excel');

        $('#ind_project').load('{{url('ajax')}}/ind_project?q='+$search);
        sessionStorage.setItem('name','ind_project'); 
    }

    function displayCriticalMilestone($search=0)
    {
        $('#c_matrix').load('{{url('ajax')}}/c_matrix?q='+$search);
        sessionStorage.setItem('name','c_matrix'); 
    }

    function displayAllignment($search=0)
    {
        $('#ind_alignment').load('{{url('ajax')}}/ind_alignment?q='+$search);
        sessionStorage.setItem('name','ind_alignment'); 
    }

    function displayProgramPriority($search=0)
    {
        $('#program_priority').load('{{url('ajax')}}/program_priority?q='+$search);
        sessionStorage.setItem('name','program_priority'); 
    }

    function displayTaskTarget($search=0)
    {
        $('#task_target').load('{{url('ajax')}}/task_target?q='+$search);
        sessionStorage.setItem('name','task_target'); 
    }

    function displayKpiTarget($search=0)
    {
        $('#kpi_targets').load('{{url('ajax')}}/kpi_targets?q='+$search);
        sessionStorage.setItem('name','kpi_targets'); 
    }

    function displayTTCMilestone($search=0)
    {
        $('#tt_crit_milestone').load('{{url('ajax')}}/tt_crit_milestone?q='+$search);
        sessionStorage.setItem('name','tt_crit_milestone'); 
    }

    function displayTimeline($search=0)
    {
        $('#timeline').load('{{url('ajax')}}/timeline?q='+$search);
        sessionStorage.setItem('name','timeline'); 
    }

    function displayAchievement($search=0)
    {
        $('#achieve_status').load('{{url('ajax')}}/achieve_status?q='+$search);
        sessionStorage.setItem('name','achieve_status'); 
    }

    function displayFactor($search=0)
    {
        $('#restrict_factor').load('{{url('ajax')}}/restrict_factor?q='+$search);
        sessionStorage.setItem('name','restrict_factor'); 
    }

    function displayDivision($search=0)
    {
        $('#ind_division').load('{{url('ajax')}}/ind_division?q='+$search);
        sessionStorage.setItem('name','ind_division'); 
    }

    function displayRecoveryPlan($search=0)
    {
        $('#recovery_plan').load('{{url('ajax')}}/recovery_plan?q='+$search);
        sessionStorage.setItem('name','recovery_plan'); 
    }

    function displayStatus($search=0)
    {
        $('#ind_status_cat').load('{{url('ajax')}}/ind_status_cat?q='+$search);
        sessionStorage.setItem('name','ind_status_cat'); 
    }

   
    
   
      


    function resolveLoad()
    {

        switch (sessionStorage.getItem('name')) 
        {
           case 'ind_project':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'c_matrix':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;  

            case 'ind_alignment':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;  

            case 'program_priority':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;  

            case 'task_target':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break; 

            case 'kpi_targets':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'tt_crit_milestone':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break; 

            case 'timeline':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break; 

            case 'achieve_status':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break; 

            case 'restrict_factor':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break; 

            case 'ind_division':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break; 

            case 'recovery_plan':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;   

            case 'ind_status_cat':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;              


            default:
                  $('.ind_project').trigger('click');
                  break; 
        }
       
    }
    //

    $(function()
    {     
        resolveLoad();                
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

