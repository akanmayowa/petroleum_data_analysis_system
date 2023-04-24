
<form id="" action="{{url('she-accident-report/add_she_spill_incidence_report')}}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$SHE_SPILL->id}}" required>



          <div class="form-group row">
            <label for="year_spe" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="N/A" name="year" id="year_spe" value="{{$SHE_SPILL->year}}" disabled="">
            </div>

            <label for="month_spe" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="N/A" name="month" id="month_spe" value="{{$SHE_SPILL->month}}" disabled="">
            </div>
          </div> 



        <div class="form-group row">
            <label for="natural_accident_e" class="col-sm-2 col-form-label"> Accident </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="N/A" name="natural_accident" id="natural_accident_e" value="{{$SHE_SPILL->natural_accident}}" disabled>
            </div>

            <label for="corrosion" class="col-sm-2 col-form-label"> Corrosion </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="N/A" name="corrosion" id="corrosion_e" value="{{$SHE_SPILL->corrosion}}" disabled>
            </div>
        </div>


        <div class="form-group row">
            <label for="equipment_failure" class="col-sm-2 col-form-label"> Equipment Failure </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="N/A" name="equipment_failure" id="equipment_failure_e" value="{{$SHE_SPILL->equipment_failure}}" disabled>
            </div>

            <label for="sabotage_e" class="col-sm-2 col-form-label"> Sabotage </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="N/A" name="sabotage" id="sabotage_e" value="{{$SHE_SPILL->sabotage}}"disabled>
            </div>
        </div> 




        <div class="form-group row">
            <label for="human_error" class="col-sm-2 col-form-label"> Human Error </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Fatality Incidents" name="human_error" id="human_error_e" value="{{$SHE_SPILL->human_error}}" disabled>
            </div>

            <label for="ytbd_e" class="col-sm-2 col-form-label"> YTBD </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="N/A" name="ytbd" id="ytbd_e" value="{{$SHE_SPILL->ytbd}}" disabled>
            </div>
        </div>


        <div class="form-group row">
            <label for="mystery_e" class="col-sm-2 col-form-label"> Mystery</label>
            <div class="col-sm-4">
                <input type="number" class="form-control sp_mys_e" placeholder="N/A" name="mystery" id="mystery_e" onkeyup="checkValue(this)" value="{{$SHE_SPILL->mystery}}" disabled>
            </div>        

            <label for="erosion_wave_sand" class="col-sm-2 col-form-label"> Erotion/Wave/Sand</label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control sp_mys_e" placeholder="N/A" name="erosion_wave_sand" id="erosion_wave_sand" onkeyup="checkValue(this)" value="{{$SHE_SPILL->erosion_wave_sand}}" disabled>
            </div>
        </div>


        <div class="form-group row">
            <label for="operational_maintenance" class="col-sm-2 col-form-label"> operation / Maintenance</label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control sp_mys_e" placeholder="N/A" name="operational_maintenance" id="operational_maintenance" onkeyup="checkValue(this)" value="{{$SHE_SPILL->operational_maintenance}}" disabled>
            </div>

            <label for="sunken_barge" class="col-sm-2 col-form-label"> Sunken / Barge</label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control sp_mys_e" placeholder="N/A" id="sunken_barge" onkeyup="checkValue(this)" value="{{$SHE_SPILL->sunken_barge}}" disabled>
            </div>
        </div>


        <div class="form-group row">
            <label for="volume_spilled_e" class="col-sm-2 col-form-label"> Total Spill </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Total Number Of Spill" name="total_no_of_spills" id="total_no_of_spills_e" value="{{$SHE_SPILL->total_no_of_spills}}" disabled>
            </div>

            <label for="volume_spilled_e" class="col-sm-2 col-form-label"> Vol Of Spill </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Total Volume Of Spill" name="volume_spilled" id="volume_spilled_e" value="{{$SHE_SPILL->volume_spilled}}" disabled>
            </div>
        </div> 



        <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($SHE_SPILL->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($SHE_SPILL->updated_at)->diffForHumans()}}
            </div>
          </div>

</form>



<script type="text/javascript">
    $(function()
    {

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



