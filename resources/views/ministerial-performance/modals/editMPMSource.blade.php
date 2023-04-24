 <form id="" action="{{url('/ministerial-performance')}}" method="POST">
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$sources->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="addsource">


          <div class="form-group row">
                <label for="source_name" class="col-sm-2 col-form-label"><i class="fa fa-chart-area">Source</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="source_name" id="source_name" value="{{$sources->source_name}}" required>
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Source </button>
          </div>
</form>