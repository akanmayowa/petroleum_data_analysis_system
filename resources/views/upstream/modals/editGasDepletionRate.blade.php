
<form id="upDeplRateForm" action="{{url('/upstream')}}" method="POST">

      {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" value="{{$RESERVE_->id}}" required>
        <input type="hidden" class="form-control" name="type" id="" value="add_gas_depletion_rate">


      <div class="form-group row">
        <label for="year_depl_e" class="col-sm-2 col-form-label"> Year </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Year" name="year" id="year_depl_e" value="{{$RESERVE_->year}}" required="" readonly>
        </div>

        <label for="month_depl_e" class="col-sm-2 col-form-label"> Month </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Month" name="month" id="month_depl_e" value="{{$RESERVE_->month}}" readonly>
        </div>
      </div> 


      <div class="form-group row">
        <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
        <div class="col-sm-10">
            <select class="form-control" name="company_id" id="company_id">
                @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> 
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
        <label for="contract_id" class="col-sm-2 col-form-label"> Contract </label>
        <div class="col-sm-10">
            <select class="form-control" name="contract_id" id="contract_id">
                @if($one_con) <option value="{{$one_con->id}}"> {{$one_con->contract_name}} </option> 
                @else <option value="">  </option> @endif
                @if($all_con)
                    @foreach($all_con as $all_con)
                        <option value="{{$all_con->id}}"> {{$all_con->contract_name}} </option>                            
                    @endforeach
                @endif
            </select>
        </div>
      </div>
     

      <div class="form-group row">
        <label for="prev_gas_reserve" class="col-sm-2 col-form-label">Prev Reserves(Bcsf) </label>
        <div class="col-sm-10">
            <input type="number" step="0.01" class="form-control rese" name="prev_gas_reserve" id="prev_gas_reserve" onkeyup="checktotal(this)" value="{{$RESERVE_->prev_gas_reserve}}" required>
        </div>
      </div> 
     

      <div class="form-group row">
        <label for="curr_gas_reserve" class="col-sm-2 col-form-label">Curr Reserves(Bcsf) </label>
        <div class="col-sm-10">
            <input type="number" step="0.01" class="form-control rese" name="curr_gas_reserve" id="curr_gas_reserve" onkeyup="checktotal(this)" value="{{$RESERVE_->curr_gas_reserve}}" required>
        </div>
      </div> 
     

      <div class="form-group row">
        <label for="production" class="col-sm-2 col-form-label">Curr Production </label>
        <div class="col-sm-10">
            <input type="number" step="0.01" class="form-control rese" name="production" id="production" onkeyup="checktotal(this)" value="{{$RESERVE_->production}}" required>
        </div>
      </div> 

      <div class="form-group row">
        <label for="net_addition" class="col-sm-2 col-form-label"> Net Addition </label>
        <div class="col-sm-10">
            <input type="number" step="0.01" class="form-control rese" name="net_addition" id="net_addition" onkeyup="checktotal(this)" value="{{$RESERVE_->net_addition}}" required>
        </div>
      </div>   

      <div class="form-group row">
        <label for="percent_net_addition" class="col-sm-2 col-form-label"> % Net Addition </label>
        <div class="col-sm-10">
            <input type="number" step="0.01" class="form-control rese" name="percent_net_addition" id="percent_net_addition" onkeyup="checktotal(this)" value="{{$RESERVE_->percent_net_addition}}" required>
        </div>
      </div>   

      <div class="form-group row">
        <label for="depletion_rate" class="col-sm-2 col-form-label"> Depletion Rate </label>
        <div class="col-sm-10">
            <input type="number" step="0.01" class="form-control rese" name="depletion_rate" id="depletion_rate" onkeyup="checktotal(this)" value="{{$RESERVE_->depletion_rate}}" required>
        </div>
      </div>   

      <div class="form-group row">
        <label for="life_index" class="col-sm-2 col-form-label"> Life Index</label>
        <div class="col-sm-10">
            <input type="number" step="0.01" class="form-control rese" name="life_index" id="life_index" onkeyup="checktotal(this)" value="{{$RESERVE_->life_index}}" required>
        </div>
      </div>             

                        
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Depletion Rate </button>
      </div>
</form>


<script>

  $(function()
  {    
    $("#upDeplRateForm").on('submit', function(e)
    {   
        e.preventDefault();            
        editForm('upDeplRateForm', "{{url('/upstream')}}", 'edit_depl');

        displayReserveDepletionRate();
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

          $('#year_depl_e').datepicker(
          {
            format: "yyyy", 
            autoClose: true,
            viewMode: "years", 
            minViewMode: "years"
          });

          $('#month_depl_e').datepicker(
          {
            format: "MM", 
            autoClose: true,
            viewMode: "months", 
            minViewMode: "months"
          });


        })

</script>
