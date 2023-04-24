 <form id="upCrudProdDefForm" action="{{url('/upstream')}}" method="POST">
          @php 
                $one_com = \App\company::where('id', $CRU_PROD_->company_id)->first();             
                $all_com = \App\company::orderBy('company_name', 'asc')->get();
                $one_con = \App\contract::where('id', $CRU_PROD_->contract_id)->first();             
                $all_con = \App\contract::orderBy('contract_name', 'asc')->get();
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$CRU_PROD_->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_production_deferment">



           <div class="form-group row">
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id">
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> 
                    @else <option value=""></option>@endif
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
                    @else <option value=""></option>@endif
                    @if($all_con)
                        @foreach($all_con as $all_con)
                            <option value="{{$all_con->id}}"> {{$all_con->contract_name}} </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

          <div class="form-group row">
            <label for="year_defs" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="" name="year" id="year_defs" readonly value="{{$CRU_PROD_->year}}" readonly="">
            </div>
          </div>

          <div class="form-group row">
            <label for="month_defs" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="" name="month" id="month_defs" readonly value="{{$CRU_PROD_->month}}" readonly="">
            </div>
          </div>


          <div class="form-group row">
            <label for="value" class="col-sm-2 col-form-label"> Volume (Barrels) </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="value" id="value" onkeyup="checktotal(this)" required value="{{$CRU_PROD_->value}}">
            </div>
          </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Production Deferment </button>
          </div>
</form>









<script>

  $(function()
  {         
        $("#upCrudProdDefForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('upCrudProdDefForm', "{{url('/upstream')}}", 'edit_pro_def');

            displayCrudeProdDeferment();
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

            $('#year_defs').datepicker(
            {
              format: "yyyy",
              viewMode: "years", 
              minViewMode: "years"
            });

              $('#month_defs').datepicker(
              {
                autoclose: true, format: "MM",
                viewMode: "months", 
                minViewMode: "months"
              })
        });

</script>
