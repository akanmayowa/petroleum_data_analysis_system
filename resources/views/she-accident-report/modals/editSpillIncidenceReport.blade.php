<form id="hseSpillForm" action="{{url('she-accident-report')}}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$SHE_SPILL->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_she_spill_incidence_report">



          <div class="form-group row">
            <label for="year_spe" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_spe" value="{{$SHE_SPILL->year}}" required="" readonly>
            </div>

            <label for="month_spe" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month - MMM" name="month" id="month_spe" value="{{$SHE_SPILL->month}}" required="" readonly>
            </div>
          </div> 



        <div class="form-group row">
            <label for="natural_accident_e" class="col-sm-2 col-form-label"> Accident </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Natural Incidents" name="natural_accident" id="natural_accident_e" value="{{$SHE_SPILL->natural_accident}}">
            </div>

            <label for="corrosion" class="col-sm-2 col-form-label"> Corrosion </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Work related" name="corrosion" id="corrosion_e" value="{{$SHE_SPILL->corrosion}}">
            </div>
        </div>


        <div class="form-group row">
            <label for="equipment_failure" class="col-sm-2 col-form-label"> Equipment Failure </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Equipment Failure" name="equipment_failure" id="equipment_failure_e" value="{{$SHE_SPILL->equipment_failure}}">
            </div>

            <label for="sabotage_e" class="col-sm-2 col-form-label"> Sabotage </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Sabotage" name="sabotage" id="sabotage_e" value="{{$SHE_SPILL->sabotage}}">
            </div>
        </div> 




        <div class="form-group row">
            <label for="human_error" class="col-sm-2 col-form-label"> Human Error </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Fatality Incidents" name="human_error" id="human_error_e" value="{{$SHE_SPILL->human_error}}">
            </div>

            <label for="ytbd_e" class="col-sm-2 col-form-label"> YTBD </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="YTBD" name="ytbd" id="ytbd_e" value="{{$SHE_SPILL->ytbd}}">
            </div>
        </div>


        <div class="form-group row">
            <label for="mystery_e" class="col-sm-2 col-form-label"> Mystery</label>
            <div class="col-sm-4">
                <input type="number" class="form-control sp_mys_e" placeholder="Mystery" name="mystery" id="mystery_e" onkeyup="checkValue(this)" value="{{$SHE_SPILL->mystery}}">
            </div>        

            <label for="erosion_wave_sand" class="col-sm-2 col-form-label"> Erotion/Wave/Sand</label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control sp_mys_e" placeholder="Erotion/Wave/Sand" name="erosion_wave_sand" id="erosion_wave_sand" onkeyup="checkValue(this)" value="{{$SHE_SPILL->erosion_wave_sand}}">
            </div>
        </div>


        <div class="form-group row">
            <label for="operational_maintenance" class="col-sm-2 col-form-label"> operation / Maintenance</label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control sp_mys_e" placeholder="operation / Maintenance" name="operational_maintenance" id="operational_maintenance" onkeyup="checkValue(this)" value="{{$SHE_SPILL->operational_maintenance}}">
            </div>

            <label for="sunken_barge" class="col-sm-2 col-form-label"> Sunken / Barge</label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control sp_mys_e" placeholder="Sunken / Barge" name="sunken_barge" id="sunken_barge" onkeyup="checkValue(this)" value="{{$SHE_SPILL->sunken_barge}}">
            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-9">
                <input type="hidden" class="form-control" placeholder="Total Number Of Spill" name="total_no_of_spills" id="total_no_of_spills_e" value="{{$SHE_SPILL->total_no_of_spills}}">
            </div>
        </div> 


        <div class="form-group row">
            <label for="volume_spilled_e" class="col-sm-2 col-form-label"> Vol Of Spill </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Total Volume Of Spill" name="volume_spilled" id="volume_spilled_e" value="{{$SHE_SPILL->volume_spilled}}">
            </div>
        </div> 



        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Spill </button>
        </div>

</form>



<script>
    $(function()
    {
        $("#hseSpillForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hseSpillForm', "{{url('/she-accident-report')}}", 'editspill');

            displaySpill();
        });



        $('#year_spe').datepicker
        ({
          format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        });


        $('#month_spe').datepicker
        ({
          format: "MM",
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