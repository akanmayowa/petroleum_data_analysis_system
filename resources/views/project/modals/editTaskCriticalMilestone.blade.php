<form id="" action="{{url('/project')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$MILESTONE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_task_critical_milestone">


          <div class="form-group row">
                <label for="critical_milestone_name" class="col-sm-2 col-form-label"> Critical Milestone </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Task Target Name" name="critical_milestone_name" id="critical_milestone_name" value="{{$MILESTONE->critical_milestone_name}}" required="">
                </div>
          </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Critical Milestone </button>
          </div>
</form>