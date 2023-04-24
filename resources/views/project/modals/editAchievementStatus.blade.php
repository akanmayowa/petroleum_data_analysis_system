<form id="" action="{{url('/project')}}" method="POST">
        {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$ACH_STATUS->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_achievement_status">


        <div class="form-group row">
              <label for="achievement_status_name" class="col-sm-2 col-form-label"> Achievement Status </label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Achievement Status Name" name="achievement_status_name" id="achievement_status_name" value="{{$ACH_STATUS->achievement_status_name}}">
              </div>
        </div>

        <div class="form-group row">
              <label for="statuses" class="col-sm-2 col-form-label"> Status </label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Status Valaue" name="status" id="statuses" value="{{$ACH_STATUS->status}}">
              </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Achievement Status</button>
        </div>
</form>