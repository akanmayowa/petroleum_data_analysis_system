<form id="" action="{{url('/project')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$PROGRAM_P->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_program_priority">


          <div class="form-group row">
                <label for="program_priority_name" class="col-sm-2 col-form-label"> Program Priority </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Program Priority Name" name="program_priority_name" id="program_priority_name" value="{{$PROGRAM_P->program_priority_name}}" required="">
                </div>
          </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Program Priority </button>
          </div>
</form>

