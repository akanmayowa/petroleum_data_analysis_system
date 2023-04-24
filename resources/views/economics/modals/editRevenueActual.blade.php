 <form id="revActForm" action="{{url('/economics')}}" method="POST">
          {{ csrf_field() }}

            <input type="hidden" class="form-control" id="id" name="id" value="{{$REV_SUM->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_revenue_actual">


           <div class="form-group row">
            <label for="year_r" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - (yyyy)" name="year" id="year_r" value="{{$REV_SUM->year}}" required readonly="">
            </div>

            <label for="month_r" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_r" value="{{$REV_SUM->month}}" required>
            </div>
          </div>                    

           
         <div class="form-group row">
            <label for="oil_actuale" class="col-sm-2 col-form-label"> Oil Royalty </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control act" name="oil_actual" id="oil_actuale" value="{{$REV_SUM->oil_actual}}" onkeyup="checktotal(this)">
            </div>

            <label for="gas_actuale" class="col-sm-2 col-form-label"> Gas Royalty </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control act" name="gas_actual" id="gas_actuale" value="{{$REV_SUM->gas_actual}}" onkeyup="checktotal(this)">
            </div>
          </div>  


          <div class="form-group row">
            <label for="gas_flare_actuale" class="col-sm-2 col-form-label"> Flared Payment </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control act" name="gas_flare_actual" id="gas_flare_actuale" value="{{$REV_SUM->gas_flare_actual}}" onkeyup="checktotal(this)">
            </div>

            <label for="concession_actuale" class="col-sm-2 col-form-label"> Concession Rentals </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control act" name="concession_actual" id="concession_actuale" value="{{$REV_SUM->concession_actual}}" onkeyup="checktotal(this)">
            </div>
          </div>  


          <div class="form-group row">
            <label for="misc_actuale" class="col-sm-2 col-form-label"> MOR </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control act" name="misc_actual" id="misc_actuale" value="{{$REV_SUM->misc_actual}}" onkeyup="checktotal(this)">
            </div>
            
            <label for="signature_bonus" class="col-sm-2 col-form-label"> Signature Bonus </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control act" name="signature_bonus" id="signature_bonus_" value="{{$REV_SUM->signature_bonus}}" min="0" onkeyup="checktotal(this)">
            </div>
          </div> 



          <div class="form-group row">
            <div class="col-sm-4">
                <input type="hidden" step="0.01" class="form-control" name="total_actual" id="total_actuale" value="{{$REV_SUM->total_actual}}" readonly="" required>
                    <input type="hidden" class="form-control" name="type" id="" value="add_revenue_actual">
            </div>
          </div> 

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Actual Revenue Details?')"> <i class="fa fa-check"></i> Update Revenue Actual </button>
          </div>
</form>




<script>

    $(function()
    {
        $("#revActForms").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('revActForms', "{{url('/economics')}}", 'edit_revenue_act');

            displayRevenueActual();
        });
    });

    //UPDATE WELL TOTAL
    function checktotal(field) 
    {  
        if (field.value == '') 
        {
            var fid = field.id;
            document.getElementById(fid).value = 0;
            //$('.amount').val(0);
        }         
    }


    $(function()
    {        

        $('#year_r').datepicker(
        {
          format: "yyyy",
          autoclose:true,
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#month_r').datepicker(
        {
          format: "MM",
          autoclose:true,
          viewMode: "months", 
          minViewMode: "months"
        });



        //compute TOTAL Projected      
        $(document).on("input", ".proj", function()
        {
            var total_proj = 0;
            $('.proj').each(function()            
            {
                total_proj += parseFloat($(this).val());
            });

            $("#total_projectede").val(total_proj);
            console.log(total_proj);                         
       
        });


        //compute TOTAL Actual      
        $(document).on("input", ".act", function()
        {
            var total_act = 0;
            $('.act').each(function()            
            {
                total_act += parseFloat($(this).val());
            });

            $("#total_actuale").val(total_act);
            console.log(total_act);                         
       
        });

    })

</script>