
<form id="" action="{{url('/project')}}" method="POST">
        {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$KPI->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_kpi_target">


        <div class="form-group row">
              <label for="kpi_name" class="col-sm-2 col-form-label"> KPI Name</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Achievement KPI Name" name="kpi_name" id="kpi_name" value="{{$KPI->kpi_name}}">
              </div>
        </div>

        <div class="form-group row">
              <label for="kpi_target" class="col-sm-2 col-form-label"> KPI Target </label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="KPI Target" name="kpi_target" id="kpi_target" value="{{$KPI->kpi_target}}">
              </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update KPI Target</button>
        </div>
</form>