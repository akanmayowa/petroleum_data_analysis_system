<form id="" action="{{url('/project')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$TIMELINE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_task_timeline">


          <div class="form-group row">
                <label for="timeline_name" class="col-sm-2 col-form-label"> Timeline </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Task Timeline Name" name="timeline_name" id="timeline_name" value="{{$TIMELINE->timeline_name}}" required="">
                </div>
          </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Timeline </button>
          </div>
</form>