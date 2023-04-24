<form id="gasProdSumForm" action="{{url('/gas')}}" method="POST">
          
          <?php $gas_p_tot = \App\gas_domestic_gas_supply::count();  ++$gas_p_tot; ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_SUM->id}}" required>
            <input type="hidden" name="tot_" id="tot_" value="{{$gas_p_tot}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_gas_production_summary">  


            <div class="form-group row">
            <label for="year_sum" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="year" id="year_sum" value="{{$GAS_SUM->year}}" required readonly>
            </div> 

            <label for="month_sum" class="col-sm-1 col-form-label"> month </label>
            <div class="col-sm-5">
                <select class="form-control" name="month" id="month_sum" required="true">
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
            <label for="field_id" class="col-sm-1 col-form-label"> Field </label>
            <div class="col-sm-5">
                <select class="form-control" name="field_id" id="field_id">
                    @if($one_fie) <option value="{{$one_fie->id}}"> {{$one_fie->field_name}} </option> @else  <option value=""> Select Field </option> @endif
                    @if($all_fie)
                        @foreach($all_fie as $all_fie)
                            <option value="{{$all_fie->id}}"> {{$all_fie->field_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>


            <label for="company_id" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-5">
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
            <label for="spdc" class="col-sm-1 col-form-label"> AG </label>
            <div class="col-sm-5">
                <input type="text" class="form-control edit_a" placeholder="Associated Gas" name="ag" id="ag" onkeyup="checkValue(this)" value="{{$GAS_SUM->ag}}">
            </div>

            <label for="cnl" class="col-sm-1 col-form-label"> NAG </label>
            <div class="col-sm-5">
                <input type="text" class="form-control edit_a" placeholder="Non Associated Gas" name="nag" id="nag" onkeyup="checkValue(this)" value="{{$GAS_SUM->nag}}">
            </div>
        </div>  



        <div class="form-group row">
            <div class="col-sm-11">
                <input type="hidden" class="form-control" placeholder="Total" name="total" id="edit_total_ap" value="{{$GAS_SUM->total}}" readonly="">
            </div>
        </div> 

           
         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Gas Production </button>
          </div>
</form>



<script>
    $(function()
    {
        $("#gasProdSumForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('gasProdSumForm', "{{url('/gas')}}", 'editgas_summary');

            displayProduction();
        });


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
</script>