<form id="revProjForms" action="{{url('/economics')}}" method="post">
          {{ csrf_field() }}

            <input type="hidden" class="form-control" id="id" name="id" value="{{$REV_SUM->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_revenue_projected">  


           <div class="form-group row">
            <label for="year_reve" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year (yyyy)" name="year" id="year_reve" value="{{$REV_SUM->year}}" required readonly="">
            </div>
          </div>                    

           
         <div class="form-group row">
            <label for="oil_projectede" class="col-sm-2 col-form-label"> Oil Royalty </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control proj" name="oil_projected" id="oil_projectede" value="{{$REV_SUM->oil_projected}}" onkeyup="checktotal(this)">
            </div>

            <label for="gas_projectede" class="col-sm-2 col-form-label"> Gas Royalty </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control proj" name="gas_projected" id="gas_projectede" value="{{$REV_SUM->gas_projected}}" onkeyup="checktotal(this)">
            </div>
          </div>  


          <div class="form-group row">
            <label for="gas_flare_projectede" class="col-sm-2 col-form-label"> Flared Payment </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control proj" name="gas_flare_projected" id="gas_flare_projectede" value="{{$REV_SUM->gas_flare_projected}}" onkeyup="checktotal(this)">
            </div>

            <label for="concession_projectede" class="col-sm-2 col-form-label"> Concession Rentals </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control proj" name="concession_projected" id="concession_projectede" value="{{$REV_SUM->concession_projected}}" onkeyup="checktotal(this)">
            </div>
          </div>  


          <div class="form-group row">
            <label for="misc_projectede" class="col-sm-2 col-form-label"> MOR </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control proj" name="misc_projected" id="misc_projectede" value="{{$REV_SUM->misc_projected}}" onkeyup="checktotal(this)">
            </div>
            
            <label for="signature_bonus" class="col-sm-2 col-form-label"> Signature Bonus </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control proj" name="signature_bonus" id="signature_bonuse" value="{{$REV_SUM->signature_bonus}}" min="0" onkeyup="checktotal(this)">
            </div>
          </div> 


          <div class="form-group row">
            <div class="col-sm-4">
                <input type="hidden" step="0.01" class="form-control" name="total_projected" id="total_projectede" value="{{$REV_SUM->total_projected}}" readonly="" required>
                    <input type="hidden" class="form-control" name="type" id="" value="add_revenue_projected">
            </div>
          </div> 

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Revenue Projected </button>
          </div>
</form>




<script>

    $(function()
    {
        $("#revProjForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('revProjForm', "{{url('/economics')}}", 'edit_revenue_pro');

            displayRevenueProjected();
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
        $('.w_cont').keyup(function()
        {
            var total = 0;
            $('.w_cont').each(function()            
            {
                total += parseFloat($(this).val());
            });
            $("#total_wct_e").val(total);
            console.log(total);
        });
    });


    $(function()
    {        

        $('#year_reve').datepicker(
        {
          format: "yyyy",
          autoclose:true,
          viewMode: "years", 
          minViewMode: "years"
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