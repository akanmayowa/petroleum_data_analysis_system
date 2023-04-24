<form id="hseWasteFacForm" action="{{url('she-accident-report')}}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$MANAGE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_she_waste_management_facilities">


          

        <div class="form-group row">
            <label for="year_mgtFE" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_mgtFE" value="{{$MANAGE->year}}"  required readonly="">
            </div>
        </div> 
          

        <div class="form-group row">
            <label for="month_mgtFE" class="col-sm-3 col-form-label"> Month </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_mgtFE" value="{{$MANAGE->month}}"  required readonly="">
            </div>
        </div> 
        

        <div class="form-group row">
            <label for="type_of_facility_id" class="col-sm-3 col-form-label"> Facility Type </label>
            <div class="col-sm-9">
                <select class="form-control" name="type_of_facility_id" id="type_of_facility_id" required>
                    @if($one_fac) <option value="{{$one_fac->id}}"> {{$one_fac->facility_type_name}} </option>
                    @else<option value="">  </option>@endif
                    @if($all_fac)
                        @foreach($all_fac as $all_fac)
                            <option value="{{$all_fac->id}}"> {{$all_fac->facility_type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="operational_permit" class="col-sm-3 col-form-label"> No Of Approved Facilities </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="No Of Approved Facilities" name="operational_permit" id="operational_permit" value="{{$MANAGE->operational_permit}}" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="status_ii" class="col-sm-3 col-form-label"> Status </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Status" name="status" id="status_ii" value="{{$MANAGE->status}}" required>
            </div>
        </div>





        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Waste Mgt Facilities </button>
        </div>

</form>



<script>
    $(function()
    {
        $("#hseWasteFacForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hseWasteFacForm', "{{url('/she-accident-report')}}", 'edit_mgt_fac');

            displayWasteFacility();
        });


        $('#year_mgtFE').datepicker
        ({
          format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#month_mgtFE').datepicker
        ({
          format: "MM", autoclose: true,
          viewMode: "months", 
          minViewMode: "months"
        });




        //compute TOTAL       
        $(document).on("input", ".spill", function()
        {
            var total = 0;
            $('.spill').each(function()            
            {
                total += parseFloat($(this).val());
            });

            $("#total_no_of_spills").val(total);
            console.log(total);                         
       
        });
      
    });
</script>