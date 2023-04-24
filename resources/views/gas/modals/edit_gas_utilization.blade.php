<form id="gasUilForm" action="{{url('/gas')}}" method="POST">
          
          <?php $gas_p_tot = \App\gas_domestic_gas_supply::count();  ++$gas_p_tot; ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_SUM->id}}" required>
            <input type="hidden" name="tot_" id="tot_" value="{{$gas_p_tot}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_gas_utilization_summary">  


            <div class="form-group row">
            <label for="year_util_e" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="year" id="year_util_e" value="{{$GAS_SUM->year}}" required="" readonly>
            </div> 

            <label for="month_uti_e" class="col-sm-2 col-form-label"> month </label>
            <div class="col-sm-4">
                <select class="form-control" name="month" id="month_uti_e" required="true">
                    @if($GAS_SUM) <option value="{{$GAS_SUM->month}}"> {{$GAS_SUM->month}} </option> @endif
                    <option value=""> Select Month </option>  
                    <option value="January"> January </option>
                    <option value="February">February </option>
                    <option value="March"> March </option>
                    <option value="April"> April </option>
                    <option value="May"> May </option>
                    <option value="June"> June </option>
                    <option value="July"> July </option>
                    <option value="August"> August </option>
                    <option value="September"> September </option>
                    <option value="October"> October </option>
                    <option value="November">November </option>
                    <option value="December"> December </option>
                </select>
            </div> 
        </div>

            
        <div class="form-group row">
            <label for="field_id" class="col-sm-2 col-form-label"> Field </label>
            <div class="col-sm-4">
                <select class="form-control" name="field_id" id="field_id">
                    @if($one_fie) <option value="{{$one_fie->id}}"> {{$one_fie->field_name}} </option> @else  <option value=""> Select Field </option> @endif
                    @if($all_fie)
                        @foreach($all_fie as $all_fie)
                            <option value="{{$all_fie->id}}"> {{$all_fie->field_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-4">
                <select class="form-control" name="company_id" id="company_id" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else  <option value=""> Select Company </option> @endif
                    @if($all_com)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        

        <div class="form-group row" style="height: 8px"> <hr> </div>


        <div class="form-group row">
            <label for="fuel_gas" class="col-sm-2 col-form-label"> Fuel Gas </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control edit_util" name="fuel_gas" id="fuel_gas" onkeyup="checkValue(this)" value="{{$GAS_SUM->fuel_gas}}">
            </div>

            <label for="gas_lift" class="col-sm-2 col-form-label"> Gas Lift </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control edit_util" name="gas_lift" id="gas_lift" onkeyup="checkValue(this)" value="{{$GAS_SUM->gas_lift}}">
            </div>
        </div>          

        <div class="form-group row">
            <label for="re_injection" class="col-sm-2 col-form-label"> Re-Injection </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control edit_util" name="re_injection" id="re_injection" onkeyup="checkValue(this)" value="{{$GAS_SUM->re_injection}}">
            </div>

            <label for="ngl_lpg" class="col-sm-2 col-form-label"> NLG LPG </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control edit_util" name="ngl_lpg" id="ngl_lpg" onkeyup="checkValue(this)" value="{{$GAS_SUM->ngl_lpg}}">
            </div>
        </div>          

        <div class="form-group row">          
            <label for="gas_to_nipp" class="col-sm-2 col-form-label"> Gas-NIPP </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control edit_util" name="gas_to_nipp" id="gas_to_nipp" onkeyup="checkValue(this)" value="{{$GAS_SUM->gas_to_nipp}}">
            </div>

            <label for="local_others" class="col-sm-2 col-form-label"> Local (Others) </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control edit_util" name="local_others" id="local_others" onkeyup="checkValue(this)" value="{{$GAS_SUM->local_others}}">
            </div>

        </div>          

        <div class="form-group row">
            <label for="nlng_export" class="col-sm-2 col-form-label"> NLNG Export </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control edit_util" name="nlng_export" id="nlng_export" onkeyup="checkValue(this)" value="{{$GAS_SUM->nlng_export}}">
            </div>

            <label for="shrinkage_e" class="col-sm-2 col-form-label"> Shrinkage </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control gas" placeholder="Total Gas Shrinkage" name="shrinkage" id="shrinkage_e" value="{{$GAS_SUM->shrinkage}}">
            </div>
        </div>


        <div class="form-group row">
            <label for="ag_gas_flared_e" class="col-sm-2 col-form-label"> AG Gas Flared </label>
            <div class="col-sm-4">
                <input type="number" class="form-control gas" placeholder="AG Gas Flared" name="ag_gas_flared" id="ag_gas_flared_e" value="{{$GAS_SUM->ag_gas_flared}}">
            </div> 

            <label for="nag_gas_flared_e" class="col-sm-2 col-form-label"> NAG Gas Flared </label>
            <div class="col-sm-4">
                <input type="number" class="form-control gas" placeholder="NAG Gas Flared" name="nag_gas_flared" id="nag_gas_flared_e" value="{{$GAS_SUM->nag_gas_flared}}"> 
            </div>                    
        </div> 



        <div class="form-group row">
            <label for="total_gas_flared_e" class="col-sm-2 col-form-label"> Gas Flared </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control gas" placeholder="Total Gas Flared" name="total_gas_flared" id="total_gas_flared_e" value="{{$GAS_SUM->total_gas_flared}}" required="">
            </div> 

            <label for="total_gas_utilized_e" class="col-sm-2 col-form-label"> Total Gas </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control gas" placeholder="Total Gas Utilized" name="total_gas_utilized" id="total_gas_utilized_e" value="{{$GAS_SUM->total_gas_utilized}}">
            </div>                    
        </div> 



        <div class="form-group row">
            <label for="total_gas_flared_e" class="col-sm-2 col-form-label"> Percent Utilized </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Percentage Utilized" name="percent_utilized" id="percent_utilized_e" value="{{$GAS_SUM->percent_utilized}}">
            </div>

            <label for="total_gas_flared_e" class="col-sm-2 col-form-label"> Percent Flared </label>
            <div class="col-sm-4">
                <input type="text" step="0.01" class="form-control" placeholder="Percentage Flared" name="percent_flared" id="percent_flared_e" value="{{$GAS_SUM->percent_flared}}">
            </div>
        </div>        


        <div class="form-group row">
            <label for="total_gas_flared_e" class="col-sm-2 col-form-label"> Total AG + NAG </label>
            <div class="col-sm-4">
                <input type="text" step="0.01" class="form-control" placeholder="Total (AG + NAG)" name="total_ag_nag" id="total_ag_nag_e" value="{{$GAS_SUM->total_ag_nag}}">
            </div>

            <label for="total_gas_flared_e" class="col-sm-2 col-form-label"> Statistical Diff </label>
            <div class="col-sm-4">
                <input type="text" step="0.01" class="form-control" placeholder="Statistical Difference" name="statistical_diff" id="statistical_diff_e" value="{{$GAS_SUM->statistical_diff}}">
            </div>
        </div>
           
         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Gas Utilization </button>
          </div>
</form>



<script type="text/javascript">
    $(function()
    {
        $("#gasUilForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('gasUilForm', "{{url('/gas')}}", 'editgas_util');

            displayUtilization();
        });


        $('#year_util_e').datepicker(
        {
          autoclose: true,startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
      })

        //script to calculate total associated gas
        $('.edit_a').keyup(function()
        {
            var ag_total=0;
            $('.edit_a').each(function()
            {
                ag_total += parseFloat($(this).val());
            });
            $("#edit_total_ap").val(ag_total);
            console.log(ag_total);
        });


        //script to calculate total gas utilized
        $('.edit_util').keyup(function()
        {
            var total_edit_util = 0;
            $('.edit_util').each(function()            
            {
                total_edit_util += parseFloat($(this).val());
            });
            $("#total_edit_utilized").val(total_edit_util);
            console.log(total_edit_util);
        }); 



          //GETTING THE TOTAL AG + NAG
          $(function()
          {
            $('#month_uti_e').change(function(e)
            { 
              var month = $(this).val();     var year = $('#year_util_e').val(); //alert(month + " : " + year);
              formData={ month:month, year:year }
              $.get('{{url('getTotalAg_Nag')}}', formData, function(data)
              {  //success data
                $.each(data, function(index, AGNAGObj)
                {
                  $('#total_ag_nage').val(AGNAGObj.total);   
                  console.log(AGNAGObj);
                });
              });       
            });
          });

    });

    //setting all values to default 0
    function checkValue(field) 
    {  
        if (field.value == '') 
        {
            var fid = field.id;
            document.getElementById(fid).value = 0;
            //$('.amount').val(0);
        }
    }

    //compute percentage Utilized and Flared
    function updPercentUtilized()
    {
        var total_gas_util = $("#total_gas_utilized_e").val();
        var total_gas_flar = $("#total_gas_flared_e").val();
            
        var ag_nag = $('#total_ag_nag_e').val();
        var perc_util = ((total_gas_util * 100) / ag_nag);
        $('#percent_utilized_e').val(perc_util.toFixed(1));

        var perc_flar = ((total_gas_flar * 100) / ag_nag);
        $('#percent_flared_e').val(perc_flar.toFixed(1));
        console.log(perc_flar);
    }


    //Calculate Statistical Difference
    function updStatisticalDifference()
    {
        var ag_nag = $('#total_ag_nag_e').val();
        var total_gas_util = $("#total_gas_utilized_e").val();
        var shrinkage = $("#shrinkage_e").val();            
        var total_gas_flar = $("#total_gas_flared_e").val();

        var statistical_diff = (ag_nag - total_gas_util - shrinkage - total_gas_flar);
        $('#statistical_diff_e').val(statistical_diff.toFixed(2));
    }
</script>


