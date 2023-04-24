<form id="" action="{{url('/project')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$Project->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="addproject">

            <?php 
                $alignment = \App\alignment::get();          $alignment_ = \App\alignment::where('id', $Project->alignment_id)->first();
                $all_pp = \App\dwp_program_priority::get();       $one_pp = \App\dwp_program_priority::where('id', $Project->dpr_work_plan)->first();
                $all_tt = \App\dwp_task_target::get();       $one_tt = \App\dwp_task_target::where('id', $Project->task_and_target)->first();
                $division = \App\division::get();           $division_ = \App\division::where('id', $Project->division_id)->first();
                $all_cms = \App\dwp_critical_milestone::get();       $one_cms = \App\dwp_critical_milestone::where('id', $Project->critical_milestone_id)->first();
                $all_tim = \App\dwp_timeline::get();       $one_tim = \App\dwp_timeline::where('id', $Project->timeline_id)->first();
                $all_ach = \App\dwp_achievement_status::get();       $one_ach = \App\dwp_achievement_status::where('id', $Project->achievement_status_id)->first();
                $all_fac = \App\dwp_restricting_factor::get();       $one_fac = \App\dwp_restricting_factor::where('id', $Project->restricting_factor_id)->first();
                $all_kpi = \App\dwp_kpi_target::get();       $one_kpi = \App\dwp_kpi_target::where('id', $Project->kpi_target_id)->first();
                $all_pla = \App\dwp_key_recovery_plan::get();       $one_pla = \App\dwp_key_recovery_plan::where('id', $Project->key_recovery_plan_id)->first();
            ?>


          <div class="form-group row">
            <label for="month_dwpe" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month Of Project" name="month" id="month_dwpe" value="{{$Project->month}}" required>
            </div>

            <label for="year_dwpe" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year Of Project" name="year" id="year_dwpe" value="{{$Project->year}}" required>
            </div>
          </div>

          <div class="form-group row">
                <label for="alignment_id" class="col-sm-2 col-form-label"> Alignment </label>
                <div class="col-sm-10">
                    <select class="form-control" name="alignment_id" id="alignment_id" required>
                        @if($alignment_) <option value="{{$alignment_->id}}"> {{$alignment_->alignment_name}} </option>  @endif
                            @if($alignment)
                                @foreach($alignment as $alignment)
                                    <option value="{{$alignment->id}}"> {{$alignment->alignment_name}} </option>                                    
                                @endforeach
                            @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="dpr_work_plan" class="col-sm-2 col-form-label"> Program Priority </label>
                <div class="col-sm-10">
                    <select class="form-control" name="dpr_work_plan" id="dpr_work_plan" required>
                        @if($one_pp) <option value="{{$one_pp->id}}"> {{$one_pp->program_priority_name}} </option> @endif
                        @if($all_pp)
                            @foreach($all_pp as $all_pp)
                                <option value="{{$all_pp->id}}"> {{$all_pp->program_priority_name}} </option>                                    
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="task_and_target" class="col-sm-2 col-form-label"> Task & Target </label>
                <div class="col-sm-10">
                    <select class="form-control" name="task_and_target" id="task_and_target" required>
                        @if($one_tt) <option value="{{$one_tt->id}}"> {{$one_tt->task_target_name}} </option> @else <option value=""> Select Task and Target </option> @endif
                        @if($all_tt)
                            @foreach($all_tt as $all_tt)
                                <option value="{{$all_tt->id}}"> {{$all_tt->task_target_name}} </option>                                    
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="kpi_target_id" class="col-sm-2 col-form-label"> KPI & Target </label>
                <div class="col-sm-10">
                    <select class="form-control" name="kpi_target_id" id="kpi_target_id" required>
                        @if($one_kpi) <option value="{{$one_kpi->id}}"> {{$one_kpi->kpi_name}} </option> @endif
                        @if($all_kpi)
                            @foreach($all_kpi as $all_kpi)
                                <option value="{{$all_kpi->id}}"> {{$all_kpi->kpi_name}} </option>                                    
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="critical_milestone_id" class="col-sm-2 col-form-label"> Critical Milestone </label>
                <div class="col-sm-10">
                    <select class="form-control" name="critical_milestone_id" id="critical_milestone_id" required>
                        @if($one_cms) <option value="{{$one_cms->id}}"> {{$one_cms->critical_milestone_name}} </option>  @endif
                            @if($all_cms)
                                @foreach($all_cms as $all_cms) 
                                    <option value="{{$all_cms->id}}"> {{$all_cms->critical_milestone_name}} </option>                                    
                                @endforeach
                            @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="timeline_id" class="col-sm-2 col-form-label"> Timeline </label>
                <div class="col-sm-10">
                    <select class="form-control" name="timeline_id" id="timeline_id" required>
                        @if($one_tim) <option value="{{$one_tim->id}}"> {{$one_tim->timeline_name}} </option>  @endif
                            @if($all_tim)
                                @foreach($all_tim as $all_tim)
                                    <option value="{{$all_tim->id}}"> {{$all_tim->timeline_name}} </option>                                    
                                @endforeach
                            @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="achievement_status_id" class="col-sm-2 col-form-label"> Achievement Status </label>
                <div class="col-sm-10">
                    <select class="form-control" name="achievement_status_id" id="achievement_status_id" required>
                        @if($one_ach) <option value="{{$one_ach->id}}"> {{$one_ach->achievement_status_name}} </option>  @endif
                            @if($all_ach)
                                @foreach($all_ach as $all_ach)
                                    <option value="{{$all_ach->id}}"> {{$all_ach->achievement_status_name}} </option>
                                @endforeach
                            @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="division_id" class="col-sm-2 col-form-label"> Division </label>
                <div class="col-sm-10">
                    <select class="form-control" name="division_id" id="division_id" required>
                        @if($division_) <option value="{{$division_->id}}"> {{$division_->division_name}} </option>  @endif
                            @if($division)
                                @foreach($division as $division)
                                    <option value="{{$division->id}}"> {{$division->division_name}} </option>                                    
                                @endforeach
                            @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="program_priority_id" class="col-sm-2 col-form-label"> Priority </label>
                <div class="col-sm-10">
                    <select class="form-control" name="program_priority_id" id="program_priority_id" required>
                        <option value="{{$Project->program_priority_id}}"> 
                            @if($Project->program_priority_id == 1) Very Important  
                            @elseif($Project->program_priority_id == 2) Important
                            @elseif($Project->program_priority_id == 3) Tentative
                            @elseif($Project->program_priority_id == 4) Low Priority
                            @endif
                         </option>
                        <option value="1"> Very Important </option>
                        <option value="2"> Important </option>
                        <option value="3"> Tentative </option>
                        <option value="4"> Low Priority </option>
                    </select>
                </div>
          </div>

            <div class="form-group row">
                <label for="critical_path_activity" class="col-sm-2 col-form-label"> Critical Path Activity </label>
                <div class="col-sm-10">
                    <select class="form-control" name="critical_path_activity" id="critical_path_activity" required>
                        @if($Project) <option value="{{$Project->critical_path_activity}}"> {{$Project->critical_path_activity}} </option>  @endif
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="restricting_factor" class="col-sm-2 col-form-label"> Restricting Factor </label>
                <div class="col-sm-10">
                    <select class="form-control" name="restricting_factor_id" id="restricting_factor_id" required>
                        @if($one_fac) <option value="{{$one_fac->id}}"> {{$one_fac->restricting_factor_name}} </option> @endif
                            @if($all_fac)
                                @foreach($all_fac as $all_fac)
                                    <option value="{{$all_fac->id}}"> {{$all_fac->restricting_factor_name}} </option>
                                @endforeach
                            @endif
                    </select>

                </div>
            </div>

            <div class="form-group row">
                <label for="cost_benefit_factor" class="col-sm-2 col-form-label">Benefit Factor </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Cost Benefit Factor" name="cost_benefit_factor" id="cost_benefit_factor" value="{{$Project->cost_benefit_factor}}">
                </div>
            </div>

          <div class="form-group row">
                <label for="key_recovery_plan_id" class="col-sm-2 col-form-label"> Recovery Plan </label>
                <div class="col-sm-10">
                    <select class="form-control" name="key_recovery_plan_id" id="key_recovery_plan_id" required>
                        @if($one_pla) <option value="{{$one_pla->id}}"> {{$one_pla->key_recovery_plan_name}} </option> @endif
                            @if($all_pla)
                                @foreach($all_pla as $all_pla) 
                                    <option value="{{$all_pla->id}}"> {{$all_pla->key_recovery_plan_name}} </option>
                                @endforeach
                            @endif
                    </select>
                </div>
          </div>

        @if(Auth::user()->role_obj->permission->contains('constant', 'approve_dwp'))
            <div class="form-group row">
                <label for="monitor_by" class="col-sm-2 col-form-label">Monitored By</label>
                <div class="col-sm-10">
                    <table width="100%">
                        <tr>
                            <td width="33%">
                                <label style="font-weight: lighter;">Assistant Director-S&PE</label>
                                <input type="radio" class="form-control" id="ad_spe" name="monitored_by" 
                                    @if($Project->monitored_by == 'Assistant Director-S&PE') checked @endif 
                                    style="width: 1.6em; height: 1.5em; margin-top: 3px; border: 1px;" value="Assistant Director-S&PE"> 
                            </td>
                            <td width="33%">
                                <label style="font-weight: lighter;">Head Planning</label>
                                <input type="radio" class="form-control" id="hp" name="monitored_by" 
                                    @if($Project->monitored_by == 'Head Planning') checked @endif 
                                    style="width: 1.6em; height: 1.5em; margin-top: 3px; border: 1px;" value="Head Planning">
                            </td>
                            <td width="33%">
                                <label style="font-weight: lighter;">Director</label>
                                <input type="radio" class="form-control" id="director" name="monitored_by" 
                                    @if($Project->monitored_by == 'Director') checked @endif 
                                    style="width: 1.6em; height: 1.5em; margin-top: 3px; border: 1px;" value="Director">
                            </td>
                        </tr>
                    </table>
                </div>                
            </div>
        @endif

          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Project</button>
          </div>
</form>


<script type="text/javascript">

    $(document).ready(function()
    {
        $('#year_dwpe').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        })

        $('#month_dwpe').datepicker(
        {
            format: "MM",
            viewMode: "months", 
            minViewMode: "months"
        });
    });

</script>