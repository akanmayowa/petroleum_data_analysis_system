<form id="" action="{{url('/ministerial-performance')}}" method="POST">
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$themics->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="addthemic_area">

          <div class="form-group row">
                <label for="year_themic_" class="col-sm-2 col-form-label">Year</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_themic_" value="{{$themics->year}}" required>
                </div>
          </div>


          <div class="form-group row">
                <label for="themic_area_name" class="col-sm-2 col-form-label"><i class="fa fa-chart-area">Themic Area</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="themic_area_name" id="themic_area_name" value="{{$themics->themic_area_name}}" required>
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Themic Area</button>
          </div>
</form>



<script>
  $(function() 
  {  
      $('#year_themic_').datepicker(
      {
          autoclose: true,startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
      });
  });
</script>