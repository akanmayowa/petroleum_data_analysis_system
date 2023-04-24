<form id="hseRadSafePermForm" action="{{url('she-accident-report')}}" method="POST">   
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$MANAGE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_radiation_safety_permit">



          <div class="form-group row">
            <label for="year_radi" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_radi" value="{{$MANAGE->year}}" required readonly>
            </div>
          </div> 

          <div class="form-group row">
            <label for="month_radi" class="col-sm-3 col-form-label"> Month </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_radi" value="{{$MANAGE->month}}" required readonly>
            </div>
          </div> 


            
        <div class="form-group row">
            <label for="company_id" class="col-sm-3 col-form-label"> Company </label>
            <div class="col-sm-9">
                <select class="form-control" name="company_id" id="company_id" required>
                    @if($one_com)<option value="{{$one_com->id}}"> {{$one_com->company_name}} </option>
                    @else <option value="">  </option> @endif
                    @if($all_com)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        


        <div class="form-group row">
            <label for="well_type" class="col-sm-3 col-form-label"> Well Type </label>
            <div class="col-sm-9">
                <select class="form-control" name="well_type" id="well_type" required>
                    @if($MANAGE)<option value="{{$MANAGE->well_type}}"> {{$MANAGE->well_type}} </option>
                    @else <option value=""> N/A </option> @endif
                    <option value="Exploratory"> Exploratory </option>
                    <option value="Appraisal"> Appraisal </option>
                    <option value="Development"> Development </option>
                    <option value="Production"> Production </option>
                    <option value="Gas Injector"> Gas Injector </option>
                    <option value="Water Injector"> Water Injector </option>
                    <option value="Others"> Others </option>
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="well_name" class="col-sm-3 col-form-label"> Well Name </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Well Name" name="well_name" id="well_name" value="{{$MANAGE->well_name}}" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="concession" class="col-sm-3 col-form-label"> Concession </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Concession" name="concession" id="concession" value="{{$MANAGE->concession}}" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="count" class="col-sm-3 col-form-label"> Permit Count </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="Permit Count" name="count" id="count" value="{{$MANAGE->count}}" required>
            </div>
        </div> 

        


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Radiation Permit </button>
        </div>

</form>



<script>
    $(function()
    {
        $("#hseRadSafePermForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hseRadSafePermForm', "{{url('/she-accident-report')}}", 'edit_rad_perm');

            displayRadiationSafetyPermit();
        });


        $('#year_radi').datepicker
        ({
          format: "yyyy", autoClose: true,
          viewMode: "years", 
          minViewMode: "years"
        });
        $('#month_radi').datepicker
        ({
          format: "MM", autoclose: true,
          viewMode: "months", 
          minViewMode: "months"
        });
      
    });
</script>