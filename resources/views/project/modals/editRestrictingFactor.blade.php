<form id="" action="{{url('/project')}}" method="POST">
        {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$FACTOR->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_restricting_factor">


        <div class="form-group row">
              <label for="restricting_factor_name" class="col-sm-2 col-form-label"> Restricting Factor </label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Achievement Status Name" name="restricting_factor_name" id="restricting_factor_name" value="{{$FACTOR->restricting_factor_name}}">
              </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Restricting Factor</button>
        </div>
</form>