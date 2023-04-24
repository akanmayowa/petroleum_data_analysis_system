
<form id="" action="{{url('/project')}}" method="POST">
        {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$PLAN->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_key_recovery_plan">


        <div class="form-group row">
              <label for="key_recovery_plan_name" class="col-sm-2 col-form-label"> Recovery</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Key Recovery Plan" name="key_recovery_plan_name" id="key_recovery_plan_name" value="{{$PLAN->key_recovery_plan_name}}">
              </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Recovery Plan</button>
        </div>
</form>