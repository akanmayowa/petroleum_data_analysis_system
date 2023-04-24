<form id="sheDrilChemForm" action="{{url('she-accident-report')}}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$MANAGE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_drilling_chemical">



          <div class="form-group row">
            <label for="year_dril" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_dril" value="{{$MANAGE->year}}" required readonly>
            </div>

            <label for="month_dril" class="col-sm-3 col-form-label"> Month </label>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Month - YYYY" name="month" id="month_dril" value="{{$MANAGE->month}}" required readonly>
            </div>
          </div> 

        


        <div class="form-group row">
            <label for="fluid_type" class="col-sm-3 col-form-label"> Drilling Fluid Type </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="Drilling Fluid Type" name="fluid_type" id="fluid_type" value="{{$MANAGE->fluid_type}}" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="number" class="col-sm-3 col-form-label"> Number </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="Number" name="number" id="number" value="{{$MANAGE->number}}" required>
            </div>
        </div> 



        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Drilling Chemical </button>
        </div>

</form>



<script>
    $(function()
    {
        // $("#sheDrilChemForm").on('submit', function(e)
        // {   
        //     e.preventDefault();            
        //     editForm('sheDrilChemForm', "{{url('/she-accident-report')}}", 'edit_dri_chem');

        //     displayEnvironmentalComplianceMonitoring();
        // });


        $('#year_dril').datepicker
        ({
          format: "yyyy", autoClose: true,
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#month_dril').datepicker
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
       
        });
      
    });
</script>