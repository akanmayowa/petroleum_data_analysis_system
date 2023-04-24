
<form id="upRepRateForm" action="{{url('/upstream')}}" method="POST">

      {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" value="{{$RESERVE_->id}}" required>
        <input type="hidden" class="form-control" name="type" id="" value="add_replacement_rate">


      <div class="form-group row">
        <label for="year_rate_e" class="col-sm-2 col-form-label"> Year </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Year" name="year" id="year_rate_oil_e" value="{{$RESERVE_->year}}" required="" readonly>
        </div>

        <label for="month_rate_e" class="col-sm-2 col-form-label"> Month </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Month" name="month" id="month_rate_oil_e" value="{{$RESERVE_->month}}" readonly>
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
        <label for="oil_condensate_reserve" class="col-sm-2 col-form-label"> Oil Condensate Reserve </label>
        <div class="col-sm-10">
            <input type="number" step="0.01" class="form-control rese" name="oil_condensate_reserve" id="oil_condensate_reserve" onkeyup="checktotal(this)" value="{{$RESERVE_->oil_condensate_reserve}}" required>
        </div>
      </div> 

      <div class="form-group row">
        <label for="oil_condensate_production" class="col-sm-2 col-form-label"> Oil Condensate Production </label>
        <div class="col-sm-10">
            <input type="number" step="0.01" class="form-control rese" name="oil_condensate_production" id="oil_condensate_production" onkeyup="checktotal(this)" value="{{$RESERVE_->oil_condensate_production}}" required>
        </div>
      </div>             

                        
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Replacement Rate </button>
      </div>
</form>


<script>

  $(function()
  {         
        $("#upRepRateForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('upRepRateForm', "{{url('/upstream')}}", 'edit_rate');

            displayReserveReplacementRate();
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

          $('#year_rate_e').datepicker(
          {
            format: "yyyy", 
            autoClose: true,
            viewMode: "years", 
            minViewMode: "years"
          });

          $('#month_rate_e').datepicker(
          {
            format: "MM", 
            autoClose: true,
            viewMode: "months", 
            minViewMode: "months"
          });


        })

</script>
