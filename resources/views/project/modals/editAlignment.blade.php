<form id="" action="{{url('/project')}}" method="POST">
        {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$Alignment->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="addalignment">


        <div class="form-group row">
              <label for="alignment_name" class="col-sm-2 col-form-label"> Alignment </label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Alignment Name" name="alignment_name" id="alignment_name" value="{{$Alignment->alignment_name}}">
              </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Alignment</button>
        </div>
</form>