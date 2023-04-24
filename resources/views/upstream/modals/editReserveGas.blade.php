<form id="upResGasForm" action="{{url('/upstream')}}" method="POST">

          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$RESERVE_->id}}" required>
            <input type="hidden" name="date_" id="date_" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_reserve_gas">


           <div class="form-group row">
            <label for="year_gas_e" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year" name="year" id="year_gas_e" value="{{$RESERVE_->year}}" required="" readonly="">
            </div>

            <label for="month_gas_e" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_gas_e" value="{{$RESERVE_->month}}" required="" readonly="">
            </div>
          </div> 

          <div class="form-group row">
            <label for="company_id_res" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_res" required>
                    @if($one_fie) <option value="{{$one_fie->id}}"> {{$one_fie->field_name}} </option>
                    @else <option value=""> </option> @endif
                    @if($all_fie)
                        @foreach($all_fie as $all_fie)
                            <option value="{{$all_fie->id}}"> {{$all_fie->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label"> Description below if the company was revoked  </label>
            <div class="col-sm-10">
                <textarea rows="4" class="form-control" placeholder="Formally ... " name="description" id="description">{{$RESERVE_->description}}</textarea>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="associated_gas_e" class="col-sm-2 col-form-label"> AG (Bcf)</label>
            <div class="col-sm-4">
                <input type="number" step="0.001" class="form-control gase" name="associated_gas" id="associated_gas_e" onkeyup="checktotal(this)" value="{{$RESERVE_->associated_gas}}" required>
            </div>

            <label for="non_associated_gas_e" class="col-sm-2 col-form-label"> NAG (Bcf)</label>
            <div class="col-sm-4">
                <input type="number" step="0.001" class="form-control gase" name="non_associated_gas" id="non_associated_gas_e" onkeyup="checktotal(this)" value="{{$RESERVE_->non_associated_gas}}" required>
            </div>
          </div>


          <div class="form-group row">
            <label for="total_gas_e" class="col-sm-2 col-form-label"> Total Gas (Bcf)</label>
            <div class="col-sm-10">
                <input type="number" step="0.001" class="form-control" placeholder="Monthly Total" name="total_gas" id="total_gas_e" value="{{$RESERVE_->total_gas}}" required readonly="">
            </div>
          </div> 

            

                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Gas Reserves </button>
          </div>
</form>


<script>

  $(function()
  {         
        $("#upResGasForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('upResGasForm', "{{url('/upstream')}}", 'editresgas');

            displayAGNAG();
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
            $('.rese').keyup(function()
            {
                var total = 0;
                $('.rese').each(function()            
                {
                    total += parseFloat($(this).val());
                });
                $("#total_reserves_e").val(total);
                console.log(total);
            });
        });

        $(function()
        {
            $('.gase').keyup(function()
            {
                var total = 0;
                $('.gase').each(function()            
                {
                    total += parseFloat($(this).val());
                });
                $("#total_gas_e").val(total);
                console.log(total);
            });
        });


        $(function()
        {        

          $('#year_gas_e').datepicker(
          {
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
          });

          $('#month_gas_e').datepicker(
          {
            format: "MM",
            viewMode: "months", 
            minViewMode: "months"
          });

        })

</script>
