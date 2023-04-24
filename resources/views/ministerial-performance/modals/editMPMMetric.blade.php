<form id="" action="{{url('/ministerial-performance')}}" method="POST">
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$metrics->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="addmetric">


          <div class="form-group row">
                <label for="metric_name" class="col-sm-2 col-form-label"><i class="fa fa-chart-area">Metric</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="metric_name" id="metric_name" value="{{$metrics->metric_name}}" required>
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Metric </button>
          </div>
</form>