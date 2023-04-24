<form id="" action="{{url('/ministerial-performance')}}" method="POST">
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$KPI->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_mpm_kpi">

          <div class="form-group row">
                <label for="year_kpi" class="col-sm-2 col-form-label">Year</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_kpi" value="{{$themics->year}}" required>
                </div>
          </div>

          <div class="form-group row">
                <label for="kpi_name" class="col-sm-2 col-form-label"> KPI Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Key Performance Index Name" name="kpi_name" id="kpi_name" value="{{$KPI->kpi_name}}" required>
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update KPI</button>
          </div>
</form>



<script>
  $(function() 
  {  
      $('#year_kpi').datepicker(
      {
          autoclose: true,startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
      });
  });
</script>