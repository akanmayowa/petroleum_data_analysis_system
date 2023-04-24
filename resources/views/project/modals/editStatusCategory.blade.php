<form id="" action="{{url('/project')}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id" id="id" value="{{$Status_category->id}}">
            <input type="hidden" class="form-control" name="type" id="" value="addstatus">

      <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Status Category Name" name="status" id="_status" value="{{$Status_category->status}}" 
                required>
            </div>
      </div>

      <div class="form-group row">
            <label for="score" class="col-sm-2 col-form-label"> Score </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Score Name" name="score" id="score" required value="{{$Status_category->score}}">
            </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Status</button>
      </div>
</form>