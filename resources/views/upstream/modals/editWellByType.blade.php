<form id="" action="{{url('/upstream')}}" method="POST">
          <?php 
                $one_com = \App\company::where('id', $WEL_TYPE->company_id)->first();         $all_com = \App\company::orderBy('company_name', 'asc')->get();
          ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$WEL_TYPE->id}}" required>
            <input type="hidden" name="date_" id="date_" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_well_by_type">



          <div class="form-group row">
            <label for="year_wct" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_wct" value="{{$WEL_TYPE->year}}" required>
            </div>

            <label for="month_wct" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_wct" value="{{$WEL_TYPE->month}}" required>
            </div>
          
            <div class="col-sm-4">
                <input type="hidden" class="form-control" placeholder="Month" name="well_activity_id" id="well_activity_id" value="{{$WEL_TYPE->well_activity_id}}" required>
            </div>
          </div> 

         
          <div class="form-group row">
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_ty" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @endif
                    @if($all_com)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="oil_producer" class="col-sm-2 col-form-label"> Oil Producer </label>
            <div class="col-sm-10">
                <input type="number" class="form-control typed" placeholder="Oil Producer Op" name="oil_producer" id="oil_producer_" value="{{$WEL_TYPE->oil_producer}}" onkeyup="checktotal(this)">
            </div>
          </div>
         

          <div class="form-group row">
            <label for="gas_producer" class="col-sm-2 col-form-label"> Gas Producer </label>
            <div class="col-sm-10">
                <input type="number" class="form-control typed" placeholder="Gas Producer"Gp name="gas_producer" id="gas_producer_" value="{{$WEL_TYPE->gas_producer}}" onkeyup="checktotal(this)">
            </div>
          </div>   

          <div class="form-group row">
            <label for="gas_injector" class="col-sm-2 col-form-label"> Gas Injector </label>
            <div class="col-sm-10">
                <input type="number" class="form-control typed" placeholder="Gas Injector Gi" name="gas_injector" id="gas_injector_" value="{{$WEL_TYPE->gas_injector}}" onkeyup="checktotal(this)">
            </div>
          </div>
         

          <div class="form-group row">
            <label for="water_injector" class="col-sm-2 col-form-label"> Water Injector </label>
            <div class="col-sm-10">
                <input type="number" class="form-control typed" placeholder="Water Injector Wi" name="water_injector" id="water_injector_" value="{{$WEL_TYPE->water_injector}}" onkeyup="checktotal(this)">
            </div>
          </div>
         

          <div class="form-group row">
            <label for="others" class="col-sm-2 col-form-label"> Others </label>
            <div class="col-sm-10">
                <input type="number" class="form-control typed" placeholder="Others" name="others" id="others" value="{{$WEL_TYPE->others}}" onkeyup="checktotal(this)">
            </div>
          </div>


          <div class="form-group row">
            <label for="total_ty" class="col-sm-2 col-form-label"> Total </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Monthly Total" name="total" id="total_ty_e" value="{{$WEL_TYPE->total}}" readonly="" required>
            </div>
          </div>

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-check" onclick="return confirm('Are you sure you want to UPDATE Details?')"></i> Update Well By Type </button>
          </div>

</form>




<script type="text/javascript">

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
            $('.type').keyup(function()
            {
                var total = 0;
                $('.type').each(function()            
                {
                    total += parseFloat($(this).val());
                });
                $("#total_ty_e").val(total);
            });
        });


        $(function()
        {            

          $('#year_wct').datepicker(
          {
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
          });

          $('#month_wct').datepicker(
          {
            format: "MM",
            viewMode: "months", 
            minViewMode: "months"
          });

        })

</script>