<div id="add_expenditure" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Expenditure</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="expForm" action="{{url('dwp')}}" method="POST">
            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="id" id="id" value="0">
            <input type="hidden" name="type" id="type" value="expenditure">
            

          <div class="form-group row">
                <label for="kpi_name" class="col-sm-2 col-form-label">Month</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly placeholder="Month" name="month_exp" id="month_exp" required>
                </div>
          </div>

          <div class="form-group row">
                <label for="kpi_name" class="col-sm-2 col-form-label">Year</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly placeholder="Year - YYYY" name="year_exp" id="year_exp" required>
                </div>
          </div>
                    <div class="form-group row">
                <label for="kpi_name" class="col-sm-2 col-form-label">Expenditure</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="Monthly Expenditure" name="expenditureField" id="expenditureField" required>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Add Expenditure </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>