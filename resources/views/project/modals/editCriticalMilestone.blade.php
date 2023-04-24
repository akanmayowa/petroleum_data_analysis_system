<form id="" action="{{url('/project')}}" method="POST">
          <?php   $one_unit = \App\division::where('id', $Matrix->id)->first();       $all_unit = \App\division::get();  ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$Matrix->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_critical_milestone">


          <div class="form-group row">
            <label for="year_mi" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_mi" value="{{$Matrix->year}}" required="">
            </div>
          </div>


          <div class="form-group row">
                <label for="division_id" class="col-sm-2 col-form-label"> Responsible Unit </label>
                <div class="col-sm-9">
                    <select class="form-control" name="division_id" id="division_id" required>
                        @if($one_unit) <option value="{{$one_unit->id}}"> {{$one_unit->division_name}} </option> @endif
                            @if($all_unit)
                                @foreach($all_unit as $all_unit)
                                    <option value="{{$all_unit->id}}"> {{$all_unit->division_name}} </option>                            
                                @endforeach
                            @endif
                    </select>
                </div>
                <div class="col-sm-1">
                    <a data-toggle="tooltip" onclick="showmodal('')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" 
                    class="btn btn-primary btn-sm pull-right" data-original-title="Create New Response Unit Here">  <i class="fa fa-plus"></i> </a>
                </div>
          </div>

          <div class="form-group row">
                <label for="dpr_work_plan" class="col-sm-2 col-form-label"> DPR PP Milestones </label>
                <div class="col-sm-10">
                   <input type="number" class="form-control" placeholder="DPR PP Milestones" name="dpr_pp_milestones" id="dpr_pp_milestones" value="{{$Matrix->dpr_pp_milestones}}"> 
                </div>
          </div>

          <div class="form-group row">
                <label for="priority_milestone" class="col-sm-2 col-form-label"> Priority Milestones </label>
                <div class="col-sm-10">
                   <input type="number" class="form-control" placeholder="Priority Milestones" name="priority_milestone" id="priority_milestone" value="{{$Matrix->priority_milestone}}"> 
                </div>
          </div>

          <div class="form-group row">
                <label for="critical_milestones_count" class="col-sm-2 col-form-label"> Milestone Count </label>
                <div class="col-sm-10">
                   <input type="number" class="form-control" placeholder=" Milestone Count" name="critical_milestones_count" id="critical_milestones_count" value="{{$Matrix->critical_milestones_count}}"> 
                </div>
          </div>


         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Milestone </button>
          </div>
</form>


<script type="text/javascript">

    //UPDATE WELL TOTAL
        function checktotal(field) 
        {  
            if (field.value == '') 
            {
                var fid = field.id;
                document.getElementById(fid).value = 0;
                //$('.amount').val(0);
            }         
        }


        $(function()
        { 

          $('#year_mi').datepicker(
          {
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
          });  

        })

</script>