<form id="" action="{{url('/ministerial-performance')}}" method="POST">
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$kra->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="addkey_result_area">

          <div class="form-group row">
                <label for="year_kresult_" class="col-sm-2 col-form-label">Year</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_kresult_" value="{{$kra->year}}" required>
                </div>
          </div>


          <div class="form-group row">
                <label for="result_area_name" class="col-sm-2 col-form-label"><i class="fa fa-chart-area">Key Result Area</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Achieved Name" name="result_area_name" id="result_area_name" value="{{$kra->result_area_name}}" required>
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update MPM Report</button>
          </div>
</form>



<script>
  $(function() 
  {  
      $('#year_kresult_').datepicker(
      {
          autoclose: true,startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
      });
  });
</script>