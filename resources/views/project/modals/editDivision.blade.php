<form id="" action="{{url('/project')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" id="id" value="{{$Division->id}}">
            <input type="hidden" class="form-control" name="type" id="" value="adddivision">


          <div class="form-group row">
                <label for="division_name" class="col-sm-2 col-form-label"> Division </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Division Name" name="division_name" id="division_name" value="{{$Division->division_name}}">
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Division</button>
          </div>
</form>