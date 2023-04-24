<!-- PROJECT MODAL -->
<!-- Add project modal -->
<div id="addproj" class="modal fade" role="dialog" style="height:90%; margin:2%;">
      <div class="modal-dialog modal-lg" style="">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add DWP Project</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>

          <div class="modal-body">
          <form id="dwpProForm" action="{{url('/project/addproject')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="date_dwp" id="date_dwp" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">


          <div class="form-group row">
            <label for="month_dwp" class="col-sm-2 col-form-label">Project Start Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Project Start Month" name="month" id="month_dwp">
            </div>

            <label for="year_dwp" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year Of Project" name="year" id="year_dwp">
            </div>
          </div>


          <div class="form-group row">
                <label for="alignment_id" class="col-sm-2 col-form-label"> Alignment </label>
                <div class="col-sm-10">
                    <select class="form-control" name="alignment_id" id="alignment_id" required>
                        <option value="">Select DWP Alignment</option>
                            @if($alignment)
                                @foreach($alignment as $alignment)
                                    <option value="{{$alignment->id}}"> {{$alignment->alignment_name}} </option>                                    
                                @endforeach
                            @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="program_priority_id" class="col-sm-2 col-form-label"> Program Priority </label>
                <div class="col-sm-10">
                    <select class="form-control" name="program_priority_id" id="program_priority_id" required>
                        <option value=""> Select DWP Program Priority </option>
                        @if($prog_priority)
                            @foreach($prog_priority as $prog_priority)
                                <option value="{{$prog_priority->id}}"> {{$prog_priority->program_priority_name}} </option>                                    
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="task_and_target" class="col-sm-2 col-form-label"> Task & Target </label>
                <div class="col-sm-10">
                    <select class="form-control" name="task_and_target" id="task_and_target" required>
                        <option value=""> Select Task and Target </option>
                        @if($task_target)
                            @foreach($task_target as $task_target)
                                <option value="{{$task_target->id}}"> {{$task_target->task_target_name}} </option>                                    
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="kpi_target_id" class="col-sm-2 col-form-label"> KPI & Target </label>
                <div class="col-sm-10">
                    <select class="form-control" name="kpi_target_id" id="kpi_target_id" required>
                        <option value=""> Select KPI and Target </option>
                        @if($kpi_target)
                            @foreach($kpi_target as $kpi_target)
                                <option value="{{$kpi_target->id}}"> {{$kpi_target->kpi_name}} </option>                                    
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="critical_milestone_id" class="col-sm-2 col-form-label"> Critical Milestone </label>
                <div class="col-sm-10">
                    <select class="form-control" name="critical_milestone_id" id="critical_milestone_id" required>
                        <option value="">Select DPR Critical Milestones</option>
                            @if($milestones)
                                @foreach($milestones as $milestones) 
                                    <option value="{{$milestones->id}}"> {{$milestones->critical_milestone_name}} </option>                                    
                                @endforeach
                            @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="timeline_id" class="col-sm-2 col-form-label"> Frequency of Report </label>
                <div class="col-sm-10">
                    <select class="form-control" name="timeline_id" id="timeline_id" required>
                        <option value=""> Select Report Frequency </option>
                            @if($timelines)
                                @foreach($timelines as $timelines)
                                    <option value="{{$timelines->id}}"> {{$timelines->timeline_name}} </option>                                    
                                @endforeach
                            @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="achievement_status_id" class="col-sm-2 col-form-label"> Achievement Status </label>
                <div class="col-sm-10">
                    <select class="form-control" name="achievement_status_id" id="achievement_status_id" required>
                        <option value=""> Select Achievement Status </option>
                            @if($achieve_status)
                                @foreach($achieve_status as $achieve_status)
                                    <option value="{{$achieve_status->id}}"> {{$achieve_status->achievement_status_name}} </option>
                                @endforeach
                            @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="restricting_factor" class="col-sm-2 col-form-label"> Restricting Factor </label>
                <div class="col-sm-10">
                    <select class="form-control" name="restricting_factor" id="restricting_factor" required>
                        <option value=""> Select Restricting Factor </option>
                            @if($restrict_factor)
                                @foreach($restrict_factor as $restrict_factor)
                                    <option value="{{$restrict_factor->id}}"> {{$restrict_factor->restricting_factor_name}} </option>
                                @endforeach
                            @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="division_id" class="col-sm-2 col-form-label"> Division </label>
                <div class="col-sm-10">
                    <select class="form-control" name="division_id" id="division_id" required>
                        <option value="">Select Division</option>
                            @if($division)
                                @foreach($division as $division) 
                                    <option value="{{$division->id}}"> {{$division->division_name}} </option>                                    
                                @endforeach
                            @endif
                    </select>
                </div>
          </div>

          @if(in_array(Auth::user()->role_obj->id,[8]))
            <div class="form-group row">
                <label for="critical_path_activity" class="col-sm-2 col-form-label">Critical Activity </label>
                <div class="col-sm-10">
                        <select class="form-control" name="critical_path_activity" id="critical_path_activity" required>
                        <option value="">Select If Critical Path Activity ?</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>
          @endif

            <div class="form-group row">
                <label for="cost_benefit_factor" class="col-sm-2 col-form-label">Benefit Factor </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Cost Benefit Factor" name="cost_benefit_factor" id="cost_benefit_factor">
                </div>
            </div>

          <div class="form-group row">
                <label for="key_recovery_plan_id" class="col-sm-2 col-form-label"> Recovery Plan </label>
                <div class="col-sm-10">
                    <select class="form-control" name="key_recovery_plan_id" id="key_recovery_plan_id" required>
                        <option value="">Select Key Recovery Plan</option>
                            @if($recovery_plan)
                                @foreach($recovery_plan as $recovery_plan) 
                                    <option value="{{$recovery_plan->id}}"> {{$recovery_plan->key_recovery_plan_name}} </option>
                                @endforeach
                            @endif
                    </select>
                </div>
          </div>
          @if(in_array(Auth::user()->role_obj->id,[8]))
          <div class="form-group row">
            <label for="monitor_by" class="col-sm-2 col-form-label">Monitor By</label>
            <div class="col-sm-10">
                <table width="100%">
                    <tr>
                        <td width="33%">
                            <label style="font-weight: lighter;">Assistant Director-S&PE</label>
                            <input type="radio" class="form-control" id="ad_spe" name="monitored_by" style="width: 1.6em; height: 1.5em; margin-top: 3px; border: 1px;" value="Assistant Director-S&PE"> 
                        </td>
                        <td width="33%">
                            <label style="font-weight: lighter;">Head Planning</label>
                            <input type="radio" class="form-control" id="hp" name="monitored_by" style="width: 1.6em; height: 1.5em; margin-top: 3px; border: 1px;" value="Head Planning"> 
                        </td>
                        <td width="33%">
                            <label style="font-weight: lighter;">Director</label>
                            <input type="radio" class="form-control" id="director" name="monitored_by" style="width: 1.6em; height: 1.5em; margin-top: 3px; border: 1px;" value="Director"> 
                        </td>
                    </tr>
                </table>
            </div>                
        </div>
        @endif

          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_dwp_btn" id="add_dwp_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Project</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>
