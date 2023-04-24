<form id="" action="{{url('/project')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$TASK_TARGET->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_task_target">


          <div class="form-group row">
                <label for="task_target_name" class="col-sm-2 col-form-label"> Task Target </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Task Target Name" name="task_target_name" id="task_target_name" value="{{$TASK_TARGET->task_target_name}}" required="">
                </div>
          </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Task Target </button>
          </div>
</form>